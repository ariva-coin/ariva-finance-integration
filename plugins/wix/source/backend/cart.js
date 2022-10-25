import wixStoresBackend from 'wix-stores-backend';

export function  getCurrentCart() {
    return wixStoresBackend.getCurrentCart();   
}