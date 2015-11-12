<?PHP
require_once('test1.php');

// create a new object

$WFC = new WidgetFactory_Child();
echo $WFC->child();
echo $WFC->parent();
//echo $WF->parent();

?>