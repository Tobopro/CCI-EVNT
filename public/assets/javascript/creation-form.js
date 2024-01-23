///

const regex = {
    'firstName': /^[A-Z][a-zA-Z]{2,}$/,
    'lastName': /^[A-Z][a-zA-Z]{2,}$/,
    'tel': /^(0[1-9])[0-9]{8}$/,
    'mail': /^[a-z0-9.-]+@[a-z0-9.-]+(\.[a-z]{2,4})$/,
    'password': /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{12}/,
    'passwordConfirmation': /(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])[a-zA-Z0-9]{12}/
}

const form = document.querySelector("form[name='inscription']");

function testRegex(regex, e) {
    if (this.value === '') {
        document.documentElement.style.setProperty('--color-input', '$sub-color');
        this.classList.remove("false-input");
        this.classList.remove("success-input");
    } else if (regex.test(this.value)) {
        document.documentElement.style.setProperty('--color-input', '#38cc8c');
        this.classList.add("success-input");
        this.classList.remove("false-input");
    } else if (!regex.test(this.value)) {
        document.documentElement.style.setProperty('--color-input', '#ff7a7a');
        this.classList.remove("success-input");
        this.classList.add("false-input");
    }
}
function checkTypeInput(form) {
    const arr = ['text', 'email', 'tel', 'password']
    let names = [];
    const champs = form.querySelectorAll('input');
    champs.forEach(element => {
        if (arr.includes(element.type))
            names.push(element.name);
    });
    return names;
}
function createFormInput(form, type, regex) {
    inputNames = checkTypeInput(form);
    inputNames.forEach(name => {
        if (name === 'passwordConfirmation') {
            return;
        }
        reg = regex[name];
        form[name].addEventListener(type, testRegex.bind(form[name], reg));
    });
}

createFormInput(form, 'input', regex);
createFormInput(form, 'focusin', regex);
const inputs = form.querySelectorAll('input')
inputs.forEach(input => {
    input.addEventListener('focusout', (e) => {
        document.documentElement.style.setProperty('--color-input', '$sub-color');
    });
})