<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class PortfolioController extends Controller
{
    /**
     * Display the portfolio index page with CV data.
     */
    public function index()
    {
        $profile = [
            'name' => 'Rigel Nadimaisy',
            'title' => 'Web Developer',
            'taglines' => ['Web Developer'],
            'bio' => 'Saya adalah seorang mahasiswa Universitas Negeri Yogyakarta program studi S1-Teknolog Informasi. Fokus saya adalah pengembangan website terutama pada bagian Frontend Developmentnya.',
            'email' => 'rigelammarusshidqi42@gmail.com', // Gantilah dengan email Anda
            'phone' => '+62 853-2944-9504',     // Gantilah dengan nomor Anda
            'location' => 'Indonesia',
            'github' => 'https://github.com/Gellsxly',     // Gantilah dengan profil GitHub Anda
            'linkedin' => 'https://linkedin.com', // Gantilah dengan profil LinkedIn Anda
            'cv_path' => '#',                     // Bisa diganti link berkas CV Anda
        ];

        $skills = [
            'Frontend' => [
                ['name' => 'HTML5 / CSS3', 'level' => 90],
                ['name' => 'JavaScript (ES6+)', 'level' => 85],
                ['name' => 'Responsive Design', 'level' => 90],
                ['name' => 'Tailwind CSS', 'level' => 80],
            ],
            'Backend' => [
                ['name' => 'PHP', 'level' => 85],
                ['name' => 'Laravel Framework', 'level' => 80],
                ['name' => 'MySQL / Database', 'level' => 75],
                ['name' => 'API Integration', 'level' => 70],
            ],
            'Tools & Others' => [
                ['name' => 'Git / GitHub', 'level' => 80],
                ['name' => 'Figma (UI/UX)', 'level' => 85],
                ['name' => 'VS Code', 'level' => 90],
            ],
        ];

        $experiences = [
            [
                'role' => 'Magang Web Developer',
                'company' => 'PT. Teknologi Kreatif Nusantara',
                'period' => 'Mar 2025 - Jun 2025',
                'description' => 'Mengembangkan fitur-fitur baru pada platform e-commerce internal menggunakan Laravel dan Tailwind CSS. Berkolaborasi dengan tim backend untuk integrasi API dan melakukan bug fixing.'
            ],
            [
                'role' => 'Freelance Web Designer',
                'company' => 'Mandiri Project',
                'period' => '2024 - Sekarang',
                'description' => 'Merancang dan membuat landing page premium serta website portofolio untuk berbagai klien lokal. Fokus pada estetika visual, kecepatan loading halaman, dan keramahan pengguna.'
            ],
            [
                'role' => 'Asisten Laboratorium Komputer',
                'company' => 'Universitas Indonesia',
                'period' => '2023 - 2024',
                'description' => 'Membimbing praktikan dalam memahami dasar-dasar pemrograman web (HTML, CSS, PHP), memelihara server lokal laboratorium, dan membantu penilaian tugas.'
            ],
        ];

        $education = [
            [
                'institution' => 'SD Negeri 1 Jepara',
                'period' => '2011 - 2017', 
            ],

            [
                'institution' => 'SMP Negeri 1 Jepara',
                'period' => '2017 - 2020', 
            ],

            [
                'institution' => 'SMA Negeri 1 Jepara',
                'period' => '2020 - 2023', 
            ],

            [
                'degree' => 'S1 Teknologi Informasi',
                'institution' => 'Universitas Negeri Yogyakarta',
                'period' => '2023 - 2027',
                'gpa' => '3.77 / 4.00'
            ]
        ];

        $projects = [
            [
                'title' => 'E-Commerce Dashboard',
                'category' => 'web',
                'description' => 'Dasbor administrasi lengkap dengan manajemen inventaris, statistik penjualan interaktif, dan kontrol pesanan konsumen.',
                'image' => 'project_dashboard.jpg',
                'tools' => ['Laravel', 'MySQL', 'ChartJS', 'Bootstrap'],
                'demo' => '#',
                'github' => '#'
            ],
            [
                'title' => 'Mobile Mental Health UI/UX Design',
                'category' => 'design',
                'description' => 'Desain prototipe aplikasi seluler kesehatan mental dengan fokus pada warna yang menenangkan dan alur navigasi yang intuitif.',
                'image' => 'project_design.jpg',
                'tools' => ['Figma', 'UI/UX Design', 'Wireframing'],
                'demo' => '#',
                'github' => '#'
            ],
            [
                'title' => 'Portfolio Website v1',
                'category' => 'web',
                'description' => 'Website portofolio interaktif dengan animasi kustom, light/dark mode, dan glassmorphism minimalis.',
                'image' => 'project_portfolio.jpg',
                'tools' => ['HTML5', 'Vanilla CSS', 'JavaScript', 'AOS'],
                'demo' => '#',
                'github' => '#'
            ],
            [
                'title' => 'E-Learning Platform API',
                'category' => 'backend',
                'description' => 'Restful API untuk platform pembelajaran daring yang mendukung otentikasi JWT, manajemen kelas, tugas, dan kuis.',
                'image' => 'project_api.jpg',
                'tools' => ['Laravel', 'PostgreSQL', 'Sanctum', 'Swagger'],
                'demo' => '#',
                'github' => '#'
            ],
        ];

        return view('portfolio.index', compact('profile', 'skills', 'experiences', 'education', 'projects'));
    }

    /**
     * Handle the contact form submission.
     */
    public function contactSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:150',
            'subject' => 'required|string|max:150',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 422);
        }

        // Di sini Anda bisa menambahkan logika pengiriman email (Mail::to(...))
        // Atau menyimpannya ke database.
        // Untuk saat ini, kita akan log pesannya dan mengembalikan respons sukses.
        Log::info('Pesan Kontak Baru:', $request->all());

        return response()->json([
            'success' => true,
            'message' => 'Pesan Anda berhasil dikirim! Terima kasih telah menghubungi saya.'
        ]);
    }
}
