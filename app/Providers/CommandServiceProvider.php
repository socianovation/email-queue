<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\EmailListenerCommand;

class CommandServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.email.listener', function()
        {
            return new EmailListenerCommand;
        });

        $this->commands(
            'command.email.listener'
        );
    }
}
