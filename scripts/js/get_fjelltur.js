const fjelltur_display = document.getElementById('fjelltur-display');

function get_fjelltur() {
    console.log("Henter liste over fjellturer...")
    fetch("/fjelltur/scripts/actions/get_fjellturer.php")
        .then(response => response.json())
        .then(fjellturer => {
            console.log(`Informasjon om fjellturer mottatt!`);
            const fjelltur_liste = document.getElementById('fjelltur-liste');
            fjelltur_liste.innerHTML = '';

            fjellturer.forEach(fjelltur => {
                let ny_fjell_lyd = new Audio("/fjelltur/storage/sounds/nyfjell.mp3");
                ny_fjell_lyd.play();
                console.log(`Hei. Jeg har informasjon om denne fjellturen: ${fjelltur.navn}`);
                console.log(fjelltur);
                const li = document.createElement('li');
                let fjelltur_navn = fjelltur.navn;
                let fjelltur_bilde_path = `/fjelltur/storage/images/thumbnails/${fjelltur.thumbnail}`;
                li.innerHTML = `
                    <img class="fjell-bilde" src="${fjelltur_bilde_path}">
                    <div class="fjell-informasjon">
                        <div class="fjell-navn">
                            <span>${fjelltur_navn}</span>
                        </div>
                        <div class="fjell-beskrivelse">
                            <span>${fjelltur.beskrivelse}</span>
                        </div> <br>
                        <span><b class="mini-header">Dato:</b> ${fjelltur.dato}</span> <br>
                        <span><b class="mini-header">Fjell:</b> ${fjelltur.fjellnavn}</span> <br>
                        <span><b class="mini-header">Person:</b> ${fjelltur.brukernavn}</span>
                    </div>
                `;
                fjelltur_liste.appendChild(li);
            });
        })
}

document.addEventListener("DOMContentLoaded", () => {
    get_fjelltur();
})