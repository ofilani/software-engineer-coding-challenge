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

    public function create($data)
    {
        $products =  $this->productRepository->create($data);

        return $products;
    }


    public function findById($id)
    {
        //Try if the product exist
        $product =  $this->productRepository->findById($id);
        return $product;
    }


    public function deleteById($id)
    {
        //Try if the product exist
        $product =  $this->productRepository->deleteById($id);
        return $product;
    }

    public function searchByName($name)
    {
        $products = $this->productRepository->searchByName($name);
        return $products;
    }

    public function searchByPrice($min = 0, $max)
    {

        $products = $this->productRepository->searchByPrice($min, $max);
        return $products;
    }

    public function searchByCategory($category_id)
    {

        $products = $this->productRepository->searchByCategory($category_id);
        return $products;
    }
}
