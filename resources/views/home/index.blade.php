<x-layout>
<x-slot name="title">Online Siksha — Smart Exam Management for Nepali Schools</x-slot>

<x-slot name="styles">
<style>
/* ── ANNOUNCEMENT BAR ── */
.os-announce {
    background: var(--blue-light);
    border-bottom: 1px solid var(--border);
    padding: 0.55rem 5%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 0.75rem;
    flex-wrap: wrap;
}
.os-ann-badge {
    background: var(--blue);
    color: #fff;
    font-size: 0.68rem;
    font-weight: 700;
    padding: 0.18rem 0.6rem;
    border-radius: 999px;
    letter-spacing: 0.5px;
    font-family: 'Sora', sans-serif;
}
.os-ann-text { font-size: 0.82rem; color: var(--muted); }
.os-ann-link { font-size: 0.82rem; color: var(--blue); font-weight: 600; text-decoration: none; }

/* ── HERO ── */
.os-hero {
    padding: 5.5rem 5% 4.5rem;
    background: linear-gradient(170deg, var(--blue-ll) 0%, var(--white) 55%);
    overflow: hidden;
    position: relative;
}
.os-hero::before {
    content: '';
    position: absolute;
    top: -180px; left: 50%;
    transform: translateX(-50%);
    width: 900px; height: 560px;
    background: radial-gradient(circle, rgba(26,86,219,0.10) 0%, transparent 65%);
    pointer-events: none;
}
.os-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(26,86,219,0.06) 1px, transparent 1px);
    background-size: 22px 22px;
    -webkit-mask-image: radial-gradient(ellipse 700px 420px at 50% 15%, #000 0%, transparent 75%);
    mask-image: radial-gradient(ellipse 700px 420px at 50% 15%, #000 0%, transparent 75%);
    pointer-events: none;
}
.os-hero-inner {
    max-width: 720px;
    margin: 0 auto;
    text-align: center;
    position: relative;
    z-index: 1;
}
.os-hero-inner .os-hero-desc {
    margin-left: auto;
    margin-right: auto;
}
.os-hero-btns {
    justify-content: center;
}
.os-trust {
    justify-content: center;
}
.os-hero-pill {
    display: inline-flex;
    align-items: center;
    gap: 7px;
    background: var(--white);
    border: 1px solid var(--border);
    color: var(--blue);
    font-size: 0.78rem;
    font-weight: 700;
    padding: 0.32rem 0.8rem;
    border-radius: 999px;
    margin-bottom: 1.75rem;
    font-family: 'Sora', sans-serif;
}
.os-pill-dot {
    width: 7px; height: 7px;
    background: var(--blue);
    border-radius: 50%;
}
.os-hero h1 {
    font-family: 'Sora', sans-serif;
    font-size: 3.4rem;
    font-weight: 900;
    line-height: 1.1;
    letter-spacing: -2px;
    margin-bottom: 1.4rem;
}
.os-hero h1 em { font-style: normal; color: var(--blue); }
.os-hero-desc {
    font-size: 1.05rem;
    color: var(--muted);
    line-height: 1.8;
    margin-bottom: 2.25rem;
    max-width: 490px;
}
.os-hero-btns {
    display: flex;
    gap: 0.875rem;
    align-items: center;
    margin-bottom: 2.75rem;
    flex-wrap: wrap;
}
.os-btn-main {
    padding: 0.85rem 1.9rem;
    background: var(--blue);
    color: #fff;
    border-radius: 12px;
    text-decoration: none;
    font-size: 0.975rem;
    font-weight: 700;
    font-family: 'Sora', sans-serif;
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 7px;
}
.os-btn-main:hover { background: var(--blue-dark); transform: translateY(-1px); color: #fff; }
.os-btn-outline {
    padding: 0.85rem 1.6rem;
    background: var(--white);
    color: var(--text);
    border-radius: 12px;
    text-decoration: none;
    font-size: 0.975rem;
    font-weight: 600;
    border: 1.5px solid var(--border);
    transition: all 0.2s;
    display: inline-flex;
    align-items: center;
    gap: 7px;
}
.os-btn-outline:hover { border-color: var(--blue); color: var(--blue); }
.os-trust { display: flex; align-items: center; gap: 12px; }
.os-avatars { display: flex; }
.os-av {
    width: 32px; height: 32px;
    border-radius: 50%;
    border: 2px solid #fff;
    background: var(--blue-light);
    display: flex; align-items: center; justify-content: center;
    font-size: 0.65rem; font-weight: 700;
    color: var(--blue);
    margin-left: -9px;
    font-family: 'Sora', sans-serif;
}
.os-av:first-child { margin-left: 0; }
.os-trust-text { font-size: 0.8rem; color: var(--muted); line-height: 1.4; }
.os-trust-text strong { color: var(--text); font-weight: 600; }

/* ── STATS ── */
.os-stats {
    padding: 3.5rem 5%;
    max-width: 1180px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 1.25rem;
}
.os-stat {
    text-align: center; padding: 1.5rem;
    background: var(--white);
    border: 1px solid var(--border-l);
    border-radius: 15px;
    transition: all 0.2s;
}
.os-stat:hover { border-color: var(--border); box-shadow: 0 8px 24px rgba(26,86,219,0.06); transform: translateY(-2px); }
.os-stat-num { font-family: 'Sora', sans-serif; font-size: 2rem; font-weight: 900; color: var(--blue); letter-spacing: -1px; }
.os-stat-desc { font-size: 0.8rem; color: var(--muted); margin-top: 3px; font-weight: 500; }

/* ── SECTION COMMON ── */
.os-section { padding: 5rem 5%; max-width: 1180px; margin: 0 auto; }
.os-section-bg { padding: 5rem 5%; background: var(--surface); border-top: 1px solid var(--border-l); }
.os-section-bg-inner { max-width: 1180px; margin: 0 auto; }
.os-sec-eye { display: flex; align-items: center; justify-content: center; gap: 8px; margin-bottom: 0.75rem; }
.os-eye-line { width: 22px; height: 1.5px; background: var(--blue); border-radius: 1px; }
.os-eye-text { font-size: 0.72rem; font-weight: 700; color: var(--blue); letter-spacing: 2px; text-transform: uppercase; }
.os-sec-h { font-family: 'Sora', sans-serif; font-size: 2.3rem; font-weight: 900; letter-spacing: -1.2px; text-align: center; margin-bottom: 0.875rem; line-height: 1.15; }
.os-sec-p { text-align: center; color: var(--muted); font-size: 0.975rem; line-height: 1.75; max-width: 460px; margin: 0 auto 3.25rem; }

/* ── FEATURES ── */
.os-feat-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.1rem; }
.os-fc {
    background: var(--white);
    border: 1px solid var(--border-l);
    border-radius: 16px;
    padding: 1.6rem;
    transition: all 0.22s;
    position: relative; overflow: hidden;
}
.os-fc::after {
    content: '';
    position: absolute; top: 0; left: 0; right: 0;
    height: 2.5px;
    background: var(--blue);
    border-radius: 16px 16px 0 0;
    opacity: 0; transition: opacity 0.2s;
}
.os-fc:hover { border-color: var(--border); transform: translateY(-2px); box-shadow: 0 12px 28px rgba(26,86,219,0.07); }
.os-fc:hover::after { opacity: 1; }
.os-fi {
    width: 46px; height: 46px;
    background: var(--blue-light);
    border-radius: 12px;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 1.1rem;
}
.os-fi svg { width: 21px; height: 21px; stroke: var(--blue); fill: none; stroke-width: 1.8; stroke-linecap: round; stroke-linejoin: round; }
.os-fc h3 { font-family: 'Sora', sans-serif; font-size: 0.975rem; font-weight: 700; color: var(--text); margin-bottom: 0.45rem; }
.os-fc p { font-size: 0.855rem; color: var(--muted); line-height: 1.68; }
.os-fc-tag { display: inline-block; margin-top: 0.8rem; font-size: 0.7rem; font-weight: 700; color: var(--blue); }

/* ── HOW IT WORKS ── */
.os-steps { display: grid; grid-template-columns: repeat(3,1fr); gap: 2rem; margin-top: 3.25rem; position: relative; }
.os-steps::before { content: ''; position: absolute; top: 27px; left: calc(16.67% + 16px); right: calc(16.67% + 16px); height: 1px; border-top: 1.5px dashed var(--border); }
.os-step { display: flex; flex-direction: column; align-items: center; text-align: center; }
.os-step-num {
    width: 54px; height: 54px;
    border-radius: 50%;
    background: var(--blue); color: #fff;
    font-family: 'Sora', sans-serif;
    font-size: 1.1rem; font-weight: 800;
    display: flex; align-items: center; justify-content: center;
    margin-bottom: 1.2rem;
    position: relative; z-index: 1; flex-shrink: 0;
}
.os-step-num::after { content: ''; position: absolute; inset: -5px; border-radius: 50%; border: 1.5px dashed rgba(26,86,219,0.25); }
.os-step h3 { font-family: 'Sora', sans-serif; font-size: 1rem; font-weight: 700; color: var(--text); margin-bottom: 0.45rem; }
.os-step p { font-size: 0.855rem; color: var(--muted); line-height: 1.68; max-width: 210px; }

/* ── ROLES ── */
.os-roles-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.1rem; margin-top: 3.25rem; }
.os-rc { border-radius: 18px; padding: 1.875rem; overflow: hidden; transition: transform 0.2s, box-shadow 0.2s; }
.os-rc:hover { transform: translateY(-2px); box-shadow: 0 12px 28px rgba(11,45,122,0.1); }
.os-rc-admin { background: #0b2d7a; }
.os-rc-teacher { background: var(--blue-light); border: 1px solid var(--border); }
.os-rc-student { background: #ecfdf5; border: 1px solid #a7f3d0; }
.os-ri { width: 42px; height: 42px; border-radius: 11px; display: flex; align-items: center; justify-content: center; margin-bottom: 1.2rem; }
.os-rc-admin .os-ri { background: rgba(255,255,255,0.1); }
.os-rc-teacher .os-ri { background: rgba(26,86,219,0.1); }
.os-rc-student .os-ri { background: rgba(5,150,105,0.1); }
.os-ri svg { width: 19px; height: 19px; fill: none; stroke-width: 2; stroke-linecap: round; stroke-linejoin: round; }
.os-rc-admin .os-ri svg { stroke: #93c5fd; }
.os-rc-teacher .os-ri svg { stroke: var(--blue); }
.os-rc-student .os-ri svg { stroke: #059669; }
.os-r-tag { font-size: 0.68rem; font-weight: 800; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 0.4rem; }
.os-rc-admin .os-r-tag { color: rgba(255,255,255,0.35); }
.os-rc-teacher .os-r-tag { color: var(--blue); opacity: 0.65; }
.os-rc-student .os-r-tag { color: #059669; opacity: 0.65; }
.os-rc h3 { font-family: 'Sora', sans-serif; font-size: 1.2rem; font-weight: 800; margin-bottom: 0.9rem; }
.os-rc-admin h3 { color: #fff; }
.os-rc-teacher h3 { color: var(--text); }
.os-rc-student h3 { color: #064e3b; }
.os-r-list { list-style: none; display: flex; flex-direction: column; gap: 0.55rem; }
.os-r-list li { font-size: 0.835rem; display: flex; align-items: flex-start; gap: 7px; line-height: 1.45; }
.os-rc-admin .os-r-list li { color: rgba(255,255,255,0.65); }
.os-rc-teacher .os-r-list li { color: var(--muted); }
.os-rc-student .os-r-list li { color: #065f46; }
.os-chk { width: 17px; height: 17px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; flex-shrink: 0; margin-top: 1px; font-size: 0.6rem; font-weight: 700; }
.os-rc-admin .os-chk { background: rgba(59,130,246,0.22); color: #93c5fd; }
.os-rc-teacher .os-chk { background: #bfdbfe; color: var(--blue); }
.os-rc-student .os-chk { background: #a7f3d0; color: #065f46; }

/* ── TESTIMONIALS ── */
.os-test-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 1.1rem; margin-top: 3.25rem; }
.os-tc { background: var(--white); border: 1px solid var(--border-l); border-radius: 16px; padding: 1.5rem; transition: all 0.2s; }
.os-tc:hover { border-color: var(--border); box-shadow: 0 12px 28px rgba(26,86,219,0.06); transform: translateY(-2px); }
.os-stars { display: flex; gap: 3px; margin-bottom: 1rem; }
.os-star { width: 14px; height: 14px; background: var(--blue); clip-path: polygon(50% 0%,61% 35%,98% 35%,68% 57%,79% 91%,50% 70%,21% 91%,32% 57%,2% 35%,39% 35%); opacity: 0.85; }
.os-tc p { font-size: 0.875rem; color: var(--muted); line-height: 1.7; margin-bottom: 1.25rem; font-style: italic; }
.os-tc-author { display: flex; align-items: center; gap: 10px; }
.os-tav { width: 36px; height: 36px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-size: 0.7rem; font-weight: 700; font-family: 'Sora', sans-serif; flex-shrink: 0; }
.os-tav-b { background: var(--blue-light); color: var(--blue); }
.os-tav-g { background: #ecfdf5; color: #059669; }
.os-tav-a { background: #fffbeb; color: #d97706; }
.os-tc-name { font-size: 0.845rem; font-weight: 600; color: var(--text); }
.os-tc-role { font-size: 0.75rem; color: var(--subtle); }

/* ── PRICING ── */
.os-pr-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 1.1rem; max-width: 760px; margin: 3.25rem auto 0; }
.os-pc { background: var(--white); border: 1px solid var(--border); border-radius: 18px; padding: 1.875rem; position: relative; transition: all 0.2s; }
.os-pc:hover { transform: translateY(-2px); box-shadow: 0 12px 28px rgba(26,86,219,0.07); }
.os-pc.best { border-color: var(--blue); border-width: 2px; background: var(--blue-ll); }
.os-pc-badge { position: absolute; top: -12px; left: 50%; transform: translateX(-50%); background: var(--blue); color: #fff; font-size: 0.68rem; font-weight: 700; padding: 0.22rem 0.875rem; border-radius: 999px; white-space: nowrap; font-family: 'Sora', sans-serif; }
.os-pc-name { font-family: 'Sora', sans-serif; font-size: 0.95rem; font-weight: 700; color: var(--text); margin-bottom: 0.25rem; }
.os-pc-price { font-family: 'Sora', sans-serif; font-size: 2rem; font-weight: 900; color: var(--blue); letter-spacing: -1px; margin-bottom: 0.25rem; }
.os-pc-price span { font-size: 0.82rem; color: var(--muted); font-weight: 400; }
.os-pc-desc { font-size: 0.8rem; color: var(--muted); margin-bottom: 1.25rem; line-height: 1.5; }
.os-pc-feats { list-style: none; display: flex; flex-direction: column; gap: 0.5rem; margin-bottom: 1.5rem; }
.os-pc-feats li { font-size: 0.82rem; color: var(--muted); display: flex; align-items: center; gap: 6px; }
.os-pc-feats li i { color: var(--blue); font-size: 0.75rem; }
.os-btn-plan { width: 100%; padding: 0.72rem; border-radius: 10px; font-size: 0.875rem; font-weight: 700; text-align: center; text-decoration: none; display: block; transition: all 0.2s; font-family: 'Sora', sans-serif; border: none; cursor: pointer; }
.os-btn-plan-primary { background: var(--blue); color: #fff; }
.os-btn-plan-primary:hover { background: var(--blue-dark); color: #fff; }
.os-btn-plan-outline { background: transparent; color: var(--blue); border: 1.5px solid var(--border); }
.os-btn-plan-outline:hover { border-color: var(--blue); }
.os-khalti { display: flex; align-items: center; justify-content: center; gap: 5px; margin-top: 0.65rem; font-size: 0.72rem; color: var(--subtle); }
.os-k-badge { background: #5C2D91; color: #fff; font-size: 0.62rem; font-weight: 700; padding: 0.12rem 0.45rem; border-radius: 4px; }

/* ── FAQ ── */
.os-faq-list { margin-top: 3rem; display: flex; flex-direction: column; gap: 0.75rem; max-width: 720px; margin-left: auto; margin-right: auto; }
.os-faq-item { background: var(--white); border: 1px solid var(--border-l); border-radius: 12px; overflow: hidden; }
.os-faq-item.open { border-color: var(--border); }
.os-faq-q { padding: 1rem 1.25rem; font-size: 0.9rem; font-weight: 600; color: var(--text); display: flex; align-items: center; justify-content: space-between; cursor: pointer; font-family: 'Sora', sans-serif; user-select: none; }
.os-faq-q i { color: var(--blue); font-size: 0.85rem; transition: transform 0.2s; flex-shrink: 0; }
.os-faq-item.open .os-faq-q i { transform: rotate(45deg); }
.os-faq-a { padding: 0 1.25rem 1rem; font-size: 0.855rem; color: var(--muted); line-height: 1.7; display: none; }
.os-faq-item.open .os-faq-a { display: block; }

/* ── CTA ── */
.os-cta { padding: 5rem 5%; }
.os-cta-box {
    max-width: 1180px; margin: 0 auto;
    background: #0b2d7a;
    border-radius: 26px;
    padding: 4.5rem 3rem;
    text-align: center;
    position: relative; overflow: hidden;
}
.os-cta-box::before { content: ''; position: absolute; top: -80px; left: 50%; transform: translateX(-50%); width: 500px; height: 500px; background: radial-gradient(circle, rgba(59,130,246,0.1) 0%, transparent 65%); pointer-events: none; }
.os-cta-pill { display: inline-flex; align-items: center; gap: 6px; background: rgba(255,255,255,0.07); border: 1px solid rgba(255,255,255,0.1); color: rgba(255,255,255,0.65); font-size: 0.72rem; font-weight: 600; padding: 0.28rem 0.75rem; border-radius: 999px; margin-bottom: 1.25rem; letter-spacing: 0.5px; }
.os-cta-box h2 { font-family: 'Sora', sans-serif; font-size: 2.6rem; font-weight: 900; color: #fff; letter-spacing: -1.5px; line-height: 1.15; margin-bottom: 0.875rem; position: relative; }
.os-cta-box p { color: rgba(255,255,255,0.5); font-size: 1rem; margin-bottom: 2.25rem; max-width: 420px; margin-left: auto; margin-right: auto; position: relative; }
.os-cta-btns { display: flex; gap: 0.875rem; align-items: center; justify-content: center; flex-wrap: wrap; position: relative; }
.os-btn-cta-white { padding: 0.875rem 1.9rem; background: #fff; color: var(--blue); border-radius: 11px; text-decoration: none; font-size: 0.975rem; font-weight: 700; font-family: 'Sora', sans-serif; transition: all 0.2s; display: inline-flex; align-items: center; gap: 7px; }
.os-btn-cta-white:hover { transform: translateY(-2px); color: var(--blue); }
.os-btn-cta-outline { padding: 0.875rem 1.6rem; background: transparent; color: rgba(255,255,255,0.75); border-radius: 11px; text-decoration: none; font-size: 0.975rem; font-weight: 600; border: 1.5px solid rgba(255,255,255,0.18); transition: all 0.2s; }
.os-btn-cta-outline:hover { border-color: rgba(255,255,255,0.45); color: #fff; }

/* ── RESPONSIVE ── */
@media (max-width: 992px) {
    .os-hero h1 { font-size: 2.6rem; }
    .os-feat-grid { grid-template-columns: repeat(2,1fr); }
    .os-roles-grid { grid-template-columns: 1fr; gap: 1rem; }
    .os-test-grid { grid-template-columns: 1fr; gap: 1rem; }
    .os-stats { grid-template-columns: repeat(2,1fr); }
}
@media (max-width: 576px) {
    .os-hero h1 { font-size: 2rem; }
    .os-feat-grid { grid-template-columns: 1fr; }
    .os-steps { grid-template-columns: 1fr; }
    .os-steps::before { display: none; }
    .os-pr-grid { grid-template-columns: 1fr; }
    .os-stats { grid-template-columns: repeat(2,1fr); }
    .os-sec-h { font-size: 1.8rem; }
    .os-cta-box h2 { font-size: 1.9rem; }
}
</style>
</x-slot>



{{-- ═══════════════════════════════════════ --}}
{{-- HERO                                   --}}
{{-- ═══════════════════════════════════════ --}}
<section class="os-hero">
    <div class="os-hero-inner">

        {{-- LEFT: TEXT --}}
        <div>
            <div class="os-hero-pill">
                <span class="os-pill-dot"></span>
                Built for Nepali schools · 2082-83
            </div>
            <h1>Exams made <em>smarter</em><br>for every school.</h1>
            <p class="os-hero-desc">
                Online Siksha brings your entire exam workflow online — question sets,
                timed delivery, auto-grading, and instant results — all in one platform.
            </p>
            <div class="os-hero-btns">
                <a href="{{ route('login') }}" class="os-btn-main">
                    Start for free
                    <i class="fa-solid fa-arrow-right"></i>
                </a>
                <a href="#features" class="os-btn-outline">
                    <i class="fa-solid fa-play"></i>
                    See features
                </a>
            </div>
            <div class="os-trust">
                <div class="os-avatars">
                    <div class="os-av">SA</div>
                    <div class="os-av">AR</div>
                    <div class="os-av">PK</div>
                    <div class="os-av">+3</div>
                </div>
                <div class="os-trust-text">
                    <strong>6 developers</strong> building the<br>future of school exams in Nepal
                </div>
            </div>
        </div>

    </div>
</section>



{{-- ═══════════════════════════════════════ --}}
{{-- STATS                                  --}}
{{-- ═══════════════════════════════════════ --}}
<div class="os-stats">
    <div class="os-stat"><div class="os-stat-num">3</div><div class="os-stat-desc">User roles</div></div>
    <div class="os-stat"><div class="os-stat-num">100%</div><div class="os-stat-desc">Auto-graded</div></div>
    <div class="os-stat"><div class="os-stat-num">0s</div><div class="os-stat-desc">Result delay</div></div>
    <div class="os-stat"><div class="os-stat-num">∞</div><div class="os-stat-desc">Re-attempts</div></div>
</div>

{{-- ═══════════════════════════════════════ --}}
{{-- FEATURES                               --}}
{{-- ═══════════════════════════════════════ --}}
<section class="os-section" id="features">
    <div class="os-sec-eye">
        <span class="os-eye-line"></span>
        <span class="os-eye-text">Features</span>
        <span class="os-eye-line"></span>
    </div>
    <h2 class="os-sec-h">Everything your school needs,<br>nothing it doesn't.</h2>
    <p class="os-sec-p">Purpose-built for schools in Nepal with the tools that make exam management effortless.</p>
    <div class="os-feat-grid">
        <div class="os-fc">
            <div class="os-fi"><svg viewBox="0 0 22 22"><circle cx="11" cy="11" r="8"/><path d="M11 7v4l3 2"/></svg></div>
            <h3>Timed exam engine</h3>
            <p>Countdown timer enforced on frontend and validated server-side. Auto-submits the moment time expires.</p>
            <span class="os-fc-tag">→ Backend validated</span>
        </div>
        <div class="os-fc">
            <div class="os-fi"><svg viewBox="0 0 22 22"><path d="M4 6h14M4 11h10M4 16h6"/><path d="M16 14l4 4M16 18l4-4"/></svg></div>
            <h3>Question randomization</h3>
            <p>Shuffle question order per student per attempt. Each student sees a unique sequence every time.</p>
            <span class="os-fc-tag">→ Per-attempt shuffle</span>
        </div>
        <div class="os-fc">
            <div class="os-fi"><svg viewBox="0 0 22 22"><path d="M3 17l4-8 4 5 3-3 5 6"/><path d="M3 3v16h16"/></svg></div>
            <h3>Instant results</h3>
            <p>Scores calculated the moment a student submits. Percentage and marks appear immediately on screen.</p>
            <span class="os-fc-tag">→ Real-time scoring</span>
        </div>
        <div class="os-fc">
            <div class="os-fi"><svg viewBox="0 0 22 22"><rect x="3" y="5" width="16" height="14" rx="2"/><path d="M3 9h16M8 5V3M14 5V3"/></svg></div>
            <h3>Exam scheduling</h3>
            <p>Set a start and expiry time per class. Exams appear and disappear automatically.</p>
            <span class="os-fc-tag">→ Time-window access</span>
        </div>
        <div class="os-fc">
            <div class="os-fi"><svg viewBox="0 0 22 22"><path d="M18 8A6 6 0 1 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg></div>
            <h3>Smart notifications</h3>
            <p>In-app alerts for upcoming exams, published results, and subscription expiry reminders.</p>
            <span class="os-fc-tag">→ Role-based alerts</span>
        </div>
        <div class="os-fc">
            <div class="os-fi"><svg viewBox="0 0 22 22"><rect x="2" y="5" width="18" height="14" rx="2"/><path d="M2 10h18M7 15h.01M11 15h2"/></svg></div>
            <h3>Khalti integration</h3>
            <p>School subscriptions paid securely via Khalti — Nepal's leading digital wallet.</p>
            <span class="os-fc-tag">→ Nepal payments</span>
        </div>
        <div class="os-fc">
            <div class="os-fi"><svg viewBox="0 0 22 22"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
            <h3>Role-based access</h3>
            <p>Admin, Teacher, Student — each with a tailored dashboard and clearly scoped permissions.</p>
            <span class="os-fc-tag">→ Middleware protected</span>
        </div>
        <div class="os-fc">
            <div class="os-fi"><svg viewBox="0 0 22 22"><path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"/></svg></div>
            <h3>Class code enrollment</h3>
            <p>Students join classes with a unique code — fast, self-service enrollment for everyone.</p>
            <span class="os-fc-tag">→ Self-service join</span>
        </div>
        <div class="os-fc">
            <div class="os-fi"><svg viewBox="0 0 22 22"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div>
            <h3>Attempt history</h3>
            <p>Every attempt stored permanently. Students track all past scores and percentages.</p>
            <span class="os-fc-tag">→ Full history log</span>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ --}}
{{-- HOW IT WORKS                           --}}
{{-- ═══════════════════════════════════════ --}}
<section class="os-section-bg" id="how">
    <div class="os-section-bg-inner">
        <div class="os-sec-eye">
            <span class="os-eye-line"></span><span class="os-eye-text">How it works</span><span class="os-eye-line"></span>
        </div>
        <h2 class="os-sec-h">Up and running in three steps.</h2>
        <p class="os-sec-p">From setup to first exam in minutes — not days.</p>
        <div class="os-steps">
            <div class="os-step">
                <div class="os-step-num">1</div>
                <h3>Admin sets up classes</h3>
                <p>Create classes, assign teachers, generate student credentials, and share unique class codes.</p>
            </div>
            <div class="os-step">
                <div class="os-step-num">2</div>
                <h3>Teacher builds exams</h3>
                <p>Create subjects, add question sets with marks and time limits, then schedule with a time window.</p>
            </div>
            <div class="os-step">
                <div class="os-step-num">3</div>
                <h3>Students attempt and see results</h3>
                <p>Enroll with a class code, attempt live exams, and view scores the instant they submit.</p>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ --}}
{{-- ROLES                                  --}}
{{-- ═══════════════════════════════════════ --}}
<section class="os-section">
    <div class="os-sec-eye">
        <span class="os-eye-line"></span><span class="os-eye-text">User roles</span><span class="os-eye-line"></span>
    </div>
    <h2 class="os-sec-h">One platform. Three powerful roles.</h2>
    <p class="os-sec-p">Every user gets a tailored experience built around what they actually need to do.</p>
    <div class="os-roles-grid">
        <div class="os-rc os-rc-admin">
            <div class="os-ri"><svg viewBox="0 0 20 20"><circle cx="10" cy="6" r="3"/><path d="M2 18c0-4 3.6-7 8-7s8 3 8 7"/></svg></div>
            <div class="os-r-tag">Admin</div>
            <h3>Full control</h3>
            <ul class="os-r-list">
                <li><span class="os-chk">✓</span>Manage all teachers and students</li>
                <li><span class="os-chk">✓</span>Create and assign classes</li>
                <li><span class="os-chk">✓</span>View all results and reports</li>
                <li><span class="os-chk">✓</span>Manage subscription plans</li>
                <li><span class="os-chk">✓</span>Auto-generate login credentials</li>
            </ul>
        </div>
        <div class="os-rc os-rc-teacher">
            <div class="os-ri"><svg viewBox="0 0 20 20"><rect x="2" y="3" width="16" height="12" rx="2"/><path d="M6 18h8M10 15v3M6 8h8M6 11h5"/></svg></div>
            <div class="os-r-tag">Teacher</div>
            <h3>Create and schedule</h3>
            <ul class="os-r-list">
                <li><span class="os-chk">✓</span>Create subjects and question sets</li>
                <li><span class="os-chk">✓</span>Schedule exam time windows</li>
                <li><span class="os-chk">✓</span>Set marks per question</li>
                <li><span class="os-chk">✓</span>View class-wide results</li>
                <li><span class="os-chk">✓</span>Enable question randomization</li>
            </ul>
        </div>
        <div class="os-rc os-rc-student">
            <div class="os-ri"><svg viewBox="0 0 20 20"><path d="M10 2L2 7l8 5 8-5-8-5z"/><path d="M2 7v6M18 7v6M6 9.5v4a4 4 0 0 0 8 0v-4"/></svg></div>
            <div class="os-r-tag">Student</div>
            <h3>Learn and attempt</h3>
            <ul class="os-r-list">
                <li><span class="os-chk">✓</span>Enroll via class code</li>
                <li><span class="os-chk">✓</span>Attempt timed exams</li>
                <li><span class="os-chk">✓</span>See instant scores</li>
                <li><span class="os-chk">✓</span>View full attempt history</li>
                <li><span class="os-chk">✓</span>Update profile and password</li>
            </ul>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ --}}
{{-- TESTIMONIALS                           --}}
{{-- ═══════════════════════════════════════ --}}
<section class="os-section-bg">
    <div class="os-section-bg-inner">
        <div class="os-sec-eye">
            <span class="os-eye-line"></span><span class="os-eye-text">Testimonials</span><span class="os-eye-line"></span>
        </div>
        <h2 class="os-sec-h">Loved by teachers and students.</h2>
        <p class="os-sec-p">Here is what people using Online Siksha every day have to say.</p>
        <div class="os-test-grid">
            <div class="os-tc">
                <div class="os-stars"><div class="os-star"></div><div class="os-star"></div><div class="os-star"></div><div class="os-star"></div><div class="os-star"></div></div>
                <p>"Setting up exams used to take half a day. With Online Siksha I schedule a full question set in under 20 minutes. The randomization means no two students see the same order."</p>
                <div class="os-tc-author">
                    <div class="os-tav os-tav-a">RK</div>
                    <div><div class="os-tc-name">Ram Kumar Shrestha</div><div class="os-tc-role">Mathematics teacher · Grade 10</div></div>
                </div>
            </div>
            <div class="os-tc">
                <div class="os-stars"><div class="os-star"></div><div class="os-star"></div><div class="os-star"></div><div class="os-star"></div><div class="os-star"></div></div>
                <p>"I love seeing my score the second I submit. I used to wait days for results — now I know immediately where I went wrong and can study those topics right away."</p>
                <div class="os-tc-author">
                    <div class="os-tav os-tav-g">SP</div>
                    <div><div class="os-tc-name">Sunita Pradhan</div><div class="os-tc-role">Student · Grade 9</div></div>
                </div>
            </div>
            <div class="os-tc">
                <div class="os-stars"><div class="os-star"></div><div class="os-star"></div><div class="os-star"></div><div class="os-star"></div><div class="os-star"></div></div>
                <p>"Managing 400 students across 10 classes is finally stress-free. The class codes and auto-generated credentials save our admin team hours every single week."</p>
                <div class="os-tc-author">
                    <div class="os-tav os-tav-b">BT</div>
                    <div><div class="os-tc-name">Binod Tamang</div><div class="os-tc-role">School administrator</div></div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ --}}
{{-- PRICING                                --}}
{{-- ═══════════════════════════════════════ --}}
<section class="os-section" id="pricing">
    <div class="os-sec-eye">
        <span class="os-eye-line"></span><span class="os-eye-text">Pricing</span><span class="os-eye-line"></span>
    </div>
    <h2 class="os-sec-h">Simple, school-friendly plans.</h2>
    <p class="os-sec-p">Pay securely via Khalti — Nepal's trusted digital payment gateway.</p>
    <div class="os-pr-grid">
        <div class="os-pc">
            <div class="os-pc-name">Monthly plan</div>
            <div class="os-pc-price">रू 999<span>/month</span></div>
            <div class="os-pc-desc">Perfect for schools getting started with online exams.</div>
            <ul class="os-pc-feats">
                <li><i class="fa-solid fa-check"></i> Unlimited students and teachers</li>
                <li><i class="fa-solid fa-check"></i> All exam features included</li>
                <li><i class="fa-solid fa-check"></i> In-app notifications</li>
                <li><i class="fa-solid fa-check"></i> Result history</li>
            </ul>
            <a href="{{ route('login') }}" class="os-btn-plan os-btn-plan-outline">Choose monthly</a>
        </div>
        <div class="os-pc best">
            <div class="os-pc-badge">BEST VALUE — SAVE 25%</div>
            <div class="os-pc-name">Yearly plan</div>
            <div class="os-pc-price">रू 8,999<span>/year</span></div>
            <div class="os-pc-desc">Best value for schools committed to digital exams year-round.</div>
            <ul class="os-pc-feats">
                <li><i class="fa-solid fa-check"></i> Everything in monthly</li>
                <li><i class="fa-solid fa-check"></i> Priority support</li>
                <li><i class="fa-solid fa-check"></i> Advanced result reports</li>
                <li><i class="fa-solid fa-check"></i> Early access to new features</li>
            </ul>
            <a href="{{ route('login') }}" class="os-btn-plan os-btn-plan-primary">Choose yearly</a>
            <div class="os-khalti">
                <span class="os-k-badge">KHALTI</span> Secure payment · Instant activation
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ --}}
{{-- FAQ                                    --}}
{{-- ═══════════════════════════════════════ --}}
<section class="os-section-bg">
    <div class="os-section-bg-inner">
        <div class="os-sec-eye">
            <span class="os-eye-line"></span><span class="os-eye-text">FAQ</span><span class="os-eye-line"></span>
        </div>
        <h2 class="os-sec-h">Frequently asked questions.</h2>
        <p class="os-sec-p">Everything you need to know before getting started.</p>
        <div class="os-faq-list">
            <div class="os-faq-item open">
                <div class="os-faq-q" onclick="osFaq(this)">
                    How do students enroll in a class?
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="os-faq-a">The admin creates a class and generates a unique class code. Students log in and enter this code to instantly enroll. No approval needed — completely self-service.</div>
            </div>
            <div class="os-faq-item">
                <div class="os-faq-q" onclick="osFaq(this)">
                    What happens if a student's internet cuts out mid-exam?
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="os-faq-a">Answers are saved progressively as the student selects them, so no work is lost. When the connection is restored the student can continue. The timer continues counting down in the background.</div>
            </div>
            <div class="os-faq-item">
                <div class="os-faq-q" onclick="osFaq(this)">
                    Can a student attempt the same exam more than once?
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="os-faq-a">Yes — the system supports unlimited re-attempts. Every attempt is stored separately in the student's history with the date, score, and percentage.</div>
            </div>
            <div class="os-faq-item">
                <div class="os-faq-q" onclick="osFaq(this)">
                    How does Khalti payment work for the subscription?
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="os-faq-a">The admin selects a plan, clicks Subscribe, and is redirected to Khalti's secure hosted payment page. After payment the system automatically activates the subscription.</div>
            </div>
            <div class="os-faq-item">
                <div class="os-faq-q" onclick="osFaq(this)">
                    Is the system mobile-friendly?
                    <i class="fa-solid fa-plus"></i>
                </div>
                <div class="os-faq-a">Yes — all pages are fully responsive using Bootstrap 5. Students can attempt exams on a phone or tablet. The timer and auto-submit work correctly on all screen sizes.</div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════ --}}
{{-- CTA                                    --}}
{{-- ═══════════════════════════════════════ --}}
<section class="os-cta">
    <div class="os-cta-box">
        <div class="os-cta-pill">✦ Online Siksha — For Nepali Schools</div>
        <h2>Ready to digitize your<br>school's exams?</h2>
        <p>Join Online Siksha and move from paper to pixels — your first exam can be live today.</p>
        <div class="os-cta-btns">
            <a href="{{ route('login') }}" class="os-btn-cta-white">
                Get started free <i class="fa-solid fa-arrow-right"></i>
            </a>
            <a href="#contact" class="os-btn-cta-outline">Contact us</a>
        </div>
    </div>
</section>

<x-slot name="scripts">
<script>
    // FAQ accordion
    function osFaq(el) {
        const item = el.parentElement;
        document.querySelectorAll('.os-faq-item.open').forEach(i => {
            if (i !== item) i.classList.remove('open');
        });
        item.classList.toggle('open');
    }
</script>
</x-slot>

</x-layout>
