<?php
class Db
{
    function __construct()
    {
        $host = "************";
        $dbname = "test";
        $user = "*******";
        $password = "********";
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $user, $password);
            $this->db->exec("set names utf8");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function insert($table, $prevText, $detailText, $foto, $video, $date)
    {
        $fotoDefault = array_replace(array(null, null, null, null, null), $foto);

        $videoDefault = array_replace(array(null, null), $video);

        if(!is_int($date)){
            $date = strtotime("$date");
      }
        try {
            $stmt = $this->db->prepare("INSERT INTO $table
            (prevText,detailText,foto1,foto2,foto3,foto4,foto5,video0,video1,date) VALUES (?,?,?,?,?,?,?,?,?,?)");
            return $stmt->execute(array(
                $prevText,
                $detailText,
                $fotoDefault[0],
                $fotoDefault[1],
                $fotoDefault[2],
                $fotoDefault[3],
                $fotoDefault[4],
                $videoDefault[0],
                $videoDefault[1],
                $date
            ));
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
    }
    public function update($table, $prevText, $detailText, $foto, $video, $id,$date)
    {
        $fotoDefault = array_replace(array(null, null, null, null,null), $foto);
        $videoDefault = array_replace(array(null, null), $video);
        $date = strtotime("$date");
        try {
            $sql = "UPDATE  $table SET prevText=?,detailText=?,foto1=?,foto2=?,foto3=?, foto4=?, video0=?, video1=?, date=? WHERE id =$id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute(array(
                $prevText,
                $detailText,
                $fotoDefault[0],
                $fotoDefault[1],
                $fotoDefault[2],
                $fotoDefault[3],
                $videoDefault[0],
                $videoDefault[1],
                $date,
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delFotoUpdateId($table, $foto, $id)
    {

        try {
            $sql = "UPDATE  $table SET $foto=?  WHERE id =$id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute(array(
                ""
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function delete($table, $id)
    {
        try {
            $sql = "DELETE FROM $table  WHERE id=?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute(array(
                $id
            ));
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
            exit();
        }
    }
    public function selectById($table, $id)
    {
        $sql = "SELECT  * FROM $table WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    public function selectFotoId($table, $id)
    {
        $sql = "SELECT  foto1, foto2, foto3, foto4 FROM $table WHERE id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(array($id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function lastId($table)
    {
        try {
            $sql = "SELECT * FROM $table ORDER BY  id  DESC  LIMIT 1";
            $stmt = $this->db->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
    }
    public function lastDate($table)
    {
        try {
            $sql = "SELECT * FROM $table ORDER BY  date  DESC  LIMIT 1";
            $stmt = $this->db->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
    }
    public function select($table, $from, $notePages, $order)
    {
        try {
             $sql = "SELECT * FROM $table ";
             $stmt = $this->db->query($sql);
             $pageCount = $stmt->rowCount();
            $sql = "SELECT * FROM $table ORDER BY date DESC LIMIT  $from,$notePages";
            $stmt = $this->db->query($sql);
            $arr = $stmt->fetchall(PDO::FETCH_ASSOC);
            return  $return = [$arr,$pageCount];
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
    }

    public function selectHelpP($table)
    {
        try {

            $sql = "SELECT * FROM $table ORDER BY date DESC";
            $stmt = $this->db->query($sql);
            $a = $stmt->fetchall(PDO::FETCH_ASSOC);
            return $a;
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
    }


    public function selectSorting($table, $desc, $from, $notePages)
    {
        try {
            $sql = "SELECT * FROM $table ORDER BY price $desc  LIMIT  $from,$notePages";
            $stmt = $this->db->query($sql);
            return $stmt->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
    }
    public function selectUser($table)
    {
        try {
            $sql = "SELECT $table.id, email,login, password, date, userstatus.statusName FROM $table
              INNER JOIN  userstatus
            ON  users.status = userstatus.id  ";

            $stmt = $this->db->query($sql);
            return $stmt->fetchall(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo 'Error : ' . $e->getMessage();
        }
    }
    public function clear($value)
    {
        $value = trim($value);
        $value = htmlspecialchars($value);
        $value = strip_tags($value);
        return $value;
    }


    public function deleteFoto($table, $id, $foto)
    {
        $newFoto = "";
        $date = time();
        try {
            $sql = "UPDATE  $table SET $foto=?  WHERE id =$id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute(array(
                $newFoto
            ));
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function returnIdVideo($url)
    {
        $id = explode('/', $url);
        return  end($id);
    }
    public function returnDate($date)
    {
        return date('d.m.Y', $date);
    }

    public function countNews($count)
    {
        $arr = array("Новость", "Новости", "Новостей");
        $ost = $count % 10;

        if ($ost == 0 || $ost > 4) {
            return $count . " " . $arr[2];
        }
        if ($ost == 1) {
            return  $count . " " . $arr[0];
        }
        if ($ost >= 2 and $ost <= 4) {
            return  $count . " " . $arr[1];
        }
    }
}
