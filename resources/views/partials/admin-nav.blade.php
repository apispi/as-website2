@php $active = $active ?? ''; @endphp
<div style="display:flex;align-items:center;justify-content:space-between;gap:1rem;flex-wrap:wrap;">
    <div class="admin-nav" style="flex:1;">
        <a class="{{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
        @if(config('license.admin_enabled') && Route::has('admin.licenses.index'))
            <a class="{{ $active === 'licenses' || request()->routeIs('admin.licenses.*') ? 'active' : '' }}" href="{{ route('admin.licenses.index') }}">Licenses</a>
        @endif
        @if(config('products.enabled') && Route::has('admin.products.index'))
            <a class="{{ $active === 'products' || request()->routeIs('admin.products.*') ? 'active' : '' }}" href="{{ route('admin.products.index') }}">Products</a>
        @endif
        @if(Route::has('admin.posts.index'))
            <a class="{{ $active === 'posts' || request()->routeIs('admin.posts.*') ? 'active' : '' }}" href="{{ route('admin.posts.index') }}">Posts</a>
        @endif
        <a class="{{ $active === 'media' || request()->routeIs('admin.media.*') ? 'active' : '' }}" href="{{ route('admin.media.index') }}">Media</a>
        <a class="{{ $active === 'users' || request()->routeIs('admin.users.*') ? 'active' : '' }}" href="{{ route('admin.users.index') }}">Users</a>
        @if(config('logs.enabled') && Route::has('admin.event-logs.index'))
            <a class="{{ $active === 'logs' || request()->routeIs('admin.event-logs.index') ? 'active' : '' }}" href="{{ route('admin.event-logs.index') }}">Logs</a>
        @endif
        @if(config('admin.servers_enabled') && Route::has('admin.servers.index'))
            <a class="{{ $active === 'servers' || request()->routeIs('admin.servers.*') ? 'active' : '' }}" href="{{ route('admin.servers.index') }}">Servers</a>
        @endif
        @if(config('license.enabled') && config('license.public_validation') && Route::has('admin.tools.license-validation'))
            <a class="{{ $active === 'tools' || request()->routeIs('admin.tools.*') ? 'active' : '' }}" href="{{ route('admin.tools.license-validation') }}">License Validation</a>
        @endif
    </div>
    @if(!empty($createRoute) && Route::has($createRoute))
        <a href="{{ route($createRoute) }}"
           style="display:inline-block;padding:0.5rem 1.1rem;background:var(--primary);color:#fff;border-radius:8px;font-weight:600;text-decoration:none;font-size:0.9rem;white-space:nowrap;flex-shrink:0;">
            {{ $createLabel ?? '+ Add' }}
        </a>
    @endif
</div>
