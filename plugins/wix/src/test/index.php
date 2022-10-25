<?php
	//required
	$amount = rand(100,50000);
	$amount = $amount/100;
	$orderid = date("Ymd") . rand(11111, 99999);
	$rnd = microtime();
	$okUrl = "https://ariva.finance/success";
	$failUrl = "https://ariva.finance/fail";
	$key = "b1k2xh-joekcq-c6so20-pccw7g";
	$secret = "emlh4f-7r3p5f-69ntkr-b1z1pv";
	$hashstr = $key . $secret . $orderid . ($amount) . $okUrl . $failUrl . $rnd;
	$hash = base64_encode(pack('H*', sha1($hashstr)));
	$refund_wallet = "";


	//optional
	$fname = "";
	$lname = "";
	$tel = "";
	$zip = "";
	$address = "";
	$country = "";
	$state = "";
	$city = "";
	$description = "";
	$expire = 120; //in minutes
	$url = 'https://testnet.ariva.finance/api/pay';
	// $url = 'http://127.0.0.1:8000/api/pay';

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
				<td><input name="random" value="<?php echo $rnd; ?>" required type="hidden" /></td>
			</tr>
			<tr>
				<td><label>okUrl</label></td>
				<td><input name="success_url" value="<?php echo $okUrl; ?>" required type="hidden" /></td>
			</tr>
			<tr>
				<td><label>failUrl</label></td>
				<td><input name="fail_url" value="<?php echo $failUrl; ?>" required type="hidden" /></td>
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
				<td><input name="lname" value="<?php echo $fname; ?>" /></td>
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