<?php
/**
 * User: ln1878
 * Date: 11/02/2015
 * Time: 17:45:54 pm
 * @ 3001-718 Chicago
 */

namespace langenoir1878;

class IMG{

    //initiate private vars
	private $url = "";
	private $author_name = "";
	private $id = "";//will be uniqid();

    /*
     * @accessors to return string
     */
    public function getU(){
    	return $this->url;
    }
    public function getAuthor_name(){
    	return $this->author_name;
    }
    public function getId(){ 
    //important function to get the img by auto-generated unique id
    	return $this->id;
    }
  
    /*
     *@mutators to set values into vars
     * updated Nov 8, 2015
     */
    public function setId($id)
    {
        $this->id = $id;
    }


    public function setU($a){
    	$this->url = $a;
    }
    public function setAuthor_name($an){
    	$this->author_name = $an;
    }
   
   
    /*
     * class function
     */
 	public function callIMG(){
 		print 'Testing msg: this is inside the callIMG() function';
 	}


}//end of class IMG.php



?>