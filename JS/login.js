window.onload=function(){
    var btn = document.querySelector("button");
    var email = document.querySelector("#email");
    var password = document.querySelector("#password");

    btn.addEventListener('click', handleClick);

    function handleClick(clickEvent){
        validate();
    }

    //Function used to validate email and password entered by user.
    function validate() {
        const pattern2=/^[0-9a-zA-Z]{8,}$/;
        const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if (email.value == ""|| !email.value.match(pattern) ||!password.value.match(pattern2) || password.value == "" || password.value == null) {
            alert("You either left a field blank or enter invalid information inside a field");
        }
    }
}