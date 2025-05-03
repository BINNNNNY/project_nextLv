function check_input()
{
  if (!document.login_form.id.value) {
    alert("아이디를 입력하세요");
    document.login_form.id.focus();
    return;
  } else if (!document.login_form.pass.value) {
    alert("비밀번호를 입력하세요");
    document.login_form.pass.focus();
    return;
  } else {
    document.login_form.submit();
  }
}
