<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dog;
use App\Breed;
use File;
use App\Http\Requests;
use App\Http\Requests\DogRequest;
use App;

class DogsController extends Controller
{
    public function showAll()
    {
        $dogs = Dog::latest('created_at')->paginate(3);

        foreach ($dogs as $dog) {
            $dog->breed_name = $dog->breed_id;
            $dog->format_date = $dog->birthdate;
            $dog->name = App::isLocale('en') ? $dog->name_en : $dog->name_ru;
            $dog->color = App::isLocale('en') ? $dog->color_en : $dog->color_ru;
            $dog->description = App::isLocale('en') ? $dog->description_en : $dog->description_ru;
        }

        return view('dogs.dogs', ['dogs' => $dogs]);
    }

    public function showTerriers()
    {
        $dogs = Dog::latest('created_at')->where('breed_id', 1)->get();

        foreach ($dogs as $dog) {
            $dog->format_date = $dog->birthdate;
            $dog->name = App::isLocale('en') ? $dog->name_en : $dog->name_ru;
            $dog->color = App::isLocale('en') ? $dog->color_en : $dog->color_ru;
            $dog->description = App::isLocale('en') ? $dog->description_en : $dog->description_ru;
        }

        return view('dogs.showBreedDogs', ['dogs' => $dogs]);
    }

    public function showBeagles()
    {
        $dogs = Dog::latest('created_at')->where('breed_id', 2)->get();

        foreach ($dogs as $dog) {
            $dog->format_date = $dog->birthdate;
            $dog->name = App::isLocale('en') ? $dog->name_en : $dog->name_ru;
            $dog->color = App::isLocale('en') ? $dog->color_en : $dog->color_ru;
            $dog->description = App::isLocale('en') ? $dog->description_en : $dog->description_ru;
        }

        return view('dogs.showBreedDogs', ['dogs' => $dogs]);
    }

    public function showGoldenRetrievers()
    {
        $dogs = Dog::latest('created_at')->where('breed_id', 3)->get();

        foreach ($dogs as $dog) {
            $dog->format_date = $dog->birthdate;
            $dog->name = App::isLocale('en') ? $dog->name_en : $dog->name_ru;
            $dog->color = App::isLocale('en') ? $dog->color_en : $dog->color_ru;
            $dog->description = App::isLocale('en') ? $dog->description_en : $dog->description_ru;
        }

        return view('dogs.showBreedDogs', ['dogs' => $dogs]);
    }

    public function showChihuahua()
    {
        $dogs = Dog::latest('created_at')->where('breed_id', 4)->get();

        foreach ($dogs as $dog) {
            $dog->format_date = $dog->birthdate;
            $dog->name = App::isLocale('en') ? $dog->name_en : $dog->name_ru;
            $dog->color = App::isLocale('en') ? $dog->color_en : $dog->color_ru;
            $dog->description = App::isLocale('en') ? $dog->description_en : $dog->description_ru;
        }

        return view('dogs.showBreedDogs', ['dogs' => $dogs]);
    }

    public function edit($id)
    {
        $breeds = Breed::all();
        $dog = Dog::find($id);
        return view('dogs.edit', compact('breeds', 'dog'));
    }

    public function update(DogRequest $request, $id)
    {
        $dog = Dog::find($id);
        $input = $request->all();
        //загрузка изображения
        if ($request->hasFile('picture')) {
            $imagePath = "images/dogs/";
            $imageName = $request->file('picture')->getClientOriginalName();
            //перемещение изображения из временного места хранения в определенный каталог
            $request->file('picture')->move($imagePath, $imageName);
            $input['image'] = $imagePath . $imageName;
            //удаление старого изображения из каталога
            File::delete($request->image);
        }
        $dog->update($input);

        return redirect()->route('dogs');
    }

    public function create()
    {
        $breeds = Breed::all();
        return view('dogs.create', ['breeds' => $breeds]);
    }

    public function store(DogRequest $request)
    {
        $dog = new Dog();
        $dog->breed_id = $request->breed_id;
        $dog->name_ru = $request->name_ru;
        $dog->name_en = $request->name_en;
        $dog->gender = $request->gender;
        $dog->birthdate = $request->birthdate;
        $dog->color_ru = $request->color_ru;
        $dog->color_en = $request->color_en;
        $dog->description_ru = $request->description_ru;
        $dog->description_en = $request->description_en;
        //загрузка изображения
        if ($request->hasFile('picture')) {
            $imagePath = "images/dogs/";
            $imageName = $request->file('picture')->getClientOriginalName();
            //перемещение изображения из временного места хранения в определенный каталог
            $request->file('picture')->move($imagePath, $imageName);
            $dog->image = $imagePath . $imageName;
        }
        $dog->save();

        return redirect()->route('dogs')->with('message', __('dogs.messages.added_dog'));
    }

    public function delete($id)
    {
        $dog = Dog::find($id)->delete();

        return back();
    }

    public function showDeleted()
    {
        $dogs = Dog::latest('deleted_at')->onlyTrashed()->paginate(3);

        foreach ($dogs as $dog) {
            $dog->breed_name = $dog->breed_id;
            $dog->format_date = $dog->birthdate;
            $dog->name = App::isLocale('en') ? $dog->name_en : $dog->name_ru;
            $dog->color = App::isLocale('en') ? $dog->color_en : $dog->color_ru;
            $dog->description = App::isLocale('en') ? $dog->description_en : $dog->description_ru;
        }

        return view('dogs.showDeleted', ['dogs' => $dogs]);
    }

    public function restore($id)
    {
        $dog = Dog::onlyTrashed()->find($id)->restore();

        return back();
    }

    public function forceDeleted($id)
    {
        $dog = Dog::onlyTrashed()->find($id)->forcedelete();

        return back();
    }
}
