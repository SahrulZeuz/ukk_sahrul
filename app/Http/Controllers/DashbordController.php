<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use App\Models\Like;
use Illuminate\Http\Request;

class DashbordController extends Controller
{
    public function index()
    {

        $albums = Album::where('userId', auth()->id())->get();
        $fotos = Foto::where('userId', auth()->id())->get();

        $likeCounts = [];

        foreach($fotos as $foto){
            $likeCounts[$foto->id] = Like::where('fotoId', $foto->id)->count();
        }

        return view('Dashboard.index', compact('albums', 'fotos', 'likeCounts'));
    }

    public function sort($id)
    {
        $fotos = Foto::where('userId', auth()->id())->where('albumId', $id)->get();

        $albums = Album::where('userId', auth()->id())->get();

        $likeCounts = [];

        foreach($fotos as $foto){
            $likeCounts[$foto->id] = Like::where('userId', auth()->id())->where('fotoId', $foto->id)->count();
        }

        return view('Dashboard.index', compact('fotos', 'albums', 'likeCounts'));
    }
}
