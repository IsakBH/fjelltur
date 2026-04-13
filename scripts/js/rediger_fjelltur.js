const edit_fjelltur_dialog = document.getElementById('rediger-fjelltur-dialog');

function open_rediger_fjelltur(id, navn, beskrivelse, dato, thumbnail, fjell) {
    fjelltur_info = {id, navn, beskrivelse, dato, thumbnail, fjell}
    console.log(`Bruker har åpnet dialogen for å redigere en eksisterende fjelltur.`);
    edit_fjelltur_dialog.showModal();
}

function close_fjelltur_edit() {
    edit_fjelltur_dialog.close();
}