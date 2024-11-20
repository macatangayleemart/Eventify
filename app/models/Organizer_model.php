<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Organizer_model extends Model {
    
    public function dashboard() {

        return $this->db->table('events')->get_all();
    }

    public function create_event($title, $description, $location, $start_date, $end_date, $price_range, $popularity, $ratings, $type) {
        $data = array(
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'price_range' => $price_range,
            'popularity' => $popularity,
            'ratings' => $ratings,
            'type' => $type
        );

        return $this->db->table('events')->insert($data);

    }

    public function get_one($id) {
        return $this->db->table('events')->where('event_id', $id)->get();
    }

    public function update_event($title, $description, $location, $start_date, $end_date, $price_range, $popularity, $ratings, $type, $id) {
        $data = array(
            'title' => $title,
            'description' => $description,
            'location' => $location,
            'start_date' => $start_date,
            'end_date' => $end_date,
            'price_range' => $price_range,
            'popularity' => $popularity,
            'ratings' => $ratings,
            'type' => $type,
        );

        return $this->db->table('events')->where('event_id', $id)->update($data);
    }

    public function delete_event($id) {
        return $this->db->table('events')->where('event_id', $id)->delete();
    }
}
?>
