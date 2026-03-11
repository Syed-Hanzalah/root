<?php
// START OF FILE - MUST BE THE VERY FIRST THING (no spaces or HTML before this)

/**
 * PHP function: define available columns.
 * Stores all possible columns with their display names.
 * Returns an associative array: technical key => display text
 */
function getAvailableColumns()
{
    return [
       "von" => "VON",
    "nach" => "NACH",
    "date" => "E.BEGINN",
    "name" => "NAME",
    "dauer" => "DAUER",
    "status" => "STATUS",
    "bearbeiter" => "BEARBEITER"
    ];
}

/**
 * This function determines which columns are visible by default.
 * Example: all except 'start_working' and 'name_consultant'
 */
function getDefaultVisibleColumns()
{
    return ['von', 'nach','date', 'name', 'dauer', 'status', 'bearbeiter'];
}

// Start session at the VERY BEGINNING (before any HTML output)
session_start();

// Determine currently visible columns
if (!isset($_SESSION['visible_columns'])) {
    $_SESSION['visible_columns'] = getDefaultVisibleColumns();
}

// Process form submission (popup sends data via POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_columns'])) {
    $available = getAvailableColumns();
    $selected = isset($_POST['cols']) ? $_POST['cols'] : [];
    // Only save valid keys
    $visible = array_intersect(array_keys($available), $selected);
    $_SESSION['visible_columns'] = $visible;
    // Redirect to avoid form resubmission (PRG pattern)
    header('Location: ' . strtok($_SERVER['REQUEST_URI'], '?'));
    exit;
}

$visibleCols = $_SESSION['visible_columns'];
$allColumns = getAvailableColumns();

// NOW you can output HTML
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Auftrage</title>
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
                                <img src="./assets/images/dashboard.svg" alt="" class="red-icon size" />
                                <img class="normal-icon size" src="./assets/images/dash.svg" alt="dashboard" />
                                <span class="ss toogle">Dashboard</span>
                            </a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/messages-red.svg" alt="" class="red-icon size" />
                                <img class="normal-icon size" src="./assets/images/messages.svg" alt="dashboard" />
                                <span class="ss toogle">Benachrichtigungen</span>
                            </a>
                        </li>
                        <li>
                            <a href="/" class="active">
                                <img src="./assets/images/checklist-red.svg" alt="" class="red-icon size" />
                                <img class="normal-icon size" src="./assets/images/checklist.svg" alt="dashboard" />
                                <span class="ss toogle">Aufträge</span>
                            </a>
                        </li>
                        <hr />
                        <p class="menu-title">DOKU <span class="toogle">MENTE</span></p>
                        <li>
                            <a href="/">
                                <img src="./assets/images/dokumente-red.svg" alt="" class="red-icon" />
                                <img class="normal-icon" src="./assets/images/file.svg" alt="dashboard" />
                                <span class="ss toogle">Dokumente</span>
                            </a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/NoteBlank-red.svg" alt="" class="red-icon" />
                                <img class="normal-icon" src="./assets/images/NoteBlank.svg" alt="dashboard" />
                                <span class="ss toogle">Rechnungen</span>
                            </a>
                        </li>
                        <hr />
                        <p class="menu-title">SERVICES</p>
                        <li>
                            <a href="/"><img src="./assets/images/visa-red.svg" alt="" class="red-icon" />
                                <img class="normal-icon" src="./assets/images/visabestimmungen.svg" alt="dashboard" />
                                <span class="ss toogle">Visa</span>
                            </a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/a1-red.svg" alt="" class="red-icon" />
                                <img class="normal-icon" src="./assets/images/a1.svg" alt="dashboard" />
                                <span class="ss toogle">A1Bescheinigung</span>
                            </a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/eu-meldung-red.svg" alt="" class="red-icon" />
                                <img class="normal-icon" src="./assets/images/eu-meldung.svg" alt="dashboard" />
                                <span class="ss toogle">EU Meldung</span>
                            </a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/relocation-red.svg" alt="" class="red-icon" />
                                <img class="normal-icon" src="./assets/images/relocation.svg" alt="dashboard" />
                                <span class="ss toogle">Relocation</span>
                            </a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/immigration-red.svg" alt="" class="red-icon" />
                                <img class="normal-icon" src="./assets/images/immigration.svg" alt="dashboard" />
                                <span class="ss toogle">Immigration</span>
                            </a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/legalisation-red.svg" alt="" class="red-icon" />
                                <img class="normal-icon" src="./assets/images/legalisation.svg" alt="dashboard" />
                                <span class="ss toogle">Legalisation</span>
                            </a>
                        </li>
                        <hr />
                        <p class="menu-title">NEWS</p>
                        <li>
                            <a href="/">
                                <img src="./assets/images/news-red.svg" alt="" class="red-icon" />
                                <img class="normal-icon" src="./assets/images/news.svg" alt="dashboard" />
                                <span class="ss toogle">News</span>
                            </a>
                        </li>
                    </ul>
                    <hr />
                    <ul>
                        <li>
                            <a href="/">
                                <img src="./assets/images/settings-red.svg" alt="" class="red-icon" />
                                <img class="normal-icon" src="./assets/images/einstellungen.svg" alt="dashboard" />
                                <span class="ss toogle">Profileinstellungen</span>
                            </a>
                        </li>
                        <li>
                            <a href="/">
                                <img src="./assets/images/logout-red.svg" alt="" class="red-icon" />
                                <img class="normal-icon" src="./assets/images/logout1.svg" alt="dashboard" />
                                <span class="ss toogle">Abmelden</span>
                            </a>
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
                    <input id="searchInput" class="search-field" type="text" placeholder="Suche etwas mithilfe von KI" />
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
                        <p>Immigration Aufträge</p>
                        <a href="/">Alle anzeigen</a>
                    </div>
                    <div class="immi-btn">
                        <a href="/">
                            <button class="im-btn">
                                <img src="./assets/images/Vector.svg" alt="dashboard" />
                                <span class="ss toogle">Neuer Auftrag</span>
                            </button>
                        </a>
                    </div>
                </div>
                <!-- cards  -->
                <div class="cards">
                    <div class="card flex blue">
                        <div class="card-icon">
                            <img src="./assets/images/time.svg" alt="Image" />
                        </div>
                        <div class="card-content">
                            <p class="card-num bodoni">3</p>
                            <p class="card-text">aktive Aufträge</p>
                        </div>
                    </div>
                    <div class="card flex yellow">
                        <div class="card-icon">
                            <img src="./assets/images/actions.svg" alt="Image" />
                        </div>
                        <div class="card-content">
                            <p class="card-num bodoni">2</p>
                            <p class="card-text">nicht übermittelt</p>
                        </div>
                    </div>
                    <div class="card flex green">
                        <div class="card-icon">
                            <img src="./assets/images/done.svg" alt="Image" />
                        </div>
                        <div class="card-content">
                            <p class="card-num bodoni">47</p>
                            <p class="card-text">erledigte Aufträge</p>
                        </div>
                    </div>
                </div>
                <!-- tables end  -->
                 <div class="relative">
                  
                <div class="table-container">
                    <table class="custom-table">
                        <thead>
                            <tr>
                                <!-- Table headers are built dynamically based on visible columns -->
                                <?php if (in_array('von', $visibleCols) && in_array('von', $visibleCols)): ?>
                                    <!-- Special case: country columns. We show both as separate headers (VON/NACH) -->
                                    <th class="flag-th">
                                        <div><span>VON</span><img src="./assets/images/sort1.svg" alt="Sort"></div>
                                    </th>
                                    <th class="flag-th">
                                        <div><span>NACH</span><img src="./assets/images/sort1.svg" alt="Sort"></div>
                                    </th>
                                <?php elseif (in_array('von', $visibleCols) && !in_array('nach', $visibleCols)): ?>
                                    <th class="flag-th">
                                        <div><span>VON</span><img src="./assets/images/sort1.svg" alt="Sort"></div>
                                    </th>
                                <?php elseif (!in_array('von', $visibleCols) && in_array('nach', $visibleCols)): ?>
                                    <th class="flag-th">
                                        <div><span>NACH</span><img src="./assets/images/sort1.svg" alt="Sort"></div>
                                    </th>
                                <?php endif; ?>

                                <?php if (in_array('date', $visibleCols)): ?>
                                    <th>
                                        <div><span>E.BEGINN</span><img src="./assets/images/sort1.svg" alt="Sort"></div>
                                    </th>
                                <?php endif; ?>

                                <?php if (in_array('name', $visibleCols)): ?>
                                    <th>
                                        <div><span>NAME</span><img src="./assets/images/sort1.svg" alt="Sort"></div>
                                    </th>
                                <?php endif; ?>

                                <?php if (in_array('dauer', $visibleCols)): ?>
                                    <th>
                                        <div><span>DAUER</span><img src="./assets/images/sort1.svg" alt="Sort"></div>
                                    </th>
                                <?php endif; ?>

                                <?php if (in_array('status', $visibleCols)): ?>
                                    <th>
                                        <div><span>STATUS</span><img src="./assets/images/sort1.svg" alt="Sort"></div>
                                    </th>
                                <?php endif; ?>

                                <?php if (in_array('bearbeiter', $visibleCols)): ?>
                                    <th>
                                        <div><span>BEARBEITER</span><img src="./assets/images/sort1.svg" alt="Sort"></div>
                                    </th>
                                <?php endif; ?>

                                
                                    <!-- Column icon th (as requested: SPALTEN + icon) -->
                                    <th>
                                      <div class="relative">
                                        
                                        <div class="column-toggle-trigger" id="columnPopupTrigger">
                                            <span>SPALTEN</span>
                                            <img src="./assets/images/columns1.svg" alt="Adjust columns" />
                                        </div>
                                      </div>
                                    </th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Example rows – simplified with PHP loop over 3 sample datasets.
                         Each td must match the number of visible columns. -->
                            <?php
                            $sampleRows = [
                                [
                                    'from' => 'germany.svg',
                                    'to' => 'france_round.svg',
                                    'date' => '21.08.2026',
                                    'name' => 'Chris Weber',
                                    'dauer' => '90 Tage',
                                    'status' => ['class' => 'done', 'text' => 'Abgeschlossen', 'icon' => 'Ellipseg.svg'],
                                    'bearbeiter' => 'Sabine Walter'
                                ],
                                [
                                    'from' => 'italy.svg',
                                    'to' => 'united.svg',
                                    'date' => '22.08.2026',
                                    'name' => 'Maria Schneider',
                                    'dauer' => '45 Tage',
                                    'status' => ['class' => 'running', 'text' => 'Laufend', 'icon' => 'Ellipseb.svg'],
                                    'bearbeiter' => 'Tom Keller'
                                ],
                                [
                                    'from' => 'spain.svg',
                                    'to' => 'sweden.svg',
                                    'date' => '23.08.2026',
                                    'name' => 'John Fischer',
                                    'dauer' => '30 Tage',
                                    'status' => ['class' => 'pending', 'text' => 'Nicht übermittelt', 'icon' => 'Ellipsep.svg'],
                                    'bearbeiter' => 'Sabine Walter'
                                ],
                                [
                                    'from' => 'germany.svg',
                                    'to' => 'france_round.svg',
                                    'date' => '21.08.2026',
                                    'name' => 'Chris Weber',
                                    'dauer' => '90 Tage',
                                    'status' => ['class' => 'done', 'text' => 'Abgeschlossen', 'icon' => 'Ellipseg.svg'],
                                    'bearbeiter' => 'Sabine Walter'
                                ],
                                [
                                    'from' => 'italy.svg',
                                    'to' => 'united.svg',
                                    'date' => '22.08.2026',
                                    'name' => 'Maria Schneider',
                                    'dauer' => '45 Tage',
                                    'status' => ['class' => 'running', 'text' => 'Laufend', 'icon' => 'Ellipseb.svg'],
                                    'bearbeiter' => 'Tom Keller'
                                ],
                                [
                                    'from' => 'spain.svg',
                                    'to' => 'sweden.svg',
                                    'date' => '23.08.2026',
                                    'name' => 'John Fischer',
                                    'dauer' => '30 Tage',
                                    'status' => ['class' => 'pending', 'text' => 'Nicht übermittelt', 'icon' => 'Ellipsep.svg'],
                                    'bearbeiter' => 'Sabine Walter'
                                ],
                                [
                                    'from' => 'germany.svg',
                                    'to' => 'france_round.svg',
                                    'date' => '21.08.2026',
                                    'name' => 'Chris Weber',
                                    'dauer' => '90 Tage',
                                    'status' => ['class' => 'done', 'text' => 'Abgeschlossen', 'icon' => 'Ellipseg.svg'],
                                    'bearbeiter' => 'Sabine Walter'
                                ],
                                [
                                    'from' => 'italy.svg',
                                    'to' => 'united.svg',
                                    'date' => '22.08.2026',
                                    'name' => 'Maria Schneider',
                                    'dauer' => '45 Tage',
                                    'status' => ['class' => 'running', 'text' => 'Laufend', 'icon' => 'Ellipseb.svg'],
                                    'bearbeiter' => 'Tom Keller'
                                ],
                                [
                                    'from' => 'spain.svg',
                                    'to' => 'sweden.svg',
                                    'date' => '23.08.2026',
                                    'name' => 'John Fischer',
                                    'dauer' => '30 Tage',
                                    'status' => ['class' => 'pending', 'text' => 'Nicht übermittelt', 'icon' => 'Ellipsep.svg'],
                                    'bearbeiter' => 'Sabine Walter'
                                ]
                            ];

                            foreach ($sampleRows as $row) {
                                echo '<tr>';

                                // Country: FROM
                                if (in_array('von', $visibleCols)) {
                                    echo '<td class="flags"><div class="flags-cont"><img src="./assets/images/' . $row['from'] . '" />';
                                    if (in_array('nach', $visibleCols)) {
                                        echo '<img class="arrow" src="./assets/images/arrow-right.png" alt="→" />';
                                    }
                                    echo '</div></td>';
                                }
                                // TO (separate cell if visible)
                                if (in_array('nach', $visibleCols)) {
                                    // If FROM is invisible, we still need a cell with the destination country
                                    if (!in_array('von', $visibleCols)) {
                                        echo '<td class="flags"><div class="flags-cont"><img src="./assets/images/' . $row['to'] . '" /></div></td>';
                                    } else {
                                        // When both are visible, FROM has the arrow and TO gets only the flag
                                        echo '<td class="flags"><div class="flags-cont"><img src="./assets/images/' . $row['to'] . '" /></div></td>';
                                    }
                                }

                                if (in_array('date', $visibleCols))
                                    echo '<td>' . $row['date'] . '</td>';
                                if (in_array('name', $visibleCols))
                                    echo '<td class="grey-600">' . $row['name'] . '</td>';
                                if (in_array('dauer', $visibleCols))
                                    echo '<td>' . $row['dauer'] . '</td>';
                                if (in_array('status', $visibleCols)) {
                                    $s = $row['status'];
                                    echo '<td><div class="status ' . $s['class'] . '"><img src="./assets/images/' . $s['icon'] . '" alt /> ' . $s['text'] . '</div></td>';
                                }
                                if (in_array('bearbeiter', $visibleCols))
                                    echo '<td class="grey-600">' . $row['bearbeiter'] . '</td>';
                                
                                    echo '<td><div class="actions">
                                <a href="#"><i class="icon-t"><img src="./assets/images/duplicate.svg" alt="duplicate" /></i></a>
                                <a href="#"><i class="icon-t"><img src="./assets/images/edit.svg" alt="edit" /></i></a>
                                <a href="#"><i class="icon-t"><img src="./assets/images/delete.svg" alt="delete" /></i></a>
                            </div></td>';
                                
                                echo '</tr>';
                            }
                            ?>
                        </tbody>
                    </table>

                </div>
                  <!-- Column popup (absolute positioned within .table-container) -->
                  <div class="column-popup" id="columnPopup">
                      <div class="popup-header">
                          <span>Select columns</span>
                          <button id="closePopupBtn">&times;</button>
                      </div>
                      <form method="post" id="columnForm">
                          <ul class="column-list">
                              <?php foreach ($allColumns as $key => $label): ?>
                                  <li>
                                      <input class="pop" type="checkbox" name="cols[]" value="<?= htmlspecialchars($key) ?>" id="col_<?= $key ?>"
                                          <?= in_array($key, $visibleCols) ? 'checked' : '' ?>>
                                      <label for="col_<?= $key ?>"><?= htmlspecialchars($label) ?></label>
                                  </li>
                              <?php endforeach; ?>
                          </ul>
                          <div class="popup-actions">
                              <button type="button" id="cancelPopupBtn">Cancel</button>
                              <button type="submit" name="update_columns" value="1">Apply</button>
                          </div>
                      </form>
                  </div>
                 </div>
                <!-- news  -->
                <div class="immi flex">
                    <div class="immi-text flex">
                        <p>Immigration News</p>
                        <a href="/">Alle anzeigen</a>
                    </div>
                </div>
                <div class="news flex">
                    <div class="new flex">
                        <div class="news-text flex">
                            <img src="./assets/images/Ellipseb.svg" alt="Image" />
                            <p>
                                21.12.2026 | Worauf Sie im neuen Jahr achten müssen: So
                                vermeiden Unternehmen Bußgelder im Ausland
                            </p>
                        </div>
                        <div class="news-link">
                            <p>Zum Artikel</p>
                            <img src="./assets/images/arrow-right.png" alt="Image" />
                        </div>
                    </div>
                </div>
                <div class="quick-links inter">
                    <a href="/">Impressum </a> | <a href="/">Datenschutz </a> | <a href="/">AGB </a> | <a
                        href="/">Kontakt
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script src="./assets/js/script.js"></script>
</body>
</html>