<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('site.name') }}</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}">
    <style>
    :root {
        --primary: #7c3aed;
        --primary-dark: #6d28d9;
        --accent-cyan: #00d1ff;
        --error: #dc2626;
        --success: #16a34a;
        --bg: #f8f9fc;
        --text: #1a1a2e;
        --muted: #6b7280;
        --panel: #ffffff;
        --panel-alt: rgba(124,58,237,0.06);
        --border: #e8eaf0;
    }
    *, *::before, *::after { box-sizing: border-box; }
    html, body { overflow-x: hidden; }
    body {
        margin: 0;
        min-height: 100vh;
        display: flex;
        flex-direction: column;
        font-family: Figtree, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        background: var(--bg);
        color: var(--text);
    }

    /* ── Site Header / Nav ── */
    .site-header {
        background: #fff;
        border-bottom: 1px solid var(--border);
        position: sticky;
        top: 0;
        z-index: 100;
    }
    .site-header-inner {
        max-width: 1140px;
        margin: 0 auto;
        padding: 0 1.5rem;
        display: flex;
        align-items: center;
        height: 60px;
        gap: 0.5rem;
    }
    .brand {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1.15rem;
        font-weight: 800;
        color: var(--primary);
        text-decoration: none;
        letter-spacing: -0.5px;
        white-space: nowrap;
        margin-right: 0.5rem;
    }
    .nav-links {
        display: flex;
        align-items: center;
        gap: 0.1rem;
        margin-left: auto;
        flex-wrap: wrap;
    }
    .nav-links a {
        padding: 0.4rem 0.7rem;
        border-radius: 6px;
        font-size: 0.88rem;
        font-weight: 500;
        color: var(--text);
        text-decoration: none;
        white-space: nowrap;
        transition: background .12s ease, color .12s ease;
    }
    .nav-links a:hover { background: #f1f0fe; color: var(--primary); }
    .nav-links a.nav-active { color: var(--primary); font-weight: 600; background: #f1f0fe; }
    .nav-links a.nav-cta {
        background: var(--primary);
        color: #fff !important;
        padding: 0.4rem 1rem;
        border-radius: 6px;
        font-weight: 600;
        margin-left: 0.35rem;
    }
    .nav-links a.nav-cta:hover { background: var(--primary-dark); }
    .nav-toggle {
        display: none;
        margin-left: auto;
        padding: 0.45rem 0.75rem;
        background: transparent;
        border: 1px solid var(--border);
        border-radius: 6px;
        color: var(--text);
        font-size: 0.95rem;
        font-weight: 600;
        cursor: pointer;
        box-shadow: none;
        transition: background .12s ease;
    }
    .nav-toggle:hover { background: var(--bg); transform: none; box-shadow: none; }
    @media (max-width: 720px) {
        .site-header-inner { flex-wrap: wrap; height: auto; padding: 0.75rem 1.5rem; gap: 0; }
        .nav-toggle { display: inline-flex; align-items: center; gap: 0.4rem; }
        .nav-links {
            width: 100%;
            display: none;
            flex-direction: column;
            align-items: stretch;
            margin-left: 0;
            padding-bottom: 0.5rem;
        }
        .nav-links[data-open="true"] { display: flex; }
        .nav-links a { width: 100%; }
        .nav-links a.nav-cta { margin-left: 0; margin-top: 0.25rem; text-align: center; }
    }

    /* ── Main content container ── */
    main { flex: 1; }
    .page {
        max-width: 1100px;
        margin: 0 auto;
        padding: 2rem 1.5rem 2.5rem;
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
        width: 100%;
    }

    /* ── Typography helpers ── */
    .hero h1 { margin: 0.4rem 0; font-size: clamp(2.4rem, 4vw, 3.6rem); }
    .eyebrow { text-transform: uppercase; letter-spacing: 0.2em; font-size: 0.78rem; color: var(--muted); }
    .lead { color: var(--muted); }

    /* ── Cards ── */
    .card {
        background: var(--panel);
        border-radius: 14px;
        padding: 2rem;
        box-shadow: 0 2px 12px rgba(0,0,0,0.06);
        border: 1px solid var(--border);
    }
    .card.alt {
        background: var(--panel-alt);
        color: var(--text);
        box-shadow: none;
        border-color: rgba(124,58,237,0.15);
    }

    /* ── Forms ── */
    form { display: flex; flex-direction: column; gap: 1rem; }
    label span { display: block; margin-bottom: 0.35rem; font-size: 0.9rem; font-weight: 500; }
    input {
        width: 100%;
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 0.75rem 1rem;
        font-size: 1rem;
        background: #fff;
        color: var(--text);
        transition: border-color .15s ease, box-shadow .15s ease;
    }
    input:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(124,58,237,0.12); }
    .card.alt input {
        border: 1px solid rgba(255,255,255,0.25);
        background: rgba(255,255,255,0.08);
        color: #fff;
    }

    /* ── Buttons ── */
    button {
        border: none;
        border-radius: 8px;
        padding: 0.75rem 1.25rem;
        font-size: 1rem;
        font-weight: 600;
        color: #fff;
        background: var(--primary);
        cursor: pointer;
        transition: background .15s ease, transform .15s ease, box-shadow .15s ease;
    }
    button:hover {
        background: var(--primary-dark);
        transform: translateY(-1px);
        box-shadow: 0 6px 18px rgba(124,58,237,0.25);
    }
    .link.button-reset {
        background: none;
        border: none;
        padding: 0;
        color: var(--primary);
        font-weight: 600;
        cursor: pointer;
    }
    .link.button-reset:hover { text-decoration: underline; }
    .favorite-btn {
        background: none;
        border: none;
        padding: 0.15rem 0.35rem;
        font-size: 1.05rem;
        color: var(--primary);
        cursor: pointer;
        border-radius: 6px;
    }
    .favorite-btn[aria-pressed="true"] { font-weight: 700; }
    .favorite-btn .icon { width: 18px; height: 18px; display: inline-block; vertical-align: middle; }
    .favorite-btn .icon path { fill: transparent; stroke: var(--primary); stroke-width: 1.4; transition: fill .12s ease, stroke .12s ease; }
    .favorite-btn[aria-pressed="true"] .icon path { fill: var(--primary); stroke: var(--primary-dark); }

    /* ── Alerts / Banners ── */
    .banner {
        border-radius: 8px;
        padding: 1rem 1.25rem;
        border: 1px solid transparent;
    }
    .banner.success { background: rgba(22,163,74,0.08); color: var(--success); border-color: rgba(22,163,74,0.2); }
    .banner.error   { background: rgba(220,38,38,0.08);  color: var(--error);   border-color: rgba(220,38,38,0.2); }
    .banner.info    { background: rgba(124,58,237,0.08); color: var(--primary); border-color: rgba(124,58,237,0.2); }
    .banner ul { margin: 0; padding-left: 1rem; }
    .status { margin: 0; }

    /* ── Links ── */
    .link { color: var(--primary); font-weight: 600; text-decoration: none; }
    .link:hover { text-decoration: underline; }

    /* ── Layout helpers ── */
    .stack { display: grid; gap: 1.5rem; }
    .grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(260px, 1fr)); gap: 1.5rem; }
    .details { display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); gap: 1rem; }
    .details dt { text-transform: uppercase; letter-spacing: 0.15em; font-size: 0.7rem; color: var(--muted); }
    .details dd { margin: 0.25rem 0 0; font-size: 1.1rem; }

    /* ── Admin nav ── */
    .admin-nav {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
        gap: 0.5rem;
    }
    .admin-nav a {
        display: block;
        text-align: center;
        padding: 0.6rem 0.9rem;
        border: 1px solid var(--border);
        border-radius: 8px;
        background: #fff;
        font-weight: 600;
        font-size: 0.9rem;
        text-decoration: none;
        color: var(--text);
        transition: border-color .12s ease, color .12s ease;
    }
    .admin-nav a:hover { border-color: var(--primary); color: var(--primary); }
    .admin-nav a.active { background: var(--primary); color: #fff; border-color: var(--primary); }

    /* ── Pagination ── */
    nav[aria-label] ul, nav[aria-label] .pagination { display: flex; gap: 0.4rem; list-style: none; padding: 0; margin: 0; align-items: center; flex-wrap: wrap; }
    nav[aria-label] a, nav[aria-label] span { display: inline-flex; align-items: center; justify-content: center; padding: 0.5rem 0.8rem; border-radius: 6px; text-decoration: none; font-weight: 600; min-width: 40px; font-size: 0.9rem; }
    nav[aria-label] a { background: #fff; border: 1px solid var(--border); color: var(--text); }
    nav[aria-label] a:hover { border-color: var(--primary); color: var(--primary); }
    nav[aria-label] .active span, nav[aria-label] span[aria-current] { background: var(--primary); color: #fff; border: 1px solid var(--primary); }
    @media (max-width: 540px) { nav[aria-label] a, nav[aria-label] span { padding: 0.45rem 0.6rem; font-size: 0.88rem; min-width: 36px; } }

    /* ── Arcade / Games theme helpers (preserved) ── */
    .arcade-tile { display: block; position: relative; width: 100%; border-radius: 12px; background-size: cover; background-position: center; background-repeat: no-repeat; background-color: #000; overflow: hidden; transition: transform .18s cubic-bezier(.2,.9,.2,1), box-shadow .18s cubic-bezier(.2,.9,.2,1); aspect-ratio: 16/9; align-self: start; }
    .arcade-tile::before { content: ""; display: block; padding-top: 56.25%; }
    .arcade-tile::after { content: ""; position: absolute; inset: 0; border-radius: 12px; pointer-events: none; transition: opacity .18s ease; opacity: 0; }
    .arcade-tile:focus-visible { outline: 2px solid rgba(0,209,255,0.9); outline-offset: 4px; transform: translateY(-4px) scale(1.01); }
    .arcade-tile:hover { transform: translateY(-6px) scale(1.02); box-shadow: 0 18px 60px rgba(2,6,23,0.6); }
    .arcade-tile:hover::after { opacity: 1; box-shadow: inset 0 10px 30px rgba(0,0,0,0.35), 0 0 28px rgba(0,209,255,0.22), 0 0 64px rgba(0,209,255,0.14); }
    .arcade-tile-overlay { position: absolute; inset: 0; display: flex; flex-direction: column; justify-content: flex-end; padding: 1rem; background: linear-gradient(180deg, rgba(0,0,0,0.06) 35%, rgba(0,0,0,0.42) 100%); color: #fff; transition: background .18s ease; }
    .arcade-tile:hover .arcade-tile-overlay { background: linear-gradient(180deg, rgba(0,0,0,0.12) 10%, rgba(0,0,0,0.6) 100%); }
    .arcade-tile-overlay h3 { margin: 0 0 0.35rem 0; font-size: 1.15rem; font-weight: 800; transition: transform .18s ease; }
    .arcade-tile:hover .arcade-tile-overlay h3 { transform: translateY(-4px); }
    .arcade-tile-overlay p { margin: 0 0 0.5rem 0; color: rgba(255,255,255,0.95); font-size: 0.9rem; transition: transform .18s ease; }
    .arcade-tile:hover .arcade-tile-overlay p { transform: translateY(-2px); }
    .arcade-tile .play-btn { display: inline-block; background: #00d1ff; color: #021122; padding: 0.5rem 0.65rem; border-radius: 8px; font-weight: 800; text-decoration: none; transition: transform .15s ease; }
    .arcade-tile:hover .play-btn { transform: translateY(-3px) scale(1.02); }
    .arcade-hero { background: linear-gradient(135deg,#0f172a 0%,#0b1020 40%,#24123b 100%); color: #fff; padding: 3rem 1rem; text-align: center; border-bottom: 6px solid var(--primary); }
    .arcade-hero h1 { font-family: ui-sans-serif, system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial; letter-spacing: 2px; font-weight: 800; font-size: 2.25rem; margin: 0.5rem 0; }
    .arcade-sub { color: rgba(255,214,232,0.95); margin-bottom: 1rem; }
    .arcade-grid { display: grid; grid-template-columns: repeat(auto-fit,minmax(220px,1fr)); gap: 1rem; padding: 1rem; }
    .arcade-card { background: linear-gradient(180deg,#0b1220,#071028); border: 2px solid rgba(255,59,129,0.08); padding: 1rem; border-radius: 8px; box-shadow: 0 6px 20px rgba(0,0,0,0.5); color: #e6f7ff; display: flex; flex-direction: column; height: 100%; }
    .arcade-card h3 { color: #fff; margin: 0 0 0.5rem 0; font-weight: 700; }
    .arcade-card .play-btn { margin-top: auto; }
    .arcade-badge { display: inline-block; padding: 0.25rem 0.5rem; background: var(--primary); color: #fff; border-radius: 4px; font-size: 0.8rem; font-weight: 700; }
    .play-btn { display: inline-block; margin-top: 0.75rem; background: var(--accent-cyan); color: #021122; padding: 0.5rem 0.75rem; border-radius: 6px; text-decoration: none; font-weight: 700; }
    .games-search-form { display: flex; gap: 0.5rem; align-items: center; max-width: 960px; margin: 0 auto; }
    .games-search-input { flex: 1; padding: 0.9rem 1rem; border-radius: 10px; border: 3px solid rgba(10,10,10,0.92); background: #fff; color: #0b1220; font-size: 1.05rem; box-shadow: none; }
    .games-search-input::placeholder { color: rgba(11,18,32,0.45); }
    .games-clear-btn { background: var(--primary); color: #fff; padding: 0.5rem 0.8rem; border-radius: 8px; text-decoration: none; font-weight: 800; border: 2px solid rgba(11,18,32,0.92); }
    @media (min-width: 768px) { .arcade-hero h1 { font-size: 3rem; } }

    /* ── Site Footer ── */
    .site-footer {
        background: #0f0c29;
        color: rgba(255,255,255,0.7);
        padding: 3.5rem 1.5rem 2rem;
        margin-top: auto;
    }
    .site-footer-inner {
        max-width: 1100px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 2.5rem;
    }
    .footer-brand .footer-logo {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 1.2rem;
        font-weight: 800;
        color: #fff;
        letter-spacing: -0.5px;
        margin-bottom: 0.6rem;
    }
    .footer-brand p { font-size: 0.87rem; color: rgba(255,255,255,0.5); line-height: 1.65; margin: 0; max-width: 230px; }
    .footer-col h4 { font-size: 0.76rem; font-weight: 700; color: rgba(255,255,255,0.9); text-transform: uppercase; letter-spacing: 1px; margin: 0 0 0.75rem 0; }
    .footer-col a { display: block; color: rgba(255,255,255,0.55); text-decoration: none; font-size: 0.87rem; line-height: 2.1; transition: color .12s ease; }
    .footer-col a:hover { color: #c4b5fd; }
    .footer-bottom {
        max-width: 1100px;
        margin: 2rem auto 0;
        padding-top: 1.5rem;
        border-top: 1px solid rgba(255,255,255,0.08);
        font-size: 0.81rem;
        color: rgba(255,255,255,0.3);
    }
    @media (max-width: 768px) {
        .site-footer-inner { grid-template-columns: 1fr 1fr; }
        .footer-brand { grid-column: 1 / -1; }
        .footer-brand p { max-width: 100%; }
    }
    @media (max-width: 480px) { .site-footer-inner { grid-template-columns: 1fr; } }
    </style>
    @stack('head')
</head>
<body>
    {{-- Hidden SVG gradient sprite — referenced by logo icons throughout the page --}}
    <svg xmlns="http://www.w3.org/2000/svg" style="display:none;" aria-hidden="true">
        <defs>
            <linearGradient id="apispi-grad" x1=".5" y1="0" x2=".5" y2="1">
                <stop offset="0%" stop-color="#FCD34D"/>
                <stop offset="100%" stop-color="#D97706"/>
            </linearGradient>
        </defs>
    </svg>
    <header class="site-header">
        <div class="site-header-inner">
            <a href="{{ route('home') }}" class="brand">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 27" aria-hidden="true" style="width:22px;height:25px;flex-shrink:0;">
                    <path d="M12,0.5 L13.4,3.3 L16,4.5 L13.4,5.7 L12,8.5 L10.6,5.7 L8,4.5 L10.6,3.3 Z" fill="url(#apispi-grad)"/>
                    <path d="M12,8.5 L24,26 L20,26 L15.5,18 L8.5,18 L4,26 L0,26 Z" fill="url(#apispi-grad)"/>
                </svg>
                {{ config('site.name') }}
            </a>
            <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="primary-nav">
                <span aria-hidden="true">☰</span> Menu
            </button>
            <div class="nav-links" id="primary-nav" data-open="false">
                <a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'nav-active' : '' }}">Home</a>
                @if(config('shop.enabled') && config('products.enabled'))
                    <a href="{{ url('/shop') }}" class="{{ request()->routeIs('shop') || request()->routeIs('shop.products.show') ? 'nav-active' : '' }}">Shop</a>
                @endif
                @if(config('apilab.enabled') && Route::has('api.lab'))
                    <a href="{{ route('api.lab') }}" class="{{ request()->routeIs('api.lab') ? 'nav-active' : '' }}">API Lab</a>
                @endif
                @if(config('agents.enabled') && Route::has('agents.index'))
                    <a href="{{ route('agents.index') }}" class="{{ request()->routeIs('agents.index') ? 'nav-active' : '' }}">Agents</a>
                @endif
                @if(config('games.enabled') && Route::has('games.index'))
                    <a href="{{ route('games.index') }}" class="{{ request()->routeIs('games.index') ? 'nav-active' : '' }}">Games</a>
                @endif
                @if(config('posts.enabled') && Route::has('posts.index'))
                    <a href="{{ route('posts.index') }}" class="{{ request()->routeIs('posts.index') || request()->routeIs('posts.show') ? 'nav-active' : '' }}">Blog</a>
                @endif
                @auth
                    <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'nav-active' : '' }}">Dashboard</a>
                    <a href="{{ route('profile.show') }}" class="{{ request()->routeIs('profile.show') ? 'nav-active' : '' }}">Profile</a>
                @else
                    <a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'nav-active' : '' }}">Login</a>
                    <a href="{{ route('register') }}" class="nav-cta{{ request()->routeIs('register') ? ' nav-active' : '' }}">Get Started</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @if (session('status') || $errors->any())
            <div class="page" style="padding-bottom:0;gap:0.75rem;">
                @if (session('status'))
                    <div class="banner success"><p class="status">{{ session('status') }}</p></div>
                @endif
                @if ($errors->any())
                    <div class="banner error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endif

        @hasSection('full-width')
            @yield('full-width')
        @else
            <div class="page">
                @yield('content')
            </div>
        @endif
    </main>

    <footer class="site-footer">
        <div class="site-footer-inner">
            <div class="footer-brand">
                <div class="footer-logo">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 27" aria-hidden="true" style="width:22px;height:25px;flex-shrink:0;">
                        <path d="M12,0.5 L13.4,3.3 L16,4.5 L13.4,5.7 L12,8.5 L10.6,5.7 L8,4.5 L10.6,3.3 Z" fill="url(#apispi-grad)"/>
                        <path d="M12,8.5 L24,26 L20,26 L15.5,18 L8.5,18 L4,26 L0,26 Z" fill="url(#apispi-grad)"/>
                    </svg>
                    {{ config('site.name') }}
                </div>
                <p>Intelligent agents built for real-world workflows. Deploy in minutes, scale with confidence.</p>
            </div>
            <div class="footer-col">
                <h4>Product</h4>
                @if(config('agents.enabled') && Route::has('agents.index'))
                    <a href="{{ route('agents.index') }}">Agents</a>
                @endif
                @if(config('shop.enabled'))
                    <a href="{{ url('/shop') }}">Shop</a>
                @endif
                @if(config('posts.enabled'))
                    <a href="{{ url('/posts') }}">Blog</a>
                @endif
                @if(config('apilab.enabled') && Route::has('api.lab'))
                    <a href="{{ route('api.lab') }}">API Lab</a>
                @endif
            </div>
            <div class="footer-col">
                <h4>Account</h4>
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                    <a href="{{ route('profile.show') }}">Profile</a>
                @else
                    <a href="{{ route('login') }}">Sign In</a>
                    <a href="{{ route('register') }}">Get Started</a>
                @endauth
            </div>
            <div class="footer-col">
                <h4>Connect</h4>
                <a href="https://linkedin.com" target="_blank" rel="noopener">LinkedIn</a>
                <a href="https://twitter.com" target="_blank" rel="noopener">Twitter / X</a>
                <a href="mailto:hello@apispi.com">Contact</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} {{ config('site.name') }}. All rights reserved.</p>
        </div>
    </footer>

    <script>
    (function () {
        const toggle = document.querySelector('.nav-toggle');
        const links = document.getElementById('primary-nav');
        if (!toggle || !links) return;
        toggle.addEventListener('click', () => {
            const open = links.dataset.open === 'true';
            links.dataset.open = open ? 'false' : 'true';
            toggle.setAttribute('aria-expanded', open ? 'false' : 'true');
        });
    })();
    </script>
    <script>
    (function () {
        try {
            const logoutSelector = 'form[action="' + '{{ route('logout') }}' + '"]';
            const logoutForms = document.querySelectorAll(logoutSelector);
            if (!logoutForms || !logoutForms.length) return;
            logoutForms.forEach(f => f.addEventListener('submit', () => {
                try { localStorage.removeItem('miniciv_state_v1'); } catch (e) {}
            }));
        } catch (e) {}
    })();
    </script>
    @if(session('miniciv_restore'))
    <script>
    (function () {
        try {
            const state = JSON.stringify(@json(session('miniciv_restore')));
            if (state) {
                try { localStorage.setItem('miniciv_state_v1', state); } catch (e) {}
            }
        } catch (e) {}
    })();
    </script>
    @endif
    <script>
    (function () {
        document.addEventListener('click', function (e) {
            const btn = e.target.closest && e.target.closest('[data-action="restore"]');
            if (!btn) return;
            try {
                const data = btn.getAttribute('data-state');
                if (!data) return;
                localStorage.setItem('miniciv_state_v1', data);
                window.location = '{{ route('miniciv.play') }}';
            } catch (err) {
                console.error('restore error', err);
            }
        });
    })();
    </script>
    @stack('scripts')
</body>
</html>
