function inputPhoneNumber(obj) {
    var number = obj.value.replace(/[^0-9]/g, "");

    var tel = "";
    // 서울 지역번호(02)가 들어오는 경우
    if(number.substring(0, 2).indexOf('02') == 0) {
        if(number.length < 3) {
            return number;
        } else if(number.length < 6) {
            tel += number.substr(0, 2);
            tel += "-";
            tel += number.substr(2);
        } else if(number.length < 10) {
            tel += number.substr(0, 2);
            tel += "-";
            tel += number.substr(2, 3);
            tel += "-";
            tel += number.substr(5);
        } else {
            tel += number.substr(0, 2);
            tel += "-";
            tel += number.substr(2, 4);
            tel += "-";
            tel += number.substr(6);
        }

    // 서울 지역번호(02)가 아닌경우
    } else {
        if(number.length < 4) {
            return number;
        } else if(number.length < 7) {
            tel += number.substr(0, 3);
            tel += "-";
            tel += number.substr(3);
        } else if(number.length < 11) {
            tel += number.substr(0, 3);
            tel += "-";
            tel += number.substr(3, 3);
            tel += "-";
            tel += number.substr(6);
        } else {
            tel += number.substr(0, 3);
            tel += "-";
            tel += number.substr(3, 4);
            tel += "-";
            tel += number.substr(7);
        }
    }
    obj.value = tel;
}
function checkCurrentTime(frm) {
    if( frm.checkDateTime.checked == true ){
      var d = new Date();
      var date = leadingZeros(d.getFullYear(), 4) + '-' + leadingZeros(d.getMonth() + 1, 2) + '-' + leadingZeros(d.getDate(), 2) + ' ';
      var time = leadingZeros(d.getHours(), 2) + ':' + leadingZeros(d.getMinutes(), 2) + ':' + leadingZeros(d.getSeconds(), 2);
     document.getElementById('connect_time').value = date + time;
    } else {
     document.getElementById('connect_time').value = "현재시간이 입력됩니다.";
    }
}

function leadingZeros(n, digits) {
  var zero = '';
  n = n.toString();
  if (n.length < digits) {
    for (i = 0; i < digits - n.length; i++)
      zero += '0';
  }
  return zero + n;
}

$(document).ready(function() {
    $("#department").bind("keyup", function() {
    $(this).val($(this).val().toUpperCase());
    });
    $("#building").bind("keyup", function() {
    $(this).val($(this).val().toUpperCase());
    });
});
