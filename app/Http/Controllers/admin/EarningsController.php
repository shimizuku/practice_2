<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Earning;
use App\Models\EarningDetail;
use App\Models\Menu;
use App\Models\Menu_Categories;

class EarningsController extends Controller
{
    static function getDateEarnings($date)
    {
        return DB::select(
            'SELECT '
                . ' e.id '
                . ' , e.date '
                . ' , e.visit_at AS visit_at '
                . ' , e.customer_name '
                . ' , GROUP_CONCAT(d.name) AS menu_name '
                . ' , SUM(d.price) AS sum_price '
            . ' FROM '
                . ' earnings AS e '
            . ' LEFT JOIN '
                . ' earning_details AS d '
                . ' ON e.id = d.earnings_id '
            . ' WHERE e.date = ? '
            . ' GROUP BY '
                . ' e.id '
                . ' , e.date '
                . ' , e.visit_at '
                . ' , e.customer_name '
            . ' ORDER BY '
                . ' visit_at '
                ,[$date]
            );
    }

    public function list()
    {
        $date = Carbon::yesterday()->format('Y-m-d');
        $earnings = $this->getDateEarnings($date);
        $total = 0;
        foreach ($earnings as $v) {
            $total += $v->sum_price;
        }
        return view('admin.earnings.list', compact('earnings'), ['date' => $date, 'total' => $total]);
    }

    public function postList(EarningFormRequest $request)
    {
        $date = $request->date;
        $earnings = $this->getDateEarnings($date);
            $total = 0;
            foreach ($earnings as $v) {
                $total += $v->sum_price;
            }
            return view('admin.earnings.list', compact('earnings'), ['date' => $date, 'total' => $total]);
    }

    public function dalete(EarningFormRequest $request)
    {
        $dalete_id = $request->delete;
        $date = $request->date;
        Earning::find($dalete_id)->delete();
        $earnings = $this->getDateEarnings($date);
        return view('admin.earnings.list', compact('earnings'));
    }

    public function input($type, $id=null)
    {
        $data = array();
        if ($type == 'edit') {
            $data = Earning::find($id);
            $menu_data = EarningDetail::where('earnings_id', '=', $id)->select('name')->get();
        }
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
        return view('admin.earnings.input', compact('data', 'menu_data', 'type', 'menus', 'categories'));
    }

    public function confirm(EarningFormRequest $request)
    {
        $type = $request->type;
        $data = $request->all();
        $menus = Menu::all();
        $categories = Earning::all();
        return view('admin.earnings.confirm', compact('data', 'categories', 'menus', 'type'));
    }

    public function result(EarningFormRequest $request)
    {
        $type = $request->type;
        $menus = Menu::all();
        $menu_name = array();
        foreach ($request->input('menu_id') as $k => $v)
        {
            $menu_name[$k] = $menus[$v]['name'];
        }
        if ($type == 'create')
        {
            $date = $request->input('date');
            $visit_at = $request->input('visit_at');
            $customer_name = $request->input('customer_name');
            $customer_gender = (int)$request->input('customer_gender');
            $customer_age = (int)$request->input('customer_age');
            $create_user = (int)$request->input('create_user');
            $insert_id = Earning::insertGetId(compact('date', 'visit_at', 'customer_name', 'customer_gender', 'customer_age', 'create_user',));
            foreach ($menu_name as $v)
            {
                $earnings_id = (int)$request->input('earnings_id');
                $menu_id = (int)$request->input('menu_id');
                $name = $v;
                $price = (int)$request->input('price');
                EarningDetail::create(compact('earnings_id', 'menu_id', 'name', 'price'));
            }
            $request->session()->regenerateToken();
        } else {
            $earnings = Earning::find($request->id);
            $earnings->date = $request->date;
            $earnings->visit_at = $request->visit_at;
            $earnings->customer_name = $request->customer_name;
            $earnings->customer_gender = (int)$request->customer_gender;
            $earnings->customer_age = (int)$request->customer_age;
            $earnings->update_user = (int)$request->user;
            $result = $earnings->save();
                EarningDetail::where('earnings_id', '=', $request->id)->delete();
                foreach ($menu_name as $v)
                {
                    $earnings_id = (int)$request->input('id');
                    $menu_id = (int)$request->input('menu_id');
                    $name = $v;
                    $price = (int)$request->input('price');
                    EarningDetail::create(compact('earnings_id', 'menu_id', 'name', 'price'));
                }
            }
        return view('admin.earnings.result',compact('type'));
        $request->session()->regenerateToken();
    }
}
