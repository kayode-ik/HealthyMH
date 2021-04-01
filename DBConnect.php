<?php

class Connections{
	public function dbConnect(){
		return new PDO("mysql: host=localhost; port=3306; dbname=bookinghmh",
             "root", "");	
	}
}
?>