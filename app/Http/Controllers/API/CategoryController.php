<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Response;

class CategoryController extends Controller {

    /**
     * Display a listing of the resource.
     */
    public function index() {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request) {
        try {
            $category = new Category();
            $category->fill($request->all());
            $category->save();
            $response = array(
                'status' => 1,
                'message' => "Category Add!",
                'data' => $category
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
    public function show(string $id) {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        //
    }
}
