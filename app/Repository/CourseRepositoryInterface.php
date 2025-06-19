<?php 

namespace App\Repository;

use Illuminate\Support\Collection;

interface CourseRepositoryInterface
{
    public function searchByKeyword(string $keyword): Collection;

    public function getAllWithCategory(): Collection;
}