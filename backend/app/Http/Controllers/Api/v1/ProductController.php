<?php

namespace App\Http\Controllers\Api\v1;

use Exception;
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

        $data = array();

        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['description'] = $request->description;



        if ($files = $request->file('image')) {

            $imageExt = strtolower($files->getClientOriginalExtension());

            // check if the file has a valid format
            if (!($imageExt == 'jpg' or $imageExt == 'jpeg' or $imageExt == 'png')) {
                return 0;
            }

            $filesize = filesize($files); // bytes
            $filesize = round($filesize / 1024 / 1024, 1);

            // check if the image Less than or equal to 1MB
            if ($filesize >= 1) {
                return 0;
            }

            $destinationPath = 'images/products'; // upload path
            $productImage = date('YmdHis') . "." . $imageExt;


            $files->move($destinationPath, $productImage);
            $request->image = $productImage;
            $data['image'] = $request->image;
        }
        return response()->json($this->productRepository->create($data), 201);
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

        try {
            //Try if the product exist
            $product =  $this->productRepository->findById($id);
        } catch (Exception $e) {
            //throw $th if the product doesn't exist 

            $expType =  get_class($e);

            // check thrown exception type
            if ($expType == 'Illuminate\Database\Eloquent\ModelNotFoundException') {

                return response()->json(['error' => true, 'error-msg' => 'Not found'], 404);
            } else {
                return response()->json(['error' => true, 'error-msg' => $e->getMessage()], 404);
            }
        }

        $image = $product->image;

        if ($image) {
            unlink('images/products/' . $image);
            return $this->productRepository->deleteById($id);
        } else {

            return $this->productRepository->deleteById($id);
        }
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
