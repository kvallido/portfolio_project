let form = document.getElementById("guestbook");
form.onsubmit = validate;

function validate(){
    clearErrors();
    let isValid = true;
    // First Name validation
    let fname = document.getElementById("fname").value;
    if(fname === ""){
        showError("err-fname");
        isValid = false;
    }

    // Last Name validation
    let lname = document.getElementById("lname").value;
    if(lname === "") {
        showError("err-lname");
        isValid = false;
    }

    // if user checks mailing list checkbox email is required
    let email = document.getElementById("email").value;
    let emailFormat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if (mailingList.checked) {
        if (email === "") {
            changeErrMessage("err-email", "Email is required for mailing list.");
            isValid = false;
        }
        // Must be valid email format (used regex)
        else if (!email.match(emailFormat)) {
            changeErrMessage("err-email", "Must be a valid email.");
            isValid = false;
        }
    }
    else {
        if (email !== "") {
            if (!email.match(emailFormat)) {
                changeErrMessage("err-email", "Must be a valid email.");
            }
        }
    }

    // LinkedIn address if supplied must start with http and end with .com
    let linkedin = document.getElementById("linkedin").value;
    if (linkedin !== "") {
        if (!(linkedin.startsWith("http") && linkedin.endsWith(".com", 24))) {
            showError("err-linkedin");
            isValid = false;
        }
    }

    // how we met answer is required
    if (howSelect.value === 'none') {
        showError("err-how");
        isValid = false;
    }
    else if (howSelect.value === 'other') {
        let otherInput = document.getElementById("other");
        if (otherInput.value === "") {
            showError("err-other");
            isValid = false;
        }
    }

    // form is valid to submit
    return isValid;
}



// clear errors
function clearErrors(){
    let errors = document.getElementsByClassName("text-danger"); // nodelist of error messages
    for(let i = 0; i<errors.length; i++){
        errors[i].classList.add("d-none");
    }
}

// show errors
function showError(id) {
    let err = document.getElementById(id);
    err.classList.remove("d-none");
}

// show error & change message
function changeErrMessage(id, message) {
    let err = document.getElementById(id);
    err.classList.remove("d-none");
    err.innerHTML = message;
}

// make email format buttons visible if mailing list checkbox is checked
let emailFormat = document.getElementById("email-format");
let mailingList = document.getElementById("mail_list");
mailingList.onclick = function() {
    if (mailingList.checked) {
        emailFormat.classList.remove("d-none");
    }
    else {
        emailFormat.classList.add("d-none");
    }
}

// other text box is only visible when Other is selected from list
let howSelect = document.getElementById("how-we-met");
let otherText = document.getElementById("other-text");
howSelect.addEventListener('change', (e) => {
    if (e.target.value === 'other') {
        otherText.classList.remove("d-none");
    }
    else {
        otherText.classList.add("d-none");
    }
});


