    <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        //rutas, la default es raiz de views / => raiz
        $data['main'] = ['hola_mundo']; 
        $this->load->view('templates/dashboard/dashboard', $data);
    }
}
