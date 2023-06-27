<? 

include $_SERVER['DOCUMENT_ROOT']."/lib_inc.php";

$c_idx = get_top3_community();



if(count($c_idx) > 0) {
    
    for($i=0; $i<count($c_idx); $i++) {

        $board_ca = get_board_ca($c_idx[$i]);
        $result = array(
            // bt_ca_idx : 게시물 카테고리 번호
            "bt_ca_idx" => $c_idx[$i],
            // 카테고리 이름
            "bca_name" =>  $board_ca
        );
        $return[] = $result;
 
    }
    echo json_encode($return, JSON_UNESCAPED_SLASHES);


}else{
    $return = array(

        'message' => 'no community',
        'code' => '204',
    );
    echo json_encode($return, JSON_UNESCAPED_SLASHES);
}



?>