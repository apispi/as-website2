<?php

namespace App\Services;

use App\Models\Product;

class ShopService
{
    public function getProducts(?string $category = null)
    {
        if (!config('products.enabled')) {
            return collect();
        }
        $query = Product::with('media')->orderBy('name');
        if ($category !== null) {
            $query->where('category', $category);
        }
        return $query->get();
    }

    public function getCategories(): array
    {
        if (!config('products.enabled')) {
            return [];
        }
        return Product::select('category')
            ->whereNotNull('category')
            ->where('category', '!=', '')
            ->distinct()
            ->orderBy('category')
            ->pluck('category')
            ->toArray();
    }

    public function getProductDetails(Product $product): array
    {
        return [
            'product' => $product,
            'paypalClientId' => config('paypal.client_id'),
            'paypalCurrency' => config('paypal.currency', 'USD'),
            'stripePublicKey' => config('stripe.public_key'),
            'stripeCurrency' => config('stripe.currency', 'USD'),
            'paypalEnabled' => (bool) (config('payment.providers.paypal.enabled') && config('paypal.client_id')),
            'stripeEnabled' => (bool) (config('payment.providers.stripe.enabled') && config('stripe.public_key') && config('stripe.secret')),
        ];
    }
}
