//Script da paginação

let link = document.getElementsByClassName("link");
let currentValue = $('#list_value').val();
if ($('#list_value').val() == "") {
  let currentValue = 1;
  $("#enable").addClass("active");
  $('#list_value').attr('value', 1);
}
$('.active').attr('id', 'list__active');

function activeLink() {
  console.log(currentValue);
  for (l of link) {
    l.classList.remove("active");
  }
  event.target.classList.add("active");
  currentValue = event.target.value;
  $('#list_value').attr('value', $('.active').val());


  const form = document.querySelector('.formlist');
  form.submit();
}

function backBtn() {
  console.log(currentValue);
  if (currentValue > 1) {
    for (l of link) {
      l.classList.remove("active");
    }
    currentValue--;

    link[$('#list_value').val() - 2].classList.add("active");
    $('#list_value').attr('value', $('.active').val());

    const form = document.querySelector('.formlist');
    form.submit();
  }
}

function nextBtn() {
  console.log(currentValue);
  if (currentValue < 6) {
    for (l of link) {
      l.classList.remove("active");
    }
    currentValue++;
    link[$('#list_value').val()].classList.add("active");
    $('#list_value').attr('value', $('.active').val());


    const form = document.querySelector('.formlist');
    form.submit();
  }
}
