<?php

namespace App\QueryBuilders;

use App\Models\Page;

class PagesQB
{

    public function getFeaturedPagesForTable()
    {
        return Page::with("category")
            ->whereNotNull("category_id")
            ->whereNull("static_place_id")
            ->orderBy("created_at", "DESC")
            ->limit(9)
            ->get();
    }

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
        return Page::with("category")->with("staticPlace")->find($id);
    }

    public function getCategorizedPagesForTable()
    {

        return Page::with("category")
            ->whereNotNull("category_id")
            ->whereNull("static_place_id")
            ->orderBy("created_at", "DESC")
            ->paginate(20);
    }
    public function getStaticPagesForTable()
    {
        return Page::whereNull("category_id")
            ->whereNotNull("static_place_id")
            ->orderBy("created_at", "DESC")
            ->paginate(20);
    }
    public function getStaticPages()
    {
        return Page::whereNull("category_id")
            ->with("staticPlace")
            ->whereNotNull("static_place_id")
            ->orderBy("created_at", "DESC")
            ->get();
    }

    public function saveNew($data)
    {
        return Page::create($data);
    }
}
