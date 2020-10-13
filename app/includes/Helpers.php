<?php

namespace App\Includes;


class Helpers
{
    public static function upload($file, $dir){
        $sha1 = sha1($file->getClientOriginalName());
        $extension = $file->getClientOriginalExtension();
        $filename = $sha1.".".$extension;
        $path = public_path('/uploads/'.$dir.'/'.date('Y').'/'.date('m').'/'.date('d'));
        $file->move($path, $filename);
        return $dir.'/'.date('Y').'/'.date('m').'/'.date('d').'/'.$filename;
    }

   
}
