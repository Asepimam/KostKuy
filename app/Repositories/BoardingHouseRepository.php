<?php

namespace App\Repositories;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
    
class BoardingHouseRepository implements BoardingHouseRepositoryInterface {
    public function all(){
        return BoardingHouse::all();
    }
    public function find($id){
        return BoardingHouse::find($id);
    }

    public function create(array $data){
        return BoardingHouse::create($data);
    }
    public function update($id, array $data){
        $boardingHouse = BoardingHouse::find($id);
        if($boardingHouse){
            $boardingHouse->update($data);
            return $boardingHouse;
        }
        return null;
    }
    public function delete($id){
        $boardingHouse = BoardingHouse::find($id);
        if($boardingHouse){
            return $boardingHouse->delete();
        }
        return false;
    }

    public function searchBoardingHouses($search = null, $room = null, $category = null, $city = null){
        $query = BoardingHouse::query();

        if ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
        }

        if ($room) {
            $query->whereHas('rooms', function ($q) use ($room) {
                $q->where('id', $room);
            });
        }

        if ($category) {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('id', $category);
            });
        }

        if ($city) {
            $query->whereHas('city', function ($q) use ($city) {
                $q->where('id', $city);
            });
        }

        return $query->get();
    }

    public function getPopularBoardingHouses($limit = 5){
        return BoardingHouse::withCount('transactions')
                            ->orderBy('transactions_count', 'desc')
                            ->limit($limit)
                            ->get();
    }

    public function getBySlug($slug){
        return BoardingHouse::where('slug', $slug)->first();
    }
}