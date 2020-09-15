        <!-- PAGE CONTENT-->
        <div class="page-container3">
            <section class="alert-wrap p-t-20 p-b-20"></section>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3">
                            <!-- MENU SIDEBAR-->
                            <?php
                            include 'template/sidebar.php';
                            ?>
                            <!-- END MENU SIDEBAR-->
                        </div>
                        <div class="col-xl-9">
                            <!-- PAGE CONTENT-->
                            <div class="page-content">
                                <div class="row" style="margin-bottom: 10px;">
                                    <div class="col-lg-6">
                                        <a href="pesanan.php"><button type="button" class="btn btn-secondary">
                                                <i class="fa fa-chevron-circle-left"></i>&nbsp; Back</button></a>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body" style="background-color: #00aced; text-align:center;">
                                                <h3 style="color:white">Transaksi T-001</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header"></div>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h4 class="text-center">Detail Produk</h4>
                                                </div>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th>Produk</th>
                                                            <th>Qty</th>
                                                            <th>Harga</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        include "../lib/koneksi.php";
                                                        $id_transaksi = $_GET['id_transaksi'];
                                                        $jumlah = 0;
                                                        $kueriproduk = mysqli_query($host, "SELECT produk.gambar,detail_transaksi.harga_produk,produk.nama_produk,detail_transaksi.qty from detail_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE id_transaksi = '$id_transaksi'");
                                                        while ($val = mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC)) {
                                                        ?>
                                                            <tr>
                                                                <td>
                                                                    <div class="image">
                                                                        <img src="../images/produk/<?= $val['gambar'] ?>" alt="Gambar Produk" width="100px" />
                                                                    </div>
                                                                </td>
                                                                <td> <?= $val['nama_produk'] ?></td>
                                                                <td> <?= $val['qty'] ?></td>
                                                                <td> <?= $val['harga_produk'] ?></td>
                                                            </tr>
                                                        <?php
                                                            $jumlah = $jumlah + ($val['harga_produk'] * $val['qty']);
                                                        }
                                                        ?>
                                                        <tr style="background-color: black;color:white;">
                                                            <td colspan="3">Jumlahnya :</td>
                                                            <td><?= $jumlah ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header"></div>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h4 class="text-center">Detail Pesanan</h4>
                                                </div>
                                                <hr>
                                                <?php
                                                $kueriproduk = mysqli_query($host, "SELECT transaksi.tgl_kirim,transaksi.status,transaksi.tgl_pesan,pelanggan.nama_pelanggan FROM transaksi JOIN detail_transaksi ON transaksi.id_transaksi = detail_transaksi.id_transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE detail_transaksi.id_transaksi = '$id_transaksi'");
                                                $val = mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC);
                                                ?>
                                                <table>
                                                    <tr>
                                                        <td>Pemesan </td>
                                                        <td> : </td>
                                                        <td> <?= $val['nama_pelanggan'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Pesan </td>
                                                        <td> : </td>
                                                        <td> <?= $val['tgl_pesan'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tanggal Kirim </td>
                                                        <td> : </td>
                                                        <td> <?= $val['tgl_kirim'] ?></td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                if ($val['status'] == 'waiting') {
                                    $kueribayar = mysqli_query($host, "SELECT transaksi.alamat,transaksi.ongkir,bayar.bukti_bayar FROM transaksi JOIN bayar ON transaksi.id_transaksi = bayar.id_transaksi WHERE transaksi.id_transaksi = '$id_transaksi'");
                                    $val2 = mysqli_fetch_array($kueribayar, MYSQLI_ASSOC);
                                ?>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header"></div>
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h4 class="text-center">Bukti Transfer</h4>
                                                    </div>
                                                    <hr>
                                                    <img src="../images/bukti/<?= $val2['bukti_bayar'] ?>" alt="Gambar Produk" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card">
                                                <div class="card-header"></div>
                                                <div class="card-body">
                                                    <div class="card-title">
                                                        <h4 class="text-center">Konfirmasi</h4>
                                                    </div>
                                                    <hr>
                                                    <table>
                                                        <tr>
                                                            <td>Alamat : <?= $val2['alamat'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Ongkir : <?= $val2['ongkir'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total : <?= $jumlah ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jumlah Dibayar : <?= $jumlah + $val2['ongkir'] ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td> <a href="pages/pesanan/aksi_terima.php?id_transaksi=<?=$id_transaksi?>"><button type="button" class="btn btn-primary">
                                                                        Terima</button></a>
                                                                        <a href="pages/pesanan/aksi_tolak.php?id_transaksi=<?=$id_transaksi?>"><button type="button" class="btn btn-danger">
                                                                        Tolak</button></a></td>
                                                        </tr>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } else {
                                    echo "<h3>Menunggu Pembayaran</h3><br><br><br><br><br><br>";
                                }
                                ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="copyright">
                                            <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- END PAGE CONTENT-->
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <!-- END PAGE CONTENT  -->