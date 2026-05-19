<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\License;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        return view('admin.users.index', [
            'users' => User::orderBy('name')->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['is_admin'] = $request->boolean('is_admin');

        User::create($data);

        return redirect()
            ->route('admin.users.index')
            ->with('status', 'User created successfully.');
    }

    public function edit(User $user): View
    {
        $licenses = config('license.enabled')
            ? $user->licenses()->with('product')->latest()->get()
            : collect();

        $products = (config('license.enabled') && config('products.enabled'))
            ? Product::orderBy('name')->get()
            : collect();

        return view('admin.users.edit', compact('user', 'licenses', 'products'));
    }

    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        $data = $request->validated();
        $data['is_admin'] = $request->boolean('is_admin');

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()
            ->route('admin.users.index')
            ->with('status', 'User updated successfully.');
    }

    public function grantLicense(Request $request, User $user): RedirectResponse
    {
        $data = $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'seats_total' => ['required', 'integer', 'min:1'],
            'expires_at'  => ['nullable', 'date'],
            'domains'     => ['nullable', 'string'],
        ]);

        $license = License::create([
            'user_id'     => $user->id,
            'product_id'  => $data['product_id'],
            'seats_total' => $data['seats_total'],
            'expires_at'  => $data['expires_at'] ?? null,
        ]);

        if (!empty($data['domains'])) {
            $domains = collect(preg_split('/[,\n]+/', $data['domains']))
                ->map(fn ($d) => strtolower(trim($d)))
                ->filter()->unique()->take(50)->values();

            $license->domains()->createMany(
                $domains->map(fn ($d) => ['domain' => $d])->all()
            );
        }

        return redirect()
            ->route('admin.users.edit', $user)
            ->with('status', 'License granted successfully.');
    }

    public function revokeLicense(User $user, License $license): RedirectResponse
    {
        abort_if($license->user_id !== $user->id, 404);
        $license->delete();

        return redirect()
            ->route('admin.users.edit', $user)
            ->with('status', 'License revoked.');
    }

    public function destroy(User $user): RedirectResponse
    {
        if ($user->id === Auth::id()) {
            return redirect()
                ->route('admin.users.index')
                ->with('status', 'You cannot delete your own account.');
        }

        $user->delete();

        return redirect()
            ->route('admin.users.index')
            ->with('status', 'User removed.');
    }
}
