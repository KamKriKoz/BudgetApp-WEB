function validateForm() {
    var form = document.getElementById('myForm');
    var firstName = document.getElementById('firstName');
    var lastName = document.getElementById('lastName');
    var email = document.getElementById('email');
    var password = document.getElementById('password');
    var isValid = true;

    if (!firstName.value.trim()) {
        firstName.setCustomValidity('Cannot be empty, enter your name.');
        isValid = false;
    } else {
        firstName.setCustomValidity('');
    }

    if (!lastName.value.trim()) {
        lastName.setCustomValidity('Cannot be empty, enter your last name.');
        isValid = false;
    } else {
        lastName.setCustomValidity('');
    }

    if (!email.value.trim()) {
        email.setCustomValidity('Cannot be empty, enter your email.');
        isValid = false;
    } else {
        email.setCustomValidity('');
    }

    if (!password.value.trim()) {
        password.setCustomValidity('Cannot be empty, enter your password.');
        isValid = false;
    } else {
        password.setCustomValidity('');
    }

    if (!isValid) {
        form.reportValidity();
    } else {
        alert('Account has been created.');
    }

    return isValid;
}

function logValidateForm() {
    var form = document.getElementById('myLogForm');
    var logEmail = document.getElementById('logEmail');
    var logPassword = document.getElementById('logPassword');
    var isValid = true;

    if (!logEmail.value.trim()) {
        logEmail.setCustomValidity('Cannot be empty, enter your email.');
        isValid = false;
    } else {
        logEmail.setCustomValidity('');
    }

    if (!logPassword.value.trim()) {
        logPassword.setCustomValidity('Cannot be empty, enter your password.');
        isValid = false;
    } else {
        logPassword.setCustomValidity('');
    }

    if (!isValid) {
        form.reportValidity();
    }

    return isValid;
}

document.addEventListener('input', function(event) {
    if (event.target.matches('input')) {
        event.target.setCustomValidity('');
    }
});
