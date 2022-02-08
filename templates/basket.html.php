<h3>Your Basket</h3>

<form>
<label for="collection">Collection</label><br>
<input type="radio" name="collection" value="Collection">
<label for="delivery">Delivery</label><br>
<input type="radio" name="delivery"><br>
<label for="stores">Collection Store</label><br>
<select name="stores" onChange(this, 'box)">
<option>Northampton</option>
<option>Corby</option>
<option>Coventry</option>
</select>
</form>
 
    
    <table>
    <thead>
    <tr>
    <th style="width: 10%">Quantity</th>
    <th style="width: 70%">Description</th>
    <th style="width: 10%">Price per Unit</th>
    <th style="width: 10%">Price</th>
    </tr>
<?php
$totalPrice = 0;
    if(isset($_SESSION['basket'])){
    foreach($basket as $basketItem){?>
    <tr>
    <td><?=$basketItem['quantity'] ?></td>
    <td><?=$basketItem['name'] ?></td>
    <td>£<?=$basketItem['price']?></td>
    <?php $subTotal = $basketItem['quantity'] * $basketItem['price'];
    $totalPrice += $subTotal;?>
    <td>£<?=$subTotal?></td>
    </tr>
<?php } } else {?>
<h3> your basket is empty</h3> <?php }?>

</table>
<h2>Order Total £<?=$totalPrice?>.00</h2>

<?php

$params['transaction_uuid'] = uniqid();
$params['locale'] = 'en';
$params['transaction_type'] = 'authorization';
$params['reference_number'] = 'Ref_No ' . gmdate("d-m-Y\H:i:s\Z");
$params['amount'] = $totalPrice . '.00';
$params['currency'] = 'GBP';
$params['signed_date_time'] = gmdate("Y-m-d\TH:i:s\Z");
$params['access_key'] = 'b3bc8960b6ae36aabe6c4781103f1242';
$params['profile_id'] = '08957946-C17E-41D5-A145-7B3FB5F40D4D';
$params['signed_field_names'] = 'access_key,amount,currency,locale,profile_id,reference_number,signed_date_time,signed_field_names,transaction_type,transaction_uuid';

$SECRET_KEY = "9d1b912ddffe4d7badf1fecced06f76e3a88706385a242d0a2ec4fd62a73e3a1c4c707dac98d447aa55a2e2d7a659a8da4db3ec97f3f4f0b8293b0fe8453f5912cfa079df7d9495db625fb92b2824fccf9855fd30a6749509b9c9b1890eca3c008cc8974516043ccb4de57b10bc4c28374ab292a0f534a28b49e312a8bb2a95d";

define ('SECRET_KEY', '9d1b912ddffe4d7badf1fecced06f76e3a88706385a242d0a2ec4fd62a73e3a1c4c707dac98d447aa55a2e2d7a659a8da4db3ec97f3f4f0b8293b0fe8453f5912cfa079df7d9495db625fb92b2824fccf9855fd30a6749509b9c9b1890eca3c008cc8974516043ccb4de57b10bc4c28374ab292a0f534a28b49e312a8bb2a95d');

function sign ($params) {
    return signData(buildDataToSign($params), SECRET_KEY);
}

function signData($data, $secretKey) {
    return base64_encode(hash_hmac('sha256', $data, $secretKey, true));
}

function buildDataToSign($params) {
    $signedFieldNames = explode(",",$params["signed_field_names"]);
    foreach ($signedFieldNames as $field) {
       $dataToSign[] = $field . "=" . $params[$field];
    }
    return commaSeparate($dataToSign);
}

function commaSeparate ($dataToSign) {
    return implode(",",$dataToSign);
}

?> 

<form method="post" action="https://testsecureacceptance.cybersource.com/pay" name="GatewayPush"> 

    <?php foreach($params as $parameter_name => $parameter_value) {
            echo "<input type=\"hidden\" id=\"" . $parameter_name . "\" name=\"" . $parameter_name . "\" value=\"" . $parameter_value . "\"/>\n";
        }
        echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";?>

        <?php 
        buildDataToSign($params);
		sign($params); ?>

    <input type="submit" id="submit" value="Pay up!" style="background-color:#FFFFFF; height:30; width:150">
	</form>

<a href="/store/basket?action=clear">Clear basket</a>