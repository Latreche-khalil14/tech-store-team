<?php include 'includes/headers.php'; ?>
<title data-i18n="p_details">تفاصيل المنتج - Tech Store</title>

<div class="container mx-auto px-6 py-12" id="product-details-container">
    <!-- Dynamic Content from AJAX -->
    <div class="animate-pulse flex flex-col md:flex-row gap-12">
        <div class="flex-1 bg-slate-100 dark:bg-slate-800 h-[400px] rounded-3xl"></div>
        <div class="flex-1 space-y-6 pt-10">
            <div class="h-8 bg-slate-100 dark:bg-slate-800 w-3/4 rounded-lg"></div>
            <div class="h-4 bg-slate-100 dark:bg-slate-800 w-1/4 rounded-lg"></div>
            <div class="h-24 bg-slate-100 dark:bg-slate-800 w-full rounded-lg"></div>
            <div class="h-12 bg-slate-100 dark:bg-slate-800 w-1/3 rounded-lg"></div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        const urlParams = new URLSearchParams(window.location.search);
        const productId = urlParams.get('id');

        if (!productId) {
            location.href = 'products.php';
            return;
        }

        $.get(`../api/products/get_by_id.php?id=${productId}`, function (res) {
            if (res.success) {
                const p = res.data;
                const safeName = p.name.replace(/'/g, "\\'"); // Prevent quote breaking

                const html = `
                    <div class="flex flex-col lg:flex-row gap-8 lg:gap-24 items-start" data-aos="fade-up">
                        
                        <!-- Premium Image Section -->
                        <div class="w-full lg:w-1/2 lg:sticky lg:top-32">
                            <div class="bg-white dark:bg-slate-900 rounded-[2.5rem] md:rounded-[3rem] shadow-soft p-6 md:p-12 h-[320px] sm:h-[450px] md:h-[550px] flex items-center justify-center relative overflow-hidden group border border-slate-100 dark:border-slate-800">
                                <div class="absolute inset-0 bg-gradient-to-br from-slate-50/50 to-white dark:from-slate-900 dark:to-slate-800 -z-10"></div>
                                
                                <!-- Decorative Elements -->
                                <div class="absolute top-10 left-10 w-32 h-32 bg-primary/5 rounded-full blur-3xl"></div>
                                <div class="absolute bottom-10 right-10 w-32 h-32 bg-secondary/5 rounded-full blur-3xl"></div>
                                <img src="${p.image_url}" onerror="this.src=PLACEHOLDER_IMAGE" 
                                    class="max-h-full max-w-full object-contain drop-shadow-2xl group-hover:scale-105 transition-transform duration-1000 ease-out z-10">
                                
                                <div class="absolute top-6 left-6 flex flex-col gap-2 z-20">
                                    <div class="bg-white/80 dark:bg-slate-800/80 backdrop-blur-md px-3 py-1.5 rounded-xl shadow-sm border border-white/50 dark:border-slate-700/50">
                                        <span class="block text-[8px] font-black text-slate-400 uppercase tracking-[0.2em] mb-0.5" data-i18n="p_category">${window.t('p_category')}</span>
                                        <span class="block text-xs font-black text-primary uppercase tracking-wider" data-i18n="${p.category_name}">${window.t(p.category_name) || (window.t ? window.t('nav_logo_sub') : 'Premium Tech')}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Premium Info Section -->
                        <div class="w-full lg:w-1/2 space-y-8 md:space-y-10">
                            <div class="space-y-4">
                                <div class="flex items-center gap-3">
                                    <span class="w-12 h-1 bg-primary rounded-full"></span>
                                    <span class="text-primary font-black text-[10px] uppercase tracking-[0.3em]" data-i18n="p_hardware_tech">${window.t('p_hardware_tech')}</span>
                                </div>
                                <h1 class="text-3xl md:text-5xl lg:text-6xl font-black text-slate-900 dark:text-white leading-tight tracking-tight">${p.name}</h1>
                                <div class="flex items-center gap-4 flex-wrap">
                                    <div class="flex items-center gap-2 bg-green-50 dark:bg-green-900/20 text-green-600 dark:text-green-400 px-3 py-1.5 rounded-xl font-black text-[10px] border border-green-100 dark:border-green-800">
                                        <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                                        <span data-i18n="p_ready_shipping">${window.t('p_ready_shipping')}</span>
                                    </div>
                                    <div class="flex items-center gap-1 text-yellow-400">
                                        <span class="text-sm">★★★★★</span>
                                        <span class="text-slate-400 dark:text-slate-500 text-[10px] font-bold">(4.9/5) <span data-i18n="p_reviews">${window.t('p_reviews')}</span></span>
                                    </div>
                                </div>
                            </div>

                            <p class="text-slate-500 dark:text-slate-400 text-lg md:text-xl leading-relaxed font-medium border-r-4 border-primary/20 pr-6 md:pr-8 italic">
                                ${p.description || (window.t ? window.t('p_default_desc') : '...')}
                            </p>

                            <!-- Pricing Card -->
                            <div class="bg-white dark:bg-slate-900 p-6 md:p-8 rounded-[2.5rem] border border-slate-100 dark:border-slate-800 shadow-soft relative overflow-hidden group">
                                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-accent"></div>
                                <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-6 md:gap-8">
                                    <div class="space-y-1">
                                        <span class="text-[10px] font-black text-slate-400 uppercase tracking-widest" data-i18n="p_exclusive_price">${window.t('p_exclusive_price')}</span>
                                        <div class="flex items-baseline gap-2">
                                            <span class="text-5xl md:text-6xl font-black text-slate-900 dark:text-white tracking-tighter">${p.price}</span>
                                            <span class="text-xl md:text-2xl font-black text-primary">$</span>
                                        </div>
                                    </div>

                                    <div class="flex gap-3 md:gap-4 w-full sm:w-auto">
                                        <button onclick="addToCart(${p.id}, '${safeName}')" 
                                            class="flex-1 sm:px-10 py-4 md:py-5 bg-gradient-to-r from-primary to-primary/80 text-white rounded-2xl font-black text-lg md:text-xl hover:shadow-2xl hover:shadow-primary/40 transition-all transform hover:-translate-y-1 active:scale-95 flex items-center justify-center gap-3 group/btn">
                                            <span data-i18n="p_add_to_cart">${window.t('p_add_to_cart')}</span>
                                            <span class="text-xl group-hover/btn:rotate-12 transition-transform">🛒</span>
                                        </button>
                                        
                                        <button class="w-14 h-14 md:w-16 md:h-16 bg-slate-50 dark:bg-slate-800 text-xl md:text-2xl rounded-2xl border border-slate-100 dark:border-slate-700 hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-500 transition-all flex items-center justify-center group/fav">
                                           <span class="group-hover/fav:scale-120 transition-transform">❤️</span>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <!-- Trust Badges -->
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-4">
                                <div class="flex items-center gap-5 bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-50 dark:border-slate-800 hover:border-primary/20 hover:shadow-md transition-all">
                                    <div class="w-14 h-14 bg-primary/5 text-primary rounded-2xl flex items-center justify-center text-2xl shadow-sm">🛡️</div>
                                    <div>
                                        <p class="font-black text-slate-800 dark:text-white" data-i18n="p_golden_warranty">${window.t('p_golden_warranty')}</p>
                                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider" data-i18n="p_warranty_desc">${window.t('p_warranty_desc')}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-5 bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-50 dark:border-slate-800 hover:border-primary/20 hover:shadow-md transition-all">
                                    <div class="w-14 h-14 bg-primary/5 text-primary rounded-2xl flex items-center justify-center text-2xl shadow-sm">🚀</div>
                                    <div>
                                        <p class="font-black text-slate-800 dark:text-white" data-i18n="p_secure_shipping">${window.t('p_secure_shipping')}</p>
                                        <p class="text-xs text-slate-400 font-bold uppercase tracking-wider" data-i18n="p_shipping_desc">${window.t('p_shipping_desc')}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                $('#product-details-container').html(html);
                if (window.langManager) window.langManager.applyTranslations(document.getElementById('product-details-container'));
            } else {
                Swal.fire({
                    title: window.t ? window.t('p_not_found') : 'Error',
                    icon: 'error'
                }).then(() => {
                    location.href = 'products.php';
                });
            }
        });

        window.addEventListener('languageChanged', () => {
            location.reload(); // Simplest way for complex dynamic content with many translations
        });
    });
</script>

<?php include 'includes/features/features.php'; ?>
<?php include 'includes/footer/footer.php'; ?>