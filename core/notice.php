<? 
    include "./config.php";

    class Notice {
        private $conn;
        private $table = 'notice_t';

        public $idx;
        // 1 : 전체공계, 2: 회원공개 , 3:병원공개
        public $nt_type;
        public $nt_title;
        public $nt_content;
        public $nt_show;
        // hit : 조회수
        public $nt_hit;
        // 등록일시
        public $nt_wdate;

        public function __construct($db){
            $this -> conn = $db;

        }

        public function get_all(){
            $sql = "SELECT * FROM"." ".$this -> table;
            // $rs = mysqlI_query($ez_connect, $select);
            // $stmt = $this -> conn -> mysqli_fetch_array($sql);
            $stmt = $this -> conn -> fetch_query($sql);
        
            return  $stmt;
        }   


    }


?>