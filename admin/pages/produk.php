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
                                                        <th>Images</th>
                                                        <th>Nama</th>
                                                        <th>Deskripsi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr onclick="document.location='produk_detail.php'">
                                                        <td>
                                                            <div class="image">
                                                                <img src="images/icon/avatar-01.jpg" alt="John Doe" />
                                                            </div>
                                                        </td>
                                                        <td>Lorem ipsum dolor sit amet consectetur adipisicing elit.</td>
                                                        <td> Officiis natus perspiciatis ullam! Unde, repellat quasi nemo corrupti reprehenderit excepturi accusamus voluptates commodi possimus! Voluptatibus, explicabo illum. Quidem iusto in modi?</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- END DATA TABLE                  -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header"></div>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h4 class="text-center">Upload Produk</h4>
                                                </div>
                                                <hr>
                                                <form action="" method="post" novalidate="novalidate">
                                                    <div class="form-group">
                                                        <label for="cc-payment" class="control-label mb-1">Nama</label>
                                                        <input id="cc-pament" name="cc-payment" type="text" class="form-control" aria-required="true" aria-invalid="false">
                                                    </div>
                                                    <div class="form-group has-success">
                                                        <label for="cc-name" class="control-label mb-1">Harga</label>
                                                        <input id="cc-name" name="cc-name" type="text" class="form-control cc-name valid" data-val="true" data-val-required="Please enter the name on card" autocomplete="cc-name" aria-required="true" aria-invalid="false" aria-describedby="cc-name-error">
                                                        <span class="help-block field-validation-valid" data-valmsg-for="cc-name" data-valmsg-replace="true"></span>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="cc-number" class="control-label mb-1">Images</label>
                                                        <input id="cc-number" name="cc-number" type="file" class="form-control cc-number identified visa" value="" data-val="true" data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number" autocomplete="cc-number">
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
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header"></div>
                                            <div class="card-body">
                                                <div class="card-title">
                                                    <h4 class="text-center">Rules</h4>
                                                </div>
                                                <hr>
                                                <p>Write rules here</p>
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