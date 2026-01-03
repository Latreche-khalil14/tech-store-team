/**
 * Cart Management Logic
 */

function addToCart(productId, productName) {
  productId = parseInt(productId);
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  let item = cart.find((i) => parseInt(i.id) === productId);

  if (item) {
    item.quantity = parseInt(item.quantity) + 1;
  } else {
    cart.push({ id: Number(productId), quantity: 1 });
  }

  localStorage.setItem("cart", JSON.stringify(cart));
  updateCartIcon();

  // Dispatch custom event for same-page updates (e.g., if user is on cart.php)
  window.dispatchEvent(new Event("cartUpdated"));

  if (typeof Swal !== "undefined") {
    const title = window.t ? window.t("swal_added") : "Added!";
    const productLabel =
      productName || (window.t ? window.t("common_product") : "product");
    let msg = window.t ? window.t("swal_added_msg") : "${name} added to cart";
    msg = msg.replace("${name}", productLabel);

    Swal.fire({
      title: title,
      text: msg,
      icon: "success",
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
    });
  }
}

function updateCartIcon() {
  let cart = JSON.parse(localStorage.getItem("cart")) || [];
  let count = cart.reduce((total, item) => total + item.quantity, 0);

  $("#cart-count").text(count);
  $(".mobile-menu #mobile-cart-count").text(count);
}
