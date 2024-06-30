<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Tourist;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {

        $userId = $request->user()->id;

        $favorites = Favorite::with("tourist")->where("user_id", $userId)->get();

        return response()->json([
            "data" => $favorites->pluck("tourist"),
            "messages" => "Berhasil menampilkan data favorite user"
        ]);
    }

    public function store($id, Request $request)
    {
        $userId = $request->user()->id;
        $tourist = Tourist::findOrfail($id);
        $favorite = Favorite::where("user_id", $userId)->where("tourist_id", $tourist->id)->first();

        if (!$favorite) {
            Favorite::create([
                "tourist_id" => $tourist->id,
                "user_id" => $userId
            ]);
            return response()->json([
                "message" => "Berhasil favorite"
            ], 201);
        }
        return response()->json([], Response::HTTP_NOT_ACCEPTABLE);
    }

    public function delete($id, Request $request)
    {
        $userId = $request->user()->id;
        $tourist = Tourist::findOrFail($id);
        $favorite = Favorite::where("user_id", $userId)->where("tourist_id", $tourist->id)->first();

        if ($favorite) {
            $favorite->delete();
            return response()->json([
                "message" => "Berhasil menghapus favorite"
            ], 201);
        }
        return response()->json([], Response::HTTP_NOT_ACCEPTABLE);
    }
}
