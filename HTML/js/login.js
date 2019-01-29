document.addEventListener("DOMContentLoaded", function(event) {
    document.getElementById("loginBtn").addEventListener("click", loginBegan);
    document.getElementById("cancelBtn").addEventListener("click", cancelBegan);
    document.getElementById("passwordField").addEventListener("keyup", function(e) {
        if (e.keyCode === 13) {
          document.getElementById("passwordField").blur();
          loginBegan();
        }
      });
});

function loginBegan(){
    var usernameField = document.getElementById("usernameField");
    var passwordField = document.getElementById("passwordField");
    var username = usernameField.value;
    var password = passwordField.value;
    postData(username, password);
}

function cancelBegan(){
    window.location.replace("/index.html");
}

function postData(user, pass){
    //open http request
    http = new XMLHttpRequest();
    http.open("POST", "../includes/auth.php", true);

    //set URI
    dataURI = "u=" + encodeURIComponent(user) + "&" + "p=" + encodeURIComponent(pass);
    
    //send request
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send(dataURI);

    http.onreadystatechange = function() {
        if (http.readyState == 4) {
          if (http.status == 200) {
            response = http.response;
            if (response == true){
                window.location.replace("/admin.php");
            } else {
                returnErr();
            }
          }
        }
      };
}

function returnErr(){
    alert("username or password is incorrect");
}