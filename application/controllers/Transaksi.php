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

		// denda
		$no = 1;
		$denda = $this->db->query("SELECT * FROM tbl_biaya_denda WHERE id_biaya_denda  = 1");
		$dataDenda = $denda->row();
		$valueDenda = $dataDenda->harga_denda;
		// end denda

		$output = '';
		$output .= '<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Barang</th>
				<th>Total</th>
				<th>Lama Sewa</th>
				<th>Tanggal Sewa</th>
				<th>Tanggal Kembali</th>
				<th>Status Pengembelian</th>
				<th><span style="color: red;">Keterlambatan</span> </th>
				<th><span style="color: red;">Denda</span> </th>
				<th style="width: 100px;">Aksi</th>
            </tr>
        </thead>
        <tbody>';
		foreach ($data->result() as $row) {
			$tgl1    = $row->tanggal_sewa;
			if ($tgl1 == null || $tgl1 == '') {
				$data1 = '-';
				$data2 = '-';
				$x = '-';
				$y = '-';
				$row->tanggal_sewa = '-';
				$tanggalHarusKembali = '-';
			} else {
				$dateNow = date('Y-m-d');
				$lama = $row->lama_sewa;
				$x = '+' . $lama . ' days';
				$tanggalHarusKembali    = date('Y-m-d', strtotime($x, strtotime($tgl1)));

				$cek = $tanggalHarusKembali < $dateNow;
				if ($row->tanggal_kembali == null && $tanggalHarusKembali < $dateNow) {
					$tgl1 = strtotime($tanggalHarusKembali);
					$tgl2 = strtotime($dateNow);
					$jarak = $tgl2 - $tgl1;
					$keterlambatanHari = $jarak / 60 / 60 / 24;
					$data1 = $keterlambatanHari;
					$data2 = rupiah($keterlambatanHari * $valueDenda) ;
				} else if ($row->tanggal_kembali != null && $tanggalHarusKembali < $row->tanggal_kembali) {
					$tgl1 = strtotime($tanggalHarusKembali);
					$tgl2 = strtotime($row->tanggal_kembali);
					$jarak = $tgl2 - $tgl1;
					$keterlambatanHari = $jarak / 60 / 60 / 24;
					$data1 = $keterlambatanHari;
					$data2 =rupiah($keterlambatanHari * $valueDenda) ;
				} else if ($row->tanggal_kembali != null && $tanggalHarusKembali >= $row->tanggal_kembali) {
					$data1 = 'Tidak Ada Keterlambatan';
					$data2 = 'Tidak Ada';
				} else {
					$data1 = '-';
					$data2 = '-';
				}
				if ($row->tanggal_kembali == null) {
					$x = '-';
					$y = 'Belum';
				} else {
					$x = $row->tanggal_kembali;
					$y = 'Sudah';
				}
			}
			$output .= '<tr>
            <td>' . $row->nama_kamera . '</td>
			<td>' . rupiah($row->total) . '</td>
			<td>' . $row->lama_sewa . ' Hari</td>
			<td>' . $row->tanggal_sewa . ' s.d ' . $tanggalHarusKembali . '</td>
			<td>' . $x . '</td>
			<td>' . $y . '</td>
			<td>' . $data1 . ' Hari</td>
			<td>' . $data2 . '</td>';

			if($tgl1 == null || $tgl1 == ''){
				$output .= '<td> - </td>
        		</tr>';
			}else{
				if($row->tanggal_kembali != null){
					$output .= '<td><button class="btn btn-success btn-xs" disabled><i class="fa fa-check"></i></button></td>
        		</tr>';
				}else{
					$output .= '<td><a href="' . base_url('Transaksi/updateItemStatus/' . $row->sewa_detail_id) . '" class="btn btn-success btn-xs"><i class="fa fa-check"></i></a></td>
        		</tr>';
				}
				
			}

		
		}

		$output .= '</tbody>
        </table>';
		echo $output;
	}

	public function updateItemStatus($id)
	{
		$data = array(
			'tanggal_kembali' => date('y-m-d'),
		);
		$this->db->where('sewa_detail_id', $id);
		$this->db->update('tbl_sewa_detail', $data);
		$this->session->set_flashdata('oke', 'Status pengembalian berhasil diUpdate');
		redirect('transaksi');
	}

	public function delete($id)
	{
		$oke			= $this->M_transaksi->delete($id);
		$this->session->set_flashdata('oke', 'DiHapus');
		redirect('transaksi');
	}

	public function approved($id)
	{
		// update table sewa
		$data = array(
			'tanggal_sewa' => date('y-m-d'),
			'users_id' => $this->session->userdata('user_id'),
		);
		$this->db->where('sewa_id', $id);
		$this->db->update('tbl_sewa', $data);

		// update detail
		$data = array(
			'tanggal_sewa' => date('y-m-d'),
		);
		$this->db->where('sewa_id', $id);
		$this->db->update('tbl_sewa_detail', $data);

		$this->session->set_flashdata('oke', 'Permintaan penyewaan barang berhasil di approved');
		redirect('transaksi');
	}

	public function pdf()
	{
		$tgl_awal =  $this->input->post('tgl_awal');
		$tgl_akhir = $this->input->post('tgl_akhir');

		$this->load->library('dompdf_gen');
		$oke['harga_denda'] = $this->db->query("SELECT * FROM tbl_biaya_denda")->row();
		$oke['transaksi'] = $this->M_transaksi->laporanPdf($tgl_awal, $tgl_akhir);
		$this->load->view('transaksi/pdf', $oke);
		$paper_size = 'A4';
		$orientation = 'landscape';
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
					'lama_sewa' => $_REQUEST['lama'][$key],
					'total' => $_REQUEST['subtotal'][$key],
				);
				$this->db->insert('tbl_sewa_detail', $data);
			}
			echo json_encode('success');
		}
	}
}
