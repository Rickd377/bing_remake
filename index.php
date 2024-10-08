<?php
// Database connection
$servername = "localhost";
$username = "root"; // Change if necessary
$password = ""; // Change if necessary
$dbname = "slider_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from database
$sql = "SELECT title, image_url FROM slider_items";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/29186d169c.js" crossorigin="anonymous"></script>
    <link rel="icon" href="assets/web-icon.png">
    <link rel="stylesheet" href="css/style.css">
    <title>Bing</title>
</head>

<body>
    <header>
        <div class="header-left">
            <div class="bing-logo">
                <div class="microsoft-logo">
                    <div class="square red"></div>
                    <div class="square green"></div>
                    <div class="square blue"></div>
                    <div class="square yellow"></div>
                </div>
                <p>Microsoft Bing</p>
            </div>
            <div class="copilot-logo">
                <img src="assets/copilot.webp" alt="">
                <a href="https://copilot.microsoft.com/" target="_blank">Copilot</a>
            </div>
            <a href="#">Afbeeldingen</a>
            <a href="#">Video's</a>
            <a href="#">Winkelen</a>
            <a href="#">Kaarten</a>
            <a href="#">Nieuws</a>
            <div class="dropdown">
                <i class="fa-solid fa-ellipsis dropdownBtn"></i>
                <div class="dropdown-content">
                    <a href="https://www.bing.com/search?q=Bing+translate&FORM=TTAHP1" target="_blank">Vertalen</a>
                    <a href="https://www.bing.com/travel?FORM=TGHPNT&entrypoint=TGHPNT" class="reis"
                        target="_blank">Reis</a>
                    <a href="https://www.msn.com/nl-nl?ocid=BHEA000" target="_blank">MSN</a>
                    <a href="https://www.msn.com/nl-nl/play?ocid=cgbinghp" target="_blank">Online Games</a>
                    <div class="dropdown-submenu">
                        <a href="#" class="item-m">Microsoft 365 <i class="fa-solid fa-angle-right"></i></a>
                        <div class="dropdown-submenu-content">
                            <a href="//outlook.com/?WT.mc_id=O16_BingHP" target="_blank">Outlook</a>
                            <a href="//microsoft365.com/start/Word.aspx?WT.mc_id=O16_BingHP" target="_blank">Word</a>
                            <a href="//microsoft365.com/start/Excel.aspx?WT.mc_id=O16_BingHP" target="_blank">Excel</a>
                            <a href="//microsoft365.com/start/PowerPoint.aspx?WT.mc_id=O16_BingHP"
                                target="_blank">PowerPoint</a>
                            <a href="//www.onenote.com/notebooks?WT.mc_id=O16_BingHP" target="_blank">OneNote</a>
                            <a href="//sway.office.com?WT.mc_id=O16_BingHP&utm_source=O16Bing&utm_medium=Nav&utm_campaign=HP"
                                target="_blank">Sway</a>
                            <a href="//onedrive.live.com/?gologin=1&WT.mc_id=O16_BingHP" target="_blank">OneDrive</a>
                            <a href="//calendar.live.com/?WT.mc_id=O16_BingHP" target="_blank">Agenda</a>
                            <a href="//outlook.live.com/owa/?path=/people&WT.mc_id=O16_BingHP"
                                target="_blank">Personen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-right">
            <a href="#">English</a>
            <a href="#" class="aanmelden">
                <p>Aanmelden</p>
                <img class="profile-img" src="assets/default-pfp-d.webp" alt="">
            </a>
            <a href="#" class="rewards">
                <p>0</p>
                <i class="fa-solid fa-trophy"></i>
            </a>
            <div class="dropdown-bars">
                <i class="fas fa-bars dropdownBarsBtn"></i>
                <div class="dropdown-bars-content">
                    <a href="#" class="first-item"><i class="far fa-square-plus"></i> Verzamelingen</a>

                    <!-- instellingen -->
                    <div class="dropdown-sub-sub">
                        <a href="#" class="drop-toggle"><i class="fas fa-cog"></i> Instellingen <i
                                class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-sub-sub-content">
                            <a class="settings" href="#">
                                <p class="title-sub">Taal</p>
                                <p class="text-sub">Nederland</p>
                            </a>
                            <a class="settings" href="#">
                                <p class="title-sub">Land/regio</p>
                                <p class="text-sub">Nederland</p>
                            </a>
                            <a class="settings" href="#">
                                <p class="title-sub">Locatie</p>
                            </a>
                            <a class="settings" href="#">
                                <p class="title-sub">Spraak</p>
                            </a>
                            <a class="settings" href="#">
                                <p class="title-sub">Meer</p>
                            </a>
                        </div>
                    </div>

                    <a href="#"><i class="fas fa-lock"></i> Veilig Zoeken <p class="side-text">Gemiddeld</p></a>

                    <!-- labs -->
                    <div class="dropdown-sub-sub">
                        <a href="#" class="drop-toggle"><i class="fas fa-user-shield"></i> Labs <i
                                class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-sub-sub-content">
                            <a href="#" class="lab-item">
                                <p class="labs-title">Chatreactie op resultaatpagina</p>
                                <p class="labs-text">Kies hoe vaak u chatreacties wilt zien op de pagina met
                                    zoekresultaten</p>
                                <div class="lab-inputone">
                                    <input type="radio" name="chat" id="chat1">
                                    <label for="chat1">Automatisch (Standaard)</label>
                                </div>
                                <div class="lab-inputtwo">
                                    <input type="radio" name="chat" id="chat2" checked>
                                    <label for="chat2">Uit</label>
                                </div>
                            </a>
                        </div>
                    </div>

                    <a href="#"><i class="fas fa-clock"></i> Zoekgeschiedenis</a>
                    <a href="#"><i class="fas fa-shield-halved"></i> Privacy</a>
                    <a href="#"><i class="fas fa-message"></i> Feedback</a>

                    <div class="dropdown-sub-sub">
                        <a href="#" class="drop-toggle"><i class="fas fa-palette"></i> Vormgeving <i
                                class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-sub-sub-content custom-item">
                            <a class="custom-inputone">
                                <input type="radio" name="box" id="box1" checked>
                                <label for="box1">Licht</label>
                                <i class="fa-regular fa-newspaper"></i>
                            </a>
                            <a class="custom-inputtwo">
                                <input type="radio" name="box" id="box2">
                                <label for="box2">Donker</label>
                                <i class="fa-solid fa-newspaper"></i>
                            </a>
                            <a class="custom-inputthree">
                                <input type="radio" name="box" id="box3">
                                <label for="box3">Systeemstandaard</label>
                                <i class="fa-regular fa-newspaper"></i>
                            </a>
                        </div>
                    </div>

                    <a href="#"><i class="fas fa-user"></i> Uw feed personaliseren</a>

                    <div class="dropdown-sub-sub last-item">
                        <a href="#" class="drop-toggle"><i class="fas fa-house"></i> Uw startpagina aanpassen <i
                                class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-sub-sub-content custom-item">
                            <div class="custom-inputone">
                                <label for="switch1">Menubalk weergeven</label>
                                <label class="switch">
                                    <input type="checkbox" id="switch1" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="custom-inputtwo">
                                <label for="switch2">Nieuws en interesses weergeven</label>
                                <label class="switch">
                                    <input type="checkbox" id="switch2" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="custom-inputthree">
                                <label for="switch3">Trending op Bing weergeven</label>
                                <label class="switch">
                                    <input type="checkbox" id="switch3" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                            <div class="custom-inputfour">
                                <label for="switch4">Afbeelding startpagina weergeven</label>
                                <label class="switch">
                                    <input type="checkbox" id="switch4" checked>
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="privacy">
                        <p><span>Privacy en cookies</span> • <br>
                            <span>Gebruikersrechtsovereenkomst</span> • <span>Adverteren</span> • <br>
                            <span>Over onze advertenties</span> • <span>Help</span> • <br>
                            <span>Europese gegevensbescherming</span> • <br>
                            <span>Cookievoorkeuren beheren</span><br>
                            <br>
                            © 2024 Microsoft
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- searchbar -->
    <div class="padding-area"></div>
    <div class="search-container">
        <i class="fa-solid fa-magnifying-glass"></i>
        <input type="text" name="search" id="search" placeholder="Zoeken op het web" autocomplete="off">
        <i class="fa-solid fa-microphone"></i>
        <img class="lens" src="assets/color-lens.png" alt="">
        <i class="fa-solid fa-keyboard"></i>
        <a href="https://copilot.microsoft.com/" target="_blank" class="copilot-link"></a>
    </div>

    <div class="background-switcher">
        <button><i class="fas fa-location-dot"></i><span> Info</span></button>
        <button id="prevBackground"><i class="fas fa-angle-left"></i></button>
        <button id="nextBackground"><i class="fas fa-angle-right"></i></button>
    </div>

    <div class="item-slider">
    <button id="prevItem" class="slider-button"><i class="fas fa-angle-left"></i></button>
    <div class="slider-container">
        <div class="slider-track">
            <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo '<div class="slider-item">';
                    echo '<div class="item-title">' . $row["title"] . '</div>';
                    echo '<img src="' . $row["image_url"] . '" alt="Item">';
                    echo '</div>';
                }
            } else {
                echo "0 results";
            }
            $conn->close();
            ?>
        </div>
    </div>
    <button id="nextItem" class="slider-button"><i class="fas fa-angle-right"></i></button>
</div>

        <div class="grid-container">
        <!-- First row -->
        <div class="card span-2 span-id-1">
            <div class="card-content">
                <div class="card-title">René van der Gijp is klaar met Johan Derksen,
                vanavond mogelijk allerlaatste uitzeding</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>188</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span>2</span></i>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.b4ac1d9f8add4fb30bd3be87cbb1833a&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">3u geleden</div>
                <div class="card-title">'Farioli ergerde zich groen en geel en heeft hem uit de Ajax-kleedkamer laten...'</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>188</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span>2</span></i>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.2272332e331dfa893c12274a532b4216&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">6u geleden</div>
                <div class="card-title">Nieuwe gedragscode filmwereld na ophef serie Marianne Vaatstra</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>3</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span></span></i>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.2165967cad445fa92bd724f68053ad15&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">8u geleden</div>
                <div class="card-title">De grootste flops in de geschiedenis van de bioscoop</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>62</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span></span></i>
            </div>
        </div>
    
        <!-- Second row -->
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.bbfc4b4369d86dba99fe23f67589c8ee&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">2u geleden</div>
                <div class="card-title">"De invasie van Oekraïne was een vergissing"</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>43</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span></span></i>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.c465c6a25868177181661936cd1266ad&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">1 week geleden</div>
                <div class="card-title">6 redenen waarom je elke ochtend citroenwater zou moeten drinken</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>37</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span></span></i>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.dd737a9c894a80f5e7be439953d78789&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">8u geleden</div>
                <div class="card-title">5 tips om je huwelijk te redden</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>16</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span></span></i>
            </div>
        </div>
        <div class="card span-2 span-id-2">
            <div class="card-content">
                <div class="card-title">Steeds meer laadpalen verdwijnen langs de snelweg</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>47</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span>2</span></i>
            </div>
        </div>
    
        <!-- Third row -->
        <div class="card span-2 span-id-3">
            <div class="card-content">
                <div class="card-title">Bekijk 7 hondenrassen die perfect zijn voor eigenaren die van reizen houden</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>188</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span>2</span></i>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.85496953800cfebd6049d141283c8797&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">2 dagen geleden</div>
                <div class="card-title">Gladiator 2 - De Tweede Trailer</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>188</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span>2</span></i>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.ff5c2bd6d1cd61206efdc1e77e45ced5&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">14u geleden</div>
                <div class="card-title">Nieuwe gridstraf op komst voor Verstappen? 'Gevaarlijk punt in het kampioenschap'</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>27</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span></span></i>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.09da7d62f3e064305e34c7e32c801f45&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">12u geleden</div>
                <div class="card-title">Maag-artsen over de 4 dingen die ze niet (of zelden) eten</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>180</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span></span></i>
            </div>
        </div>
    
        <!-- Fourth row -->
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.de639eca6cc2aefb89b93162d65937c9&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">5u geleden</div>
                <div class="card-title">Oekraïne ontwapent Moskou met 3 gerichte drone-aanvallen op munitiedepots</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>110</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span></span></i>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.30af0c09d1b49cdff95ff57f3aaf9af7&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">14u geleden</div>
                <div class="card-title">Treinen rond Schiphol rijden weer na probleem met bovenleiding</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>3</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span></span></i>
            </div>
        </div>
        <div class="card">
            <img src="https://th.bing.com/th?id=ORMS.e56c487a97fdb9142f9c3702f6978c19&pid=Wdp&w=300&h=156&qlt=90&c=1&rs=1&dpr=1&p=0" alt="Placeholder">
            <div class="card-content">
                <div class="upload-time">1u geleden</div>
                <div class="card-title">Grote transfer voor Frenkie de Jong: de afbeedlingen</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>5</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span></span></i>
            </div>
        </div>
        <div class="card span-2 span-id-4">
            <div class="card-content">
                <div class="card-title">Wie haalde de cocaïne uit Coca Cola?</div>
            </div>
            <div class="card-footer">
                <i class="far fa-thumbs-up"> <span>234</span></i>
                <i class="far fa-thumbs-down"></i>
                <i class="far fa-comment"> <span>6</span></i>
            </div>
        </div>
    </div>
    
        <!-- Add more cards here -->
    
    </div>
    <script src="js/script.js"></script>
    <script src="js/background.js"></script>
</body>

</html>