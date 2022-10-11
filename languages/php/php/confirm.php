<?php
	
	//it's your api key that get from ariva.finance gateway section
    //please insert your api key bellow
	$key = "";//required

	//this is form action url, all data must be post to this url
    //for testnet, please replace https://testnet.ariva.finance/api/v1/post/confirm
    //for mainnet, please replace https://gateway.ariva.finance/api/v1/post/confirm
	$url = 'https://testnet.ariva.finance/api/v1/post/confirm';

	//please instert your orderid to check payment status from ariva.finance
	$orderid = "";
?>
<table>
	<tbody>
		<form action="<?php echo $url; ?>" method="POST">
			<tr>
				<td><label>Order ID</label></td>
				<td><input name="orderid" value="<?php echo $orderid; ?>" required /></td>
			</tr>
			<tr>
				<td><label>key</label></td>
				<td><input name="key" value="<?php echo $key; ?>" required type="hidden" /></td>
			</tr>
			<tr>
				<td><input type="submit" /></td>
			</tr>
		</form>
	</tbody>
</table>