///

const regex = {
    'lastName': /^[A-Z][a-zA-Z-]{0,}[^-]$/,
    'firstName': /^[A-Z][a-zA-Z-]{0,}[^-]$/,
    'tel': /^(0[1-9])[0-9]{8}$/,
    'mail': /^[a-z0-9.-]+@[a-z0-9.-]+(\.[a-z]{2,4})$/,
    'password': /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{12,}$/,
}
const form = document.querySelector("form[name='inscription']");

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

function testRegex(regex, e) {
    if (this.value === '') {
        emptyStringRegex(this);
    } else if (regex.test(this.value)) {
        successRegex(this);
    } else if (!regex.test(this.value)) {
        failRegex(this);
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
function createFormInput(form, type, regex, e) {
    inputNames = checkTypeInput(form);
    regPwd = regex.password
    inputNames.forEach(name => {
        if (name !== 'passwordConfirmation') {
            reg = regex[name];
            form[name].addEventListener(type, testRegex.bind(form[name], reg));
            return;
        }

        if (name == 'passwordConfirmation') {
            form[name].addEventListener(type, () => {
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

createFormInput(form, 'input', regex);

createFormInput(form, 'focusin', regex);

const inputs = form.querySelectorAll('input')

inputs.forEach(input => {
    input.addEventListener('focusout', (e) => {
        document.documentElement.style.setProperty('--color-input', '$sub-color');
    });
})