# Wix Cryto Payment with Ariva.Finance

## Integrations steps

1. Add your api key and secret to Wix Site Keys
    - Wix -> Settings -> Secret Manager
        - name: ARIVA_FINANCE_API_KEY value: your_api_key
        - name: ARIVA_FINANCE_API_SECRET value: your_api_secret

2. Open your wix site with "Velo by wix" to be able to add all backend files from dist/backend/ folder

3. Create new page named "Create Payment"

4. Create new page named  "Create Payment"'s and add this code to the page dist/frontend/CreatePaymentCode.js

5. Add a HTML Widget to this page and paste code from dist/frontend/widget.html

6. Create new page named "Order Confirmation" and add this code to the page dist/frontend/OrderConfirmationCode.js

7. Add a button your basket page and redirect it to "Create Payment" page

Note: This is a way offered from Ariva.Finance,  you can edit or specialize process as you wish.