function storeDetails(rowid) {
  let transactionid = document.getElementById("transaction_id").value;
  let productid = document.getElementById("orders").rows[rowid].cells[0].innerHTML;
  let name = document.getElementById("orders").rows[rowid].cells[1].innerHTML;
  let quantity = document.getElementById("orders").rows[rowid].cells[2].innerHTML;
  let price = document.getElementById("orders").rows[rowid].cells[3].innerHTML;

  sessionStorage.transactionid = transactionid;
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