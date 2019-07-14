<?php

namespace I9code\LaravelMetronic2\Menu\Filters;


use I9code\LaravelMetronic2\Menu\Builder;

class SubmenuFilter implements FilterInterface
{
    public function transform($item, Builder $builder)
    {
        if (isset($item['submenu'])) {
            $item['submenu'] = $builder->transformItems($item['submenu']);
            $item['submenu_open'] = $item['active'];
            $item['submenu_classes'] = $this->makeSubmenuClasses();
            $item['submenu_class'] = implode(' ', $item['submenu_classes']);
        }

        return $item;
    }

    protected function makeSubmenuClasses()
    {
        $classes = ['sub-menu'];

        return $classes;
    }
}
