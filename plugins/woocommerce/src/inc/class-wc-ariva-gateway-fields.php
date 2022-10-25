<?php

if (!defined('ABSPATH')) {
    exit;
}

class WC_Ariva_Gateway_Fields
{

    public static function init_fields()
    {
        return [
            'enabled'           => [
                'title' => __('Active/Deactive', 'wc-ariva'),
                'type'  => 'checkbox',
                'label' => __('Activate Ariva PGW', 'wc-ariva')
            ],
            'test'              => [
                'title' => __('Test Mode', 'wc-ariva'),
                'type'  => 'checkbox'
            ],
            'client_key'         => [
                'title' => __('Client Key', 'wc-ariva'),
                'type'  => 'text'
            ],
            'client_secret'         => [
                'title' => __('Client Secret', 'wc-ariva'),
                'type'  => 'text'
            ]
        ];

    }

}