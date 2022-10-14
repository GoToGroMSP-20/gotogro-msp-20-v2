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
  if (sessionStorage.transactionid != undefined) {
    document.getElementById("transaction_id").value =
      sessionStorage.transactionid;
  }
}
function init() {
  // Used for Testing ----------------------------------------
  let transactionid = 291;
  sessionStorage.transactionid = transactionid;
  //storeDetails(transactionid);
  //---------------------------------------------------------
  prefill_form();
  let url = window.location.href;
  let result = url.includes("transaction_id");
  if (!result) {
    document.getElementById("ssdata").submit();
  }
}

window.addEventListener("load", init);
