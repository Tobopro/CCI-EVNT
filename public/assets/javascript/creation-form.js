// This script is use on a bootstrap form it requires to change bootstrap default color of inputs:focus with a variable 
// declared this way :root { --color-input : putyourdefaultcolorhere}
// If you're not using bootstrap form you can easily adapt this code


const regex = {
    'lastName': /^[A-Z][a-zA-Z-]{0,}[^-]$/,
    'firstName': /^[A-Z][a-zA-Z-]{0,}[^-]$/,
    'tel': /^(0[1-9])[0-9]{8}$/,
    'mail': /^[a-z0-9.-]+@[a-z0-9.-]+(\.[a-z]{2,4})$/,
    'password': /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{12,}$/,
}
const form = document.querySelector("form[name='inscription']");

// Function to change style on form inputs
// take the element you want to target (e) in argument
function successRegex(e) {
    document.documentElement.style.setProperty('--color-input', '#38cc8c');
    e.classList.add("success-input");
    e.classList.remove("false-input");
}
function failRegex(e) {
    document.documentElement.style.setProperty('--color-input', '#ff7a7a');
    e.classList.remove("success-input");
    e.classList.add("false-input");
}
function emptyStringRegex(e) {
    document.documentElement.style.setProperty('--color-input', '$sub-color');
    e.classList.remove("false-input");
    e.classList.remove("success-input");
}
// Test if the value of the input match with the Regex and call the the function to change the style depending on the result
function testRegex(regex, e) {
    if (this.value === '') {
        emptyStringRegex(this);
    } else if (regex.test(this.value)) {
        successRegex(this);
    } else if (!regex.test(this.value)) {
        failRegex(this);
    }
}
// Check every "type" value of each input in a form and return an array with the name of each input which match the validType array
function checkTypeInput(form) {
    const validType = ['text', 'email', 'tel', 'password']
    let names = [];
    const champs = form.querySelectorAll('input');
    champs.forEach(element => {
        if (validType.includes(element.type))
            names.push(element.name);
    });
    return names;
}
// Take as argument a form, the type of event and an object with regex you want to use
// iterate on the array inputNames and add an event on each iteration. It's important to match the names of your form inputs with the name of the regex you wanna use on them
function createFormInputCheck(form, eventType, regex, e) {
    inputNames = checkTypeInput(form);
    regPwd = regex.password
    inputNames.forEach(name => {
        form[name].addEventListener('focusout', (e) => {
            document.documentElement.style.setProperty('--color-input', '$sub-color');
        });
        if (name !== 'passwordConfirmation') {
            let reg = regex[name];
            form[name].addEventListener(eventType, testRegex.bind(form[name], reg));
            return;
        }
        if (name == 'passwordConfirmation') {
            form[name].addEventListener(eventType, () => {
                if (form[name].value === '') {
                    emptyStringRegex(form[name]);
                } else if (form[name].value === form['password'].value) {
                    successRegex(form[name]);
                } else {
                    failRegex(form[name]);
                }
            });
        }
    });
}

createFormInputCheck(form, 'input', regex);
createFormInputCheck(form, 'focusin', regex);
