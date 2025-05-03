function check_input() {

  if (!document.member_form.id.value) {
    alert("아이디를 입력하세요!");
    document.member_form.id.focus();
    return;
  } else if (!document.member_form.name.value) {
    alert("이름을 입력하세요!");
    document.member_form.name.focus();
    return;
  } else if (!document.member_form.pass.value) {
    alert("비밀번호를 입력하세요!");
    document.member_form.pass.focus();
    return;
  } else if (!document.member_form.pass_confirm.value) {
    alert("비밀번호 확인을 입력하세요!");
    document.member_form.pass_confirm.focus();
    return;
  } else if (!document.member_form.email.value) {
    alert("이메일 주소를 입력하세요!");
    document.member_form.email.focus();
    return;
  } else if (document.member_form.pass.value != document.member_form.pass_confirm.value) {
    alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
    document.member_form.pass.focus();
    document.member_form.pass.select();
    return;
  }  else {
    document.member_form.submit();
  }
}

function reset_form() {
  document.member_form.id.value = "";
  document.member_form.name.value = "";
  document.member_form.pass.value = "";
  document.member_form.pass_confirm.value = "";
  document.member_form.email.value = "";
  document.member_form.id.focus();
  return;
}

function check_id() {
  window.open("member_check_id.php?id=" + document.member_form.id.value);

}
