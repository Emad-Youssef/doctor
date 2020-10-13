<?php


if(!function_exists('permission')){
    function permission($per){
        return Auth()->user()->hasPermission($per);
    }
}

