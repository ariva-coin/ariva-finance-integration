<?php
    //amount in usd (float)
    //you have to change this value with your requested amount
	$amount = 1.58;//required

    //orderid is an "uniqe" string, must be generate by your system
	$orderid = rand(11111, 99999);//required

    //random is a random string
	$random = microtime();//required

    //it's a url on your domain that, ariva.finance will be redirected there if payment done successfully
	$success_url = "https://yourdomain.com/success?orderid=$orderid";//required
    
    //it's a url on your domain that, ariva.finance will be redirected there if payment failed
	$fail_url = "https://yourdomain.com/fail";//required

    //it's your api key that get from ariva.finance gateway section
    //please insert your api key bellow
	$key = "";//required

    //it's your secret key that get from ariva.finance gateway section
    //please insert your secret key bellow
	$secret = "";//required

    //it's your customer wallet address
	$refund_wallet = "";//required


    

	//customer first name
	$fname = "";//optional

    //customer last name
	$lname = "";//optional

    //customer tel
	$tel = "";//optional

    //customer zip code
	$zip = "";//optional

    //customer address
	$address = "";//optional

    //customer country
	$country = "";//optional

    //customer state
	$state = "";//optional

    //customer city
	$city = "";//optional

    //description from customer or your side
	$description = "";//optional

    //payment page will be valid during this time
	$expire = 120; //optional default is 120 minutes
	

    //this is form action url, all data must be post to this url
    //for testnet, please replace https://testnet.ariva.finance/api/pay
    //for mainnet, please replace https://gateway.ariva.finance/api/pay
    $url = 'https://testnet.ariva.finance/api/pay';


    //don't change this lines
    $hash_string = $key . $secret . $orderid . $amount . $success_url . $fail_url . $random;
	$hash = base64_encode(pack('H*', sha1($hash_string)));
    
?>
<table>
	<tbody>
		<form action="<?php echo $url; ?>" method="POST">
			<tr>
				<td><label>Amount</label></td>
				<td><input name="amount" value="<?php echo $amount; ?>" required /></td>
			</tr>
			<tr>
				<td><label>Order ID</label></td>
				<td><input name="orderid" value="<?php echo $orderid; ?>" required /></td>
			</tr>
			<tr>
				<td><label>Random</label></td>
				<td><input name="random" value="<?php echo $random; ?>" required type="hidden" /></td>
			</tr>
			<tr>
				<td><label>success_url</label></td>
				<td><input name="success_url" value="<?php echo $success_url; ?>" required type="hidden" /></td>
			</tr>
			<tr>
				<td><label>fail_url</label></td>
				<td><input name="fail_url" value="<?php echo $fail_url; ?>" required type="hidden" /></td>
			</tr>
			<tr>
				<td><label>key</label></td>
				<td><input name="key" value="<?php echo $key; ?>" required type="hidden" /></td>
			</tr>
			<tr>
				<td><label>hash</label></td>
				<td><input name="hash" value="<?php echo $hash; ?>" required type="hidden" /></td>
			</tr>
			<tr>
				<td><label>Name</label></td>
				<td><input name="fname" value="<?php echo $fname; ?>" /></td>
			</tr>
			<tr>
				<td><label>Last Name</label></td>
				<td><input name="lname" value="<?php echo $lname; ?>" /></td>
			</tr>
			<tr>
				<td><label>Tel</label></td>
				<td><input name="tel" value="<?php echo $tel; ?>" /></td>
			</tr>
			<tr>
				<td><label>Address</label></td>
				<td><input name="address" value="<?php echo $address; ?>" /></td>
			</tr>
			<tr>
				<td><label>Zip Code</label></td>
				<td><input name="zip" value="<?php echo $zip; ?>" /></td>
			</tr>
			<tr>
				<td><label>Country</label></td>
				<td><input name="country" value="<?php echo $country; ?>" /></td>
			</tr>
			<tr>
				<td><label>State</label></td>
				<td><input name="state" value="<?php echo $state; ?>" /></td>
			</tr>
			<tr>
				<td><label>City</label></td>
				<td><input name="city" value="<?php echo $city; ?>" /></td>
			</tr>
			<tr>
				<td><label>Refund Wallet</label></td>
				<td><input name="refund_wallet" value="<?php echo $refund_wallet; ?>" required /></td>
			</tr>
			<tr>
				<td><label>Expire in</label></td>
				<td><input name="expire" value="<?php echo $expire; ?>" type="hidden" /></td>
			</tr>
			<tr>
				<td><label>Description</label></td>
				<td><textarea name="description" rows="10"><?php echo $description; ?></textarea></td>
			</tr>
			<tr>
				<td><input type="submit" /></td>
			</tr>
		</form>
	</tbody>
</table>