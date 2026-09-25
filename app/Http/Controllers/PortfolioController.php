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
            'email' => 'career.rigel@gmail.com', // Gantilah dengan email Anda
            'phone' => '+62 853-2944-9504',     // Gantilah dengan nomor Anda
            'location' => 'Indonesia',
            'github' => 'https://github.com/Gellsxly',     // Gantilah dengan profil GitHub Anda
            'linkedin' => 'https://linkedin.com', // Gantilah dengan profil LinkedIn Anda
            'cv_path' => '#',                     // Bisa diganti link berkas CV Anda
        ];

        $skills = [
            ['name' => 'Laravel Framework', 'icon' => 'fa-brands fa-laravel',       'color' => '#FF2D20'],
            ['name' => 'HTML',              'icon' => 'fa-brands fa-html5',          'color' => '#E44D26'],
            ['name' => 'GitHub',            'icon' => 'fa-brands fa-github',         'color' => '#1b1f2e'],
            ['name' => 'Figma',             'icon' => 'fa-brands fa-figma',          'color' => '#A259FF'],
            ['name' => 'VS Code',           'icon' => 'fa-solid fa-code',            'color' => '#007ACC'],
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
                'period' => '2023 - 2027 (Perkiraan)',
                'gpa' => '3.77 (Smt 6)'
            ]
        ];

        $projects = [
            [
                'title' => 'Website PortofolioKU',
                'category' => 'web',
                'description' => 'Website Portofolio Pribadi',
                'image' => 'MyPorto.jpeg',
                'tools' => ['Laravel', 'MySQL', 'ChartJS', 'Bootstrap'],
                'demo' => '#',
                'github' => 'https://github.com/Gellsxly/MyPorto'
            ],
            [
                'title' => 'Website Padukuhan Ngemplak Kalangan',
                'category' => 'design',
                'description' => 'Mendesain dan mengerjakan project pada bagian frontend untuk website padukuhan ngemplak kalangan',
                'image' => 'padukuhan.jpeg',
                'tools' => ['Figma', 'UI/UX Design', 'Wireframing'],
                'demo' => '#',
                'github' => 'https://github.com/Snku1/ngemplak-kalangan-web'
            ],
            [
                'title' => 'Sistem Penulisan Hibah Buku (Book Grant System)',
                'category' => 'Web',
                'description' => 'Team base project kuliah pengembangan sistem penulisan hibah buku divisi Frontend Development',
                'image' => 'Hibah Buku.jpeg',
                'tools' => ['Figma', 'UI/UX Design', 'Wireframing'],
                'demo' => '#',
                'github' => 'https://github.com/RizalHaryaputra/book-grant-frontend'
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
