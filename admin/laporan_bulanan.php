<?php
// menyertakan autoloader
require_once 'dompdf/autoload.inc.php';
include "../lib/koneksi.php";
$jumlah = 0;
$bulan = date('m');
$tahun = date('Y');
// mengacu ke namespace DOMPDF
use Dompdf\Dompdf;

// menggunakan class dompdf
$dompdf = new Dompdf();

$html="<center>
<h3>Laporan Bulanan</h3>
<table align='center' border='1' cellpadding='7'>
    <tr>
        <th>Id Transaksi</th>
        <th>Nama Pelanggan</th>
        <th>Tanggal Pembelian</th>
        <th>Total Harga</th>
    </tr>";
    $kueripembayaran = mysqli_query($host, "SELECT * FROM transaksi WHERE status = 'complete' AND month(tgl_pesan)= '$bulan' ");
    while ($valPem = mysqli_fetch_array($kueripembayaran, MYSQLI_ASSOC)) {
    $kueriproduk = mysqli_query($host, "SELECT detail_transaksi.harga_produk,detail_transaksi.qty from detail_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE id_transaksi = '$valPem[id_transaksi]'");
    while ($val = mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC)) {
        $jumlah=$jumlah + ($val['harga_produk'] * $val['qty']);
    }
        $html .="
        <tr>
            <td>".$valPem['id_transaksi']."</td>
            <td>".$valPem['nama_penerima']."</td>
            <td>".$valPem['tgl_pesan']."</td>
            <td>".$jumlah."</td>
        </tr>
        ";
}
$html .="</table>
</center>
</body>
</html>";

$dompdf->loadHtml($html);

// (Opsional) Mengatur ukuran kertas dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');

// Menjadikan HTML sebagai PDF
$dompdf->render();

// Output akan menghasilkan PDF (1 = download dan 0 = preview)
$dompdf->stream("LaporanBulanan",array("Attachment"=>1));
?>