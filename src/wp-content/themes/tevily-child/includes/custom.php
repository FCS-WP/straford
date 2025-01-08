<?php

add_action('wp_ajax_change_currency', 'change_currency_callback');
add_action('wp_ajax_nopriv_change_currency', 'change_currency_callback');

function change_currency_callback() {
    if (!isset($_POST['currency'])) {
        wp_send_json_error(['message' => 'Currency not provided.']);
    }

    $currency = sanitize_text_field($_POST['currency']);


    WC()->session->set('chosen_currency', $currency);

    wp_send_json_success(['message' => 'Currency updated.']);
}


add_filter('woocommerce_currency', 'set_custom_currency');

function set_custom_currency($currency) {
    if (WC()->session && WC()->session->get('chosen_currency')) {
        return WC()->session->get('chosen_currency');
    }
    return $currency;
}