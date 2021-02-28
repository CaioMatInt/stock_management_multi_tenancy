<?php

namespace App\Providers;

use Response;
use Illuminate\Support\ServiceProvider;

class ResponseMacroServiceProvider extends ServiceProvider
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
        Response::macro('success', function (int $code = null, string $message = null, $data = null) {
            $responseDataArray = [
                "success" => "true",
                "message" => $message
            ];

            if($data){
                $responseDataArray['data'] = $data;
                return response($responseDataArray, $code ?? 200);
            }

            return response($responseDataArray, $code ?? 200);
        });

        Response::macro('error', function (int $code = null, string $message = null, $data = null) {
            $responseDataArray = [
                "success" => "false",
                "message" => $message ?? 'Erro interno no servidor'
            ];

            if($data){
                $responseDataArray['data'] = $data;
                return response($responseDataArray, $code ?? 500);
            }

            return response($responseDataArray, $code ?? 500);

        });

    }
}
