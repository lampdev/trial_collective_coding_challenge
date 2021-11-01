<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    /**
     * @var ProductRepository
     */
    public $productRepository;

    /**
     * @param ProductRepository $productRepository
     */
    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }
}
