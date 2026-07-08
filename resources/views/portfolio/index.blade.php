@extends('layouts.layout')

@section('title', $profile['name'] . ' | Portofolio CV')

@section('content')
<!-- Hero Section -->
<section id="hero" class="hero-section">
    <div class="hero-bg-glow"></div>
    <div class="hero-container">
        <div class="hero-content">
            <div class="hero-greeting">Halo, nama saya</div>
            <h1 class="hero-title" id="main-title">{{ $profile['name'] }}</h1>
            <p class="hero-description">
                {{ $profile['bio'] }}
            </p>
            <div class="hero-cta">
                <a href="#projects" class="btn btn-primary" id="hero-btn-projects">
                    Lihat Portofolio <i class="fas fa-arrow-right"></i>
                </a>
                <a href="#contact" class="btn btn-secondary" id="hero-btn-contact">Hubungi Saya</a>
            </div>
        </div>
        <div class="hero-image-container">
            <div class="hero-image-frame">
                <img src="{{ asset('img/profile.jpg') }}" onerror="this.style.display='none'; document.getElementById('hero-img-placeholder').style.display='flex';" alt="{{ $profile['name'] }}" class="hero-profile-img">
                <div id="hero-img-placeholder" class="hero-profile-placeholder" style="display: none;">
                    <i class="fa-regular fa-image placeholder-icon"></i>
                    <span class="placeholder-hint">Taruh foto Anda di:<br><code>public/img/profile.jpg</code></span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section">
    <div class="section-container">
        <div class="section-header">
            <h2 class="section-title" id="about-heading">Tentang Saya</h2>
            <div class="section-divider"></div>
        </div>
        <div class="about-grid">
            <div class="about-text-col">
                <p>
                    Saya menyukai pemrogran dibidang website development. Belajar mengenai Laravel dan Flask sebagai Framework. Saya selalu terkarik untuk mempelajari teknologi baru terkait dengan Web Development guna meningkatkan kualitas dan pengalaman saya.
                </p>
                <p>
                    Fokus saya adalah pengembangan website, terutama dibagian Frontend.Saya selalu berusaha untuk memberikan pengalaman digital yang mengesankan. 
                </p>
                
                <div class="about-details">
                    <div class="detail-item">
                        <span class="detail-label">Lokasi:</span>
                        <span class="detail-val">{{ $profile['location'] }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Email:</span>
                        <span class="detail-val">{{ $profile['email'] }}</span>
                    </div>
                    <div class="detail-item">
                        <span class="detail-label">Telepon:</span>
                        <span class="detail-val">{{ $profile['phone'] }}</span>
                    </div>
                </div>

                <div class="about-actions">
                    <a href="{{ $profile['cv_path'] }}" class="btn btn-primary" id="btn-download-cv">
                        <i class="fas fa-download"></i> Unduh CV Lengkap
                    </a>
                </div>
            </div>
            
            <div class="about-education-col">
                <h3>Pendidikan</h3>
                <div class="education-timeline">
                    @foreach($education as $edu)
                    <div class="education-card glass-card">
                        <div class="timeline-dot"></div>
                        <span class="edu-period">{{ $edu['period'] }}</span>
                        <h4>{{ $edu['degree'] ?? $edu['institution'] }}</h4>
                        @if(isset($edu['degree']))
                            <h5>{{ $edu['institution'] }}</h5>
                        @endif
                        @if(isset($edu['gpa']))
                            <p class="gpa-badge"><i class="fas fa-graduation-cap"></i> IPK: {{ $edu['gpa'] }}</p>
                        @endif
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Skills Section -->
<section id="skills" class="skills-section">
    <div class="section-container">
        <div class="section-header">
            <h2 class="section-title" id="skills-heading">Keahlian Saya</h2>
            <div class="section-divider"></div>
        </div>
        <div class="skills-grid">
            @foreach($skills as $category => $items)
            <div class="skills-category-card glass-card">
                <h3>{{ $category }}</h3>
                <div class="skills-list">
                    @foreach($items as $skill)
                    <div class="skill-item">
                        <div class="skill-info">
                            <span class="skill-name">{{ $skill['name'] }}</span>
                            <span class="skill-percentage">{{ $skill['level'] }}%</span>
                        </div>
                        <div class="progress-bar-bg">
                            <div class="progress-bar-fill" style="width: 0%" data-width="{{ $skill['level'] }}%"></div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Experience Section -->
<section id="experience" class="experience-section">
    <div class="section-container">
        <div class="section-header">
            <h2 class="section-title" id="experience-heading">Pengalaman Kerja</h2>
            <div class="section-divider"></div>
        </div>
        <div class="experience-timeline">
            @foreach($experiences as $exp)
            <div class="experience-item">
                <div class="exp-timeline-marker">
                    <div class="exp-marker-dot"></div>
                    <div class="exp-marker-line"></div>
                </div>
                <div class="experience-card glass-card">
                    <span class="exp-period"><i class="far fa-calendar-alt"></i> {{ $exp['period'] }}</span>
                    <h3>{{ $exp['role'] }}</h3>
                    <h4 class="company-name">{{ $exp['company'] }}</h4>
                    <p>{{ $exp['description'] }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Section -->
<section id="projects" class="projects-section">
    <div class="section-container">
        <div class="section-header">
            <h2 class="section-title" id="projects-heading">Portofolio Proyek</h2>
            <div class="section-divider"></div>
        </div>

        <!-- Project Filters -->
        <div class="project-filters">
            <button class="filter-btn active" data-filter="all" id="filter-all">Semua</button>
            <button class="filter-btn" data-filter="web" id="filter-web">Web Dev</button>
            <button class="filter-btn" data-filter="backend" id="filter-backend">Backend API</button>
            <button class="filter-btn" data-filter="design" id="filter-design">UI/UX Design</button>
        </div>

        <!-- Project Grid -->
        <div class="project-grid">
            @foreach($projects as $project)
            <div class="project-card glass-card" data-category="{{ $project['category'] }}">
                <div class="project-image">
                    <!-- Premium Styled Mock Placeholder using dynamic SVG icons and CSS patterns -->
                    <div class="project-placeholder-pattern">
                        @if($project['category'] === 'web')
                            <i class="fa-solid fa-laptop-code project-type-icon"></i>
                        @elseif($project['category'] === 'backend')
                            <i class="fa-solid fa-server project-type-icon"></i>
                        @else
                            <i class="fa-solid fa-compass-drafting project-type-icon"></i>
                        @endif
                    </div>
                </div>
                <div class="project-info">
                    <span class="project-tag">{{ strtoupper($project['category']) }}</span>
                    <h3>{{ $project['title'] }}</h3>
                    <p>{{ $project['description'] }}</p>
                    
                    <div class="project-tech-stack">
                        @foreach($project['tools'] as $tool)
                        <span class="tech-tag">{{ $tool }}</span>
                        @endforeach
                    </div>
                    
                    <div class="project-links">
                        <a href="{{ $project['demo'] }}" class="project-link" aria-label="Demo proyek {{ $project['title'] }}"><i class="fas fa-external-link-alt"></i> Demo</a>
                        <a href="{{ $project['github'] }}" class="project-link" aria-label="GitHub proyek {{ $project['title'] }}"><i class="fab fa-github"></i> Code</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section">
    <div class="section-container">
        <div class="section-header">
            <h2 class="section-title" id="contact-heading">Hubungi Saya</h2>
            <div class="section-divider"></div>
        </div>
        <div class="contact-grid">
            <div class="contact-info-col glass-card">
                <h3>Hubungi untuk Kolaborasi</h3>
                <p>Saya selalu tertarik dengan peluang kolaborasi, magang, atau diskusi proyek menarik. Jangan ragu untuk menghubungi saya melalui saluran berikut:</p>
                
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
                        <div class="info-icon"><i class="fas fa-map-marker-alt"></i></div>
                        <div>
                            <h4>Alamat</h4>
                            <p>{{ $profile['location'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="contact-form-col glass-card">
                <h3>Kirim Pesan</h3>
                <!-- Success/Error Notification Alert Box -->
                <div id="contact-alert" class="alert-box" style="display: none;"></div>

                <form id="portfolio-contact-form" action="{{ route('portfolio.contact') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input type="text" id="name" name="name" required placeholder="Masukkan nama Anda..." class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Alamat Email</label>
                        <input type="email" id="email" name="email" required placeholder="Masukkan email Anda..." class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subjek</label>
                        <input type="text" id="subject" name="subject" required placeholder="Tujuan pesan..." class="form-input">
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Pesan</label>
                        <textarea id="message" name="message" required rows="5" placeholder="Tuliskan pesan Anda di sini..." class="form-input"></textarea>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-submit" id="submit-message-btn">
                        Kirim Pesan <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
