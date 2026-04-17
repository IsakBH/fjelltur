const edit_fjelltur_dialog = document.getElementById('rediger-fjelltur-dialog');
const edit_fjelltur_fjelltur_id = document.getElementById('rediger-fjelltur-skjema-tur-id');

function open_rediger_fjelltur(id, navn, beskrivelse, dato, thumbnail, fjell) {
    fjelltur_info = {id, navn, beskrivelse, dato, thumbnail, fjell}
    console.log(`Bruker har åpnet dialogen for å redigere en eksisterende fjelltur.`);
    edit_fjelltur_dialog.showModal();
    edit_fjelltur_fjelltur_id.value = id;
}

function close_fjelltur_edit() {
    edit_fjelltur_dialog.close();
}