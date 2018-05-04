<?php


namespace App\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function pages($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if (!empty($page)) {
            return view('pages.show')->with('page', $page);
        }
        else{
            return abort(404);
        }       
    }
}
