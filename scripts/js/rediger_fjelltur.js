const edit_fjelltur_dialog = document.getElementById('rediger-fjelltur-dialog');
const rediger_fjelltur_fjelltur_id = document.getElementById('rediger-fjelltur-skjema-tur-id');
const rediger_fjelltur_fjelltur_navn = document.getElementById('rediger-fjelltur-skjema-navn');
const rediger_fjelltur_fjelltur_beskrivelse = document.getElementById('rediger-fjelltur-skjema-beskrivelse');
const rediger_fjelltur_fjelltur_dato = document.getElementById('rediger-fjelltur-skjema-dato');
const rediger_fjelltur_fjelltur_fjell = document.getElementById('rediger-fjelltur-skjema-fjell');


function open_rediger_fjelltur(id, navn, beskrivelse, dato, thumbnail, fjellid, fjellnavn) {
    fjelltur_info = {id, navn, beskrivelse, dato, thumbnail, fjellid, fjellnavn}
    console.log(`Bruker har åpnet dialogen for å redigere en eksisterende fjelltur.`);
    console.log(fjelltur_info);
    edit_fjelltur_dialog.showModal();

    // setter skjema verdiene til eksisterende fjelltur data
    rediger_fjelltur_fjelltur_id.value = id;
    rediger_fjelltur_fjelltur_navn.value = navn;
    rediger_fjelltur_fjelltur_beskrivelse.value = beskrivelse;
    rediger_fjelltur_fjelltur_dato.value = dato;
    rediger_fjelltur_fjelltur_fjell.value = fjellid;

}

function close_fjelltur_edit() {
    edit_fjelltur_dialog.close();
}