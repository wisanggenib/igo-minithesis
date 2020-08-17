<?php
    session_start();
    //get data from input to chart
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    $cart_item = array("id_produk" => $id_produk, "jumlah_produk" => $jumlah);
    //variabel status for check if system find same id_produk or not
    $x=null;
    //if cart is empty make variable session char and push cart item on there
    if(empty($_SESSION["cart"])){
        $_SESSION["cart"] = array();
        array_push($_SESSION["cart"],$cart_item);
    }else{ 
        //if cart not empty we need to check is id_product that included same with id_product in session cart
        foreach($_SESSION["cart"] as $key => $item){
            if($cart_item["id_produk"] == $item["id_produk"]){
                $x=$key;
                //if id product same with cart id_product change variabel x to number of array
            }
        }

        
        if($x!==null){
            //if x not null then count jumlah_produk and update it
            $_SESSION["cart"][$x]["jumlah_produk"] = $_SESSION["cart"][$x]["jumlah_produk"] + $cart_item["jumlah_produk"];
        }else{
            //if x still null then push value to session cart !
            array_push($_SESSION["cart"],$cart_item);
        }
    }

    //check array
    print_r($_SESSION["cart"]);
    header('location:cart.php');
?>