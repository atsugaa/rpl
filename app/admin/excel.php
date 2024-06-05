<?php
require_once('../base.php');
require("../database.php");
connectDatabase();
//header unduh file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_Dasboard_pemesanan.xls");
header("Pragma: no-cache");
header("Expires: 0");

global $connection;

$query = "SELECT * FROM pemesanan";
$hasil = mysqli_query($connection, $query);

if (!$hasil) {
    die("Query gagal: " . mysqli_error($connection));
}

echo "<table border='1'>";
echo "<tr>";
echo "<th>ID PEMESANAN</th>";
echo "<th>ID PAKET</th>";
echo "<th>ID USER</th>";
echo "<th>CATATAN PESANAN</th>";
echo "<th>JUMLAH PESANAN</th>";
echo "<th>TOTAL HARGA</th>";
echo "<th>TANGGAL PEMESANAN</th>";
echo "<th>TITIK JEMPUT_PEMESANAN</th>";
echo "<th>STATUS PEMESANAN</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($hasil)) {
    echo "<tr>";
    echo "<td>{$row['ID_PEMESANAN']}</td>";
    echo "<td>{$row['ID_PAKET']}</td>";
    echo "<td>{$row['ID_USER']}</td>";
    echo "<td>{$row['CATATAN_PESANAN']}</td>";
    echo "<td>{$row['JUMLAH_PESANAN']}</td>";
    echo "<td>{$row['TOTAL_HARGA']}</td>";
    echo "<td>{$row['TANGGAL_PEMESANAN']}</td>";
    echo "<td>{$row['TITIK_JEMPUT_PEMESANAN']}</td>";
    echo "<td>{$row['STATUS_PEMESANAN']}</td>";
    echo "</tr>";
}
echo "</table>";
?>
