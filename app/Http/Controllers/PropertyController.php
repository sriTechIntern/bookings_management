<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();

        return view('dashboard', [
            'properties' => $properties,
            'modal_open' => session('modal_open', false),
            'modal_message' => session('modal_message'),
            'modal_property_id' => session('modal_property_id'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $property = Property::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'location'=>$request->location,
            'price'=>$request->price,
            'max_people_allowed'=>$request->max_people_allowed
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $property = Property::find($id);
        return $property;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $property = Property::find($id);

        $property->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'location'=>$request->location,
            'price'=>$request->price,
            'max_people_allowed'=>$request->max_people_allowed
        ]);

        return $property;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $property = Property::find($id);
        $property->delete();
    }
}
