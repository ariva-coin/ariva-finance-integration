<?php
	$key = "b1k2xh-joekcq-c6so20-pccw7g";
	$url = 'https://gateway.ariva.finance/api/v1/post/confirm';
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
				<td><input name="key" value="<?php echo $key; ?>" required type="hidden1" /></td>
			</tr>
			<tr>
				<td><input type="submit" /></td>
			</tr>
		</form>
	</tbody>
</table>