<?php
session_start();

if(!ISSET($_SESSION['id']))
	{
		echo "<script>window.location = 'index.html';</script>";
	}

?>