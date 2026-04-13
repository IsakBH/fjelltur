const edit_fjelltur_dialog = document.getElementById('rediger-fjelltur-dialog');

function open_rediger_fjelltur(id) {
    console.log(`Bruker har åpnet dialogen for å redigere en eksisterende fjelltur. Fjelltur har id ${id}`);
    edit_fjelltur_dialog.showModal();
}

function close_fjelltur() {
    edit_fjelltur_dialog.close();
}