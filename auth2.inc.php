<?php
session_start();
if(!isset($_SESSION['usuario']) || !isset($_SESSION['rol']) || !isset($_SESSION['auth2f']))
{
	header("Location: login.php?id=4&ty=2");
	die();
}
