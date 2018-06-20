<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\PuppyRequest;
use App\Puppy;
use App\Breed;
use App\Dog;
use App\Sold_puppy;
use Carbon\Carbon;
use File;
use DB;
use App;

class PuppiesController extends Controller
{
    protected function imgPath($breed)
    {
        switch ($breed) {
        case 1:
            $imagePath = "images/puppies/jack russell terriers/";
            break;
        case 2:
            $imagePath = "images/puppies/bigles/";
            break;
        case 3:
            $imagePath = "images/puppies/golden retrievers/";
            break;
        case 4:
            $imagePath = "images/puppies/chihuahuas/";
            break;
        default:
            $imagePath = "images/puppies/";
            break;
        }
        return $imagePath;
    }

    protected function dataAboutPuppies($query)
    {
        $puppy = $query->first();
        $breed = $puppy->breed_id;
        $dt = $puppy->birthdate;
        $birthdate = Carbon::parse($dt)->format('d.m.Y');
        $allAmount = $query->count();
        $maleAmount = $query->where('gender', 1)->count();
        $femaleAmount = $query->where('gender', 0)->count();
        $puppies = ['breed' => $breed,
            'birthdate' => $birthdate,
            'allAmount' => $allAmount,
            'maleAmount' => $maleAmount,
            'femaleAmount' => $femaleAmount];
        return $puppies;
    }

    public function showAll()
    {
        return view('puppies.showAll');
    }

    public function showTerriers()
    {
        $query = DB::table('puppies')
            ->leftJoin('sold_puppies', 'puppies.id', '=', 'sold_puppies.puppy_id')
            ->select('puppies.*')
            ->where('puppies.breed_id', 1)
            ->whereNull('sold_puppies.user_id')
            ->whereNull('puppies.deleted_at')
            ->get();

        if ($query->isEmpty()) {
            $puppies = ['breed' => 1];
            return view('puppies.noPuppies', ['puppies' => $puppies]);
        } else {
            $puppies = $this->dataAboutPuppies($query);
            return view('puppies.showBreedPuppies', ['puppies' => $puppies]);
        }
    }

    public function showBeagles()
    {
        $query = DB::table('puppies')
            ->leftJoin('sold_puppies', 'puppies.id', '=', 'sold_puppies.puppy_id')
            ->select('puppies.*')
            ->where('puppies.breed_id', 2)
            ->whereNull('sold_puppies.user_id')
            ->whereNull('puppies.deleted_at')
            ->get();

        if ($query->isEmpty()) {
            $puppies = ['breed' => 2];
            return view('puppies.noPuppies', ['puppies' => $puppies]);
        } else {
            $puppies = $this->dataAboutPuppies($query);
            return view('puppies.showBreedPuppies', ['puppies' => $puppies]);
        }
    }

    public function showGoldenRetrievers()
    {
        $query = DB::table('puppies')
            ->leftJoin('sold_puppies', 'puppies.id', '=', 'sold_puppies.puppy_id')
            ->select('puppies.*')
            ->where('puppies.breed_id', 3)
            ->whereNull('sold_puppies.user_id')
            ->whereNull('puppies.deleted_at')
            ->get();

        if ($query->isEmpty()) {
            $puppies = ['breed' => 3];
            return view('puppies.noPuppies', ['puppies' => $puppies]);
        } else {
            $puppies = $this->dataAboutPuppies($query);
            return view('puppies.showBreedPuppies', ['puppies' => $puppies]);
        }
    }

    public function showChihuahua()
    {
        $query = DB::table('puppies')
            ->leftJoin('sold_puppies', 'puppies.id', '=', 'sold_puppies.puppy_id')
            ->select('puppies.*')
            ->where('puppies.breed_id', 4)
            ->whereNull('sold_puppies.user_id')
            ->whereNull('puppies.deleted_at')
            ->get();

        if ($query->isEmpty()) {
            $puppies = ['breed' => 4];
            return view('puppies.noPuppies', ['puppies' => $puppies]);
        } else {
            $puppies = $this->dataAboutPuppies($query);
            return view('puppies.showBreedPuppies', ['puppies' => $puppies]);
        }
    }

    public function forSale()
    {
        $puppies = DB::table('puppies')
            ->leftJoin('sold_puppies', 'puppies.id', '=', 'sold_puppies.puppy_id')
            ->join('breeds', 'puppies.breed_id', '=', 'breeds.id')
            ->join(
                'dogs as m', function ($join) {
                    $join->on('puppies.male_id', '=', 'm.id')
                        ->select('m.name');
                }
            )
            ->join(
                'dogs as f', function ($join) {
                    $join->on('puppies.female_id', '=', 'f.id')
                        ->select('f.name');
                }
            )
            /*->leftJoin('vaccination_puppy as v', function ($join) {
                $join->on('puppies.id', '=', 'v.puppy_id')
                    ->select('v.vaccination_id');
            })*/
            ->select(
                'puppies.*', 'breeds.name_ru as breed_ru', 'breeds.name_en as breed_en',
                'm.name_ru as male_ru', 'm.name_en as male_en', 'f.name_ru as female_ru', 'f.name_en as female_en'
            )
            ->where('sold_puppies.id', null)
            ->whereNull('puppies.deleted_at')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        foreach ($puppies as $puppy) {
            $bdt = Carbon::parse($puppy->birthdate)->format('d.m.Y');
            $puppy->birthdate = $bdt;
        }

        return view('puppies.forSale', compact('puppies'));
    }

    public function sold()
    {
        $puppies = DB::table('puppies')
            ->join('sold_puppies', 'puppies.id', '=', 'sold_puppies.puppy_id')
            ->join('breeds', 'puppies.breed_id', '=', 'breeds.id')
            ->join(
                'dogs as m', function ($join) {
                    $join->on('puppies.male_id', '=', 'm.id')
                        ->select('m.name');
                }
            )
            ->join(
                'dogs as f', function ($join) {
                    $join->on('puppies.female_id', '=', 'f.id')
                        ->select('f.name');
                }
            )
            ->join(
                'users as u', function ($join) {
                    $join->on('sold_puppies.user_id', '=', 'u.id')
                        ->select('u.login', 'u.surname', 'u.name');
                }
            )
            ->join(
                'users as e', function ($join) {
                    $join->on('sold_puppies.employee_id', '=', 'e.id')
                        ->select('e.login', 'e.surname', 'e.name');
                }
            )
            ->select(
                'puppies.*', 'sold_puppies.*', 'breeds.name_ru as breed_ru', 'breeds.name_en as breed_en',
                'm.name_ru as male_ru', 'm.name_en as male_en', 'f.name_ru as female_ru', 'f.name_en as female_en',
                'u.login as user_login', 'u.surname as user_surname', 'u.name as user_name',
                'e.login as employee_login', 'e.surname as employee_surname', 'e.name as employee_name'
            )
            ->whereNull('puppies.deleted_at')
            ->orderBy('puppies.created_at', 'desc')
            ->paginate(3);

        foreach ($puppies as $puppy) {
            $bdt = Carbon::parse($puppy->birthdate)->format('d.m.Y');
            $puppy->birthdate = $bdt;
            $dt = Carbon::parse($puppy->date)->format('d.m.Y H:i');
            $puppy->date = $dt;
        }

        return view('puppies.sold', ['puppies' => $puppies]);
    }

    public function edit($id)
    {
        $puppy = Puppy::find($id);
        $breeds = Breed::all();
        if (App::isLocale('en')) {
            $males = Dog::males()->pluck('name_en', 'id');
            $females = Dog::females()->pluck('name_en', 'id');
        } else {
            $males = Dog::males()->pluck('name_ru', 'id');
            $females = Dog::females()->pluck('name_ru', 'id');
        }

        return view('puppies.edit', compact('puppy', 'breeds', 'males', 'females'));
    }

    public function update(PuppyRequest $request, $id)
    {
        $puppy = Puppy::find($id);
        $input = $request->all();
        //загрузка изображения
        if ($request->hasFile('picture')) {
            $imagePath = $this->imgPath($request->breed_id);
            $imageName = $request->file('picture')->getClientOriginalName();
            //перемещение изображения из временного места хранения в определенный каталог
            $request->file('picture')->move($imagePath, $imageName);
            $input['image'] = $imagePath . $imageName;
            //удаление старого изображения из каталога
            File::delete($request->image);
        }
        $puppy->update($input);

        return redirect()->route('puppies');
    }

    public function create()
    {
        if (App::isLocale('en')) {
            $breeds = Breed::all();
            $males = Dog::males()->pluck('name_en', 'id');
            $females = Dog::females()->pluck('name_en', 'id');
        } else {
            $breeds = Breed::all();
            $males = Dog::males()->pluck('name_ru', 'id');
            $females = Dog::females()->pluck('name_ru', 'id');
        }

        return view('puppies.create', compact('breeds', 'males', 'females'));
    }

    public function store(PuppyRequest $request)
    {
        $puppy = new Puppy();
        $puppy->breed_id = $request->breed_id;
        $puppy->birthdate = $request->birthdate;
        $puppy->gender = $request->gender;
        $puppy->color_ru = $request->color_ru;
        $puppy->color_en = $request->color_en;
        $puppy->notes_ru = $request->notes_ru ? $request->notes_ru : null;
        $puppy->notes_en = $request->notes_en ? $request->notes_en : null;
        $puppy->male_id = $request->male_id;
        $puppy->female_id = $request->female_id;
        $puppy->price = $request->price;
        //загрузка изображения
        if ($request->hasFile('picture')) {
            $imagePath = $this->imgPath($request->breed_id);
            $imageName = $request->file('picture')->getClientOriginalName();
            //перемещение изображения из временного места хранения в определенный каталог
            $request->file('picture')->move($imagePath, $imageName);
            $puppy->image = $imagePath . $imageName;
        }
        $puppy->save();

        return redirect()->route('puppies')->with('message', __('puppies.messages.added_puppy'));
    }

    public function delete($id)
    {
        $puppy = Puppy::find($id)->delete();

        return back();
    }

    public function showDeleted()
    {
        $puppies = DB::table('puppies')
            ->leftJoin('sold_puppies', 'puppies.id', '=', 'sold_puppies.puppy_id')
            ->join('breeds', 'puppies.breed_id', '=', 'breeds.id')
            ->join(
                'dogs as m', function ($join) {
                    $join->on('puppies.male_id', '=', 'm.id')
                        ->select('m.name');
                }
            )
            ->join(
                'dogs as f', function ($join) {
                    $join->on('puppies.female_id', '=', 'f.id')
                        ->select('f.name');
                }
            )
            ->select(
                'puppies.*', 'breeds.name_ru as breed_ru', 'breeds.name_en as breed_en',
                'm.name_ru as male_ru', 'm.name_en as male_en', 'f.name_ru as female_ru', 'f.name_en as female_en'
            )
            ->where('sold_puppies.id', null)
            ->whereNotNull('puppies.deleted_at')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        foreach ($puppies as $puppy) {
            $bdt = Carbon::parse($puppy->birthdate)->format('d.m.Y');
            $puppy->birthdate = $bdt;
        }

        return view('puppies.showDeleted', ['puppies' => $puppies]);
    }

    public function restore($id)
    {
        $puppy = Puppy::onlyTrashed()->find($id)->restore();

        return back();
    }

    public function forceDeleted($id)
    {
        $puppy = Puppy::onlyTrashed()->find($id)->forceDelete();

        return back();
    }

    public function getSell($id = null)
    {
        //для автозаполнения поля ID щенка
        $puppy = null;
        if ($id) {
            $puppy = Puppy::find($id);
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

        return view('puppies.sell', compact('users', 'employees', 'puppy'));
    }

    public function postSell(Request $request)
    {
        $puppies = DB::table('puppies')
            ->leftJoin('sold_puppies', 'puppies.id', '=', 'sold_puppies.puppy_id')
            ->select('puppies.id')
            ->whereNull('sold_puppies.user_id')
            ->whereNull('puppies.deleted_at')
            ->get();

        //проверка на существование введенного ID в БД
        if ($puppies->contains('id', $request->puppy_id)) {
            $soldPuppy = new Sold_puppy();
            $soldPuppy->puppy_id = $request->puppy_id;
            $soldPuppy->user_id = $request->user_id;
            $soldPuppy->employee_id = $request->employee_id;
            $soldPuppy->date = Carbon::now();
            $soldPuppy->save();

            return redirect()->route('puppies')->with('message', __('puppies.messages.sold_puppy'));
        } else {
            return redirect()->route('getSellPuppy')
                ->with('error', __('puppies.no_puppy'))
                ->withInput();
        }
    }
}
