<?php

namespace App\Interfaces;

interface CityRepositoryInterface extends BaseRepositoryInterface
{
    public function getByNameCity($name);
    public function findBySlug($slug);
}