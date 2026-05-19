<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AgentsController extends Controller
{
    public function index(Request $request)
    {
        if (! config('agents.enabled')) {
            abort(404);
        }

        $category = config('agents.category', 'Agent');
        $search = trim((string) $request->query('q', ''));

        $query = Product::query()
            ->with('media')
            ->where('category', $category);

        if ($search !== '') {
            $query->where(function ($b) use ($search) {
                $b->where('name', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('product_code', 'like', '%' . $search . '%');
            });
        }

        $products = $query->orderBy('name')->get();

        if ($request->wantsJson()) {
            return response()->json($products->map(fn ($p) => [
                'id'          => $p->id,
                'name'        => $p->name,
                'description' => $p->description,
                'url'         => $p->url ?? url('/shop/' . ($p->product_code ?? '')),
                'isExternal'  => ! empty($p->url),
            ]));
        }

        return view('shop.index', [
            'products'       => $products,
            'q'              => $search,
            'activeCategory' => $category,
        ]);
    }
}
