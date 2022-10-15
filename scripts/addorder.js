function show_total() {
  var product_ID1 = document.getElementById("product_ID1").value;
  var r1_p = document.getElementById("price1");
  var r1_qty = document.getElementById("quantity1").value.trim();
  var product_ID2 = document.getElementById("product_ID2").value;
  var r2_p = document.getElementById("price2");
  var r2_qty = document.getElementById("quantity2").value.trim();
  var r2 = document.getElementById("row_2");
  r2.style.display = "none";
  document.getElementById("total_price").innerText = "Price : $0";
  if (product_ID1 != "placeholder" && !r1_qty == "") {
    r2.style.display = "flex";
    if (product_ID1 == "1") {
      var r1_price = "2";
    }
    if (product_ID1 == "11") {
      var r1_price = "4";
    }
    if (product_ID1 == "21") {
      var r1_price = "6";
    }
    if (product_ID1 == "31") {
      var r1_price = "8";
    }
    r1_p.value = r1_price;
    let num = r1_price * r1_qty;
    num = num.toFixed(2);
    document.getElementById("total_price").innerText = "Price : $" + num;
    document.getElementById("amount1").innerText = "$" + num;
  }
  if (
    product_ID1 != "placeholder" &&
    !r1_qty == "" &&
    product_ID2 != "placeholder" &&
    !r2_qty == ""
  ) {
    if (product_ID2 == "1") {
      var r2_price = "2";
    }
    if (product_ID2 == "11") {
      var r2_price = "4";
    }
    if (product_ID2 == "21") {
      var r2_price = "6";
    }
    if (product_ID2 == "31") {
      var r2_price = "8";
    }
    r2_p.value = r2_price;
    let num1 = r2_price * r2_qty;
    num1 = num1.toFixed(2);
    document.getElementById("amount2").innerText = "$" + num1;
    let num = r1_price * r1_qty + r2_price * r2_qty;
    num = num.toFixed(2);
    document.getElementById("total_price").innerText = "Price : $" + num;
  }
}
function validate() {
  var product_ID1 = document.getElementById("product_ID1").value;
  var r1_qty = document.getElementById("quantity1").value.trim();
  var product_ID2 = document.getElementById("product_ID2").value;
  var r2_qty = document.getElementById("quantity2").value.trim();
  var member_id = document.getElementById("member_id").value.trim();
  var result = true;
  if (
    (product_ID2 == "placeholder" && r2_qty != "") ||
    (product_ID2 != "placeholder" && r2_qty == "")
  ) {
    document.getElementById("row_2").classList.add("invalid");
    result = false;
  } else {
    document.getElementById("row_2").classList.remove("invalid");
    document.getElementById("row_2").classList.add("valid");
  }
  if (product_ID1 == "placeholder" || r1_qty == "") {
    document.getElementById("row_1").classList.add("invalid");
    result = false;
  } else {
    document.getElementById("row_1").classList.remove("invalid");
    document.getElementById("row_1").classList.add("valid");
  }
  const email_pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  if (!email_pattern.test(member_id) || member_id == "") {
    document.getElementById("row_3").classList.add("invalid");
    document.getElementById("member_error").innerText = "Invalid Member ID";
    result = false;
  } else {
    document.getElementById("row_3").classList.remove("invalid");
    document.getElementById("row_3").classList.add("valid");
    document.getElementById("member_error").innerText = "Valid Member ID";
  }
  //alert(result);
  return result;
}

function init() {
  var addorder = document.getElementById("addorder");
  addorder.onsubmit = validate;
}

window.addEventListener("load", init);
