<?php

namespace App\QueryBuilders;

use App\Models\Widget;

class WidgetsQB
{
    public function getWidgetsForTable()
    {
        return Widget::select("id", "title")->orderBy("title", "DESC")->paginate(20);
    }

    public function getAllWidgets()
    {
        return Widget::orderBy("title", "DESC")->get();
    }

    public function addNew($data)
    {
        return Widget::create($data);
    }

    public function getWidgetById($id)
    {
        return Widget::find($id);
    }

    public function updateById($id, $data)
    {
        $widget = Widget::find($id);
        if(empty($widget))
        {
            return false;
        }
        $widget->update($data);
        return true;
    }


    public function deleteById($id)
    {
        $widget = Widget::find($id);
        if(empty($widget))
        {
            return false;
        }
        $widget->delete();
        return true;
    }
}
