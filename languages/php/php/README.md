<h1>php</h1>
<p>Using the Ariva.Finance payment gateway consists of two steps. In the first step, the website sends the required amount and other information to Ariva.Finance, and the payment gateway generate a payment page, the user completes the payment using this page and returns to the website.(index.php)<br/>In the second step, the website can send the orderid to Ariva.Finance and get the details of the payment.(confirm.php)</p>
<p>Open index.php file and edit codes.</p>
<h2>Required fields</h2>
<h3>$amount</h3>
<p>Amount must be in number or float, and in USD.<br/>
  True Fromats: <code>124.54</code> <code>124.00</code> <code>124</code><br/>
  Wrong Formats: <code>124,54</code> <code>1,244.99</code> <code>1,244,99</code>
</p>
<h3>$orderid</h3>
<p>Each order on your system, must have a "uniqe" ID, it can be string. You can use this id to get payment status.<br>
  True Formats: <code>12484564</code> <code>xiah12-dsewqdsa-dskaadsa-as111</code> <code>order-5248</code> ...
</p>
<h3>$random</h3>
<p>This is a random string using for hash request.</p>
<h3>$success_url</h3>
<p>it's a url on your website that, ariva.finance will be redirected there if payment done successfully.</p>
<h3>$fail_url</h3>
<p>it's a url on your website that, ariva.finance will be redirected there if payment failed.</p>
<h3>$key</h3>
<p>it's your api key that get from ariva.finance gateway section.</p>
<h3>$secret</h3>
<p>it's your secret key that get from ariva.finance gateway section.</p>
<h3>$refund_wallet</h3>
<p>it's your customer wallet address.</p>
<h3>$hash</h3>
<p>Ariva.Finance use <code>sha1</code> to protect user/merchant payments.</p>
<h3>$url</h3>
<p>This is form action url, all datas must be post to this url. For testnet, use <code>https://testnet.ariva.finance/api/pay</code> and for mainnet <code>https://gateway.ariva.finance/api/pay</code> url.</p>
<h2>Optional fields</h2>
<h3>$fname</h3>
<p>Customer first name</p>
<h3>$lname</h3>
<p>Customer last name</p>

<h3>$tel</h3>
<p>Customer Tel</p>
<h3>$zip</h3>
<p>Customer zip code</p>
<h3>$address</h3>
<p>Customer address</p>
<h3>$country</h3>
<p>Customer country</p>

<h3>$state</h3>
<p>Customer state</p>

<h3>$city</h3>
<p>Customer city</p>
<h3>$description</h3>
<p>Description from customer or your side</p>

<h3>$expire</h3>
<p>Payment page will be valid during this time. Ariva.Finance default value is 120 minutes.</p>









