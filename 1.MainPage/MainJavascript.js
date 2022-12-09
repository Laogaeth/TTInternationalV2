
function load() {
  let url = 'https://news.google.com/rss?hl=pt-PT&gl=PT&ceid=PT:pt-150';
  $.ajax({
  url:" https://api.rss2json.com/v1/api.json?rss_url=" + url,
  type: "GET",
  success: function (data) {
  objeto_json = eval(data);
// read the content
var frase = "";
for (i = 0; i < objeto_json.items.length; i++)
{

frase = frase + "<hr> Title: " +
objeto_json.items[i].title + "</b><br/>";
frase = frase +
objeto_json.items[i].description + "<br/>";
}
$("#feedarea").html(frase);
},
error: function (xhr, status) {
alert('Ocorreu um erro.');
}
});
}


//Alert timer
function timerAlert(){
  window.onload = setTimeout(function(){
    alert('Welcome to our website');}, 5000 ); return false;
    
}

//Load Ajax Business Model html
function loadAjax(){
  var objHttp=null;
 if(window.XMLHttpRequest){
  objHttp = new XMLHttpRequest();
 }else if(window.ActiveXObject){
  objHttp = newActiveXObject("Microsoft.XMLHTTP");

 }
  objHttp.open("GET", "BusinessModel" + ".html",true);
  objHttp.onreadystatechange = function(){
    if(objHttp.readyState==4){
      document.getElementById("busModel").innerHTML= objHttp.responseText;
    }
  }
  objHttp.send(null);
}