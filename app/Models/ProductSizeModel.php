<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSizeModel extends Model
{
    use HasFactory;

    static public function getSingle($id){
        return self::find($id);
    }

    protected $table ='product_size';

    static function DeleteRecord($product_id){
        self::where('product_id', '=', $product_id)->delete();
    }
}
