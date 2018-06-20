<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breed;
use App;

class BreedsController extends Controller
{
    public function showAll()
    {
        return view('breeds.showAll');
    }

    public function showTerrier()
    {
        $breed = Breed::find(1);
        $breed->breed_country = $breed->country_id;
        $breed->name = App::isLocale('en') ? $breed->name_en : $breed->name_ru;
        $breed->height = App::isLocale('en') ? $breed->height_en : $breed->height_ru;
        $breed->weight = App::isLocale('en') ? $breed->weight_en : $breed->weight_ru;
        $breed->description = App::isLocale('en') ? $breed->description_en : $breed->description_ru;

        return view('breeds.showBreed', ['breed' => $breed]);
    }

    public function showBeagle()
    {
        $breed = Breed::find(2);
        $breed->breed_country = $breed->country_id;
        $breed->name = App::isLocale('en') ? $breed->name_en : $breed->name_ru;
        $breed->height = App::isLocale('en') ? $breed->height_en : $breed->height_ru;
        $breed->weight = App::isLocale('en') ? $breed->weight_en : $breed->weight_ru;
        $breed->description = App::isLocale('en') ? $breed->description_en : $breed->description_ru;

        return view('breeds.showBreed', ['breed' => $breed]);
    }

    public function showGoldenRetriever()
    {
        $breed = Breed::find(3);
        $breed->breed_country = $breed->country_id;
        $breed->name = App::isLocale('en') ? $breed->name_en : $breed->name_ru;
        $breed->height = App::isLocale('en') ? $breed->height_en : $breed->height_ru;
        $breed->weight = App::isLocale('en') ? $breed->weight_en : $breed->weight_ru;
        $breed->description = App::isLocale('en') ? $breed->description_en : $breed->description_ru;

        return view('breeds.showBreed', ['breed' => $breed]);
    }

    public function showChihuahua()
    {
        $breed = Breed::find(4);
        $breed->breed_country = $breed->country_id;
        $breed->name = App::isLocale('en') ? $breed->name_en : $breed->name_ru;
        $breed->height = App::isLocale('en') ? $breed->height_en : $breed->height_ru;
        $breed->weight = App::isLocale('en') ? $breed->weight_en : $breed->weight_ru;
        $breed->description = App::isLocale('en') ? $breed->description_en : $breed->description_ru;

        return view('breeds.showBreed', ['breed' => $breed]);
    }
}
