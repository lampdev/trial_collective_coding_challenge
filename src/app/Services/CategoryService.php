<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class CategoryService
{
    /**
     * @var CategoryRepository
     */
    public $categoryRepository;

    /**
     * @param CategoryRepository $categoryRepository
     */
    public function __construct(CategoryRepository $categoryRepository) {
        $this->categoryRepository = $categoryRepository;
    }
}
