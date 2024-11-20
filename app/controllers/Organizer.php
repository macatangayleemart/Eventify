<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class Organizer extends Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->call->model('Organizer_model');
    }

    public function dashboard() {

        $data ['e'] = $this->Organizer_model->dashboard();

        $this->call->view('organizer/dashboard', $data);
    }

    public function create() {

        if($this->form_validation->submitted()) {
            
                $title = $this->io->post('title');
                $description = $this->io->post('description');
                $location = $this->io->post('location');
                $start_date = $this->io->post('start_date');
                $end_date = $this->io->post('end_date');
                $price_range = $this->io->post('price_range');
                $popularity = $this->io->post('popularity');
                $ratings = $this->io->post('ratings');
                $type = $this->io->post('type');

                if($this->form_validation->run()) {
                if($this->Organizer_model->create_event($title, $description, $location, $start_date, $end_date, $price_range, $popularity, $ratings, $type)) {
                    //success message
                    /* set_flash_alerts('success', 'Event successfully created'); */
                } 
            }
                else{
                //error message
               /*  set_flash_alerts('danger', $this->form_validation->errors()); */
            }

        }
        $this->call->view('organizer/create_event');
    }

    public function update($id) {
        if($this->form_validation->submitted()) {
            
                $title = $this->io->post('title');
                $description = $this->io->post('description');
                $location = $this->io->post('location');
                $start_date = $this->io->post('start_date');
                $end_date = $this->io->post('end_date');
                $price_range = $this->io->post('price_range');
                $popularity = $this->io->post('popularity');
                $ratings = $this->io->post('ratings');
                $type = $this->io->post('type');

                if($this->form_validation->run()) {
                if($this->Organizer_model->update_event($title, $description, $location, $start_date, $end_date, $price_range, $popularity, $ratings, $type, $id)) {
                    //success message
                   /*  set_flash_alerts('success', 'Event updated successfully'); */
                }
            } 
            
            else{
                //error message
               /*  set_flash_alerts('danger', $this->form_validation->errors()); */
            }
        }
        $data['e'] = $this->Organizer_model->get_one($id);
        $this->call->view('organizer/update_event', $data);
    }

    public function delete($id) {
        if($this->Organizer_model->delete_event($id)) {
           /*  set_flash_alerts('success', 'Event deleted successfully'); */
            redirect('/organizer');
        }else{
           /*  set_flash_alerts('danger', 'Something went wrong'); */
        }
    }

}
?>
