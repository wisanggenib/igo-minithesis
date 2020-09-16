<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <center>
    <h3>Laporan Harian</h3>
    <table>
        <tr>
            <th>Id Transaksi</th>
            <th>Nama Pelanggan</th>
            <th>Tanggal Pembelian</th>
            <th>Total Harga</th>
        </tr>
        
        <?php
            include "../lib/koneksi.php";
            $jumlah = 0;
            $kueripembayaran = mysqli_query($host, "SELECT * FROM transaksi WHERE status = 'complete' ");
            while ($valPem = mysqli_fetch_array($kueripembayaran, MYSQLI_ASSOC)) {
                $kueriproduk = mysqli_query($host, "SELECT detail_transaksi.harga_produk,detail_transaksi.qty from detail_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE id_transaksi = '$valPem[id_transaksi]'");
                while ($val = mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC)) {
                    $jumlah=$jumlah + ($val['harga_produk'] * $val['qty']);
                }
        ?>
<tr>
            <td>T-00<?=$valPem['id_transaksi']?></td>
            <td><?=$valPem['nama_penerima']?></td>
            <td><?=$valPem['tgl_pesan']?></td>
            <td>
                <span class="status--process"><?=$jumlah+$valPem['ongkir']?></span>
            </td>
            </tr>
        <?php } ?>
        
    </table>
    </center>
</body>
</html>