@extends('layouts.app')

@section('title', 'Online Siksha — Nepal\'s Smart Exam Platform')

@section('styles')
<style>
    /* ── HERO ── */
    .hero {
        background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
        padding: 100px 48px 80px;
        text-align: center;
        position: relative;
        overflow: hidden;
    }
    .hero::before {
        content: '';
        position: absolute; top: 0; left: 0; right: 0; bottom: 0;
        background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.03'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    }
    .hero-badge {
        display: inline-flex; align-items: center; gap: 6px;
        background: rgba(245, 158, 11, 0.15); color: #f59e0b;
        border: 1px solid rgba(245, 158, 11, 0.3);
        font-size: 13px; font-weight: 500;
        padding: 6px 16px; border-radius: 999px; margin-bottom: 28px;
    }
    .hero h1 {
        font-size: 52px; font-weight: 800; line-height: 1.15;
        color: #fff; max-width: 680px;
        margin: 0 auto 20px;
    }
    .hero h1 .highlight {
        color: #f59e0b;
        position: relative;
    }
    .hero p {
        font-size: 18px; color: #94a3b8;
        max-width: 520px; margin: 0 auto 40px; line-height: 1.7;
    }
    .hero-btns { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; margin-bottom: 60px; }
    .btn-hero-primary {
        display: inline-flex; align-items: center; gap: 8px;
        background: #f59e0b; color: #1a1a2e;
        border: none; padding: 14px 32px;
        border-radius: 10px; font-size: 16px; font-weight: 700;
        cursor: pointer; text-decoration: none;
    }
    .btn-hero-primary:hover { background: #e08d00; }
    .btn-hero-outline {
        display: inline-flex; align-items: center; gap: 8px;
        background: transparent; color: #fff;
        border: 1.5px solid rgba(255,255,255,0.3);
        padding: 14px 32px; border-radius: 10px;
        font-size: 16px; font-weight: 600;
        cursor: pointer; text-decoration: none;
    }
    .btn-hero-outline:hover { border-color: #fff; background: rgba(255,255,255,0.05); }
    .hero-cards {
        display: flex; justify-content: center; gap: 16px; flex-wrap: wrap;
    }
    .hero-card {
        background: rgba(255,255,255,0.07);
        border: 1px solid rgba(255,255,255,0.1);
        border-radius: 12px; padding: 20px 28px;
        color: #fff; text-align: left; min-width: 180px;
    }
    .hero-card .num { font-size: 28px; font-weight: 800; color: #f59e0b; }
    .hero-card .lbl { font-size: 13px; color: #94a3b8; margin-top: 2px; }

    /* ── SECTIONS ── */
    .section { padding: 80px 48px; max-width: 1100px; margin: 0 auto; }
    .section-wrap { background: #fff; padding: 80px 48px; }
    .section-wrap-gray { background: #f8fafc; padding: 80px 48px; }
    .tag {
        display: inline-flex; align-items: center; gap: 6px;
        font-size: 12px; font-weight: 600; color: #185FA5;
        background: #e6f1fb; padding: 4px 14px;
        border-radius: 999px; margin-bottom: 14px;
        text-transform: uppercase; letter-spacing: 0.8px;
    }
    .section-title { font-size: 34px; font-weight: 800; color: #1a1a2e; margin-bottom: 14px; }
    .section-sub { font-size: 16px; color: #64748b; max-width: 520px; line-height: 1.7; margin-bottom: 48px; }

    /* ── FEATURES ── */
    .features-grid {
        display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;
    }
    .feat-card {
        background: #f8fafc; border: 1px solid #e2e8f0;
        border-radius: 14px; padding: 28px;
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .feat-card:hover { transform: translateY(-4px); box-shadow: 0 12px 32px rgba(24,95,165,0.1); }
    .feat-icon {
        width: 48px; height: 48px; background: #185FA5;
        border-radius: 12px; display: flex; align-items: center;
        justify-content: center; color: #fff; font-size: 22px; margin-bottom: 18px;
    }
    .feat-title { font-size: 16px; font-weight: 700; color: #1a1a2e; margin-bottom: 8px; }
    .feat-desc { font-size: 14px; color: #64748b; line-height: 1.6; }

    /* ── HOW IT WORKS ── */
    .steps-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }
    .step-card {
        background: #fff; border: 1px solid #e2e8f0;
        border-radius: 14px; padding: 28px; text-align: center;
        position: relative;
    }
    .step-num {
        width: 40px; height: 40px; background: #185FA5;
        border-radius: 50%; display: flex; align-items: center;
        justify-content: center; color: #fff; font-size: 16px;
        font-weight: 800; margin: 0 auto 16px;
    }
    .step-title { font-size: 15px; font-weight: 700; color: #1a1a2e; margin-bottom: 8px; }
    .step-desc { font-size: 13px; color: #64748b; line-height: 1.6; }

    /* ── ROLES ── */
    .roles-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 24px; }
    .role-card {
        border: 1.5px solid #e2e8f0; border-radius: 16px;
        padding: 32px; background: #fff;
        transition: border-color 0.2s, transform 0.2s;
    }
    .role-card:hover { transform: translateY(-3px); }
    .role-card.active { border-color: #185FA5; background: #f0f7ff; }
    .role-header { display: flex; align-items: center; gap: 12px; margin-bottom: 16px; }
    .role-icon {
        width: 44px; height: 44px; border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-size: 22px; color: #fff;
    }
    .icon-admin { background: #185FA5; }
    .icon-teacher { background: #059669; }
    .icon-student { background: #7c3aed; }
    .role-title { font-size: 18px; font-weight: 700; color: #1a1a2e; }
    .role-desc { font-size: 14px; color: #64748b; margin-bottom: 20px; line-height: 1.6; }
    .role-list { list-style: none; display: flex; flex-direction: column; gap: 10px; }
    .role-list li {
        font-size: 13px; color: #475569;
        display: flex; align-items: center; gap: 8px;
    }
    .role-list li i { color: #185FA5; font-size: 16px; }

    /* ── ABOUT ── */
    .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 60px; align-items: center; }
    .about-text .section-title { margin-bottom: 16px; }
    .about-text p { font-size: 15px; color: #64748b; line-height: 1.8; margin-bottom: 16px; }
    .about-features { display: flex; flex-direction: column; gap: 14px; margin-top: 28px; }
    .about-feat {
        display: flex; align-items: flex-start; gap: 14px;
        background: #f8fafc; border-radius: 12px; padding: 16px;
    }
    .about-feat-icon {
        width: 40px; height: 40px; background: #e6f1fb;
        border-radius: 10px; display: flex; align-items: center;
        justify-content: center; color: #185FA5; font-size: 20px; flex-shrink: 0;
    }
    .about-feat-title { font-size: 14px; font-weight: 600; color: #1a1a2e; margin-bottom: 3px; }
    .about-feat-desc { font-size: 13px; color: #64748b; }
    .about-visual {
        background: linear-gradient(135deg, #185FA5, #0f3460);
        border-radius: 20px; padding: 40px; color: #fff;
    }
    .about-visual h3 { font-size: 20px; font-weight: 700; margin-bottom: 24px; }
    .about-stat-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
    .about-stat {
        background: rgba(255,255,255,0.1);
        border-radius: 12px; padding: 20px; text-align: center;
    }
    .about-stat .n { font-size: 30px; font-weight: 800; color: #f59e0b; }
    .about-stat .l { font-size: 12px; color: rgba(255,255,255,0.7); margin-top: 4px; }

    /* ── CONTACT ── */
    .contact-grid { display: grid; grid-template-columns: 1fr 1.2fr; gap: 60px; }
    .contact-info { display: flex; flex-direction: column; gap: 24px; }
    .contact-item { display: flex; align-items: flex-start; gap: 16px; }
    .contact-icon {
        width: 44px; height: 44px; background: #e6f1fb;
        border-radius: 12px; display: flex; align-items: center;
        justify-content: center; color: #185FA5; font-size: 22px; flex-shrink: 0;
    }
    .contact-label { font-size: 13px; color: #94a3b8; margin-bottom: 2px; }
    .contact-val { font-size: 15px; font-weight: 600; color: #1a1a2e; }
    .contact-form { display: flex; flex-direction: column; gap: 14px; }
    .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
    .contact-form input,
    .contact-form textarea,
    .contact-form select {
        width: 100%; padding: 12px 16px;
        font-size: 14px; color: #1a1a2e;
        border: 1.5px solid #e2e8f0; border-radius: 10px;
        background: #fff; outline: none;
        font-family: 'Segoe UI', sans-serif;
        transition: border-color 0.2s;
    }
    .contact-form input:focus,
    .contact-form textarea:focus { border-color: #185FA5; }
    .contact-form textarea { resize: none; height: 110px; }
    .btn-submit {
        display: inline-flex; align-items: center; gap: 8px;
        background: #185FA5; color: #fff; border: none;
        padding: 13px 28px; border-radius: 10px;
        font-size: 15px; font-weight: 600; cursor: pointer;
        align-self: flex-start;
    }
    .btn-submit:hover { background: #0f4a87; }

    /* ── CTA BANNER ── */
    .cta-banner {
        background: linear-gradient(135deg, #185FA5 0%, #0f3460 100%);
        padding: 64px 48px; text-align: center;
    }
    .cta-banner h2 { font-size: 34px; font-weight: 800; color: #fff; margin-bottom: 14px; }
    .cta-banner p { font-size: 16px; color: rgba(255,255,255,0.75); margin-bottom: 32px; }

    @media (max-width: 768px) {
        .hero { padding: 60px 20px; }
        .hero h1 { font-size: 32px; }
        .section, .section-wrap, .section-wrap-gray { padding: 48px 20px; }
        .features-grid, .roles-grid, .steps-grid { grid-template-columns: 1fr; }
        .about-grid, .contact-grid { grid-template-columns: 1fr; }
        .cta-banner { padding: 48px 20px; }
    }
</style>
@endsection

@section('content')

{{-- HERO --}}
<section class="hero" id="home">
    <div class="hero-badge">
        <i class="ti ti-star" aria-hidden="true"></i>
        Nepal's #1 Smart Exam Platform
    </div>
    <h1>Smarter exams for<br><span class="highlight">every Nepali school</span></h1>
    <p>Online Siksha digitizes your entire examination process — from question creation to instant results — all in one powerful platform.</p>
    <div class="hero-btns">
        <a href="/admin" class="btn-hero-primary">
            <i class="ti ti-rocket" aria-hidden="true"></i> Get started free
        </a>
        <a href="#features" class="btn-hero-outline">
            <i class="ti ti-player-play" aria-hidden="true"></i> See how it works
        </a>
    </div>
    <div class="hero-cards">
        <div class="hero-card">
            <div class="num">3</div>
            <div class="lbl">User roles</div>
        </div>
        <div class="hero-card">
            <div class="num">100%</div>
            <div class="lbl">Auto-graded</div>
        </div>
        <div class="hero-card">
            <div class="num">Khalti</div>
            <div class="lbl">Payment ready</div>
        </div>
        <div class="hero-card">
            <div class="num">∞</div>
            <div class="lbl">Re-attempts</div>
        </div>
    </div>
</section>

{{-- FEATURES --}}
<div class="section-wrap" id="features">
    <div class="section">
        <div class="tag"><i class="ti ti-sparkles" aria-hidden="true"></i> Features</div>
        <div class="section-title">Everything your school needs</div>
        <div class="section-sub">From timed exams to instant results, Online Siksha handles the full examination lifecycle.</div>
        <div class="features-grid">
            <div class="feat-card">
                <div class="feat-icon"><i class="ti ti-clock" aria-hidden="true"></i></div>
                <div class="feat-title">Timed exams</div>
                <div class="feat-desc">Countdown timer with auto-submit when time runs out. No more manual invigilation.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon"><i class="ti ti-chart-bar" aria-hidden="true"></i></div>
                <div class="feat-title">Instant results</div>
                <div class="feat-desc">Scores calculated and displayed immediately after submission with detailed breakdown.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon"><i class="ti ti-lock" aria-hidden="true"></i></div>
                <div class="feat-title">Role-based access</div>
                <div class="feat-desc">Separate secure dashboards for Admin, Teacher, and Student with scoped permissions.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon"><i class="ti ti-calendar" aria-hidden="true"></i></div>
                <div class="feat-title">Exam scheduling</div>
                <div class="feat-desc">Set precise start and end time windows. Exams appear and disappear automatically.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon"><i class="ti ti-refresh" aria-hidden="true"></i></div>
                <div class="feat-title">Unlimited re-attempts</div>
                <div class="feat-desc">Students can attempt the same exam multiple times. All attempts stored permanently.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon"><i class="ti ti-bell" aria-hidden="true"></i></div>
                <div class="feat-title">Smart notifications</div>
                <div class="feat-desc">In-app alerts for upcoming exams, results published, and subscription reminders.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon"><i class="ti ti-arrows-shuffle" aria-hidden="true"></i></div>
                <div class="feat-title">Question randomization</div>
                <div class="feat-desc">Shuffle question order per student per attempt to reduce cheating effectively.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon"><i class="ti ti-credit-card" aria-hidden="true"></i></div>
                <div class="feat-title">Khalti payments</div>
                <div class="feat-desc">Nepal's trusted payment gateway for monthly and yearly school subscription plans.</div>
            </div>
            <div class="feat-card">
                <div class="feat-icon"><i class="ti ti-device-mobile" aria-hidden="true"></i></div>
                <div class="feat-title">Mobile friendly</div>
                <div class="feat-desc">Fully responsive on desktop, tablet, and mobile. Works on any modern browser.</div>
            </div>
        </div>
    </div>
</div>

{{-- HOW IT WORKS --}}
<div class="section-wrap-gray">
    <div class="section">
        <div class="tag"><i class="ti ti-route" aria-hidden="true"></i> How it works</div>
        <div class="section-title">Up and running in 4 steps</div>
        <div class="section-sub">Get your school on Online Siksha quickly and start conducting exams within minutes.</div>
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-num">1</div>
                <div class="step-title">School subscribes</div>
                <div class="step-desc">Admin subscribes to a plan and pays securely via Khalti payment gateway.</div>
            </div>
            <div class="step-card">
                <div class="step-num">2</div>
                <div class="step-title">Setup classes</div>
                <div class="step-desc">Admin creates classes, adds teachers and students. Credentials sent automatically by email.</div>
            </div>
            <div class="step-card">
                <div class="step-num">3</div>
                <div class="step-title">Teacher creates exam</div>
                <div class="step-desc">Teacher adds questions, sets time limit, and schedules the exam with a start and end window.</div>
            </div>
            <div class="step-card">
                <div class="step-num">4</div>
                <div class="step-title">Students attempt</div>
                <div class="step-desc">Students log in, see their exams, attempt within the window, and get results instantly.</div>
            </div>
        </div>
    </div>
</div>

{{-- ROLES --}}
<div class="section-wrap">
    <div class="section">
        <div class="tag"><i class="ti ti-users" aria-hidden="true"></i> User roles</div>
        <div class="section-title">Built for everyone in your school</div>
        <div class="section-sub">Three dedicated roles with focused dashboards and scoped permissions.</div>
        <div class="roles-grid">
            <div class="role-card">
                <div class="role-header">
                    <div class="role-icon icon-admin"><i class="ti ti-shield" aria-hidden="true"></i></div>
                    <div class="role-title">Admin</div>
                </div>
                <div class="role-desc">Full control over all users, classes, subscriptions and reports.</div>
                <ul class="role-list">
                    <li><i class="ti ti-check" aria-hidden="true"></i> Manage teachers & students</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> Create & assign classes</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> View all exam results</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> Manage Khalti subscriptions</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> Auto-generate credentials</li>
                </ul>
            </div>
            <div class="role-card active">
                <div class="role-header">
                    <div class="role-icon icon-teacher"><i class="ti ti-book" aria-hidden="true"></i></div>
                    <div class="role-title">Teacher</div>
                </div>
                <div class="role-desc">Create and manage exams, track student performance easily.</div>
                <ul class="role-list">
                    <li><i class="ti ti-check" aria-hidden="true"></i> Create subjects & question sets</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> Add MCQ questions with marks</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> Schedule exams per class</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> Enable question randomization</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> View detailed class results</li>
                </ul>
            </div>
            <div class="role-card">
                <div class="role-header">
                    <div class="role-icon icon-student"><i class="ti ti-school" aria-hidden="true"></i></div>
                    <div class="role-title">Student</div>
                </div>
                <div class="role-desc">Enroll, take timed exams, and track your progress anytime.</div>
                <ul class="role-list">
                    <li><i class="ti ti-check" aria-hidden="true"></i> Enroll via unique class code</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> Attempt timed exams</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> Auto-submit on timeout</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> View instant score & results</li>
                    <li><i class="ti ti-check" aria-hidden="true"></i> Full attempt history</li>
                </ul>
            </div>
        </div>
    </div>
</div>

{{-- ABOUT --}}
<div class="section-wrap-gray" id="about">
    <div class="section">
        <div class="about-grid">
            <div class="about-text">
                <div class="tag"><i class="ti ti-info-circle" aria-hidden="true"></i> About</div>
                <div class="section-title">Built for Nepali schools</div>
                <p>Online Siksha is a web-based examination platform designed to digitize and automate the entire exam process for educational institutions across Nepal.</p>
                <p>It eliminates manual paperwork, reduces human error, and provides a smooth experience for students, teachers, and administrators — all in one place.</p>
                <div class="about-features">
                    <div class="about-feat">
                        <div class="about-feat-icon"><i class="ti ti-shield-check" aria-hidden="true"></i></div>
                        <div>
                            <div class="about-feat-title">Secure & reliable</div>
                            <div class="about-feat-desc">CSRF protection, bcrypt passwords, role-based middleware on every route.</div>
                        </div>
                    </div>
                    <div class="about-feat">
                        <div class="about-feat-icon"><i class="ti ti-database" aria-hidden="true"></i></div>
                        <div>
                            <div class="about-feat-title">Data never lost</div>
                            <div class="about-feat-desc">Soft deletes and permanent attempt history ensure no data is ever permanently removed.</div>
                        </div>
                    </div>
                    <div class="about-feat">
                        <div class="about-feat-icon"><i class="ti ti-code" aria-hidden="true"></i></div>
                        <div>
                            <div class="about-feat-title">Built on Laravel</div>
                            <div class="about-feat-desc">Laravel 12 + Filament + MySQL — industry-standard modern web technologies.</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="about-visual">
                <h3>Online Siksha at a glance</h3>
                <div class="about-stat-grid">
                    <div class="about-stat">
                        <div class="n">13</div>
                        <div class="l">Database tables</div>
                    </div>
                    <div class="about-stat">
                        <div class="n">3</div>
                        <div class="l">User roles</div>
                    </div>
                    <div class="about-stat">
                        <div class="n">100%</div>
                        <div class="l">Auto-graded</div>
                    </div>
                    <div class="about-stat">
                        <div class="n">Khalti</div>
                        <div class="l">Payments</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- CTA BANNER --}}
<div class="cta-banner">
    <h2>Ready to digitize your exams?</h2>
    <p>Join schools across Nepal already using Online Siksha for smarter examinations.</p>
    <a href="/admin" class="btn-hero-primary">
        <i class="ti ti-rocket" aria-hidden="true"></i> Get started today
    </a>
</div>

{{-- CONTACT --}}
<div class="section-wrap" id="contact">
    <div class="section">
        <div class="tag"><i class="ti ti-mail" aria-hidden="true"></i> Contact</div>
        <div class="section-title">Get in touch with us</div>
        <div class="contact-grid">
            <div class="contact-info">
                <p style="font-size:15px;color:#64748b;line-height:1.7;margin-bottom:8px;">Have questions about Online Siksha? We would love to hear from you and help your school get started.</p>
                <div class="contact-item">
                    <div class="contact-icon"><i class="ti ti-mail" aria-hidden="true"></i></div>
                    <div>
                        <div class="contact-label">Email address</div>
                        <div class="contact-val">info@onlinesiksha.com.np</div>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="ti ti-map-pin" aria-hidden="true"></i></div>
                    <div>
                        <div class="contact-label">Location</div>
                        <div class="contact-val">Kathmandu, Nepal</div>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="ti ti-phone" aria-hidden="true"></i></div>
                    <div>
                        <div class="contact-label">Phone number</div>
                        <div class="contact-val">+977-1-XXXXXXX</div>
                    </div>
                </div>
                <div class="contact-item">
                    <div class="contact-icon"><i class="ti ti-clock" aria-hidden="true"></i></div>
                    <div>
                        <div class="contact-label">Office hours</div>
                        <div class="contact-val">Sun – Fri, 9:00 AM – 5:00 PM</div>
                    </div>
                </div>
            </div>
            <div class="contact-form">
                <div class="form-row">
                    <input type="text" placeholder="Your full name" />
                    <input type="email" placeholder="Email address" />
                </div>
                <input type="text" placeholder="School name" />
                <input type="text" placeholder="Subject" />
                <textarea placeholder="Your message..."></textarea>
                <button class="btn-submit">
                    <i class="ti ti-send" aria-hidden="true"></i> Send message
                </button>
            </div>
        </div>
    </div>
</div>

@endsection
