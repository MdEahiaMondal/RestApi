<?php

namespace App\Http\Controllers;

use App\Exceptions\ProductNotBelongsToUser;
use App\Http\Requests\ProductCreatedRequeste;
use App\Http\Requests\ProductUpdateRequeste;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api')->except('index', 'show');
    }

    public function index()
    {
        return ProductCollection::collection(Product::paginate(10)); // why use ProductCollection ? ans: because we have a more product that will show api system thats why it used;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    public function store(ProductCreatedRequeste $request)
    {
        $product = new Product();
        $product->user_id = auth()->id();
        $product->name = $request->name;
        $product->detail = $request->description;
        $product->price = $request->amount;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
         $product->save();

         return response()->json([
             'Created' => "Product Created successfully",
         ],Response::HTTP_CREATED);
    }


    public function show(Product $product)
    {
        return  new ProductResource($product); // whu use new ProductResource() ? ans: because there is a only one product we will show and we make modifi our product information with new ProductResource()
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }



    public function update(ProductUpdateRequeste $request, Product $product)
    {

        $this->ProductUserCheck($product);

        $product->name = $request->name;
        $product->detail = $request->description;
        $product->price = $request->amount;
        $product->stock = $request->stock;
        $product->discount = $request->discount;
        $product->save();

        return response()->json([
            'Updated' => "Product Updated successfully",
        ],Response::HTTP_OK);
    }



    public function destroy(Product $product)
    {

        $this->ProductUserCheck($product);

        $product->delete();

        return response()->json([
            'Deleted' => "Product Deleted successfully",
        ],Response::HTTP_NOT_FOUND);

    }


    public function ProductUserCheck($product)
    {
        if (auth()->id()  !== $product->user_id){
            throw new ProductNotBelongsToUser;
        }
    }


}
