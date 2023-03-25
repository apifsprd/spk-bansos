@extends('Dashboard.layout.main')

@section('content')
    <div class="row justify-content-between align-items-center">
        <div class="col">
            <h1>Data Kriteria</h1>
        </div>
        <div class="col text-right">
            <button class="btn btn btn-success" data-toggle="modal" data-target="#exampleModal">+ Tambah Data</button>
        </div>
    </div>

    <div class="card mb-4 mt-4">
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Kriteria</th>
                            <th>Kategori (Nilai)</th>
                            <th>Bobot</th>
                            <th>Atribut</th>
                            <th>Aksi</th>
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
                                <td>
                                    @foreach (array_combine(explode('|', $kriteria->kategori), explode('|', $kriteria->nilai)) as $kategori => $nilai)
                                        <li>{{ $kategori }} ({{ $nilai }})</li>
                                    @endforeach
                                </td>
                                <td>{{ $kriteria->bobot }}</td>
                                <td>{{ $kriteria->attribute }}</td>
                                <td>
                                    <button class="edit btn btn-sm btn-warning" data-toggle="modal" data-target="#editModal"
                                        data-id="{{ $kriteria->id }}" data-namakriteria="{{ $kriteria->namakriteria }}"
                                        data-kategori="{{ $kriteria->kategori }}" data-nilai="{{ $kriteria->nilai }}"
                                        data-bobot="{{ $kriteria->bobot }}"
                                        data-attribute="{{ $kriteria->attribute }}">Edit</button>
                                    <form action="/delete/kriteria" method="POST" style="display:inline-block">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $kriteria->id }}">
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Add Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kriteria</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/savekriteria" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <label for="">Nama Kriteria</label>
                                        <input type="text" name="namakriteria" class="form-control"
                                            placeholder="Ex: Pekerjaan">
                                    </div>
                                    <div class="col">
                                        <label for="">Bobot</label>
                                        <input type="number" step="any" name="bobot" class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="">Attribute</label>
                                        <select name="attribute" class="custom-select" id="">
                                            <option value="">-Select Option-</option>
                                            <option value="cost">Cost</option>
                                            <option value="benefit">Benefit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="">Kategori</label>
                                    </div>
                                </div>
                                <div id="kategori1" class="row mb-2">
                                    <div class="col">
                                        <input type="text" name="kategori[]" class="form-control"
                                            placeholder="Ex: Buruh Pabrik">
                                    </div>
                                    <div class="col">
                                        <input type="number" step="any" name="nilai[]" class="form-control"
                                            placeholder="Nilai">
                                    </div>
                                    <div class="col">
                                        <a id="addrow" class="btn btn-primary">+</a>
                                    </div>
                                </div>
                                <div class="baris">

                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Edit Modal --}}
            <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Kriteria</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="/editkriteria" method="POST">
                                @csrf
                                <input type="hidden" id="id" name="id">
                                <div class="row">
                                    <div class="col">
                                        <label for="">Nama Kriteria</label>
                                        <input type="text" name="namakriteria" id="namakriteria" class="form-control"
                                            placeholder="Ex: Pekerjaan">
                                    </div>
                                    <div class="col">
                                        <label for="">Bobot</label>
                                        <input type="number" step="any" name="bobot" id="bobot"
                                            class="form-control">
                                    </div>
                                    <div class="col">
                                        <label for="">Attribute</label>
                                        <select name="attribute" class="custom-select" id="attribute">
                                            <option value="" id="option"></option>
                                            <option value="cost">Cost</option>
                                            <option value="benefit">Benefit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="">Kategori</label>
                                    </div>
                                </div>
                                <div class="baris">

                                </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Edit Data</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>

            <script>
                const addrow = function() {
                    document.getElementsByClassName("baris")[0].innerHTML +=
                        `<div id="kategori" class="row mb-2">
                            <div class="col">
                                <input type="text" name="kategori[]" class="form-control" placeholder="Ex: Buruh Pabrik">
                            </div>
                            <div class="col">
                                <input type="number" step="any" name="nilai[]"  class="form-control" placeholder="Nilai">
                            </div>
                            <div class="col">
                                <a onclick=rmvrow() class="btn btn-danger">-</a>
                            </div>
                        </div>`
                }
                const rmvrow = function() {
                    const kategori = document.getElementById('kategori')
                    kategori.remove()
                }
                document.getElementById('addrow').onclick = addrow;
            </script>
        @endsection
