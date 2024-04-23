<style type="text/css">
    * {
        font-family: 'Open Sans', sans-serif;
    }

    .navbar-menu {
        background-color: #92B4EC;
    }

    nav {
        padding-top: 0px !important;
        padding-bottom: 0px !important;
    }

    body {
        background-color: #e9f1ff;
        width: 100%;
    }

    .left img {
        width: 90%;
        height: auto;
        margin-left: 10%;
        margin-top: 10%;
    }

    .navbar-brand {
        margin-left: 2%;
    }

    .card {
        padding-top: 15%;
        padding-bottom: 5%;
        margin-top: 10%;
        margin-left: 10%;
        background: #FFFFFF;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 20px;
        color: #92B4EC;
    }

    .card-title {
        text-align: center;
        font-size: 50px;
        padding-bottom: 5%;
    }

    .btn-primary {
        margin-top: 2%;
        margin-bottom: 15%;
        background-color: #92B4EC !important;
        border: none;
    }

    .text {
        text-align: center;
        color: #92B4EC;
    }

    .form-control {
        background-color: #e9f1ff !important;
    }
</style>
</head>

<body>
    <nav class="navbar navbar-light bg-light">
        <div class="container-fluid navbar-menu">
            <a class="navbar-brand" href="#"><b style="color: white;">AERO-TRACK</b></a>
        </div>
    </nav>
    <div class="row container-fluid">
        <div class="col-md-7 left">
            <img src="<?= base_url() ?>/assets/images/Konten Kiri.png" alt="gambar pesawat">
        </div>
        <div class="col-md-5 col-12 right">
            <div class="card" style="width: 25rem;">
                <div class="card-body">
                    <h5 class="card-title"><b>Sign In</b></h5>
                    <?= $this->session->flashdata('message'); ?>
                    <form method="POST" action="auth/cek_login">
                        <div class="mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Username or E-mail">
                        </div>
                        <div class="mb-3">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                        </div>
                        <div class="text">
                            <h6>Lupa Password? <a href="">Klik di sini</a></h6>
                            <button type="submit" class="btn btn-primary">Sign In</button>
                            <h6>Belum memiliki akun? <a href="">Daftar di sini</a></h6>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>