<?php
$id_transaksi = $_GET['id_transaksi'];
$jumlah_bayar = 0;
$kueritransaksi = mysqli_query($host, "SELECT * from transaksi WHERE id_transaksi = '$id_transaksi' ");
$val = mysqli_fetch_array($kueritransaksi, MYSQLI_ASSOC);
?>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 ftco-animate">
                <form action="payment_system.php" method="POST" class="billing-form">
                    <h3 class="mb-4 billing-heading">Penerima Pesanan</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Full Name</label>
                                <input type="text" class="form-control" placeholder="" value="<?= $val['nama_penerima'] ?>" name="namaPenerima" disabled>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetaddress">Street Address</label>
                                <input type="text" class="form-control" name="alamat" value="<?= $val['alamat'] ?>" placeholder="House number and street name" disabled>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Description</label>
                                <input type="Teks" class="form-control" value="<?= $val['deskripsi'] ?>" name="deskripsi" placeholder="" disabled>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Date</label>
                                <input type="text" name="tgl_kirim" value="<?= $val['tgl_pesan'] ?>" class="form-control" placeholder="" disabled>
                            </div>
                        </div>
                </form>
            </div>
            <!-- END -->
        </div> <!-- .col-md-8 -->
    </div>
    </div>
</section>

<section class="ftco-section ftco-cart" style="margin-top: -150px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <h2>Detail Pesanan</h2>
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $kueriproduk = mysqli_query($host, "SELECT produk.id_produk,produk.gambar,produk.nama_produk,produk.deskripsi_produk,detail_transaksi.harga_produk,detail_transaksi.qty from detail_transaksi JOIN transaksi ON detail_transaksi.id_transaksi = transaksi.id_transaksi JOIN produk ON detail_transaksi.id_produk = produk.id_produk WHERE detail_transaksi.id_transaksi = '$id_transaksi'");
                            while ($val2 = mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC)) {
                            ?>
                                <tr class="text-center">
                                    <td class="product-remove"><a href="del_cart.php?id_produk=<?= $val2['id_produk'] ?>"><span class="ion-ios-close"></span></a></td>

                                    <td class="image-prod">
                                        <div class="img" style="background-image:url(images/produk/<?= $val2['gambar'] ?>);"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3><?= $val2['nama_produk'] ?></h3>
                                        <p><?= $val2['deskripsi_produk'] ?></p>
                                    </td>

                                    <td class="price"><?= $val2['harga_produk'] ?></td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="<?= $val2['qty'] ?>" min="1" max="100">
                                        </div>
                                    </td>

                                    <td class="total"><?= $total = $val2['qty'] * $val2['harga_produk'];
                                                        $jumlah_bayar = $jumlah_bayar + $total; ?></td>
                                </tr><!-- END TR-->
                            <?php } ?>
                            <tr class="text-center" style="background-color: #DBCC8F;color:white;">
                                <td colspan="5">Total</td>
                                <td class="total" style="color: white;"><?= $jumlah_bayar ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- payment place -->
            <div class="row container d-flex">
                <div class="col-md-4 d-flex">
                    <div class="cart-detail cart-total bg-light p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Cart Total</h3>
                        <p class="d-flex total-price">
                            <span>Total</span>
                            <span>Rp. <?= $jumlah_bayar ?></span>
                        </p>
                        <p class="d-flex total-price">
                            <span>Ongkir</span>
                            <span>Rp. <?= $val['ongkir'] ?></span>
                        </p>
                        <hr>
                        <p class="d-flex total-price">
                            <span>Total Bayar</span>
                            <span>Rp. <?= $jumlah_bayar+$val['ongkir'] ?></span>
                        </p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart-detail bg-light p-3 p-md-4">
                        <h3 class="billing-heading mb-4">Detail Payment</h3>
                        <div class="form-group">
                            <div class="col-md-12">
                                <p>
                                    Nama Pemilik Rekening Disini<br>
                                    No Pemilik Rekening Disini
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="cart-detail bg-light p-3 p-md-4">
                        <form action="paid_system.php" method="POST" enctype="multipart/form-data">
                            <?php
                            if ($val['status'] == 'pending' || $val['status'] == 'reupload') {
                            ?>
                                <h3 class="billing-heading mb-4">Upload Payment</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <input type="file" name="bukti_bayar" class="form-control" placeholder="" require>
                                        <input type="text" name="id_transaksi" class="form-control" placeholder="" value="<?= $id_transaksi ?>" style="display: none;">
                                        <button type="submit" class="btn btn-primary py-3 px-3"> Upload
                                    </div>
                                <?php
                            } else {
                                echo "";
                            }
                                ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>