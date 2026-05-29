<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Siksha — Exam Management System</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Segoe UI', sans-serif; background: #fff; color: #1a1a1a; }

        /* NAV */
        .nav {
            display: flex; justify-content: space-between; align-items: center;
            padding: 16px 48px; border-bottom: 1px solid #e5e7eb;
            background: #fff; position: sticky; top: 0; z-index: 100;
        }
        .nav-logo { font-size: 22px; font-weight: 600; color: #185FA5; }
        .nav-logo span { color: #1a1a1a; }
        .nav-links { display: flex; gap: 28px; list-style: none; }
        .nav-links a { font-size: 14px; color: #6b7280; text-decoration: none; transition: color 0.2s; }
        .nav-links a:hover { color: #185FA5; }
        .nav-btn {
            background: #185FA5; color: #fff; border: none;
            padding: 9px 22px; border-radius: 8px; font-size: 14px; cursor: pointer;
        }

        /* HERO */
        .hero {
            padding: 80px 48px 72px; text-align: center;
            background: #f8fafc; border-bottom: 1px solid #e5e7eb;
        }
        .hero-badge {
            display: inline-block; background: #E6F1FB; color: #185FA5;
            font-size: 13px; padding: 5px 16px; border-radius: 999px; margin-bottom: 24px;
        }
        .hero h1 {
            font-size: 42px; font-weight: 700; line-height: 1.2;
            margin-bottom: 20px; max-width: 600px; margin-left: auto; margin-right: auto;
        }
        .hero h1 span { color: #185FA5; }
        .hero p {
            font-size: 17px; color: #6b7280; max-width: 500px;
            margin: 0 auto 36px; line-height: 1.7;
        }
        .hero-btns { display: flex; gap: 14px; justify-content: center; flex-wrap: wrap; }
        .btn-primary {
            background: #185FA5; color: #fff; border: none;
            padding: 13px 30px; border-radius: 8px; font-size: 15px; cursor: pointer;
        }
        .btn-outline {
            background: transparent; color: #185FA5;
            border: 1.5px solid #185FA5; padding: 13px 30px;
            border-radius: 8px; font-size: 15px; cursor: pointer;
        }

        /* STATS */
        .stats {
            display: grid; grid-template-columns: repeat(3, 1fr);
            border-bottom: 1px solid #e5e7eb;
        }
        .stat {
            padding: 32px; text-align: center;
            border-right: 1px solid #e5e7eb;
        }
        .stat:last-child { border-right: none; }
        .stat-num { font-size: 32px; font-weight: 700; color: #185FA5; }
        .stat-label { font-size: 13px; color: #6b7280; margin-top: 4px; }

        /* SECTIONS */
        .section { padding: 64px 48px; border-bottom: 1px solid #e5e7eb; }
        .section-tag {
            font-size: 12px; color: #185FA5; font-weight: 600;
            text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px;
        }
        .section-title { font-size: 28px; font-weight: 700; margin-bottom: 12px; }
        .section-sub {
            font-size: 15px; color: #6b7280; max-width: 500px;
            line-height: 1.7; margin-bottom: 40px;
        }

        /* FEATURES */
        .features-grid {
            display: grid; grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 18px;
        }
        .feature-card {
            background: #fff; border: 1px solid #e5e7eb;
            border-radius: 12px; padding: 22px;
        }
        .feature-icon {
            width: 40px; height: 40px; background: #E6F1FB; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            margin-bottom: 14px; color: #185FA5; font-size: 20px;
        }
        .feature-title { font-size: 14px; font-weight: 600; margin-bottom: 6px; }
        .feature-desc { font-size: 13px; color: #6b7280; line-height: 1.6; }

        /* ABOUT */
        .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: center; }
        .about-text p { font-size: 15px; color: #6b7280; line-height: 1.8; margin-bottom: 16px; }
        .about-cards { display: flex; flex-direction: column; gap: 14px; }
        .about-card {
            background: #f8fafc; border-radius: 10px; padding: 18px;
            display: flex; align-items: flex-start; gap: 14px;
        }
        .about-card-icon { color: #185FA5; font-size: 22px; margin-top: 2px; }
        .about-card-title { font-size: 14px; font-weight: 600; margin-bottom: 3px; }
        .about-card-desc { font-size: 13px; color: #6b7280; }

        /* ROLES */
        .roles-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 18px; }
        .role-card {
            border: 1px solid #e5e7eb; border-radius: 12px;
            padding: 26px; background: #fff;
        }
        .role-card.featured { border: 2px solid #185FA5; }
        .role-badge {
            font-size: 11px; background: #E6F1FB; color: #185FA5;
            padding: 4px 12px; border-radius: 999px;
            display: inline-block; margin-bottom: 14px;
        }
        .role-title { font-size: 17px; font-weight: 600; margin-bottom: 8px; }
        .role-desc { font-size: 13px; color: #6b7280; line-height: 1.6; margin-bottom: 18px; }
        .role-list { list-style: none; display: flex; flex-direction: column; gap: 8px; }
        .role-list li { font-size: 13px; color: #6b7280; display: flex; align-items: center; gap: 8px; }
        .role-list li i { color: #185FA5; font-size: 15px; }

        /* CONTACT */
        .contact-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 48px; align-items: start; }
        .contact-info { display: flex; flex-direction: column; gap: 22px; }
        .contact-item { display: flex; align-items: flex-start; gap: 14px; }
        .contact-item-icon {
            width: 40px; height: 40px; background: #E6F1FB; border-radius: 8px;
            display: flex; align-items: center; justify-content: center;
            color: #185FA5; font-size: 20px; flex-shrink: 0;
        }
        .contact-item-title { font-size: 14px; font-weight: 600; margin-bottom: 3px; }
        .contact-item-val { font-size: 13px; color: #6b7280; }
        .contact-form { display: flex; flex-direction: column; gap: 14px; }
        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
        .contact-form input,
        .contact-form textarea {
            width: 100%; padding: 11px 14px; font-size: 14px;
            border: 1px solid #e5e7eb; border-radius: 8px;
            background: #fff; color: #1a1a1a; outline: none;
        }
        .contact-form input:focus,
        .contact-form textarea:focus { border-color: #185FA5; }
        .contact-form textarea { resize: none; height: 100px; }

        /* FOOTER */
        .footer {
            padding: 32px 48px; background: #f8fafc;
            display: flex; justify-content: space-between;
            align-items: center; flex-wrap: wrap; gap: 14px;
        }
        .footer-logo { font-size: 16px; font-weight: 600; color: #185FA5; }
        .footer-text { font-size: 13px; color: #6b7280; }
        .footer-links { display: flex; gap: 22px; }
        .footer-links a { font-size: 13px; color: #6b7280; text-decoration: none; }
        .footer-links a:hover { color: #185FA5; }

        @media (max-width: 768px) {
            .nav { padding: 14px 20px; }
            .nav-links { display: none; }
            .hero { padding: 48px 20px; }
            .hero h1 { font-size: 28px; }
            .stats { grid-template-columns: 1fr; }
            .stat { border-right: none; border-bottom: 1px solid #e5e7eb; }
            .section { padding: 40px 20px; }
            .about-grid, .contact-grid { grid-template-columns: 1fr; }
            .roles-grid { grid-template-columns: 1fr; }
            .footer { padding: 24px 20px; flex-direction: column; text-align: center; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<nav class="nav">
    <div class="nav-logo">Online <span>Siksha</span></div>
    <ul class="nav-links">
        <li><a href="#home">Home</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#features">Features</a></li>
        <li><a href="#contact">Contact</a></li>
    </ul>
    <a href="/admin"><button class="nav-btn">Sign in</button></a>
</nav>

<!-- HERO -->
<section class="hero" id="home">
    <div class="hero-badge">
        <i class="ti ti-school"></i> Nepal's smart exam platform
    </div>
    <h1>Modern online exams for <span>every school</span></h1>
    <p>Online Siksha makes it easy for schools to create, schedule, and evaluate exams — all in one place.</p>
    <div class="hero-btns">
        <a href="/admin"><button class="btn-primary">Get started <i class="ti ti-arrow-right"></i></button></a>
        <a href="#features"><button class="btn-outline">Learn more</button></a>
    </div>
</section>

<!-- STATS -->
<div class="stats">
    <div class="stat">
        <div class="stat-num">3</div>
        <div class="stat-label">User roles supported</div>
    </div>
    <div class="stat">
        <div class="stat-num">100%</div>
        <div class="stat-label">Auto-graded results</div>
    </div>
    <div class="stat">
        <div class="stat-num">Khalti</div>
        <div class="stat-label">Payment integration</div>
    </div>
</div>

<!-- FEATURES -->
<section class="section" id="features">
    <div class="section-tag">Features</div>
    <div class="section-title">Everything you need for exams</div>
    <div class="section-sub">From timed exams to instant results, Online Siksha handles the full examination lifecycle.</div>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon"><i class="ti ti-clock"></i></div>
            <div class="feature-title">Timed exams</div>
            <div class="feature-desc">Countdown timer with auto-submit when time runs out.</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon"><i class="ti ti-chart-bar"></i></div>
            <div class="feature-title">Instant results</div>
            <div class="feature-desc">Scores calculated and shown immediately after submission.</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon"><i class="ti ti-lock"></i></div>
            <div class="feature-title">Role-based access</div>
            <div class="feature-desc">Separate dashboards for admin, teacher, and student.</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon"><i class="ti ti-calendar"></i></div>
            <div class="feature-title">Exam scheduling</div>
            <div class="feature-desc">Set start and end windows for each exam per class.</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon"><i class="ti ti-refresh"></i></div>
            <div class="feature-title">Re-attempts</div>
            <div class="feature-desc">Students can attempt the same exam multiple times.</div>
        </div>
        <div class="feature-card">
            <div class="feature-icon"><i class="ti ti-bell"></i></div>
            <div class="feature-title">Notifications</div>
            <div class="feature-desc">In-app alerts for exams, results, and subscription expiry.</div>
        </div>
    </div>
</section>

<!-- ABOUT -->
<section class="section" id="about">
    <div class="section-tag">About</div>
    <div class="about-grid">
        <div class="about-text">
            <div class="section-title">Built for Nepali schools</div>
            <p>Online Siksha is a web-based examination platform designed to digitize and automate the entire exam process for educational institutions in Nepal.</p>
            <p>It eliminates manual paperwork, reduces human error, and provides a smooth, reliable examination experience for students, teachers, and administrators.</p>
        </div>
        <div class="about-cards">
            <div class="about-card">
                <i class="ti ti-shield-check about-card-icon"></i>
                <div>
                    <div class="about-card-title">Secure & reliable</div>
                    <div class="about-card-desc">CSRF protection, bcrypt passwords, role middleware on every route.</div>
                </div>
            </div>
            <div class="about-card">
                <i class="ti ti-device-mobile about-card-icon"></i>
                <div>
                    <div class="about-card-title">Works on any device</div>
                    <div class="about-card-desc">Fully responsive UI on desktop, tablet, and mobile browsers.</div>
                </div>
            </div>
            <div class="about-card">
                <i class="ti ti-credit-card about-card-icon"></i>
                <div>
                    <div class="about-card-title">Khalti payments</div>
                    <div class="about-card-desc">Local payment gateway for school subscription plans.</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ROLES -->
<section class="section">
    <div class="section-tag">Roles</div>
    <div class="section-title">Who uses Online Siksha?</div>
    <div class="section-sub">Three dedicated roles, each with a focused dashboard.</div>
    <div class="roles-grid">
        <div class="role-card">
            <div class="role-badge"><i class="ti ti-user"></i> Admin</div>
            <div class="role-title">School admin</div>
            <div class="role-desc">Full control over users, classes, and subscriptions.</div>
            <ul class="role-list">
                <li><i class="ti ti-check"></i> Manage teachers & students</li>
                <li><i class="ti ti-check"></i> Create & assign classes</li>
                <li><i class="ti ti-check"></i> View all results</li>
                <li><i class="ti ti-check"></i> Manage subscriptions</li>
            </ul>
        </div>
        <div class="role-card featured">
            <div class="role-badge"><i class="ti ti-book"></i> Teacher</div>
            <div class="role-title">Teacher</div>
            <div class="role-desc">Create exams and track student performance.</div>
            <ul class="role-list">
                <li><i class="ti ti-check"></i> Create subjects & question sets</li>
                <li><i class="ti ti-check"></i> Schedule exams per class</li>
                <li><i class="ti ti-check"></i> View class results</li>
                <li><i class="ti ti-check"></i> Randomize questions</li>
            </ul>
        </div>
        <div class="role-card">
            <div class="role-badge"><i class="ti ti-school"></i> Student</div>
            <div class="role-title">Student</div>
            <div class="role-desc">Enroll, attempt exams, and track progress.</div>
            <ul class="role-list">
                <li><i class="ti ti-check"></i> Enroll via class code</li>
                <li><i class="ti ti-check"></i> Attempt timed exams</li>
                <li><i class="ti ti-check"></i> View instant results</li>
                <li><i class="ti ti-check"></i> Full attempt history</li>
            </ul>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section class="section" id="contact">
    <div class="section-tag">Contact</div>
    <div class="section-title">Get in touch</div>
    <div class="contact-grid">
        <div class="contact-info">
            <div class="section-sub">Have questions about Online Siksha? We'd love to hear from you.</div>
            <div class="contact-item">
                <div class="contact-item-icon"><i class="ti ti-mail"></i></div>
                <div>
                    <div class="contact-item-title">Email</div>
                    <div class="contact-item-val">info@onlinesiksha.com.np</div>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-item-icon"><i class="ti ti-map-pin"></i></div>
                <div>
                    <div class="contact-item-title">Location</div>
                    <div class="contact-item-val">Kathmandu, Nepal</div>
                </div>
            </div>
            <div class="contact-item">
                <div class="contact-item-icon"><i class="ti ti-phone"></i></div>
                <div>
                    <div class="contact-item-title">Phone</div>
                    <div class="contact-item-val">+977-1-XXXXXXX</div>
                </div>
            </div>
        </div>
        <div class="contact-form">
            <div class="form-row">
                <input type="text" placeholder="Your name" />
                <input type="email" placeholder="Email address" />
            </div>
            <input type="text" placeholder="Subject" />
            <textarea placeholder="Your message..."></textarea>
            <button class="btn-primary" style="align-self: flex-start;">
                Send message <i class="ti ti-send"></i>
            </button>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="footer">
    <div class="footer-logo">Online Siksha</div>
    <div class="footer-text">© 2082-83 Online Siksha. All rights reserved. develop by sagar</div>
    <div class="footer-links">
        <a href="#">Privacy</a>
        <a href="#">Terms</a>
        <a href="#">Support</a>
    </div>
</footer>

</body>
</html>
