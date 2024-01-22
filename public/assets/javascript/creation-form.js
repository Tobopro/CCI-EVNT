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
    } else if (regex.test(this.value)) {
        document.documentElement.style.setProperty('--color-input', '#38cc8c');
    } else if (!regex.test(this.value)) {
        document.documentElement.style.setProperty('--color-input', '#ff7a7a');
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
function createFormInput(form, regex) {
    inputNames = checkTypeInput(form);
    inputNames.forEach(name => {
        if (name === 'passwordConfirmation') {
            return;
        }
        reg = regex[name];
        form[name].addEventListener('input', testRegex.bind(form[name], reg));
    });
}

createFormInput(form, regex);