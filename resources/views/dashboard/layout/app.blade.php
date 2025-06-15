<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMBA Project</title>

    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/chartjs/Chart.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/app.css') }}">
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.svg') }}" type="image/x-icon">
    {{-- sweetAlert --}}
    <link rel="stylesheet" href="{{ asset('sweetalert2/dist/sweetalert2.all.min.css') }}">
    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- fontawesome -->
    <link rel="stylesheet" href="{{ asset('fontawesome/css/all.min.css') }}">


</head>

<body>
    @include('dashboard.layout.sidebar')
    @include('dashboard.layout.navbar')
    <div class="main-content container-fluid">
        @yield('content')
    </div>

    @include('dashboard.layout.footer')
    </div>
    </div>
    <script src="{{ asset('admin/assets/js/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/app.js') }}"></script>

    <script src="{{ asset('admin/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/pages/dashboard.js') }}"></script>

    <script src="{{ asset('admin/assets/js/main.js') }}"></script>
    <!-- dataTables -->
    <script src="{{ asset('admin/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('admin/assets/js/vendors.js') }}"></script>
    {{-- sweetAlert --}}
    <script src="{{ asset('sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>
    <!-- Select2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <!-- fontawesome js -->
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil !!!',
                text: '{{ session('success') }}'
            });
        </script>
    @endif


    <script type="text/javascript">
        $(document).on('click', '.show_confirm', function(event) {
            event.preventDefault();

            var form = $(this).closest("form");
            var name = $(this).data("konf-delete");

            Swal.fire({
                title: 'Konfirmasi Hapus Data?',
                html: "Data <strong>" + name + "</strong> akan dihapus dan tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, hapus',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Terhapus!',
                        text: 'Data berhasil dihapus.',
                        icon: 'success',
                        timer: 1500,
                        showConfirmButton: false
                    }).then(() => {
                        form.submit();
                    });
                }
            });
        });
    </script>

    <script>
        ClassicEditor
            .create(document.querySelector('#ckeditor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%' // biar responsif
            });
        });
    </script>
</body>

</html>
