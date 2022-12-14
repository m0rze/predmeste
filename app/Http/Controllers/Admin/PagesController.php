<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\ValidateFields;
use App\QueryBuilders\CategoriesQB;
use App\QueryBuilders\PagesQB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Root\Config;

class PagesController extends Controller
{

    private CategoriesQB $categoriesQB;
    private ValidateFields $validateFields;
    private PagesQB $pagesQB;

    public function __construct(
        CategoriesQB $categoriesQB,
        PagesQB $pagesQB,
        ValidateFields $validateFields
    )
    {
        $this->categoriesQB = $categoriesQB;
        $this->validateFields = $validateFields;
        $this->pagesQB = $pagesQB;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view("admin.pages.pages.index", [
            "token" => Config::$token,
            "pages" => $this->pagesQB->getPagesForTable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {

        return view("admin.pages.pages.create", [
            "token" => Config::$token,
            "categories" => $this->categoriesQB->getCategoriesForNewPage()
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
            return Redirect::route("admin.pages.index");
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\RedirectResponse
     */
    public function edit($id)
    {
        $page = $this->pagesQB->getPageById($id);
        if(empty($page->title))
        {
            return Redirect::route("admin.pages.index");
        }
        return view("admin.pages.pages.edit", [
            "token" => Config::$token,
            "page" => $page,
            "categories" => $this->categoriesQB->getCategoriesForNewPage()
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
        return Redirect::route("admin.pages.index");
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
