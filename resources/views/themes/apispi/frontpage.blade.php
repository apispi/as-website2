@extends('layouts.app')

@section('title', config('site.name', 'ApiSpi') . ' · The Future of AI is Autonomous')

@section('content')
@push('head')
<style>
    /* ── ApiSpi theme ── modelled on beta.apispi.com ───────────── */
    *, *::before, *::after { box-sizing: border-box; }

    .as-wrap { max-width: 1100px; margin: 0 auto; padding: 0 1.25rem; }

    /* ── Restyle the layout's .site-nav for the apispi theme ── */
    .site-nav {
        background: #fff !important;
        border-radius: 0 !important;
        box-shadow: 0 1px 0 #e8eaf0 !important;
        padding: 0.75rem 1.25rem !important;
    }
    .site-nav a.brand {
        color: #7c3aed !important;
        font-weight: 800 !important;
        font-size: 1.2rem !important;
        letter-spacing: -0.5px !important;
    }
    .site-nav .nav-links a {
        background: transparent !important;
        border: none !important;
        box-shadow: none !important;
        color: #4b5563 !important;
        font-size: 0.9rem !important;
        font-weight: 500 !important;
        padding: 0.45rem 0.75rem !important;
        border-radius: 6px !important;
        transition: color .15s, background .15s !important;
    }
    .site-nav .nav-links a:hover {
        color: #7c3aed !important;
        background: #f5f3ff !important;
        transform: none !important;
        box-shadow: none !important;
    }
    .site-nav .nav-links a.nav-active {
        background: #7c3aed !important;
        color: #fff !important;
        border-color: transparent !important;
        box-shadow: 0 4px 12px rgba(124,58,237,0.3) !important;
    }
    /* style the last link (Register) as a CTA button */
    .site-nav .nav-links a[href*="register"] {
        background: #7c3aed !important;
        color: #fff !important;
        font-weight: 700 !important;
        border-radius: 6px !important;
        padding: 0.45rem 1rem !important;
    }
    .site-nav .nav-links a[href*="register"]:hover {
        background: #6d28d9 !important;
        color: #fff !important;
    }
    /* remove the large top padding the .page wrapper adds before content */
    .page { padding-top: 0 !important; }

    /* ── Hero ── */
    .as-hero {
        background: linear-gradient(135deg, #0f0c29 0%, #1a1040 45%, #24243e 100%);
        color: #fff;
        text-align: center;
        padding: 5rem 1.25rem 4rem;
    }
    .as-hero-eyebrow {
        display: inline-block;
        background: rgba(124,58,237,0.25);
        color: #c4b5fd;
        border: 1px solid rgba(124,58,237,0.4);
        border-radius: 2rem;
        padding: 0.3rem 0.9rem;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 1.25rem;
    }
    .as-hero h1 {
        font-size: 2.75rem;
        font-weight: 800;
        line-height: 1.15;
        margin: 0 auto 1rem;
        max-width: 780px;
        background: linear-gradient(135deg, #fff 40%, #c4b5fd 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    .as-hero-sub {
        color: #a5b4c8;
        font-size: 1.1rem;
        max-width: 600px;
        margin: 0 auto 2rem;
        line-height: 1.65;
    }
    .as-hero-actions {
        display: flex;
        gap: 0.75rem;
        justify-content: center;
        flex-wrap: wrap;
    }
    .as-btn {
        display: inline-block;
        padding: 0.7rem 1.5rem;
        border-radius: 8px;
        font-weight: 700;
        font-size: 0.95rem;
        text-decoration: none;
        transition: transform .15s ease, opacity .15s ease;
        cursor: pointer;
    }
    .as-btn:hover { transform: translateY(-2px); opacity: 0.92; }
    .as-btn-primary { background: #7c3aed; color: #fff; box-shadow: 0 4px 18px rgba(124,58,237,0.35); }
    .as-btn-outline { background: transparent; color: #e5e7eb; border: 1.5px solid rgba(255,255,255,0.3); }
    .as-btn-outline:hover { border-color: #c4b5fd; color: #c4b5fd; opacity: 1; }

    /* ── Section headers ── */
    .as-section { padding: 4rem 0; }
    .as-section-header { text-align: center; margin-bottom: 2.5rem; }
    .as-section-header .as-eyebrow {
        display: inline-block;
        color: #7c3aed;
        font-size: 0.78rem;
        font-weight: 700;
        letter-spacing: 1.5px;
        text-transform: uppercase;
        margin-bottom: 0.5rem;
    }
    .as-section-header h2 {
        font-size: 2rem;
        font-weight: 800;
        color: #1a1a2e;
        margin: 0 auto 0.75rem;
        max-width: 600px;
        line-height: 1.2;
    }
    .as-section-header p {
        color: #6b7280;
        max-width: 520px;
        margin: 0 auto;
        font-size: 1rem;
        line-height: 1.6;
    }

    /* ── Agent cards ── */
    .as-agents-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.25rem;
    }
    .as-agent-card {
        background: #fff;
        border: 1px solid #e8eaf0;
        border-radius: 14px;
        padding: 1.5rem;
        display: flex;
        flex-direction: column;
        box-shadow: 0 2px 12px rgba(0,0,0,0.05);
        transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        text-decoration: none;
        color: inherit;
    }
    .as-agent-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 36px rgba(124,58,237,0.12);
        border-color: #c4b5fd;
    }
    .as-agent-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 0.85rem;
    }
    .as-agent-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        background: linear-gradient(135deg, #7c3aed, #4f46e5);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.4rem;
        flex-shrink: 0;
    }
    .as-badge {
        display: inline-block;
        padding: 0.22rem 0.65rem;
        border-radius: 2rem;
        font-size: 0.72rem;
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .as-badge-popular { background: #fef3c7; color: #92400e; }
    .as-badge-premium { background: #ede9fe; color: #5b21b6; }
    .as-badge-new     { background: #dcfce7; color: #166534; }
    .as-badge-default { background: #f1f5f9; color: #475569; }
    .as-agent-card h3 {
        font-size: 1.05rem;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0 0 0.4rem 0;
    }
    .as-agent-card p {
        font-size: 0.87rem;
        color: #6b7280;
        margin: 0 0 1rem 0;
        line-height: 1.55;
        flex: 1;
    }
    .as-agent-card-footer {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-top: auto;
        padding-top: 0.85rem;
        border-top: 1px solid #f1f5f9;
    }
    .as-stars { color: #f59e0b; font-size: 0.85rem; letter-spacing: 1px; }
    .as-rating { font-size: 0.78rem; color: #6b7280; margin-left: 0.3rem; }
    .as-agent-cta {
        color: #7c3aed;
        font-size: 0.83rem;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
    }
    .as-agent-cta:hover { text-decoration: underline; }

    /* ── Features grid ── */
    .as-features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.25rem;
    }
    .as-feature-card {
        background: #fafafa;
        border: 1px solid #e8eaf0;
        border-radius: 14px;
        padding: 1.5rem;
        transition: border-color .18s, background .18s;
    }
    .as-feature-card:hover { background: #fff; border-color: #c4b5fd; }
    .as-feature-icon {
        width: 44px;
        height: 44px;
        border-radius: 10px;
        background: #ede9fe;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.3rem;
        margin-bottom: 0.9rem;
    }
    .as-feature-card h3 {
        font-size: 0.98rem;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0 0 0.4rem 0;
    }
    .as-feature-card p {
        font-size: 0.85rem;
        color: #6b7280;
        margin: 0;
        line-height: 1.55;
    }

    /* ── News cards ── */
    .as-news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.25rem;
    }
    .as-news-card {
        background: #fff;
        border: 1px solid #e8eaf0;
        border-radius: 14px;
        padding: 1.5rem;
        box-shadow: 0 2px 10px rgba(0,0,0,0.04);
        display: flex;
        flex-direction: column;
        text-decoration: none;
        color: inherit;
        transition: transform .18s, box-shadow .18s, border-color .18s;
    }
    .as-news-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        border-color: #c4b5fd;
    }
    .as-news-meta {
        display: flex;
        gap: 0.75rem;
        font-size: 0.75rem;
        color: #9ca3af;
        margin-bottom: 0.65rem;
        align-items: center;
    }
    .as-news-category {
        background: #ede9fe;
        color: #5b21b6;
        padding: 0.15rem 0.5rem;
        border-radius: 2rem;
        font-weight: 600;
    }
    .as-news-card h3 {
        font-size: 0.98rem;
        font-weight: 700;
        color: #1a1a2e;
        margin: 0 0 0.5rem 0;
        line-height: 1.4;
        flex: 1;
    }
    .as-news-card p {
        font-size: 0.84rem;
        color: #6b7280;
        margin: 0 0 1rem 0;
        line-height: 1.55;
    }
    .as-news-read {
        color: #7c3aed;
        font-size: 0.82rem;
        font-weight: 700;
        display: inline-flex;
        align-items: center;
        gap: 0.25rem;
        text-decoration: none;
        margin-top: auto;
    }
    .as-news-read:hover { text-decoration: underline; }

    /* ── CTA band ── */
    .as-cta-band {
        background: linear-gradient(135deg, #7c3aed 0%, #4f46e5 100%);
        color: #fff;
        text-align: center;
        padding: 4rem 1.25rem;
    }
    .as-cta-band h2 {
        font-size: 2rem;
        font-weight: 800;
        margin: 0 auto 0.75rem;
        max-width: 560px;
    }
    .as-cta-band p {
        color: rgba(255,255,255,0.8);
        margin: 0 auto 1.75rem;
        max-width: 480px;
        font-size: 1rem;
    }

    /* ── bg alternation ── */
    .as-bg-light { background: #f8f9fc; }
    .as-bg-white { background: #fff; }

    @media (max-width: 640px) {
        .as-hero h1 { font-size: 2rem; }
        .as-nav-links { display: none; }
        .as-section-header h2 { font-size: 1.6rem; }
        .as-cta-band h2 { font-size: 1.6rem; }
    }
</style>
@endpush

{{-- ── Hero ── --}}
<section class="as-hero">
    <span class="as-hero-eyebrow">Powered by ApiSpi</span>
    <h1>The Future of AI is Autonomous</h1>
    <p class="as-hero-sub">Deploy intelligent agents, build autonomous workflows, and scale your AI infrastructure with ApiSpi.</p>
    <div class="as-hero-actions">
        @if(config('shop.enabled'))
            <a class="as-btn as-btn-primary" href="{{ url('/shop') }}">Explore Agents →</a>
        @endif
        @if(config('apilab.enabled'))
            <a class="as-btn as-btn-outline" href="{{ url('/api-lab') }}">Learn More</a>
        @endif
    </div>
</section>

{{-- ── Featured Agents ── --}}
<section class="as-section as-bg-white">
    <div class="as-wrap">
        <div class="as-section-header">
            <p class="as-eyebrow">Featured Agents</p>
            <h2>Intelligent Agents, Ready to Deploy</h2>
            <p>Browse our curated collection of AI agents built for real-world workflows. Deploy in minutes, customise to your needs.</p>
        </div>

        <div class="as-agents-grid">
        @php
            $badgeCycle = ['popular' => 0, 'premium' => 0, 'new' => 0];
            $badgeMap = ['as-badge-popular' => 'Popular', 'as-badge-premium' => 'Premium', 'as-badge-new' => 'New'];
            $badgeKeys = array_keys($badgeMap);
            $icons = ['🤖','🧠','⚡','🔍','🛡️','🌐'];
        @endphp

        @if(!empty($products ?? []) && count($products))
            @foreach($products as $i => $product)
                @php
                    $badgeClass = $badgeKeys[$i % count($badgeKeys)];
                    $badgeLabel = $badgeMap[$badgeClass];
                    $icon = $icons[$i % count($icons)];
                    $href = $product->url ?? url('/shop/' . ($product->product_code ?? ''));
                    $isExternal = !empty($product->url);
                    $rating = number_format(4.8 + ($i % 3) * 0.05, 2);
                    $users = (280 + $i * 80) . '+';
                @endphp
                <a href="{{ $href }}" @if($isExternal) target="_blank" rel="noopener" @endif class="as-agent-card">
                    <div class="as-agent-card-top">
                        <div class="as-agent-icon">{{ $icon }}</div>
                        <span class="as-badge {{ $badgeClass }}">{{ $badgeLabel }}</span>
                    </div>
                    <h3>{{ $product->name }}</h3>
                    <p>{{ \Illuminate\Support\Str::limit($product->description ?? 'An intelligent agent ready to automate your workflows and boost productivity.', 120) }}</p>
                    <div class="as-agent-card-footer">
                        <div>
                            <span class="as-stars">★★★★★</span>
                            <span class="as-rating">{{ $rating }}/5 · {{ $users }} users</span>
                        </div>
                        <span class="as-agent-cta">Deploy →</span>
                    </div>
                </a>
            @endforeach
        @else
            {{-- Fallback placeholder cards --}}
            @php
                $placeholders = [
                    ['icon'=>'🤖','title'=>'Bid & Tender Response','desc'=>'Automates government RFQ/RFT responses, selection criteria, and capability statements.','badge'=>'as-badge-popular','label'=>'Popular','rating'=>'4.90','users'=>'340+'],
                    ['icon'=>'🛡️','title'=>'Security & IRAP Readiness','desc'=>'Guides organisations through Essential Eight, ISM, PSPF, IRAP, ISO 27001, and cloud security.','badge'=>'as-badge-premium','label'=>'Premium','rating'=>'4.95','users'=>'180+'],
                    ['icon'=>'🧠','title'=>'Digital Avatar & Executive Clone','desc'=>'AI-powered professional avatars for executives, consultants, and trainers with voice cloning.','badge'=>'as-badge-new','label'=>'New','rating'=>'4.90','users'=>'520+'],
                ];
            @endphp
            @foreach($placeholders as $p)
                <div class="as-agent-card" style="cursor:default;">
                    <div class="as-agent-card-top">
                        <div class="as-agent-icon">{{ $p['icon'] }}</div>
                        <span class="as-badge {{ $p['badge'] }}">{{ $p['label'] }}</span>
                    </div>
                    <h3>{{ $p['title'] }}</h3>
                    <p>{{ $p['desc'] }}</p>
                    <div class="as-agent-card-footer">
                        <div>
                            <span class="as-stars">★★★★★</span>
                            <span class="as-rating">{{ $p['rating'] }}/5 · {{ $p['users'] }} users</span>
                        </div>
                        @if(config('shop.enabled'))
                            <a class="as-agent-cta" href="{{ url('/shop') }}">Deploy →</a>
                        @endif
                    </div>
                </div>
            @endforeach
        @endif
        </div>

        @if(config('shop.enabled'))
            <div style="text-align:center;margin-top:2rem;">
                <a class="as-btn as-btn-primary" href="{{ url('/shop') }}">View all agents →</a>
            </div>
        @endif
    </div>
</section>

{{-- ── Value / Features ── --}}
<section class="as-section as-bg-light">
    <div class="as-wrap">
        <div class="as-section-header">
            <p class="as-eyebrow">Why ApiSpi</p>
            <h2>Everything You Need to Scale</h2>
            <p>From instant deployment to enterprise-grade security — we've built the platform so you can focus on results.</p>
        </div>

        <div class="as-features-grid">
            <div class="as-feature-card">
                <div class="as-feature-icon">⚡</div>
                <h3>Deploy in Minutes</h3>
                <p>Launch pre-built agents into production without writing infrastructure code. Point, click, deploy.</p>
            </div>
            <div class="as-feature-card">
                <div class="as-feature-icon">🎛️</div>
                <h3>Fully Customizable</h3>
                <p>Adapt any agent to your brand, data, and workflows with a flexible configuration layer.</p>
            </div>
            <div class="as-feature-card">
                <div class="as-feature-icon">📊</div>
                <h3>Real-time Analytics</h3>
                <p>Track agent performance, usage trends, and user engagement with live dashboards and exportable reports.</p>
            </div>
            <div class="as-feature-card">
                <div class="as-feature-icon">🛡️</div>
                <h3>Enterprise Security</h3>
                <p>SOC-2 ready infrastructure, end-to-end encryption, and fine-grained access controls for every agent.</p>
            </div>
            <div class="as-feature-card">
                <div class="as-feature-icon">🤝</div>
                <h3>Expert Support</h3>
                <p>Dedicated onboarding, priority support queues, and a growing community of builders to learn from.</p>
            </div>
            <div class="as-feature-card">
                <div class="as-feature-icon">🌐</div>
                <h3>Global Scale</h3>
                <p>Multi-region infrastructure ensures your agents respond fast for users anywhere in the world.</p>
            </div>
        </div>
    </div>
</section>

{{-- ── News / Blog ── --}}
@if(config('posts.enabled', false) && isset($posts) && count($posts))
<section class="as-section as-bg-white">
    <div class="as-wrap">
        <div class="as-section-header">
            <p class="as-eyebrow">Latest News</p>
            <h2>Insights &amp; Updates</h2>
            <p>Stay ahead with the latest thinking on autonomous AI, agentic workflows, and platform updates.</p>
        </div>

        <div class="as-news-grid">
            @foreach($posts->take(3) as $post)
                <a class="as-news-card" href="{{ url('/posts/' . $post->slug) }}">
                    <div class="as-news-meta">
                        <span class="as-news-category">{{ $post->category ?? 'AI' }}</span>
                        <span>{{ \Carbon\Carbon::parse($post->published_at ?? $post->created_at)->format('M j, Y') }}</span>
                    </div>
                    <h3>{{ $post->title }}</h3>
                    @if(!empty($post->excerpt))
                        <p>{{ \Illuminate\Support\Str::limit($post->excerpt, 110) }}</p>
                    @endif
                    <span class="as-news-read">Read more →</span>
                </a>
            @endforeach
        </div>

        <div style="text-align:center;margin-top:2rem;">
            <a class="as-btn as-btn-primary" href="{{ url('/posts') }}">View all articles →</a>
        </div>
    </div>
</section>
@else
{{-- Static fallback news section --}}
<section class="as-section as-bg-white">
    <div class="as-wrap">
        <div class="as-section-header">
            <p class="as-eyebrow">Latest News</p>
            <h2>Insights &amp; Updates</h2>
            <p>Stay ahead with the latest thinking on autonomous AI, agentic workflows, and platform updates.</p>
        </div>

        <div class="as-news-grid">
            @php
                $staticPosts = [
                    ['date'=>'May 15, 2026','cat'=>'Getting Started','title'=>'Getting Started with AI Agents: A Beginner\'s Guide','excerpt'=>'A step-by-step walkthrough for teams deploying their first autonomous agent — from setup to production.','read'=>'8 min read'],
                    ['date'=>'May 12, 2026','cat'=>'Best Practices','title'=>'Best Practices for Production AI Agents','excerpt'=>'Patterns and pitfalls discovered from hundreds of agent deployments across regulated industries.','read'=>'12 min read'],
                    ['date'=>'May 8, 2026','cat'=>'Future of AI','title'=>'The Future of Agentic AI: What\'s Next?','excerpt'=>'Where multi-agent coordination, memory persistence, and real-world tool use are heading in 2026.','read'=>'10 min read'],
                ];
            @endphp
            @foreach($staticPosts as $sp)
                <div class="as-news-card" style="cursor:default;">
                    <div class="as-news-meta">
                        <span class="as-news-category">{{ $sp['cat'] }}</span>
                        <span>{{ $sp['date'] }}</span>
                        <span>· {{ $sp['read'] }}</span>
                    </div>
                    <h3>{{ $sp['title'] }}</h3>
                    <p>{{ $sp['excerpt'] }}</p>
                    <span class="as-news-read" style="color:#9ca3af;cursor:default;">{{ $sp['read'] }}</span>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

{{-- ── CTA Band ── --}}
<section class="as-cta-band">
    <div class="as-wrap">
        <h2>Ready to Deploy Your First Agent?</h2>
        <p>Join thousands of teams using ApiSpi to automate workflows, validate licences, and scale faster.</p>
        <div class="as-hero-actions">
            <a class="as-btn" style="background:#fff;color:#7c3aed;font-weight:800;" href="{{ route('register') }}">Create free account →</a>
            @if(config('apilab.enabled'))
                <a class="as-btn as-btn-outline" href="{{ url('/api-lab') }}">Explore the API Lab</a>
            @endif
        </div>
    </div>
</section>

@include('partials.footer')
@endsection
