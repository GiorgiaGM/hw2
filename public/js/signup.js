function checkName(event) {
    const input = event.currentTarget;
    
    
    if (formStatus[input.name] = input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
    

}

function checkSurname(event) {
    const input = event.currentTarget;
    
    if (formStatus[input.surname] = input.value.length > 0) {
        input.parentNode.classList.remove('errorj');
    } else {
        input.parentNode.classList.add('errorj');
    }
    

}


function checkUsername() {
    const input = document.querySelector('.username input');

    if(!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
        input.parentNode.querySelector('span').textContent = "Sono ammesse lettere, numeri e underscore. Max. 15";
        input.parentNode.classList.add('errorj');
        formStatus.username = false;

    }   
    else {
        input.parentNode.classList.remove('errorj');
    }
}

function checkEmail() {
    const emailInput = document.querySelector('.email input');
    if(!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(String(emailInput.value).toLowerCase())) {
        document.querySelector('.email span').textContent = "Email non valida";
        document.querySelector('.email').classList.add('errorj');
        formStatus.email = false;

    } else {
        emailInput.parentNode.classList.remove('errorj');
    }
}

function checkPassword() {
    const passwordInput = document.querySelector('.password input');
    if (formStatus.password = passwordInput.value.length >= 8) {
        document.querySelector('.password').classList.remove('errorj');
    } else {
        document.querySelector('.password').classList.add('errorj');
    }

}

function checkConfirmPassword() {
    const confirmPasswordInput = document.querySelector('.confirm_password input');
    if (formStatus.confirmPassord = confirmPasswordInput.value === document.querySelector('.password input').value) {
        document.querySelector('.confirm_password').classList.remove('errorj');
    } else {
        document.querySelector('.confirm_password').classList.add('errorj');
    }
}

function checkUpload() {
    const upload_original = document.getElementById('upload_original');
    document.querySelector('#upload .file_name').textContent = upload_original.files[0].name;
    const o_size = upload_original.files[0].size;
    const mb_size = o_size / 1000000;
    document.querySelector('#upload .file_size').textContent = mb_size.toFixed(2)+" MB";
    const ext = upload_original.files[0].name.split('.').pop();

    if (o_size >= 7000000) {
        document.querySelector('.fileupload span').textContent = "Le dimensioni del file superano 7 MB";
        document.querySelector('.fileupload').classList.add('errorj');
        formStatus.upload = false;
    } else if (!['jpeg', 'jpg', 'png', 'gif'].includes(ext))  {
        document.querySelector('.fileupload span').textContent = "Le estensioni consentite sono .jpeg, .jpg, .png e .gif";
        document.querySelector('.fileupload').classList.add('errorj');
        formStatus.upload = false;
    } else {
        document.querySelector('.fileupload').classList.remove('errorj');
        formStatus.upload = true;
    }
}

function clickSelectFile() {
    upload_original.click();
}


document.querySelector('.name input').addEventListener('blur', checkName);
document.querySelector('.surname input').addEventListener('blur', checkSurname);
document.querySelector('.username input').addEventListener('blur', checkUsername);
document.querySelector('.email input').addEventListener('blur', checkEmail);
document.querySelector('.password input').addEventListener('blur', checkPassword);
document.querySelector('.confirm_password input').addEventListener('blur', checkConfirmPassword);
document.getElementById('upload').addEventListener('click', clickSelectFile);
document.getElementById('upload_original').addEventListener('change', checkUpload);
const formStatus = {'upload': true};
