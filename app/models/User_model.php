<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class User_model extends Model {
    
    public function home() {

        return $this->db->table('events')->get_all();
    }
}
?>
