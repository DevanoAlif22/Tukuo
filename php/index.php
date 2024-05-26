<?php
session_start();
require_once('function.php');
$jumlahhalaman = $tabel->pagination();
// riwayat halaman
if (!$_GET["muat"]) {
    $halaman->halaman();
}
// keranjang
if (isset($_GET['beli'])) {
    if ($_GET['beli'] != "mobil" && $_GET['beli'] != "motor" && $_GET['beli'] != "hp") {
        $keranjang->keranjang($_GET['beli']);
    }
} // proses bayar
if (isset($_POST['bayar'])) {
    $proses->prosesbayar($tabel);
}
// proses tambah
if (isset($_POST['tambah'])) {
    $tabel->produk($tabel);
}
// proses cari

?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="../img/logo6.png">
    <link rel="stylesheet" href="../css/ggs.css">
    <title>Tukuo-beranda</title>
</head>

<body>

    <!-- Modal -->
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Penambahan Produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Nama produk</label>
                            <input required autocomplete="off" name="nama" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Honda Beat">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Deskripsi Produk</label>
                            <textarea required autocomplete="off" name="dskripsi" placeholder="Honda BeAT 2023 merupakan skutik anak muda paling irit, dengan desain yang sporty dan dilengkapi Teknologi eSAF dan Power Charger" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Harga Produk</label>
                            <input required autocomplete="off" name="harga" type="number" class="form-control" id="exampleFormControlInput1" placeholder="230000000">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Gambar Produk</label>
                            <input required autocomplete="off" name="gambar" type="file" class="form-control" id="exampleFormControlInput1" placeholder="gambar.png">
                        </div>
                        <div class="mb-3">
                            <label for="exampleFormControlInput1" class="form-label">Tipe produk</label>
                            <select name="tipe" for="exampleFormControlInput1" class="form-label" name="tipe">
                                <option value="iklan" selected>iklan</option>
                                <option value="mobil">mobil</option>
                                <option value="motor">motor</option>
                                <option value="hp">hp</option>
                            </select>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button name="tambah" type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!-- end modal -->


    <!-- Navbar 1 -->
    <nav class="navbar navbar-expand-md nav" style="background-color: #3A2C85 ; ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img class="logo" src="../img/logo4.png" alt=""></a>
            <button class="navbar-toggler" style="background-color: white;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <form class="d-flex" action="" method="POST">
                    <input autocomplete="off" name="pencari" class="pencari form-control me-2 " type="text" placeholder="Mobil Honda Brio 2023.." aria-label="Search">
                    <button name="cari" class="btn cari" type="submit">Cari</button>
                    <div class="keranjang"><i data-bs-toggle="modal" data-bs-target="#exampleModal" class="logokeranjang fa-sharp fa-solid fa-plus fa-xl"></i></div>
                </form>
            </div>
        </div>
    </nav>
    <!-- end navbar 1 -->

    <!-- navbar 2 -->
    <nav class="navbar navbar-expand-md nav2 ">
        <div class="container-fluid justify-content-start">
            <a style="margin-right: 10px; <?php if ($_GET["muat"] == "beli") : ?> border-bottom: solid 2px black; <?php endif; ?>color:black; text-decoration:none;" class="link" aria-current="page" href="?muat=beli&beli">Beli</a>
            <a style="margin-right: 10px; <?php if ($_GET["muat"] == "riwayat") : ?> border-bottom: solid 2px black; <?php endif; ?>" class="nav-link link" href="index.php?muat=riwayat&riwayat=1">Riwayat</a>
            <a style="<?php if ($_GET["muat"] == "keranjang") : ?> border-bottom: solid 2px black; <?php endif; ?>" class="nav-link link" href="?muat=keranjang">Keranjang</a>
        </div>
    </nav>
    <!-- end navbar 2 -->

    <!-- iklan utama -->

    <!-- carausel -->
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <?php foreach ($tabel->iklan() as $iklan2) : ?>
                <div class="carousel-item <?php if ($iklan2['id'] == 3) : ?> active <?php endif; ?>">
                    <div class="container-lg nav3">
                        <div class="row" style="background-color: whitesmoke; padding:10px;">
                            <div class="col-md-8 iklan">
                                <img src="../img/<?= $iklan2['gambar'] ?>" alt="">
                            </div>
                            <div class="col-md-4" style="margin-top: 20px;">
                                <div style="width: 100px; background-color:#DF3435; color:white; padding: 5px 20px; border-radius: 5px; margin-bottom :10px;">Promosi</div>
                                <h3><?= $iklan2['nama'] ?></h3>
                                <p><?= $iklan2['deskripsi'] ?></p>
                                <h3><?= $uang->convert($iklan2['harga']) ?></h3>
                                <p>Jangan lewatkan tawaran terbaik</p>
                                <button id="tambahiklan" type="button" class="btn btn-primary">Tambah Keranjang<i style="margin-left: 10px;" class="fa-sharp fa-solid fa-basket-shopping"></i></button>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>
            <!-- end -->
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" style=" background-color: black; border-radius:50px;" aria-hidden=" true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" style=" background-color: black; border-radius:50px;" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end carausel -->

    <!-- end iklan utama -->

    <!-- ketika mencari data -->
    <?php if (isset($_POST['cari'])) : ?>
        <!-- hasil pencarian -->
        <div class="container-fluid" style="padding-bottom:20px; background-color: white; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; margin-bottom: 30px;">
            <div class=" container-lg nav3">
                <div class="row" style="margin-bottom: 20px;">
                    <div class=" col">
                        <h4>Hasil pencarian</h4>
                    </div>
                </div>
                <!-- row -->
                <div class="row" style="justify-content: space-between;">
                    <?php foreach ($tabel->cari($_POST['pencari']) as $data) : ?>
                        <!-- foreach -->
                        <div class="col-3 kartu" style=" width: 270px; border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; height:330px; padding:0px;">
                            <div class="zoom">
                                <div class="gambar">
                                    <img src="../img/<?= $data['gambar'] ?>" alt="">
                                </div>
                            </div>
                            <div class="deskripsi">
                                <h5><?= $data['nama'] ?></h5>
                                <h5><?= $uang->convert($data['harga']) ?></h5>
                                <p>Deskripsi Mobil<i style="margin-left: 10px;" class="fa-solid fa-circle-info"></i></p>
                                <button type="button" style="height:40px;" class="btn btn-primary"> <a href="index.php?muat=beli&beli=<?= $data["id"]; ?>" style="text-decoration: none; color:white;">Tambah Keranjang</a> <i class=" fa-sharp fa-solid fa-basket-shopping"></i></button>
                            </div>
                        </div>
                        <!-- end for each -->
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
            <!-- end row -->
            </div>
        </div>
        <!-- End pencarian -->


        <!-- halaman beli -->
        <?php if ($_GET["muat"] == "beli") : ?>
            <!-- mobil terbaru -->
            <div class="container-fluid" style="padding-bottom:20px; background-color: white; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; margin-bottom: 30px;">
                <div class=" container-lg nav3">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class=" col">
                            <h4>Mobil Terbaru</h4>
                        </div>
                        <div class=" col" style="text-align: end;">
                            <?php if ($_GET["beli"] == "mobil") : ?>
                                <a href="index.php" style="text-decoration: none;"><i class="fa-sharp fa-solid fa-chevron-left"></i> Perkecil </a>
                            <?php endif; ?>
                            <?php if ($_GET["beli"] == "") : ?>
                                <a href="index.php?muat=beli&beli=mobil" style="text-decoration: none;">Selengkapnya <i class="fa-sharp fa-solid fa-chevron-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row" style="justify-content: space-between;">
                        <?php foreach ($tabel->mobil($_GET["beli"]) as $mobil2) : ?>
                            <!-- foreach -->
                            <div class="col-3 kartu" style=" width: 270px; border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; height:330px; padding:0px;">
                                <div class="zoom">
                                    <div class="gambar">
                                        <img src="../img/<?= $mobil2['gambar'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="deskripsi">
                                    <h5><?= $mobil2['nama'] ?></h5>
                                    <h5><?= $uang->convert($mobil2['harga']) ?></h5>
                                    <p>Deskripsi Mobil<i style="margin-left: 10px;" class="fa-solid fa-circle-info"></i></p>
                                    <button type="button" style="height:40px;" class="btn btn-primary"> <a href="index.php?muat=beli&beli=<?= $mobil2["id"]; ?>" style="text-decoration: none; color:white;">Tambah Keranjang</a> <i class=" fa-sharp fa-solid fa-basket-shopping"></i></button>
                                </div>
                            </div>
                            <!-- end for each -->
                        <?php endforeach; ?>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!--end  mobil terbaru -->

            <!-- handphone terbaru -->
            <div class="container-fluid" style="padding-bottom:20px; background-color: white; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; margin-bottom: 30px;">
                <div class=" container-lg nav3">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class=" col">
                            <h4>Sepeda Motor Terbaru</h4>
                        </div>
                        <div class=" col" style="text-align: end;">
                            <?php if ($_GET["beli"] == "motor") : ?>
                                <a href="index.php" style="text-decoration: none;"><i class="fa-sharp fa-solid fa-chevron-left"></i> Perkecil </a>
                            <?php endif; ?>
                            <?php if ($_GET["beli"] == "") : ?>
                                <a href="index.php?muat=beli&beli=motor" style="text-decoration: none;">Selengkapnya <i class="fa-sharp fa-solid fa-chevron-right"></i></a>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="row" style="justify-content: space-between;">
                        <?php foreach ($tabel->motor($_GET["beli"]) as $motor2) : ?>
                            <!-- foreach -->
                            <div class="col-3 kartu" style=" width: 270px; border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; height:330px; padding:0px;">
                                <div class="zoom">
                                    <div class="gambar">
                                        <img src="../img/<?= $motor2['gambar'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="deskripsi">
                                    <h5><?= $motor2['nama'] ?></h5>
                                    <h5><?= $uang->convert($motor2['harga']) ?></h5>
                                    <p>Deskripsi Motor<i style="margin-left: 10px;" class="fa-solid fa-circle-info"></i></p>
                                    <button type="button" style="height:40px;" class="btn btn-primary"><a style="color:white; text-decoration:none;" href="index.php?muat=beli&beli=<?= $motor2["id"]; ?>">Tambah Keranjang</a> <i class="fa-sharp fa-solid fa-basket-shopping"></i></button>
                                </div>
                            </div>
                            <!-- end for each -->
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <!--end  Sepeda Motor terbaru -->

            <!-- handphone terbaru -->
            <div class="container-fluid" style="padding-bottom:20px; background-color: white; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; margin-bottom: 100px;">
                <div class=" container-lg nav3">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class=" col">
                            <h4>Handphone Terbaru</h4>
                        </div>
                        <div class=" col" style="text-align: end;">
                            <?php if ($_GET["beli"] == "hp") : ?>
                                <a href="index.php" style="text-decoration: none;"><i class="fa-sharp fa-solid fa-chevron-left"></i> Perkecil </a>
                            <?php endif; ?>
                            <?php if ($_GET["beli"] == "") : ?>
                                <a href="index.php?muat=beli&beli=hp" style="text-decoration: none;">Selengkapnya <i class="fa-sharp fa-solid fa-chevron-right"></i></a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="row" style="justify-content: space-between;">
                        <?php foreach ($tabel->hp($_GET["beli"]) as $hp2) : ?>
                            <!-- foreach -->
                            <div class="col-3 kartu" style=" width: 270px; border-radius: 10px;box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; height:330px; padding:0px;">
                                <div class="zoom">
                                    <div class="gambar">
                                        <img src="../img/<?= $hp2['gambar'] ?>" alt="">
                                    </div>
                                </div>
                                <div class="deskripsi">
                                    <h5><?= $hp2['nama'] ?></h5>
                                    <h5><?= $uang->convert($hp2['harga']) ?></h5>
                                    <p>Deskripsi Mobil<i style="margin-left: 10px;" class="fa-solid fa-circle-info"></i></p>
                                    <button type="button" style="height:40px;" class="btn btn-primary"><a style="color:white; text-decoration:none;" href="index.php?muat=beli&beli=<?= $hp2["id"]; ?>">Tambah Keranjang</a> <i class="fa-sharp fa-solid fa-basket-shopping"></i></button>
                                </div>
                            </div>
                            <!-- end for each -->
                        <?php endforeach ?>
                    </div>
                </div>
            </div>
            <!--end  Sepeda Motor terbaru -->
        <?php endif; ?>



        <!-- end halaman beli -->

        <?php if (isset($_GET["riwayat"])) : ?>
            <div class="container-fluid" style="padding-bottom:20px; background-color: whitesmoke; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; margin-bottom: 30px;">
                <div class=" container-lg">

                    <!-- pagination -->
                    <div class="row" style="display: flex;">
                        <div class="col2">
                            <h3 style="padding-top: 20px; margin-bottom: 10px;">Riwayat Pesanan</h3>
                        </div>
                        <div class="col2">
                            <?php if ($_GET["riwayat"] > 1) : ?>
                                <a href="index.php?muat=riwayat&riwayat=<?= $_GET["riwayat"] - 1 ?>" style=""><i class="fa-sharp fa-solid fa-chevron-left"></i></a>
                            <?php endif; ?>
                            <?php for ($i = 1; $i <=  $jumlahhalaman; $i++) : ?>
                                <?php ?>
                                <?php if ($i == $_GET["riwayat"]) : ?>
                                    <a href="index.php?muat=riwayat&riwayat=<?= $i ?>" style="cursor:pointer; color:white; padding: 5px 12px; border-radius: 20px; margin-left:10px; text-decoration: none; background-color:#3bbbf1;  box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"><?= $i ?></a>
                                <?php else : ?>
                                    <a href="index.php?muat=riwayat&riwayat=<?= $i ?>" style="cursor:pointer; color:black; padding: 5px 12px; border-radius: 20px; margin-left:10px; text-decoration: none; background-color:white; box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;"><?= $i ?></a>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <?php if ($_GET["riwayat"] < $jumlahhalaman) : ?>
                                <a href="index.php?muat=riwayat&riwayat=<?= $_GET["riwayat"] + 1 ?>" style="margin-left: 10px;"><i class="fa-sharp fa-solid fa-chevron-right"></i></a>
                            <?php endif; ?>

                        </div>
                    </div>
                    <div class="row" style="margin-top: 20px; border:solid 1px black; border-radius:10px; padding:10px 5px; background-color:white; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;">
                        <div class="col-2" style="align-items: center; text-align:center;">
                            <h5 class="riwayath5">Id<i style="margin-left: 10px;" class="fa-sharp fa-solid fa-id-badge"></i></h5>
                        </div>
                        <div class="col-3" style="align-items: center; text-align:center;">
                            <h5 class="riwayath5">Nama <i style="margin-left: 10px;" class="fa-sharp fa-solid fa-id-card"></i> </h5>
                        </div>
                        <div class="col-2" style="align-items: center; text-align:center;">
                            <h5 class="riwayath5">Tanggal <i style="margin-left: 10px;" class="fa-sharp fa-solid fa-calendar-days"></i></h5>
                        </div>
                        <div class="col-3" style="align-items: center; text-align:center;">
                            <h5 class="riwayath5">Total <i style="margin-left: 10px;" class="fa-sharp fa-solid fa-calculator"></i></h5>
                        </div>
                        <div class="col-2" style="align-items: center; text-align:center;">
                            <h5 class="riwayath5">Aksi </h5>
                        </div>
                    </div>
                    <!-- foreach riwayat -->
                    <?php $i = 1; ?>
                    <?php foreach ($tabel->riwayat() as $riwayat2) : ?>
                        <div class="row" style="margin-top: 10px; border:solid 1px black; border-radius:10px; padding:10px 5px; background-color: rgb(249, 254, 255);">
                            <div class="col-2" style="align-items: center; text-align:center;">
                                <h5 class="riwayath5"><?= $i ?></h5>
                            </div>
                            <div class="col-3" style="align-items: center; text-align:center;">
                                <h5 class="riwayath5"><?= $riwayat2["nama"]; ?></h5>
                            </div>
                            <div class="col-2" style="align-items: center; text-align:center;">
                                <h5 class="riwayath5"><?= $riwayat2["tanggal"]; ?></h5>
                            </div>
                            <div class="col-3" style="align-items: center; text-align:center;">
                                <h5 class="riwayath5"><?= $uang->convert($riwayat2['total']) ?></h5>
                            </div>
                            <div class="col-2" style="align-items: center; text-align:center;">
                                <a href="hapus.php?hapus=<?= $riwayat2["id"] ?>" class="riwayath5"><i style="cursor: pointer; color:black; " class="fa-solid fa-trash"></i></a>
                            </div>
                        </div>
                        <?php $i++ ?>
                    <?php endforeach ?>
                    <!-- end foreach riwayat -->
                <?php endif; ?>
                </div>
            </div>

            <?php if ($_GET["muat"] == "keranjang") : ?>
                <!-- keranjang -->
                <div class="container-fluid" style="padding-bottom:20px; background-color: white; box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px; margin-bottom: 100px;">
                    <div class=" container-lg nav3">
                        <div class="row" style="margin-bottom: 20px;">

                            <div class="col-md" style=" display:flex; margin-bottom:20px;">
                                <div class="wrap" style="width: 550px; margin:auto; border:1px solid black; border-radius:10px 10px 0px 0px;">
                                    <div class="detail" style="padding:10px 0px; background-color: #84d1f1; align-items:center; text-align:center; border-radius: 10px 10px 0px 0px;">
                                        <h3>Detail Barang</h3>
                                    </div>
                                    <div class="isidetail">
                                        <div class="row" style="justify-content: center; display:flex; padding: 10px;">
                                            <div class="col-5" style="align-items: center; text-align:center;">
                                                <h4>Produk</h4>
                                            </div>
                                            <div class="col-2">
                                                <h4>Jumlah</h4>
                                            </div>
                                            <div class="col-5" style="align-items: center; text-align:center;">
                                                <h4>Harga</h4>
                                            </div>
                                        </div>
                                        <?php foreach ($_SESSION['keranjang'] as $keranjang => $value) : ?>
                                            <?php if ($keranjang != '') : ?>
                                                <div class="row">
                                                    <div class="col-5" style="align-items: center; text-align:center;">
                                                        <p style="align-items: center; text-align:center;"><?= $tabel->jaran($keranjang, "nama"); ?></p>
                                                    </div>
                                                    <div class="col-2">
                                                        <p style="align-items: center; text-align:center;"><?= $value ?></p>
                                                    </div>
                                                    <div class="col-5" style="align-items: center; text-align:center;">
                                                        <p style="align-items: center; text-align:center;"><?= $uang->convert($tabel->jaran($keranjang, "harga") * $value); ?></p>
                                                    </div>
                                                </div>
                                                <?php
                                                $total += $tabel->jaran($keranjang, "harga") * $value;
                                                $_SESSION['total'] = $total;
                                                ?>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="footer" style="text-align: start; border-top:solid 1px black; display:flex; padding:10px;  justify-content:space-between;">
                                        <h4 style="margin-left: 20px;">Total : <?= $uang->convert($total); ?> </h4>
                                        <button type="button" class="btn btn-danger" style="margin-right: 10px; height:40px;" data-bs-dismiss="modal"><a style="text-decoration: none; color:white;" href="hapussession.php">Hapus</a></button>
                                    </div>
                                </div>
                            </div>
                            <!-- form pembayaran -->
                            <div class="col-md" style=" display:flex; ">
                                <div class="wrap" style="width: 550px; margin:auto; border:1px solid black; border-radius:10px 10px 0px 0px;">
                                    <div class="detail" style="padding:10px 0px; background-color: #84d1f1; align-items:center; text-align:center; border-radius: 10px 10px 0px 0px;">
                                        <h3>Formulir</h3>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="isidetail" style="padding: 10px;">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Nama</label>
                                                <input name="nama" type="text" class="form-control" required autocomplete="off" id="exampleFormControlInput1" placeholder="Devano">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                                                <input name="tanggal" type="date" class="form-control" required autocomplete="off" id="exampleFormControlInput1" placeholder="name@example.com">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Pembayaran</label>
                                                <input name="pembayaran" type="number" class="form-control" required autocomplete="off" id="exampleFormControlInput1" placeholder="50000000">
                                            </div>
                                        </div>
                                        <div class="modal-footer" style="padding: 10px 0px;">

                                            <button name="bayar" type="submit" class="btn btn-primary" style="margin-right: 10px;">Pembayaran</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- end keranjang -->
            <?php endif; ?>

            <!-- footer -->
            <div class="container-fluid" style="background-color: #3A2C85 ; height:100px; margin-bottom:0px; display: flex;  flex-direction:column; align-items:center; justify-content:center">
                <div class="div">
                    <i class="fa-brands fa-whatsapp fa-xl" style="cursor:pointer; padding: 17px 8px 17px 8px; margin-right:10px; background-color:white; border-radius:20px;"></i>
                    <i class="fa-brands fa-instagram fa-xl" style="cursor:pointer; padding: 17px 8px 17px 8px;margin-right:10px;  background-color:white; border-radius:20px;"></i>
                    <i class="fa-brands fa-facebook-f fa-xl" style="cursor:pointer; padding: 17px 10px 17px 10px;margin-right:10px;  background-color:white; border-radius:20px;"></i>
                </div>
                <a href="" style="text-decoration: none; color:white; margin-top: 10px; margin-right:10px;">www.tukuo.com</a>
            </div>
            <!-- end footer -->
            </div>
            <script src="../alert/dist/sweetalert2.all.min.js"></script>
            <script src="../js/script.js"></script>
            <script src=" https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
            </script>
            <script>
                const tambahiklan = document.querySelector("#tambahiklan");

                tambahiklan.addEventListener("click", function() {
                    console.log("yaaa");

                    Swal.fire({
                        title: "Do you want to save the changes?",
                        showDenyButton: true,
                        showCancelButton: true,
                        confirmButtonText: "Save",
                        denyButtonText: `Don't save`,
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            Swal.fire("Saved!", "", "success");
                        } else if (result.isDenied) {
                            Swal.fire("Changes are not saved", "", "info");
                        }
                    });
                });
            </script>
</body>
</body>

</html>