<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.index');
    }

    public function datawarga () 
    {
        return view('Dashboard.datawarga');
    }

    public function kriteria () 
    {
        $kriteria = Kriteria::all();
        return view('Dashboard.kriteria', ['kriterias' => $kriteria]);
    }

    public function kriteriaById($id)
    {
        dd($request->id);
    }


    public function saveKriteria (Request $request) 
    {
        // dd($request->request);

        //validate form
        // $validatedData = $request->validate($request, [
        //     'namakriteria'     => 'required',
        //     'bobot'     => 'required',
        //     'attribute'   => 'required',
        // ]);

        // dd($validatedData);

        $kategori = implode ("|", $request->kategori);
        $nilai = implode ("|", $request->nilai);

        //create post
        Kriteria::create([
            'namakriteria'  => $request->namakriteria,
            'bobot'         => $request->bobot,
            'attribute'     => $request->attribute,
            'kategori'       => $kategori,
            'nilai'          => $nilai
        ]);

        //redirect to index
        return redirect()->route('kriteria')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function hapusKriteria(Request $request)
    {
        Kriteria::where('id', $request->id)->delete();
        return redirect()->route('kriteria')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function hasil () 
    {
        return view('Dashboard.hasil');
    }
}