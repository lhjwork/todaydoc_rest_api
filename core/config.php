<? 

header('Access-Control-Allow-Origin:*');
header('Content-Type:application/json');

// 강의 셋업 start

    // $servername = 'localhost';
    // $dbuser = 'eztodaydoc';
    // $dbpass = 'eztodaydoc123!!';
    // $dbname = 'eztodaydoc';

    // try{
    //     $dsn = "mysql:host={$servername}t;dbname={$dbname}";
    //     $db = new PDO($dsn, $dbuser, $dbpass);
    //     // ATTR_EMULATE_PREPARES 방식을 지원하지 않는경우 db 원래의 기능을 사용하겠다는 의미
    //     $db -> setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    //     $db -> setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
    //     $db -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //     echo 'DB Connection';

    // } catch(PDOException $e) {

    //     echo $e->getMessage();
    // }

// 강의 셋업 end

include $_SERVER['DOCUMENT_ROOT']."/lib_inc.php";


?>