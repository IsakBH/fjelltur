const fjelltur_display = document.getElementById('fjelltur-display');

function get_fjelltur() {
    console.log("Henter liste over fjellturer...")
    fetch("/fjelltur/scripts/actions/get_fjellturer.php")
        .then(response => response.json())
        .then(fjellturer => {
            console.log(`Informasjon om fjellturer mottatt!`);
            const fjelltur_liste = document.getElementById('fjelltur-liste');
            fjelltur_liste.innerHTML = '';

            console.log(fjellturer);
            fjellturer.forEach(fjelltur => {
                const ny_fjell_lyd = new Audio("/fjelltur/storage/sounds/nyfjell.mp3");
                ny_fjell_lyd.play();
                console.log(`Hei. Jeg har informasjon om denne fjellturen: ${fjelltur.navn}`);
                console.log(fjelltur);
                const li = document.createElement('li');
                const fjelltur_id = fjelltur.id;
                const fjelltur_navn = fjelltur.navn;
                const fjelltur_beskrivelse = fjelltur.beskrivelse;
                const fjelltur_dato = fjelltur.dato;
                const fjelltur_fjellid = fjelltur.fjellid;
                const fjelltur_fjellnavn = fjelltur.fjellnavn;
                const fjelltur_brukernavn = fjelltur.brukernavn;
                const fjelltur_bilde_path = `/fjelltur/storage/images/thumbnails/${fjelltur.thumbnail}`;
                li.innerHTML = `
                    <div class="mini-action-div">
                        <button class="mini-action-button" id="slett-fjelltur-knapp" onclick="slett_fjelltur()"><i class="fa-solid fa-trash-can"></i></button>
                        <button class="mini-action-button" id="rediger-fjelltur-knapp"
                            onclick="open_rediger_fjelltur(
                                ${fjelltur_id},
                                '${fjelltur_navn}',
                                '${fjelltur_beskrivelse}',
                                '${fjelltur_dato}',
                                '${fjelltur_bilde_path}',
                                '${fjelltur_fjellid}',
                                '${fjelltur_fjellnavn}'
                            )">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </button>
                    </div>
                    <img class="fjell-bilde" src="${fjelltur_bilde_path}">
                    <div class="fjell-informasjon">
                        <div class="fjell-navn">
                            <span>${fjelltur_navn}</span>
                        </div>
                        <div class="fjell-beskrivelse">
                            <span>${fjelltur_beskrivelse}</span>
                        </div> <br>
                        <span><b class="mini-header">Dato:</b> ${fjelltur_dato}</span> <br>
                        <span><b class="mini-header">Fjell:</b> ${fjelltur_fjellnavn}</span> <br>
                        <span><b class="mini-header">Person:</b> ${fjelltur_brukernavn}</span>
                    </div>
                `;
                fjelltur_liste.appendChild(li);
            });
        })
}

document.addEventListener("DOMContentLoaded", () => {
    get_fjelltur();
})