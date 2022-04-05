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

</head>
<body>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">

          <a class="navbar-brand" href="#">
              <h4 class="text-primary">JabarAjuan</h4>
          </a>

          <button class="navbar-toggler" type="button">
            <span class="navbar-toggler-icon"></span>
          </button>


          <div class="navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <div class="menu">
                <a class="nav-link"href="{{ url('/') }}">Home</a>
                @if (Route::has('login'))
                    @auth
                    @else
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>

                    @if (Route::has('register'))
                        {{-- <a href="{{ route('register') }}" class="nav-link">Register</a> --}}
                    @endif
                    @endauth
                @endif
              </div>

              <div class="getStarted">
                  <div class="polygon">
                      <div class="clipath"></div>
                  </div>
                  <div class="buttonWrapper">
                    <a href="{{ url('aduan/') }}" class="nav-link">Ajukan Sekarang</a>
                  </div>
              </div>

            </div>
          </div>

        </div>
    </nav>
    <!--End Navbar-->

    <form action="{{ route('aduan.create') }}" class="container pt-5" method="post" enctype="multipart/form-data">
        @csrf

        <div class="p-3">
            <label for="nik" class="form-label">nik</label>
            <input type="number" class="form-control" id="nik" name="nik" placeholder="Masukan Nik " required>
        </div>

        <div class="p-3">
            <label for="nama" class="form-label">nama</label>
            <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama " required>
        </div>

        <div class="p-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukan Email " required>
        </div>

        <div class="p-3">
            <label for="no_telp" class="form-label">Nomor Telepon</label>
            <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Masukan Nomor Telepon" required>
        </div>

        <div class="p-3">
            <label for="exampleFormControlTextarea1" class="form-label">Aduan</label>
            <textarea class="form-control" name="isi" placeholder="Masukan Aduan Anda" id="editor"></textarea>
        </div>

        <div class="p-3">
            <label for="nama" class="form-label">Masukan Gambar</label>
            <input type="file" name="image" class="dropify p-2" required />
        </div>

        <div class="p-3">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>

    </form>

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
            $('#bannerTable').DataTable({
                "info": false,
                "bSort": false,
            });
        });

        $(document).ready(function() {
            $('#aduanTable').DataTable({
                "info": false,
                "bSort": false,
            });
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


