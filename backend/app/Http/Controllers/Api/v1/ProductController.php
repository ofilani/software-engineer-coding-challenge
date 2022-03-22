<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Services\ImageService;
use App\Services\ProductService;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $products = $this->productService->index();
        return response()->json($products, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {


        if ($request->hasFile('image')) {
            $productImage = (new ImageService())->storeProductImage($request->name, $request->image);
        }


        $data = [
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'image' => $productImage
        ];

        $product = $this->productService->create($data);

        return response()->json($product, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get product by id
        $product =  $this->productService->findById($id);

        return response()->json($product, 200);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //Try if the product exist
        $product =  $this->productService->findById($id);

        $image = $product->image;

        if ($image) {
            (new ImageService())->unlinkImage($product->image, 'products');
            return response()->json($this->productService->deleteById($id), 200);
        } else {
            return response()->json($this->productService->deleteById($id), 200);
        }
    }

    public function searchByName($name)
    {
        $products = $this->productService->searchByName($name);
        return response()->json($products, 200);
    }

    public function searchByPrice($min = 0, $max)
    {

        $products = $this->productService->searchByPrice($min, $max);
        return response()->json($products, 200);
    }

    public function searchByCategory($category_id)
    {

        $products = $this->productService->searchByCategory($category_id);
        return response()->json($products, 200);
    }
}
