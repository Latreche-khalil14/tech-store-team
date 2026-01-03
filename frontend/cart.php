<?php include 'includes/headers.php'; ?>
<title data-i18n="cart_title">سلة التسوق - Tech Store</title>

<div class="container mx-auto px-6 py-16 pb-32 min-h-[70vh]">
    <div class="mb-12" data-aos="fade-left">
        <h1
            class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white tracking-tight flex items-center gap-4">
            <span class="bg-primary/10 dark:bg-primary/20 text-primary p-4 rounded-[1.5rem] shadow-sm">🛒</span>
            <span data-i18n="cart_title">سلة المشتريات</span>
        </h1>
    </div>

    <div class="flex flex-col lg:flex-row gap-12 items-start">
        <!-- Cart Items List -->
        <div class="w-full lg:flex-1 space-y-6" id="cart-items">
            <!-- Loading Placeholder -->
            <div
                class="animate-pulse bg-white dark:bg-slate-800 p-8 rounded-[2.5rem] border border-slate-100 dark:border-slate-700 shadow-soft h-40 w-full">
            </div>
        </div>

        <!-- Summary Sidebar -->
        <div class="w-full lg:w-[420px] space-y-6 lg:sticky lg:top-32" data-aos="fade-up">
            <div
                class="bg-white dark:bg-slate-800 rounded-[2.5rem] p-6 md:p-8 shadow-soft border border-slate-100 dark:border-slate-700 relative overflow-hidden group">
                <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-primary to-accent"></div>

                <h3 class="text-xl md:text-2xl font-black mb-8 border-b border-slate-100 dark:border-slate-700 pb-6 text-slate-900 dark:text-white"
                    data-i18n="cart_summary_title">
                    ملخص الطلب</h3>

                <div class="space-y-6 mb-10">
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 dark:text-slate-400 font-bold" data-i18n="cart_items_count">عدد
                            المنتجات</span>
                        <span id="items-count" class="text-lg font-black text-slate-800 dark:text-white">0 <span
                                data-i18n="cart_piece">قطعة</span></span>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="text-slate-500 dark:text-slate-400 font-bold" data-i18n="cart_shipping">رسوم
                            التوصيل</span>
                        <span
                            class="text-green-600 dark:text-green-400 font-bold bg-green-50 dark:bg-green-900/20 px-3 py-1 rounded-full text-xs border border-green-100 dark:border-green-800"
                            data-i18n="cart_free">مجاني
                            لفترة محدودة</span>
                    </div>
                    <div class="pt-8 border-t border-slate-100 dark:border-slate-700 flex flex-col gap-2">
                        <span class="text-slate-500 dark:text-slate-400 font-bold" data-i18n="cart_total">المجموع
                            النهائي</span>
                        <div class="flex justify-between items-end">
                            <span id="cart-total"
                                class="text-5xl font-black text-slate-900 dark:text-white tracking-tighter">0.00 <span
                                    class="text-2xl text-primary">$</span></span>
                        </div>
                    </div>
                </div>

                <button onclick="handleCheckout()"
                    class="w-full py-5 bg-primary text-white hover:bg-primary/90 font-bold text-xl rounded-2xl transition-all duration-300 shadow-xl shadow-primary/20 hover:shadow-primary/30 transform hover:-translate-y-1 active:scale-95 flex justify-center items-center gap-2 group/btn">
                    <span data-i18n="cart_checkout">إتمام الطلب</span>
                    <span class="group-hover/btn:translate-x-[-5px] transition-transform">←</span>
                </button>
            </div>

            <a href="products.php"
                class="block text-center py-5 bg-transparent border-2 border-slate-200 text-slate-500 font-bold rounded-2xl hover:bg-slate-50 hover:text-slate-700 transition-all duration-300"
                data-i18n="cart_continue">
                مواصلة التسوق
            </a>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        // Flag to prevent concurrent loadCart calls
        let isLoadingCart = false;

        loadCart();

        // Re-apply translations after dynamic cart load
        window.addEventListener('languageChanged', () => {
            loadCart();
        });

        // Listen for storage changes from other tabs/windows
        window.addEventListener('storage', function (e) {
            if (e.key === 'cart') {
                console.log('🔄 Storage event detected - reloading cart');
                loadCart();
            }
        });

        // Listen for cart updates from the same page (custom event)
        window.addEventListener('cartUpdated', function () {
            console.log('🔄 Cart updated event - reloading cart');
            loadCart();
        });

        // Reload cart when page becomes visible (user switches back to this tab)
        document.addEventListener('visibilitychange', function () {
            if (!document.hidden) {
                console.log('👁️ Page visible - reloading cart');
                loadCart();
            }
        });

        // Reload cart when window gains focus
        window.addEventListener('focus', function () {
            console.log('🎯 Window focused - reloading cart');
            loadCart();
        });

        // Reload cart on pageshow (handles back/forward cache)
        window.addEventListener('pageshow', function (event) {
            if (event.persisted) {
                console.log('⏮️ Page restored from cache - reloading cart');
                loadCart();
            }
        });

        async function loadCart() {
            // Prevent concurrent loading
            if (isLoadingCart) {
                console.log('⚠️ Cart is already loading, skipping...');
                return;
            }

            isLoadingCart = true;
            console.log('🛒 Loading cart...');

            let cart = [];
            try {
                const val = localStorage.getItem('cart');
                cart = (val && val !== 'undefined' && val !== 'null') ? JSON.parse(val) : [];
                console.log('📦 Cart items from localStorage:', cart);
            } catch (e) {
                console.error('❌ Error parsing cart from localStorage:', e);
                cart = [];
                localStorage.removeItem('cart');
            }

            if (!Array.isArray(cart) || cart.length === 0) {
                console.log('📭 Cart is empty');
                renderEmptyCart();
                isLoadingCart = false;
                return;
            }

            try {
                console.log(`🔍 Fetching ${cart.length} products from API...`);

                // Use fetch for better Promise compatibility and avoid jQuery cache issues
                const productPromises = cart.map(item => {
                    console.log(`  → Fetching product ID: ${item.id}`);
                    return fetch(`../api/products/get_by_id.php?id=${item.id}`)
                        .then(response => response.json())
                        .catch(err => {
                            console.error(`❌ Failed to fetch product ${item.id}:`, err);
                            return null;
                        });
                });

                const responses = await Promise.all(productPromises);

                console.log(`✅ Received ${responses.length} responses from API`);

                let html = '';
                let total = 0;
                let count = 0;
                let successCount = 0;
                let failedCount = 0;

                responses.forEach((res, index) => {
                    if (res && res.success && res.data) {
                        const p = res.data;
                        const item = cart.find(i => i.id == p.id);

                        if (item) {
                            successCount++;
                            console.log(`  ✓ Product ${p.id} (${p.name}) - Quantity: ${item.quantity}`);

                            const subtotal = parseFloat(p.price) * item.quantity;
                            total += subtotal;
                            count += item.quantity;

                            html += `
                                 <div class="bg-white dark:bg-slate-800 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-700 shadow-soft flex flex-col sm:flex-row items-center gap-8 hover:shadow-lg transition-all duration-300 group relative overflow-hidden" data-aos="fade-up" data-aos-delay="${index * 50}">
                                     <div class="w-32 h-32 bg-slate-50 dark:bg-slate-900 rounded-2xl overflow-hidden shrink-0 group-hover:bg-primary/5 transition-colors">
                                         <img src="${p.image_url}" onerror="this.src=PLACEHOLDER_IMAGE" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                     </div>

                                     <div class="flex-1 min-w-0 text-center sm:text-right">
                                         <span class="text-[10px] font-black text-primary uppercase tracking-[0.2em] mb-2 block" data-i18n="${p.category_name}">${window.t(p.category_name) || 'Tech'}</span>
                                         <h4 class="text-xl font-black text-slate-800 dark:text-white truncate mb-2 group-hover:text-primary transition-colors">${p.name}</h4>
                                         <div class="flex items-center justify-center sm:justify-start gap-2">
                                             <span class="text-2xl font-black text-slate-900 dark:text-white">${p.price}</span>
                                             <span class="text-sm font-bold text-primary">$</span>
                                         </div>
                                     </div>

                                     <div class="flex items-center gap-4 bg-slate-50 dark:bg-slate-900 p-2 rounded-2xl border border-slate-100 dark:border-slate-700">
                                         <button onclick="updateQty(${p.id}, -1)" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white dark:bg-slate-800 shadow-sm hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-500 transition-all font-bold dark:text-white">-</button>
                                         <span class="w-8 text-center font-black text-slate-800 dark:text-white text-lg">${item.quantity}</span>
                                         <button onclick="updateQty(${p.id}, 1)" class="w-10 h-10 flex items-center justify-center rounded-xl bg-white dark:bg-slate-800 shadow-sm hover:bg-primary hover:text-white transition-all font-bold dark:text-white">+</button>
                                     </div>

                                     <button onclick="removeFromCart(${p.id})" class="absolute top-4 left-4 sm:relative sm:top-0 sm:left-0 w-12 h-12 flex items-center justify-center rounded-2xl text-slate-300 hover:text-red-500 hover:bg-red-50 dark:hover:bg-red-900/20 transition-all text-xl" title="${window.t('common_delete')}">
                                         🗑️
                                     </button>
                                 </div>
                            `;
                        }
                    } else {
                        failedCount++;
                        const cartItem = cart[index];
                        console.warn(`  ⚠️ Failed to load product at index ${index}, cart item:`, cartItem);
                    }
                });

                console.log(`📊 Summary: ${successCount} loaded, ${failedCount} failed`);

                if (html === '') {
                    console.log('⚠️ No products rendered, showing empty cart');
                    renderEmptyCart();
                } else {
                    console.log(`💰 Total: $${total.toFixed(2)}, Items: ${count}`);
                    $('#cart-items').html(html);
                    $('#cart-total').html(`${total.toFixed(2)} <span class="text-2xl text-primary">$</span>`);
                    $('#items-count').html(`${count} <span data-i18n="cart_piece">${window.t('cart_piece')}</span>`);

                    // Re-apply translations
                    langManager.applyTranslations(document.getElementById('cart-items'));

                    // CRITICAL: Refresh AOS to show the dynamically added elements
                    if (typeof AOS !== 'undefined') {
                        setTimeout(() => {
                            AOS.refresh();
                            console.log('✨ AOS Refreshed');
                        }, 100);
                    }
                }

            } catch (error) {
                console.error("❌ Error loading cart:", error);
                $('#cart-items').html('<p class="text-center text-red-500">حدث خطأ في تحميل السلة. يرجى المحاولة لاحقاً.</p>');
            } finally {
                // Always reset the loading flag
                isLoadingCart = false;
                console.log('🏁 Cart loading completed');
            }
        }

        function renderEmptyCart() {
            const html = `
                <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] p-20 text-center border-2 border-dashed border-slate-200 dark:border-slate-700" data-aos="zoom-in">
                    <div class="text-8xl mb-6 animate-float inline-block">🛒</div>
                    <h2 class="text-3xl font-black text-slate-800 dark:text-white mb-2" data-i18n="cart_empty_title">${window.t('cart_empty_title')}</h2>
                    <p class="text-slate-500 dark:text-slate-400 mb-8 max-w-xs mx-auto" data-i18n="cart_empty_desc">${window.t('cart_empty_desc')}</p>
                    <a href="products.php" class="inline-block px-10 py-4 bg-gradient-to-r from-primary to-secondary text-white font-black rounded-2xl hover:shadow-2xl hover:shadow-primary/30 transition-all duration-300" data-i18n="cart_start_shopping">${window.t('cart_start_shopping')}</a>
                </div>
            `;
            $('#cart-items').html(html);
            $('#cart-total').html(`0 <span class="text-2xl text-primary">$</span>`);
            $('#items-count').html(`0 <span data-i18n="cart_piece">${window.t('cart_piece')}</span>`);
        }

        window.updateQty = function (id, delta) {
            let cart = JSON.parse(localStorage.getItem('cart'));
            let item = cart.find(i => i.id == id);
            if (item) {
                item.quantity += delta;
                if (item.quantity <= 0) return removeFromCart(id);
                localStorage.setItem('cart', JSON.stringify(cart));
                loadCart();
                updateCartIcon();
            }
        }

        window.removeFromCart = function (id) {
            let cart = JSON.parse(localStorage.getItem('cart'));
            cart = cart.filter(i => i.id != id);
            localStorage.setItem('cart', JSON.stringify(cart));
            loadCart();
            updateCartIcon();
            Swal.fire({
                title: window.t('swal_deleted'),
                text: window.t('swal_delete_info'),
                icon: 'info',
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000
            });
        }

        window.handleCheckout = function () {
            const user = localStorage.getItem('user');
            if (!user) {
                Swal.fire({
                    title: window.t('swal_login_required'),
                    text: window.t('swal_login_text'),
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: window.t('swal_confirm_login'),
                    cancelButtonText: window.t('swal_cancel')
                }).then((result) => {
                    if (result.isConfirmed) {
                        localStorage.setItem('returnUrl', 'checkout.php');
                        window.location.href = 'login.php';
                    }
                });
            } else {
                window.location.href = 'checkout.php';
            }
        }
    });
</script>

<?php include 'includes/footer/footer.php'; ?>