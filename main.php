<?php
session_start();
include "column_config.php";

if(!isset($_SESSION['visibleColumns'])){
    $_SESSION['visibleColumns'] = array_keys($allColumns);
}

$visibleColumns = $_SESSION['visibleColumns'];
?>

<!DOCTYPE html>
<html>

<head>

<link rel="stylesheet" href="assets/css/style.css">
<script src="assets/js/script.js"></script>

</head>

<body>

<!-- COLUMN POPUP -->

<div id="columnPopup" class="column-popup">

<form method="POST" action="save_column.php">

<h4>Select Columns</h4>

<?php foreach($allColumns as $key=>$label){ ?>

<label>

<input type="checkbox"
name="columns[]"
value="<?php echo $key ?>"

<?php if(in_array($key,$visibleColumns)) echo "checked"; ?>

>

<?php echo $label ?>

</label>

<br>

<?php } ?>

<br>

<button type="submit">Apply</button>

</form>

</div>


<div class="table-container">

<table class="custom-table">

<thead>

<tr>

<?php if(in_array("von",$visibleColumns)){ ?>
<th>VON</th>
<?php } ?>

<?php if(in_array("nach",$visibleColumns)){ ?>
<th>NACH</th>
<?php } ?>

<?php if(in_array("date",$visibleColumns)){ ?>
<th>E.BEGINN</th>
<?php } ?>

<?php if(in_array("name",$visibleColumns)){ ?>
<th>NAME</th>
<?php } ?>

<?php if(in_array("dauer",$visibleColumns)){ ?>
<th>DAUER</th>
<?php } ?>

<?php if(in_array("status",$visibleColumns)){ ?>
<th>STATUS</th>
<?php } ?>

<?php if(in_array("bearbeiter",$visibleColumns)){ ?>
<th>BEARBEITER</th>
<?php } ?>

<th onclick="toggleColumnPopup()" style="cursor:pointer">

SPALTEN ⚙️

</th>

</tr>

</thead>

<tbody>

<tr>

<?php if(in_array("von",$visibleColumns)){ ?>
<td>Germany</td>
<?php } ?>

<?php if(in_array("nach",$visibleColumns)){ ?>
<td>France</td>
<?php } ?>

<?php if(in_array("date",$visibleColumns)){ ?>
<td>21.08.2026</td>
<?php } ?>

<?php if(in_array("name",$visibleColumns)){ ?>
<td>Chris Weber</td>
<?php } ?>

<?php if(in_array("dauer",$visibleColumns)){ ?>
<td>90 Tage</td>
<?php } ?>

<?php if(in_array("status",$visibleColumns)){ ?>
<td>Done</td>
<?php } ?>

<?php if(in_array("bearbeiter",$visibleColumns)){ ?>
<td>Sabine Walter</td>
<?php } ?>

<td>...</td>

</tr>

</tbody>

</table>

</div>

</body>
</html>