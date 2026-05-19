@extends('layouts.app')

@section('title', 'Admin · Edit User')

@section('content')
<header class="hero">
    <div>
        <p class="eyebrow">Admin</p>
        <h1>Edit user</h1>
        <p class="lead">Update profile details or admin access for {{ $user->name }}.</p>
    </div>
    <a class="link" href="{{ route('admin.users.index') }}">← Back to users</a>
</header>

<div class="card">
    <form method="POST" action="{{ route('admin.users.update', $user) }}">
        @method('PUT')
        @include('admin.users._form', ['user' => $user, 'submitLabel' => 'Save changes'])
    </form>
</div>

@if(config('license.enabled'))
<div class="card" id="licenses">
    <h2 style="margin:0 0 1.25rem 0;font-size:1.15rem;">Licenses</h2>

    @if($licenses->isNotEmpty())
        <div style="overflow-x:auto;margin-bottom:1.5rem;">
            <table style="width:100%;border-collapse:separate;border-spacing:0 0.4rem;font-size:0.93rem;">
                <thead>
                    <tr style="text-align:left;color:var(--muted);font-size:0.78rem;text-transform:uppercase;letter-spacing:0.1em;">
                        <th style="padding:0 0.75rem;">Product</th>
                        <th style="padding:0 0.75rem;">Key</th>
                        <th style="padding:0 0.75rem;">Seats</th>
                        <th style="padding:0 0.75rem;">Expires</th>
                        <th style="padding:0 0.75rem;"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($licenses as $license)
                        <tr style="background:var(--bg);">
                            <td style="padding:0.75rem;font-weight:600;">{{ $license->product->name ?? '—' }}</td>
                            <td style="padding:0.75rem;font-family:monospace;font-size:0.85rem;">{{ $license->identifier }}</td>
                            <td style="padding:0.75rem;">{{ $license->seats_total }}</td>
                            <td style="padding:0.75rem;">
                                @if($license->expires_at)
                                    <span style="{{ $license->expires_at->isPast() ? 'color:var(--error);' : '' }}">
                                        {{ $license->expires_at->format('M j, Y') }}
                                    </span>
                                @else
                                    <span style="color:var(--muted);">No expiry</span>
                                @endif
                            </td>
                            <td style="padding:0.75rem;">
                                <form method="POST" action="{{ route('admin.users.licenses.destroy', [$user, $license]) }}"
                                      onsubmit="return confirm('Revoke this license?');" style="margin:0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            style="background:none;border:none;color:var(--error);cursor:pointer;padding:0;font-size:0.88rem;font-weight:600;">
                                        Revoke
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p style="color:var(--muted);margin-bottom:1.5rem;">No licenses assigned to this user.</p>
    @endif

    @if($products->isNotEmpty())
        <h3 style="margin:0 0 1rem 0;font-size:1rem;font-weight:700;">Grant a license</h3>
        <form method="POST" action="{{ route('admin.users.licenses.store', $user) }}" style="max-width:520px;">
            @csrf
            <label>
                <span>Product</span>
                <select name="product_id" required
                        style="width:100%;border:1px solid var(--border);border-radius:8px;padding:0.75rem 1rem;font-size:1rem;background:#fff;color:var(--text);">
                    <option value="">— Select product —</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}" {{ old('product_id') == $product->id ? 'selected' : '' }}>
                            {{ $product->name }}
                        </option>
                    @endforeach
                </select>
            </label>
            <label>
                <span>Seats</span>
                <input type="number" name="seats_total" value="{{ old('seats_total', 1) }}" min="1" required>
            </label>
            <label>
                <span>Expiry date <span style="font-weight:400;color:var(--muted);">(leave blank for no expiry)</span></span>
                <input type="date" name="expires_at" value="{{ old('expires_at') }}">
            </label>
            <label>
                <span>Allowed domains <span style="font-weight:400;color:var(--muted);">(comma or newline separated)</span></span>
                <textarea name="domains" rows="2"
                          style="width:100%;border:1px solid var(--border);border-radius:8px;padding:0.75rem 1rem;font-size:1rem;background:#fff;color:var(--text);resize:vertical;">{{ old('domains') }}</textarea>
            </label>
            <div>
                <button type="submit">Grant license</button>
            </div>
        </form>
    @else
        <p style="color:var(--muted);font-size:0.9rem;">No products available to assign.</p>
    @endif
</div>
@endif
@endsection
