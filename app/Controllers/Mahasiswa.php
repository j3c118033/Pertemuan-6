<?php
namespace App\Controllers;

use App\Models\Mahasiswa_Model;
class Mahasiswa extends BaseController {
    public function __construct() {
        $this->session = \Config\Services::session();

        $db = \Config\Database::connect();

        $this->mahasiswa = new Mahasiswa_Model($db);
    }

    public function index() {
        $data['session'] = $this->session->getFlashdata('response');
        $data['dataMahasiswa'] = $this->mahasiswa->get()->getResult();

        echo view('header_v');
        echo view('mahasiswa_v',$data);
        echo view('footer_v');      
    }

    public function add() {
        $db = \Config\Database::connect();
        $item['dataAgama'] = $db->table('agama')->get()->getResult();
        echo view('header_v');
        echo view('mahasiswa_form_v',$item);
        echo view('footer_v');
    }

    public function edit($id) {
        $where = ['nim' => $id];
        $data['dataMahasiswa'] = $this->mahasiswa->get($where)->getResult()[0];
        
        echo view('header_v');
        echo view('mahasiswa_form_v', $data);
        echo view('footer_v');        
    }

    public function save() {
        $data = [
            'nim' => $this->request->getPost('nim'),
            'nama' => $this->request->getPost('nama'),
            'jenis_kelamin' => $this->request->getPost('jenis_kelamin'),
            'kode_agama' => $this->request->getPost('kode_agama'),
            'alamat' => $this->request->getPost('alamat'),
            'tempat_lahir' => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir')
        ];

        $id = $this->request->getPost('id');

        if(empty($id)) { //Insert Data
            $response = $this->mahasiswa->insert($data);

            if($response->resultID) {
                $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data Berhasil Disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data Gagal Disimpan. '. $response->connID->error]);
            }
            
        } else { //Update Data
            $where = ['nim' => $id];
            $response = $this->mahasiswa->update($data, $where); 
            
            if($response) {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data Berhasil Disimpan.']);
            } else {
                $this->session->setFlashdata('response', ['status' => $response, 'message' => 'Data Gagal Disimpan.']);
            }
        }

        

        return redirect()->to(site_url('Mahasiswa'));
    }

    public function delete($id) {
        $where = ['nim' => $id];

        $response = $this->mahasiswa->delete($where);

        if($response->resultID ) {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data Berhasil Dihapus.']);
        } else {
            $this->session->setFlashdata('response', ['status' => $response->resultID, 'message' => 'Data Gagal Dihapus. '. $response->connID->error]);
        }
        
        return redirect()->to(site_url('Mahasiswa')); 
    }  
}
