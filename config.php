<?php
	$host = "localhost";
	$user = "postgres";
	$pass = "1234";
	$port = "5432";
	$dbname = "tenismeja";
	$db = pg_connect("host=".$host." port=".$port." dbname=".$dbname." user=".$user." password=".$pass) or die("Gagal");
?>