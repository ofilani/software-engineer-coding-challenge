<?php

namespace App\Services;

use App\Repository\CategoryRepository;

class CategoryService
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }



    public function index()
    {
        $categories =  $this->categoryRepository->getPerPage();

        return $categories;
    }

    public function create($data)
    {
        $category =  $this->categoryRepository->create($data);

        return $category;
    }


    public function findById($id)
    {
        $category =  $this->categoryRepository->findById($id);
        return $category;
    }


    public function deleteById($id)
    {
        $category =  $this->categoryRepository->deleteById($id);
        return $category;
    }
}
