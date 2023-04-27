@extends('Dashboard.layout.main')

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <h1>Tambah Data Warga</h1>
        </div>
    </div>
   
    <div class="card mb-4 mt-4">
       
        <form action="/savewarga" method="POST">
        @csrf
        <div class="card-body p-5">
            <div class="container w-75">
                    <div class="row justify-content-center">
                        <div class="col">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control"
                                placeholder="Ex: Nama Lengkap">
                        </div>
                        <div class="col">
                            <label for="">Nomor Induk Kependudukan (NIK)</label>
                            <input type="number" name="nik" class="form-control"
                                placeholder="Ex: 360413231231344">
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($Kriterias as $kriteria)
                        <div class="col-6 mt-3">
                            <label for="">{{ $kriteria->namakriteria }}</label>
                            <select name="{{ strtolower(str_replace(" ","",$kriteria->namakriteria)) }}" class="custom-select" id="">
                                <option value="">-PILIH-</option>
                                @foreach (array_combine(explode('|', $kriteria->kategori), explode('|', $kriteria->nilai)) as $kategori => $nilai)
                                <option value="{{ $kategori }}|{{ $nilai }}">{{ $kategori }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endforeach
                    </div>
                    
                </div>
            </div>
            <div class="card-footer">
                <div class="container  w-75">
                    <div class="row justify-content-between">
                        <a class="btn btn-outline-secondary w-25" href="/datawarga">Kembali</a>
                        <button class="btn btn-success w-25">Tambah</button>
                    </div>
                </div>
            </div>
        </form>
    </div> 
@endsection
