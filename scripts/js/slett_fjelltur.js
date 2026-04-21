const slett_fjelltur_dialog = document.getElementById('slett-fjelltur-dialog');
const slett_fjelltur_knapp = document.getElementById('slett-fjelltur-knapp');

function slett_fjelltur(fjelltur_id) {
    console.log("Bruker vil slette fjelltur " + fjelltur_id + "!");
    slett_fjelltur_dialog.showModal();
        fetch('/scripts/actions/slett_fjelltur.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                id: documentId
            })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                slett_fjelltur_dialog.close();
            }
        });
}