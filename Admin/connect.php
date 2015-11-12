
<?php
// define a class
class connect
{
 
  public function connect_mysqli() {
  $dblocation = "localhost";
  $dbname = "locksmith";
  $dbuser = "root";
  $dbpasswd = "";

  
  $pnumber = 9;
  
	  $mysqli = new mysqli($dblocation, $dbuser, $dbpasswd, $dbname);
	  if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		}

		$mysqli->query("set names 'utf8'");
		date_default_timezone_set('America/New_York');
	return $mysqli;
  }
}


?>
