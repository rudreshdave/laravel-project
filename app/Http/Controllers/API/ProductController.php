<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use Illuminate\Http\Response;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        try {
            $products = Product::with('category')->get();
            $response = array(
                'status' => 1,
                'message' => "Products List!",
                'data' => $products
            );
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $ex) {
//            dd($ex->getMessage());
            $response = array(
                'status' => 0,
                'message' => "Error!",
                'data' => $ex->getMessage()
            );
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request) {
        try {
            $product = new Product();
            $product->fill($request->all());
            $product->save();
            $response = array(
                'status' => 1,
                'message' => "Products Add!",
                'data' => $product
            );
            return response()->json($response, Response::HTTP_OK);
        } catch (\Exception $ex) {
//            dd($ex->getMessage());
            $response = array(
                'status' => 0,
                'message' => "Error!",
                'data' => $ex->getMessage()
            );
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product) {
        try {
            if (isset($product) && !empty($product)) {
                $response = array(
                    'status' => 1,
                    'message' => "Product Found!",
                    'data' => $product
                );
                return response()->json($response, Response::HTTP_OK);
            } else {
                $response = array(
                    'status' => 1,
                    'message' => "No Record Found!",
                    'data' => $product
                );
                return response()->json($response, Response::HTTP_OK);
            }
        } catch (\Exception $ex) {
//            dd($ex->getMessage());
            $response = array(
                'status' => 0,
                'message' => "Error!",
                'data' => $ex->getMessage()
            );
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product) {
        try {
            if (isset($product) && !empty($product)) {
                $product->fill($request->all());
                $product->save();
                $response = array(
                    'status' => 1,
                    'message' => "Product Update!",
                    'data' => $product
                );
                return response()->json($response, Response::HTTP_OK);
            } else {
                $response = array(
                    'status' => 1,
                    'message' => "No Record Found!",
                    'data' => $product
                );
                return response()->json($response, Response::HTTP_OK);
            }
        } catch (\Exception $ex) {
//            dd($ex->getMessage());
            $response = array(
                'status' => 0,
                'message' => "Error!",
                'data' => $ex->getMessage()
            );
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product) {
        try {
            $product_delete = $product->delete();
            if ($product_delete){
                $response = array(
                    'status' => 1,
                    'message' => "Product Delete"
                );
                return response()->json($response, Response::HTTP_OK);
            }
         } catch (\Exception $ex) {
//            dd($ex->getMessage());
            $response = array(
                'status' => 0,
                'message' => "Error!",
                'data' => $ex->getMessage()
            );
            return response()->json($response, Response::HTTP_BAD_REQUEST);
        }
    }
}
