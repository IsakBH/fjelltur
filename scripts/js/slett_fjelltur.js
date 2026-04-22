const slett_fjelltur_dialog = document.getElementById('slett-fjelltur-dialog');
const slett_fjelltur_knapp = document.getElementById('slett-fjelltur-knapp');
const slett_fjelltur_skjema_id = document.getElementById('slett-fjelltur-id');

function slett_fjelltur(fjelltur_id) {
    console.log("Hei, dette er Isak Brun. Det virker som at brukeren har trykket på slett knappen på en fjelltur. :D");
    console.log("Fjelltur id: " + fjelltur_id);
    slett_fjelltur_skjema_id.value = fjelltur_id;
    slett_fjelltur_dialog.showModal();
}