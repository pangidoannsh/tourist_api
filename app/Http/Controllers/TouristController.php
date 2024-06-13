<?php

namespace App\Http\Controllers;

use App\Models\Tourist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TouristController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $model = Tourist::all();
        return response()->json([
            "message" => "Data Detail Berhasil Ditampilkan",
            "data" => $model
        ]);
    }
    public function indexPublic()
    {
        $model = Tourist::inRandomOrder()->take(5)->get();
        return response()->json([
            "message" => "Data Detail Berhasil Ditampilkan",
            "data" => $model
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $model = Tourist::create([
            "name" => $request->name,
            "lon" => $request->lon,
            "lat" => $request->lat,
            "address" => $request->address,
            "image" => "images/" . $imageName
        ]);
        return response()->json([
            "message" => "Data Detail Berhasil Ditambahkan",
            "data" => $model
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $model = Tourist::findOrFail($id);
        return response()->json([
            "message" => "Data Detail Berhasil Ditampilkan",
            "data" => $model
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $model = Tourist::findOrFail($id);
        if ($request->file("image")) {
            // File::delete(public_path($model->image));
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $model->image = "images/" . $imageName;
        }
        $model->name = $request->name;
        $model->address = $request->address;
        $model->lon = $request->lon;
        $model->lat = $request->lat;
        $model->update();
        return response()->json([
            "message" => "Data Detail Berhasil Diupdate",
            "data" => $model
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Tourist::findOrFail($id)->delete();
        return response()->json([
            "message" => "Data Detail Berhasil Ditampilkan"
        ]);
    }
}