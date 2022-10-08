
function show_total() {
  var r1_price = document.getElementById("price1").value.trim();
  var r1_qty = document.getElementById("quantity1").value.trim();
  var r2_price = document.getElementById("price2").value.trim();
  var r2_qty = document.getElementById("quantity2").value.trim();
  var r2 = document.getElementById("row_2");
  r2.style.display = "none";
  document.getElementById("total_price").innerText = "Price : $0";
  if (!r1_price == "" && !r1_qty == "") {
    r2.style.display = "flex";
    let num = r1_price * r1_qty;
    num = num.toFixed(2);
    document.getElementById("total_price").innerText = "Price : $" + num;
    document.getElementById("amount1").innerText = "$" + num;
  }
  if (!r1_price == "" && !r1_qty == "" && !r2_price == "" && !r2_qty == "") {
    let num1 = r2_price * r2_qty;
    num1 = num1.toFixed(2);
    document.getElementById("amount2").innerText = "$" + num1;
    let num = r1_price * r1_qty + r2_price * r2_qty;
    num = num.toFixed(2);
    document.getElementById("total_price").innerText = "Price : $" + num;
    document.getElementById("row_3").classList.add("valid");
  }
}
function validate() {
  var product_ID1 = document.getElementById("product_ID1").value;
  var r1_price = document.getElementById("price1").value.trim();
  var r1_qty = document.getElementById("quantity1").value.trim();
  var product_ID2 = document.getElementById("product_ID2").value;
  var r2_price = document.getElementById("price2").value.trim();
  var r2_qty = document.getElementById("quantity2").value.trim();
  var submit = document.getElementById("submit");
  if (product_ID1 == "placeholder" || r1_price == "" || r1_qty == "") {
    document.getElementById("row_1").classList.add("invalid");
    submit.onsubmit = false;
  } else {
    document.getElementById("row_1").classList.remove("invalid");
    document.getElementById("row_1").classList.add("valid");
    submit.onsubmit = true;
  }
  if (
    (product_ID2 == "placeholder" && r2_price != "") ||
    (product_ID2 == "placeholder" && r2_qty != "") ||
    (product_ID2 != "placeholder" && r2_price == "") ||
    (product_ID2 != "placeholder" && r2_qty == "") ||
    (r2_qty != "" && r2_price == "") ||
    (r2_price != "" && r2_qty == "")
  ) {
    document.getElementById("row_2").classList.add("invalid");
    submit.onsubmit = false;
  } else {
    document.getElementById("row_2").classList.remove("invalid");
    document.getElementById("row_2").classList.add("valid");
    submit.onsubmit = true;
  }
}