<?php
session_start();
include 'db_connection.php'; // Include your database connection file

// Fetch data for slider
$sql_slider = "SELECT title, image_url FROM slider_items";
$result_slider = $conn->query($sql_slider);

// Fetch data for grid
$sql_grid = "SELECT title, image_url, upload_time, likes, comments, span_class, `order` FROM grid_items ORDER BY `order` ASC";
$result_grid = $conn->query($sql_grid);
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
            <?php if (isset($_SESSION['user_id'])): ?>
                <a href="logout.php" class="aanmelden">
                    <p>Logout</p>
                    <img class="profile-img" src="assets/default-pfp-d.webp" alt="">
                </a>
            <?php else: ?>
                <a href="signin.php" class="aanmelden">
                    <p>Aanmelden</p>
                    <img class="profile-img" src="assets/default-pfp-d.webp" alt="">
                </a>
            <?php endif; ?>
            <a href="#" class="rewards">
                <p>0</p>
                <i class="fa-solid fa-trophy"></i>
            </a>
            <div class="dropdown-bars">
                <i class="fas fa-bars dropdownBarsBtn"></i>
                <div class="dropdown-bars-content">
                    <a href="#" class="first-item"><i class="far fa-square-plus"></i> Verzamelingen</a>
                    <div class="dropdown-sub-sub">
                        <a href="#" class="drop-toggle"><i class="fas fa-cog"></i> Instellingen <i class="fas fa-chevron-down"></i></a>
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
                    <div class="dropdown-sub-sub">
                        <a href="#" class="drop-toggle"><i class="fas fa-user-shield"></i> Labs <i class="fas fa-chevron-down"></i></a>
                        <div class="dropdown-sub-sub-content">
                            <a href="#" class="lab-item">
                                <p class="labs-title">Chatreactie op resultaatpagina</p>
                                <p class="labs-text">Kies hoe vaak u chatreacties wilt zien op de pagina met zoekresultaten</p>
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
                    <div class="dropdown-sub-sub last-item">
                        <a href="#" class="drop-toggle"><i class="fas fa-palette"></i> Vormgeving <i class="fas fa-chevron-down"></i></a>
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
                        <a href="#" class="drop-toggle"><i class="fas fa-house"></i> Uw startpagina aanpassen <i class="fas fa-chevron-down"></i></a>
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
                if ($result_slider->num_rows > 0) {
                    // Output data of each row
                    while($row = $result_slider->fetch_assoc()) {
                        echo '<div class="slider-item">';
                        echo '<div class="item-title">' . $row["title"] . '</div>';
                        echo '<img src="' . $row["image_url"] . '" alt="Item">';
                        echo '</div>';
                    }
                } else {
                    echo "0 results";
                }
                ?>
            </div>
        </div>
        <button id="nextItem" class="slider-button"><i class="fas fa-angle-right"></i></button>
    </div>

    <div class="grid-container">
        <?php
        if ($result_grid->num_rows > 0) {
            // Output data of each row
            while($row = $result_grid->fetch_assoc()) {
                echo '<div class="card ' . $row["span_class"] . '">';
                if ($row["image_url"]) {
                    echo '<img src="' . $row["image_url"] . '" alt="Grid Item">';
                }
                echo '<div class="card-content">';
                if ($row["upload_time"]) {
                    echo '<div class="upload-time">' . $row["upload_time"] . '</div>';
                }
                echo '<div class="card-title">' . $row["title"] . '</div>';
                echo '</div>';
                echo '<div class="card-footer">';
                echo '<i class="far fa-thumbs-up"> <span>' . $row["likes"] . '</span></i>';
                echo '<i class="far fa-thumbs-down"></i>';
                echo '<i class="far fa-comment"> <span>' . $row["comments"] . '</span></i>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </div>

    <script src="js/background.js"></script>
    <script src="js/script.js"></script>
</body>
</html>