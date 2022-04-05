<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.min.css"
        integrity="sha512-EZSUkJWTjzDlspOoPSpUFR0o0Xy7jdzW//6qhUkoZ9c4StFkVsp9fbbd0O06p9ELS3H486m4wmrCELjza4JEog=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--Styling LandingPage-->
    <link rel="stylesheet" href="{{ url('/assets/css/app.css') }}">
        <style>
            .dropify-wrapper .dropify-message p {
                font-size: 14px;
            }

        </style>

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: "#editor",
            height: 300,
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak",
                "searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking",
                "table contextmenu directionality emoticons paste textcolor",
                "save code fullscreen autoresize codesample autosave responsivefilemanager"
            ],
            menubar: false,
            toolbar1: "undo redo restoredraft | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | outdent indent table searchreplace",
            toolbar2: "| fontsizeselect | styleselect | link unlink anchor | image media emoticons | forecolor backcolor | code codesample fullscreen ",
            image_advtab: true,
            fontsize_formats: "8px 10px 12px 14px 18px 24px 36px",
            relative_urls: false,
            remove_script_host: false,
            filemanager_access_key: '@filemanager_get_key()',
            filemanager_sort_by: '',
            filemanager_descending: '',
            filemanager_subfolder: '',
            filemanager_crossdomain: '',
            external_filemanager_path: '@filemanager_get_resource(dialog.php)',
            filemanager_title: "File Manager",
            external_plugins: {
                "filemanager": "http://127.0.0.1:8000/js/filemanager.min.js"
            },
            filemanager_access_key: 'key',
        });
    </script>

</head>
<body>

    <div id="app">
        <div id="sidebarMain">
            <div class="wrapperSidebar">
                <a href="#" class="profile">
                    <div class="profileUser">
                        <h5 class="labelDay">Selamat Pagi</h5>
                        <h5 class="nameUser">Admin</h5>
                    </div>
                </a>
                <div class="sidebar-menu-wrapper">
                    <li class="listMenuName">
                        <p>Menu</p>
                    </li>
                    <li class="list-menu ">
                        <div class="icon">
                            <ion-icon name="grid"></ion-icon>
                        </div>
                        <a href="{{ url('dashboard') }}" class="sidebar-menu">My Dashboard</a>
                    </li>
                    <li class="list-menu active">
                        <div class="icon">
                            <ion-icon name="documents"></ion-icon>
                        </div>
                        <a href="{{ url('admin/document') }}" class="sidebar-menu">Document</a>
                    </li>
                    <li class="list-menu ">
                        <div class="icon">
                            <ion-icon name="person"></ion-icon>
                        </div>
                        <a href="{{ url('register') }}" class="sidebar-menu">Add Petugas</a>
                    </li>
                    <li class="list-menu">
                        <div class="icon">
                            <ion-icon name="log-out"></ion-icon>
                        </div>
                        <a href="{{ url('logoutUser') }}" class="sidebar-menu">Logout</a>
                    </li>
                </div>
            </div>
        </div>

        <div id="main">
            <div class="contentMain">
                <div class="container">

                    <div class="wrapperListRequest">
                        <h3>List Request</h3>

                        <ul class="nav nav-pills mb-3 tabsMenu" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <button class="nav-link active" id="my-request-tab" data-bs-toggle="pill" data-bs-target="#myRequestTab" type="button" role="tab" aria-controls="myRequestTab" aria-selected="true">Data Accept</button>
                            </li>
                            <li class="nav-item" role="presentation">
                              <button class="nav-link" id="add-request-tab" data-bs-toggle="pill" data-bs-target="#addRequestTab" type="button" role="tab" aria-controls="addRequestTab" aria-selected="false">Data Decline</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="all-request-tab" data-bs-toggle="pill" data-bs-target="#allRequestTab" type="button" role="tab" aria-controls="addRequestTab" aria-selected="false">All Data</button>
                              </li>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">

                            <div class="tab-pane fade show active" id="myRequestTab" role="tabpanel" aria-labelledby="my-request-tab">

                                <div class="wrapperTable table-responsive">
                                    <table id="acceptTable" class="tables" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Nik</th>
                                                <th>Email</th>
                                                <th>Nomor Telepon</th>
                                                <th>Aduan</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (DB::table('aduan')->get() as $key => $item)
                                              @if ($item->status != 1)
                                              <tr>
                                                <td style="width: 5%">{{ $key + 1 }}</td>
                                                <td style="width: 20%">{{ $item->nama }}</td>
                                                <td style="width: 20%">{{ $item->nik }}</td>
                                                <td style="width: 20%">{{ $item->email }}</td>
                                                <td style="width: 20%">{{ $item->no_telp }}</td>
                                                <td style="width: 25%">{!! $item->isi !!}</td>
                                                <td style="width: 25%">{{ $item->image }}</td>
                                                <td style="width: 20%" class="d-flex">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#updateData" data-id="{{ $item->id }}"
                                                        data-nama="{{ $item->nama }}" data-nik="{{ $item->nik }}"
                                                        data-email="{{ $item->email }}" data-no_telp="{{ $item->no_telp }}"
                                                        data-isi="{{ $item->isi }}" data-image="{{ $item->image }}"
                                                        data-status="{{ $item->status }}">
                                                        Edit
                                                    </button>
                                                    <button data-id="{{$item->id}}"  class="btn btn-danger deleteee">Hapus</button>
                                                </td>
                                            </tr>
                                              @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="addRequestTab" role="tabpanel" aria-labelledby="add-request-tab">

                                <div class="wrapperTable table-responsive">
                                    <table id="declineTable" class="tables" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Nik</th>
                                                <th>Email</th>
                                                <th>Nomor Telepon</th>
                                                <th>Aduan</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (DB::table('aduan')->get() as $key => $item)
                                              @if ($item->status == 3)
                                              <tr>
                                                <td style="width: 5%">{{ $key + 1 }}</td>
                                                <td style="width: 20%">{{ $item->nama }}</td>
                                                <td style="width: 20%">{{ $item->nik }}</td>
                                                <td style="width: 20%">{{ $item->email }}</td>
                                                <td style="width: 20%">{{ $item->no_telp }}</td>
                                                <td style="width: 25%">{!! $item->isi !!}</td>
                                                <td style="width: 25%">{{ $item->image }}</td>
                                                <td style="width: 20%" class="d-flex">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#updateData" data-id="{{ $item->id }}"
                                                        data-nama="{{ $item->nama }}" data-nik="{{ $item->nik }}"
                                                        data-email="{{ $item->email }}" data-no_telp="{{ $item->no_telp }}"
                                                        data-isi="{{ $item->isi }}" data-image="{{ $item->image }}"
                                                        data-status="{{ $item->status }}">
                                                        Edit
                                                    </button>
                                                    <button data-id="{{$item->id}}"  class="btn btn-danger deleteee">Hapus</button>
                                                </td>
                                            </tr>
                                              @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="allRequestTab" role="tabpanel" aria-labelledby="all-request-tab">

                                <div class="wrapperTable table-responsive">
                                    <table id="allTable" class="tables" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama</th>
                                                <th>Nik</th>
                                                <th>Email</th>
                                                <th>Nomor Telepon</th>
                                                <th>Aduan</th>
                                                <th>Gambar</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach (DB::table('aduan')->get() as $key => $item)
                                              <tr>
                                                <td style="width: 5%">{{ $key + 1 }}</td>
                                                <td style="width: 20%">{{ $item->nama }}</td>
                                                <td style="width: 20%">{{ $item->nik }}</td>
                                                <td style="width: 20%">{{ $item->email }}</td>
                                                <td style="width: 20%">{{ $item->no_telp }}</td>
                                                <td style="width: 25%">{!! $item->isi !!}</td>
                                                <td style="width: 25%">{{ $item->image }}</td>
                                                <td style="width: 20%" class="d-flex">
                                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                        data-bs-target="#updateData" data-id="{{ $item->id }}"
                                                        data-nama="{{ $item->nama }}" data-nik="{{ $item->nik }}"
                                                        data-email="{{ $item->email }}" data-no_telp="{{ $item->no_telp }}"
                                                        data-isi="{{ $item->isi }}" data-image="{{ $item->image }}"
                                                        data-status="{{ $item->status }}">
                                                        Edit
                                                    </button>
                                                    <button data-id="{{$item->id}}"  class="btn btn-danger deleteee">Hapus</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="updateData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="updateDataLabel" aria-hidden="true">
                    <div class="modal-dialog" id="updateDialog">
                        <div id="modal-content" class="modal-content">
                            Loading..
                        </div>
                    </div>
                    </div>

    <!--Vendor-->
        <!--Jquery-->
        <script src="./assets/vendor/jquery/jquery.min.js"></script>
        <!--Bootstrap JS-->
        <script src="./assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <!--Ion Icon-->
        <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
        <!--Datatable By Bootstrap-->
        <script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>

    <!--App JS-->
    <script src="./assets/js/app.js"></script>

    <script>
        $(document).ready(function() {
            $('#countryList').DataTable({
                "info": false,
                "bSort": false,
            });
        } );
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

    <!--Ionicon-->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Table Js -->
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <!-- ckeditor -->
    <script src="https://cdn.tiny.cloud/1/{{ env('TINY_API_TOKEN') }}/tinymce/5/tinymce.min.js" referrerpolicy="origin">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"
        integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>

    <script>
        $(document).ready(function() {
            $('#declineTable').DataTable({
                "info": false,
                "bSort": false,
            });
        });

        $(document).ready(function() {
            $('#allTable').DataTable({
                "info": false,
                "bSort": false,
            });
        });

        $(document).ready(function() {
            $('#acceptTable').DataTable({
                "info": false,
                "bSort": false,
            });
        });
    </script>



<script>
    $('#updateData').on('shown.bs.modal', function(e) {
        var html = `
<div id="modal-content" class="modal-content">
<div class="modal-header">
                <h5 class="modal-title" id="tambaheskulLabel">Edit aduan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/aduan/edit/${$(e.relatedTarget).data('id')}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')

                <div class="p-3">
                    <label for="nama" class="form-label">nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" placeholder="isi nama " value="${$(e.relatedTarget).data('nama')}">
                </div>

                <div class="p-3">
                    <label for="nik" class="form-label">nik</label>
                    <input type="text" class="form-control" id="nik" name="nik" placeholder="isi nik " value="${$(e.relatedTarget).data('nik')}"
                    >
                </div>

                <div class="p-3">
                    <label for="email" class="form-label">email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="isi email " value="${$(e.relatedTarget).data('email')}"
                    >
                </div>

                <div class="p-3">
                    <label for="no_telp" class="form-label">no_telp</label>
                    <input type="text" class="form-control" id="no_telp" name="no_telp" placeholder="isi no_telp " value="${$(e.relatedTarget).data('no_telp')}"
                    >
                </div>

                <div class="p-3">
                    <label for="exampleFormControlTextarea1" class="form-label">isi</label>
                    <textarea class="form-control" name="isi" placeholder="Masukan Konten" id="editor">${$(e.relatedTarget).data('isi')}</textarea>
                </div>


                <input type="file" name="image" class="dropify"
                data-default-file="/thumbAduan/${$(e.relatedTarget).data('image')}" />
                <p style="font-size:12px; margin-bottom:10px; margin-top:10px">Ukuran Gambar Minimal : </p>
                <br>
                <center>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-success" type="submit">Submit</button>
                </center>

            </form>
        </div>
`;

        $('#modal-content').html(html);
        $('.dropify').dropify();

    });
</script>

    <script>
        $('.deleteee').each(function() {
            $(this).click(function() {
                console.log($(this).data('id'));
            swal({
                    title: "Yakin?",
                    text: "Tekan ok untuk hapus, cancel untuk batal!",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        window.location = `/aduan/delete/${$(this).data('id')}`;
                        swal("Data Berhasil Dihapus", {
                            icon: "success",
                        });
                    } else {
                        swal("Data Batal Dihapus");
                    }
                });
            })
        })
    </script>

</body>
</html>


