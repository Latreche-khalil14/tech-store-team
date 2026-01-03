<?php function renderPageHeader($title, $subtitle, $badge, $accentWord, $i18nKeys = [])
{
    $ph_title_key = isset($i18nKeys[0]) ? 'data-i18n="' . $i18nKeys[0] . '"' : '';
    $ph_desc_key = isset($i18nKeys[1]) ? 'data-i18n="' . $i18nKeys[1] . '"' : '';
    $ph_badge_key = isset($i18nKeys[2]) ? 'data-i18n="' . $i18nKeys[2] . '"' : '';
    $ph_accent_key = isset($i18nKeys[3]) ? 'data-i18n="' . $i18nKeys[3] . '"' : '';
    ?>
    <!-- Modern Product Header -->
    <section class="relative py-24 bg-background dark:bg-slate-900 overflow-hidden transition-colors duration-500">
        <!-- Background Decor -->
        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-7xl pointer-events-none">
            <div
                class="absolute top-10 left-10 w-64 h-64 bg-primary/10 rounded-full blur-3xl mix-blend-multiply animate-blob">
            </div>
            <div
                class="absolute top-10 right-10 w-64 h-64 bg-secondary/10 rounded-full blur-3xl mix-blend-multiply animate-blob animation-delay-2000">
            </div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center" data-aos="fade-down">
            <span
                class="inline-block py-1 px-3 rounded-full bg-primary/10 text-primary text-xs font-bold tracking-widest mb-4 border border-primary/20"
                <?php echo $ph_badge_key; ?>>
                <?php echo $badge; ?>
            </span>
            <h1 class="text-5xl md:text-6xl font-black mb-6 tracking-tight text-slate-900 dark:text-white">
                <span <?php echo $ph_title_key; ?>><?php echo $title; ?></span>
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-primary to-accent" <?php echo $ph_accent_key; ?>><?php echo $accentWord; ?></span>
            </h1>
            <p class="text-slate-500 dark:text-slate-400 max-w-2xl mx-auto text-lg font-medium leading-relaxed" <?php echo $ph_desc_key; ?>>
                <?php echo $subtitle; ?>
            </p>
        </div>
    </section>
<?php } ?>