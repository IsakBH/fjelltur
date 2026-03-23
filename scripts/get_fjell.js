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
                li.innerHTML = `
                    <div id="fjell-item">
                        <span id="fjell-navn">${fjellet.navn}</span>
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