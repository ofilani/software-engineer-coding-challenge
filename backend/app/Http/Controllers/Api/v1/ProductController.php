<?php

namespace App\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Repository\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return response()->json($this->productRepository->getPerPage(), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:55',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0'
        ]);


        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 401);
        }


        if ($files = $request->file('image')) {

            $imageExt = strtolower($files->getClientOriginalExtension());

            // check if the file has a valid format
            if (!($imageExt == 'jpg' or $imageExt == 'jpeg' or $imageExt == 'png')) {
                return 0;
            }

            $filesize = filesize($files); // bytes
            $filesize = round($filesize / 1024 / 1024, 1);

            // check if the image Less than or equal to 1MB
            if ($filesize <= 1) {
                return 0;
            }

            $destinationPath = 'images/products'; // upload path
            $productImage = date('YmdHis') . "." . $imageExt;


            $files->move($destinationPath, $productImage);
            $request->image = $productImage;
        }

        return response()->json($this->productRepository->create($request->all()), 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function searchByName($name)
    {
        return response()->json($this->productRepository->searchByName($name), 200);
    }

    public function searchByPrice($min = 0, $max)
    {

        return response()->json($this->productRepository->searchByPrice($min, $max), 200);
    }

    public function searchByCategory($category_id)
    {

        return response()->json($this->productRepository->searchByCategory($category_id), 200);
    }
}
