<?php
session_start();
include('../koneksi.php');
require_once("../dompdf/autoload.inc.php");
use Dompdf\Dompdf;
$dompdf = new Dompdf();
$idkategori = $_GET['id_kategori'] ?? null;

$queryKategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori");

$html = '<center><h3>Laporan Kategori</h3></center><hr/><br>';

$html .= '<h4>Data Kategori</h4>';
$html .= '<table border="1" width="100%">
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Deskripsi Kategori</th>
            </tr>';

$no = 1;
while ($row = mysqli_fetch_array($queryKategori)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $row['nama_kategori'] . "</td>
                <td>" . $row['deskripsi'] . "</td>
            </tr>";
    $no++;
}

$html .= "</table>";

$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream('laporan-informasi-umkm.pdf', array("Attachment" => 0));
?>
