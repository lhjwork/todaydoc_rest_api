<? 

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

include $_SERVER['DOCUMENT_ROOT']."/ez/connect.php";

$connect = connect();


$sql = "SELECT * FROM notice_t";

$t_name = $_GET['fetch'];
$arr =  mysqli_query($connect, $sql);

if($_GET['fetch'] == 'array'){

    while ($data = mysqli_fetch_array($arr)) $return[] = $data;

    echo json_encode($return);
    
}else if ($_GET['fetch'] == 'assoc'){

    while ($data = mysqli_fetch_assoc($arr)) $return[] = $data;

    echo json_encode($return);

}else if($_GET['fetch'] == 'row'){

    while($data = mysqli_fetch_row($arr)) $return[] = $data;

    echo json_encode($return);

}else {
    echo 'query check';
    echo json_encode($arr);
}


if(!$_GET['fetch'] && $_GET['insert'] == 'insert'){
    array_walk($arr, "set_sql_quote");

    // insert 예시 : insert [table] (column1, column2,..) vales (value1, value2,....)
        $query = "insert into ".$table." (".implode(",", array_keys($arr)).") value (".implode(",", array_values($arr)).")";
        if($debug=="1") {
            echo $query."<br/>";
            exit;
        }
        $result = $this->db_query($query);

        return $result;
}



?>