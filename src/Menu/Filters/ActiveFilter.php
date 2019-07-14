<?php

namespace I9code\LaravelMetronic2\Menu\Filters;

use I9code\LaravelMetronic2\Menu\ActiveChecker;
use I9code\LaravelMetronic2\Menu\Builder;

class ActiveFilter implements FilterInterface
{
    private $activeChecker;

    public function __construct(ActiveChecker $activeChecker)
    {
        $this->activeChecker = $activeChecker;
    }

    public function transform($item, Builder $builder)
    {
        if (!isset($item['header'])) {
            $item['active'] = $this->activeChecker->isActive($item);
        }

        return $item;
    }
}
