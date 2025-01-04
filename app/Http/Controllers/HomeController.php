<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PageModel;
use App\Models\ProductModel;
use App\Models\SystemSettingModel;

class HomeController extends Controller
{
   public function home(){
      $getPage = PageModel::getSlug('home');
      $data['getProduct'] = ProductModel::getProduct();
      $data['getPage'] = $getPage;

      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] = $getPage->meta_description;
      $data['meta_keywords'] = $getPage->meta_keywords;

      return view('home', $data);
   }

   public function contact(){
      $getPage = PageModel::getSlug('contact');
      $data['getPage'] = $getPage;
      $data['getSystemSetting'] = SystemSettingModel::getSingle();

      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] = $getPage->meta_description;
      $data['meta_keywords'] = $getPage->meta_keywords;

      return view('page.contact', $data);
   }

   public function about(){
      $getPage = PageModel::getSlug('about');
      $data['getPage'] = $getPage;

      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] = $getPage->meta_description;
      $data['meta_keywords'] = $getPage->meta_keywords;

      return view('page.about', $data);
   }

   public function faq(){
      $getPage = PageModel::getSlug('faq');
      $data['getPage'] = $getPage;

      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] = $getPage->meta_description;
      $data['meta_keywords'] = $getPage->meta_keywords;

      return view('page.faq', $data);
   }

   public function payment_method(){
      $getPage= PageModel::getSlug('payment-method');
      $data['getPage'] = $getPage;

      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] = $getPage->meta_description;
      $data['meta_keywords'] = $getPage->meta_keywords;

      return view('page.payment_method', $data);
   }

   public function returns(){
      $getPage = PageModel::getSlug('returns');
      $data['getPage'] = $getPage;

      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] = $getPage->meta_description;
      $data['meta_keywords'] = $getPage->meta_keywords;

      return view('page.returns', $data);
   }

   public function shipping(){
      $getPage = PageModel::getSlug('shipping');
      $data['getPage'] = $getPage;

      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] = $getPage->meta_description;
      $data['meta_keywords'] = $getPage->meta_keywords;

      return view('page.shipping', $data);
   }

   public function terms_condition(){
      $getPage = PageModel::getSlug('terms-condition');
      $data['getPage'] = $getPage;

      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] = $getPage->meta_description;
      $data['meta_keywords'] = $getPage->meta_keywords;

      return view('page.terms_condition', $data);;
   }

   public function privacy_policy(){
      $getPage = PageModel::getSlug('privacy-policy');
      $data['getPage'] = $getPage;

      $data['meta_title'] = $getPage->meta_title;
      $data['meta_description'] = $getPage->meta_description;
      $data['meta_keywords'] = $getPage->meta_keywords;
      return view('page.privacy_policy', $data);
   }

}
