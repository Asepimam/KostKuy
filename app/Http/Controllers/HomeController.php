<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    private CategoryRepositoryInterface  $categoryRepository;
    private CityRepositoryInterface $cityRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CategoryRepositoryInterface $categoryRepository,
        CityRepositoryInterface $cityRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository) {
        $this->categoryRepository = $categoryRepository;
        $this->cityRepository = $cityRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function index(){
        $categories = $this->categoryRepository->all();
        $cities = $this->cityRepository->all();
        $popularBoardingHouses = $this->boardingHouseRepository->getPopularBoardingHouses();

        return view('pages.home', compact('categories', 'cities', 'popularBoardingHouses'));
    }
}
