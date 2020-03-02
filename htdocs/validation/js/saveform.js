var form = Array();

function saver(){
    form.push(document.getElementsByName("band"));
    form.push(document.getElementsByName("color"));
    form.push(document.getElementsByName("size"));
    form.push(document.getElementsByName("style"));
    form.push(document.getElementsByName("fname"));
    form.push(document.getElementsByName("lname"));
    form.push(document.getElementsByName("email"));
    form.push(document.getElementsByName("phone"));
    form.push(document.getElementsByName("mailing"));
}

function putter(){
    if (form !== ""){
        document.getElementsByName("band").innerHTML = form[0];
        document.getElementsByName("color").innerHTML = form[1];
        document.getElementsByName("size").innerHTML = form[2];
        document.getElementsByName("style").innerHTML = form[3];
        document.getElementsByName("fname").innerHTML = form[4];
        document.getElementsByName("lname").innerHTML = form[5];
        document.getElementsByName("email").innerHTML = form[6];
        document.getElementsByName("phone").innerHTML = form[7];
        document.getElementsByName("mailing").innerHTML = form[8];
    }
}