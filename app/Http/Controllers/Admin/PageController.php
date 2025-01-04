<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageModel;
use App\Models\SystemSettingModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function list()
    {
        $data['getRecord'] = PageModel::getRecord();
        $data['header_title'] = "Pages";
        return view('admin.page.list', $data);
    }

    public function edit($id)
    {
        $data['getRecord'] = PageModel::getSingle($id);
        $data['header_title'] = "Edit Page";
        return view('admin.page.edit', $data);
    }

    public function update($id, Request $request)
    {

        $page = PageModel::getSingle($id);
        $page->name = trim($request->name);
        $page->title = trim($request->title);
        $page->description = trim($request->description);
        $page->meta_title = trim($request->meta_title);
        $page->meta_description = trim($request->meta_description);
        $page->meta_keywords = trim($request->meta_keywords);
        $page->save();

        if (!empty($request->file('image'))) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $randomStr = $page->id . Str::random(20);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/page/', $filename);

            $page->image_name = trim($filename);
            $page->save();
        }

        return redirect('admin/page/list')->with('success', "Page Successfully Updated.");
    }

    public function system_setting(){
        $data['getRecord'] = SystemSettingModel::getSingle();
        $data['header_title'] = "System Settings";
        return view('admin.setting.system_setting', $data);
    }

    public function update_system_setting(Request $request){
         $save = SystemSettingModel::getSingle();
         $save->website_name = trim($request->website_name);
         $save->footer_description = trim($request->footer_description);
         $save->address = trim($request->address);
         $save->phone = trim($request->phone);
         $save->submit_email = trim($request->submit_email);
         $save->email = trim($request->email);
         $save->working_hour = trim($request->working_hour);
         $save->facebook_link = trim($request->facebook_link);
         $save->twitter_link = trim($request->twitter_link);
         $save->instagram_link = trim($request->instagram_link);
         $save->youtube_link = trim($request->youtube_link);
         $save->pinterest_link = trim($request->pinterest_link);
         $save->website_name = trim($request->website_name);
         $save->website_name = trim($request->website_name);

        if (!empty($request->file('logo'))) {
            $file = $request->file('logo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/setting/', $filename);

            $save->logo = trim($filename);
        }

        if (!empty($request->file('footer_logo'))) {
            $file = $request->file('footer_logo');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/setting/', $filename);

            $save->footer_logo = trim($filename);
        }

        if (!empty($request->file('fevicon'))) {
            $file = $request->file('fevicon');
            $ext = $file->getClientOriginalExtension();
            $randomStr = Str::random(10);
            $filename = strtolower($randomStr) . '.' . $ext;
            $file->move('upload/setting/', $filename);

            $save->fevicon = trim($filename);
        }

         $save->save();

         return redirect()->back()->with('success', "Settings Successfully Updated.");
    }
}
