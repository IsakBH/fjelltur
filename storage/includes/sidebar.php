        <div id="sidebar">
            <div id="sidebar-content">
                <h2><i class="fa-solid fa-person"></i> Deg</h2>

                <hr>

                <button class="sidebar-knapp <?php if ($filename === "index.php") { echo "active-page"; } ?>" onclick="location.href='index.php';"><i class="fa-solid fa-home"></i>Hjem</button>
                <button class="sidebar-knapp <?php if ($filename === "fjelltur.php") { echo "active-page"; } ?>" onclick="location.href='pages/fjelltur.php';"><i class="fa-solid fa-person-hiking"></i>Fjellturer</button>
                <button class="sidebar-knapp" onclick="openSettings()"><i class="fa-solid fa-sliders"></i> Innstillinger</button>

                <hr>

                <h2><i class="fa-solid fa-people-group"></i> Sosialt</h2>

                <hr>

                <button class="sidebar-knapp <?php if ($filename === "profil.php") { echo "active-page"; } ?>" onclick="location.href='pages/profil.php';"><i class="fa-solid fa-address-card"></i> Min profil</button>
                <button class="sidebar-knapp <?php if ($filename === "venner.php") { echo "active-page"; } ?>" onclick="location.href='pages/venner.php';"><i class="fa-solid fa-user-group"></i> Mine venner</button>

                <p id="author">Laget av Isak B. Henriksen</p>
            </div>
        </div>