@extends('Dashboard.layout.main')

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <h1>Edit Data Warga</h1>
        </div>
    </div>
   
    <div class="card mb-4 mt-4">
       
        <form action="/update/warga" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{ $warga[0]->id }}">
        <div class="card-body p-5">
            <div class="container w-75">
                    <div class="row justify-content-center">
                        <div class="col">
                            <label for="">Nama Lengkap</label>
                            <input type="text" name="nama" class="form-control" value="{{ $warga[0]->nama }}" 
                                placeholder="Ex: Nama Lengkap">
                        </div>
                        <div class="col">
                            <label for="">Nomor Induk Kependudukan (NIK)</label>
                            <input type="number" name="nik" class="form-control" value="{{ $warga[0]->nik }}" 
                                placeholder="Ex: 360413231231344">
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($Kriterias as $key => $val)
                        <div class="col-6 mt-3">
                            <label for="">{{ $val->namakriteria }}</label>
                            <select name="{{ strtolower(str_replace(" ","",$val->namakriteria)) }}" class="custom-select" >
                                <option value="{{ explode("|", $warga[0]->keyy)[$key] }}|{{ explode("|", $warga[0]->val)[$key] }}">{{ explode("|", $warga[0]->keyy)[$key] }}</option>
                                @foreach (array_combine(explode('|', $val->kategori), explode('|', $val->nilai)) as $kategori => $nilai)
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
                        <button class="btn btn-success w-25" type="submit">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div> 
@endsection
