<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface {

    public function all(){
        return Category::all();
    }

    public function find($id){
        return Category::find($id);
    }

    public function create(array $data){
        return Category::create($data);
    }

    public function update($id, array $data){
        $category = Category::find($id);
        if($category){
            $category->update($data);
            return $category;
        }
        return null;
    }

    public function delete($id){
        $category = Category::find($id);
        if($category){
            return $category->delete();
        }
        return false;
    }

    public function getByNameCategory($name){
        return Category::where('name', $name)->first();
    }
}