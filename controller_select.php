<?PHP
require_once('Admin/connect.php');
require_once('model_select.php');

// create a new object or several object from different classes
$_select_class = new ajaxSelect();


$i=$_GET['case'];
switch ($i) {
    case 0:
		//index main page content info
	    define('_item_id', 11);
        echo json_encode($_select_class->homeSelect());
        break;
	case 1:
		//contact page content info
	    define('_item_id', 17);
        echo json_encode($_select_class->contactSelect());
        break;
	case 2:
        echo json_encode($_select_class->serviceSelect());
        break;
	case 3:
        echo json_encode($_select_class->aboutSelect());
        break;
	case 4:
        echo json_encode($_select_class->specialSelect());
        break;	
}
?>
