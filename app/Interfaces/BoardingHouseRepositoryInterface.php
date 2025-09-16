<?php

namespace App\Interfaces;

interface BoardingHouseRepositoryInterface extends BaseRepositoryInterface
{
    public function searchBoardingHouses($search = null, $room = null, $category = null, $city = null);
    public function getPopularBoardingHouses($limit = 5);
    public function getBySlug($slug);

}
