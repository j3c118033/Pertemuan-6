<?php
namespace App\Controllers;

use App\Models\Hobi_Model;

class Hobi extends BaseController {

    public function __construct() {
        $this->session = \Config\Services::session();

        $db = \Config\Database::connect();

        $this->hobi = new Hobi_Model($db);
    }

    public function index() {
        $data['session'] = $this->session->getFlashdata('response');
        $data['dataHobi'] = $this->hobi->get()->getResult();

        echo view('header_v');
        echo view('hobi_v',$data);
        echo view('footer_v');      
    }

    public function add() {
        echo view('header_v');
        echo view('hobi_form_v');
        echo view('footer_v');
    }

    public function edit($id) {
        $where = ['kode_hobi' => $id];

        $data['dataHobi'] = $this->hobi->get($where)->getResult()[0];
        
        echo view('header_v');
        echo view('hobi_form_v', $data);
        echo view('footer_v');        
    }

    public function save() {
        $data = [
            'kode_hobi' => $this->request->getPost('kode'),
            'hobi' => $this->request->getPost('nama'),
        ];

        $id = $this->request->getPost('id');

        if(empty($id)) { //Insert Data
            $response = $this->hobi->insert($data);

            if($response->resultID) {
                $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data Berhasil Disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data Gagal Disimpan. '. $response->connID->error]);
            }
            
        } else { //Update Data
            $where = ['kode_hobi' => $id];
            $response = $this->hobi->update($data, $where); 
            
            if($response) {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data Berhasil Disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data Gagal Disimpan.']);
            }
        }

        

        return redirect()->to(site_url('Hobi'));
    }

    public function delete($id) {
        $where = ['kode_hobi' => $id];

        $response = $this->hobi->delete($where);

        if($response->resultID ) {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data Berhasil Dihapus.']);
        } else {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data Gagal Dihapus. '. $response->connID->error]);
        }
        
        return redirect()->to(site_url('Hobi')); 
    }  
}
