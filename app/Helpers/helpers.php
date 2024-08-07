<?php 


use Illuminate\Support\Facades\Route;


 
function activeRoute($route_name){
    if (Route::currentRouteName() == $route_name){
        return 'active';
    }
}