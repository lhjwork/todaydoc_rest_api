<? 

include './core/config.php';

// 인스턴스 생성
$notice = new Notice($DB);

$list = $notice -> get_all();

// if($list){
//     foreach($list as $row){

//     }

// }

echo json_encode($list);

?>
