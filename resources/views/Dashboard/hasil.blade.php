@extends('Dashboard.layout.main')

@section('content')
<div class="row justify-content-between align-items-center">
    <div class="col">
        <h1>Rekomendasi Penerima</h1>
    </div>
    <div class="col text-right">
        {{-- <a href="/addwarga" class="btn btn-success">+ Data Warga</a> --}}
    </div>
</div>
<div class="card">
    <div class="card-body">
       <div class="row">
        <div class="col-6">
            <form action="/hasil" method="POST">
                @csrf
                <div class="row">
                    <div class="col">
                        <input type="number" class="form-control" name="kuota" placeholder="Input Kuota Penerima">
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-primary mb-3">CHECK</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-6 text-right">
            <a href="/hasil/pdf/{{ $kuota }}" class="btn btn-success mb-3" target="_blank">EXPORT DATA TO PDF</a>
        </div>
       </div>
    </div>
  </div>
<div class="card mb-4 mt-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Nilai Rekomendasi</th>
                    </tr>
                </thead>
                <tbody>    
                    @php
                            $i=1
                        @endphp               
                    @foreach ($hasil as $key => $value)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $value['nama'] }}</td>
                        <td>{{ $value['nik'] }}</td>
                        <td>{{ round($value['prefer'], 4) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection



