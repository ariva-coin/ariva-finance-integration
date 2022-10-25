import { getSecret } from 'wix-secrets-backend';

export async function getApiKey() {
   return await getSecret('ARIVA_FINANCE_API_KEY')

}

export async function getOrderHash() {
   return await getSecret('ARIVA_FINANCE_API_SECRET')
}