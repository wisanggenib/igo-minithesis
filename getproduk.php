<?php
$con = mysqli_connect('localhost','root','','db_sunsunyefix');
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}

$q = $_GET['q'];
$sql = "SELECT * FROM produk ORDER BY harga_produk $q ";
$result = mysqli_query($con,$sql);
while($row = mysqli_fetch_array($result)) {
?>


                            <div class="col-sm-12 col-md-12 col-lg-4 d-flex">
                                <div class="product d-flex flex-column">
                                    <a href="#" class="img-prod"><img class="img-fluid" src="images/produk/<?= $row['gambar'] ?>" alt="Colorlib Template">
                                        <div class="overlay"></div>
                                    </a>
                                    <div class="text py-3 pb-4 px-3">
                                        <h3><a href="#"><?= $row['nama_produk'] ?></a></h3>
                                        <div class="pricing">
                                            <p class="price"><span>$<?= $row['harga_produk'] ?></span></p>
                                        </div>
                                        <p class="bottom-area d-flex px-3">
                                            <a href="#" class="add-to-cart text-center py-2 mr-1"><span>Add to cart <i class="ion-ios-add ml-1"></i></span></a>
                                        </p>
                                    </div>
                                </div>
                            </div>

<?php
}
?>
