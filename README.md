# 🛒 Tech Store - Modern E-commerce Platform

<div align="center">

![PHP](https://img.shields.io/badge/PHP-7.4+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-5.7+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Tailwind CSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)
![JavaScript](https://img.shields.io/badge/JavaScript-ES6+-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)
![License](https://img.shields.io/badge/License-MIT-green?style=for-the-badge)

### متجر تقني عصري لبيع قطع الهاردوير وأجهزة الكمبيوتر 🖥️

**Modern Arabic E-commerce Platform with Dark Mode Support**

[المميزات](#-المميزات) • [التثبيت](#️-التثبيت) • [الاستخدام](#-الاستخدام) • [المساهمة](#-المساهمة) • [الترخيص](#-الترخيص)

</div>

---

## 🚀 المميزات

- ✨ تصميم عصري باستخدام Tailwind CSS
- 🌙 دعم الوضع الليلي (Dark Mode)
- 📱 تصميم متجاوب لجميع الأحجام
- 🛒 نظام سلة تسوق متقدم
- 👤 نظام مصادقة شامل (تسجيل دخول/تسجيل حساب)
- 🔐 حماية قوية ضد XSS و SQL Injection
- 📊 لوحة تحكم إدارية كاملة
- 🎨 تأثيرات رسومية متقدمة وأنيميشن سلس

## 📋 متطلبات التشغيل

- PHP 7.4+
- MySQL 5.7+
- Apache/Nginx
- مكتبة PDO لـ PHP

## 🛠️ التثبيت

1. **استنساخ المشروع:**

```bash
git clone https://github.com/Latreche-khalil14/tech-store-team.git
cd tech-store-team
```

2. **إعداد قاعدة البيانات:**
   - أنشئ قاعدة بيانات جديدة باسم `tech_store`
   - استورد ملف SQL من مجلد `database/`

```bash
mysql -u root -p tech_store < database/schema.sql
```

3. **إعداد الاتصال بقاعدة البيانات:**
   - انسخ ملف الإعدادات

```bash
cp config/database.php.example config/database.php
```

- عدّل الإعدادات في `config/database.php` حسب بيئتك

4. **تشغيل المشروع:**
   - ضع المشروع في مجلد `htdocs` (XAMPP) أو `www` (WAMP)
   - افتح المتصفح على: `http://localhost/tech-store-team`


## 🔐 الأمان

- تشفير كلمات المرور باستخدام `password_hash()`
- حماية من SQL Injection باستخدام Prepared Statements
- تنظيف المدخلات من XSS
- Validation شامل لكل المدخلات
- CSRF Protection في النماذج الحساسة
- Session Management آمن

## 📸 لقطات الشاشة

> سيتم إضافة لقطات الشاشة قريباً

## 🚦 الاستخدام

### حسابات الاختبار:

**مدير النظام (Admin):**

- البريد: `admin@techstore.com`
- كلمة المرور: `admin123`

**اختبار المستخدم:**

- قم بإنشاء حساب جديد من صفحة التسجيل

## 🤝 المساهمة

نرحب بجميع المساهمات! يرجى قراءة [دليل المساهمة](CONTRIBUTING.md) قبل البدء.

### خطوات سريعة:

1. Fork المشروع
2. أنشئ Branch للميزة (`git checkout -b feature/AmazingFeature`)
3. Commit التغييرات (`git commit -m 'Add some AmazingFeature'`)
4. Push إلى Branch (`git push origin feature/AmazingFeature`)
5. افتح Pull Request

## 👥 الفريق

- **Lead Developer & Frontend:** Khalil Ibrahim [@Latreche-khalil14](https://github.com/Latreche-khalil14)
- **Admin & Config Guide:** Bouchareb Wail Abd El Raouf 
- **Backend Developer:** mohammed belouhem

## 📚 الموارد الإضافية

- [سجل التغييرات](CHANGELOG.md) - جميع التحديثات والإصدارات


## 📝 الترخيص

هذا المشروع مرخص تحت MIT License - انظر ملف [LICENSE](LICENSE) للتفاصيل.

## 🙏 شكر وتقدير

- **Tailwind CSS** - للإطار الرائع
- **Font Awesome** - للأيقونات
- **AOS Library** - لتأثيرات الأنيميشن
- **SweetAlert2** - للتنبيهات الجميلة

## 📞 التواصل والدعم

- 🐛 للإبلاغ عن مشاكل: [فتح Issue](../../issues)
- 💡 لطلب ميزات جديدة: [فتح Feature Request](../../issues/new)
- 📧 للتواصل المباشر: أنشئ Discussion في GitHub

---

<div align="center">

**صُنع بـ ❤️ من فريق Tech Store**

⭐ إذا أعجبك المشروع، لا تنسى إضافة نجمة!

</div>
