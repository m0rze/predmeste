<?php

namespace App\QueryBuilders;

use App\Models\Page;

class PagesQB
{

    public function deleteById($id)
    {
        $page = Page::find($id);
        if(empty($page))
        {
            return false;
        }
        $page->delete();
        return true;
    }

    public function updateById($id, $data)
    {
        $page = Page::find($id);
        if(empty($page))
        {
            return false;
        }
        $page->update($data);
        return true;
    }

    public function getPageById($id)
    {
        return Page::find($id);
    }

    public function getPagesForTable()
    {

        return Page::with("category")
            ->orderBy("created_at", "DESC")
            ->paginate(20);
    }

    public function saveNew($data)
    {
        return Page::create($data);
    }
}
