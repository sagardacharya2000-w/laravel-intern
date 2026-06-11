<footer class="os-footer">
    <div class="os-footer-top">

        {{-- BRAND --}}
        <div class="os-footer-brand">
            <a href="{{ url('/') }}" class="os-logo" style="color:#fff">
                <div class="os-logo-mark">
                    <svg viewBox="0 0 16 16" fill="none" stroke="#fff" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M8 1L14 5V11L8 15L2 11V5L8 1Z"/>
                        <path d="M8 1V15M2 5L14 11M14 5L2 11"/>
                    </svg>
                </div>
                <span>Online<strong style="color:rgba(255,255,255,0.4)">Siksha</strong></span>
            </a>
            <p>A web-based exam management platform built for schools in Nepal. Powered by Laravel and Filament.</p>
        </div>

        {{-- PLATFORM --}}
        <div class="os-footer-col">
            <h4>Platform</h4>
            <ul>
                <li><a href="#features">Features</a></li>
                <li><a href="#pricing">Pricing</a></li>
                <li><a href="#how">How it works</a></li>
            </ul>
        </div>

        {{-- ROLES --}}
        <div class="os-footer-col">
            <h4>Roles</h4>
            <ul>
                <li><a href="#">For Admins</a></li>
                <li><a href="#">For Teachers</a></li>
                <li><a href="#">For Students</a></li>
            </ul>
        </div>

        {{-- LEGAL --}}
        <div class="os-footer-col">
            <h4>Legal</h4>
            <ul>
                <li><a href="#">Privacy Policy</a></li>
                <li><a href="#">Terms of Use</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>

    </div>

    <div class="os-footer-bottom">
        <span>© {{ date('Y') }} Online Siksha. Developed by Sagar Acharya and Team.</span>
        <div class="os-footer-links">
            <a href="#">Privacy</a>
            <a href="#">Terms</a>
            <a href="#contact">Contact</a>
        </div>
    </div>
</footer>
