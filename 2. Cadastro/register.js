

// Acesse o formulário e o botão de Registro
const form = document.querySelector('.register-form');
const loginButton = document.querySelector('button[type="submit"]');

// Adicione um ouvinte de evento ao botão de login
loginButton.addEventListener('click', function (event) {
    hasEmail = false;
    let validEmails;
    validEmails = localStorage.getItem("validEmail");
    validEmails = JSON.parse(validEmails);

    event.preventDefault(); // Impede o envio do formulário

    // Obtenha o valor do campo de e-mail
    const email = document.querySelector('#email').value;

    //Nome
    const nome = document.querySelector('#name').value;
    validEmails.Login.forEach(function (myElement) {
        if (myElement.Email == email) {
            hasEmail = true;
        }
    });

    if (hasEmail == true) {
        form.reset();
        alert("Já existe este email cadastrado!");
        console.log(validEmails.Login.find(element => element.Email === email));
    }
    else {
        event.preventDefault(); // Impede o envio do formulário
        console.log(validEmails.Login.find(element => element.Email === email));

        let loginLength = validEmails.Login.length;
        validEmails.Login[loginLength] = ({ "Email": email, "Usuario": loginLength + 1, "Nome": nome });


        localStorage.setItem("validEmail", JSON.stringify(validEmails));
        localStorage.setItem("thisClient", "");

        form.submit();
    }

});

