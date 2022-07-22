<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kelola extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Coba_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = array(
			'title' => 'KELOLA DATA',
			'isi' => 'kelola/v_kelola',
		);

		$data['tbl_coba'] = $this->Coba_model->get_data('tbl_coba')->result();
		$this->load->view('template/wraper', $data, FALSE);
	}

	public function tambah()
	{
		$this->form_validation->set_rules('jenis_dokumen', 'Jenis Dokumen', 'required');
		$this->form_validation->set_rules('nama_dokumen', 'Nama Dokumen', 'required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

		if ($this->form_validation->run() == TRUE) {
			$config['upload_path']          = './file/';
			$config['allowed_types']        = 'gif|jpg|png|jpeg|doc|pdf';
			$config['max_size']             = 50000;
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('dokumen')) {
				$data = array(
					'title' => 'TAMBAH DATA',
					'isi' => 'kelola/v_tambah',
				);
				$this->load->view('template/wraper', $data, FALSE);
			} else {
				$upload_data = array('uploads' => $this->upload->data());
				$config['image_library'] = 'gd2';
				$config['source_image'] = './file/' . $upload_data['uploads']['file_name'];
				$this->load->library('image_lib', $config);
				$data = array(
					'dokumen' => $upload_data['uploads']['file_name'],
					'jenis_dokumen' => $this->input->post('jenis_dokumen'),
					'nama_dokumen' => $this->input->post('nama_dokumen'),
					'keterangan' => $this->input->post('keterangan'),
				);
				$this->Coba_model->insert_data($data);
				$this->session->set_flashdata('flash', 'Ditambahkan');
				redirect('kelola');
			}
		}
		$data = array(
			'title' => 'TAMBAH DATA',
			'isi' => 'kelola/v_tambah',
		);
		$this->load->view('template/wraper', $data, FALSE);
	}

	public function hapus($id)
	{

		$this->Coba_model->delete_data($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('kelola');
	}

	public function edit($id)
	{
		$data = array(
			'title' => 'EDIT DATA',
			'isi' => 'kelola/v_edit',
		);

		$data['tbl_coba'] = $this->Coba_model->get_data_by_id($id);
		$data['jenis_dokumen'] = ['Png', 'Jpg', 'Doc', 'Pdf', 'Xls'];

		$this->form_validation->set_rules('nama_dokumen', 'Nama Dokumen', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('template/wraper', $data, FALSE);
		} else {
			$this->Coba_model->update_data();
			$this->session->set_flashdata('flash', 'Diubah');
			redirect('kelola');
		}
		$this->load->view('template/wraper', $data, FALSE);
	}

	public function detail()
	{
	}
}
