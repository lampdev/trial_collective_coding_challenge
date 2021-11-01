<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Repository;

class CategoryRepository extends Repository
{
    /**
     * CategoryRepository constructor.
     *
     * @param Category $model
     */
    public function __construct(Category $model)
    {
        $this->model = $model;
        parent::__construct($this->model);
    }
}
