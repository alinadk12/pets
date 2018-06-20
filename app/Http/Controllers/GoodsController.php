<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\GoodRequest;
use App\Good;
use App\Brand_name;
use App\Good_type;
use App\Sold_good;
use File;
use DB;
use Carbon\Carbon;
use App;

class GoodsController extends Controller
{
    protected function imgPath($type)
    {
        switch ($type) {
        case 1:
            $imagePath = "images/goods/feed/";
            break;
        case 2:
            $imagePath = "images/goods/bowls/";
            break;
        case 3:
            $imagePath = "images/goods/toys/";
            break;
        case 4:
            $imagePath = "images/goods/accessories/";
            break;
        case 5:
            $imagePath = "images/goods/carries/";
            break;
        default:
            $imagePath = "images/goods/";
            break;
        }
        return $imagePath;
    }
    public function showAll()
    {
        $goods = Good::latest('created_at')->paginate(4);

        foreach ($goods as $good) {
            $good->good_brand = $good->brand_id;
            $good->good_type = $good->type_id;
            $good->name = App::isLocale('en') ? $good->name_en : $good->name_ru;
            $good->description = App::isLocale('en') ? $good->description_en : $good->description_ru;
        }

        return view('goods.showAll', ['goods' => $goods]);
    }

    public function create()
    {
        $brands = Brand_name::pluck('name', 'id');
        if (App::isLocale('en')) {
            $types = Good_type::pluck('type_en', 'id');
        } else {
            $types = Good_type::pluck('type_ru', 'id');
        }

        return view('goods.create', compact('brands', 'types'));
    }

    public function store(GoodRequest $request)
    {
        $good = new Good;
        $good->name_ru = $request->name_ru;
        $good->name_en = $request->name_en;
        $good->type_id = $request->type_id;
        $good->brand_id = $request->brand_id;
        $good->description_ru = $request->description_ru;
        $good->description_en = $request->description_en;
        $good->price = $request->price;
        $good->amount = $request->amount;
        //загрузка изображения
        if ($request->hasFile('picture')) {
            $imagePath = $this->imgPath($request->type_id);
            $imageName = $request->file('picture')->getClientOriginalName();
            //перемещение изображения из временного места хранения в определенный каталог
            $request->file('picture')->move($imagePath, $imageName);
            $good->image = $imagePath . $imageName;
        }
        $good->save();

        return redirect()->route('goods')->with('message', __('goods.messages.good_added'));
    }

    public function edit($id)
    {
        $brands = Brand_name::pluck('name', 'id');
        if (App::isLocale('en')) {
            $types = Good_type::pluck('type_en', 'id');
        } else {
            $types = Good_type::pluck('type_ru', 'id');
        }
        $good = Good::find($id);

        return view('goods.edit', compact('good', 'brands', 'types'));
    }

    public function update(GoodRequest $request, $id)
    {
        $good = Good::find($id);
        $input = $request->all();
        //загрузка изображения
        if ($request->hasFile('picture')) {
            $imagePath = $this->imgPath($request->type_id);
            $imageName = $request->file('picture')->getClientOriginalName();
            //перемещение изображения из временного места хранения в определенный каталог
            $request->file('picture')->move($imagePath, $imageName);
            $input['image'] = $imagePath . $imageName;
            //удаление старого изображения из каталога
            File::delete($request->image);
        }

        $good->update($input);

        return redirect()->route('goods');
    }

    public function delete($id)
    {
        $good = Good::find($id)->delete();

        return back();
    }
    public function showFeed()
    {
        $goods = Good::latest('created_at')->where('type_id', 1)->get();

        foreach ($goods as $good) {
            $good->good_brand = $good->brand_id;
            $good->name = App::isLocale('en') ? $good->name_en : $good->name_ru;
            $good->description = App::isLocale('en') ? $good->description_en : $good->description_ru;
        }

        return view('goods.showTypeGoods', ['goods' => $goods]);
    }

    public function showBowls()
    {
        $goods = Good::latest('created_at')->where('type_id', 2)->get();

        foreach ($goods as $good) {
            $good->good_brand = $good->brand_id;
            $good->name = App::isLocale('en') ? $good->name_en : $good->name_ru;
            $good->description = App::isLocale('en') ? $good->description_en : $good->description_ru;
        }

        return view('goods.showTypeGoods', ['goods' => $goods]);
    }

    public function showToys()
    {
        $goods = Good::latest('created_at')->where('type_id', 3)->get();

        foreach ($goods as $good) {
            $good->good_brand = $good->brand_id;
            $good->name = App::isLocale('en') ? $good->name_en : $good->name_ru;
            $good->description = App::isLocale('en') ? $good->description_en : $good->description_ru;
        }

        return view('goods.showTypeGoods', ['goods' => $goods]);
    }

    public function showAccessories()
    {
        $goods = Good::latest('created_at')->where('type_id', 4)->get();

        foreach ($goods as $good) {
            $good->good_brand = $good->brand_id;
            $good->name = App::isLocale('en') ? $good->name_en : $good->name_ru;
            $good->description = App::isLocale('en') ? $good->description_en : $good->description_ru;
        }

        return view('goods.showTypeGoods', ['goods' => $goods]);
    }

    public function showCarriers()
    {
        $goods = Good::latest('created_at')->where('type_id', 5)->get();

        foreach ($goods as $good) {
            $good->good_brand = $good->brand_id;
            $good->name = App::isLocale('en') ? $good->name_en : $good->name_ru;
            $good->description = App::isLocale('en') ? $good->description_en : $good->description_ru;
        }

        return view('goods.showTypeGoods', ['goods' => $goods]);
    }
    public function showDeleted()
    {
        $goods = Good::latest('deleted_at')->onlyTrashed()->paginate(4);

        foreach ($goods as $good) {
            $good->good_brand = $good->brand_id;
            $good->good_type = $good->type_id;
            $good->name = App::isLocale('en') ? $good->name_en : $good->name_ru;
            $good->description = App::isLocale('en') ? $good->description_en : $good->description_ru;
        }

        return view('goods.showDeleted', ['goods' => $goods]);
    }

    public function restore($id)
    {
        $good = Good::onlyTrashed()->find($id)->restore();

        return back();
    }

    public function forceDeleted($id)
    {
        $good = Good::onlyTrashed()->find($id)->forcedelete();

        return back();
    }
    public function getSell()
    {
        if (App::isLocale('en')) {
            $goods = Good::pluck('name_en', 'id');
        } else {
            $goods = Good::pluck('name_ru', 'id');
        }

        $users = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->select('users.*')
            ->where('role_user.role_id', 3)
            ->get();
        $users = $users->pluck('login', 'id');

        $employees = DB::table('users')
            ->join('role_user', 'users.id', '=', 'role_user.user_id')
            ->select('users.*')
            ->where('role_user.role_id', 2)
            ->get();
        $employees = $employees->pluck('login', 'id');

        return view('goods.sell', compact('users', 'employees', 'goods'));
    }

    public function postSell(Request $request)
    {
        $good = Good::find($request->good_id);
        //проверка товара на наличие
        if ($good->amount != 0) {
            //если товар в наличии, уменьшаем количество на 1
            $good->amount--;
            $good->save();
        } else {
            return redirect()->route('getSellGood')
                ->with('error', __('goods.messages.no_good'))
                ->withInput();
        }

        $soldGood = new Sold_good();
        $soldGood->good_id = $request->good_id;
        $soldGood->user_id = $request->user_id;
        $soldGood->employee_id = $request->employee_id;
        $soldGood->date = Carbon::now();
        $soldGood->save();

        return redirect()->route('goods')->with('message', __('goods.messages.good_sold'));
    }
}
