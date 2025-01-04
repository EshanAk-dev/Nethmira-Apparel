<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Request;

class OrderModel extends Model
{
    use HasFactory;

    protected $table = 'orders';

    static public function getSingle($id)
    {
        return self::find($id);
    }

    //User part

    static public function getTotalOrderUser($user_id)
    {
        return self::select('id')
            ->where('user_id','=', $user_id)
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->count();
    }

    static public function getTotalTodayOrdersUser($user_id){
        return self::select('id')
            ->where('user_id','=', $user_id)
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->count();
    }

    static public function getTotalPaymentUser($user_id)
    {
        return self::select('id')
            ->where('user_id','=', $user_id)
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->sum('total_amount');
    }

    static public function getTotalTodayPaymentUser($user_id){
        return self::select('id')
            ->where('user_id','=', $user_id)
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->sum('total_amount');
    }
    
    static public function getTotalStatustUser($user_id, $status)
    {
        return self::select('id')
            ->where('status', "=", $status)   
            ->where('user_id','=', $user_id)
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->count();
    }

    //End user part

    static public function getTotalOrder()
    {
        return self::select('id')
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->count();
    }

    static public function getTotalTodayOrders(){
        return self::select('id')
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->count();
    }

    static public function getTotalOrderMonth($start_date, $end_date){
        return self::select('id')
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->count();
    }

    static public function getTotalOrderAmountMonth($start_date, $end_date){
        return self::select('id')
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->whereDate('created_at', '>=', $start_date)
            ->whereDate('created_at', '<=', $end_date)
            ->sum('total_amount');
    }
    
    static public function getTotalPayment()
    {
        return self::select('id')
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->sum('total_amount');
    }

    static public function getTotalTodayPayment(){
        return self::select('id')
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->whereDate('created_at', '=', date('Y-m-d'))
            ->sum('total_amount');
    }

    static public function getLatestOrders(){
        return OrderModel::select('orders.*')
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc')
            ->limit(10)
            ->get();
    }

    static public function getRecordUser($user_id)
    {
        return  OrderModel::select('orders.*')
            ->where('user_id', '=', $user_id)
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc')
            ->paginate(10);
    }

    static public function getSingleUser($user_id, $id)
    {
        return  OrderModel::select('orders.*')
            ->where('user_id', '=', $user_id)
            ->where('id', '=', $id)
            ->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->first();
    }


    static public function getRecord()
    {
        $return = OrderModel::select('orders.*');

        if (!empty(Request::get('order_number'))) {
            $return = $return->where('order_number', '=', Request::get('order_number'));
        }

        if (!empty(Request::get('first_name'))) {
            $return = $return->where('first_name', 'like', '%' . Request::get('first_name') . '%');
        }

        if (!empty(Request::get('last_name'))) {
            $return = $return->where('last_name', 'like', '%' . Request::get('last_name') . '%');
        }

        if (!empty(Request::get('email'))) {
            $return = $return->where('email', 'like', '%' . Request::get('email') . '%');
        }

        if (!empty(Request::get('country'))) {
            $return = $return->where('country', 'like', '%' . Request::get('country') . '%');
        }

        if (!empty(Request::get('state'))) {
            $return = $return->where('state', 'like', '%' . Request::get('state') . '%');
        }

        if (!empty(Request::get('city'))) {
            $return = $return->where('city', 'like', '%' . Request::get('city') . '%');
        }

        if (!empty(Request::get('postcode'))) {
            $return = $return->where('postcode', 'like', '%' . Request::get('postcode') . '%');
        }

        if (!empty(Request::get('from_date'))) {
            $return = $return->whereDate('created_at', '>=', Request::get('from_date'));
        }

        if (!empty(Request::get('to_date'))) {
            $return = $return->whereDate('created_at', '<=', Request::get('to_date'));
        }

        $return = $return->where('is_payment', '=', 1)
            ->where('is_delete', '=', 0)
            ->orderBy('id', 'desc')
            ->paginate(25);

        return $return;
    }

    public function getShipping()
    {
        return $this->belongsTo(ShippingChargeModel::class, 'shipping_id');
    }

    public function getItem()
    {
        return $this->hasMany(OrderItemModel::class, 'order_id');
    }
}
