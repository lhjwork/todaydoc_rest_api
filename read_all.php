<? 

include $_SERVER['DOCUMENT_ROOT']."/lib_inc.php";


$sql = "SELECT * FROM notice_t";
$row = $DB -> select_query($sql);

echo json_encode($row);










?>

