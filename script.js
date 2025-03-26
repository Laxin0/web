function updateText(button) {
    selectNodeByName(button.textContent);
}

function selectNodeByName(name){
    fetch(`server.php?name=${name}`)
    .then(response => response.json())
    .then( data => {
        console.log(data);
        /*
        if (data.error){
            console.error("Error:", error);
        }
        // TODO: Add error handling
        document.getElementById("content").innerHTML = data.content;
        document.getElementById("name").innerHTML = data.name;
        let buttons = document.getElementById("child_nodes");
        buttons.replaceChildren(); // May not work in old browsers
        data.child_names.forEach(ch_name => {
            let newButton = document.createElement("button");
            newButton.textContent = data.name;
            newButton.onclick = "updateText(this)";
            buttons.appendChild(newButton);
        });
        */
    })
    .catch(error => console.error("Error:", error));
}

function test(){
    fetch(`test.php?arg=foo`)
    .then(response => response.json())
    .then( data => {
        console.log(data);
    })
    .catch(error => console.error("Error:", error));
}