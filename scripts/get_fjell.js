const fjell_display = document.getElementById('fjell-display');

function get_fjell() {
    console.log("Henter liste over fjell...")
    fetch("scripts/get_fjell.php")
        .then(response => response.json())
        .then(fjell => {
            console.log(`Informasjon om fjell mottatt!`);
            const fjell_liste = document.getElementById('fjell-liste');
            fjell_liste.innerHTML = '';

            fjell.forEach(fjellet => {
                console.log(`Hei. Jeg har informasjon om dette fjellet: ${fjellet.navn}`);
                const li = document.createElement('li');
                let fjell_navn = fjellet.navn;
                let lowercase_fjell_navn = fjell_navn.toLowerCase()
                let fjell_bilde_path = `images/fjell/${lowercase_fjell_navn}.jpg`
                li.innerHTML = `
                    <img class="fjell-bilde" src="${fjell_bilde_path}">
                    <div class="fjell-navn">
                        <span>${fjellet.navn}</span>
                    </div>
                    <div class="fjell-beskrivelse">
                        <span>${fjellet.beskrivelse}</span>
                    </div>
                    <div class="fjell-informasjon">
                        <span>Høyde: ${fjellet.hoyde}</span> <br>
                        <span>Region: ${fjellet.region}</span>
                    </div>
                `;
                fjell_liste.appendChild(li);
            });
        })
}

document.addEventListener("DOMContentLoaded", () => {
    get_fjell();
})

/*
const li = document.createElement('li');
li.innerHTML = `
    <div id="fjell-item">
        <span id="fjell-navn">${fjellet.navn}</span>
    </div>
`;
list.appendChild(li);
*/