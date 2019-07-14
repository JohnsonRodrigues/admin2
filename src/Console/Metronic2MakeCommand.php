<?php

namespace I9code\LaravelMetronic2\Console;

use Illuminate\Auth\Console\AuthMakeCommand;

class Metronic2MakeCommand extends AuthMakeCommand
{
    protected $signature = 'make:metronic2 {--views : Only scaffold the authentication views}{--force : Overwrite existing views by default}';

    protected $description = 'Scaffold basic Metronic2 login and registration views and routes';

    protected $metronicViews = [
        'auth/login.stub'           => 'auth/clube/login.blade.php',
        'auth/register.stub'        => 'auth/clube/register.blade.php',
        'auth/passwords/email.stub' => 'auth/clube/passwords/email.blade.php',
        'auth/passwords/reset.stub' => 'auth/clube/passwords/reset.blade.php',
        'auth/verify.stub'          => 'auth/clube/verify.blade.php',
        'home.stub'                 => 'clube/home.blade.php',
    ];

    protected function exportViews()
    {
        parent::exportViews();

        foreach ($this->metronicViews as $key => $value) {
            copy(__DIR__.'/stubs/make/views/'.$key,
                base_path('resources/views/'.$value));
        }
    }
}
