<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductWishlistModel extends Model
{
    use HasFactory;

    static public function getSingle($id){
        return self::find($id);
    }

    protected $table ='product_wishlist';

    static function DeleteRecord($product_id, $user_id){
        self::where('product_id', '=', $product_id)->where('user_id', '=', $user_id)->delete();
    }
    
    static function checkAlready($product_id, $user_id){
        return self::where('product_id', '=', $product_id)->where('user_id', '=', $user_id)->count();
    }
}
