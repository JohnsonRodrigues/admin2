<?php

namespace I9code\LaravelMetronic2\Events;


use I9code\LaravelMetronic2\Menu\Builder;

class BuildingMenu
{
    public $menu;

    public function __construct(Builder $menu)
    {
        $this->menu = $menu;
    }
}
