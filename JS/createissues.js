window.onload = function(){
    var description = document.querySelector("#description");
    var title = document.querySelector("#title");
    var button = document.querySelector("button");
    button.addEventListener('click', handleClick);

    function handleClick(){
        validate();
    }

    function validate(){
        if(description.value == "" || description.value == null || title.value == "" || title.value == null){
            alert("Please enter a value in all fields");
        }
    }


}