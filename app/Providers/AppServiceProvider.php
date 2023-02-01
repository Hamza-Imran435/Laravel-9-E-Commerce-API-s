<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

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
         Response::macro('success', function ($message, $data = null){
            if ($data == null) {
                return response()->json([
                    'status' => 'true',
                    'ResponseMessage'   =>  $message,
                    // 'data'              =>  $data
                ]);
            }else{
                return response()->json([
                    'ResponseMessage'   =>  $message,
                    'data'              =>  $data
                ]);
            }

       });

       Response::macro('error', function ($message, $data = null){
        if ($data == null) {
            return response()->json([
                'status' => 'true',
                'ResponseMessage'   =>  $message,
                // 'data'              =>  $data
            ]);
        }else{
            return response()->json([
                'ResponseMessage'   =>  $message,
                'data'              =>  $data
            ]);
        }

   });
    }
}
