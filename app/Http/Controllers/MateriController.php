<?php

namespace App\Http\Controllers;

use App\Models\Materi;
use App\Models\Playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::all();
        return view('back.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $playlist = Playlist::all();
        return view('back.materi.create', compact('playlist'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul_materi' => 'required|min:4',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul_materi);
        $data['gambar_materi'] = $request->file('gambar_materi')->store('materi');

        Materi::create($data);

        return redirect('/materi')->with(['success' => 'Data Berhasil Tersimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function show(Materi $materi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $playlist = Playlist::all();
        $materi = Materi::find($id);
        return view('back.materi.edit', compact('materi', 'playlist'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul_materi' => 'required|min:4',
        ]);

        if(!empty($request->file('gambar_materi'))){

            $data = $request->all();
            $data['slug'] = Str::slug($request->judul_materi);
            $data['gambar_materi'] = $request->file('gambar_materi')->store('materi');
    
            $materi = Materi::findOrFail($id);
            Storage::delete($materi->gambar_materi);
            $materi->update($data);

            return redirect('/materi')->with(['success' => 'Data Berhasil Diubah']);

        }else{
            $data = $request->all();
            $data['slug'] = Str::slug($request->judul_materi);
    
            $materi = Materi::findOrFail($id);
            $materi->update($data);

            return redirect('/materi')->with(['success' => 'Data Berhasil Diubah']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Materi  $materi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materi = Materi::find($id);
        Storage::delete($materi->gambar_materi);
        $materi->delete();

        return redirect('/materi')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
