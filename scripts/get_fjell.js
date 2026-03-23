const fjell_display = document.getElementById('fjell-display');

function get_fjell() {
    console.log("Henter liste over fjell...")
    fetch("scripts/get_fjell.php")
        .then(response => response.json())
        .then(fjell => {
            const fjell_liste = document.getElementById('fjell-liste');
            fjell_liste.innerHTML = '';
            kulefjell.forEach(fjell => {
                const li = document.createElement('li');
                li.innerHTML = `
                    <div id="fjell-item">
                        <span id="fjell-navn">${fjell.navn}</span>
                    </div>
                `;
                list.appendChild(li);
            });
        })
}

document.addEventListener("DOMContentLoaded", () => {
    get_fjell();
})