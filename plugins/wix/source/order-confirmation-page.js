import { createOrder } from 'backend/orders';
import { cart } from 'wix-stores';
import { getCurrentCart } from 'backend/cart.jsw'
import wixLocation from 'wix-location';

$w.onReady(async function () {
    const cart = await getCurrentCart()

    const cartId = cart._id
    const currency = cart.currency.code
    cart.currency = currency
    cart.cartId = cartId
    cart.lineItems.forEach(item => item.priceData = { price: item.price });
    delete cart.buyerInfo
    console.log(cart)
    // channelInfo.type must have a value
    cart.channelInfo = { type: 'WEB' }
    // Payment status enum PENDING PAID NOT PAID
    cart.paymentStatus = 'PAID'
    // must have address
    cart.shippingInfo = {
        "deliverByDate": "2019-06-23T13:58:47.871Z",
        "deliveryOption": "Free Shipping",
        "shippingRegion": "Domestic",
        "estimatedDeliveryTime": "4:30pm",
        "shipmentDetails": {
            "address": {
                "formatted": "235 W 23rd St, New York, NY 10011, USA",
                "city": "New York",
                "country": "US",
                "addressLine": "235 W 23rd St",
                "postalCode": "10011",
                "subdivision": "NY"
            },
            "lastName": "Doe",
            "firstName": "John1",
            "email": "john.doe@somedomain.com",
            "phone": "5555555555",
            "company": "company name",
            "shipmentPriceData": {
                "price": 5,
                "taxIncludedInPrice": false
            }
        }
    }
    // add billing info (optional)
    cart.billingInfo = {
        "address": {
            "formatted": "235 W 23rd St New York, NY 10011, USA",
            "city": "New York",
            "country": "US",
            "addressLine": "235 W 23rd St",
            "postalCode": "10011",
            "subdivision": "NY"
        },
        "lastName": "Doe",
        "firstName": "John1",
        "email": "john.doe@somedomain.com",
        "phone": "+15555555555",
        "company": "My company name",
        "paymentMethod": "Ariva.Finance",
        "paymentGatewayTransactionId": "29A06193U6234935D",
        "paymentProviderTransactionId": "7c03ca74-eaf5-4541-8678-9b857634fdcb"
    }

    // cart.buyerLanguage = "EN"
    // cart.buyerNote = 'Refund Address: 0xbBFb90f700A185c45d9021AcE91e3C224BcC5cAe';
    // cart.buyerInfo = {
    //     "firstName": "John",
    //     "lastName": "Doe",
    //     "email": "john.doe@somedomain.com",
    //     "phone": "5555555555",
    //     "identityType": "CONTACT"
    // }

    cart.customField = {
        "title": "Refund wallet address",
        "translatedTitle": "Refund wallet address",
        "value": "xfssydar32423423c4235421s"
    }

    // Verification

    createOrder(cart).then((order) => {
        console.log(order)
        wixLocation.to('/thank-you-page/' + order._id)
    })

    // getCurrentCart().then((cartInfo) => {

    //     cartInfo.then((cartInfo) => {
    //         console.log(cartInfo)
    //     }) 
    //     console.log("my cart info 11", cartInfo)
    //     console.log("my id 1", cartInfo._id)
    //     if (cartInfo._id) {
    //         createOrder(cartInfo._id)
    //     }

    // })

});