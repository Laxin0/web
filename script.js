function updateText(button) {
    selectNodeByName(button.textContent);
}

function selectNodeByName(name){
    fetch(`server.php?name=${name}`)
    .then(response => response.json())
    .then( data => {
        if (data.error){
            console.error("Error:", error);
            return;
        }

        document.getElementById("content").innerHTML = data.content;

        document.getElementById("name").innerHTML = data.name;

        let buttons = document.getElementById("child_nodes");
        buttons.replaceChildren();

        data.child_names.forEach(ch_name => {
            let newButton = document.createElement("button");
            newButton.textContent = ch_name;
            newButton.onclick = () => updateText(this);
            buttons.appendChild(newButton);
        });
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
