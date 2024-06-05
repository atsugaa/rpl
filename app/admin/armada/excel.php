<?php
require("../../database.php");
connectDatabase();
//header unduh file Excel
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=laporan_armada.xls");
header("Pragma: no-cache");
header("Expires: 0");

global $connection;

$query = "SELECT * FROM kendaraan";
$hasil = mysqli_query($connection, $query);

if (!$hasil) {
    die("Query gagal: " . mysqli_error($connection));
}

echo "<table border='1'>";
echo "<tr>";
echo "<th>NAMA </th>";
echo "<th>ID KENDARAAN</th>";
echo "<th>HARGA</th>";
echo "<th>DESKRIPSI KENDARAAN</th>";
echo "<th>STATUS KENDARAAN </th>";
echo "</tr>";

while ($row = mysqli_fetch_assoc($hasil)) {
    echo "<tr>";
    echo "<td>{$row['NAMA_KENDARAAN']}</td>";
    echo "<td>{$row['ID_KENDARAAN']}</td>";
    echo "<td>{$row['HARGA_KENDARAAN']}</td>";
    echo "<td>{$row['DESKRIPSI_KENDARAAN']}</td>";
    echo "<td>{$row['STATUS_KENDARAAN']}</td>";
    echo "</tr>";
}
echo "</table>";
?>
