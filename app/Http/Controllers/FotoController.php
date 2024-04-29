<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Foto;
use App\Models\Like;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;

class FotoController extends Controller
{
    public function index()
    {
        $albums = Album::where('userId', auth()->id())->get();

        return view('Dashboard.form.foto', compact('albums'));
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'judulFoto' =>  'required',
            'deskripsiFoto' => 'required',
            'lokasiFile' => 'required',
            'albumId'=> 'required|exists:album,id',
        ]);

        $foto = $request->file('lokasiFile')->store('public/foto');
        $fotoUrl = URL::to("/").Storage::url($foto);

        $foto = new Foto([
            'judulFoto' => $validate['judulFoto'],
            'deskripsiFoto' => $validate['deskripsiFoto'],
            'lokasiFile' => $fotoUrl,
            'tanggalDiunggah' => Carbon::now()->format('Y-m-d'),
            'albumId' => $validate['albumId'],
            'userId' => auth()->user()->id,
        ]);

        $foto->save();

        return redirect()->route('dashboard');
    }

    public function like($id)
    {
        $foto = Foto::find($id);
        $userId = auth()->id();

        $existingLike = Like::where('userId', $userId)->where('fotoId', $foto->id)->first();
        if ($existingLike) {
            $existingLike->delete();
        }else{
            $like = new Like([
                'userId' => $userId,
                'fotoId' => $foto->id,
            ]);
            $like->save();
        }

        return redirect()->back();
    }

    public function delete($id)
    {
        $foto = Foto::find($id);
        Storage::delete($foto->lokasiFile);
        $foto->delete();
        return redirect('/dashboard');
    }
}
