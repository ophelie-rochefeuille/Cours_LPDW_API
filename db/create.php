<?php

$db = new SQLite3('store.db');

$db->exec("CREATE TABLE airports(id INTEGER PRIMARY KEY, name TEXT, latitude TEXT, longitude TEXT)");
$db->exec("INSERT INTO airports(name, latitude, longitude) VALUES('Aéroport Charles de Gaulle - Roissy', '49.0066334', '2.5220051')");
$db->exec("INSERT INTO airports(name, latitude, longitude) VALUES('Hartsfield Airport - Atlanta', '33.6407282', '-84.4277001')");
$db->exec("INSERT INTO airports(name, latitude, longitude) VALUES('Hongqiao Airport - Shanghai', '31.1925243', '121.3309125')");

echo "airports table created\n";
