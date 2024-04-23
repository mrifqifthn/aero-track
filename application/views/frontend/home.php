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
            padding-bottom: 5%;
        }

        .navbar-brand {
            margin-left: 2%;
        }

        .text {
            text-align: center;
            color: #92B4EC;
        }

        .btn-signout {
            background-color: #EC9292 !important;
            color: #FFFFFF;
            border: none;
            border-radius: 15px;
            font-size: 15px;
        }

        .form-select-sm {
            text-align: center;
            font-size: 16px;
            color: #92B4EC;
            border: 1px solid #92B4EC;
            border-radius: 10px;
        }

        .box {
            margin-top: 5%;
            width: 40%;
            margin-left: 2%;
            padding-bottom: 3%;
            border: 2px solid white;
            background-color: white;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 20px;
        }

        .box2 {
            margin-top: -10%;
            width: 40%;
            margin-left: 50%;
            /* padding-bottom: 30%; */
            border: 2px solid white;
            background: #FFFFFF;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 20px;
        }

        .selection {
            margin-top: 3%;
            width: fit-content;
        }

        .map {
            border: 2px solid white;
            width: 95%;
            height: 95%;
            margin-top: 2%;
            background-color: white;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 20px;
        }

        .text2 {
            color: #92B4EC;
            padding-top: 10px;
        }

        .btn-ganti {
            background: #6CCB21;
            color: white;
            border-radius: 15px;
            margin-top: -1%;
        }

        .btn-download {
            background: #6CCB21;
            color: white;
            border-radius: 15px;
            /* margin-bottom: -140%; */
            margin-left: 40%;
        }

        .caution {
            color: #92B4EC;
            padding-top: 10px;
        }
    </style>
    </head>

    <body>
        <nav class="navbar navbar-light bg-light">
            <div class="container-fluid navbar-menu">
                <a class="navbar-brand" href="#"><b style="color: white;">AERO-TRACK</b></a>
                <div class="col-md-9 col12" style="text-align: right; font-weight: 400; font-size: 16px; line-height: 22px; color: white;">Selamat datang kembali, <?= $user['name']; ?>!
                </div>
                <a href="../../../auth/logout" type="button" class="btn btn-signout">Sign Out</a>
            </div>
        </nav>
        <div class="container-fluid map">
            <div class="text2">
                <div id="mapPlane"></div>
                <h6 style="font-size: 35px;"><b><?= $airport['name']; ?></b></h6>
                <h6 style="font-size: 24px;"><?= $airport['location']; ?></h6>
            </div>
            <!-- <div class="col-md-9 col-12"> -->
            <form method="POST" action="../select">
                <div class="row">
                    <div class="col-md-2">
                        <select class="form-select form-select-sm" name="id" id="id">
                            <option value="<?= $airport['id']; ?>">-- Ganti Bandara --</option>
                            <?php foreach ($airport_select as $a) : ?>
                                <option value="<?= $a['id']; ?>"><?= $a['name']; ?> (<?= $a['location']; ?>)</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-ganti">Ganti</button>
                    </div>
                </div>
            </form>
            <h6 class="caution">jika map tidak berubah harap hapus cache web anda</h6>
            <!-- </div> -->
        </div>
        <div class="row container-fluid box">
            <h5 style="font-size: 18px; color: #92B4EC; padding-left: 2%; padding-top: 2%;">SELECT DATA</h5>
            <div class="col-md-2 selection">
                <select class="form-select form-select-sm" id="set-tanggal" aria-label=".form-select-sm example">
                    <option selected>-- Tanggal --</option>
                </select>
            </div>
            <div class="col-md-2 selection">
                <select class="form-select form-select-sm" id="set-flight" aria-label=".form-select-sm example">
                    <option selected>-- Aircraft --</option>
                </select>
            </div>
            <div class="col-md-2 col-12 selection">
                <select class="form-select form-select-sm" id="set-iata" aria-label=".form-select-sm example">
                    <option selected>-- Maskapai --</option>
                </select>
            </div>
        </div>
        <div class="box2">
            <div id="graph-container">
                <div id="chart"></div>
            </div>
            <div onclick="download()" class="btn btn-download">Download</div>
            <!-- <a href="img.png" class="btn btn-download" download="output.png">Download</a> -->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>