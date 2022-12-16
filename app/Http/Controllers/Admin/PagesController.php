<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ValidateFields;
use App\QueryBuilders\CategoriesQB;
use App\QueryBuilders\PagesQB;
use App\QueryBuilders\StaticPlacesQB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Root\Config;

class PagesController extends Controller
{

    private CategoriesQB $categoriesQB;
    private ValidateFields $validateFields;
    private PagesQB $pagesQB;
    private StaticPlacesQB $staticPlacesQB;

    public function __construct(
        CategoriesQB $categoriesQB,
        PagesQB $pagesQB,
        StaticPlacesQB $staticPlacesQB,
        ValidateFields $validateFields
    )
    {
        $this->categoriesQB = $categoriesQB;
        $this->validateFields = $validateFields;
        $this->pagesQB = $pagesQB;
        $this->staticPlacesQB = $staticPlacesQB;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view("admin.pages.pages.index", [
            "type" => "categorized",
            "token" => Config::$token,
            "pages" => $this->pagesQB->getCategorizedPagesForTable()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function staticIndex()
    {
        return view("admin.pages.pages.index", [
            "type" => "static",
            "token" => Config::$token,
            "pages" => $this->pagesQB->getStaticPagesForTable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create($type)
    {
        $selectData = [];
        switch ($type)
        {
            case "categorized":
                $selectData = $this->categoriesQB->getCategoriesForNewPage();
                break;
            case "static":
                $selectData = $this->staticPlacesQB->getPlaces();
                break;
            default:
                break;
        }
        return view("admin.pages.pages.create", [
            "type" => $type,
            "token" => Config::$token,
            "selectData" => $selectData
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if($this->validateFields->validatePHPJS($request->all()) === false)
        {
            return Redirect::back()->withInput();
        }
        $data = $request->except(['_token']);
        if($this->pagesQB->saveNew($data))
        {
            if(!empty($request->input("category_id")))
            {
                return Redirect::route("admin.pages.index");
            } else {
                return Redirect::route("admin.static-pages.index");
            }

        } else {
            return Redirect::back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Application|Factory|View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $page = $this->pagesQB->getPageById($id);
        if(empty($page->title))
        {
            return Redirect::route("admin.pages.index");
        }

        if(!empty($page->category_id)) {
            $selectData = $this->categoriesQB->getCategoriesForNewPage();
        } else {
            $selectData = $this->staticPlacesQB->getPlaces();
        }

        return view("admin.pages.pages.edit", [
            "token" => Config::$token,
            "page" => $page,
            "selectData" => $selectData
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->except('_method', '_token');
        if($this->pagesQB->updateById($id, $data) === false){
            return Redirect::back();
        }
        if(!empty($request->input("category_id")))
        {
            return Redirect::route("admin.pages.index");
        } else {
            return Redirect::route("admin.static-pages.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
