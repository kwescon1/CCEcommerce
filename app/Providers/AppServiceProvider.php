<?php

namespace App\Providers;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Resources\Json\JsonResource;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //

        Schema::defaultStringLength(191);
        JsonResource::withoutwrapping();

        Response::macro('success', function ($data) {
            return response()->json([
                'data' => $data ?: null,
            ]);
        });

        Response::macro('created', function ($data) {
            return response()->json([
                'data' => $data ?: null,
            ], \Illuminate\Http\Response::HTTP_CREATED);
        });

        Response::macro('notfound', function ($error) {
            return response()->json([
                'error' => $error,
            ], \Illuminate\Http\Response::HTTP_NOT_FOUND);
        });

        Response::macro('error', function ($error, $statusCode = \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR) {
            return response()->json([
                'error' => $error,
            ], $statusCode);
        });

        // Model::shouldBeStrict(!$this->app->isProduction());
    }
}
