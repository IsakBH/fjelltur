const edit_fjelltur_dialog = document.getElementById('rediger-fjelltur-dialog');

function open_new_hike() {
    console.log("Bruker har åpnet dialogen for å registrere ny fjelltur.");
    new_hike_dialog.showModal();
}

function close_fjelltur() {
    new_hike_dialog.close();
}