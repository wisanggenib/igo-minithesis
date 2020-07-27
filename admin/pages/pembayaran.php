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
                                                        <th>Produk</th>
                                                        <th>Jumlah</th>
                                                        <th>price</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr class="tr-shadow">
                                                        <td>T-001</td>
                                                        <td>Igo trapusa</td>
                                                        <td>2018-09-27 02:12</td>
                                                        <td class="desc">Sempak Unyu</td>
                                                        <td>10</td>
                                                        <td>
                                                            <span class="status--process">Rp. 50.000</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="spacer"></tr>
                                                    <tr class="tr-shadow">
                                                        <td>T-002</td>
                                                        <td>Difah</td>
                                                        <td>2018-09-27 02:12</td>
                                                        <td class="desc">Sempak Keren</td>
                                                        <td>10</td>
                                                        <td>
                                                            <span class="status--process">Rp. 150.000</span>
                                                        </td>
                                                    </tr>
                                                    <tr class="spacer"></tr>
                                                    <tr class="tr-shadow">
                                                        <td>T-003</td>
                                                        <td>Oba Pangestu</td>
                                                        <td>2018-09-27 02:12</td>
                                                        <td class="desc">Sempak Sangar</td>
                                                        <td>10</td>
                                                        <td>
                                                            <span class="status--process">Rp. 2.500.000</span>
                                                        </td>
                                                    </tr>
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