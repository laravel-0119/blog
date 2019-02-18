<?php namespace App\Custom\Classes;


use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MainMenu
{
    protected function getCategories()
    {
        return DB::table('menu')
            ->whereNull('parent_id')
            ->orderBy('weight')
            ->get(['id', 'caption', 'link', 'route']);
    }

    protected function getItems($parentId)
    {
        return DB::table('menu')
            ->whereNotNull('parent_id')
            ->where('parent_id', $parentId)
            ->orderBy('weight')
            ->get(['caption', 'link', 'route']);
    }

    protected function buildSectionWithoutChildren($caption, $link, $route)
    {
        return <<<HTML
            <li class="dropdown $route">
                <a href="$link" class="dropdown-toggle" data-toggle="dropdown">$caption</a>
            </li>
HTML;
    }

    protected function buildSectionWithChildren($caption, $link, $items, $route)
    {
        $itemsBlock = '';

        if (count($items) > 0) {
            $itemsBlock = '<ul class="navigation__dropdown">';

            foreach ($items as $item) {
                $itemsBlock .= <<<HTML
                    <li><a href="{$item->link}">{$item->caption}</a></li>
HTML;
            }
            $itemsBlock .='</ul>';
        }

        $sectionHTML = str_replace('</li>', '', $this->buildSectionWithoutChildren($caption, $link, $route));

        return $sectionHTML . $itemsBlock . '</li>';
    }

    public function buildMenu()
    {
        $menu = '';
        $categories = $this->getCategories();

        if ($categories instanceof Collection && count($categories) > 0) {
            foreach ($categories as $category) {
                $items = $this->getItems($category->id);
                //dump($items);

                if ($items instanceof Collection && count($items) > 0) {
                    $menu .= $this->buildSectionWithChildren($category->caption, $category->link, $items, $category->route);
                } else {
                    $menu .= $this->buildSectionWithoutChildren($category->caption, $category->link, $category->route);
                }
            }
        }

        return $menu;
    }
}
