<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use function Laravel\Prompts\select;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $properties = Property::all();

        $locations = Property::select('location')->distinct()->get()
            ->pluck('location');
            
        return view('dashboard', [
            'properties' => $properties,
            'locations'=>$locations,
            'modal_open' => session('modal_open', false),
            'modal_message' => session('modal_message'),
            'modal_property_id' => session('modal_property_id'),
        ]);
    }

    public function userProperties()
    {
        $properties = Property::where('user_id',Auth::user()->id)->get();
        return view('properties',[
            'properties'=>$properties
        ]);
    }

    public function filterProperties(Request $request)
    {
        $properties = Property::query()
        ->when($request->filled('location'), function ($query) use ($request) {
            $query->where('location', $request->location);
        })
        ->when($request->filled('guests'), function ($query) use ($request) {
            $query->where('max_people_allowed', '>=', $request->guests);
        })
        ->get();
        
        // echo $properties;
        
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
