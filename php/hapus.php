<?php
require_once('function.php');
$id = $_GET["hapus"];
var_dump($id);
if ($id > 0) {
    $tabel->hapusriwayat($id);
    echo "
        <script>
        alert('Riwayat berhasil di hapus!');
        </script>
        ";
} else {
    echo "
        <script>
        alert('Riwayat gagal di hapus!');
        </script>
        ";
}

header('Location:index.php');
