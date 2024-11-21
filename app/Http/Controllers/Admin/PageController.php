<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Page;
use App\Models\SystemSettings;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function list()
    {
        $getRecord = Page::all();
        return view('admin.page.list',compact('getRecord'));
    }

    public function edit($id)
    {
        $page = Page::find($id);
        return view('admin.page.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::find($id);
        $page->name             = $request->input('name');
        $page->slug             = $request->input('slug');
        $page->title            = $request->input('title');
        $page->description      = $request->input('description');
        $page->meta_title       = $request->input('meta_title');
        $page->meta_description = $request->input('meta_description');
        $page->meta_keywords    = $request->input('meta_keywords');
        $page->save();

        if (!empty($request->file('image')))
        {
            $file = $request->file('image');
            $ext =  $file->getClientOriginalExtension();
            $filename = strtolower( $page->id . Str::random(20) . '.'. $ext );
            $file->move('uploaded_files/page',$filename);

            $page->image_name = $filename;
            $page->save();
        }
        return redirect('admin/page/list')->with('success','Page Updated Successfully');


    }

    public function delete($id)
    {
        $Page = Page::find($id);
        $Page->delete();
        return redirect()->back()->with('success','Page Deleted Successfully');

    }

    public function system_settings()
    {
        $website = SystemSettings::find(1);
        return view('admin.system.system-settings',compact('website'));
    }

    public function update_system_settings(Request $request)
    {
        $save = SystemSettings::find(1);
        $save->website_name = $request->website_name;
        $save->logo = $request->logo;
        $save->fevicon = $request->fevicon;
        $save->footer_description = $request->footer_description;
        $save->footer_payment_icon = $request->footer_payment_icon;
        $save->address = $request->address;
        $save->phone = $request->phone;
        $save->phone_two = $request->phone_two;
        $save->email = $request->email;
        $save->facebook = $request->facebook;
        $save->twitter = $request->twitter;
        $save->instagram = $request->instagram;
        $save->youtube = $request->youtube;
        $save->pinterest = $request->pinterest;
        $save->save();
        if (!empty($request->file('logo')))
        {
            $file = $request->file('logo');
            $ext =  $file->getClientOriginalExtension();
            $filename = strtolower( $save->id . Str::random(10) . '.'. $ext );
            $file->move('uploaded_files/settings',$filename);
            $save->logo = $filename;
        }

        if (!empty($request->file('fevicon')))
        {
            $file = $request->file('fevicon');
            $ext =  $file->getClientOriginalExtension();
            $filename = strtolower( $save->id . Str::random(10) . '.'. $ext );
            $file->move('uploaded_files/settings',$filename);
            $save->fevicon = $filename;
        }

        if (!empty($request->file('footer_payment_icon')))
        {
            $file = $request->file('footer_payment_icon');
            $ext =  $file->getClientOriginalExtension();
            $filename = strtolower( $save->id . Str::random(10) . '.'. $ext );
            $file->move('uploaded_files/settings',$filename);
            $save->footer_payment_icon = $filename;
        }
        $save->save();
        return redirect()->back()->with('success','System Settings Updated Successfully');
    }

    public function contact()
    {
        $getRecord = ContactUs::paginate(20);
        return view('admin.page.contact',compact('getRecord'));
    }

    public function delete_message($id)
    {
        $msg = ContactUs::find($id) ;
        $msg->delete();
        return redirect()->back()->with('success','Message Deleted Successfully');
    }
}
