<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Dev Login</title>


    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="icon" href="{{ asset('argon') }}/img/mbpj.png">
    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        html,
        body {
            height: 100%;
        }

        body {
            display: flex;
            align-items: center;
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            width: 100%;
            max-width: 330px;
            padding: 15px;
            margin: auto;
        }

        .form-signin .checkbox {
            font-weight: 400;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }

        .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
    </style>
</head>

<body class="text-center">

    <main class="form-signin">
        <img class="mb-4" src="{{ asset('argon') }}/img/mbpj.png" alt="" width="50%" height="50%">
        <h1 class="h3 mb-3 fw-normal">Sila Pilih Pengguna</h1>
        {{-- <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div> --}}

        <a class="w-100 btn btn-lg btn-primary mb-4" href="/devlogin/kakitangan">KAKITANGAN</a>

        <a class="w-100 btn btn-lg btn-primary mb-4" href="/devlogin/penyelia">PENYELIA</a>

        <a class="w-100 btn btn-lg btn-primary mb-4" href="/devlogin/ketua_bahagian">KETUA BAHAGIAN</a>

        <a class="w-100 btn btn-lg btn-primary mb-4" href="/devlogin/ketua_jabatan">KETUA JABATAN</a>

        <a class="w-100 btn btn-lg btn-primary mb-4" href="/devlogin/datuk_bandar">DATUK BANDAR</a>

        <a class="w-100 btn btn-lg btn-primary mb-4" href="/devlogin/kerani_semakan">KERANI SEMAKAN</a>

        <a class="w-100 btn btn-lg btn-primary mb-4" href="/devlogin/kerani_pemeriksa">KERANI PEMERIKSA</a>

        <a class="w-100 btn btn-lg btn-primary mb-4" href="/devlogin/pelulus_pindaan">PELULUS PINDAAN</a>

        <a class="w-100 btn btn-lg btn-primary mb-4" href="/devlogin/pentadbir_sistem">PENTADBIR SISTEM</a>

        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </main>



</body>

</html>
