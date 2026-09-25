@extends('layouts.layout')

@section('title', $profile['name'] . ' | Portofolio Web Developer')

@section('content')
{{-- ============================= HERO ============================= --}}
<section id="hero" class="hero-section">
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-badge">
                <i class="fas fa-code"></i> Web Developer
            </div>
            <h1 class="hero-title" id="main-title">{{ $profile['name'] }}</h1>
            <p class="hero-description">
                {{ $profile['bio'] }}
            </p>
            <div class="hero-cta">
                <a href="#projects" class="btn btn-primary" id="hero-btn-projects">
                    Lihat Proyek <i class="fas fa-arrow-right"></i>
                </a>
                <a href="#contact" class="btn btn-secondary" id="hero-btn-contact">Hubungi Saya</a>
            </div>
        </div>
        <div class="hero-image-container">
            <div class="hero-image-frame">
                <img src="{{ asset('img/profile.jpg') }}"
                     onerror="this.style.display='none'; document.getElementById('hero-img-placeholder').style.display='flex';"
                     alt="{{ $profile['name'] }}"
                     class="hero-profile-img">
                <div id="hero-img-placeholder" class="hero-profile-placeholder" style="display: none;">
                    <i class="fa-regular fa-image placeholder-icon"></i>
                    <span class="placeholder-hint">Taruh foto Anda di:<br><code>public/img/profile.jpg</code></span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================= ABOUT ============================= --}}
<section id="about" class="about-section">
    <div class="section-container">
        <div class="section-header">
            <span class="section-label">Siapa Saya</span>
            <h2 class="section-title" id="about-heading">Tentang Saya</h2>
            <div class="section-divider"></div>
        </div>
        <div class="about-grid">
            <div class="about-text-col">
                <p>
                    Saya menyukai pemrograman di bidang website development. Belajar mengenai Laravel dan Flask sebagai Framework. Saya selalu tertarik untuk mempelajari teknologi baru terkait dengan Web Development guna meningkatkan kualitas dan pengalaman saya.
                </p>
                <p>
                    Fokus saya adalah pengembangan website, terutama di bagian Frontend. Saya selalu berusaha untuk memberikan pengalaman digital yang mengesankan.
                </p>

                <div class="about-details">
                    <div class="detail-item">
                        <span class="detail-label">Lokasi</span>
                        <span class="detail-val">{{ $profile['location'] }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Email</span>
                        <span class="detail-val">{{ $profile['email'] }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Telepon</span>
                        <span class="detail-val">{{ $profile['phone'] }}</span>
                    </div>
                </div>

                <div class="about-actions">
                    <a href="{{ $profile['github'] }}" target="_blank" class="btn btn-secondary" id="btn-github-profile">
                        <i class="fab fa-github"></i> GitHub
                    </a>
                </div>
            </div>

            <div class="about-education-col">
                <h3>Riwayat Pendidikan</h3>
                <div class="education-timeline">
                    @foreach($education as $edu)
                    <div class="education-card">
                        <div class="timeline-dot"></div>
                        <span class="edu-period">{{ $edu['period'] }}</span>
                        <h4>{{ $edu['degree'] ?? $edu['institution'] }}</h4>
                        @if(isset($edu['degree']))
                            <h5>{{ $edu['institution'] }}</h5>
                        @endif
                        @if(isset($edu['gpa']))
                            <p class="gpa-badge"><i class="fas fa-star"></i> IPK: {{ $edu['gpa'] }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ============================= SKILLS ============================= --}}
<section id="skills" class="skills-section">
    <div class="section-container">
        <div class="section-header">
            <span class="section-label">Kemampuan</span>
            <h2 class="section-title" id="skills-heading">Keahlian Saya</h2>
            <div class="section-divider"></div>
        </div>
        <div class="skills-icon-grid">
            @foreach($skills as $skill)
            <div class="skill-icon-card card">
                <div class="skill-icon-wrap" style="background: {{ $skill['color'] }}18; color: {{ $skill['color'] }};">
                    <i class="{{ $skill['icon'] }}"></i>
                </div>
                <span class="skill-icon-name">{{ $skill['name'] }}</span>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= PROJECTS ============================= --}}
<section id="projects" class="projects-section">
    <div class="section-container">
        <div class="section-header">
            <span class="section-label">Karya Saya</span>
            <h2 class="section-title" id="projects-heading">Portofolio Proyek</h2>
            <div class="section-divider"></div>
        </div>

        <div class="project-grid">
            @foreach($projects as $project)
            <div class="project-card">
                <div class="project-image">
                    @if(!empty($project['image']))
                        <img src="{{ asset('img/' . $project['image']) }}"
                             alt="{{ $project['title'] }}"
                             class="project-img"
                             onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                        <div class="project-placeholder-pattern" style="display:none;">
                            @if(strtolower($project['category']) === 'web')
                                <i class="fa-solid fa-laptop-code project-type-icon"></i>
                            @elseif(strtolower($project['category']) === 'backend')
                                <i class="fa-solid fa-server project-type-icon"></i>
                            @else
                                <i class="fa-solid fa-compass-drafting project-type-icon"></i>
                            @endif
                        </div>
                    @else
                        <div class="project-placeholder-pattern">
                            @if(strtolower($project['category']) === 'web')
                                <i class="fa-solid fa-laptop-code project-type-icon"></i>
                            @elseif(strtolower($project['category']) === 'backend')
                                <i class="fa-solid fa-server project-type-icon"></i>
                            @else
                                <i class="fa-solid fa-compass-drafting project-type-icon"></i>
                            @endif
                        </div>
                    @endif
                </div>
                <div class="project-info">
                    <span class="project-tag">{{ strtoupper($project['category']) }}</span>
                    <h3>{{ $project['title'] }}</h3>
                    <p>{{ $project['description'] }}</p>

                    <div class="project-links">
                        <a href="{{ $project['github'] }}" target="_blank" class="project-link github"
                           aria-label="GitHub proyek {{ $project['title'] }}">
                            <i class="fab fa-github"></i> Lihat di GitHub
                        </a>
                        @if($project['demo'] !== '#')
                        <a href="{{ $project['demo'] }}" target="_blank" class="project-link"
                           aria-label="Demo proyek {{ $project['title'] }}">
                            <i class="fas fa-external-link-alt"></i> Demo
                        </a>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

{{-- ============================= CONTACT ============================= --}}
<section id="contact" class="contact-section">
    <div class="section-container">
        <div class="section-header">
            <span class="section-label">Get In Touch</span>
            <h2 class="section-title" id="contact-heading">Hubungi Saya</h2>
            <div class="section-divider"></div>
        </div>

        <div class="contact-center-wrap">
            <div class="contact-info-col card contact-card-big">
                <h3>Mari Berkolaborasi <i class="fas fa-handshake" style="color: var(--color-primary); margin-left: 8px;"></i></h3>
                <p>Saya selalu tertarik dengan peluang kolaborasi, magang, atau diskusi proyek menarik. Jangan ragu untuk menghubungi saya melalui salah satu kontak berikut.</p>

                <div class="contact-info-list">
                    <div class="contact-info-item">
                        <div class="info-icon"><i class="fas fa-envelope"></i></div>
                        <div>
                            <h4>Email</h4>
                            <p>{{ $profile['email'] }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="info-icon"><i class="fas fa-phone"></i></div>
                        <div>
                            <h4>Telepon</h4>
                            <p>{{ $profile['phone'] }}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="info-icon"><i class="fab fa-github"></i></div>
                        <div>
                            <h4>GitHub</h4>
                            <p><a href="{{ $profile['github'] }}" target="_blank" style="color: var(--color-primary);">github.com/Gellsxly</a></p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h4>Lokasi</h4>
                            <p>{{ $profile['location'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
