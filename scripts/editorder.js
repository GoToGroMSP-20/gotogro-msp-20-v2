function show_total() {
  var price = document.getElementById("price").value.trim();
  var qty = document.getElementById("quantity").value.trim();
  if (!price == "" && !qty == "") {
    let num = price * qty;
    num = num.toFixed(2);
    document.getElementById("amount").innerText = "$" + num;
  }
}

// Used for Testing -------------------------------------------------
function storeDetails(orderid, productid, name, price, quantity) {
  sessionStorage.orderid = orderid;
  sessionStorage.orderid = orderid;
  sessionStorage.productid = productid;
  sessionStorage.name = name;
  sessionStorage.price = price;
  sessionStorage.quantity = quantity;

  /*alert("orderid: " + sessionStorage.orderid + " \n" +
      "productid: " + sessionStorage.productid + " \n" +
      "name: " + sessionStorage.name + " \n" +
      "price: " + sessionStorage.price + " \n" +
      "quantity: " + sessionStorage.quantity);*/
}
//-------------------------------------------------------------------

function prefill_form() {
  if (sessionStorage.name != undefined) {
    document.getElementById("product_name").value = sessionStorage.name;
    document.getElementById("order_id").value = sessionStorage.orderid;
    document.getElementById("product_id").value = sessionStorage.productid;
    document.getElementById("quantity").value = sessionStorage.quantity;
    document.getElementById("price").value = sessionStorage.price;
  }
}
function init() {
  // Used for Testing ----------------------------------------
  let orderid = 161;
  let productid = 31;
  let name = "Ice Cream";
  let price = 8.0;
  let quantity = 10;
  storeDetails(orderid, productid, name, price, quantity);
  //---------------------------------------------------------
  prefill_form();
  show_total();
}

window.addEventListener("load", init);
