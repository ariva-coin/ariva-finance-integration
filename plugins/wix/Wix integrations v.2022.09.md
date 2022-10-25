# Crypto Payment with Ariva.Finance on Wix

## 1.Ariva.Finance

Ariva.Finance is a secure, fast, and easiest way to set up a payment gateway on websites and apps within minutes at a lower price. It meets the global need for a quicker and more transparent payment system with low transaction fees. Online transactions such as travel booking and shopping have increased as the use of the internet increases, and e-commerce has become a significant part of the global market segment. Online buyers and sellers incur so much cost paying traditional banking systems commissions and hidden fees. Ariva.Finance is a new generation payment gateway that offers solutions using blockchain technology.

## 2. Ariva.Finance Wix Integration

Simple Way to Use Cryptocurrency Payments for Wix E-commerce website. Teaming up with Ariva.Finance is a simple and safe way to admit instant crypto payments for your businesses. If you have an online store and wishing to enable payments in cryptocurrency. You may simply install one of our plugins, if you find any difficulties during the process, do not hesitate to contact us.

## 3. Getting API Credentials

Register from Ariva.Finance Application Page: <https://www.ariva.finance/signup>

## ![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.001.png)

After registration verify your email, login and visit Gateway menu and “Create New Gateway”:

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.002.png)

Give name for your site and enter your domain:

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.003.png)

Your API credentials will appear on the pop-up, use this information for your e-commerce site. Please keep your “Secret” in a safe place, after closing this popup, it will disappear.

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.004.png)

## 4. Integrations steps

Start a project Visit Velo by Wix: <https://www.wix.com/velo>

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.005.png)

1. Add your api key and secret to Wix Site Keys
   - Wix -> Settings -> Secret Manager
     - name: ARIVA_FINANCE_API_KEY value: your_api_key
     - name: ARIVA_FINANCE_API_SECRET value: your_api_secret

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.006.png)

2. From “Backend” tab press + button and add all backend files from dist/backend/ folder og Github

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.007.png)

3. Create a new page named "Create Payment"
4. Create a new page named "Create Payment"'s and add this code to the page dist/frontend/CreatePaymentCode.js

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.008.png)

5. Add an HTML Widget to this page and paste code from dist/frontend/widget.html

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.009.png)

6. Create a new page named "Order Confirmation" and add this code to the page dist/frontend/OrderConfirmationCode.js

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.010.png)

7. Add Ariva.Finance button as an image to your basket page and redirect it to "Create Payment" page

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.011.png)

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.012.png)

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.013.png)

![](images/Aspose.Words.2f7af80d-6ceb-459b-9c4f-66248c189d95.014.png)

Add enough space between “Checkout” button and Ariva.Finance button.

Note: This is an example implemetantion offered by Ariva.Finance, you can edit or specialize processes as you wish.

## 5. Repository

` `[mastiodotco/wix (github.com)](https://github.com/mastiodotco/wix)
