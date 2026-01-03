class LanguageManager {
  constructor() {
    this.lang = localStorage.getItem("selectedLang") || "ar";
    this.translations = {};
    window.t = (key) => this.translations[key] || key;
    this.init();
  }

  async init() {
    await this.loadTranslations(this.lang);
    this.applyTranslations();
    this.updateAttributes();
    this.setupToggles();
  }

  async loadTranslations(lang) {
    try {
      const response = await fetch(`assets/languages/${lang}.json`);
      this.translations = await response.json();
      this.lang = lang;
      localStorage.setItem("selectedLang", lang);
    } catch (error) {
      console.error("Error loading translations:", error);
    }
  }

  applyTranslations(container = document) {
    container.querySelectorAll("[data-i18n]").forEach((el) => {
      const key = el.getAttribute("data-i18n");
      if (this.translations[key]) {
        if (el.tagName === "INPUT" || el.tagName === "TEXTAREA") {
          if (el.placeholder) el.placeholder = this.translations[key];
          if (el.value && el.type === "button")
            el.value = this.translations[key];
        } else {
          el.innerHTML = this.translations[key];
        }
      }
    });

    container.querySelectorAll(".glitch-text").forEach((el) => {
      const key = el.getAttribute("data-i18n");
      if (this.translations[key]) {
        el.setAttribute("data-text", this.translations[key]);
      }
    });

    container.querySelectorAll("[data-i18n-placeholder]").forEach((el) => {
      const key = el.getAttribute("data-i18n-placeholder");
      if (this.translations[key]) {
        el.placeholder = this.translations[key];
      }
    });

    container.querySelectorAll("[data-i18n-title]").forEach((el) => {
      const key = el.getAttribute("data-i18n-title");
      if (this.translations[key]) {
        el.title = this.translations[key];
      }
    });
  }

  updateAttributes() {
    document.documentElement.lang = this.lang;
    document.documentElement.dir = this.lang === "ar" ? "rtl" : "ltr";

    if (this.lang === "en") {
      document.body.classList.add("font-en");
      document.body.classList.remove("font-ar");
    } else {
      document.body.classList.add("font-ar");
      document.body.classList.remove("font-en");
    }

    if (typeof AOS !== "undefined") {
      AOS.refresh();
    }
  }

  async switchLanguage(lang) {
    await this.loadTranslations(lang);
    this.applyTranslations();
    this.updateAttributes();
    window.dispatchEvent(new CustomEvent("languageChanged", { detail: lang }));
    // Re-render auth UI strings
    const user = JSON.parse(localStorage.getItem("user"));
    if (typeof updateAuthUI === "function") updateAuthUI(user);
  }

  setupToggles() {
    $(document).on("click", ".lang-toggle", () => {
      const newLang = this.lang === "ar" ? "en" : "ar";
      this.switchLanguage(newLang);
    });
  }
}

const langManager = new LanguageManager();
window.langManager = langManager;
