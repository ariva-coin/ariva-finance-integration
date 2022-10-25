<?php

if (!defined('ABSPATH')) {
    exit;
}

class WC_Ariva_Gateway extends WC_Payment_Gateway
{

    private $api_url            = 'https://gateway.ariva.finance/api/pay';
    private $api_test_url       = 'https://testnet.ariva.finance/api/pay';
    private $api_confirm_url    = 'https://gateway.ariva.finance/api/v1/post/confirm';

    public function __construct()
    {
        $this->id = 'ariva';
        $this->title = __('CRYPTO PAYMENT BY', 'wc-ariva');
        $this->method_title = __('ARIVA PGW', 'wc-ariva');
        $this->method_description = __('ARV Payment', 'wc-ariva');
        $this->supports = ['products', 'refunds'];

        $this->form_fields = WC_Ariva_Gateway_Fields::init_fields();

        $this->init_settings();

        $test_mode = $this->get_option('test');

        if ($test_mode == 'yes') {
            $this->$api_url = 'https://testnet.ariva.finance/api/pay';
        }

        add_action(
            'woocommerce_receipt_' . $this->id,
            [$this, 'receipt_form']
        );

        add_action(
            'woocommerce_update_options_payment_gateways_' . $this->id,
            [$this, 'process_admin_options']
        );

        add_action('woocommerce_api_wc_gateway_ariva', [$this, 'api_response']);

        $this->enabled          = $this->get_option('enabled');
        $this->client_key       = $this->get_option('client_key');
        $this->client_secret    = $this->get_option('client_secret');
        $this->expire_param     = 120;
    }

    public function receipt_form($order_id)
    {

        if (WC()->cart->is_empty()) {
            wc_add_notice(sprintf(__('Sorry, your session has expired. <a href="%s" class="wc-backward">Return to shop</a>', 'woocommerce'), esc_url(wc_get_page_permalink('shop'))), 'error');

            return;
        }

        $args = [
            'form_id'       => $this->id,
            'client_key'    => $this->client_key,
            'client_secret' => $this->client_secret,
            'action_url'    => $this->api_url,
            'order_id'      => $order_id,
            'expire_param'  => 120
        ];
      
        echo WC_Ariva_Gateway_Form::init_form($args);
    }

    public function process_payment($order_id)
    {
        $order = wc_get_order($order_id);
        return [
            'result'   => 'success',
            'redirect' => $order->get_checkout_payment_url(true)
        ];
    }

    public function process_refund($order_id, $amount = null, $reason = '')
    {
        $xml_data = [
            'okUrl'     => $order->get_checkout_order_received_url(),
            'failUrl'   => $woocommerce->cart->get_cart_url(),
            'client_key'=> $this->client_key,
            'order_id'  => $order_id,
            'type'      => 'Ariva',
            'amount'    => $amount,
            'currency'  => 'USD',
            'refund_wallet' => $refund_wallet
        ];

        $request = new WC_Ariva_Request($this->api_url);

        $result = $request->send($xml_data);

        $response = (string) $result->Response;
      

        if ('Approved' === $response) {
            return true;
        }

        return false;
    }
}
