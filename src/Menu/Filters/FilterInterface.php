<?php

namespace I9code\LaravelMetronic2\Menu\Filters;

use I9code\LaravelMetronic2\Menu\Builder;

interface FilterInterface
{
    public function transform($item, Builder $builder);
}
