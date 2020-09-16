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
                                <div class="row">
                                    <!-- DATA TABLE-->

                                    <div class="col-md-12">
                                        <h3 class="title-5 m-b-35">List Penjualan</h3>
                                        <div class="table-data__tool">
                                            <div class="table-data__tool-left">
                                                <div class="rs-select2--light rs-select2--sm">
                                                    <select class="js-select2" name="time">
                                                        <option selected="selected">Today</option>
                                                        <option value="">3 Days</option>
                                                        <option value="">1 Week</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                            </div>
                                            <div class="table-data__tool-right">
                                                <div class="rs-select2--dark rs-select2--sm rs-select2--dark2">
                                                    <select class="js-select2" name="type">
                                                        <option selected="selected">Export</option>
                                                        <option value="">Option 1</option>
                                                        <option value="">Option 2</option>
                                                    </select>
                                                    <div class="dropDownSelect2"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="table-responsive table-responsive-data2">
                                            <table class="table table-data2">
                                                <thead>
                                                    <tr>
                                                        <th>Id Transaksi</th>
                                                        <th>Nama Pembeli</th>
                                                        <th>Tanggal Pembelian</th>
                                                        <th>price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
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
                                                    <tr class="tr-shadow">
                                                        <td>T-00<?=$valPem['id_transaksi']?></td>
                                                        <td><?=$valPem['nama_penerima']?></td>
                                                        <td><?=$valPem['tgl_pesan']?></td>
                                                        <td>
                                                            <span class="status--process"><?=$jumlah+$valPem['ongkir']?></span>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                    <tr class="spacer"></tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
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