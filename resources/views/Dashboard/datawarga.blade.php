@extends('Dashboard.layout.main')

@section('content')
    <div class="row justify-content-between align-items-center">
        <div class="col">
            <h1>Data Warga</h1>
        </div>
        <div class="col text-right">
            <a href="/addwarga" class="btn btn-success">+ Data Warga</a>
        </div>
    </div>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
    <div class="card mb-4 mt-4">
        <div class="card-body">
            <div class="table-responsive">
                @if ($kategori != null)
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIK</th>
                            @foreach (explode("|", $kategori[0]) as $kategori)
                                <th>{{ $kategori}}</th>
                            @endforeach
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1
                        @endphp
                        @foreach ($detail as $item)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->nik }}</td>
                            @foreach (explode("|", $item->keyy) as $x)
                                <td>{{ $x }}</td>                        
                            @endforeach
                            <td>
                                <a href="/editwarga/{{ $item->id }}" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/delete/warga/{{ $item->id }}" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
                @else
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>NIK</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="3" class="text-center p-3  ">NO DATA</td>
                        </tr>
                    </tbody>
                </table>
                @endif
                
            </div>
        </div>
    </div>
        @endsection
