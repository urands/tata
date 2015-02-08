<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;
use Gzero\EloquentTree\Model\Tree;


class Object extends Tree {

    public function  _construct( $filename){

    }

    /**
     * The database table used by the model.
     *
     * @var string
     */
     protected $table = 'object';

     protected $guarded = ['id', 'created_at', 'updated_at'];

     protected $fillable = array('name', 'project_id', 'uid');

     public function scopeProjectList($query, $project_id){

          //dd($project_id);
          return $query;
     }


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    public function project(){
        return $this->belongsTo('Project');
     }

    public static function  Signature($file){



        $filesize = filesize($file);
        $handle = fopen($file, "rb");
        $sum = 0;

        for ($i=0; $i < $filesize; $i++){
            $b = fread($handle, 1);
            $bin = ord($b);
            $sum+=$bin*($i&0x1FFF);
            // echo $i,": ", $sum, "<br/>";
        }
        $sum-= $filesize;
        $res = sprintf("%X", $sum);
        fclose($handle);
        return $res;
    }




    public static function LoadFromDisk($projectid){

       $fs = new Filesystem;
       $path = storage_path().'/projects/'.$projectid;
       $files = $fs->files($path);
       $content = array();
       foreach( $files as $file ){
          //$str = $file;
           $str = mb_convert_encoding(substr($file, strlen($path)+1), "utf-8", "cp1251");
         // $str = substr($file, strlen($path)+1);
          if ( $fs->isFile($file)){
              $fl['name'] = $str;
              $fl['type'] = $fs->type($file);
              $fl['ext'] = $fs->extension($file);

              $fl['signature'] = "done";
              //$fl['signature'] = Object::Signature($file);
              $content[] = $fl;
           }
            
        }
        return $content;
    }


}

