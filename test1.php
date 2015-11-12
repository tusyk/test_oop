<?PHP
require_once('connect.php');
// define a child class
class alaxSelect extends connect
{
 
  public function homeSelect() {
	  $mm=$this->connect_mysqli();
	  return 2;
  }
}


?>