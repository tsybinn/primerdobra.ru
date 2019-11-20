<?php
//require_once "Interface/Iuser.php";
class User  
{
     private $db = null;
    function __construct()
    {
        $host = "81.90.180.128";
        $dbname = "gbook";
        $user = "taxiru";
        $password = "6ou7O1izK0";
        try {
             $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $this->db->exec("set names utf8");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function singUp($login, $email, $password)
    {
        $date = time();
        $status = 0;
            try {
                $sql = "SELECT * FROM users WHERE login = ? ";
                $stm = $this->db->prepare($sql);
                $stm->execute(array($login));
                $user = $stm->fetch(PDO::FETCH_ASSOC);
                     } catch (PDOException $e) {
                echo 'Error : ' . $e->getMessage();
                exit();
            }
            if ( $user == false){
                try {
                    $stmt = $this->db->prepare("INSERT INTO users (login,email,password,date,status) VALUES (?,?,?,?,?)");
                   return $stmt->execute(array(
                        $login,
                        $email,
                        $password,
                        $date,
                        $status));
                    }catch (PDOException $e) {
                    echo 'Error : ' . $e->getMessage();
        }
        }
    }
    function singIn($login,$password){
        try {
            $sql = "SELECT * FROM users WHERE login = ? AND password = ? ";
            $stm = $this->db->prepare($sql);
            $stm->execute(array($login,$password));
            $user = $stm->fetch(PDO::FETCH_ASSOC);
            //var_dump($user);
            if($user == true){
                $_SESSION['auth'] = true;
                $_SESSION['login'] = $user['login'];
                return $user;
            }
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            exit();
        }
    }
    public function addToCard($id){
        //$_SESSION['countCart'] =
        $_SESSION['cart']['id'][] = $id;
        $_SESSION['cart']['table'][] = $_SESSION['table'];
        $_SESSION['countCart'] = count($_SESSION['cart']);
         return $_SESSION['cart'];
    }
    public function clear($value)
    {
        $value = trim($value);
        $value = htmlspecialchars($value);
        $value = strip_tags($value);
        return $value;
    }
    public function clearInt($data)
    {
        return abs((int)$data);
    }
}