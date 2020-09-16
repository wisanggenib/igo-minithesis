<?php
$id_produk = $_GET['id_produk'];
$kueriproduk = mysqli_query($host, "SELECT * from produk WHERE id_produk = '$id_produk' ");
$val = mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC);
?>
<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Produk</span></p>
                <h1 class="mb-0 bread">Igo Shop</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="images/1.jpg" class="image-popup prod-img-bg"><img src="images/produk/<?=$val['gambar']?>" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <div class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?=$val['nama_produk']?></h3>
                <p class="price"><span>Rp.<?=$val['harga_produk']?></span></p>
                <p><?=$val['deskripsi_produk']?>.</p>
                <form action="cart_system.php" method="POST">
                <div class="row mt-4">
                    <div class="w-100"></div>
                    <div class="input-group col-md-6 d-flex mb-3">
                        <input type="number" id="quantity" name="jumlah" class="quantity form-control input-number" value="1" min="1" max="<?=$val['stok']?>">
                        <input type="id_produk" name="id_produk" value="<?=$val['id_produk']?>" style="display: none;">
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <p style="color: #000;"><?=$val['stok']?> piece available</p>
                    </div>
                </div>
                <input type="submit" style="color:white;background-color: black;border: none;" value="Submit Here">
                </form>
            </div>
        </div>




        <div class="row mt-5">
            <div class="col-md-12 nav-link-wrap">
                <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link ftco-animate active mr-lg-1" id="v-pills-1-tab" data-toggle="pill" href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Description</a>
                </div>
            </div>
            <div class="col-md-12 tab-wrap">

                <div class="tab-content bg-light" id="v-pills-tabContent">

                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel" aria-labelledby="day-1-tab">
                        <div class="p-4">
                            <h3 class="mb-4"><?=$val['nama_produk']?></h3>
                            <p><?=$val['deskripsi_produk']?>.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>