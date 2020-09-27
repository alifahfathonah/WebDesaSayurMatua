<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PekerjaanAPI extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Pekerjaan_model');
        $this->load->library('form_validation');
        $this->load->helper('my_function_helper');
        // cekaccess();
    }

    public function index()
    {
        $dariDB = $this->Pekerjaan_model->cekkode();
        // var_dump($dariDB);

        // contoh JRD0004, angka 3 adalah awal pengambilan angka, dan 4 jumlah angka yang diambil
        $nourut = substr($dariDB->pekerjaan_id, 3, 4);

        $kodeBarangSekarang = $nourut + 1;
        echo ($kodeBarangSekarang);
        // die;
        $admin = $this->db->get_where('tb_admin', ['admin_user' => $this->session->userdata('username')])->row_array();
        $users = $this->Pekerjaan_model->selectAll();

        // $api_url = "http://localhost/testapi/api";
        $api_url = "http://localhost/DesaSayurMatu/api";

        $client = curl_init($api_url);

        curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($client);

        curl_close($client);

        $result = json_decode($response);

        // var_dump($response);

        // $data = array(
        //     'users' => $result,
        //     'admin' => $admin,
        //     'judul' => 'Pekerjaan',
        //     'kode_barang' => $kodeBarangSekarang

        // );

        // $this->load->view('layout/Header', $data);
        // $this->load->view('layout/Sidebar', $data);
        // $this->load->view('Pekerjaan/index_api', $data);
        // $this->load->view('layout/Footer');


        // $output = '';

        // if (count($result) > 0) {
        //     foreach ($result as $row) {
        //         $output .= '
        // 				<tr>
        // 					<td>' . $row->first_name . '</td>
        // 					<td>' . $row->last_name . '</td>
        // 					<td><butto type="button" name="edit" class="btn btn-warning btn-xs edit" id="' . $row->id . '">Edit</button></td>
        // 					<td><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row->id . '">Delete</button></td>
        // 				</tr>

        // 				';
        //     }
        // } else {
        //     $output .= '
        // 			<tr>
        // 				<td colspan="4" align="center">No Data Found</td>
        // 			</tr>
        // 			';
        // }

        // echo $output;   
    }

    public function edit()
    {
        $this->form_validation->set_rules('namaPekerjaan_edit', 'Nama Pekerjaan', 'required|trim|is_unique[tb_pekerjaan.pekerjaan_nama]', [
            'is_unique' => 'Nama pekerjaan sudah ada'
        ]);
        if ($this->form_validation->run() == false) {
            redirect('Pekerjaan');
        } else {
            $this->Pekerjaan_model->update($this->input->post("idPekerjaan_edit", true));
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3">  Berhasil!!! Anda telah mengubah daftar pekerjaan
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>');
        }
    }

    public function delete($id)
    {
        $this->Pekerjaan_model->delete($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-rounded mb-3">   Berhasil!!! data pekerjaan anda telah dihapus
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>');
        redirect('Pekerjaan');
    }
}
