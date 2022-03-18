<?php

namespace App\Services;

use App\Repository\ProductRepository;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }



    public function index()
    {
        $products =  $this->productRepository->getPerPage();

        return $products;
    }
}
