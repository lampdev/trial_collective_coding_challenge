<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Repository;

class ProductRepository extends Repository
{
    /**
     * ProductRepository constructor.
     *
     * @param Product $model
     */
    public function __construct(Product $model)
    {
        $this->model = $model;
        parent::__construct($this->model);
    }

    /**
     * @param int $perPage
     * @return mixed
     */
    public function search(array $params)
    {
        return $this->model->paginate($params['perPage']);
    }
}
