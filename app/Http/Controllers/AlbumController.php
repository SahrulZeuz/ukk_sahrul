<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        return view('Dashboard.form.album');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namaAlbum' => 'required',
            'deskripsi' => 'required',
        ]);

        Album::create([
            'namaAlbum' => $validateData['namaAlbum'],
            'deskripsi' => $validateData['deskripsi'],
            'userId' => auth()->user()->id,
            'tanggalDibuat' => Carbon::now()->format('Y-m-d'),
        ]);


        return redirect('/dashboard');
    }
}
