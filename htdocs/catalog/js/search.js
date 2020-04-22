function nameSearch(){
    let searchTerm = document.getElementById('searchTerm').value.toLowerCase()
    var catalog = document.getElementsByClassName('flex-catalog')
    let total = document.getElementById("catalog").childElementCount

    if(searchTerm != ''){
        for(i = 1; i <= total; i++){
            nameText = document.querySelector("#prod"+i+" > h5").innerText.toLowerCase()
            descText = document.querySelector("#prod"+i+" > div:nth-child(3) > p").innerText.toLowerCase()
            if(nameText.includes(searchTerm) || descText.includes(searchTerm)){
                document.getElementById("prod"+i).removeAttribute("hidden");
            }
            else{
                document.getElementById("prod"+i).setAttribute("hidden", null);
            }
        }
    }
    else{
        for(i = 1; i <= total; i++){
            document.getElementById("prod"+i).removeAttribute("hidden");
        }
    }
}