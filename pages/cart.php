<div class="hero-wrap hero-bread" style="background-image: url('images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span>Cart</span></p>
                <h1 class="mb-0 bread">My Wishlist</h1>
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
                            include 'lib/koneksi.php';
                            $jumlah_bayar = 0;
                            if(!empty($_SESSION["cart"])){
                                
                            foreach ($_SESSION["cart"] as $key => $item) {
                                $kueriproduk = mysqli_query($host, "SELECT * from produk WHERE id_produk = '$item[id_produk]' ");
                                $val = mysqli_fetch_array($kueriproduk, MYSQLI_ASSOC);
                            ?>
                                <tr class="text-center">
                                    <td class="product-remove"><a href="del_cart.php?id_produk=<?=$item['id_produk']?>"><span class="ion-ios-close"></span></a></td>

                                    <td class="image-prod">
                                        <div class="img" style="background-image:url(images/produk/<?= $val['gambar'] ?>);"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3><?= $val['nama_produk'] ?></h3>
                                        <p><?= $val['deskripsi_produk'] ?></p>
                                    </td>

                                    <td class="price"><?= $val['harga_produk'] ?></td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="<?= $item['jumlah_produk'] ?>" min="1" max="100">
                                        </div>
                                    </td>

                                    <td class="total"><?= $total = $item['jumlah_produk'] * $val['harga_produk'] ?></td>
                                </tr><!-- END TR-->
                            <?php
                            $jumlah_bayar = $jumlah_bayar + $total;
                            }}else{
                            echo"
                            <tr class='text-center'>
                                <td colspan='6'>Silahkan Berbelanja<br><a href='catalog.php'>Shop Now</a></td>
                            </tr>
                            ";
                            }
                            
                            ?>
                            <tr class="text-center" style="background-color: #DBCC8F;color:white;">
                                <td colspan="5">Total</td>

                                <td class="total" style="color: white;"><?= $jumlah_bayar ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-start">
            <div class="col col-lg-12 col-md-12 cart-wrap ftco-animate d-flex flex-row-reverse">
                <p class="text-center"><a href="checkout.php?jumlah_bayar=<?=$jumlah_bayar?>" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>
            </div>
        </div>
    </div>
</section>