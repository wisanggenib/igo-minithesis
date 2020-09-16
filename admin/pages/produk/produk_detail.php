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
                                        <a href="produk.php"><button type="button" class="btn btn-secondary">
                                                <i class="fa fa-chevron-circle-left"></i>&nbsp; Back</button></a>
                                    </div>
                                </div>
                                <?php
                                include "../lib/koneksi.php";
                                $id_produk = $_GET['id_produk'];
                                $kueriproduk = mysqli_query($host, "SELECT * from produk WHERE id_produk = '$id_produk' ");
                                $val = mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC);
                                ?>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header"></div>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h4 class="text-center">Gambar Produk</h4>
                                                </div>
                                                <hr>
                                                <img src="../images/produk/<?= $val['gambar'] ?>" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header"></div>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h4 class="text-center">Detail Produk</h4>
                                                </div>
                                                <hr>
                                                <table>
                                                    <tr>
                                                        <td style="padding: 10px;">Nama</td>
                                                        <td style="padding: 10px;">: </td>
                                                        <td style="padding: 10px;"> <?= $val['nama_produk'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 10px;">Harga</td>
                                                        <td style="padding: 10px;"> : </td>
                                                        <td style="padding: 10px;"> <?= $val['harga_produk'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 10px;">Deskripsi</td>
                                                        <td style="padding: 10px;"> : </td>
                                                        <td style="padding: 10px;"> <?= $val['deskripsi_produk'] ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding: 10px;">Stok</td>
                                                        <td style="padding: 10px;"> : </td>
                                                        <td style="padding: 10px;"> <?= $val['stok'] ?></td>
                                                    </tr>
                                                </table>
                                                <form method="post" action="pages/produk/action_update_stok.php">
                                                <br>
                                                <h5>Update Stok</h5>
                                                    <td><input type="number" name="stok_produk"  min="0" class="form-control"></td>
                                                    <br>
                                                    <input id="cc-pament" name="idProduk" type="text" value="<?= $val['id_produk'] ?>" class="form-control" aria-required="true" aria-invalid="false" style="display: none;">
                                                    <td colspan="2"> <button type="submit" class="btn btn-sm btn-info btn-block">Tambah Produk</button></td>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header"></div>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h4 class="text-center">Ubah Produk</h4>
                                                </div>
                                                <hr>
                                                <form action="pages/produk/action_update.php" method="post" novalidate="novalidate" enctype="multipart/form-data">
                                                    <div class="form-group" style="display: none;">
                                                        <label for="cc-payment" class="control-label mb-1">id_produk</label>
                                                        <input id="cc-pament" name="idProduk" type="text" value="<?= $val['id_produk'] ?>" class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Nama</label>
                                                        <input id="cc-pament" name="namaProduk" type="text" value="<?= $val['nama_produk'] ?>" class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="cc-name" class="control-label mb-1">Harga</label>
                                                        <input id="cc-name" name="hargaProduk" type="number" class="form-control cc-name valid" value="<?= $val['harga_produk'] ?>" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Deskripsi</label>
                                                        <input id="cc-pament" name="deskripsiProduk" type="text" class="form-control" value="<?= $val['deskripsi_produk'] ?>" aria-required="true" aria-invalid="false">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Images</label>
                                                        <input id="cc-number" name="gambar" type="file" class="form-control cc-number identified visa">
                                                    </div>
                                                    <div>
                                                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                                            <i class="fa fa-upload fa-lg"></i>&nbsp;
                                                            <span id="payment-button-amount">Upload</span>
                                                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
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