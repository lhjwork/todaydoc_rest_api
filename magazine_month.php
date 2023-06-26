<? 

include $_SERVER['DOCUMENT_ROOT']."/lib_inc.php";


// 메인페이지 -> 이달의 메거진 대표로 보여주고자하는 매거진 정보 전달
try {
    
    $sql = "select * from medical_t where mdt_main = 'Y' and mdt_show = 'Y' order by idx desc limit 1";
    $mrow = $DB->select_assoc($sql);

    echo json_encode($mrow);

}catch (Exception $e){
    header("HTTP/1.0 404 Not Found");
    echo json_encode(array('error' => $e->getMessage()));
}


?>
