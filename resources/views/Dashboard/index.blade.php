{{-- @php
    dd($jmlhwarga);
@endphp --}}

@extends('Dashboard.layout.main')

@section('content')
   <h1>Dashboard</h1>

   <div class="row">
    <div class="col">
        <div class="card mb-4 mt-4">
            <div class="card-body p-5">
                 <p>test</p>
                {{-- <p>{{ $jmlhwarga }}</p> --}}
             </div> 
        </div>
    </div>
   </div>
   
   <div class="row">
    <div class="col">
        <div class="card mb-4 mt-4">
            <div class="card-body p-5">
                <h4><b>Kriteria Penerima</b></h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Kriteria</th>
                                <th>Bobot</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($kriterias as $kriteria)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $kriteria->namakriteria }}</td>
                                    <td>{{ $kriteria->bobot }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
             </div> 
        </div>
    </div>
    <div class="col">
        <div class="card mb-4 mt-4">
            <div class="card-body p-5">
                <h4><b>Daftar Warga</b></h4>
                <hr>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table2" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Warga</th>
                                <th>NIK</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                            @endphp
                            @foreach ($warga as $wrg)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $wrg->nama }}</td>
                                    <td>{{ $wrg->nik }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
             </div> 
        </div>
    </div>
   </div>
@endsection



