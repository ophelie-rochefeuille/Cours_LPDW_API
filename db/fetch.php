
<?php

$db = new SQLite3('store.db');

$res = $db->query('SELECT * FROM airports');

echo "Airports<br><br>";

echo "<table border='1'>";

echo "<tr>
		<th>ID</th>
		<th>Name</th>
		<th>Latitude</th>
		<th>Longitude</th>
	</tr>";

while ($row = $res->fetchArray()) {
    echo "<tr>
    		<td>{$row['id']}</td>
    		<td>{$row['name']}</td>
    		<td>{$row['latitude']}</td>
    		<td>{$row['longitude']}</td>
    	</tr>";
}

echo "</table>";

