/**
 * Product Loading & Rendering Logic
 */

function loadFeaturedProducts() {
  if ($("#featured-products").length) {
    fetchProducts("../api/products/get_all.php?limit=4", "#featured-products");
  }
}

function loadProducts() {
  if ($("#products-list").length) {
    const category = $("#category-filter").val() || "";
    const search = $("#search-input").val() || "";
    fetchProducts(
      `../api/products/get_all.php?category=${category}&search=${search}`,
      "#products-list"
    );
  }
}

function fetchProducts(url, containerId) {
  const skeletonHtml = Array(4)
    .fill(
      `
    <div class="skeleton-card bg-white dark:bg-slate-800 rounded-[2.5rem] p-6 border border-slate-100 dark:border-slate-700 h-[450px]">
        <div class="skeleton bg-slate-100 dark:bg-slate-700 h-64 rounded-[2rem] mb-6"></div>
        <div class="skeleton bg-slate-100 dark:bg-slate-700 h-6 w-3/4 mb-4"></div>
        <div class="skeleton bg-slate-100 dark:bg-slate-700 h-10 w-full rounded-2xl"></div>
    </div>
  `
    )
    .join("");

  $(containerId).html(skeletonHtml);

  $.ajax({
    url: url,
    method: "GET",
    success: function (response) {
      if (response.success) {
        const products = response.data.products;
        let html = "";

        if (products.length === 0) {
          $("#no-products").removeClass("hidden");
          $(containerId).html("");
          return;
        }

        $("#no-products").addClass("hidden");
        products.forEach((p) => {
          const isNew = Math.random() > 0.7;
          html += `
                        <div class="group bg-white dark:bg-slate-800 rounded-[2.5rem] p-6 transition-all duration-500 border border-slate-100 dark:border-slate-700/50 overflow-hidden relative" data-aos="fade-up">
                            <div class="bg-slate-50 dark:bg-slate-900 h-64 rounded-[2rem] mb-6 flex items-center justify-center relative overflow-hidden group-hover:bg-primary/5 transition-all duration-500">
                                <div class="absolute inset-0 bg-gradient-to-tr from-white/0 to-white/40 dark:to-slate-800/40 opacity-0 group-hover:opacity-100 transition-opacity"></div>
                                <img src="${
                                  p.image_url
                                }" onerror="this.src=PLACEHOLDER_IMAGE" 
                                    class="h-full w-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out z-10">
                                
                                ${
                                  isNew
                                    ? `
                                <div class="absolute top-4 right-4 bg-gradient-to-r from-secondary to-pink-500 text-white text-[10px] font-black px-3 py-1.5 rounded-full shadow-lg z-20 animate-push" data-i18n="product_new">
                                    ${window.t("product_new")}
                                </div>`
                                    : ""
                                }
                            </div>

                            <div class="space-y-4 relative z-10">
                                <div class="flex justify-between items-start">
                                    <span class="text-[10px] font-black text-primary uppercase tracking-[0.2em] bg-primary/5 dark:bg-primary/10 px-4 py-1.5 rounded-full border border-primary/10" data-i18n="${
                                      p.category_name
                                    }">
                                        ${window.t(p.category_name)}
                                    </span>
                                </div>
                                <h3 class="font-black text-slate-800 dark:text-slate-100 text-xl line-clamp-2 h-14 leading-tight group-hover:text-primary transition-colors">
                                    ${p.name}
                                </h3>
                                <div class="flex justify-between items-center pt-4 border-t border-slate-50 dark:border-slate-700/30 mt-4">
                                    <div class="flex flex-col">
                                        <span class="text-[10px] text-slate-400 font-bold uppercase tracking-widest mb-1" data-i18n="product_price">${window.t(
                                          "product_price"
                                        )}</span>
                                        <p class="text-3xl font-black text-slate-900 dark:text-white tracking-tighter">
                                            ${
                                              p.price
                                            } <span class="text-sm font-bold text-primary">$</span>
                                        </p>
                                    </div>
                                    <div class="flex gap-2 relative z-20">
                                        <a href="product-details.php?id=${
                                          p.id
                                        }" class="h-14 px-4 bg-slate-50 dark:bg-slate-700/50 hover:bg-slate-100 dark:hover:bg-slate-700 text-slate-600 dark:text-slate-300 rounded-2xl flex items-center justify-center font-black text-xs transition-all border border-slate-100 dark:border-slate-700/50 hover:text-primary" onclick="event.stopPropagation();" data-i18n="product_details">
                                            ${window.t("product_details")}
                                        </a>
                                        <button class="bg-gradient-to-r from-primary to-indigo-600 text-white w-14 h-14 rounded-2xl hover:shadow-lg hover:shadow-primary/30 transition-all duration-300 active:scale-95 flex items-center justify-center group/btn relative overflow-hidden" 
                                                onclick="event.stopPropagation(); addToCart(${
                                                  p.id
                                                }, '${p.name.replace(
            /'/g,
            "\\'"
          )}')">
                                            <span class="relative z-10 text-xl transition-transform">🛒</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <a href="product-details.php?id=${
                              p.id
                            }" class="absolute inset-0 z-0"></a>
                        </div>
                    `;
        });

        $(containerId).html(html);
        if (typeof AOS !== "undefined") AOS.refresh();
        // Trigger translation
        if (window.langManager)
          window.langManager.applyTranslations(
            document.querySelector(containerId)
          );
      } else {
        $(containerId).html(`
            <div class="col-span-full text-center py-20">
                <div class="inline-block bg-red-50 text-red-500 rounded-2xl p-6 border border-red-100 mb-4">
                    <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                    <p class="font-bold" data-i18n="product_error">${window.t(
                      "product_error"
                    )}</p>
                </div>
            </div>
         `);
      }
    },
    error: function (xhr, status, error) {
      console.error("Products Fetch Error:", error);
      $(containerId).html(`
            <div class="col-span-full text-center py-20">
                <div class="inline-block bg-red-50 text-red-500 rounded-2xl p-6 border border-red-100 mb-4">
                    <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                    <p class="font-bold" data-i18n="server_error">${window.t(
                      "server_error"
                    )}</p>
                </div>
            </div>
         `);
    },
  });
}
