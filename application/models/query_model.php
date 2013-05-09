<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
    /**
     * Query Model
	 * @author Ian Mignaco
	 * @date 9-05-2013
     */
    class Query_Model extends CI_Model {
        
        function __construct() {
            parent::__construct();
        }
		
		function getQueryData($id){
			$ssql = 'SELECT query, location FROM query WHERE id='.$this->db->escape($id);
			$query = $this->db->query($ssql);
			if($query->num_rows() > 0) return $query->result();
			else return false;
		}
		
		function lookupByString($str){
			// TODO: Add this function to autocomplete
		}
		
		function save($data=null){
			if(!isset($data)){
				return FALSE;
			}
			$ssql = 'INSERT INTO query (query, count,location) VALUES (? , ?, ?)';
			$this->db->query($ssql,array($data['query'], $data['cc'], $data['location']));
			return $this->db->insert_id();
		}
    }
    
?>