function member_valid() {
  let member_id = document.getElementById("member_id").value.trim();
  var email_pattern =
    /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var phone_pattern = /^[\d]{10}$/;
  if (!member_id == "") {
    if (
      !email_pattern.test(String(member_id).toLowerCase()) &&
      !phone_pattern.test(member_id)
    ) {
      // Invalid Input
    } else {
      // Valid Input
    }
  } else {
    // Empty Input
  }
}
