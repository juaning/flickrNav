<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Image Model
	 * @author Ian Mignaco
	 * @date 9-05-2013
     */
    class Image_Model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }
		
		function getAllImages($query_id){
			$ssql = 'SELECT i.url,i.creator'
					.' FROM image as i'
					.' WHERE i.id IN '
					.'(SELECT iq.image_id FROM image_query as iq WHERE iq.query_id='.$this->db->escape($query_id).')';
			$query = $this->db->query($ssql);
			if($query->num_rows() > 0) return $query->result();
			else return false;
		}
		
		function getImage($img_id){
			$ssql = 'SELECT i.url,i.creator'
					.' FROM image as i'
					.' WHERE i.id='.$this->db->escape($query_id);
			$query = $this->db->query($ssql);
			if($query->num_rows() > 0) return $query->result();
			else return false;
		}
		
		function saveInRelationalTable($query_id=null,$img_id=null){
			if(!isset($query_id) || !isset($img_id)) return false;
			$ssql = 'INSERT INTO image_query (query_id, image_id) VALUES(? , ?)';
			$this->db->query($ssql,array($query_id,$img_id));
		}
		
		function saveImg($img=null){
			if(!isset($img)) return false;
			$ssql = 'INSERT INTO image (url,title,creator,comments) VALUES (?,?,?,?)';
			$this->db->query($ssql,$img);
			return $this->db->insert_id();
		}
		
		function save($query_id=null,$data=null){
			if(!isset($query_id) || !isset($data)) return false;
			foreach ($data as $image) {
				$img_id = $this->saveImg($image);
				if(!$img_id) return false;
				$this->saveInRelationalTable($query_id,$img_id);
			}
			return true;
		}
	}
?>