<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $car = Car::get();
        return response()->json($car, 200);
    }
    /**
     * Store a newly created resource in storage.
     */
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $param = the param is the $id from laravel
        $car = Car::findOrFail($id);
        return response()->json($car, 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'make' => 'sometimes|required|string|max:50',
            'model' => 'sometimes|required|string|max:50',
            'year' => 'sometimes|required|digits:4|integer|min:1900|max:' . date('Y'),
            'color' => 'sometimes|nullable|string|max:30',
            'transmission' => 'sometimes|required|string|in:Automatic,Manual',
            'fuel_type' => 'sometimes|required|string|in:Petrol,Diesel,Electric,Hybrid',
            'mileage' => 'sometimes|nullable|integer|min:0',
            'price' => 'sometimes|required|numeric|min:0',
            'description' => 'sometimes|nullable|string',
            'image_url' => 'sometimes|nullable|url',
            'is_available' => 'sometimes|boolean',
        ]);
    
        $car = Car::create([
            'make' => $request->make,
            'model' => $request->model,
            'year' => $request->year,
            'color' => $request->color,
            'transmission' => $request->transmission,
            'fuel_type' => $request->fuel_type,
            'mileage' => $request->mileage,
            'price' => $request->price,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'is_available' => $request->is_available,
        ]);

        return response()->json([
            "message" => "Car created Successfuly!",
            "data" => $car
        ], 201);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Car $cr) {}



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $car = Car::findOrFail($id);

        $validated = $request->validate([
            'make' => 'sometimes|required|string|max:50',
            'model' => 'sometimes|required|string|max:50',
            'year' => 'sometimes|required|digits:4|integer|min:1900|max:' . date('Y'),
            'color' => 'sometimes|nullable|string|max:30',
            'transmission' => 'sometimes|required|string|in:Automatic,Manual',
            'fuel_type' => 'sometimes|required|string|in:Petrol,Diesel,Electric,Hybrid',
            'mileage' => 'sometimes|nullable|integer|min:0',
            'price' => 'sometimes|required|numeric|min:0',
            'description' => 'sometimes|nullable|string',
            'image_url' => 'sometimes|nullable|url',
            'is_available' => 'sometimes|boolean',
        ]);

        $car->update($validated);

        return response()->json([
            'message' => 'Car updated successfully.',
            'data' => $car
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        $car->delete();

        return response()->json([
            'message' => 'Car deleted successfully.',
            "Old-Car" => $car,
        ], 200);
    }
}
