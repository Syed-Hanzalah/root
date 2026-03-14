<?php
session_start();
require_once "includes/functions.php";
$idk = $_SESSION['idang'];
// Fetch current profile data
$profile = getProfile($idk);

$info = '';
if (isset($_GET['success']) && isset($_GET['message'])) {
    if ($_GET['success'] == 1) {
        $info = '<p class="success">' . $_GET['message'] . '</p>';
    } else {
        $info = '<p class="error">' . $_GET['message'] . '</p>';
    }
    header('Refresh:3; url=profile.php');
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Profile</title>
    <link rel="stylesheet" href="./assets/css/style.css?v=1" />
</head>

<body class="inter">
    <div class="parent flex">
        <nav class="sidebar">
            <header class="flex">
                <div class="logo">
                    <img src="./assets/images/Title.png" alt="logo" />
                </div>
                <div class="close-logo">
                    <img src="./assets/images/closelogo.png" alt="logo" />
                </div>
                <i class="chevron"><img src="./assets/images/Slider.svg" alt="Image" /></i>
            </header>
            <div class="menu">
                <a href="/">
                    <button class="btn">
                        <img src="./assets/images/Vector.svg" alt="dashboard" />
                        <span class="ss toogle">Neuer Auftrag</span>
                    </button>
                </a>
                <div class="menu-links">
                    <ul>
                        <li>
                            <a href="/">
                                <img src="./assets/images/dashboard.svg" alt class="red-icon size" />
                                <img class="normal-icon size" src="./assets/images/dash.svg" alt="dashboard" />
                                <span class="ss toogle">Dashboard</span></a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/messages-red.svg" alt class="red-icon size" />
                                <img class="normal-icon size" src="./assets/images/messages.svg" alt="dashboard" />
                                <span class="ss toogle">Benachrichtigungen</span></a>
                        </li>
                        <li>
                            <a href="/" class="active">
                                <img src="./assets/images/checklist-red.svg" alt class="red-icon size" />
                                <img class="normal-icon size" src="./assets/images/checklist.svg" alt="dashboard" />
                                <span class="ss toogle">Aufträge</span></a>
                        </li>
                        <hr />
                        <p class="menu-title">DOKU <span class="toogle">MENTE</span></p>
                        <li>
                            <a href="/">
                                <img src="./assets/images/dokumente-red.svg" alt class="red-icon" />
                                <img class="normal-icon" src="./assets/images/file.svg" alt="dashboard" />
                                <span class="ss toogle">Dokumente</span></a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/NoteBlank-red.svg" alt class="red-icon" />
                                <img class="normal-icon" src="./assets/images/NoteBlank.svg" alt="dashboard" />
                                <span class="ss toogle">Rechnungen</span></a>
                        </li>
                        <hr />
                        <p class="menu-title">SERVICES</p>
                        <li>
                            <a href="/"><img src="./assets/images/visa-red.svg" alt class="red-icon" />
                                <img class="normal-icon" src="./assets/images/visabestimmungen.svg" alt="dashboard" />
                                <span class="ss toogle">Visa</span></a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/a1-red.svg" alt class="red-icon" />
                                <img class="normal-icon" src="./assets/images/a1.svg" alt="dashboard" />
                                <span class="ss toogle">A1Bescheinigung</span></a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/eu-meldung-red.svg" alt class="red-icon" />
                                <img class="normal-icon" src="./assets/images/eu-meldung.svg" alt="dashboard" />
                                <span class="ss toogle">EU
                                    Meldung</span></a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/relocation-red.svg" alt class="red-icon" />
                                <img class="normal-icon" src="./assets/images/relocation.svg" alt="dashboard" />
                                <span class="ss toogle">Relocation</span></a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/immigration-red.svg" alt class="red-icon" />
                                <img class="normal-icon" src="./assets/images/immigration.svg" alt="dashboard" />
                                <span class="ss toogle">Immigration</span></a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/legalisation-red.svg" alt class="red-icon" />
                                <img class="normal-icon" src="./assets/images/legalisation.svg" alt="dashboard" />
                                <span class="ss toogle">Legalisation</span></a>
                        </li>
                        <hr />
                        <p class="menu-title">NEWS</p>
                        <li>
                            <a href="/">
                                <img src="./assets/images/news-red.svg" alt class="red-icon" />
                                <img class="normal-icon" src="./assets/images/news.svg" alt="dashboard" />
                                <span class="ss toogle">News</span></a>
                        </li>
                    </ul>
                    <hr />
                    <ul>
                        <li>
                            <a href="/">
                                <img src="./assets/images/settings-red.svg" alt class="red-icon" />
                                <img class="normal-icon" src="./assets/images/einstellungen.svg" alt="dashboard" />
                                <span class="ss toogle">Profileinstellungen</span></a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/logout-red.svg" alt class="red-icon" />
                                <img class="normal-icon" src="./assets/images/logout1.svg" alt="dashboard" />
                                <span class="ss toogle">Abmelden</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="search-head flex">
                <div class="menu-toggle">
                    <img src="./assets/images/menu.png" alt="menu" />
                </div>
                <div class="search">
                    <img class="s-img" src="./assets/images/Search-icon.svg" alt="search" />
                    <input id="searchInput" class="search-field" type="text"
                        placeholder="Suche etwas mithilfe von KI" />
                </div>
                <div class="info flex">
                    <div class="trumf">
                        <a href="/">
                            <img src="./assets/images/trump.png" alt="Image" />
                        </a>
                    </div>
                    <div class="info-icons flex">
                        <a href="/"><img src="./assets/images/Glocke.svg" alt="bell" /></a>
                        <a href="/"><img src="./assets/images/FAQ.svg" alt="faq" /></a>
                    </div>
                    <div class="info-bar flex" role="button" tabindex="0" aria-label="Open profile menu">
                        <img class="frame" src="./assets/images/Frame.svg" alt="frame" />
                        <p>M.Muller</p>
                        <img class="chev" src="./assets/images/Pfeil-unten.svg" alt="chevron" />
                        <div class="profile-dropdown">
                            <a href="./trump.html">Mein Profil</a>
                            <a href="/">Profileinstellungen</a>
                            <a href="./login.html">Abmelden</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- search head end  -->
            <div class="container-content">
                <div class="immi flex">
                    <div class="immi-text flex">
                        <p>Profil bearbeiten</p>
                    </div>
                </div>
                <!-- profile  -->
                <div class="profile-container sans">
                    <div class="profile-content">
                        <div class="profile-pic">
                            <div class="img-wrapper">
                                <form id="uploadForm" method="post" enctype="multipart/form-data"
                                    action="profile_process.php">
                                    <?php if (!empty($profile['picture'])): ?>
                                        <img src="./uploads/<?php echo htmlspecialchars($profile['picture']); ?>?t=<?php echo time(); ?>"
                                            alt="profile" id="profileImg">
                                    <?php else:
                                        $firstInitial = !empty($profile['nam2']) ? strtoupper($profile['nam2'][0]) : '';
                                        $lastInitial = !empty($profile['nam1']) ? strtoupper($profile['nam1'][0]) : '';
                                        $initials = $firstInitial . $lastInitial;
                                        ?>
                                        <div class="initials" id="profileImg"><?php echo $initials; ?></div>
                                    <?php endif; ?>

                                    <label for="profilePic" class="overlay">
                                        <i class="over-pic"><img src="./assets/images/camera.svg" alt=""></i>
                                        <span>Profilbild <br> ändern</span>
                                    </label>

                                    <input type="file" name="profilePic" id="profilePic" accept="image/*"
                                        onchange="this.form.submit();" style="display:none;" />
                                </form>
                            </div>

                            <p class="p-name"><?php echo $profile['nam2'] . " " . $profile['nam1']; ?></p>
                            <p class="p-mail"><?php echo $profile['email']; ?></p>
                        </div>
                        <!-- profile data -->
                        <div class="profile-data">
                            <p class="data-h">Profildaten</p>
                            <div class="data-d flex">
                                <p class="th ">Firma</p>
                                <p class="td">
                                    <?php
                                    echo !empty($profile['gesellschaft']) ? $profile['gesellschaft'] : '';
                                    ?>
                                </p>
                            </div>
                            <div class="data-d flex">
                                <p class="th ">Adresse</p>
                                <p class="td">
                                    <?php
                                    echo $profile['strasse'] . " " .
                                        $profile['hausnummer'] . " " .
                                        $profile['plz'] . " " .
                                        $profile['ort'] . " " .
                                        $profile['land'];
                                    ?>
                                </p>
                            </div>
                            <div class="data-d flex">
                                <p class="th ">Telefon</p>
                                <p class="td">
                                    <?php echo htmlspecialchars($profile['tel']); ?>
                                </p>
                            </div>
                            <div class="data-d flex">
                                <p class="th ">Abteilung</p>
                                <p class="td">
                                    <?php
                                    echo $profile['beruf']; // shows Abteilung/job
                                    ?>
                                </p>
                            </div>
                            <div class="data-d flex">
                                <p class="th ">Status</p>
                                <p class="td">Aktiv</p>
                            </div>
                            <div class="data-d flex">
                                <p class="th ">Letzter Login</p>
                                <p class="td">
                                    <?php
                                    echo date('Y-m-d', strtotime($profile['letztlogin']));
                                    ?>
                                </p>
                            </div>
                            <div class="data-d radio flex">
                                <p class="th ">Hell / Dunkel</p><label class="switch">
                                    <input type="checkbox">
                                    <span class="slider"></span>
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- profile form  -->

                    <form class="profile-form" method="POST" action="profile_process.php">
                        <p class="data-h">Persönliche Daten</p>
                        <?php echo $info ?>
                        <div class="pro flex">
                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="fname">Nachname</label>
                                </div>
                                <input class="input-field-p" type="text" id="fname" name="fname"
                                    value="<?php echo $profile['nam1']; ?>" required />
                            </div>

                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="lname">Vornamen</label>
                                </div>
                                <input class="input-field-p" type="text" id="lname" name="lname"
                                    value="<?php echo $profile['nam2']; ?>" required />
                            </div>
                        </div>

                        <div class="pro flex">
                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="mail">E-Mail Adresse</label>
                                </div>
                                <input class="input-field-p" type="text" id="mail" name="mail"
                                    value="<?php echo $profile['email']; ?>" required />
                            </div>

                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="phone">Telefon</label>
                                </div>
                                <input class="input-field-p" type="text" id="phone" name="phone"
                                    value="<?php echo $profile['tel']; ?>" required />
                            </div>
                        </div>

                        <div class="pro flex">
                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="strabe">Straße</label>
                                </div>
                                <input class="input-field-p" type="text" id="strabe" name="strabe"
                                    value="<?php echo $profile['strasse']; ?>" required />
                            </div>

                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="haus">Hausnummer</label>
                                </div>
                                <input class="input-field-p" type="text" id="haus" name="haus"
                                    value="<?php echo $profile['hausnummer']; ?>" required />
                            </div>
                        </div>

                        <div class="pro flex">
                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="stadt">Stadt</label>
                                </div>
                                <input class="input-field-p" type="text" id="stadt" name="stadt"
                                    value="<?php echo $profile['ort']; ?>" required />
                            </div>

                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="post">Postleitzahl</label>
                                </div>
                                <input class="input-field-p" type="text" id="post" name="post"
                                    value="<?php echo $profile['plz']; ?>" required />
                            </div>
                        </div>

                        <div class="pro flex">
                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="nayion">Nationalität</label>
                                </div>
                                <img class="chev-down" src="./assets/images/down.svg" alt="chevron down">
                                <input class="input-field-p" type="text" id="nayion" name="nayion"
                                    value="<?php echo $profile['staats']; ?>" required />
                            </div>

                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="land">Land</label>
                                </div>
                                <img class="chev-down" src="./assets/images/down.svg" alt="chevron down">
                                <input class="input-field-p" type="text" id="land" name="land"
                                    value="<?php echo $profile['land']; ?>" required />
                            </div>
                        </div>

                        <div class="pro flex">
                            <div class="inputs-p"></div>

                            <div class="inputs-p">
                                <button class="spei" type="submit" name="save_profile">Speichern</button>
                            </div>
                        </div>

                        <p class="andern">
                            Passwort ändern
                        </p>
                        <div class="pro flex">
                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="pass">Neues Passwort
                                        eingeben</label>
                                </div>
                                <input class="input-field-p " type="password" id="pass" placeholder="password" />
                            </div>
                            <div class="inputs-p">
                                <div class="label-p">
                                    <label class="sm" for="cpass">Neues Passwort
                                        bestätigen</label>
                                </div>
                                <input class="input-field-p " type="password" id="cpass" placeholder="password" />
                            </div>
                        </div>
                        <div class="pro flex">
                            <div class="inputs-p">
                                <a class="ver" href="/">Passwort
                                    vergessen?</a>
                            </div>
                            <div class="inputs-p">
                                <button class="spei" type="submit">Speichern</button>

                            </div>
                        </div>

                    </form>

                </div>
                <div class="quick-links inter">
                    <a href="/">Impressum </a> | <a href="/">Datenschutz
                    </a> | <a href="/">AGB </a> | <a href="/">Kontakt
                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./assets/js/script.js"></script>

</html>