<?php

if (!defined('ABSPATH')) {
    exit;
}

class WC_Ariva_Gateway_Form
{

    public static function init_form($args)
    {

        $order_total =0;

        $form = new WC_Payment_Gateway_CC();

        $form->id = $args['form_id'];

        $order = new WC_Order($args['order_id']);
        $fname = $order->billing_first_name;
        $lname = $order->billing_last_name;
        $tel = $order->billing_phone;
        $email = $order->billing_email;
        $zip = $order->billing_postcode;
        $address1 = $order->billing_address_1;
        $address2 = $order->billing_address_2;
        $address = $address1.' '.$address1;
        $country = $order->billing_country;
        $state = $order->billing_state;
        $city = $order->billing_city;
        $order_comments = $order->get_customer_note();
        
        $amount = $order->order_total;
        
        $amount = round($amount, 2);

        $return_url = get_home_url() . "/wc-api/wc_gateway_ariva";

        $rnd = microtime();
         
        $key = $args['client_key'];
        $secret = $args['client_secret'];
          
        $okUrl = $order->get_checkout_order_received_url();
        
        $failUrl = $order->get_checkout_payment_url( $on_checkout = false );
        
        $order_id = $args['order_id'];
        $expire_param = 120; 

        $order_id = date("Ymd") . $order_id;

        $hashstr = $key . $secret . $order_id . $amount . $okUrl . $failUrl . $rnd;

        $hash = base64_encode(pack('H*', sha1($hashstr)));
       
        $refund_wallet = "";

        $form_css = 'wc-ariva-checkout woocommerce-checkout';
        $form_css = apply_filters('woocoomerce_ariva_css', $form_css);

        wp_enqueue_script('wc-credit-card-form');

        ob_start();
    
        ?>

        <form action="<?php echo $args['action_url']; ?>" class="<?php echo $form_css; ?>" method="post">
            
            <div id="payment" class="woocommerce-checkout-payment">
                
                <ul class="wc_payment_methods payment_methods methods">
                    
                    <li class="wc_payment_method payment_method_cod">
                        
                        <div class="payment_box payment_method_ariva">

                            <fieldset id="wc-ariva-cc-form" class='wc-credit-card-form wc-payment-form'>
                                
                                <div class="clear"></div>

                                <input type="hidden" name="storetype" value="event"/>
                                <input type="hidden" name="lang" value="en"/>
                                <input type="hidden" name="currency" value="USD"/>
                                <input type="hidden" name="expire" value="<?php echo $expire_param; ?>"/>
                                <input type="hidden" name="random" value="<?php echo $rnd; ?>" required/>
                                <input type="hidden" name="success_url" value="<?php echo $okUrl; ?>" required/>
                                <input type="hidden" name="fail_url" value="<?php echo $failUrl; ?>" required/>
                                <input type="hidden" name="key" value="<?php echo $key; ?>" required/>
                                <input type="hidden" name="hash" value="<?php echo $hash; ?>" required/>
                                <input type="hidden" name="orderid" value="<?php echo $order_id; ?>" required/>
                                <input type="hidden" name="amount" value="<?php echo $amount; ?>" required />
                                <input type="hidden" name="fname" value="<?php echo $fname; ?>" />
                                <input type="hidden" name="lname" value="<?php echo $lname; ?>" />
                                <input type="hidden" name="tel" value="<?php echo $tel; ?>" />
                                <input type="hidden" name="email" value="<?php echo $email; ?>" />
                                <input type="hidden" name="address" value="<?php echo $address; ?>" />
                                <input type="hidden" name="zip" value="<?php echo $zip; ?>" />
                                <input type="hidden" name="country" value="<?php echo $country; ?>" />
                                <input type="hidden" name="state" value="<?php echo $state; ?>" />
                                <input type="hidden" name="city" value="<?php echo $city; ?>" />
                                <label>Refund Wallet</label>
                                <p>Please enter your wallet address for refund information.</p>
                                <br />
                                <input name="refund_wallet" value="<?php echo $refund_wallet; ?>" required />
                                <textarea style="display:none !important;" type="hidden" name="order_comments" rows="10"><?php echo $order_comments; ?></textarea>                            
                            </fieldset>
                        </div>
                    </li>
            <input type="submit" class="button alt" value="<?php echo __('Confirm Order', 'wc-ariva'); ?>"/>
                </ul>
            </div>
        </form>

        <?php

        $html = ob_get_clean();
     
        return $html;
    }

    public static function validate_fields()
    {
        if (empty($_POST['refund_wallet']) ||
            empty($_POST['orderid'])) {

            echo json_encode([
                'result' => 'failure',
                'msg'    => __('Please fill all field.', 'wc-ariva')
            ]);
            wp_die();
        }

        echo json_encode([
            'result' => 'success'
        ]);
        wp_die();
    }
}
