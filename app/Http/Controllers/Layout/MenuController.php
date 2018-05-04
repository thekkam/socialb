<?php

namespace App\Http\Controllers\Layout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Menu;
use App\Page;

class MenuController extends Controller
{
    public function index(){

    	return view('admin.menus.index');
    }

    public function create(){

    	return view('admin.menus.create');
    }

    public function store(Request $request){
    	$menu = new Menu;
    	$menu->create($request->all());

    	return redirect('menus/');
    }

    public function destroy($id){
        $menu = Menu::find($id);
        $menu->delete();

        return redirect('menus/');
    }

    public function edit($id){
        $menu = Menu::find($id);

        return view('admin.menus.edit')->with('menu', $menu);
    }

    public function update(Request $request, $id){
        $menu = Menu::find($id);
        $menu->update($request->all());

        return redirect('menus/');
    }
}
