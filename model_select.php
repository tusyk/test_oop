<?PHP
// define a child class
class ajaxSelect extends connect
{
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
 
  public function homeSelect() {
	  $mysqli=$this->connect_mysqli();
	  $item_id=_item_id;
				$query = "SELECT title, description, item_id FROM articles 
				WHERE item_id = ?";
				$stmt1 = $mysqli->prepare($query);
				$stmt1->bind_param('i', $item_id);
				$out=$stmt1->execute();
				
				if (!$out) 
				{
				    $this->return['msg'] = $this->error[0];
					$this->return['error'] = true;
					return $this->return;
				}
				$stmt1->bind_result($title, $description, $id_item);
				$stmt1->fetch();
				
				$stmt1->close();				
				$rows[]=array('id' => $id_item, 'description' => $description, 'title' => $title);				
				$this->return['out']=$rows;
				
                return $this->return;
  }
  public function contactSelect() {
	            $mysqli=$this->connect_mysqli();
				$item_id=_item_id;
				$query = "SELECT title, description, item_id FROM articles 
				WHERE item_id = ?";
				$stmt1 = $mysqli->prepare($query);
				$stmt1->bind_param('i', $item_id);
				$out=$stmt1->execute();
				
				if (!$out) 
				{
				    $this->return['msg'] = $this->error[0];
					$this->return['error'] = true;
					return $this->return;
				}
				$stmt1->bind_result($title, $description, $id_item);
				$stmt1->fetch();
				$stmt1->close();				
				$rows[]=array('id' => $id_item, 'description' => $description, 'title' => $title);				
				$this->return['out']=$rows;
                return $this->return;
        }
}


?>