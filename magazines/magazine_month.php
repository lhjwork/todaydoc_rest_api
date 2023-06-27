<? 

include $_SERVER['DOCUMENT_ROOT']."/lib_inc.php";


if($_GET['type'] == 'home'){

        // 메인페이지 -> 이달의 메거진 대표로 보여주고자하는 매거진 정보 전달
        try {
            
            $sql = "select idx, mdt_title, mdt_sub_title, mdt_image1 from medical_t where mdt_main = 'Y' and mdt_show = 'Y' order by idx desc limit 1";

            $mrow = $DB->select_assoc($sql);

            if($mrow[0]['mdt_image1'] == '' || $mrow[0]['mdt_image1'] == null){

            }else{
                $mrow[0]['mdt_image1'] = $ct_img_url . "/" . $mrow[0]['mdt_image1'];
            }

            echo json_encode($mrow[0], JSON_UNESCAPED_SLASHES);

        } catch (Exception $e) {

                header("HTTP/1.0 404 Not Found");
                echo json_encode(array('error' => $e->getMessage()));
        }

        exit;

}else if ($_GET['type'] == 'detail'){


    try{
    
        $sql = "select * from medical_t where mdt_show = 'Y' and idx = ".$_GET['idx'];

        $mrow = $DB->select_assoc($sql);
    
    
        $_count = 10;
        for ($i = 0; $i <= $_count; $i++) {
            if ($mrow[0]['mdt_image' . $i] == '' || $mrow[0]['mdt_image' . $i] == null) {
                // 이미지가 비어있는 경우 아무 작업 x
            } else {
                $mrow[0]['mdt_image' . $i] = $ct_img_url . "/" . $mrow[0]['mdt_image' . $i];
            }
        }


        echo json_encode($mrow, JSON_UNESCAPED_SLASHES);

    }catch(Exception $e){

        header("HTTP/1.0 404 Not Found");
        echo json_encode(array('error' => $e->getMessage()));

    }

}

?>
