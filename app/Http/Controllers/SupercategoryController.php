<?php

namespace App\Http\Controllers;

use App\Models\Supercategory;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupercategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Supercategory::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supercategory = Supercategory::create($request->only('name'));

        return response($supercategory, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supercategory  $supercategory
     * @return \Illuminate\Http\Response
     */
    public function show(Supercategory $supercategory)
    {
        return $supercategory;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Supercategory  $supercategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supercategory $supercategory)
    {
        $supercategory->update($request->only('name'));

        return response($supercategory, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supercategory  $supercategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supercategory $supercategory)
    {
        $supercategory->delete();

        return response($supercategory, Response::HTTP_NO_CONTENT);
    }
}
