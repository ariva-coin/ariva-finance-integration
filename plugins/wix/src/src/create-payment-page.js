import { cart } from 'wix-stores';
import { getApiKey, getOrderHash } from 'backend/secret';

const orderInfoMessage = {
    cartId: null,
    apiKey: null,
    orderHash: null,
    refundAddress: null,
    total: null
}

$w.onReady(function () {
    cart.getCurrentCart()
        .then((currentCart) => {
            orderInfoMessage.cartId = currentCart._id;
            orderInfoMessage.total = currentCart.totals.total;
            getApiKey().then((apiKey) => {
                getOrderHash().then((orderHash) => {
                    console.log(apiKey, orderHash)
                    orderInfoMessage.apiKey = apiKey
                    orderInfoMessage.orderHash = orderHash
                    console.log("This will be posted:", orderInfoMessage )
                    $w("#html1").postMessage(JSON.stringify(orderInfoMessage));
                })
            })

        })
        .catch((error) => {
            console.error(error);
        });
});