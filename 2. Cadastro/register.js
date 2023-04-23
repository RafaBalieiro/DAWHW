

// Acesse o formulário e o botão de Registro
const form = document.querySelector('.register-form');
const loginButton = document.querySelector('button[type="submit"]');

// Adicione um ouvinte de evento ao botão de login
loginButton.addEventListener('click', function (event) {
    // Obtenha o valor do campo de e-mail
    const email = document.querySelector('#email').value;

    //Nome
    const nome = document.querySelector('#name').value;

    console.log(validEmails.Login.find(element => element.Email === email));

    let loginLength = validEmails.Login.length;
    validEmails.Login[loginLength] = ({ "Email": email, "Usuario": loginLength + 1, "Nome": nome });

    form.submit();

});

