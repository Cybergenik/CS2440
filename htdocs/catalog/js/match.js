function checker(){
    p = document.getElementById("pass").value;
    v = document.getElementById("vpass").value;
    if(p !== "" && v !== ""){
        if(p == v){
            document.getElementById("pass").style.borderColor = "green";
            document.getElementById("vpass").style.borderColor = "green";
            document.getElementById("warning").setAttribute("hidden", null);
            document.getElementById("submit").removeAttribute("disabled");
        }
        else{
            document.getElementById("pass").style.borderColor = "red";
            document.getElementById("vpass").style.borderColor = "red";
            document.getElementById("warning").removeAttribute("hidden");
            document.getElementById("submit").setAttribute("disabled", true);
        }
    }
}
