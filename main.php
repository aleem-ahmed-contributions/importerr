<?php
$sql = "SELECT * FROM " . MAIN_DB_PREFIX . 'facture';

$resql = $db->query($sql);

if ($resql) {
	$num = $db->num_rows($resql);

	print '
		<table class="noborder centpercent">
	';

	if ($resql->num_rows > 0) {
		// output data of each row
		while ($row = $resql->fetch_assoc()) {
			echo
				'<tr>' .
					'<td>' . $row['ref'] . '</td>' .
				'</tr>'
			;
		}
	}

	print "</table><br>";
}
