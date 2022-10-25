jQuery(document).ready(function () {
    jQuery('.wc-ariva-checkout').submit(function (e) {
        e.preventDefault();
        e.stopPropagation();

        let _form = jQuery(this);

        if (_form.is('.processing')) {
            return false;
        }

        _form.addClass('processing');

        _form.block({
            message: null,
            overlayCSS: {
                background: '#fff',
                opacity: 0.6
            }
        });
        jQuery.ajax({
            type: 'POST',
            url: wc_checkout_params.ajax_url,
            data: {
                action: 'validate_ariva_form',
                refund_wallet: _form.find('input[name="refund_wallet"]').val(),
                orderid: _form.find('input[name="orderid"]').val()
            },
            dataType: 'json',
            success: function (result) {
                if ('success' === result.result) {
                    e.currentTarget.submit();
                } else if ('failure' === result.result) {
                    submit_error(result.msg);
                }
            },
            error: function (result) {
            }
        });
    });

    function submit_error(error_message) {
        let _form = jQuery('.wc-ariva-checkout');
        jQuery('.woocommerce-NoticeGroup-checkout, .woocommerce-error, .woocommerce-message').remove();
        _form.prepend('<div class="woocommerce-NoticeGroup woocommerce-NoticeGroup-checkout"><ul class="woocommerce-error"><li>' + error_message + '</li></ul></div>');
        _form.removeClass('processing').unblock();
        _form.find('.input-text, select, input:checkbox').trigger('validate').blur();
        jQuery('html, body').animate({
            scrollTop: (jQuery('form.wc-ariva-checkout').offset().top - 100)
        }, 1000);
        jQuery(document.body).trigger('checkout_error');
    }
});
