<?php
require_once '../config/database.php';
require_once '../config/helpers.php';
requireLogin();
include 'includes/headers.php';
?>
<title data-i18n="checkout_title">إتمام الطلب - Tech Store</title>

<script>
    if (!localStorage.getItem('user')) {
        localStorage.setItem('returnUrl', window.location.href);
        window.location.replace('login.php');
    }
</script>

<div
    class="min-h-screen py-20 px-6 bg-background dark:bg-slate-950 relative overflow-hidden transition-colors duration-500">
    <!-- Decor -->
    <div
        class="absolute top-0 right-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl -z-10 translate-x-1/2 -translate-y-1/2">
    </div>
    <div
        class="absolute bottom-0 left-0 w-80 h-80 bg-secondary/5 rounded-full blur-3xl -z-10 -translate-x-1/2 translate-y-1/2">
    </div>

    <div class="container mx-auto max-w-4xl" data-aos="fade-up">

        <div class="text-center mb-12">
            <span
                class="bg-primary/10 text-primary px-4 py-2 rounded-full text-xs font-bold tracking-widest border border-primary/20 uppercase"
                data-i18n="checkout_final_step">
                الخطوة الأخيرة
            </span>
            <h1 class="text-4xl md:text-5xl font-black text-slate-900 dark:text-white mt-6 tracking-tight"
                data-i18n="checkout_title">إتمام الطلب</h1>
            <p class="text-slate-500 dark:text-slate-400 mt-4 text-lg" data-i18n="checkout_subtitle">أنت على بعد خطوة
                واحدة من امتلاك أحدث التقنيات.</p>
        </div>

        <div class="flex flex-col lg:flex-row gap-8 items-start">
            <!-- Form Section -->
            <div
                class="flex-1 w-full bg-white dark:bg-slate-900 p-8 md:p-12 rounded-[2.5rem] shadow-soft border border-slate-100 dark:border-slate-800 relative overflow-hidden">
                <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-primary to-secondary"></div>

                <h3 class="text-2xl font-black text-slate-800 dark:text-white mb-8 flex items-center gap-3">
                    <span class="bg-slate-50 dark:bg-slate-800 p-3 rounded-xl text-2xl">🚚</span>
                    <span data-i18n="checkout_shipping_info">معلومات الشحن</span>
                </h3>

                <form id="checkout-form" class="space-y-6">
                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300"
                            data-i18n="checkout_phone">رقم الهاتف للتواصل</label>
                        <input type="tel" id="phone" required placeholder="05XXXXXXXX"
                            class="w-full p-4 bg-slate-50 dark:bg-slate-800 rounded-2xl border-2 border-slate-100 dark:border-slate-700 focus:border-primary focus:bg-white dark:focus:bg-slate-700 focus:ring-4 focus:ring-primary/10 transition-all duration-300 outline-none font-bold text-slate-700 dark:text-white">
                    </div>

                    <div class="space-y-2">
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300"
                            data-i18n="checkout_address">عنوان الشحن بالتفصيل</label>
                        <textarea id="address"
                            class="w-full h-36 p-4 bg-slate-50 dark:bg-slate-800 rounded-2xl border-2 border-slate-100 dark:border-slate-700 focus:border-primary focus:bg-white dark:focus:bg-slate-700 focus:ring-4 focus:ring-primary/10 transition-all duration-300 outline-none resize-none font-bold text-slate-700 dark:text-white"
                            data-i18n-placeholder="checkout_address_ph"
                            placeholder="المدينة، الحي، اسم الشارع، رقم المبنى..." required></textarea>
                    </div>

                    <div class="space-y-4">
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300"
                            data-i18n="checkout_payment_method">طريقة الدفع</label>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <label class="cursor-pointer group">
                                <input type="radio" name="payment" value="COD" checked class="peer sr-only">
                                <div
                                    class="p-6 rounded-3xl border-2 border-slate-100 dark:border-slate-800 bg-white dark:bg-slate-900 peer-checked:border-primary peer-checked:bg-primary/5 transition-all flex flex-col items-center gap-2 group-hover:shadow-md">
                                    <span class="text-3xl">💵</span>
                                    <span class="font-bold text-slate-800 dark:text-white"
                                        data-i18n="checkout_cod">الدفع عند الاستلام</span>
                                    <span class="text-xs text-slate-400">COD</span>
                                </div>
                            </label>
                            <label class="cursor-pointer group opacity-50 pointer-events-none">
                                <input type="radio" name="payment" value="CARD" disabled class="peer sr-only">
                                <div
                                    class="p-6 rounded-3xl border-2 border-slate-50 dark:border-slate-800 bg-slate-50 dark:bg-slate-950 transition-all flex flex-col items-center gap-2">
                                    <span class="text-3xl">💳</span>
                                    <span class="font-bold text-slate-400" data-i18n="checkout_card">بطاقة ائتمان</span>
                                    <span class="text-xs text-slate-300" data-i18n="checkout_soon">قريباً...</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <button type="submit"
                        class="w-full py-5 bg-gradient-to-r from-primary to-primary/80 text-white rounded-2xl font-black text-xl hover:shadow-2xl hover:shadow-primary/40 transition-all duration-300 active:scale-95 flex justify-center items-center gap-3 group mt-8">
                        <span data-i18n="checkout_confirm">تأكيد الطلب الآن</span>
                        <span class="group-hover:translate-x-[-5px] transition-transform text-2xl">🚀</span>
                    </button>
                </form>
            </div>

            <!-- Trust Badges -->
            <div class="w-full lg:w-80 space-y-4">
                <div
                    class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-800 shadow-sm text-center flex flex-col items-center">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-2xl flex items-center justify-center text-3xl shadow-sm mb-4 shrink-0">
                        🛡️</div>
                    <h4 class="font-black text-slate-800 dark:text-white mb-2 w-full"
                        data-i18n="checkout_warranty_title">ضمان
                        ذهبي شامل</h4>
                    <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed w-full"
                        data-i18n="checkout_warranty_desc">جميع مشترياتك محمية بضمان لمدة 12 شهر مع استبدال فوري.</p>
                </div>

                <div
                    class="bg-white dark:bg-slate-900 p-6 rounded-[2rem] border border-slate-100 dark:border-slate-800 shadow-sm text-center flex flex-col items-center">
                    <div
                        class="w-16 h-16 bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-2xl flex items-center justify-center text-3xl shadow-sm mb-4 shrink-0">
                        🚚</div>
                    <h4 class="font-black text-slate-800 dark:text-white mb-2 w-full"
                        data-i18n="checkout_shipping_title">شحن
                        آمن ومجاني</h4>
                    <p class="text-sm text-slate-500 dark:text-slate-400 leading-relaxed w-full"
                        data-i18n="checkout_shipping_desc">توصيل مؤمّن خلال 24-48 ساعة لجميع المحافظات.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        function safeGet(key) {
            try {
                const val = localStorage.getItem(key);
                return (val && val !== 'undefined') ? JSON.parse(val) : null;
            } catch (e) { return null; }
        }

        const user = safeGet('user');
        let cart = safeGet('cart') || [];

        if (!user) {
            localStorage.setItem('returnUrl', window.location.href);
            window.location.replace('login.php');
            return;
        }
        if (!Array.isArray(cart) || cart.length === 0) {
            window.location.replace('products.php');
            return;
        }

        $('#checkout-form').on('submit', function (e) {
            e.preventDefault();

            const finalCart = JSON.parse(localStorage.getItem('cart')) || [];
            if (finalCart.length === 0) {
                window.location.replace('products.php');
                return;
            }

            const submitBtn = $(this).find('button[type="submit"]');
            const originalText = submitBtn.html();
            const processingText = window.t('checkout_processing');
            submitBtn.prop('disabled', true).addClass('opacity-50').text(processingText);

            $.ajax({
                url: '../api/orders/create.php',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                    cart: finalCart,
                    address: $('#address').val(),
                    phone: $('#phone').val()
                }),
                success: function (res) {
                    if (res.success) {
                        localStorage.removeItem('cart');
                        localStorage.setItem('cart', '[]');
                        $('#cart-count').text('0');
                        if (typeof updateCartIcon === 'function') updateCartIcon();

                        Swal.fire({
                            title: window.t('checkout_success_title'),
                            text: res.message,
                            icon: 'success',
                            confirmButtonText: window.t('checkout_back_home'),
                            allowOutsideClick: false
                        }).then(() => {
                            window.location.replace('index.php?order_success=true');
                        });
                    } else {
                        submitBtn.prop('disabled', false).removeClass('opacity-50').html(originalText);
                        Swal.fire(window.t('common_error'), res.message, 'error');
                    }
                },
                error: function (xhr) {
                    submitBtn.prop('disabled', false).removeClass('opacity-50').html(originalText);
                    let message = window.t('checkout_error_submit');
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        message = xhr.responseJSON.message;
                    }
                    Swal.fire(window.t('common_failed'), message, 'error');
                }
            });
        });
    });
</script>
<?php include 'includes/footer/footer.php'; ?>