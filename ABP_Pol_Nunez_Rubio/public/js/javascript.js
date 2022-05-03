let trashButtons = document.getElementsByClassName("trashButtons");
let pModalBody = document.getElementById("pModalBody");
let formModal = document.getElementById("formModal");

for(let i = 0; i < trashButtons.length; i++) {
    trashButtons[i].addEventListener("click",function() {
        pModalBody.innerHTML = "Estas segur que vols esborrar " + trashButtons[i].dataset.sigles;
        formModal.action = trashButtons[i].dataset.action;
    });
}


