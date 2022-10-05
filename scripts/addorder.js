
function show_row2() {
    var r1_price = document.getElementById("price1").value.trim();
    var r2 = document.getElementById("row_2")
    if (!r1_price == ""){
      r2.style.display = "block";
    }else{
      r2.style.display = "none";
    }
}

  function show_total() {
    var r1_price = document.getElementById("price1").value.trim();
    var r1_qty = document.getElementById("quantity1").value.trim();
    var r2_price = document.getElementById("price2").value.trim();
    var r2_qty = document.getElementById("quantity2").value.trim();
    document.getElementById("total_price").innerText =  "Total Price : 0";
    if ((!r1_price == "") && (!r1_qty == "")){
        document.getElementById("total_price").innerText = "Total Price : " + r1_price * r1_qty;
    }
    if ((!r1_price == "") && (!r1_qty == "")&&(!r2_price == "") && (!r2_qty == "")){
        document.getElementById("total_price").innerText = "Total Price : " +  ((r1_price * r1_qty) + (r2_price * r2_qty));
    }
  }
