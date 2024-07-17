const toggleSwitch = document.querySelector('#toggle');
const login_status = document.querySelector('.login-status h4');

function switchColor(e) {
  if (e.target.checked) {
    login_status.classList.add('status-admin');
  } else {
    login_status.classList.remove('status-admin');
  }    
}

toggleSwitch.addEventListener('change', switchColor, false);