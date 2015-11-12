<?php
require_once ("../Admin/config1.php");
				
$ajaxSelect = new ajaxSelect;
$i=$_GET['case'];

switch ($i) {
    case 0:
        echo $ajaxSelect->homeSelect($mysqli);
        break;
	case 1:
        echo $ajaxSelect->contactSelect($mysqli);
        break;
	case 2:
        echo $ajaxSelect->serviceSelect($mysqli);
        break;
	case 3:
        echo $ajaxSelect->aboutSelect($mysqli);
        break;
	case 4:
        echo $ajaxSelect->specialSelect($mysqli);
        break;
	
	
}
class ajaxSelect {
		 private $error = array();
		 private $return = array();
		 private $rows = array();
		 
		public function __construct() {
        $this->error = array(
			0=>"error while selecting data from database",
			1=>"there are no results in this category",
			2=>"there are no results for this selection",
	   );
		$this->rows=array();
		$this->return = array(
		    'out' => '',
			'msg' => '',
            'error' => false,
		);
		
		}
				
                
		public function homeSelect($mysqli) {
			//print_r($mysqli);
			//$string="wedwedwed 43 f43f43";
			//$string=mysqli_real_escape_string($mysqli, $string);
			

			//return json_encode($stack);
			//die();
				$item_id=11;
				$query = "SELECT title, description, item_id FROM articles 
				WHERE item_id = ?";
				$stmt1 = $mysqli->prepare($query);
				$stmt1->bind_param('i', $item_id);
				$out=$stmt1->execute();
				
				if (!$out) 
				{
				    $this->return['msg'] = $this->error[0];
					$this->return['error'] = true;
					return json_encode($this->return);
				}
				$stmt1->bind_result($title, $description, $id_item);
				$stmt1->fetch();
				//$result = $stmt1->get_result();
				//$data = $result->fetch_assoc();
				$stmt1->close();				
				$rows[]=array('id' => $id_item, 'description' => $description, 'title' => $title);				
				$this->return['out']=$rows;
                return json_encode($this->return);
				//return json_encode($data);
        }
		public function contactSelect($mysqli) {
				$item_id=17;
				$query = "SELECT title, description, item_id FROM articles 
				WHERE item_id = ?";
				$stmt1 = $mysqli->prepare($query);
				$stmt1->bind_param('i', $item_id);
				$out=$stmt1->execute();
				
				if (!$out) 
				{
				    $this->return['msg'] = $this->error[0];
					$this->return['error'] = true;
					return json_encode($this->return);
				}
				$stmt1->bind_result($title, $description, $id_item);
				$stmt1->fetch();
				$stmt1->close();				
				$rows[]=array('id' => $id_item, 'description' => $description, 'title' => $title);				
				$this->return['out']=$rows;
                return json_encode($this->return);
        }
		public function serviceSelect($mysqli) {
				$item_id='service';
				$query = "SELECT title, description, item_id FROM articles 
				WHERE title = ?";
				$stmt1 = $mysqli->prepare($query);
				$stmt1->bind_param('s', $item_id);
				$out=$stmt1->execute();
				
				if (!$out) 
				{
				    $this->return['msg'] = $this->error[0];
					$this->return['error'] = true;
					return json_encode($this->return);
				}
				$stmt1->bind_result($title, $description, $id_item);
				while ($stmt1->fetch()) {
				$rows[]=array('id' => $id_item, 'description' => $description, 'title' => $title);	
				}
				$stmt1->close();				
							
				$this->return['out']=$rows;
                return json_encode($this->return);
        }
		public function aboutSelect($mysqli) {
				$item_id='about';
				$query = "SELECT title, description, item_id FROM articles 
				WHERE title = ?";
				$stmt1 = $mysqli->prepare($query);
				$stmt1->bind_param('s', $item_id);
				$out=$stmt1->execute();
				
				if (!$out) 
				{
				    $this->return['msg'] = $this->error[0];
					$this->return['error'] = true;
					return json_encode($this->return);
				}
				$stmt1->bind_result($title, $description, $id_item);
				while ($stmt1->fetch()) {
				$rows[]=array('id' => $id_item, 'description' => $description, 'title' => $title);	
				}
				$stmt1->close();				
							
				$this->return['out']=$rows;
                return json_encode($this->return);
        }
       public function specialSelect($mysqli) {
				$item_id='about';
				$query = "SELECT cupon_jpeg, cupon_pdf, id FROM specials 
				order by id";
				$stmt1 = $mysqli->prepare($query);
				$out=$stmt1->execute();
				
				if (!$out) 
				{
				    $this->return['msg'] = $this->error[0];
					$this->return['error'] = true;
					return json_encode($this->return);
				}
				$stmt1->bind_result($cupon_jpeg, $cupon_pdf, $id);
				while ($stmt1->fetch()) {
				$rows[]=array('id' => $id, 'cupon_jpeg' => $cupon_jpeg, 'cupon_pdf' => $cupon_pdf);	
				}
				$stmt1->close();				
							
				$this->return['out']=$rows;
                return json_encode($this->return);
        }
       
		
}

?>