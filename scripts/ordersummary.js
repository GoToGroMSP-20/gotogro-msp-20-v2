function storeDetails(rowid) {
  let productid =
    document.getElementById("orders").rows[rowid].cells[0].innerHTML;
  let name = document.getElementById("orders").rows[rowid].cells[1].innerHTML;
  let quantity =
    document.getElementById("orders").rows[rowid].cells[2].innerHTML;
  let price = document.getElementById("orders").rows[rowid].cells[3].innerHTML;

  sessionStorage.productid = productid;
  sessionStorage.name = name;
  sessionStorage.price = price;
  sessionStorage.quantity = quantity;

  /*alert("productid: " + sessionStorage.productid + " \n" +
        "name: " + sessionStorage.name + " \n" +
        "price: " + sessionStorage.price + " \n" +
        "quantity: " + sessionStorage.quantity);*/
  location.href = "editOrder.php";
}

function prefill_form() {
  if (sessionStorage.transactionid != undefined) {
    document.getElementById("transaction_id").value =
      sessionStorage.transactionid;
  }
}

function init() {
  // Used for Testing ----------------------------------------
  let transactionid = 291;
  sessionStorage.transactionid = transactionid;
  //---------------------------------------------------------

  prefill_form();
  let url = window.location.href;
  if (!url.includes("transaction_id")) {
    document.getElementById("ssdata").submit();
  }
}

window.addEventListener("load", init);
