<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		check_not_login();
		$this->load->model('M_transaksi');
		$this->load->model('M_kamera');
		$this->load->model('M_member');
		$this->data['CI'] = &get_instance();
		$this->load->helper(array('form', 'url'));
		$this->load->model('M_user');
		$this->load->database();
	}
	public function index()
	{
		$oke['harga_denda'] = $this->db->query("SELECT * FROM tbl_biaya_denda")->row();
		$oke['transaksi'] = $this->M_transaksi->tampil_transaksi();
		$oke['content_page'] = "transaksi/v_list_transaksi";
		$this->load->view('body/dashboard', $oke);
	}

	public function adddata()
	{
		$oke['kamera']	= $this->M_kamera->list_kamera();
		$oke['member'] = $this->M_member->tampilmember();
		$oke['kode'] 		= $this->M_transaksi->buat_kode();
		$oke['content_page'] = "transaksi/v_tambah_transaksi";
		$this->load->view('body/dashboard', $oke);
	}

	public function getById($id)
	{
		$data = $this->db->query("SELECT * from tbl_sewa_detail
        join tbl_kamera on tbl_kamera.id_kamera=tbl_sewa_detail.kamera_id 
        where tbl_sewa_detail.sewa_id='$id'");
		$output = '';
		$output .= '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
				<th>Lama Sewa</th>
				<th>Harga/hari</th>
				<th>Total</th>
            </tr>
        </thead>
        <tbody>';
		foreach ($data->result() as $row) {
			$output .= '<tr>
            <td>' . $row->kode_kamera . '</td>
            <td>' . $row->nama_kamera . '</td>
			<td>' . $row->lama_sewa . ' Hari</td>
			<td>' . $row->harga . '</td>
			<td>' . $row->total . '</td>

        </tr>';
		}
		$output .= '</tbody>
        </table>';
		echo $output;
	}

	public function delete($id)
	{
		$oke			= $this->M_transaksi->delete($id);
		$this->session->set_flashdata('oke', 'DiHapus');
		redirect('transaksi');
	}

	public function verifikasi($id)
	{
		$data = array(
			'tanggal_kembali' => date('y-m-d'),
		);
		$this->db->where('sewa_id', $id);
		$this->db->update('tbl_sewa', $data);


		$this->session->set_flashdata('oke', 'DiHapus');
		redirect('transaksi');
	}

	public function pdf()
	{
		$tgl_awal =  $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');

		$this->load->library('dompdf_gen');
		$oke['harga_denda'] = $this->db->query("SELECT * FROM tbl_biaya_denda")->row();
		$oke['transaksi'] = $this->M_transaksi->laporanPdf($tgl_awal,$tgl_akhir);
		$this->load->view('transaksi/pdf', $oke);
		$paper_size = 'A4';
		$orientation = 'portrait';
		$html = $this->output->get_output();
		$this->dompdf->set_paper($paper_size, $orientation);
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("Laporan.pdf", array('Attachment' => 0));
	}

	public function getBarangById($barang_id)
	{

		$query = $this->db->query("SELECT * from tbl_kamera where id_kamera='$barang_id'")->row();
		echo json_encode($query);
	}

	public function simpan()
	{
		$tanggal_sewa =   $this->input->post('tanggal_sewa');
		$member_id =   $this->input->post('member_id');
		$kode_sewa =   $this->input->post('kode_sewa');
		$lama_sewa =   $this->input->post('lama_sewa');
		$diskon =   $this->input->post('diskon');
		$catatan =   $this->input->post('catatan');
		$total =   $this->input->post('total');
		$grand_total =   $this->input->post('grand_total');
		$data = array(
			'kode_sewa' => $kode_sewa,
			'member_id' => $member_id,
			'lama_sewa' => $lama_sewa,
			'tanggal_sewa' => $tanggal_sewa,
			'users_id' => $this->session->userdata('user_id'),
			'catatan' => $catatan,
			'total' => $total,
			'diskon' => $diskon,
			'grand_total' => $grand_total,
		);
		$penyewaan = $this->db->insert('tbl_sewa', $data);
		$lastId = $this->db->insert_id();
		if ($penyewaan) {
            foreach ($_REQUEST['kamera'] as $key => $value) {
                $data = array(
                    'sewa_id ' => $lastId,
                    'kamera_id ' => $value,
                    'harga' => $_REQUEST['harga'][$key],
					'lama_sewa'=> $_REQUEST['lama'][$key],
					'total' => $_REQUEST['subtotal'][$key],
                );
                $this->db->insert('tbl_sewa_detail', $data);
            }
            echo json_encode('success');
        }

	}
}
