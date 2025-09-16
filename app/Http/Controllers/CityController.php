<?php

namespace App\Http\Controllers;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private CityRepositoryInterface $cityRepository;

    public function __construct(CityRepositoryInterface $cityRepository)
    {
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $cities = $this->cityRepository->all();
        return view('pages.city.index', compact('cities'));
    }

    public function slug(City $city)
    {
        $boardingHouses = $city->boardingHouses()->latest()->paginate(10);
        return view('pages.city.slug', compact('city', 'boardingHouses'));
    }
}
