<h3>Your Basket</h3>

<?php 
    $totalPrice = 0;
    if($basket != 'empty'){

    foreach($basket as $basketItem){ ?>
    <p><h3><?=$basketItem['name'] ?></h3>
    <?=$basketItem['quantity'] ?>
    £<?=$basketItem['price']?>
    <?php $subTotal = $basketItem['quantity'] * $basketItem['price'];
    $totalPrice += $subTotal;?>
     £<?=$subTotal?>
     </p>
<?php } } else {?>
<h2> your basket is empty</h2> <?php }?>


<h2>Order Total £<?=$totalPrice?></h2>

<a href="/store/payment">Process Order</a>
<?php

$params['transaction_uuid'] = uniqid();
$params['locale'] = 'en';
$params['transaction_type'] = 'authorization';
$params['reference_number'] = 'Ref_No ' . gmdate("d-m-Y\H:i:s\Z");
//echo $params['reference_number'];
$params['amount'] = $subTotal . '.00';                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo $params['amount'];
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