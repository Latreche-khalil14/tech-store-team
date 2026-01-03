<?php
// Security Headers
header("X-XSS-Protection: 1; mode=block");
header("X-Content-Type-Options: nosniff");
header("X-Frame-Options: SAMEORIGIN");
header("Content-Security-Policy: default-src 'self' https: data: 'unsafe-inline' 'unsafe-eval';");

// Get current page for active state
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>
        // Check for dark mode preference early to prevent flash
        if (localStorage.getItem('theme') === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title data-i18n="site_title">Tech Store - التجربة العصرية</title>

    <!-- Preconnect to external domains for faster loading -->
    <link rel="preconnect" href="https://cdn.tailwindcss.com">
    <link rel="preconnect" href="https://code.jquery.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="dns-prefetch" href="https://cdn.jsdelivr.net">

    <!-- Critical CSS inline -->
    <style>
        body {
            font-family: 'Outfit', 'Tajawal', sans-serif;
            background-color: #f8fafc;
            margin: 0;
            padding: 0
        }

        .navbar-glass {
            background: rgba(255, 255, 255, .75);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px)
        }
    </style>

    <!-- Load Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Load jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!-- Tailwind Config -->
    <script>

        const PLACEHOLDER_IMAGE = "data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='400' height='400' viewBox='0 0 400 400'%3E%3Crect width='400' height='400' fill='%23f1f5f9'/%3E%3Ctext x='50%25' y='50%25' font-family='sans-serif' font-size='24' fill='%2394a3b8' dominant-baseline='middle' text-anchor='middle'%3ENo Image%3C/text%3E%3C/svg%3E";

        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: { DEFAULT: '#4f46e5', hover: '#4338ca', light: '#e0e7ff' },
                        secondary: { DEFAULT: '#ec4899', hover: '#db2777', light: '#fce7f3' },
                        accent: { DEFAULT: '#06b6d4', hover: '#0891b2' },
                        surface: '#ffffff',
                        background: '#f8fafc',
                        dark: '#1e293b',
                    },
                    boxShadow: {
                        'soft': '0 20px 40px -15px rgba(79, 70, 229, 0.1)',
                        'glow': '0 0 20px rgba(79, 70, 229, 0.3)',
                        'navbar': '0 4px 30px rgba(79, 70, 229, 0.08)',
                    },
                    borderRadius: { '4xl': '2.5rem' },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-soft': 'pulse-soft 2s ease-in-out infinite',
                        'blob': 'blob 7s infinite',
                    },
                    keyframes: {
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Font Loading -->
    <link
        href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;900&family=Tajawal:wght@400;500;700;800&display=swap"
        rel="stylesheet">

    <!-- CSS Loading -->
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dark-mode.css?v=1.7">


    <!-- Load tsParticles only if needed (defer loading) -->
    <script src="https://cdn.jsdelivr.net/npm/tsparticles-slim@2.0.6/tsparticles.slim.bundle.min.js" defer></script>

    <!-- Load SweetAlert2 (defer loading) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11" defer></script>

    <!-- Modular JS Modules -->
    <script src="assets/js/ui.js?v=1.6"></script>
    <script src="assets/js/products.js?v=1.4"></script>
    <script src="assets/js/cart.js?v=1.3"></script>
    <script src="assets/js/lang.js?v=1.1"></script>

</head>

<body class="bg-background text-slate-800 overflow-x-hidden antialiased">

    <?php include __DIR__ . '/navbar/navbar.php'; ?>
    <?php include __DIR__ . '/mobile-menu/mobile-menu.php'; ?>

    <!-- Spacer -->
    <div class="h-20"></div>

    <!-- Navbar JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navbar = document.getElementById('navbar');

            // Scroll effect
            window.addEventListener('scroll', function () {
                if (window.scrollY > 50) {
                    navbar.classList.add('scrolled');
                } else {
                    navbar.classList.remove('scrolled');
                }
            });

            if (window.location.search.includes('order_success=true')) {
                localStorage.removeItem('cart');
                localStorage.setItem('cart', '[]');
                if (typeof updateCartIcon === 'function') updateCartIcon();
            }
        });
    </script>