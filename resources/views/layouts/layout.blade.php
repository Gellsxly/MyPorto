<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <!-- SEO Optimization -->
    <title>@yield('title', 'Rigel Nadimaisy | Portofolio CV & Web Developer')</title>
    <meta name="description" content="Website portofolio profesional Rigel Nadimaisy - Web Developer & UI/UX Designer. Temukan proyek-proyek terbaru, riwayat kerja, dan cara menghubungi saya di sini.">
    <meta name="keywords" content="Rigel Nadimaisy, Portofolio, CV, Web Developer, UI/UX Designer, Laravel Developer, Indonesia, Full Stack Developer">
    <meta name="author" content="Rigel Nadimaisy">
    
    <!-- CSRF Token for Secure AJAX Requests -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google Fonts - Plus Jakarta Sans & Outfit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Outfit:wght@400;600;800&display=swap" rel="stylesheet">

    <!-- FontAwesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Core Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <!-- Header / Navbar -->
    <header class="site-header" id="main-header">
        <nav class="nav-container">
            <a href="#" class="nav-logo" id="logo-link">
                <span class="logo-text">R<span class="logo-dot">.</span>Nadimaisy</span>
            </a>
            
            <button class="nav-toggle" id="nav-toggle-btn" aria-label="Toggle Menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <ul class="nav-menu" id="nav-menu-list">
                <li class="nav-item"><a href="#hero" class="nav-link active" id="nav-link-hero">Beranda</a></li>
                <li class="nav-item"><a href="#about" class="nav-link" id="nav-link-about">Tentang</a></li>
                <li class="nav-item"><a href="#skills" class="nav-link" id="nav-link-skills">Keahlian</a></li>
                <li class="nav-item"><a href="#experience" class="nav-link" id="nav-link-experience">Pengalaman</a></li>
                <li class="nav-item"><a href="#projects" class="nav-link" id="nav-link-projects">Proyek</a></li>
                <li class="nav-item"><a href="#contact" class="nav-link" id="nav-link-contact">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content Area -->
    <main id="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="site-footer" id="main-footer">
        <div class="footer-container">
            <div class="footer-info">
                <h3>Rigel Nadimaisy</h3>
                <p>Membangun pengalaman web digital yang premium, estetis, dan fungsional.</p>
                <div class="footer-socials">
                    <a href="https://github.com" target="_blank" aria-label="GitHub" id="footer-github-link"><i class="fab fa-github"></i></a>
                    <a href="https://linkedin.com" target="_blank" aria-label="LinkedIn" id="footer-linkedin-link"><i class="fab fa-linkedin-in"></i></a>
                    <a href="mailto:rigelnadimaisy@email.com" aria-label="Email" id="footer-email-link"><i class="far fa-envelope"></i></a>
                </div>
            </div>
            <div class="footer-links">
                <h4>Navigasi</h4>
                <ul>
                    <li><a href="#hero">Beranda</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#skills">Keahlian</a></li>
                    <li><a href="#projects">Proyek</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Rigel Nadimaisy. All rights reserved.</p>
        </div>
    </footer>

    <!-- Core JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
