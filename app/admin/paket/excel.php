<?php
require("../../database.php");
connectDatabase();
//header unduh file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_paket.xls");
header("Pragma: no-cache");
header("Expires: 0");

global $connection;

$query = "SELECT * FROM paket";
$hasil = mysqli_query($connection, $query);

if (!$hasil) {
    die("Query gagal: " . mysqli_error($connection));
}

echo "<table border='1'>";
echo "<tr>";
echo "<th>ID_PAKET</th>";
echo "<th>NAMA_PAKET</th>";
echo "<th>DESTINASI_PAKET</th>";
echo "<th>HARGA_PAKET</th>";
echo "<th>JEMPUT_PAKET</th>";
echo "<th>KAPASITAS_PAKET</th>";
echo "<th>TANGGAL_PAKET</th>";
echo "<th>DESKRIPSI_PAKET</th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($hasil)) {
    echo "<tr>";
    echo "<td>{$row['ID_PAKET']}</td>";
    echo "<td>{$row['NAMA_PAKET']}</td>";
    echo "<td>{$row['DESTINASI_PAKET']}</td>";
    echo "<td>{$row['HARGA_PAKET']}</td>";
    echo "<td>{$row['JEMPUT_PAKET']}</td>";
    echo "<td>{$row['KAPASITAS_PAKET']}</td>";
    echo "<td>{$row['TANGGAL_PAKET']}</td>";
    echo "<td>{$row['DESKRIPSI_PAKET']}</td>";
    echo "</tr>";
}
echo "</table>";
?>
