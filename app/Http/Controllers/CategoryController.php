<?php

namespace App\Http\Controllers;

use App\Http\Controllers\BaseController;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends BaseController
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return $this->respondOK(
            CategoryResource::collection($categories)
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ]);
        $category = Category::create($data);
        return $this->respondCreated(
            CategoryResource::make($category)
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return $this->respondOK(
            CategoryResource::make($category)
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => ['nullable'],
            'parent_id' => ['nullable', 'exists:categories,id'],
        ]);
        $category->update($data);

        return $this->respondUpdated(new CategoryResource($category));
    }

    public function products(Request $request, Category $category)
    {
        $children = [];
        $products = ProductResource::collection($category->items());
        if (($request->has('includeChildren')) && ($category->hasChildren())){
            $children = CategoryResource::collection($category->children);
        }
        return $this->respondOK([
            'children' => count($children) ? $children : null,
            'products' => count($products) ? $products : null
        ]);
    }

}
