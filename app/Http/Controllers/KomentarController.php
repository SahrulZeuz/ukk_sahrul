<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Komentar;
use Illuminate\Http\Request;

class KomentarController extends Controller
{
    public function index($id)
    {
        $foto = Foto::find($id);
        $komen = $foto->komentar()->get();

        return view('Dashboard.komentar', compact('foto', 'komen'));
    }

    public function store(Request $request, $id)
    {
        $foto = Foto::find($id);

        $komentar = new Komentar(
            [
                'userId' => auth()->id(),
                'fotoId' => $foto->id,
                'komentar' => $request->komentar,
            ],
        );

        $komentar->save();

        return redirect()->back();
    }
}
