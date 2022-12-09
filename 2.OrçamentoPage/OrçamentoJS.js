//Dropdown list calculation//
var service_prices = new Array();
service_prices["0"] = 0;
service_prices["1500"] = 1500;
service_prices["4000"] = 4000;
service_prices["8000"] = 8000;

//^gives me value of each drop down list item
function getServicePrice() {
  var serviceOptionPrice = 0;
  var form = document.forms["formulario"];
  var selectedOption = form.querySelector("#servicePrice");
  if (service_prices[selectedOption.value]) {
    serviceOptionPrice = service_prices[selectedOption.value];
  }
  return serviceOptionPrice;
}


//checkbox calculation//

function extraPrices() {
  var extraPrices = 0;
  var form = document.forms["formulario"];
  var selectedBoxes = form.querySelectorAll("#selectedBox");
  selectedBoxes.forEach(box => {
    if (box.checked == true) {
      extraPrices += 400;
    }
  })
//returns me value of each marked checkbox (all of them == 400)
  return extraPrices;
}
//Calculate how much is going to be removed from the final Value
const getDiscountPercent = (months) => {
    // no discount if months are undefined or 0
  let discount = 0
  if (months && months > 0) {
    discount = months < 4 ? months * 0.05 : 0.2;
  }
  return discount
}
 

//Returns me what's gonna be subtracted from final value
function Total() {
  
  var months = parseInt(document.querySelector('#months').value);
  var finalPrice = (getServicePrice() + extraPrices())*getDiscountPercent(months);
  var totalFinal = (getServicePrice() + extraPrices())- finalPrice ;
  document.getElementById("result").value = "€" + totalFinal ;
}
console.log(totalFinal)


// Validação de formulário (REQUIRED no HTML)
function validateForm() {
  let x = document.forms["formulario"]["first"].value;
  if (x == "") {
    alert("All fields must be filled!");
    return false;
  }
  let y = document.forms["formulario"]["last"].value;
  if (y == "") {
    alert("All fields must be filled!");
    return false;
  }
  let z = document.forms["formulario"]["phone"].value;
  if (z == "") {
    alert("All fields must be filled!");
    return false;
  }
}