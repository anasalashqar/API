<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return response()->json(
            $cars,
            200
        );
    }

    // admin/cars/4
    public function show($id)
    {
        // $param = the param is the $id from laravel
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'message' => 'Car not found'
            ], 404);
        }
        return response()->json(
            $car,
            200
        );
    }

    public function store(Request $request)
    {
        $request->validate([
            'make' => 'required|string|max:50',
            'model' => 'required|string|max:50',
            'year' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'color' => 'nullable|string|max:30',
            'transmission' => 'required|string|in:Automatic,Manual',
            'fuel_type' => 'required|string|in:Petrol,Diesel,Electric,Hybrid',
            'mileage' => 'nullable|integer|min:0',
            'price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
            'is_available' => 'boolean',
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
            'is_available' => $request->is_available ?? true, // Default to true if not provided
        ]);
        return response()->json(["message" => "Car Created Successfully", "car" => $car], 201);
    }

    public function edit(Car $cr) {}




    public function update(Request $request, $id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'message' => 'Car not found'
            ], 404);
        }

        $request->validate([
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
        // $request->validate([
        //     'make' => 'sometimes|required|string|max:50',
        //     'model' => 'sometimes|required|string|max:50',
        //     'year' => 'sometimes|required|digits:4|integer|min:1900|max:' . date('Y'),
        //     'color' => 'sometimes|nullable|string|max:30',
        //     'transmission' => 'sometimes|required|string|in:Automatic,Manual',
        //     'fuel_type' => 'sometimes|required|string|in:Petrol,Diesel,Electric,Hybrid',
        //     'mileage' => 'sometimes|nullable|integer|min:0',
        //     'price' => 'sometimes|required|numeric|min:0',
        //     'description' => 'sometimes|nullable|string',
        //     'image_url' => 'sometimes|nullable|url',
        //     'is_available' => 'sometimes|boolean',
        // ]);

        // $car = Car::update([
        //     'make' => $request->make,
        //     'model' => $request->model,
        //     'year' => $request->year,
        //     'color' => $request->color,
        //     'transmission' => $request->transmission,
        //     'fuel_type' => $request->fuel_type,
        //     'mileage' => $request->mileage,
        //     'price' => $request->price,
        //     'description' => $request->description,
        //     'image_url' => $request->image_url,
        //     'is_available' => $request->is_available ?? true,
        // ]);

        $car->update($request->all());

        // $car->update();

        return response()->json(["message" => "Car Updated Successfully", "car" => $car], 200);
    }


    public function destroy($id)
    {
        $car = Car::find($id);
        if (!$car) {
            return response()->json([
                'message' => 'Car not found'
            ], 404);
        }
        $car->delete();
        return response()->json(["message" => "Car Deleted Successfully"], 200);
    }
}
