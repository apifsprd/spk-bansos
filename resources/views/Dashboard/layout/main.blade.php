<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ $title }}</title>

    <link rel="shortcut icon" href="/img/logo.png" type="image/x-icon">

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"rel="stylesheet">
    <link rel="stylesheet" href="/vendor/datatables/dataTables.bootstrap4.min.css">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('Dashboard.layout.sidebar')

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                @include('Dashboard.layout.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistem Penunjang Keputusan (SPK) pemberian bantuan sosial by Hadis {{ date('Y') }}</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin-2.min.js"></script>

    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    

</body>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable({
  "ordering": false
} );
        $('#table1').DataTable();
        $('#table2').DataTable();
        $('#tabel').DataTable();
    });

    $('.edit').on('click', function() {
        $('.baris').html('')
        const id = $(this).data('id')
        const namakriteria = $(this).data('namakriteria')
        const kategori = $(this).data('kategori')
        const nilai = $(this).data('nilai')
        const bobot = $(this).data('bobot')
        const attribute = $(this).data('attribute')

        const kategoriSplit = kategori.split('|')
        const nilaiSplit = nilai.split('|')
        // const combine = $.merge(kategoriSplit, nilaiSplit)

        $('#id').val(id)
        $('#namakriteria').val(namakriteria)
        $('#bobot').val(bobot)
        $('#attribute').val(attribute)
        kategoriSplit.forEach((n, index) => {
            const n2 = nilaiSplit[index]
            $('.baris').append(`
            <div id="kategori1" class="row mb-2">
                <div class="col">
                    <input type="text" name="kategori[]" value='${n}' class="form-control"
                        placeholder="Ex: Buruh Pabrik">
                </div>
                <div class="col">
                    <input type="number" step="any" name="nilai[]" value=${n2} class="form-control"
                        placeholder="Nilai">
                </div>
                <div class="col">
                    
                </div>
            </div>
        `)
        });
    })

    // $('.addWarga').on('click', function() {
    //     $('.formaddwarga').html('')
    //     const kriteria = $(this).data('kriteria')

    //     kriteria.forEach(element => {            
    //     $('.formaddwarga').append(`
    //     <div class="col">
    //     <label for="">${element.namakriteria}</label>
    //     <select name="attribute" class="custom-select" id="attribute">
    //         <option>${}</option>
    //     </select>
    //     </div>`)
    //     });
    // })

    const rmvrow = function() {
        const kategori = document.getElementById('kategori')
        kategori.remove()
    }
</script>

</html>
