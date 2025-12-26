<?php
require_once '../config/database.php';
require_once '../config/helpers.php';
protectAdminSecret();
?>

<?php include 'includes/header.php'; ?>
<?php include 'includes/sidebar.php'; ?>

<!-- Main Content -->
<div class="flex-1 md:pr-64">
    <div class="p-8">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
            <div>
                <h1 class="text-3xl font-black text-slate-800">لوحة التحكم</h1>
                <p class="text-slate-500">نظرة عامة على نشاط المتجر اليوم</p>
            </div>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100">
                <div class="flex justify-between items-start mb-4">
                    <span class="p-3 bg-blue-50 text-blue-600 rounded-2xl text-2xl">📥</span>
                    <span class="text-xs font-bold text-green-500 bg-green-50 px-2 py-1 rounded-lg">+12%</span>
                </div>
                <div class="text-slate-500 text-sm font-bold">إجمالي الطلبات</div>
                <div id="stat-orders" class="text-3xl font-black mt-1 text-slate-800">0</div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100">
                <div class="flex justify-between items-start mb-4">
                    <span class="p-3 bg-indigo-50 text-indigo-600 rounded-2xl text-2xl">💰</span>
                </div>
                <div class="text-slate-500 text-sm font-bold">الإيرادات</div>
                <div id="stat-revenue" class="text-3xl font-black mt-1 text-slate-800">0 $</div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100">
                <div class="flex justify-between items-start mb-4">
                    <span class="p-3 bg-amber-50 text-amber-600 rounded-2xl text-2xl">📦</span>
                </div>
                <div class="text-slate-500 text-sm font-bold">المنتجات</div>
                <div id="stat-products" class="text-3xl font-black mt-1 text-slate-800">0</div>
            </div>
            <div class="bg-white p-6 rounded-[2rem] shadow-sm border border-slate-100">
                <div class="flex justify-between items-start mb-4">
                    <span class="p-3 bg-purple-50 text-purple-600 rounded-2xl text-2xl">👥</span>
                </div>
                <div class="text-slate-500 text-sm font-bold">العملاء</div>
                <div id="stat-users" class="text-3xl font-black mt-1 text-slate-800">0</div>
            </div>
        </div>