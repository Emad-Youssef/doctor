<?php

namespace App\Http\Controllers;

use App\News;
use App\Service;
use App\Fact;
use App\Media;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $title = 'home';
        $slider     = News::orderBy('id', 'desc')->take(3)->where('on_slider', 1)->get();
        $services   = Service::orderBy('id', 'desc')->take(6)->get();
        $facts      = Fact::orderBy('id', 'desc')->take(6)->get();
        $media      = Media::orderBy('id', 'desc')->where('status', 1)->get();
        $news       = News::orderBy('id', 'desc')->take(6)->where('status', 1)->get();
        $last_news  = News::orderBy('id', 'desc')->take(3)->where('status', 1)->get();

        return view('front.home',compact('title','slider','services','facts','media', 'news','last_news'));
    }

    public function about()
    {
        $title = 'about_us';
        $facts      = Fact::orderBy('id', 'desc')->take(6)->get();
        $news       = News::orderBy('id', 'desc')->take(6)->where('status', 1)->get();
        $last_news  = News::orderBy('id', 'desc')->take(3)->where('status', 1)->get();

        return view('front.about',compact('title','facts','last_news'));

    }

    public function servecs()
    {
        $title = 'servecs';
        $services_l   = Service::orderBy('id', 'desc')->offset(1)->take(3)->get();
        $services_r   = Service::orderBy('id', 'desc')->offset(4)->take(3)->get();
        $news       = News::orderBy('id', 'desc')->take(6)->where('status', 1)->get();
        $last_news  = News::orderBy('id', 'desc')->take(3)->where('status', 1)->get();

        return view('front.servecs',compact('title','services_l','services_r','last_news'));

    }

    public function news()
    {
        $title = 'news';
        $news       = News::orderBy('id', 'desc')->where('status', 1)->paginate(6);
        $last_news  = News::orderBy('id', 'desc')->take(3)->where('status', 1)->get();

        return view('front.news',compact('title','news','last_news'));

    }

    public function show_news($id)
    {
        
        $new       = News::find($id);
        $title = $new->title;
        $last_news  = News::orderBy('id', 'desc')->take(3)->where('status', 1)->get();

        return view('front.show_news',compact('title','new','last_news'));

    }
}
