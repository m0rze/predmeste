<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\QueryBuilders\WidgetsQB;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Root\Config;

class WidgetsController extends Controller
{

    private WidgetsQB $widgetsQB;

    public function __construct(
        WidgetsQB $widgetsQB
    )
    {
        $this->widgetsQB = $widgetsQB;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return view("admin.pages.widgets.index", [
            "token" => Config::$token,
            "widgets" => $this->widgetsQB->getWidgetsForTable()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create()
    {
        return view("admin.pages.widgets.create", [
            "token" => Config::$token
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        if($this->widgetsQB->addNew($request->except(["_token"])))
        {
            return Redirect::route("admin.widgets.index");
        }
        return Redirect::back()->withInput();
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
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id)
    {
        $widget = $this->widgetsQB->getWidgetById($id);
        if(empty($widget->title))
        {
            return Redirect::route("admin.widgets.index");
        }
        return view("admin.pages.widgets.edit", [
            "token" => Config::$token,
            "widget" => $widget,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $data = $request->except(["_token", "_method"]);
        if($this->widgetsQB->updateById($id, $data) === false){
            return Redirect::back();
        }
        return Redirect::route("admin.widgets.index");
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
