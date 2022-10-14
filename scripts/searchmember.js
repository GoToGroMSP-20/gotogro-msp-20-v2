function member_valid() {
  let member_id = document.getElementById("member_id").value.trim();
  const email_pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  var result = true;
  if (!member_id == "") {
    if (!email_pattern.test(member_id)) {
      document.getElementById("row_1").classList.add("invalid");
      result = false;
    } else {
      document.getElementById("row_1").classList.remove("invalid");
      document.getElementById("row_1").classList.add("valid");
    }
    if (result) {
      sessionStorage.memberemail = document
        .getElementById("member_id")
        .value.trim();
      console.log(sessionStorage.memberemail);
    }
    //alert(result);
    return result;
  } else {
    return false;
  }
}
function init() {
  var editmember = document.getElementById("memberinfo");
  editmember.onsubmit = member_valid;
}

window.addEventListener("load", init);
