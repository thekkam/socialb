<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use Illuminate\Support\Str as Str;

class PageController extends Controller
{
    public function index(){
    	$pagesi = Page::orderBy('id', 'ASC')->paginate('10');
    	return view('admin.pages.index')->with('pagesi', $pagesi);
    }
    public function create(){

    	return view('admin.pages.create');
    }

    public function store(Request $request){
    	$page = new Page;
        $slug = $request->title;
        $slug = Str::slug($slug);
    	$page->title = $request->title;
        $page->content =  $request->content;
        $page->state = $request->state;
        $page->slug = $slug;
        $page->save();

    	return redirect('pages/');
    }

    public function destroy($id){
        $page = Page::find($id);
        $page->delete();

        return redirect('pages/');
    }

    public function edit($id){
        $page = Page::find($id);

        return view('admin.pages.edit')->with('page', $page);
    }

    public function update(Request $request, $id){
        $page = Page::find($id);
        if ($page->title != $request->title) {
            $slug = $request->title;
            $slug = Str::slug($slug);
            $page->title = $request->title;
            $page->content =  $request->content;
            $page->state = $request->state;
            $page->slug = $slug;
            $page->save();
        }
        else{
            $page->update($request->all());
        }

        return redirect('pages/');
    }
}
