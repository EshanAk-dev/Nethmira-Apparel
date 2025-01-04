<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorModel extends Model
{
    use HasFactory;

    protected $table ='color';

    static public function getSingle($id){
        return self::find($id);
    }

    static public function getRecord(){
        return self::select('color.*', 'users.name as created_by_name')
        ->where('color.is_delete', "=", 0)
        ->join('users','users.id','=','color.created_by')
        ->orderBy('color.id','desc')
        ->get();
    }

    static public function getRecordActive(){
        return self::select('color.*')
        ->where('color.is_delete', "=", 0)
        ->where('color.status', "=", 0)
        ->join('users','users.id','=','color.created_by')
        ->orderBy('color.name','asc')
        ->get();
    }
}
