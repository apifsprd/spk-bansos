@extends('Dashboard.layout.main')

@section('content')
    <div class="row justify-content-between align-items-center">
        <div class="col">
            <h1>Data Warga</h1>
        </div>
        <div class="col text-right">
            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalCenter">Tambah
                Data</button>
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
                            <th>Pekerjaan</th>
                            <th>Penghasilan</th>
                            <th>Jumlah Tanggungan</th>
                            <th>Kondisi Rumah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <tr>
                            <td>1.</td>
                            <td>Donna Snider</td>
                            <td>1242131245</td>
                            <td>Buruh Pabrik</td>
                            <td>Rp. 5.000.000,-</td>
                            <td>2</td>
                            <td>Tidak layak huni</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Edit</button>
                                <button class="btn btn-sm btn-danger">Hapus</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            ...
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
