<?php

namespace App\Http\Controllers;

use App\Models\OrderModel;
use App\Models\ProductWishlistModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
   public function dashboard()
   {
      $data['meta_title'] = 'Dashboard';
      $data['meta_description'] = '';
      $data['meta_keywords'] = '';

      $data['TotalOrder'] = OrderModel::getTotalOrderUser(Auth::user()->id);
      $data['TotalTodayOrder'] = OrderModel::getTotalTodayOrdersUser(Auth::user()->id);
      $data['TotalPayment'] = OrderModel::getTotalPaymentUser(Auth::user()->id);
      $data['TotalTodayPayment'] = OrderModel::getTotalTodayPaymentUser(Auth::user()->id);

      $data['TotalPending'] = OrderModel::getTotalStatustUser(Auth::user()->id, 0);
      $data['TotalInprogress'] = OrderModel::getTotalStatustUser(Auth::user()->id, 1);
      $data['TotalCompleted'] = OrderModel::getTotalStatustUser(Auth::user()->id, 3);
      $data['TotalCancelled'] = OrderModel::getTotalStatustUser(Auth::user()->id, 4);

      return view('user.dashboard', $data);
   }

   public function orders()
   {
      $data['getRecord'] = OrderModel::getRecordUser(Auth::user()->id);
      $data['meta_title'] = 'Orders';
      $data['meta_description'] = '';
      $data['meta_keywords'] = '';

      return view('user.orders', $data);
   }

   public function orders_detail($id)
   {
      $data['getRecord'] = OrderModel::getSingleUser(Auth::user()->id, $id);
      if (!empty($data['getRecord'])) {
         $data['meta_title'] = 'Order Details';
         $data['meta_description'] = '';
         $data['meta_keywords'] = '';

         return view('user.order_detail', $data);
      } else {
         abort(404);
      }
   }

   public function edit_profile()
   {
      $data['meta_title'] = 'Edit Profile';
      $data['meta_description'] = '';
      $data['meta_keywords'] = '';

      $data['getRecord'] = User::getSingle(Auth::user()->id);

      return view('user.edit_profile', $data);
   }

   public function update_profile(Request $request)
   {
      $user = User::getSingle(Auth::user()->id);
      $user->name = trim($request->first_name);
      $user->last_name = trim($request->last_name);
      $user->country = trim($request->country);
      $user->address_one = trim($request->address_one);
      $user->address_two = trim($request->address_two);
      $user->city = trim($request->city);
      $user->state = trim($request->state);
      $user->postcode = trim($request->postcode);
      $user->phone = trim($request->phone);
      $user->save();

      return redirect()->back()->with('success', 'Profile successfully updated.');
   }

   public function change_password()
   {
      $data['meta_title'] = 'Change Password';
      $data['meta_description'] = '';
      $data['meta_keywords'] = '';

      return view('user.change_password', $data);
   }

   public function update_password(Request $request)
   {
      $user = User::getSingle(Auth::user()->id);
      if (Hash::check($request->old_password, $user->password)) {
         if ($request->password == $request->cpassword) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Password successfully updated.');
         } else {
            return redirect()->back()->with('error', 'New password and confirm password does not match.');
         }
      } else {
         return redirect()->back()->with('error', 'Old password is not correct.');
      }
   }

   public function add_to_wishlist(Request $request)
   {
      $check = ProductWishlistModel::checkAlready($request->product_id, Auth::user()->id);
      if (empty($check)) {
         $save = new ProductWishlistModel();
         $save->product_id = $request->product_id;
         $save->user_id = Auth::user()->id;
         $save->save();
         
         $json['is_wishlist'] = 1; //added
      }
      else{
         ProductWishlistModel::DeleteRecord($request->product_id, Auth::user()->id);
         $json['is_wishlist'] = 0; //not added
      }

      $json['status'] = true;
      echo json_encode($json);
   }
}
