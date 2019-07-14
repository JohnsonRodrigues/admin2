<?php

namespace I9code\LaravelMetronic2;

use I9code\LaravelMetronic2\Console\MakeMetronic2Command;
use I9code\LaravelMetronic2\Console\Metronic2MakeCommand;
use I9code\LaravelMetronic2\Events\BuildingMenu;
use I9code\LaravelMetronic2\Http\ViewComposers\Metronic2Composer;
use Illuminate\Contracts\Config\Repository;
use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Events\Dispatcher;
use Illuminate\Contracts\View\Factory;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    public function register()
    {
        $this->app->singleton(Metronic2::class, function (Container $app) {
            return new Metronic(
                $app['config']['metronic2.filters'],
                $app['events'],
                $app
            );
        });
    }

    public function boot(
        Factory $view,
        Dispatcher $events,
        Repository $config
    )
    {
        $this->loadViews();

        $this->loadTranslations();

        $this->publishConfig();

        $this->publishAssets();

        $this->registerCommands();

        $this->registerViewComposers($view);

        static::registerMenu($events, $config);
    }

    private function loadViews()
    {
        $viewsPath = $this->packagePath('resources/views');

        $this->loadViewsFrom($viewsPath, 'metronic2');

        $this->publishes([
            $viewsPath => base_path('resources/views/vendor/metronic2'),
        ], 'views');
    }

    private function loadTranslations()
    {
        $translationsPath = $this->packagePath('resources/lang');

        $this->loadTranslationsFrom($translationsPath, 'metronic2');

        $this->publishes([
            $translationsPath => base_path('resources/lang/vendor/metronic2'),
        ], 'translations');
    }

    private function publishConfig()
    {
        $configPath = $this->packagePath('config/metronic2.php');

        $this->publishes([
            $configPath => config_path('metronic2.php'),
        ], 'config');

        $this->mergeConfigFrom($configPath, 'metronic2');
    }

    private function publishAssets()
    {
        $this->publishes([
            $this->packagePath('resources/assets') => public_path('vendor/metronic2'),
        ], 'assets');
    }

    private function packagePath($path)
    {
        return __DIR__ . "/../$path";
    }

    private function registerCommands()
    {
        // Laravel >=5.2 only
        if (class_exists('Illuminate\\Auth\\Console\\MakeAuthCommand')) {
            $this->commands(MakeMetronic2Command::class);
        } elseif (class_exists('Illuminate\\Auth\\Console\\AuthMakeCommand')) {
            $this->commands(Metronic2MakeCommand::class);
        }
    }

    private function registerViewComposers(Factory $view)
    {
        $view->composer('metronic2::page', Metronic2Composer::class);
    }

    public static function registerMenu(Dispatcher $events, Repository $config)
    {
        $events->listen(BuildingMenu::class, function (BuildingMenu $event) use ($config) {
            $menu = $config->get('metronic2.menu');
            call_user_func_array([$event->menu, 'add'], $menu);
        });
    }
}
