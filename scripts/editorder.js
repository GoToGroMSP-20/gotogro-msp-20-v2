function show_total() {
  var price = document.getElementById("price").value.trim();
  var qty = document.getElementById("quantity").value.trim();
  if (!price == "" && !qty == "") {
    let num = price * qty;
    num = num.toFixed(2);
    document.getElementById("amount").innerText = "$" + num;
    sessionStorage.quantity = qty;
  }
}

function prefill_form() {
  if (sessionStorage.name != undefined) {
    document.getElementById("product_name").value = sessionStorage.name;
    document.getElementById("order_id").value = sessionStorage.transactionid;
    document.getElementById("product_id").value = sessionStorage.productid;
    document.getElementById("quantity").value = sessionStorage.quantity;
    document.getElementById("price").value = sessionStorage.price;
  }
}
function init() {
  prefill_form();
  show_total();
}

window.addEventListener("load", init);
