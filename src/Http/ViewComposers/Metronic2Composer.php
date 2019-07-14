<?php

namespace I9code\LaravelMetronic2\Http\ViewComposers;

use I9code\LaravelMetronic2\Metronic2;
use Illuminate\View\View;


class Metronic2Composer
{
    /**
     * @var Metronic2
     */
    private $metronic2;

    public function __construct(Metronic2 $metronic2)
    {
        $this->metronic2 = $metronic2;
    }

    public function compose(View $view)
    {
        $view->with('metronic2', $this->metronic2);
    }
}
