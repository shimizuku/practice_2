<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menu_Categories;

class MenuController extends Controller
{
    public function list()
    {
        $menus = Menu::sortable()->get();
        return view('admin.menu.list', compact('menus'));
    }

    public function dalete(Request $request)
    {
        $dalete_id = $request->delete;
        Menu::find($dalete_id)->delete();
        $data = Menu::sortable()->get();
        return view('admin.menu.list', compact('data'));
    }

    public function inputCreate()
    {
        $type = '新規作成';
        return view('admin.menu.input', compact('type'));
    }

    public function inputEdit(id $id)
    {
        $type = '編集';
        $data = Menu::find($id);
        return view('admin.menu.input', compact('data'), compact('type'));
    }

    public function postInputCreate(menuFormRequest $request)
    {
        $type = '新規作成';
        $data = $request->all();
        return view('admin.menu.input', compact('data'), compact('type'));
    }

    public function postInputEdit(menuFormRequest $request)
    {
        $type = '編集';
        $data = $request->all();
        return view('admin.menu.input', compact('data'), compact('type'));
    }

    public function confirmCreate(menuFormRequest $request)
    {
        $type = '新規作成';
        $data = $request->all();
        $categories = Menu_Categories::all();
        return view('admin.menu.confirm', compact('data'), compact('categories'), compact('type'));
    }

    public function confirmEdit(menuFormRequest $request)
    {
        $type = '編集';
        $data = $request->all();
        $categories = Menu_Categories::all();
        return view('admin.menu.confirm', compact('data'), compact('categories'), compact('type'));
    }

    public function resultCreate(menuFormRequest $request)
    {
        $type = '新規作成';
        $menu_category_id = $request->input('menu_category_id');
        $name = $request->input('name');
        $price = $request->input('price');
        $turn = $request->input('turn');
        $create_user = $request->input('create_user');
        Menu::create(compact('menu_category_id', 'name', 'price', 'turn', 'create_user',));
        $request->session()->regenerateToken();
        return view('admin.menu.result',compact('type'));
    }

    public function resultEdit(menuFormRequest $request)
    {
        $type = '編集';
        $menus = Menu::find($request->id);
        $menus->menu_category_id = $request->menu_category_id;
        $menus->name = $request->name;
        $menus->price = $request->price;
        $menus->turn = $request->turn;
        $menus->update_user = $request->update_user;
        $menus->save();
        $request->session()->regenerateToken();
        return view('admin.menu.result',compact('type'));
    }
}
