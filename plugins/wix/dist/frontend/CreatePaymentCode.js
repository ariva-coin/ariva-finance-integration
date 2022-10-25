import { cart } from 'wix-stores';
import { getApiKey, getOrderHash } from 'backend/secret';

const successUrl = "https://hasangokce.wixsite.com/mystore/order?orderId="

const orderInfoMessage = {
    cartId: null,
    apiKey: null,
    orderHash: null,
    refundAddress: null,
    total: null,
    random: new Date().getTime(),
    okUrl : null,
	failUrl : "https://ariva.finance/fail",
}


$w.onReady(function () {
    cart.getCurrentCart()
        .then((currentCart) => {
            orderInfoMessage.cartId = currentCart._id;
            orderInfoMessage.total = currentCart.totals.total;
            orderInfoMessage.okUrl =  successUrl +  orderInfoMessage.cartId;
            getApiKey().then((apiKey) => {
                getOrderHash(orderInfoMessage.cartId, orderInfoMessage.total, orderInfoMessage.random).then((orderHash) => {
                    console.log(apiKey, "hashstr-backend: ", orderHash)
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