<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\ShopService;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;


class ShopController extends Controller
{
    protected $shopService;

    protected function abortIfShopDisabled()
    {
        if (!config('shop.enabled')) {
            abort(404);
        }
    }

    public function __construct(ShopService $shopService)
    {
        $this->shopService = $shopService;
    }

    public function index(\Illuminate\Http\Request $request): View
    {
        $this->abortIfShopDisabled();
        $category = $request->query('category');
        return view('shop.index', [
            'products'       => $this->shopService->getProducts($category ?: null),
            'categories'     => $this->shopService->getCategories(),
            'activeCategory' => $category ?: null,
        ]);
    }

    public function show(Product $product): View
    {
        $this->abortIfShopDisabled();
        return view('shop.show', $this->shopService->getProductDetails($product));
    }
}
