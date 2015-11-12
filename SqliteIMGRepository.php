<?php


namespace langenoir1878;

require_once 'IIMGRepository.php';
require_once 'IMG.php';


class SqliteIMGRepository implements IIMGRepository
{
    private $dbfile = 'data/img_db_pdo.sqlite';
    private $db;

    public function __construct(){
        //open the database
        $this->db = new \PDO('sqlite:' . $this->dbfile);

        //create the table if not exists
        $this->db->exec("CREATE TABLE IF NOT EXISTS IMGs (UID INTEGER PRIMARY KEY, URL TEXT, AUTHOR TEXT)");
    }

    public function saveIMG($img){
        //print_r($img);
        if ($img->getId() != '') {
            //Update
            $stmh = $this->db->prepare("UPDATE IMGs SET URL = :url, AUTHOR = :author_name WHERE UID = :id");
            $sl = $img->getU() . '';
            $stmh->bindParam(':subject_line', $sl);
            $an = $img->getAuthor_name() . '';
            $stmh->bindParam(':author_name', $an);
            $num = intval($img->getId());
            $stmh->bindParam(':id', $num);
            $stmh->execute();
            //print $sl . $an. $nb. $cd . $md . $cc . $num;
        } else {
            //Insert

            $stmh = $this->db->prepare("INSERT INTO IMGs (URL,AUTHOR) VALUES (:url, :author_name)");
			
            $sl = $img->getU();
            $stmh->bindParam(':url', $sl);
            $an = $img->getAuthor_name();
            $stmh->bindParam(':author_name', $an);
           
            $stmh->execute();

        }
    }

    public function getAllIMGs()
    {
        $imglist = array();
        $result = $this->db->query('SELECT * FROM IMGs');
        foreach($result as $row) {
            $aIMG = new IMG();
            $aIMG->setId(intval($row['UID']));
            $aIMG->setU($row['URL']);
            $aIMG->setAuthor_name($row['AUTHOR']);
           
            $imglist[$aIMG->getId()] = $aIMG;
        }
        return $imglist;
    }

    public function getIMGById($id)
    {
        $stmh = $this->db->prepare("SELECT * from IMGs WHERE UID = :id");
        $sid = intval($id);
        $stmh->bindParam(':id', $sid);
        $stmh->execute();
        $stmh->setFetchMode(\PDO::FETCH_ASSOC);

        if ($row = $stmh->fetch()) {
            $aIMG = new IMG();
            $aIMG->setId($row['UID']);
            $aIMG->setU($row['URL']);
            $aIMG->setAuthor_name($row['AUTHOR']);
            
            return $aIMG;
        } else {
            return new IMG();
        }

//        $imgList = $this->getAllIMGs();
//        if (array_key_exists($id, $imgList)) {
//            return $imgList[$id];
//        }
    }

    public function deleteIMG($imgId)
    {
        // TODO: Implement deleteIMG() method.
        $stmh = $this->db->prepare("DELETE FROM IMGs WHERE UID = :id");
        $stmh->bindParam(':id', intval($imgId));
        $stmh->execute();
    }


}