const passwordInput1 = document.querySelector(".pass-field1 input");
const requirementList = document.querySelectorAll(".requirement-list li");
const passwordInput2 = document.querySelector(".pass-field2 input");
console.log("hi\n");
// An array of password requirements with corresponding 
// regular expressions and index of the requirement list item
const requirements = [
    { regex: /.{8,}/, index: 0 }, // Minimum of 8 characters
    { regex: /[0-9]/, index: 1 }, // At least one number
    { regex: /[a-z]/, index: 2 }, // At least one lowercase letter
    { regex: /[^A-Za-z0-9]/, index: 3 }, // At least one special character
    { regex: /[A-Z]/, index: 4 }, // At least one uppercase letter
]
let f = [0, 0, 0, 0, 0, 0];
//console.log(passwordInput2);
passwordInput1.addEventListener("keyup", (e) => {
    requirements.forEach(item => {
        // Check if the password matches the requirement regex
        const isValid = item.regex.test(e.target.value);
        const requirementItem = requirementList[item.index];

        // Updating class and icon of requirement item if requirement matched or not
        if (isValid) {
            requirementItem.classList.add("valid");
            requirementItem.firstElementChild.className = "fa-solid fa-check";
            f[item.index] = 1;
        }
        else {

            requirementItem.classList.remove("valid");
            requirementItem.firstElementChild.className = "fa-solid fa-circle";
            f[item.index] = 0;
        }
    });
});
let submitButton = document.getElementById('submitbutton');
passwordInput2.addEventListener("keyup", checkpassword);
function checkpassword() {
    if (passwordInput1.value == passwordInput2.value && passwordInput1.value != "") {
        requirementList[5].classList.add("valid");
        requirementList[5].firstElementChild.className = "fa-solid fa-check";
        f[5] = 1;
    }
    else {

        requirementList[5].classList.remove("valid");
        requirementList[5].firstElementChild.className = "fa-solid fa-circle";
        f[5] = 0;
    }
    let p = 0;
    for (let i = 0; i < 6; i++) {
        if (f[i] == 1)
            p++;
    }
    if (p == 6) {
        submitButton.disabled = false;
        submitButton.style.cursor = "pointer";
    }
    else {
        submitButton.disabled = true;
        submitButton.style.cursor = "not-allowed";
    }
}