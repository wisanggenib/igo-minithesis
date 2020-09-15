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
                                    <div class="col-md-12">
                                        <!-- DATA TABLE-->
                                        <div class="table-responsive m-b-40">
                                            <table class="table table-borderless table-data3">
                                                <thead>
                                                    <tr>
                                                        <th>Id Transaksi</th>
                                                        <th>Tgl Pemesanan</th>
                                                        <th>Tgl Pengiriman</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php
                                                include "../lib/koneksi.php";
                                                $kueriproduk= mysqli_query($host, "SELECT * from transaksi WHERE status != 'complete' ORDER BY status DESC");
                                                while($val=mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC)){
                                                ?>
                                                    <tr onclick="document.location='pesanan_detail.php?id_transaksi=<?=$val['id_transaksi']?>'">
                                                        <td> Id - <?=$val['id_transaksi']?></td>
                                                        <td> <?=$val['tgl_pesan']?></td>
                                                        <td> <?=$val['tgl_kirim']?></td>
                                                        <td>
                                                            <?php
                                                                if($val['status']=='waiting'){
                                                                    echo "<span class='status--process'>Waiting</span>";
                                                                }else if($val['status']=='pending'){
                                                                    echo "<span class='status--pending'>Pending</span>";
                                                                }else if($val['status']=='cancel'){
                                                                    echo "<span class='status--denied'>Cancel</span>";
                                                                }else if($val['status']=='reupload'){
                                                                    echo "<span class='status--pending'>Re-Upload</span>";
                                                                }
                                                            ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABLE                  -->
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