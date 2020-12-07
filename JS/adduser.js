window.onload = function(){
    var firstname = document.querySelector("#firstname");
    console.log(firstname);
    var lastname = document.querySelector("#lastname");
    console.log(lastname);
    var password = document.querySelector("#password");
    console.log(password);
    var email = document.querySelector("#email");
    console.log(email);
    var btn = document.querySelector("button");
    console.log(btn);

    btn.addEventListener('click', handleClick);

    function handleClick(clickEvent){
        console.log("I GOT CLICKED");
        validateEmail(email.value);
        validateNames(firstname.value,lastname.value);
        validatePassword(password.value);
    }


    function validateEmail(email) {
        const pattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
        if ((!email.match(pattern)) || email== "" || email == null){
            alert("You either left the email field empty or entered an invalid email address");
            // valid += 1;
        }
    }

    function validateNames(firstname,lastname) {
        var pattern = /^[A-Za-z]+$/;
        // fname.match(pattern);
        if (( !firstname.match(pattern) ) || firstname == "" || firstname == null || lastname == "" || lastname == null || (!lastname.match(pattern))){
            alert("You either left the last name or first name fields blanks or you entered invalid information into on of the fields");
        }
    }

    function validatePassword(password) {
        var pattern = /^[0-9a-zA-Z]{8,}$/;
        if ((!password.match(pattern)) || password == "" || password == null){
            alert("You either left the password field empty or entered an invalid password");
        }
        
    }
}