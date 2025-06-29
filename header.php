<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="sticky top-0 z-50 bg-white dark:bg-gray-900 shadow">
    <div class="container mx-auto flex items-center justify-between py-4 px-6">
        <div class="flex items-center gap-2">
            <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/logo.svg" alt="AFTCalculator Logo" class="h-8 w-8">
                <span class="font-bold text-xl tracking-tight text-gray-900 dark:text-white">AFTCalculator</span>
            </a>
        </div>
        <nav class="hidden md:flex gap-8">
            <a href="#home" class="nav-link">Home</a>
            <a href="#about" class="nav-link">About</a>
            <a href="#blog" class="nav-link">Blog</a>
        </nav>
        <button id="darkModeToggle" class="ml-4 p-2 rounded bg-gray-200 dark:bg-gray-700 text-gray-800 dark:text-gray-200" aria-label="Toggle dark mode">
            <svg id="sunIcon" class="h-5 w-5 hidden" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M12 3v2m0 14v2m9-9h-2M5 12H3m15.364-6.364l-1.414 1.414M6.343 17.657l-1.414 1.414m12.728 0l-1.414-1.414M6.343 6.343L4.929 4.929"/><circle cx="12" cy="12" r="5"/></svg>
            <svg id="moonIcon" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1111.21 3a7 7 0 109.79 9.79z"/></svg>
        </button>
    </div>
</header>
