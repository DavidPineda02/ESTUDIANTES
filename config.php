<?php
    ini_set("display_errors" , 1);
    ini_set("display_startup_errors" , 1);
    error_reporting(E_ALL);

    require_once("db.php");

    class Config{
        private $id;
        private $nombres;
        private $direccion;
        private $logros;
        private $ingles;
        private $ser;
        private $review;
        private $skills;
        protected $dbCnx;

        public function __construct($id = 0, $nombres = "", $direccion = "", $logros = "", $ingles = "" , $ser = "" , $review = "" , $skills = "" )
        {
            $this -> id = $id;
            $this -> nombres = $nombres;
            $this -> direccion = $direccion;
            $this -> logros = $logros;
            $this -> ingles = $ingles;
            $this -> ser = $ser;
            $this -> review = $review;
            $this -> skills = $skills;
            $this -> dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        }

        // --------- ID ---------
        public function setId($id){
            $this -> id = $id;
        }

        public function getId(){
            return $this -> id;
        }

        // --------- NOMBRES ---------
        public function setNombres($nombres){
            $this -> nombres = $nombres;
        }

        public function getNombres(){
            return $this -> nombres;
        }

        // --------- DIRECCION ---------
        public function setDireccion($direccion){
            $this -> direccion = $direccion;
        }

        public function getDireccion(){
            return $this -> direccion;
        }

        // --------- LOGROS ---------
        public function setLogros($logros){
            $this -> logros = $logros;
        }

        public function getLogros(){
            return $this -> logros;
        }

        // --------- INGLES ---------
        public function setIngles($ingles){
            $this->ingles = $ingles;
        }

        public function getIngles(){
            return $this-> ingles;
        }

        // --------- SER ---------
        public function setSer($ser){
            $this->ser = $ser;
        }

        public function getSer(){
            return $this-> ser;
        }

        // --------- REVIEW ---------
        public function setReview($review){
            $this->review = $review;
        }

        public function getReview(){
            return $this-> review;
        }

        // --------- SKILLS ---------
        public function setSkills($skills){
            $this->skills = $skills;
        }
        public function getSkills(){
            return $this-> skills;
        }

        // --------- METODO INSERTOR ---------
        public function insertData(){
            try {
                $stm = $this -> dbCnx -> prepare("INSERT INTO campers (nombres, direccion, logros, ingles, ser, review, skills) VALUES (?,?,?,?,?,?,?)");
                $stm -> execute([$this -> nombres, $this -> direccion, $this -> logros, $this -> ingles, $this -> ser,$this -> review, $this -> skills]);
            } catch (Exception $e ) {
                return $e -> getMessage();
            }
        }

        // --------- METODO FETCH ---------
        public function SelectAll(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM campers");
                $stm -> execute();
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        // --------- METODO DELETE ---------
        public function delete(){
            try {
                $stm = $this -> dbCnx -> prepare("DELETE FROM campers WHERE id = ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
                echo "<script> alert('Borrado Exitosamente'); document.location='estudiantes.php'</script>";
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        // --------- METODO SELECT ---------
        public function selectOne(){
            try {
                $stm = $this -> dbCnx -> prepare("SELECT * FROM campers WHERE id = ?");
                $stm -> execute([$this -> id]);
                return $stm -> fetchAll();
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }

        // --------- METODO UPDATE ---------
        public function update(){
            try {
                $stm = $this -> dbCnx -> prepare("UPDATE campers SET nombres = ?, direccion = ?, logros = ?, ingles = ?, ser = ?, review = ?, skills = ? WHERE id = ?");
                $stm -> execute([$this -> nombres, $this -> direccion, $this -> logros, $this -> ingles, $this -> ser, $this -> review, $this -> skills, $this -> id]);
            } catch (Exception $e) {
                return $e -> getMessage();
            }
        }
    }
?>