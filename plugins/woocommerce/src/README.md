## WooComerce Ariva PGW

ARIVA PGW Plugin.

### 1. Installation
* Upload and activate plugin.
* Enable ARIVA PGW Pluging on WooCommerce `Payments` .
* Get parameters (client_key, client_secret) from  `https://ariva.finance/wc-ariva-pgw` 
* Set client_key, client_secret parameters

### 2. Copy the below code snippet
### 3. From the left panel of the dashboard, go to Appearance>Theme Editor> functions.php.

* add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
* function custom_woocommerce_auto_complete_order( $order_id ) {
* if ( ! $order_id ) {
* return;
* }

* $order = wc_get_order( $order_id );
* $order->update_status( 'completed' );
* }