<?php
//echo var_dump($transaction);
	$params['transaction_uuid'] = $transaction['transaction_uuid'];
	$params['locale'] = $transaction['locale'];
	$params['transaction_type'] = $transaction['transaction_type'];
	$params['reference_number'] = $transaction['reference_number'];
	$params['amount'] = $transaction['amount'];
	$params['currency'] = $transaction['currency'];
	$params['signed_date_time'] = $transaction['signed_date_time'];	
	$params['access_key'] = $transaction['access_key'];
	$params['profile_id'] = $transaction['profile_id'];
	$params['signed_field_names'] = $transaction['signed_field_names'];
	//$params['unsigned_field_names'] = $transaction['unsigned_field_names'];

        $SECRET_KEY = "9d1b912ddffe4d7badf1fecced06f76e3a88706385a242d0a2ec4fd62a73e3a1c4c707dac98d447aa55a2e2d7a659a8da4db3ec97f3f4f0b8293b0fe8453f5912cfa079df7d9495db625fb92b2824fccf9855fd30a6749509b9c9b1890eca3c008cc8974516043ccb4de57b10bc4c28374ab292a0f534a28b49e312a8bb2a95d";
	
	define ('SECRET_KEY', '9d1b912ddffe4d7badf1fecced06f76e3a88706385a242d0a2ec4fd62a73e3a1c4c707dac98d447aa55a2e2d7a659a8da4db3ec97f3f4f0b8293b0fe8453f5912cfa079df7d9495db625fb92b2824fccf9855fd30a6749509b9c9b1890eca3c008cc8974516043ccb4de57b10bc4c28374ab292a0f534a28b49e312a8bb2a95d');
	
        
	/*foreach($_REQUEST as $parameter_name => $parameter_value) {
        $params[$parameter_name] = $parameter_value;
    }*/
	
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