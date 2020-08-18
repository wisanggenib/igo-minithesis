<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                <h1 class="mb-0 bread">My Dashboard</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>No Pemesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Nama Penerima</th>
                                <th>Tgl pesan</th>
                                <th>Status</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'lib/koneksi.php';
                            $kueriDashboard = mysqli_query($host, "SELECT * from transaksi JOIN pelanggan WHERE transaksi.id_pelanggan = pelanggan.id_pelanggan");
                            while ($val = mysqli_fetch_array($kueriDashboard, MYSQLI_ASSOC)) {
                            ?>
                                <tr class="text-center">
                                    <td class="">
                                        <p><?= $val['id_transaksi'] ?></p>
                                    </td>
                                    <td class="product-name">
                                        <p><?= $val['nama_pelanggan'] ?></p>
                                    </td>
                                    <td class="product-name">
                                        <p><?= $val['nama_penerima'] ?></p>
                                    </td>
                                    <td class="">
                                        <p><?= $val['tgl_pesan'] ?></p>
                                    </td>
                                    <td class="product-name">
                                        <?php
                                            if($val['status'] == 'pending'){
                                                echo "Menunggu Pemabayaran";
                                            }else if($val['status'] == 'waiting'){
                                                echo "Menunggu Konfirmasi Admin";
                                            }else if($val['status'] == 'reupload'){
                                                echo "Reupload Bukti Bayar";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                            if($val['status'] == 'pending'){
                                                echo "<p><a href='detail_transaksi.php?id_transaksi=".$val['id_transaksi']."' class='btn-custom' style='background-color: yellow;padding: 10px;color:white;'>Bayar</a></p>";
                                            }else if($val['status'] == 'waiting'){
                                                echo "<p><a href='detail_transaksi.php?id_transaksi=".$val['id_transaksi']."' class='btn-custom' style='background-color: green;padding: 10px;color:white;'>Cek</a></p>";
                                            }else if($val['status'] == 'reupload'){
                                                echo "<p><a href='detail_transaksi.php?id_transaksi=".$val['id_transaksi']."' class='btn-custom' style='background-color: red;padding: 10px;color:white;'>Upload</a></p>";
                                            }
                                        ?>
                                    </td>
                                </tr><!-- END TR-->
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>