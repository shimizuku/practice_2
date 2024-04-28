<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Menu_Categories;

class MenuController extends Controller
{
    public function index()
    {
        $menus = array();
        $categories = Menu_Categories::get();
        $all_menus = Menu::orderBy('menu_category_id', 'asc')->orderBy('turn', 'asc')->get();
        foreach ($categories as $k => $v) {
            $menus[$v['id']] = array();
        }
        foreach ($all_menus as $k2 => $v2) {
            foreach ($menus as $k3 => $v3) {
                if ($v2['menu_category_id'] == $k3) {
                    $menus[$k3][$k2] = ['name' => $v2['name'], 'price' => $v2['price']];
                }
            }
        }
        return view('menu',compact('menus', 'categories'));
    }
}
