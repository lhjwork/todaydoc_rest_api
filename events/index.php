<? 
include $_SERVER['DOCUMENT_ROOT']."/lib_inc.php";

$jsonData = file_get_contents('php://input');
$data = json_decode($jsonData, true);

if($jsonData){
    // 로그인 정보가 있을 경우
    $mt_et_idx = $data['_mt_idx'];

    if($_GET['type'] == 'home'){
        try{

            $sql = "select idx, mt_idx, et_title, et_ptext,et_image1, idx as et_idx from event_t where et_status = 1 and et_show = 'Y' and et_main = 'Y' and et_sdate <= now() and et_edate >= now() order by et_main_sort limit 5";
            $mrow = $DB->select_assoc($sql);
            $count = 0;
            foreach($mrow as $erow){
                $like2 = get_like_event($mt_et_idx,$erow['et_idx']);
                $address_object = get_hospital('',$erow['mt_idx']);
                $mrow[$count]['even_interest'] = $like2;
                $mrow[$count]['address'] = $address_object['mst_company_addr1'].$address_object['mst_company_addr2'];
                $mrow[$count]['et_image1'] = $ct_img_url . "/" . $mrow[$count]['et_image1'];
                $count += 1;
            }
            echo json_encode($mrow, JSON_UNESCAPED_SLASHES);

        }catch( Exception $e ){
        
            header("HTTP/1.0 404 Not Found");
            echo json_encode(array('error' => $e->getMessage()));
        } 
    

    } // if type home

}else{
    // 로그인 정보가 없는 경우

        if($_GET['type'] == 'home'){

            $sql = "select idx, mt_idx, et_title, et_ptext,et_image1, idx as et_idx from event_t where et_status = 1 and et_show = 'Y' and et_main = 'Y' and et_sdate <= now() and et_edate >= now() order by et_main_sort limit 5";
            $mrow = $DB->select_assoc($sql);
            $count = 0;
            foreach($mrow as $erow){
                $address_object = get_hospital('',$erow['mt_idx']);
                $mrow[$count]['address'] = $address_object['mst_company_addr1'].$address_object['mst_company_addr2'];
                $mrow[$count]['et_image1'] = $ct_img_url . "/" . $mrow[$count]['et_image1'];
                $count += 1;
            }

            echo json_encode($mrow, JSON_UNESCAPED_SLASHES);

        try{

        }catch( Exception $e ){
        
            header("HTTP/1.0 404 Not Found");
            echo json_encode(array('error' => $e->getMessage()));
        } 
        
    }// if type == home 
}


?>