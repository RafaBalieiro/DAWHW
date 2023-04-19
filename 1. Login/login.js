// Crie um array com os e-mails válidos



// Acesse o formulário e o botão de login
const form = document.querySelector('.login-form');
const loginButton = document.querySelector('button[type="submit"]');

// Adicione um ouvinte de evento ao botão de login
loginButton.addEventListener('click', function (event) {
  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = cname + "=" + cvalue + "; " + expires;
  }

  let cookie = {};

  document.cookie.split(';').forEach(function (el) {
    let [k, v] = el.split('=');
    cookie[k.trim()] = v;
  })

  if (cookie.JA_LOGOU != "SIM") {

    var validEmails = JSON.stringify({ "Login": [{ "Email": 'bernardo.2210478300077@faeterj-rio.edu.br', "Usuario": 1, "Nome": "Bernardo" }, { "Email": 'marcio.belo@faeterj-rio.edu.br', "Usuario": 2, "Nome": "Belo" }, { "Email": 'exemplo@yahoo.com', "Usuario": 3, "Nome": "Exemplo" }] });
    setCookie("JA_LOGOU", "SIM", 2);
    localStorage.setItem("validEmail", validEmails);
  }
  else {
    var validEmails = localStorage.getItem("validEmail");
  }

  event.preventDefault(); // Impede o envio do formulário

  // Obtenha o valor do campo de e-mail
  const email = document.querySelector('#email').value;

  validEmails = JSON.parse(validEmails);
  console.log("TESTE");
  console.log(validEmails);
  // Verifique se o e-mail é válido
  if (validEmails.Login.find(element => element.Email === email) != undefined) {
    // Direcionar usuário para a página catalogo.html
    // ?
    let thisClient = JSON.stringify(validEmails.Login.find(element => element.Email === email));
    console.log("ESSE CLIENTE: ");
    console.log(thisClient);
    localStorage.setItem("thisClient", thisClient);
    $('#thisClient').val(JSON.stringify(validEmails.Login.find(element => element.Email === email)));

    form.submit();
  }
  else {
    alert('E-mail ainda não cadastrado no sistema.'); // Exibe uma mensagem de erro

    form.reset(); // Limpar formulário
  }
});

document.getElementById("show-password-btn").addEventListener("click", function () {
  var passwordInput = document.getElementById("password");

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    document.getElementById("show-password-btn").textContent = "Esconder senha";
  } else {
    passwordInput.type = "password";
    document.getElementById("show-password-btn").textContent = "Mostrar senha";
  }
});
