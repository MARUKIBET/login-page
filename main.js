const form = document.querySelector('#form-group');
const fullName = document.querySelector('#full_name');
const email = document.querySelector('#email');
const contact = document.querySelector('#contact');
const address = document.querySelector('#address');
const menu = document.querySelector(".hamburger-menu");
const close_menu = document.querySelector('.close');
const navbar = document.querySelector("#navbar");
const links = document.querySelectorAll(".links");

const showMenu = (toggleId, navId) => {
	const toggle = document.getElementById(toggleId),
		nav = document.getElementById(navId);
	if (toggle && nav) {
		toggle.addEventListener('click', () => {
			nav.classList.toggle('show')
		});
	}
}
showMenu('Mbars', 'nav-Menu');


/*function func(e) {
	e.preventDefault();

	console.log('not refreshed!!!!')
}
*/

$(document).ready(function () {
	refreshTable();

	function refreshTable() {
		$('#table-group').load('result.php', function () {
			setTimeout(refreshTable, 10000);
		});
	}
});


form.addEventListener('submit', (event) => {
	validateForm();

	if (isFormValid() == true) {
		form.submit;
	} else {
		event.preventDefault();
	}

	function isFormValid() {
		const inputContainers = form.querySelectorAll('.input-group');
		let result = true;

		inputContainers.forEach((container) => {
			if (container.classList.contains('error')) {
				result = false;
			}
		});

		return result;
	}

});



function validateForm() {
	//full name
	if (fullName.value.trim() == '') {
		setError(fullName, 'Name cannot be empty');
	} else if (fullName.value.trim().length < 4 || fullName.value.trim().length > 25) {
		setError(fullName, 'Name must be min of 4 and max of 25 characters');
	} else {
		setSuccess(fullName);
	}
	//email
	if (email.value.trim() == '') {
		setError(email, 'email cannot be empty');
	} else if (isEmailValid(email.value)) {
		setSuccess(email);
	} else {
		setError(email, 'provide valid email address');
	}
	//contact
	if (contact.value.trim() == '') {
		setError(contact, 'contact cannot be empty');
	} else if (contact.value.trim().length <= 0 || contact.value.trim().length > 12) {
		setError(contact, 'contact must btw 0 and 10');
	} else {
		setSuccess(contact);
	}
	//address
	if (address.value.trim() == '') {
		setError(address, 'Your address cannot be empty');
	} else if (address.value.trim().length < 2 || address.value.trim().length > 12) {
		setError(address, 'provide valid address please');
	} else {
		setSuccess(address);
	}
}

function setError(element, errorMessage) {
	const parent = element.parentElement;
	if (parent.classList.contains('success')) {
		parent.classList.remove('success');
	}
	parent.classList.add('error');
	const paragraph = parent.querySelector('p');
	paragraph.textContent = errorMessage;
}

function setSuccess(element) {
	const parent = element.parentElement;
	if (parent.classList.contains('error')) {
		parent.classList.remove('error');
	}
	parent.classList.add('success');
}

function isEmailValid(email) {
	const reg = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	return reg.test(email);
}







function update() {
	$.get("result.php", function (data) {
		$("#table-group").html(data);
		window.setTimeout(update, 10000);
	});
}
