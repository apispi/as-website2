@extends('layouts.app')

@section('title', 'Admin · Users')

@section('content')
<header class="hero">
    <div>
        <p class="eyebrow">Admin</p>
        <h1>User management</h1>
        <p class="lead">Invite teammates, promote admins, and retire unused accounts.</p>
    </div>
    @include('partials.admin-nav', ['active' => 'users'])
</header>

@if (session('status'))
    <div class="banner success">
        {{ session('status') }}
    </div>
@endif

<div class="card">
    <div style="overflow-x:auto;">
        <table style="width:100%;border-collapse:separate;border-spacing:0 0.5rem;">
            <thead>
                <tr style="text-align:left;color:var(--muted);font-size:0.85rem;text-transform:uppercase;letter-spacing:0.1em;">
                    <th style="padding:0 0.75rem;">Name</th>
                    <th style="padding:0 0.75rem;">Email</th>
                    <th style="padding:0 0.75rem;">Admin Email</th>
                    <th style="padding:0 0.75rem;">Role</th>
                    <th style="padding:0 0.75rem;">Created</th>
                    <th style="padding:0 0.75rem;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr style="background:var(--bg);">
                        <td style="padding:0.9rem 0.75rem;font-weight:600;">{{ $user->name }}</td>
                        <td style="padding:0.9rem 0.75rem;">{{ $user->email }}</td>
                        <td style="padding:0.9rem 0.75rem;">{{ $user->admin_email ?? '—' }}</td>
                        <td style="padding:0.9rem 0.75rem;">{{ $user->is_admin ? 'Admin' : 'Member' }}</td>
                        <td style="padding:0.9rem 0.75rem;">{{ $user->created_at->format('M j, Y') }}</td>
                        <td style="padding:0.9rem 0.75rem;display:flex;gap:0.75rem;flex-wrap:wrap;align-items:center;">
                            <a class="link" href="{{ route('admin.users.edit', $user) }}">Edit</a>
                            @if(config('license.enabled'))
                                <a class="link" href="{{ route('admin.users.edit', $user) }}#licenses">+ License</a>
                            @endif
                            <form method="POST" action="{{ route('admin.users.destroy', $user) }}" onsubmit="return confirm('Delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background:none;border:none;color:var(--error);cursor:pointer;padding:0;font-size:inherit;">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" style="padding:1rem 0.75rem;text-align:center;color:var(--muted);">
                            No users have been created yet.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:1rem;">
        {{ $users->links() }}
    </div>
</div>
@endsection
