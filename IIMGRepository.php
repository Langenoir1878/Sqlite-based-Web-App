<?php
/**
 * Created by YZ-MAC:ln1878
 * Date: 11/02/2015
 * Time: 17:42:12
 * @ 3001-718 Chicago
 */

 namespace langenoir1878;

 interface IIMGRepository{

 	public function saveIMG($img);
 	public function getAllIMGs();
 	public function getIMGById($id);
 	public function deleteIMG($imgId);

 }
 
 ?>