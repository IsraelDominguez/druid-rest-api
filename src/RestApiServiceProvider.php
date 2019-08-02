<?php namespace Genetsis\Druid\Rest;

use Illuminate\Support\ServiceProvider;

class RestApiServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function boot()
    {

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('RestApi', function() {

            return new \Genetsis\Druid\Rest\RestApi([
                'username' => env('DRUID_ID'),
                'password' => env('DRUID_SECRET'),
                'api_host' => env('DRUID_REST_HOST')
            ],[
                'logger' => app('log')->channel('stack')->getLogger()
            ]);
        });
    }

}
