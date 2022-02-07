<?php
//echo var_dump($transaction);
	$transaction_uuid = $transaction['transaction_uuid'];
	$locale = $transaction['locale'];
	$transaction_type = $transaction['transaction_type'];
	$reference_number = $transaction['reference_number'];
	$amount = $transaction['amount'];
	$currency = $transaction['currency'];
	$signed_date_time = $transaction['signed_date_time'];	
	$access_key = $transaction['access_key'];
	$profile_id = $transaction['profile_id'];
	$signed_field_names = $transaction['signed_field_names'];
	$unsigned_field_names = $transaction['unsigned_field_names'];

        $SECRET_KEY = "**enter your secret key**";
	
	define ('SECRET_KEY', '**enter your secret key**');
	
        
	foreach($_REQUEST as $parameter_name => $parameter_value) {
        $params[$parameter_name] = $parameter_value;
    }
	
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
        <style>
                table, th, td
		{
			border: 1px solid black;
			border-collapse: collapse;
                        font-face: Tahoma;
		}
			
		th, td
		{
			padding: 5px;
		}
	</style>
</head>
<body>
        <font face="Tahoma">
	
	<h1>
		Smartpay Fuse Pre Payment HPP
	</h1>
	<form method="post" action="https://testsecureacceptance.cybersource.com/pay" name="GatewayPush">
	<table>
		<col width="180">
		<col width="180">
		
	<?php
            foreach($params as $parameter_name => $parameter_value) {
                echo "<tr><td>" . $parameter_name . "</td><td>" . $parameter_value . "</td></tr>";
            }
        ?>
	</table>
	
	<?php
        foreach($params as $parameter_name => $parameter_value) {
            echo "<input type=\"hidden\" id=\"" . $parameter_name . "\" name=\"" . $parameter_name . "\" value=\"" . $parameter_value . "\"/>\n";
        }
        echo "<input type=\"hidden\" id=\"signature\" name=\"signature\" value=\"" . sign($params) . "\"/>\n";
		
		echo "<br><br>";
		print buildDataToSign($params);
		echo "<br><br>";
		print sign($params);
    ?>
	<br /><br />
	
	<input type="submit" id="submit" value="Pay up!" style="background-color:#FFFFFF; height:30; width:150">
	</form>