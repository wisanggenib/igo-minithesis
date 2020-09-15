<?php


$q = $_GET['q'];
$w = $_GET['w'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=$q",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "key:ddbd26f486b5bdcc2810301d0899a2f2"
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "cURL Error #:" . $err;
}
$data2 = json_decode($response, true);
?>
<div class="form-group">
    <label for="streetaddress">Kota</label>
    <select class="form-control" onchange="showPrice(this.value,<?=$w?>);">
    <option>Pilih Kota</option>
        <?php
        for ($i = 0; $i < count($data2['rajaongkir']['results']); $i++) {
        ?>
            <option value="<?=$data2['rajaongkir']['results'][$i]['city_id']?>"><?=$data2['rajaongkir']['results'][$i]['city_name']?></option>
        <?php
        }
        ?>
    </select>
</div>
