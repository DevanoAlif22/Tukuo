<?php

// object
$tabel = new database();
$uang = new lainnya;
$halaman = new lainnya;
$keranjang = new lainnya;
$proses = new lainnya;
$total = 0;


class database
{
    // koneksi ke database
    public $host = "localhost";
    public $user = "root";
    public $pw = "";
    public $db = "tukuo";
    public $conn;
    function __construct()
    {
        // koneksi ke database
        $this->conn = new mysqli($this->host, $this->user, $this->pw, $this->db);
        if ($this->conn == false) die("Tidak bisa terhubung ke database" . $this->conn->connect_error());
        return $this->conn;
    }
    // pagination
    public function pagination()
    {
        $conn = mysqli_connect("localhost", "root", "", "tukuo");
        $tes = mysqli_query($conn, "SELECT * FROM riwayat");
        $hitung = 0;
        $jumlahdataperhalaman = 5;
        while ($ambil = mysqli_fetch_array($tes)) {
            $hitung++;
        }
        $jumlahhalaman = ceil($hitung / $jumlahdataperhalaman);
        return $jumlahhalaman;
    }

    public function semua()
    {
        // menampilkan mahasiswaa
        $sql = "SELECT * FROM barang";
        $query = $this->conn->query($sql);
        if (!$query) die("Error");
        while ($ambil = mysqli_fetch_array($query)) {
            $result[] = $ambil;
        }
        return $result;
    }

    public function iklan()
    {
        // menampilkan mahasiswaa
        // $sql = "SELECT * FROM barang  WHERE tipe = 'iklan'  ORDER BY id DESC LIMIT 2";
        $sql = "SELECT * FROM barang  WHERE tipe = 'iklan' ORDER BY id DESC";
        $query = $this->conn->query($sql);
        if (!$query) die("Error");
        while ($ambil = mysqli_fetch_array($query)) {
            $result[] = $ambil;
        }
        return $result;
    }

    public function mobil($data)
    {
        // menampilkan mahasiswaa
        // $sql = "SELECT * FROM barang  WHERE tipe = 'iklan'  ORDER BY id DESC LIMIT 2";
        if ($data == "mobil") {
            $sql2 = "SELECT * FROM barang WHERE tipe = 'mobil' ORDER BY id DESC";
        } else {
            $sql2 = "SELECT * FROM barang WHERE tipe = 'mobil' ORDER BY id DESC LIMIT 4";
        }
        $query = $this->conn->query($sql2);
        if (!$query) die("Error");
        while ($ambil = mysqli_fetch_array($query)) {
            $result[] = $ambil;
        }
        return $result;
    }

    public function motor($data)
    {
        // menampilkan mahasiswaa
        // $sql = "SELECT * FROM barang  WHERE tipe = 'iklan'  ORDER BY id DESC LIMIT 2";
        if ($data == "motor") {
            $sql = "SELECT * FROM barang  WHERE tipe = 'motor' ORDER BY id";
        } else {
            $sql = "SELECT * FROM barang  WHERE tipe = 'motor' ORDER BY id LIMIT 4";
        }
        $query = $this->conn->query($sql);
        if (!$query) die("Error");
        while ($ambil = mysqli_fetch_array($query)) {
            $result[] = $ambil;
        }
        return $result;
    }

    public function hp($data)
    {
        // menampilkan mahasiswaa
        // $sql = "SELECT * FROM barang  WHERE tipe = 'iklan'  ORDER BY id DESC LIMIT 2";
        if ($data == "hp") {
            $sql = "SELECT * FROM barang  WHERE tipe = 'hp' ORDER BY id DESC";
        } else {
            $sql = "SELECT * FROM barang  WHERE tipe = 'hp' ORDER BY id DESC LIMIT 4";
        }
        $query = $this->conn->query($sql);
        if (!$query) die("Error");
        while ($ambil = mysqli_fetch_array($query)) {
            $result[] = $ambil;
        }
        return $result;
    }


    // riwayat
    public function riwayat()
    {
        $hitung = 0;
        $jumlahdataperhalaman = 5;
        $jumlahdata = $this->conn->query("SELECT * FROM riwayat");
        while ($ambil = mysqli_fetch_array($jumlahdata)) {
            $hitung++;
        }
        $jumlahhalaman = ceil($hitung / $jumlahdataperhalaman);
        $halamanaktif = (isset($_GET["riwayat"]) ? $_GET["riwayat"] : 1);
        $awaldata = ($jumlahdataperhalaman * $halamanaktif) - $jumlahdataperhalaman;

        $sql = "SELECT * FROM riwayat LIMIT $awaldata, $jumlahdataperhalaman";
        $query = $this->conn->query($sql);
        if (!$query) die("Error");
        while ($ambil = mysqli_fetch_array($query)) {
            $result[] = $ambil;
        }
        return $result;
    }

    // ambil keranjang
    public function jaran($data, $data2)
    {
        // menampilkan mahasiswaa
        // $sql = "SELECT * FROM barang  WHERE tipe = 'iklan'  ORDER BY id DESC LIMIT 2";
        $sql = "SELECT * FROM barang  WHERE id = $data";
        $query = $this->conn->query($sql);
        if (!$query) die("Error");
        while ($ambil = mysqli_fetch_array($query)) {
            $result[] = $ambil;
        }
        return $result[0][$data2];
    }

    // tambah ke riwayat
    public function riwayatmasuk($nama, $tanggal, $total)
    {
        $nama2 = htmlspecialchars($nama);
        $tanggal2 = htmlspecialchars($tanggal);
        $total2 = htmlspecialchars($total);

        // query data
        $sql = "INSERT INTO riwayat VALUES ('', '$nama2', '$tanggal2', '$total2')";
        $this->conn->query($sql);
    }

    // tambah produk 
    public function produk($data)
    {
        $nama = htmlspecialchars($_POST["nama"]);
        $deskripsi = htmlspecialchars($_POST["deskripsi"]);
        $harga = htmlspecialchars($_POST["harga"]);
        $tipe = htmlspecialchars($_POST["tipe"]);
        $gambar = $data->upload();

        if (!$gambar) {
            echo "
            <script>
            alert('!gambar');
            </script>
            ";
            return false;
        }
        echo "
        <script>
        alert('Berhasil');
        </script>
        ";
        $sql = "INSERT INTO barang VALUES ('', '$nama', '$deskripsi', '$harga', '$gambar', '$tipe')";
        $this->conn->query($sql);
    }
    // upload gambar
    public function upload()
    {
        $namafile = $_FILES['gambar']['name'];
        $ukuranfile = $_FILES['gambar']['size'];
        $error = $_FILES['gambar']['error'];
        $tmpname = $_FILES['gambar']['tmp_name'];

        // cek apakah gambar tidak di upload
        if ($error === 4) {
            echo "
        <script>
        alert('Pilih gambar terlebih dahulu');
        </script>
        ";
            return false;
        }
        // cek apakah yang diupload itu gambar
        $ektensigambarvalid = ['jpg', 'jpeg', 'png'];
        $ekstensigambar = explode('.', $namafile);
        $ekstensigambar = strtolower(end($ekstensigambar));

        // apakah gambar sesuai dengan syarat jpg jpeg png
        if (!in_array($ekstensigambar, $ektensigambarvalid)) {
            echo "
        <script>
        alert('Yang anda upload bukan gambar!');
        </script>
        ";
            return false;
        }

        // cek jika ukurannya terlalu besar dari 4 mb
        if ($ukuranfile > 4000000) {
            echo "
        <script>
        alert('Ukuran gambar melebihi 4MB!');
        </script>
        ";
            return false;
        }

        // lolos semua pengecekan
        // generater nama gambar baru
        $namafilebaru = uniqid();
        $namafilebaru .= '.';
        $namafilebaru .= $ekstensigambar;
        // var_dump($namafilebaru);
        move_uploaded_file($tmpname, '../img/' . $namafilebaru);
        // var_dump($namafilebaru);
        return $namafilebaru;
    }

    // hapus riwayat
    public function hapusriwayat($data)
    {
        $sql2 = "DELETE FROM riwayat WHERE id = $data";
        $this->conn->query($sql2);
    }

    // cari
    public function cari($data)
    {
        $sql = "SELECT * FROM barang WHERE 
        nama LIKE '%$data%' OR
        deskripsi LIKE '%$data%' OR
        harga LIKE '%$data%' OR
        tipe LIKE '%$data%'
        ";
        $query = $this->conn->query($sql);
        if (!$query) die("Error");
        while ($ambil = mysqli_fetch_array($query)) {
            $result[] = $ambil;
        }
        return $result;
    }
}

class lainnya
{
    public function convert($uang)
    {
        $hasil_rupiah = "Rp " . number_format($uang, 2, ',', '.');
        return $hasil_rupiah;
    }

    public function halaman()
    {
        $hasil = header("Location: index.php?muat=beli&beli");
        return $hasil;
    }

    public function keranjang($data)
    {

        if (isset($_SESSION['keranjang'][$data])) {

            $_SESSION['keranjang'][$data]++;
        } else {
            $_SESSION['keranjang'][$data] = 1;
        }
    }
    public function prosesbayar($data)
    {
        if ($_POST['pembayaran'] >= $_SESSION['total']) {
            $data->riwayatmasuk($_POST["nama"], $_POST["tanggal"], $_SESSION['total']);
            echo "<script type='text/javascript'>alert('BERHASIL');
            window.location.href = 'hapussession.php';
            </script>";
        } else if ($_POST['pembayaran'] < $_SESSION['total']) {
            echo "<script type='text/javascript'>alert('Uang anda kurang');</script>";
        }
    }
}
