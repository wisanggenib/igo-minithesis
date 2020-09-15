<?php
$x = $_GET['x'];
$y = $_GET['y'];
$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => "origin=419&destination=$x&weight=1000&courier=jne",
    CURLOPT_HTTPHEADER => array(
        "content-type: application/x-www-form-urlencoded",
        "key:ddbd26f486b5bdcc2810301d0899a2f2"
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

<p class="d-flex total-price">
    <span>Ongkir</span>
    <span><?= $data['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value'] ?></span>
</p>

<hr>
<p class="d-flex total-price">
    <span>Total Bayar</span>
    <span><?= $data['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value']+$y ?></span>
    <input style="display: none;" type="number" name="ongkir" value="<?=$data['rajaongkir']['results'][0]['costs'][1]['cost'][0]['value']?>">
</p>