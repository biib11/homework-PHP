<?php
defined('BASEPATH') or exit('No direct script access allowed');
require APPPATH . "libraries/format.php";
require APPPATH . "libraries/RestController.php";
 
 
use chriskacerguis\RestServer\RestController;
 
 
class Balance extends RestController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelBalance', 'api_banking');
        // Membatasi Jumlah akses sesuai kebutuhan
        $this->methods['index_get']['limit'] = 200;
    }

    public function index_get()
 
    {
        $id = $this->get('id');
 
        if ($id === null) {
            $banking = $this->api_banking->getBalance();
        } else {
            $banking = $this->api_banking->getBalance($id);
        }
 
        if ($banking) {
            $this->response([
                'status' => true,
                'data' => $banking
            ], RestController::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'id not found'
            ], RestController::HTTP_NOT_FOUND);
        }
    }


}

?>php