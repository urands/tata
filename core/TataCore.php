<?php

namespace Tata;

use Illuminate\Support\Facades\Facade;
use Illuminate\Database;

class TataCore extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'tata'; }


    public static function Routers(){


        $uri = \Request::path();

        \Debug::info($uri);


/*
        switch ( $page->method ){
            case 'any':
                \Route::any($page->route, $page->bind );
                break;
            case 'get':
                \Route::get($page->route, $page->bind );
                break;
            case 'post':
                \Route::post($page->route, $page->bind );
                break;
        }
*/
        \Route::any( $uri, function(){
            $components =  \DB::table('pages')->get();
            foreach ($components as $component){
                \Debug::info($component);
                \App::action($component->bind);

            }
        });
    }


    public static function test(){

        echo "test core enabled";

        TataCore::Routers();
    }



}