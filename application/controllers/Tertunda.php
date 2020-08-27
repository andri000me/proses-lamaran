<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tertunda extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Proses_Tertunda_Model');
		$this->load->model('Proses_Model');
	}
	
	public function index()
	{
		$data['tampil'] = $this->Proses_Tertunda_Model->tampil();
		$data['total_lamaran'] = $this->Proses_Tertunda_Model->total_lamaran();
		$this->load->view('layouts/header');
		$this->load->view('tertunda', $data);
		$this->load->view('layouts/footer');
	}

	public function tambah()
	{
		$data_proses_tertunda = array(
			'tanggal' => $this->input->post('tanggal', true),
			'no_hp' => $this->input->post('no_hp', true),
			'email' => $this->input->post('email', true),
			'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
			'kirim_dari' => $this->input->post('kirim_dari', true),
			'psikotes' => 'Menunggu',
			'interview_hrd' => 'Menunggu',
			'interview_user' => 'Menunggu',
			'interview_owner' => 'Menunggu',
			'tes_kesehatan' => 'Menunggu',
			'status_kepastian' => 'Menunggu'
		);

		if(($this->Proses_Tertunda_Model->tambah_proses($data_proses_tertunda, 'data_proses_tertunda')) !== FALSE){
			$this->session->set_flashdata('pesan', '
				<div class="alert alert-success fade show" role="alert">
					<strong>Tetap semangat ya, Data mu berhasil ditambahkan</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="far fa-times-circle"></i>
					</button>
				</div>
			');
		}else{
			$this->session->set_flashdata('pesan', '
				<div class="alert alert-danger fade show" role="alert">
					<strong>Sabar ya, Data Anda belum berhasil tersimpan !</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="far fa-times-circle"></i>
					</button>
				</div>
			');
		}

		redirect('tertunda');
	}

	public function kirim($id_data_proses_tertunda)
	{
		$data_proses = array(
			'tanggal' => $this->input->post('tanggal', true),
			'no_hp' => $this->input->post('no_hp', true),
			'email' => $this->input->post('email', true),
			'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
			'kirim_dari' => $this->input->post('kirim_dari', true),
			'psikotes' => 'Menunggu',
			'interview_hrd' => 'Menunggu',
			'interview_user' => 'Menunggu',
			'interview_owner' => 'Menunggu',
			'tes_kesehatan' => 'Menunggu',
			'status_kepastian' => 'Menunggu'
		);

		if(($this->Proses_Model->tambah_proses($data_proses, 'data_proses')) !== FALSE){
			$this->session->set_flashdata('pesan', '
				<div class="alert alert-success fade show" role="alert">
					<strong>Tetap semangat ya, Data mu berhasil ditambahkan di proses lamaran</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="far fa-times-circle"></i>
					</button>
				</div>
			');
		}

		$where = array('id_data_proses_tertunda' => $id_data_proses_tertunda);
		$this->Proses_Model->hapus($where, 'data_proses_tertunda');
		
		redirect('tertunda');
	}

	public function ubah($id_data_proses_tertunda)
	{
		$data_proses_tertunda = array(
			'tanggal' => $this->input->post('tanggal', true),
			'no_hp' => $this->input->post('no_hp', true),
			'email' => $this->input->post('email', true),
			'nama_perusahaan' => $this->input->post('nama_perusahaan', true),
			'kirim_dari' => $this->input->post('kirim_dari', true),
			'psikotes' => $this->input->post('psikotes', true),
			'interview_hrd' => $this->input->post('interview_hrd', true),
			'interview_user' => $this->input->post('interview_user', true),
			'interview_owner' => $this->input->post('interview_owner', true),
			'tes_kesehatan' => $this->input->post('tes_kesehatan', true),
			'status_kepastian' => $this->input->post('status_kepastian', true)
		);

		if(($this->Proses_Tertunda_Model->ubah($id_data_proses_tertunda, $data_proses_tertunda)) !== FALSE){
			$this->session->set_flashdata('pesan', '
                <div class="alert alert-success fade show" role="alert">
					<strong>Tetap semangat ya, Data mu berhasil diubah</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="far fa-times-circle"></i>
                    </button>
                </div>
            ');
		}else{
			$this->session->set_flashdata('pesan', '
				<div class="alert alert-danger fade show" role="alert">
					<strong>Sabar ya, Data mu belum berhasil ubah</strong>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<i class="far fa-times-circle"></i>
					</button>
				</div>
			');
		}

		redirect('tertunda');
	}

	public function hapus($id_data_proses_tertunda)
	{
		$where = array('id_data_proses_tertunda' => $id_data_proses_tertunda);
		$this->Proses_Model->hapus($where, 'data_proses_tertunda');
		$this->session->set_flashdata('pesan', '
			<div class="alert alert-danger fade show" role="alert">
				<strong>Tetap semangat ya, Data mu berhasil hapus</strong>
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
					<i class="far fa-times-circle"></i>
				</button>
			</div>
		');

		redirect('tertunda');
    }
}