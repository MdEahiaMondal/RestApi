<?php

namespace App\Http\Controllers;

use App\Http\Resources\Review\ReviewResource;
use App\Product;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReviewController extends Controller
{

    public function index(Product $product)
    {
        return ReviewResource::collection($product->reviews); // because we have more reviews at one product
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


    public function store(Product $product, Request $request)
    {
        $request['customer'] = $request->customer;
        $request['review'] = $request->body;
        $request['star'] = $request->ratting;
        $reviews = new Review($request->all());
        $product->reviews()->save($reviews);

        return response()->json([
            'Created' => "Review Created successfully"
        ], Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
