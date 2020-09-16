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
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 ftco-animate">
                <?php
                $kueriData = mysqli_query($host, "SELECT * from pelanggan WHERE id_pelanggan = '$_SESSION[id]' ");
                $valData = mysqli_fetch_array($kueriData, MYSQLI_ASSOC);
                ?>
                <form action="#" method="POST" class="billing-form">
                    <h3 class="mb-4 billing-heading">Profile</h3>
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Full Name</label>
                                <input type="text" class="form-control" placeholder="" name="namaPenerima" value="<?=$valData['nama_pelanggan']?>" disabled>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="streetaddress">Street Address</label>
                                <textarea name="" class="form-control" cols="30" rows="3" disabled><?=$valData['alamat']?></textarea>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Username</label>
                                <input type="Teks" class="form-control" name="deskripsi" placeholder="" value="<?=$valData['username']?>" disabled>
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-3" style="width: 100%;"> Edit
                            </div>
                        </div> -->
                    </div>
                </form>
                <!-- END -->
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section>
<section class="ftco-section ftco-cart" style="margin-top: -100px;">
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Pemesanan Aktif</a>
                    <a class="nav-link ftco-animate mr-lg-1" id="v-pills-2-tab" data-toggle="pill" href="#v-pills-2" role="tab" aria-controls="v-pills-2" aria-selected="true">Pemesanan Selesai</a>
                </div>
            </div>
            <div class="col-md-12 tab-wrap">

                <div class="tab-content bg-light" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
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
                                    $kueriDashboard = mysqli_query($host, "SELECT * from transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE (transaksi.status = 'reupload' OR transaksi.status = 'pending') AND pelanggan.id_pelanggan = '$_SESSION[id]' ORDER BY transaksi.id_transaksi DESC ");
                                    while ($val = mysqli_fetch_array($kueriDashboard, MYSQLI_ASSOC)) {
                                    ?>
                                        <tr class="text-center">
                                            <td class="">
                                                <p><?= $val['id_transaksi'] ?></p>
                                            </td>
                                            <td class="product-name">
                                                <p><?= $val['nama_pelanggan'] ?></p>
                                            </td>
                                            <td class="">
                                                <p><?= $val['nama_penerima'] ?></p>
                                            </td>
                                            <td class="">
                                                <p><?= $val['tgl_pesan'] ?></p>
                                            </td>
                                            <td class="">
                                                <?php
                                                if ($val['status'] == 'pending') {
                                                    echo "Menunggu Pemabayaran";
                                                } else if ($val['status'] == 'waiting') {
                                                    echo "Menunggu Konfirmasi Admin";
                                                } else if ($val['status'] == 'reupload') {
                                                    echo "Reupload Bukti Bayar";
                                                } else if ($val['status'] == 'complete') {
                                                    echo "Menunggu Pengiriman";
                                                } else {
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($val['status'] == 'pending') {
                                                    echo "<p><a href='detail_transaksi.php?id_transaksi=" . $val['id_transaksi'] . "' class='btn-custom' style='background-color: yellow;padding: 10px;color:white;'>Bayar</a></p>";
                                                } else if ($val['status'] == 'waiting') {
                                                    echo "<p><a href='detail_transaksi.php?id_transaksi=" . $val['id_transaksi'] . "' class='btn-custom' style='background-color: cyan;padding: 10px;color:white;'>Cek</a></p>";
                                                } else if ($val['status'] == 'reupload') {
                                                    echo "<p><a href='detail_transaksi.php?id_transaksi=" . $val['id_transaksi'] . "' class='btn-custom' style='background-color: red;padding: 10px;color:white;'>Upload</a></p>";
                                                } else if ($val['status'] == 'complete') {
                                                    echo "<p><a href='detail_transaksi.php?id_transaksi=" . $val['id_transaksi'] . "' class='btn-custom' style='background-color: green;padding: 10px;color:white;' disabled>Cek Detail</a></p>";
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
                    <div class="tab-pane fade show" id="v-pills-2" role="tabpanel" aria-labelledby="day-2-tab">
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
                                    $kueriDashboard = mysqli_query($host, "SELECT * from transaksi JOIN pelanggan ON transaksi.id_pelanggan = pelanggan.id_pelanggan WHERE (transaksi.status = 'waiting' OR transaksi.status = 'complete') AND pelanggan.id_pelanggan = '$_SESSION[id]' ORDER BY transaksi.status DESC ");
                                    while ($val = mysqli_fetch_array($kueriDashboard, MYSQLI_ASSOC)) {
                                    ?>
                                        <tr class="text-center">
                                            <td class="">
                                                <p><?= $val['id_transaksi'] ?></p>
                                            </td>
                                            <td class="product-name">
                                                <p><?= $val['nama_pelanggan'] ?></p>
                                            </td>
                                            <td class="">
                                                <p><?= $val['nama_penerima'] ?></p>
                                            </td>
                                            <td class="">
                                                <p><?= $val['tgl_pesan'] ?></p>
                                            </td>
                                            <td class="">
                                                <?php
                                                if ($val['status'] == 'pending') {
                                                    echo "Menunggu Pemabayaran";
                                                } else if ($val['status'] == 'waiting') {
                                                    echo "Menunggu Konfirmasi Admin";
                                                } else if ($val['status'] == 'reupload') {
                                                    echo "Reupload Bukti Bayar";
                                                } else if ($val['status'] == 'complete') {
                                                    echo "Menunggu Pengiriman";
                                                } else {
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($val['status'] == 'pending') {
                                                    echo "<p><a href='detail_transaksi.php?id_transaksi=" . $val['id_transaksi'] . "' class='btn-custom' style='background-color: yellow;padding: 10px;color:white;'>Bayar</a></p>";
                                                } else if ($val['status'] == 'waiting') {
                                                    echo "<p><a href='detail_transaksi.php?id_transaksi=" . $val['id_transaksi'] . "' class='btn-custom' style='background-color: cyan;padding: 10px;color:white;'>Cek</a></p>";
                                                } else if ($val['status'] == 'reupload') {
                                                    echo "<p><a href='detail_transaksi.php?id_transaksi=" . $val['id_transaksi'] . "' class='btn-custom' style='background-color: red;padding: 10px;color:white;'>Upload</a></p>";
                                                } else if ($val['status'] == 'complete') {
                                                    echo "<p><a href='detail_transaksi.php?id_transaksi=" . $val['id_transaksi'] . "' class='btn-custom' style='background-color: green;padding: 10px;color:white;' disabled>Cek Detail</a></p>";
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
        </div>
    </div>
</section>