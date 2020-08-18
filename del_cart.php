<?php
$x=null;
session_start();
$id_produk = $_GET['id_produk'];
foreach($_SESSION["cart"] as $key => $item){
    if($id_produk == $item["id_produk"]){
        $x=$key;
        //if id product same with cart id_product change variabel x to number of array
    }
}


if($x!==null){
    //if x not null then count jumlah_produk and update it
    unset($_SESSION["cart"][$x]);
}
header('location:cart.php');
?>