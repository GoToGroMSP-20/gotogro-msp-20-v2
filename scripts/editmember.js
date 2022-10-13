function prefill_form() {
  if (sessionStorage.memberid != undefined) {
    document.getElementById("member_id").value = sessionStorage.memberid;
  }
}
function init() {
  // Used for Testing ----------------------------------------
  let memberid = 1;
  sessionStorage.memberid = memberid;
  //---------------------------------------------------------
  prefill_form();
}

window.addEventListener("load", init);
