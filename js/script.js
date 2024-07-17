let menu = document.querySelector(`#menu-btn`);
let navbar = document.querySelector(`.header .navbar`);

menu.onclick = () => {
    menu.classList.toggle(`fa-times`);
    navbar.classList.toggle(`active`);
};

window.onscroll = () => {
    menu.classList.toggle(`fa-times`);
    navbar.classList.toggle(`active`);
};


//pay
function showConfirmation() {
  // Lấy giá trị số tiền từ biến PHP $giatien

  var confirmation = confirm(`Xác nhận thanh toán`);

  // Kiểm tra xem người dùng đã nhấp vào nút Xác nhận hay Hủy
  if (confirmation) {
    // Người dùng đã xác nhận thanh toán
    console.log("Đã xác nhận thanh toán");
    payComplete();
  } else {
    // Người dùng đã hủy thanh toán
    payCancel(event);
    console.log("Đã hủy thanh toán");
  }
}

function payComplete() {
  alert("Đã xác nhận thanh toán");
  window.location.href = "./index.php?pid=9&myid=1";
}

function payCancel(event) {
  event.preventDefault();
  alert("Đã hủy thanh toán");
  window.location.href = "index.php?pid=9&myid=1";
}

//sinh ra các ô để nhập thông tin khách hàng
document.addEventListener('DOMContentLoaded', function() {
  var sokhachInput = document.querySelector('input[name="sokhach"]');
  sokhachInput.addEventListener('input', handleSokhachChange);
});

function handleSokhachChange(event) {
  var sokhach = parseInt(event.target.value);
  var inputBoxContainer = document.querySelector('.inputBoxContainer');
  
  // Xóa các ô input cũ
  while (inputBoxContainer.firstChild) {
      inputBoxContainer.removeChild(inputBoxContainer.firstChild);
  }
  
  // Tạo các ô input mới
  for (var i = 1; i <= sokhach; i++) {
      var inputBox = document.createElement('div');
      inputBox.classList.add('inputBox');
      inputBox.innerHTML = '<span>Tên khách hàng ' + i + '</span>' +
                           '<input type="text" name="hoten' + i + '" placeholder="Nhập tên khách hàng ' + i + '" required>';

      var inputBox2 = document.createElement('div');
      inputBox2.classList.add('inputBox');
      inputBox2.innerHTML = '<span>Ngày sinh</span>' +
                            '<input type="date" name="ngaysinh' + i + '" placeholder="Nhập ngày sinh khách hàng" required>';

      var inputBox3 = document.createElement('div');
      inputBox3.classList.add('inputBox');
      inputBox3.innerHTML = '<span>CCCD</span>' +
                            '<input type="text" name="cccd' + i + '" placeholder="Nhập CCCD">';

      // Tạo một hàng mới để chứa các ô input
      var row = document.createElement('div');
      row.classList.add('row');
      row.appendChild(inputBox);
      row.appendChild(inputBox2);
      row.appendChild(inputBox3);

      inputBoxContainer.appendChild(row);
  }
}

// thông báo book Tour thành công
function BookComplete_message() {
  alert("Đã book thành công!");
}

// thông báo huỷ Tour thành công
function BookCancel_message() {
  alert("Đã hủy Tour đã đặt!");
}