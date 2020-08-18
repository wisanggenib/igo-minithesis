<?php
if (empty($_SESSION['username'])) {
    echo "<script> alert('Silahkan Login Terlebih Dahulu, sblm melanjutkan pembelian'); window.location = 'login/index.php';</script>";
}
?>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Checkout</span></p>
                <h1 class="mb-0 bread">Checkout</h1>
            </div>
        </div>
    </div>
</div>

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
                                <input type="text" class="form-control" placeholder="" name="namaPenerima">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">Street Address</label>
                                <input type="text" class="form-control" name="alamat" placeholder="House number and street name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">Post Code</label>
                                <input type="number" class="form-control" placeholder="Post Code">
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">Description</label>
                                <input type="Teks" class="form-control" name="deskripsi" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="emailaddress">Date</label>
                                <input type="date" name="tgl_kirim" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                <!-- END -->
                <div class="row mt-5 pt-3 d-flex">
                    <div class="col-md-6 d-flex">
                        <div class="cart-detail cart-total bg-light p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Cart Total</h3>
                            <hr>
                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span>$17.60</span>
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="cart-detail bg-light p-3 p-md-4">
                            <h3 class="billing-heading mb-4">Payment Method</h3>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p>
                                        Nama Pemilik Rekening Disini<br>
                                        No Pemilik Rekening Disini
                                    </p>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary py-3 px-3"> Pay Now
                        </div>
                    </div>
                </div>
                </form>
            </div> <!-- .col-md-8 -->
        </div>
    </div>
</section>