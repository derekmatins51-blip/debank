<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: false, mobileMenuOpen: false }" x-init="darkMode = localStorage.getItem('darkMode') === 'true' || (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches)" :class="{ 'dark': darkMode }">
<head>
    <title>@yield('title') - {{$settings->site_name}}</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="robots" content="index, follow">
    <meta name="apple-mobile-web-app-title" content="{{$settings->site_name}}">
    <meta name="application-name" content="{{$settings->site_name}}">
    <meta name="description" content="Swift and Secure Money Transfer to any UK bank account will become a breeze with {{$settings->site_name}}.">
    <link rel="shortcut icon" href="{{ asset('storage/app/public/' . $settings->favicon) }}">
    
    <!-- Dark mode initialization -->
    <script>
        const isDarkMode = localStorage.getItem('darkMode') === 'true' || 
                          (!localStorage.getItem('darkMode') && window.matchMedia('(prefers-color-scheme: dark)').matches);
        
        if (isDarkMode) {
            document.documentElement.classList.add('dark');
        }
    </script>
    

    
    <!-- Tailwind CSS with custom color variables -->
    <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: { // Dynamic primary colors from appearance settings
                            50: '{{ isset($appearanceSettings->primary_color_50) ? $appearanceSettings->primary_color_50 : "#f0f9ff" }}',
                            100: '{{ isset($appearanceSettings->primary_color_100) ? $appearanceSettings->primary_color_100 : "#e0f2fe" }}',
                            200: '{{ isset($appearanceSettings->primary_color_200) ? $appearanceSettings->primary_color_200 : "#bae6fd" }}',
                            300: '{{ isset($appearanceSettings->primary_color_300) ? $appearanceSettings->primary_color_300 : "#7dd3fc" }}',
                            400: '{{ isset($appearanceSettings->primary_color_400) ? $appearanceSettings->primary_color_400 : "#38bdf8" }}',
                            DEFAULT: '{{ isset($appearanceSettings->primary_color) ? $appearanceSettings->primary_color : "#0ea5e9" }}',
                            500: '{{ isset($appearanceSettings->primary_color) ? $appearanceSettings->primary_color : "#0ea5e9" }}',
                            600: '{{ isset($appearanceSettings->primary_color_600) ? $appearanceSettings->primary_color_600 : "#0284c7" }}',
                            700: '{{ isset($appearanceSettings->primary_color_700) ? $appearanceSettings->primary_color_700 : "#0369a1" }}',
                            foreground: '{{ isset($appearanceSettings->primary_color_foreground) ? $appearanceSettings->primary_color_foreground : "#ffffff" }}',
                        },
                        secondary: { // Dynamic secondary colors from appearance settings
                            50: '{{ isset($appearanceSettings->secondary_color_50) ? $appearanceSettings->secondary_color_50 : "#f8fafc" }}',
                            100: '{{ isset($appearanceSettings->secondary_color_100) ? $appearanceSettings->secondary_color_100 : "#f1f5f9" }}',
                            200: '{{ isset($appearanceSettings->secondary_color_200) ? $appearanceSettings->secondary_color_200 : "#e2e8f0" }}',
                            300: '{{ isset($appearanceSettings->secondary_color_300) ? $appearanceSettings->secondary_color_300 : "#cbd5e1" }}',
                            400: '{{ isset($appearanceSettings->secondary_color_400) ? $appearanceSettings->secondary_color_400 : "#94a3b8" }}',
                            DEFAULT: '{{ isset($appearanceSettings->secondary_color) ? $appearanceSettings->secondary_color : "#64748b" }}',
                            500: '{{ isset($appearanceSettings->secondary_color) ? $appearanceSettings->secondary_color : "#64748b" }}',
                            600: '{{ isset($appearanceSettings->secondary_color_600) ? $appearanceSettings->secondary_color_600 : "#475569" }}',
                            700: '{{ isset($appearanceSettings->secondary_color_700) ? $appearanceSettings->secondary_color_700 : "#334155" }}',
                            foreground: '{{ isset($appearanceSettings->secondary_color_foreground) ? $appearanceSettings->secondary_color_foreground : "#0f172a" }}',
                        },
                        accent: { // Dynamic accent colors from appearance settings
                            50: '{{ isset($appearanceSettings->accent_color_50) ? $appearanceSettings->accent_color_50 : "#fdf2f8" }}',
                            100: '{{ isset($appearanceSettings->accent_color_100) ? $appearanceSettings->accent_color_100 : "#fce7f3" }}',
                            200: '{{ isset($appearanceSettings->accent_color_200) ? $appearanceSettings->accent_color_200 : "#fbcfe8" }}',
                            300: '{{ isset($appearanceSettings->accent_color_300) ? $appearanceSettings->accent_color_300 : "#f9a8d4" }}',
                            400: '{{ isset($appearanceSettings->accent_color_400) ? $appearanceSettings->accent_color_400 : "#f472b6" }}',
                            DEFAULT: '{{ isset($appearanceSettings->accent_color) ? $appearanceSettings->accent_color : "#ec4899" }}',
                            500: '{{ isset($appearanceSettings->accent_color) ? $appearanceSettings->accent_color : "#ec4899" }}',
                            600: '{{ isset($appearanceSettings->accent_color_600) ? $appearanceSettings->accent_color_600 : "#db2777" }}',
                            700: '{{ isset($appearanceSettings->accent_color_700) ? $appearanceSettings->accent_color_700 : "#be185d" }}',
                            foreground: '{{ isset($appearanceSettings->accent_color_foreground) ? $appearanceSettings->accent_color_foreground : "#ffffff" }}',
                        },
                        background: '{{ isset($appearanceSettings->background_color) ? $appearanceSettings->background_color : "#f8fafc" }}',
                        foreground: '{{ isset($appearanceSettings->foreground_color) ? $appearanceSettings->foreground_color : "#1e293b" }}',
                        card: {
                            DEFAULT: '{{ isset($appearanceSettings->card_color) ? $appearanceSettings->card_color : "#ffffff" }}',
                            foreground: '{{ isset($appearanceSettings->card_foreground_color) ? $appearanceSettings->card_foreground_color : "#1e293b" }}',
                        },
                        muted: {
                            DEFAULT: '{{ isset($appearanceSettings->muted_color) ? $appearanceSettings->muted_color : "#f1f5f9" }}',
                            foreground: '{{ isset($appearanceSettings->muted_foreground_color) ? $appearanceSettings->muted_foreground_color : "#64748b" }}',
                        },
                        border: '{{ isset($appearanceSettings->border_color) ? $appearanceSettings->border_color : "#e2e8f0" }}',
                        input: '{{ isset($appearanceSettings->input_color) ? $appearanceSettings->input_color : "#e2e8f0" }}',
                        ring: '{{ isset($appearanceSettings->ring_color) ? $appearanceSettings->ring_color : "#0ea5e9" }}',
                        
                        // Specific colors from original design for gradients/highlights
                        'gradient-pink-from': '{{ isset($appearanceSettings->gradient_pink_from) ? $appearanceSettings->gradient_pink_from : "#ec4899" }}',
                        'gradient-purple-via': '{{ isset($appearanceSettings->gradient_purple_via) ? $appearanceSettings->gradient_purple_via : "#a855f7" }}',
                        'gradient-indigo-to': '{{ isset($appearanceSettings->gradient_indigo_to) ? $appearanceSettings->gradient_indigo_to : "#4f46e5" }}',
                        
                        'mobile-header-bg': '#1e293b', // Dark slate for mobile top section
                        'mobile-header-text': '#f1f5f9', // Light text for mobile top section
                        
                        'yellow-action': '{{ isset($appearanceSettings->yellow_action) ? $appearanceSettings->yellow_action : "#facc15" }}',
                        'green-positive': '{{ isset($appearanceSettings->green_positive) ? $appearanceSettings->green_positive : "#22c55e" }}',
                        'red-negative': '{{ isset($appearanceSettings->red_negative) ? $appearanceSettings->red_negative : "#ef4444" }}',
                    },
                    boxShadow: {
                        'soft': '0 2px 15px -3px rgba(0, 0, 0, 0.07), 0 10px 20px -2px rgba(0, 0, 0, 0.04)',
                        'top': '0 -4px 12px -1px rgba(0,0,0,0.05), 0 -2px 8px -1px rgba(0,0,0,0.03)',
                    },
                    borderRadius: {
                        lg: '0.75rem',
                        xl: '0.75rem', 
                        '2xl': '1rem',
                        '3xl': '1.5rem',
                    },
                    keyframes: {
                        pulse: {
                          '0%, 100%': { transform: 'scale(1)', boxShadow: '0 0 0 0 rgba(14, 165, 233, 0.4)' }, // primary color
                          '50%': { transform: 'scale(1.05)', boxShadow: '0 0 0 10px rgba(14, 165, 233, 0)' },
                        },
                        shine: { 
                          '0%': { transform: 'translateX(-100%) translateY(-100%) rotate(45deg)' },
                          '100%': { transform: 'translateX(100%) translateY(100%) rotate(45deg)' },
                        },
                        float: {
                          '0%, 100%': { transform: 'translateY(0px)' },
                          '50%': { transform: 'translateY(-10px)' },
                        },
                        'float-delayed': {
                          '0%, 100%': { transform: 'translateY(0px) rotate(0deg)' },
                          '50%': { transform: 'translateY(-15px) rotate(180deg)' },
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 2.5s infinite',
                        'shine-once': 'shine 1.5s ease-in-out',
                        'float': 'float 3s ease-in-out infinite',
                        'float-delayed': 'float-delayed 4s ease-in-out infinite',
                    }
                }
            }
        }
    </script>
    
    <!-- Alpine.js -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/aquawolf04/font-awesome-pro@5cd1511/css/all.css">
    
    <!-- External Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    @if(isset($appearanceSettings) && $appearanceSettings->custom_css)
    <style>
        {!! $appearanceSettings->custom_css !!}
    </style>
    @endif
    
    @if(isset($appearanceSettings) && $appearanceSettings->disable_animations)
    <style>
        * {
            animation: none !important;
            transition: none !important;
        }
    </style>
    @endif
    

    
    <style>
        body {
            font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
            background-color: theme('colors.background');
            color: theme('colors.foreground');
        }

        ::-webkit-scrollbar { width: 8px; height: 8px; }
        ::-webkit-scrollbar-track { background: #e2e8f0; } /* slate-200 */
        ::-webkit-scrollbar-thumb { background: #94a3b8; border-radius: 4px; } /* slate-400 */
        ::-webkit-scrollbar-thumb:hover { background: #64748b; } /* slate-500 */

        .dark ::-webkit-scrollbar-track { background: #374151; } /* gray-700 */
        .dark ::-webkit-scrollbar-thumb { background: #6b7280; } /* gray-500 */
        .dark ::-webkit-scrollbar-thumb:hover { background: #9ca3af; } /* gray-400 */

        .custom-scrollbar::-webkit-scrollbar { width: 6px; height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: transparent; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; } /* slate-300 */
        .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #94a3b8; } /* slate-400 */

        .dark .custom-scrollbar::-webkit-scrollbar-thumb { background: #6b7280; } /* gray-500 */
        .dark .custom-scrollbar::-webkit-scrollbar-thumb:hover { background: #9ca3af; } /* gray-400 */

        .shine-effect-container { position: relative; overflow: hidden; }
        .shine-effect {
            position: absolute; top: -50%; left: -50%;
            width: 200%; height: 200%;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0) 0%, rgba(255, 255, 255, 0.2) 50%, rgba(255, 255, 255, 0) 100%);
            transform: rotate(45deg); opacity: 0; transition: opacity 0.5s;
        }
        .shine-effect-container:hover .shine-effect { opacity: 1; animation: shine-once 1.5s ease-in-out; }

        .fade-in-section { opacity: 0; transform: translateY(20px); transition: opacity 0.6s ease-out, transform 0.6s ease-out; }
        .fade-in-section.is-visible { opacity: 1; transform: translateY(0); }

        /* Floating elements animation */
        .floating {
            animation: float 3s ease-in-out infinite;
        }
        .floating-slow {
            animation: float 6s ease-in-out infinite;
        }
        .floating-slower {
            animation: float 8s ease-in-out infinite;
        }
        
        /* Float keyframes */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        /* Float with delay */
        .animate-float {
            animation: float 4s ease-in-out infinite;
        }
        
        .animate-float-delayed {
            animation: float 6s ease-in-out infinite;
            animation-delay: 1s;
        }
        
        /* Interactive elements */
        .input-wrapper {
            position: relative;
            transition: all 0.3s ease;
        }
        
        .input-wrapper:focus-within {
            transform: translateY(-2px);
        }
        
        .input-icon {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            left: 1rem;
            color: #94a3b8;
            transition: color 0.3s ease;
        }
        
        .input-wrapper:focus-within .input-icon {
            color: var(--primary-color);
        }
        
        input:focus + .input-toggle {
            color: var(--primary-color);
        }
        
        .dark .input-icon {
            color: #6b7280;
        }
        
        /* Dark mode toggle button styling */
        .dark-mode-toggle {
            transition: all 0.3s ease;
        }
        
        .dark-mode-toggle:hover {
            transform: scale(1.1);
        }

        /* Gradient backgrounds */
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .gradient-primary {
            background: linear-gradient(135deg, #0ea5e9 0%, #3b82f6 100%);
        }
        
        .gradient-secondary {
            background: linear-gradient(135deg, #64748b 0%, #475569 100%);
        }



        /* Mobile Fixed Buttons */
        .mobile-fixed-buttons {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            margin: 0 auto;
            z-index: 50;
            display: flex;
        }

        @media (min-width: 1024px) {
            .mobile-fixed-buttons {
                display: none;
            }
        }


    </style>
    @laravelPWA
</head>

<body class="font-sans bg-white dark:bg-gray-900 text-gray-900 dark:text-gray-100">


    <!-- Mobile Fixed Login/Register Buttons -->
    <div class="mobile-fixed-buttons">
        <a href="{{ route('login') }}" class="flex-1 px-6 py-3 bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl text-primary-600 dark:text-primary-400 font-semibold shadow-lg border border-primary-200 dark:border-primary-700 hover:bg-primary-50 dark:hover:bg-gray-700 transition-colors text-center">
            <i class="fa-solid fa-sign-in-alt mr-2"></i>
            Login
        </a>
        <a href="{{ route('register') }}" class="flex-1 px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold shadow-lg transition-colors text-center">
            <i class="fa-solid fa-user-plus mr-2"></i>
            Register
        </a>
    </div>



    <!-- Navigation Header -->
    <nav class="relative bg-gradient-to-r from-white via-primary-50 to-white dark:from-gray-900 dark:via-primary-900 dark:to-gray-900 backdrop-blur-xl border-b border-gradient-to-r from-transparent via-primary-200/50 to-transparent dark:border-primary-700/30 sticky top-0 z-50 shadow-lg shadow-primary-500/5">
        <!-- Animated Background Pattern -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-10 -left-10 w-20 h-20 bg-primary-200/20 dark:bg-primary-800/20 rounded-full blur-xl animate-pulse"></div>
            <div class="absolute -top-5 right-1/4 w-16 h-16 bg-teal-200/20 dark:bg-teal-800/20 rounded-full blur-lg animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute -bottom-10 -right-10 w-24 h-24 bg-purple-200/20 dark:bg-purple-800/20 rounded-full blur-xl animate-pulse" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16 lg:h-18">
                <!-- Logo with glow effect -->
                <div class="flex items-center group">
                    <div class="relative">
                        <div class="absolute inset-0 bg-primary-400/20 rounded-xl blur-lg group-hover:bg-primary-400/30 transition-all duration-300"></div>
                        <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}" class="relative h-10 lg:h-10 w-auto">
                    </div>
                </div>

                <!-- Desktop Navigation with modern styling -->
                <div class="hidden lg:flex items-center space-x-1">
                    <a href="{{ route('home') }}" class="relative px-4 py-2 text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:text-primary-600 dark:hover:text-primary-400 group">
                        <span class="relative z-10">Home</span>
                        <div class="absolute inset-0 bg-primary-50 dark:bg-primary-900/30 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300 origin-center"></div>
                    </a>
                    <a href="{{ route('about') }}" class="relative px-4 py-2 text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:text-primary-600 dark:hover:text-primary-400 group">
                        <span class="relative z-10">About</span>
                        <div class="absolute inset-0 bg-primary-50 dark:bg-primary-900/30 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300 origin-center"></div>
                    </a>
                    <div class="relative group">
                        <button class="relative px-4 py-2 text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:text-primary-600 dark:hover:text-primary-400 flex items-center">
                            <span class="relative z-10">Services</span>
                            <i class="fa-solid fa-chevron-down ml-1 text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                            <div class="absolute inset-0 bg-primary-50 dark:bg-primary-900/30 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300 origin-center"></div>
                        </button>
                        <!-- Services Dropdown -->
                        <div class="absolute top-full left-0 mt-2 w-64 bg-white dark:bg-gray-800 rounded-2xl shadow-2xl border border-gray-200 dark:border-gray-700 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 z-50">
                            <div class="p-2">
                                <a href="{{ route('personal') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/30 rounded-xl transition-all duration-300">
                                    <i class="fa-solid fa-user mr-3 text-primary-500"></i>
                                    Personal Banking
                                </a>
                                <a href="{{ route('business') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/30 rounded-xl transition-all duration-300">
                                    <i class="fa-solid fa-briefcase mr-3 text-blue-500"></i>
                                    Business Banking
                                </a>
                                <a href="{{ route('loans') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/30 rounded-xl transition-all duration-300">
                                    <i class="fa-solid fa-handshake mr-3 text-green-500"></i>
                                    Loans & Credit
                                </a>
                                <a href="{{ route('cards') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/30 rounded-xl transition-all duration-300">
                                    <i class="fa-solid fa-credit-card mr-3 text-purple-500"></i>
                                    Cards
                                </a>
                                <a href="{{ route('grants') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 hover:bg-primary-50 dark:hover:bg-primary-900/30 rounded-xl transition-all duration-300">
                                    <i class="fa-solid fa-hand-holding-dollar mr-3 text-orange-500"></i>
                                    Grants & Aid
                                </a>
                            </div>
                        </div>
                    </div>
                    <a href="{{ route('contact') }}" class="relative px-4 py-2 text-gray-700 dark:text-gray-300 font-medium transition-all duration-300 hover:text-primary-600 dark:hover:text-primary-400 group">
                        <span class="relative z-10">Contact</span>
                        <div class="absolute inset-0 bg-primary-50 dark:bg-primary-900/30 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300 origin-center"></div>
                    </a>
                </div>

                <!-- Desktop Action Buttons with enhanced styling -->
                <div class="hidden lg:flex items-center space-x-3">
                    

                    <!-- Dark Mode Toggle with animation -->
                    <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)" 
                            class="relative p-3 rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 text-gray-600 dark:text-gray-300 hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 transition-all duration-300 shadow-lg hover:shadow-xl hover:-translate-y-0.5 group">
                        <i class="fa-solid fa-sun text-lg group-hover:rotate-180 transition-transform duration-500" x-show="darkMode"></i>
                        <i class="fa-solid fa-moon text-lg group-hover:rotate-12 transition-transform duration-300" x-show="!darkMode"></i>
                    </button>
                    
                    <!-- Login Button with hover effects -->
                    <a href="{{ route('login') }}" class="relative px-4 py-2.5 text-primary-600 dark:text-primary-400 hover:text-primary-700 dark:hover:text-primary-300 font-semibold transition-all duration-300 group">
                        <span class="relative z-10">Login</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-primary-50 to-primary-100 dark:from-primary-900/30 dark:to-primary-800/30 rounded-xl scale-0 group-hover:scale-100 transition-transform duration-300"></div>
                    </a>
                    
                    <!-- Open Account Button with premium styling -->
                    <a href="{{ route('register') }}" class="relative px-6 py-2.5 bg-gradient-to-r from-primary-600 via-primary-500 to-primary-600 hover:from-primary-700 hover:via-primary-600 hover:to-primary-700 text-white font-semibold rounded-2xl transition-all duration-300 shadow-lg shadow-primary-600/25 hover:shadow-xl hover:shadow-primary-600/40 hover:-translate-y-0.5 group overflow-hidden">
                        <span class="relative z-10 flex items-center">
                            <i class="fa-solid fa-sparkles mr-2 group-hover:animate-spin"></i>
                            Open Account
                        </span>
                        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
                    </a>
                </div>

                <!-- Mobile Menu Button with modern design -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden relative p-3 rounded-2xl bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700 text-gray-600 dark:text-gray-300 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5">
                    <i class="fa-solid fa-bars text-lg transition-transform duration-300" x-show="!mobileMenuOpen" :class="{'rotate-180': mobileMenuOpen}"></i>
                    <i class="fa-solid fa-times text-lg transition-transform duration-300" x-show="mobileMenuOpen" :class="{'rotate-180': !mobileMenuOpen}"></i>
                </button>
            </div>
        </div>

        <!-- Enhanced Mobile Menu -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-1 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-1 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="lg:hidden absolute top-full left-0 right-0 bg-gradient-to-br from-white via-primary-50 to-white dark:from-gray-900 dark:via-primary-900 dark:to-gray-900 backdrop-blur-xl border-t border-primary-200/70 dark:border-primary-700/50 shadow-2xl shadow-primary-500/20">
            
            <!-- Mobile menu background pattern -->
            <div class="absolute inset-0 overflow-hidden">
                <div class="absolute top-0 left-1/4 w-32 h-32 bg-primary-200/20 dark:bg-primary-800/20 rounded-full blur-2xl"></div>
                <div class="absolute bottom-0 right-1/4 w-24 h-24 bg-teal-200/20 dark:bg-teal-800/20 rounded-full blur-xl"></div>
            </div>
            
            <div class="relative px-6 py-6 space-y-2">
                <!-- Navigation Links with enhanced styling -->
                <a href="{{ route('home') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                    <i class="fa-solid fa-home mr-4 text-primary-500 group-hover:scale-110 transition-transform duration-300"></i>
                    <span>Home</span>
                    <i class="fa-solid fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
                </a>
                <a href="{{ route('about') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                    <i class="fa-solid fa-info-circle mr-4 text-teal-500 group-hover:scale-110 transition-transform duration-300"></i>
                    <span>About</span>
                    <i class="fa-solid fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
                </a>
                
                <!-- Services Submenu -->
                <div x-data="{ servicesOpen: false }" class="space-y-2">
                    <button @click="servicesOpen = !servicesOpen" class="flex items-center w-full px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                        <i class="fa-solid fa-cogs mr-4 text-purple-500 group-hover:scale-110 transition-transform duration-300"></i>
                        <span>Services</span>
                        <i class="fa-solid fa-chevron-down ml-auto text-xs transition-transform duration-300" :class="{ 'rotate-180': servicesOpen }"></i>
                    </button>
                    <div x-show="servicesOpen" x-transition class="ml-8 space-y-1">
                        <a href="{{ route('personal') }}" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 text-sm transition-all duration-300 rounded-xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30">
                            <i class="fa-solid fa-user mr-3 text-primary-400"></i>
                            Personal Banking
                        </a>
                        <a href="{{ route('business') }}" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 text-sm transition-all duration-300 rounded-xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30">
                            <i class="fa-solid fa-briefcase mr-3 text-blue-400"></i>
                            Business Banking
                        </a>
                        <a href="{{ route('loans') }}" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 text-sm transition-all duration-300 rounded-xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30">
                            <i class="fa-solid fa-handshake mr-3 text-green-400"></i>
                            Loans & Credit
                        </a>
                        <a href="{{ route('cards') }}" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 text-sm transition-all duration-300 rounded-xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30">
                            <i class="fa-solid fa-credit-card mr-3 text-purple-400"></i>
                            Cards
                        </a>
                        <a href="{{ route('grants') }}" class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-400 hover:text-primary-600 dark:hover:text-primary-400 text-sm transition-all duration-300 rounded-xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30">
                            <i class="fa-solid fa-hand-holding-dollar mr-3 text-orange-400"></i>
                            Grants & Aid
                        </a>
                    </div>
                </div>
                
                <a href="{{ route('contact') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                    <i class="fa-solid fa-envelope mr-4 text-orange-500 group-hover:scale-110 transition-transform duration-300"></i>
                    <span>Contact</span>
                    <i class="fa-solid fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
                </a>
                
                <!-- Additional Mobile Links -->
                <a href="{{ route('apps') }}" class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                    <i class="fa-solid fa-mobile-alt mr-4 text-indigo-500 group-hover:scale-110 transition-transform duration-300"></i>
                    <span>Mobile App</span>
                    <i class="fa-solid fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
                </a>
                
                <!-- Enhanced Dark Mode Toggle for Mobile -->
                <div class="pt-4 mt-4 border-t border-primary-700/50">
                    

                    <button @click="darkMode = !darkMode; localStorage.setItem('darkMode', darkMode)" 
                            class="flex items-center w-full px-4 py-3 text-gray-700 dark:text-gray-300 hover:text-primary-600 dark:hover:text-primary-400 font-medium transition-all duration-300 rounded-2xl hover:bg-gradient-to-r hover:from-primary-50 hover:to-primary-100 dark:hover:from-primary-900/30 dark:hover:to-primary-800/30 hover:shadow-lg hover:translate-x-2 group">
                        <div class="flex items-center justify-center w-8 h-8 mr-4 rounded-xl bg-gradient-to-br from-yellow-400 to-orange-500 dark:from-blue-500 dark:to-purple-600 group-hover:scale-110 transition-transform duration-300">
                            <i class="fa-solid fa-sun text-white text-sm group-hover:rotate-180 transition-transform duration-500" x-show="darkMode"></i>
                            <i class="fa-solid fa-moon text-white text-sm group-hover:rotate-12 transition-transform duration-300" x-show="!darkMode"></i>
                        </div>
                        <span x-text="darkMode ? 'Switch to Light Mode' : 'Switch to Dark Mode'"></span>
                        <i class="fa-solid fa-chevron-right ml-auto text-xs opacity-0 group-hover:opacity-100 transition-all duration-300"></i>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')
    
    <!-- Enhanced Footer -->
    <footer class="relative bg-gradient-to-br from-slate-900 via-primary-900 to-slate-900 dark:from-gray-900 dark:via-primary-900 dark:to-gray-900 text-white py-16 mb-20 lg:mb-0 overflow-hidden">
        <!-- Animated background elements -->
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute -top-20 -left-20 w-40 h-40 bg-primary-600/20 rounded-full blur-3xl animate-pulse"></div>
            <div class="absolute top-1/2 -right-20 w-32 h-32 bg-teal-500/20 rounded-full blur-2xl animate-pulse" style="animation-delay: 1s;"></div>
            <div class="absolute -bottom-20 left-1/3 w-36 h-36 bg-purple-600/20 rounded-full blur-3xl animate-pulse" style="animation-delay: 2s;"></div>
            
            <!-- Floating geometric shapes -->
            <div class="absolute top-10 right-1/4 w-4 h-4 bg-white/10 rotate-45 animate-bounce" style="animation-delay: 0.5s;"></div>
            <div class="absolute bottom-1/4 left-1/4 w-3 h-3 bg-primary-300/30 rounded-full animate-bounce" style="animation-delay: 1.5s;"></div>
            <div class="absolute top-1/3 left-1/2 w-2 h-2 bg-teal-400/40 rotate-45 animate-bounce" style="animation-delay: 2.5s;"></div>
        </div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Main Footer Content -->
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8 mb-12">
                <!-- Company Info with enhanced styling -->
                <div class="lg:col-span-1">
                    <div class="group mb-6">
                        <div class="relative inline-block">
                            <div class="absolute inset-0 bg-white/20 rounded-2xl blur-lg group-hover:bg-white/30 transition-all duration-300"></div>
                            <img src="{{ asset('storage/app/public/' . $settings->logo) }}" alt="{{ $settings->site_name }}" class="relative h-10 w-auto">
                        </div>
                    </div>
                    <p class="text-primary-100 mb-6 text-sm leading-relaxed">
                        Building financial strength together with personalized banking solutions for every member. Your trusted partner in financial growth.
                    </p>
                    
                    <!-- Enhanced Social Links -->
                    <div class="flex space-x-3">
                        <a href="#" class="group relative w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-700 hover:from-blue-600 hover:to-blue-700 rounded-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-xl">
                            <i class="fa-brands fa-facebook-f text-sm group-hover:scale-110 transition-transform duration-300"></i>
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                        <a href="#" class="group relative w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-700 hover:from-sky-500 hover:to-sky-600 rounded-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-xl">
                            <i class="fa-brands fa-twitter text-sm group-hover:scale-110 transition-transform duration-300"></i>
                            <div class="absolute inset-0 bg-gradient-to-br from-sky-400 to-sky-500 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                        <a href="#" class="group relative w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-700 hover:from-blue-700 hover:to-blue-800 rounded-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-xl">
                            <i class="fa-brands fa-linkedin-in text-sm group-hover:scale-110 transition-transform duration-300"></i>
                            <div class="absolute inset-0 bg-gradient-to-br from-blue-600 to-blue-700 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                        <a href="#" class="group relative w-10 h-10 bg-gradient-to-br from-primary-600 to-primary-700 hover:from-pink-600 hover:to-pink-700 rounded-2xl flex items-center justify-center transition-all duration-300 hover:scale-110 hover:-translate-y-1 shadow-lg hover:shadow-xl">
                            <i class="fa-brands fa-instagram text-sm group-hover:scale-110 transition-transform duration-300"></i>
                            <div class="absolute inset-0 bg-gradient-to-br from-pink-500 to-pink-600 rounded-2xl opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                        </a>
                    </div>
                </div>

                <!-- Quick Links with modern styling -->
                <div>
                    <h4 class="font-bold mb-6 text-white flex items-center">
                        <div class="w-1 h-6 bg-gradient-to-b from-primary-400 to-primary-600 rounded-full mr-3"></div>
                        Quick Links
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('about') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-primary-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">About Us</span>
                        </a></li>
                        <li><a href="{{ route('personal') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-primary-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Services</span>
                        </a></li>
                        <li><a href="{{ route('grants') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-primary-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Grants & Aid</span>
                        </a></li>
                        <li><a href="{{ route('contact') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-primary-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Contact</span>
                        </a></li>
                    </ul>
                </div>

                <!-- Services -->
                <div>
                    <h4 class="font-bold mb-6 text-white flex items-center">
                        <div class="w-1 h-6 bg-gradient-to-b from-teal-400 to-teal-600 rounded-full mr-3"></div>
                        Services
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('personal') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-teal-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Personal Banking</span>
                        </a></li>
                        <li><a href="{{ route('business') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-teal-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Business Banking</span>
                        </a></li>
                        <li><a href="{{ route('loans') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-teal-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Loans & Credit</span>
                        </a></li>
                        <li><a href="{{ route('cards') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-teal-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Cards</span>
                        </a></li>
                    </ul>
                </div>

                <!-- Member Services -->
                <div>
                    <h4 class="font-bold mb-6 text-white flex items-center">
                        <div class="w-1 h-6 bg-gradient-to-b from-purple-400 to-purple-600 rounded-full mr-3"></div>
                        Member Services
                    </h4>
                    <ul class="space-y-3">
                        <li><a href="{{ route('login') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-purple-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Online Banking</span>
                        </a></li>
                        <li><a href="{{ route('apps') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-purple-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Mobile App</span>
                        </a></li>
                        <li><a href="{{ route('contact') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-purple-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">ATM Locations</span>
                        </a></li>
                        <li><a href="{{ route('verify') }}" class="group flex items-center text-primary-100 hover:text-white transition-all duration-300 text-sm">
                            <i class="fa-solid fa-chevron-right text-xs mr-3 text-purple-400 group-hover:translate-x-1 transition-transform duration-300"></i>
                            <span class="group-hover:translate-x-1 transition-transform duration-300">Security Center</span>
                        </a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Footer with enhanced styling -->
            <div class="border-t border-primary-700/50 pt-8">
                <div class="flex flex-col lg:flex-row justify-between items-center space-y-4 lg:space-y-0">
                    <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-6">
                        <p class="text-primary-100 text-sm">
                            © {{ date('Y') }} {{ $settings->site_name }}. All rights reserved.
                        </p>
                        <div class="flex items-center space-x-2 text-primary-200 text-xs">
                            <i class="fa-solid fa-shield-alt text-green-400"></i>
                            <span>FDIC Insured</span>
                            <span class="text-primary-400">•</span>
                            <i class="fa-solid fa-lock text-blue-400"></i>
                            <span>256-bit SSL</span>
                        </div>
                    </div>
                    <div class="flex flex-wrap justify-center lg:justify-end space-x-6">
                        <a href="{{ route('privacy') }}" class="text-primary-100 hover:text-white text-sm transition-colors duration-300 hover:underline">Privacy Policy</a>
                        <a href="{{ route('terms') }}" class="text-primary-100 hover:text-white text-sm transition-colors duration-300 hover:underline">Terms of Service</a>
                        <a href="{{ route('contact') }}" class="text-primary-100 hover:text-white text-sm transition-colors duration-300 hover:underline">Accessibility</a>
                        <a href="{{ route('home') }}" class="text-primary-100 hover:text-white text-sm transition-colors duration-300 hover:underline">Sitemap</a>
                    </div>
                </div>
            </div>
                 </div>
     </footer>

     <!-- Mobile Fixed Login/Register Buttons -->
    <div class="mobile-fixed-buttons">
        <a href="{{ route('login') }}" class="flex-1 px-6 py-3 bg-white/90 dark:bg-gray-800/90 backdrop-blur-xl text-primary-600 dark:text-primary-400 font-semibold shadow-lg border border-primary-200 dark:border-primary-700 hover:bg-primary-50 dark:hover:bg-gray-700 transition-colors text-center">
            <i class="fa-solid fa-sign-in-alt mr-2"></i>
            Login
        </a>
        <a href="{{ route('register') }}" class="flex-1 px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-semibold shadow-lg transition-colors text-center">
            <i class="fa-solid fa-user-plus mr-2"></i>
            Register
        </a>
    </div>
     
     <!-- Additional Scripts -->
     @yield('scripts')

     <!-- Language Translation Script -->
     <script type="text/javascript">
         let currentLanguage = 'en';
         
         function changeLanguage(langCode) {
             if (langCode === currentLanguage) return;
             
             currentLanguage = langCode;
             updateFlagDisplay(langCode);
             
             // Store language preference
             localStorage.setItem('selectedLanguage', langCode);
             
             // Use Microsoft Translator (more reliable than Google)
             if (langCode === 'en') {
                 // Reset to original language
                 location.reload();
             } else {
                 // Redirect to Microsoft Translator
                 const currentUrl = encodeURIComponent(window.location.href);
                 const translateUrl = `https://www.microsofttranslator.com/bv.aspx?from=en&to=${langCode}&a=${currentUrl}`;
                 window.open(translateUrl, '_blank');
             }
         }
         
         function updateFlagDisplay(langCode) {
             const flags = {
                 'en': '🇺🇸',
                 'es': '🇪🇸', 
                 'fr': '🇫🇷',
                 'de': '🇩🇪',
                 'it': '🇮🇹',
                 'pt': '🇵🇹'
             };
             
             // Update desktop flag
             const desktopFlag = document.querySelector('.relative.group button span');
             if (desktopFlag && flags[langCode]) {
                 desktopFlag.textContent = flags[langCode];
             }
             
             // Update mobile flag  
             const mobileFlag = document.querySelector('[x-data*="languageOpen"] .bg-gradient-to-br span');
             if (mobileFlag && flags[langCode]) {
                 mobileFlag.textContent = flags[langCode];
             }
         }
         
         // Simple client-side translation using MyMemory API (free)
         async function translatePage(langCode) {
             if (langCode === 'en') {
                 location.reload();
                 return;
             }
             
             try {
                 // Show loading indicator
                 showTranslationLoading();
                 
                 // Get all translatable text elements
                 const textElements = document.querySelectorAll('h1, h2, h3, h4, h5, h6, p, span:not(.no-translate), button:not(.no-translate), a:not(.no-translate), div:not(.no-translate)');
                 const textsToTranslate = [];
                 
                 textElements.forEach(element => {
                     const text = element.textContent.trim();
                     // Skip if empty, is a number, contains only symbols, or is marked as no-translate
                     if (text && 
                         text.length > 1 && 
                         !element.classList.contains('no-translate') &&
                         !element.closest('.no-translate') &&
                         !/^[\d\s\$\€\£\¥\+\-\*\/\=\(\)\[\]\{\}\<\>\|\\\^\~\`\!\@\#\%\&\_\?\.\,\;\:\"\']+$/.test(text) &&
                         !element.querySelector('input, select, textarea, img, svg') &&
                         element.children.length === 0) {
                         
                         textsToTranslate.push({
                             element: element,
                             originalText: text
                         });
                     }
                 });
                 
                 // Translate in batches to avoid API limits
                 const batchSize = 10;
                 for (let i = 0; i < textsToTranslate.length; i += batchSize) {
                     const batch = textsToTranslate.slice(i, i + batchSize);
                     await translateBatch(batch, langCode);
                     
                     // Small delay between batches
                     if (i + batchSize < textsToTranslate.length) {
                         await new Promise(resolve => setTimeout(resolve, 500));
                     }
                 }
                 
                 hideTranslationLoading();
                 
             } catch (error) {
                 console.error('Translation error:', error);
                 hideTranslationLoading();
                 alert('Translation service is currently unavailable. Please try again later.');
             }
         }
         
         async function translateBatch(batch, langCode) {
             for (const item of batch) {
                 try {
                     const translatedText = await translateText(item.originalText, langCode);
                     if (translatedText && translatedText !== item.originalText) {
                         item.element.textContent = translatedText;
                     }
                 } catch (error) {
                     console.error('Error translating text:', error);
                     // Continue with next item if one fails
                 }
             }
         }
         
         async function translateText(text, targetLang) {
             try {
                 // Use MyMemory API (free, no API key required)
                 const response = await fetch(`https://api.mymemory.translated.net/get?q=${encodeURIComponent(text)}&langpair=en|${targetLang}`);
                 const data = await response.json();
                 
                 if (data.responseStatus === 200 && data.responseData && data.responseData.translatedText) {
                     return data.responseData.translatedText;
                 }
                 
                 // Fallback: try LibreTranslate if MyMemory fails
                 return await translateWithLibre(text, targetLang);
                 
             } catch (error) {
                 console.error('Translation API error:', error);
                 // Fallback to basic dictionary for common words
                 return translateBasic(text, targetLang);
             }
         }
         
         async function translateWithLibre(text, targetLang) {
             try {
                 // LibreTranslate public instance (backup)
                 const response = await fetch('https://libretranslate.com/translate', {
                     method: 'POST',
                     headers: {
                         'Content-Type': 'application/json',
                     },
                     body: JSON.stringify({
                         q: text,
                         source: 'en',
                         target: targetLang,
                         format: 'text'
                     })
                 });
                 
                 const data = await response.json();
                 return data.translatedText || text;
                 
             } catch (error) {
                 console.error('LibreTranslate error:', error);
                 return text;
             }
         }
         
         function translateBasic(text, targetLang) {
             // Basic dictionary for common banking terms
             const dictionary = {
                 'es': {
                     'Home': 'Inicio',
                     'About': 'Acerca de',
                     'Services': 'Servicios',
                     'Contact': 'Contacto',
                     'Login': 'Iniciar Sesión',
                     'Register': 'Registrarse',
                     'Open Account': 'Abrir Cuenta',
                     'Banking': 'Banca',
                     'Personal Banking': 'Banca Personal',
                     'Business Banking': 'Banca Empresarial',
                     'Loans': 'Préstamos',
                     'Cards': 'Tarjetas',
                     'Language': 'Idioma'
                 },
                 'fr': {
                     'Home': 'Accueil',
                     'About': 'À propos',
                     'Services': 'Services',
                     'Contact': 'Contact',
                     'Login': 'Connexion',
                     'Register': 'S\'inscrire',
                     'Open Account': 'Ouvrir un Compte',
                     'Banking': 'Banque',
                     'Personal Banking': 'Banque Personnelle',
                     'Business Banking': 'Banque d\'Entreprise',
                     'Loans': 'Prêts',
                     'Cards': 'Cartes',
                     'Language': 'Langue'
                 },
                 'de': {
                     'Home': 'Startseite',
                     'About': 'Über uns',
                     'Services': 'Dienstleistungen',
                     'Contact': 'Kontakt',
                     'Login': 'Anmelden',
                     'Register': 'Registrieren',
                     'Open Account': 'Konto Eröffnen',
                     'Banking': 'Banking',
                     'Personal Banking': 'Privatkundengeschäft',
                     'Business Banking': 'Firmenkundengeschäft',
                     'Loans': 'Kredite',
                     'Cards': 'Karten',
                     'Language': 'Sprache'
                 },
                 'it': {
                     'Home': 'Casa',
                     'About': 'Chi siamo',
                     'Services': 'Servizi',
                     'Contact': 'Contatto',
                     'Login': 'Accedi',
                     'Register': 'Registrati',
                     'Open Account': 'Apri Conto',
                     'Banking': 'Banking',
                     'Personal Banking': 'Banking Personale',
                     'Business Banking': 'Banking Aziendale',
                     'Loans': 'Prestiti',
                     'Cards': 'Carte',
                     'Language': 'Lingua'
                 },
                 'pt': {
                     'Home': 'Início',
                     'About': 'Sobre',
                     'Services': 'Serviços',
                     'Contact': 'Contato',
                     'Login': 'Entrar',
                     'Register': 'Registrar',
                     'Open Account': 'Abrir Conta',
                     'Banking': 'Bancário',
                     'Personal Banking': 'Banco Pessoal',
                     'Business Banking': 'Banco Empresarial',
                     'Loans': 'Empréstimos',
                     'Cards': 'Cartões',
                     'Language': 'Idioma'
                 }
             };
             
             return dictionary[targetLang] && dictionary[targetLang][text] ? dictionary[targetLang][text] : text;
         }
         
         function getLanguageName(code) {
             const names = {
                 'es': 'Spanish',
                 'fr': 'French', 
                 'de': 'German',
                 'it': 'Italian',
                 'pt': 'Portuguese'
             };
             return names[code] || code;
         }
         
         function showTranslationLoading() {
             // Create loading overlay
             const overlay = document.createElement('div');
             overlay.id = 'translation-loading';
             overlay.className = 'fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50';
             overlay.innerHTML = `
                 <div class="bg-white dark:bg-gray-800 rounded-2xl p-6 text-center">
                     <div class="animate-spin rounded-full h-8 w-8 border-b-2 border-primary-600 mx-auto mb-4"></div>
                     <p class="text-gray-700 dark:text-gray-300">Translating page...</p>
                 </div>
             `;
             document.body.appendChild(overlay);
         }
         
         function hideTranslationLoading() {
             const overlay = document.getElementById('translation-loading');
             if (overlay) {
                 overlay.remove();
             }
         }
         
         // Initialize on page load
         document.addEventListener('DOMContentLoaded', function() {
             // Load saved language preference
             const savedLanguage = localStorage.getItem('selectedLanguage');
             if (savedLanguage && savedLanguage !== 'en') {
                 currentLanguage = savedLanguage;
                 updateFlagDisplay(savedLanguage);
             }
         });
         
         // Update the changeLanguage function to use the new approach
         window.changeLanguage = function(langCode) {
             currentLanguage = langCode;
             updateFlagDisplay(langCode);
             localStorage.setItem('selectedLanguage', langCode);
             
             if (langCode === 'en') {
                 location.reload();
             } else {
                 translatePage(langCode);
             }
         };
     </script>
   

@include('layouts.livechat')
</body>
</html>