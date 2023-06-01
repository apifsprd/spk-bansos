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
        $kriteria = Kriteria::All();
        $warga = Warga::join('detail_wargas as dw', 'wargas.id', '=', 'dw.id_warga')
        ->select('wargas.*', 'dw.*')->get();
        // $jmlhwarga = DB::table('wargas')->select('count(*) as jmlhwarga');
        return view('Dashboard.index', [
            'title' => 'Dashboard | SPK BANSOS',
            'kriterias' => $kriteria,
            'warga' => $warga,
            // 'jmlhwarga' => $jmlhwarga
        ]);
    }

    public function datawarga () 
    {
        $kriteria = Kriteria::All();
        $warga = DB::table('wargas')
        ->select('wargas.*',DB::raw("GROUP_CONCAT(dw.kategori SEPARATOR '|') as `kategori`"), DB::raw("GROUP_CONCAT(dw.key SEPARATOR '|') as `keyy`"), DB::raw("GROUP_CONCAT(dw.val SEPARATOR '|') as `val`"))
        ->join('detail_wargas as dw', 'wargas.id', '=', 'dw.id_warga')
        ->groupBy('dw.id_warga', 'wargas.id','wargas.nama', 'wargas.nik')
        ->get();
        $kategori = [];
        foreach($warga as $w){
            array_push($kategori, $w->kategori);
        }
        return view('Dashboard.datawarga', [
            'Kriterias' => $kriteria,
            'kategori' => $kategori,
            'detail' => $warga,
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
        $warga = DB::table('wargas')
        ->select('wargas.*',DB::raw("GROUP_CONCAT(dw.kategori SEPARATOR '|') as `kategori`"), DB::raw("GROUP_CONCAT(dw.key SEPARATOR '|') as `keyy`"), DB::raw("GROUP_CONCAT(dw.val SEPARATOR '|') as `val`"))
        ->join('detail_wargas as dw', 'wargas.id', '=', 'dw.id_warga')
        ->groupBy('dw.id_warga', 'wargas.id','wargas.nama', 'wargas.nik')
        ->where('wargas.id', '=', $id)
        ->get();     
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
        $kategori = [];
        $keys = [];
        $vals = [];
        foreach($data as $id => $value){
            array_push($kategori, $id);
            $x = explode('|',$value,2);
            array_push($keys, $x[0]);
            array_push($vals, $x[1]);
        }
        // $ik = implode("|", $kategori);
        // $il = implode("|", $key);
        // $iv = implode("|", $val);
        // dd($kategori, $key,  $val);
        // DetailWarga::create([
        // 'id_warga' => $lastInsertedId,
        // 'kolom' => $ik,
        // 'label' => $il,
        // 'value' => $iv
        // ]);

        foreach($kategori as $i => $x){
            $key = $keys[$i];
            $val = $vals[$i];

            DetailWarga::create([
                'id_warga' => $lastInsertedId,
                'kategori' => $x,
                'key' => $key,
                'val' => $val
            ]);
        }


        return redirect()->route('datawarga')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function updateWarga(Request $request)
    {
        Warga::where('id', $request->id)->update([
            'nama' => $request->nama,
            'nik' => $request->nik
        ]);
        $categories = [];
        $keys = [];
        $vals = [];
        $req = $request->except('_token', 'id','nama', 'nik');
        foreach ($req as $key => $val) {
            array_push($categories, $key);
            $arr = explode("|", $val);
            array_push($keys, $arr[0]);
            array_push($vals, $arr[1]);
        }
        // dd($categories, $keys, $vals);
        DetailWarga::where('id_warga', $request->id)->delete();
        foreach($categories as $key => $val){
            $_key = $keys[$key];
            $_val = $vals[$key];

            DetailWarga::create([
                'id_warga' => $request->id,
                'kategori' => $val,
                'key' => $_key,
                'val' => $_val
            ]);
        }
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

    public function hasil (Request $request)
    {
        if($request->isMethod('post')){
            dd($request);
        }
        // $raw = DB::table('detail_wargas as dw')->select('wargas.nama', 'dw.kategori', 'dw.key', 'dw.val', 'k.attribute')->join('wargas', 'wargas.id', '=', 'dw.id_warga')->join('kriterias as k', DB::raw("REPLACE(k.namakriteria, ' ', '')"), '=', 'dw.kategori')->get();
        
        $warga = DB::table('wargas')
                    ->select('wargas.id','wargas.nik', 'wargas.nama', 'k.namakriteria', 'k.attribute', 'k.bobot', 'dw.val')
                    ->join('detail_wargas as dw', 'wargas.id', '=', 'dw.id_warga')
                    ->join('kriterias as k', 'dw.kategori', '=', DB::raw("REPLACE(k.namakriteria, ' ', '')"))
                    ->get();

        $nilai_maxmin = DB::table('detail_wargas as dw')
                        ->select(
                            'k.namakriteria', 
                            'k.attribute',
                            DB::raw('(case when (k.attribute = "cost") THEN MIN(dw.val) ELSE MAX(dw.val) END) as maxmin')
                        )
                        ->join('kriterias as k', 'dw.kategori', '=', DB::raw("REPLACE(k.namakriteria, ' ', '')"))
                        ->groupBy('k.namakriteria', 'k.attribute')
                        ->get();

       

        function in_array_r($needle, $haystack, $strict = false) {
            foreach ($haystack as $item) {
                if (($strict ? $item->namakriteria === $needle->namakriteria : $item->namakriteria == $needle->namakriteria) || (is_array($item->namakriteria) && in_array_r($needle->namakriteria, $item->namakriteria, $strict))) {
                    if ($item->attribute == 'cost') {
                        $nilai = $item->maxmin/$needle->val;
                    } else {
                        $nilai =$needle->val/$item->maxmin;
                    }
                    
                    $array = json_decode(json_encode($needle), true);
                    $array['nilai']=$nilai;
                    $array['normalisasi']=$nilai*$needle->bobot;    
                    DB::table('detail_wargas')
                        ->where([
                            ['id_warga', $needle->id],
                            ['kategori', strtolower(str_replace(' ', '', $needle->namakriteria))]
                        ])
                        ->update(['nilai' => $nilai]); 
                    DB::table('detail_wargas')
                    ->where([
                        ['id_warga', $needle->id],
                        ['kategori', strtolower(str_replace(' ', '', $needle->namakriteria))]
                    ])
                    ->update(['normalisasi' => $nilai*$needle->bobot]);       
                    return $array;
                }
            }
            return false;
        }

        $test2 = [];

        foreach ($warga as $key => $val) {
            if(in_array_r($val, $nilai_maxmin))
            { 
               $test = in_array_r($val, $nilai_maxmin);
               array_push($test2, $test);
            }
        }

        // dd($test2);

        $groupedItems = array();

        foreach($test2 as $item)
        {
            $groupedItems[$item['id']][] = $item;
        }
        $groupedItems = array_values($groupedItems);
        
        $preferensi = [];
        foreach ($groupedItems as $key => $value) {
           $nilaiPreferensi = array_column($value, 'normalisasi');
           array_push($preferensi, ["nik" => $value[0]["nik"], "nama" => $value[0]['nama'], 'prefer' => array_sum($nilaiPreferensi)]);
        }

        $col = array_column( $preferensi, "prefer" );
        array_multisort( $col, SORT_DESC, $preferensi );

        return view('Dashboard.hasil', ['title' => 'Rekomendasi Penerima | SPK BANSOS', 'hasil' => $preferensi]);
    }
}



