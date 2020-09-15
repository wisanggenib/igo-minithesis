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
                        <?php
                        $jumlah_bayar = $_GET['jumlah_bayar'];
                        $curl = curl_init();

                        curl_setopt_array($curl, array(
                            CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_TIMEOUT => 30,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "GET",
                            CURLOPT_HTTPHEADER => array(
                                "key: ddbd26f486b5bdcc2810301d0899a2f2"
                            ),
                        ));

                        $response = curl_exec($curl);
                        $err = curl_error($curl);

                        curl_close($curl);

                        if ($err) {
                            echo "cURL Error #:" . $err;
                        }
                        $data = json_decode($response, true);
                        ?>
                        <div class="w-100"></div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="streetaddress">Kabupaten</label>
                                <select class="form-control" id="province" onchange="showProduk(this.value,<?=$jumlah_bayar?>);">
                                    <option>Pilih Kabupaten</option>
                                    <?php
                                    for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
                                    ?>
                                        <option value="<?= $data['rajaongkir']['results'][$i]['province_id'] ?>"><?= $data['rajaongkir']['results'][$i]['province'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="here">
                            <div class="form-group">
                                <label for="streetaddress">Kota</label>
                                <select class="form-control">
                                    <option>Pilih Kabupaten Dulu</option>
                                </select>
                            </div>
                        </div>
                        <div class="w-100"></div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstname">Alamat</label>
                                <input type="text" class="form-control" placeholder="" name="alamat">
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
                                    <p class="d-flex total-price">
                                        <span>Jumlah Bayar</span>
                                        <span id="jumlah_bayar"><?=$jumlah_bayar?></span>
                                    </p>
                                    <div id="ongkir">
                                    <p class="d-flex total-price">
                                        <span>Ongkir</span>
                                        <span>0</span>
                                    </p>
                                    <hr>
                                    <p class="d-flex total-price">
                                        <span>Total Bayar</span>
                                        <span><?=$jumlah_bayar?></span>
                                    </p>
                                    </div>
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

<script>
    function showProduk(str,str2) {
        var xhttp;
        if (str == "") {
            document.getElementById("here").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("here").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "getCity.php?q=" + str+"&w="+str2, true);
        xhttp.send();
    }

    function showPrice(str,str2) {
        var xhttp;
        if (str == "") {
            document.getElementById("ongkir").innerHTML = "";
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("ongkir").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "getHarga.php?x=" + str+"&y="+str2, true);
        xhttp.send();
    }
</script>