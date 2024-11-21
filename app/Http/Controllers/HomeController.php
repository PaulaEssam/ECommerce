<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BlogComment;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Page;
use App\Models\Product;
use App\Models\slider;
use App\Models\SystemSettings;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home()
    {
        $getSlider = slider::all();
        $getCategory = Category::where('status',0)->orderByDESC('id')->limit(6)->get();
        $getProduct = Product::getRecentArrival();
        $getTrendyProducts = Product::getTrendyProducts();
        $getBlog = Blog::where('status',0)->limit(3)->orderByDESC('id')->get();
        return view('home',compact('getSlider','getCategory','getProduct','getTrendyProducts','getBlog'));
    }

    public function recent_arrival_category_products(Request $request)
    {
        $getProduct = Product::getRecentArrival();
        $getCategory = Category::find($request->cat_id);

        return response()->json([
            "status" => true,
            "success" => view("product.filter_list_recent_arrival",[
                "getProduct" =>$getProduct,
                "getCategory" =>$getCategory,
            ])->render(),
        ],200);
    }

    public function contact()
    {
        $first_num = mt_rand(0,9);
        $second_num = mt_rand(0,9);
        Session::put('total_sum', $first_num + $second_num);

        $getPage = Page::where('slug', 'contact')->first();
        $getSystemSettingApp = SystemSettings::find(1);

        return view('page.contact',compact('getPage','getSystemSettingApp','first_num','second_num'));
    }

    public function submit_contact(Request $request)
    {
        if(Session::get('total_sum') == $request->verification){
            $save = new ContactUs();
            if(!empty(Auth::check())){
                $save->user_id = Auth::user()->id;
            }
            $save->name = $request->name;
            $save->email = $request->email;
            $save->phone = $request->phone;
            $save->subject = $request->subject;
            $save->message = $request->message;
            $save->save();
            return redirect()->back()->with('success', 'Your message has been sent successfully');
        }
        else
        {
            return redirect()->back()->with('error', 'Verification failed');
        }
    }

    public function about()
    {
        $getPage = Page::where('slug', 'about')->first();
        return view('page.about',compact('getPage'));
    }

    public function fag()
    {
        $getPage = Page::where('slug', 'fag')->first();
        return view('page.fag',compact('getPage'));
    }

    public function blog(Request $request)
    {
        $getPage = Page::where('slug', 'blog')->first();
        $getBlog = Blog::where('status', 0);
        if(!empty($request->get('search')))
        {
            $getBlog = $getBlog->where('title', 'like', '%' . $request->get('search') . '%');

        }
        $getBlog = $getBlog->orderByDESC('id')->paginate(20);
        $getBlogCategory = BlogCategory::where('status', 0)->get();
        $getPopular = Blog::where('status',0)->orderByDESC('total_views')->limit(6)->get();

        return view('blog.list',compact('getPage','getBlog','getBlogCategory','getPopular'));

    }
    public function blog_detail($slug)
    {
        $getBlog = Blog::where('status', 0)->where('slug',$slug)->first();
        if(!empty($getBlog))
        {
            $totalViews = $getBlog->total_views ;
            $getBlog->total_views = $totalViews + 1;
            $getBlog->save();
            $getBlogCategory = BlogCategory::where('status', 0)->get();
            $getPopular = Blog::where('status',0)->orderByDESC('total_views')->limit(6)->get();
            $getRelatedPost = Blog::where('status',0)->where('bolg_category_id',$getBlog->bolg_category_id)->where('id','!=',$getBlog->id)->orderByDESC('total_views')->limit(6)->get();
            return view('blog.detail',compact('getBlogCategory','getBlog','getPopular','getRelatedPost'));
        }
        else
        {
            abort(404);
        }

    }
    public function blog_category($slug)
    {
        $getCategory = BlogCategory::where('status', 0)->where('slug',$slug)->first();
        if(!empty($getCategory))
        {
            $getBlogCategory = BlogCategory::where('status', 0)->get();
            $getPopular = Blog::where('status',0)->orderByDESC('total_views')->limit(6)->get();
            $getRelatedPost = Blog::where('status',0)->where('bolg_category_id',$getCategory->bolg_category_id)->where('id','!=',$getCategory->id)->orderByDESC('total_views')->limit(6)->get();
            $getBlog = Blog::getBlog($getCategory->id);
            return view('blog.category',compact('getBlogCategory','getCategory','getPopular','getRelatedPost','getBlog'));
        }
        else
        {
            abort(404);
        }

    }

    public function submit_blog_comment(Request $request)
    {
        $comment = new BlogComment();
        $comment->user_id = Auth::user()->id;
        $comment->blog_id = $request->blog_id;
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->back()->with('success','Your Comment Send Successfully');
    }
}
