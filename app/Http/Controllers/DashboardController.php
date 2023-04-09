<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kriteria;
use App\Models\Warga;
use App\Models\DetailWarga;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Dashboard.index', ['title' => 'Dashboard | SPK BANSOS']);
    }

    public function datawarga () 
    {
        $kriteria = Kriteria::All();
        $detailwarga = Warga::join('detail_wargas as dw', 'wargas.id', '=', 'dw.id_warga')
        ->select('wargas.*', 'dw.kolom', 'dw.value')->get();
        // $warga = Warga::All();
        return view('Dashboard.datawarga', [
            'Kriterias' => $kriteria,
            'detail' => $detailwarga,
            // 'warga' => $warga,
            'title' => 'Data Warga | SPK BANSOS'
        ]);
    }

    public function addWarga() 
    {
        $kriteria = Kriteria::All();       
        return view('Dashboard.addwarga', [
            'Kriterias' => $kriteria,
            'title' => 'Add Data Warga | SPK BANSOS',
            ]);
    }

    public function editWarga($id) 
    {
        $kriteria = Kriteria::All();     
        $warga = Warga::join('detail_wargas as dw', 'wargas.id', '=', 'dw.id_warga')
        ->select('wargas.*', 'dw.kolom', 'dw.value')->where('wargas.id', '=', $id)->get();
        return view('Dashboard.editwarga', [
            'Kriterias' => $kriteria,
            'warga' => $warga,
            'title' => 'Edit Data Warga | SPK BANSOS',
        ]);
    }

    public function hapusWarga($id){
        Warga::where('id', $id)->delete();
        DetailWarga::where('id_warga', $id)->delete();
        return redirect()->route('datawarga')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function saveWarga(Request $request)
    {
         $lastInsertedId = Warga::create([
            'nama' => $request->nama,
            'nik' => $request->nik
        ])->id;
        $data = $request->except('_token', 'nama', 'nik');
        $kolom = [];
        $values = [];
        foreach($data as $id => $value){
        array_push($kolom, $id);
        array_push($values, $value);
        }
        $ik = implode("|", $kolom);
        $iv = implode("|", $values);
        DetailWarga::create([
        'id_warga' => $lastInsertedId,
        'kolom' => $ik,
        'value' => $iv
        ]);
        return redirect()->route('datawarga')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function updateWarga(Request $request)
    {
        Warga::where('id', $request->id)->update([
            'nama' => $request->nama,
            'nik' => $request->nik
        ]);
        $kolom = [];
        $values = [];
        $val = $request->except('_token', 'id','nama', 'nik');
        foreach ($val as $key => $value) {
            array_push($values, $value);
            array_push($kolom, $key);
        }
        $ik = implode("|", $kolom);
        $iv = implode("|", $values);
        DetailWarga::where('id_warga', $request->id)->update([
            'kolom' => $ik,
            'value' => $iv
        ]);
        return redirect()->route('datawarga')->with(['success' => 'Data Berhasil Diubah!']);
    }


    public function kriteria () 
    {
        $kriteria = Kriteria::all();
        return view('Dashboard.kriteria', ['kriterias' => $kriteria, 'title' => 'Data Kriteria | SPK BANSOS']);
    }

    public function saveKriteria (Request $request) 
    {
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

    public function editKriteria(Request $request)
    {
        // dd($request->id);
        $kategori = implode ("|", $request->kategori);
        $nilai = implode ("|", $request->nilai);

        //create post
        Kriteria::where('id', $request->id)->update([
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
        return view('Dashboard.hasil', ['title' => 'Rekomendasi Penerima | SPK BANSOS']);
    }
}