<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{
    //
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private CityRepositoryInterface $cityRepository;
    public function __construct(BoardingHouseRepositoryInterface $boardingHouseRepository, CategoryRepositoryInterface $categoryRepository, CityRepositoryInterface $cityRepository)
    {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->categoryRepository = $categoryRepository;
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        $boardingHouses = $this->boardingHouseRepository->all();
        return view('pages.boardingHouse.index', compact('boardingHouses'));
    }

    public function Slug($boardingHouseSlug)
    {
        $boardingHouse = $this->boardingHouseRepository->getBySlug($boardingHouseSlug);
        return view('pages.boardingHouse.slug', compact('boardingHouse'));
    }

    public function findBoardingHouses(Request $request)
    {
        $search = $request->input('search');
        $room = $request->input('room');
        $category = $request->input('category');
        $city = $request->input('city');

        $boardingHouses = $this->boardingHouseRepository->searchBoardingHouses($search, $room, $category, $city);

        $categories = $this->categoryRepository->all();

        $cities = $this->cityRepository->all();

        return view('pages.boardingHouse.findBoardingHouse', compact('boardingHouses', 'categories', 'cities'));
    }
}
