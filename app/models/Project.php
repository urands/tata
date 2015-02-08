<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;


class Project extends Eloquent {

    public function  _construct( $filename){

    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'project';

     protected $guarded = ['id', 'created_at', 'updated_at'];


     public function object(){
        return $this->hasMany('Object');
     }



    public static function ulist($projectid){
      $array = Project::LoadFromDisk($projectid);
      $arraydb = Project::find($projectid)->object()->lists('name'); 
      $array =  array_diff($array, $arraydb);
      return $array;
    }



    public static function LoadFromDisk($projectid){

       $fs = new Filesystem;
       $path = storage_path().'/projects/'.$projectid;
       $files = $fs->files($path);
       $content = array();
       foreach( $files as $file ){
          //$str = $file;
         //   $str = mb_convert_encoding(substr($file, strlen($path)+1), "utf-8", "cp1251");
          $str = substr($file, strlen($path)+1);
          if ( $fs->isFile($file)){
              //$fl['name'] = $str;
              //$fl['type'] = $fs->type($file);
          //    $fl['ext'] = $fs->extension($file);

          //     $fl['signature'] = "done";
             // $fl['signature'] = Object::Signature($file);
              $content[] = iconv("cp1251", "utf-8", $str); //$fl;
           }
            
        }
        return $content;
    }


}

