var username = document.getElementById('user');
var userWarning = document.getElementById('user-warning');
var pass = document.getElementById("pass");
var passWarning = document.getElementById('pass-warning');
var repass = document.getElementById("repass");
var repassWarning = document.getElementById('repass-warning');
var tick = document.getElementById("tick");
var submitBtn = document.getElementById("submit-btn");

function isValidForm() {
	let isValid = true;
	if (username.value == "") {
		isValid = false;
		userWarning.innerHTML = 'Bạn chưa nhập tài khoản !';
	}
	else {
		checkUser();
	}

	if (pass.value == "") {
		isValid = false;
		passWarning.innerHTML = 'Bạn chưa nhập mật khẩu !';
	}
	else {
		checkPass();
	}

	if (pass.value != repass.value) {
		isValid = false;
		repassWarning.innerHTML = 'Mật khẩu không trùng nhau';
	}
	else {
		repassWarning.innerHTML = '';
	}
	return isValid;
}

function checkUser() {
	let userRegex = /^[a-zA-Z]\w{5,14}$/;
	if (!userRegex.test(username.value)) {
		userWarning.innerHTML = 'Phải bắt đầu bằng chữ cái, dài từ 6 đến 15 ký tự';
	}
	else {
		userWarning.innerHTML = '';
	}
}

function checkPass() {
	let passRegex = /^(?=.*[a-zA-Z])(?=.*\d)[a-zA-Z0-9]{6,15}$/;
	if (passRegex.test(pass.value) == false) {
		passWarning.innerHTML = 'Chỉ bao gồm chữ và số, dài từ 6 đến 15 ký tự';
	}
	else {
		passWarning.innerHTML = '';
	}
}

repass.oninput = function () {
	if ((pass.value == repass.value) && (pass.value != "")) {
		pass.style.backgroundColor = "lightgreen";
		repass.style.backgroundColor = "lightgreen";
		tick.innerHTML = "&#10004;";
	}
	else {
		repass.style.backgroundColor = "#ff6666";
		tick.innerHTML = "";
	}
}
