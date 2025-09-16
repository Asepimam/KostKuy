<?php

namespace App\Repositories;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface {
    public function all(){
        return City::all();
    }

    public function find($id){
        return City::find($id);
    }

    public function create(array $data){
        return City::create($data);
    }

    public function update($id, array $data){
        $city = City::find($id);
        if($city){
            $city->update($data);
            return $city;
        }
        return null;
    }

    public function delete($id){
        $city = City::find($id);
        if($city){
            return $city->delete();
        }
        return false;
    }

    public function getByNameCity($name){
        return City::where('name', $name)->first();
    }

    public function findBySlug($slug){
        return City::where('slug', $slug)->first();
    }
}
