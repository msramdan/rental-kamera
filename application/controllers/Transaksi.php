<?php
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Jakarta');

class Transaksi extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			check_not_login();
			$this->load->model('M_transaksi');
			$this->data['CI'] =& get_instance();
			$this->load->helper(array('form', 'url'));
			$this->load->model('M_user');
			$this->load->database();
		}
	public function index()
	{	
		$oke['harga_denda']=$this->db->query("SELECT * FROM tbl_biaya_denda")->row();
		$oke['transaksi'] = $this->M_transaksi->tampil_transaksi();
		$oke['content_page']="transaksi/v_list_transaksi";
		$this->load->view('body/dashboard',$oke);
	}

	public function adddata(){
		$oke['buku'] = $this->db->query("SELECT * FROM tbl_buku ORDER BY id_buku DESC");
		$oke['user'] = $this->M_user->get_table('users');
		$oke['kodeunik'] 		= $this->M_transaksi->buat_kode();
		$oke['content_page']="transaksi/v_tambah_transaksi";
		$this->load->view('body/dashboard',$oke);
	}

	public function result()
    {	
		
		$user = $this->M_user->get_tableid_edit('users','anggota_id',$this->input->post('kode_anggota'));
		error_reporting(0);
		if($user->nama != null)
		{
			echo '<table class="table table-striped">
						<tr>
							<td>Nama Anggota</td>
							<td>:</td>
							<td>'.$user->nama.'</td>
						</tr>
						<tr>
							<td>Telepon</td>
							<td>:</td>
							<td>'.$user->telepon.'</td>
						</tr>
						<tr>
							<td>E-mail</td>
							<td>:</td>
							<td>'.$user->email.'</td>
						</tr>
					</table>';
		}else{
			echo 'Anggota Tidak Ditemukan !';
		}
        
	}

	public function buku()
    {	
		$id = $this->input->post('kode_buku');
		$row = $this->db->query("SELECT * FROM tbl_buku WHERE buku_id ='$id'");
		
		if($row->num_rows() > 0)
		{
			$tes = $row->row();
			$item = array(
				'id'      => $id,
				'qty'     => 1,
                'price'   => '1000',
				'name'    => $tes->title,
				'options' => array('isbn' => $tes->isbn,'thn' => $tes->thn_buku,'penerbit' => $tes->penerbit)
			);
			if(!$this->session->has_userdata('cart')) {
				$cart = array($item);
				$this->session->set_userdata('cart', serialize($cart));
			} else {
				$index = $this->exists($id);
				$cart = array_values(unserialize($this->session->userdata('cart')));
				if($index == -1) {
					array_push($cart, $item);
					$this->session->set_userdata('cart', serialize($cart));
				} else {
					$cart[$index]['quantity']++;
					$this->session->set_userdata('cart', serialize($cart));
				}
			}
		}else{

		}
        
	}

	public function buku_list()
	{
	?>
		<table class="table table-striped">
			<thead>
				<tr>
					<th>No</th>
					<th>Title</th>
					<th>Penerbit</th>
					<th>Tahun</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
			<?php $no=1;
				foreach(array_values(unserialize($this->session->userdata('cart'))) as $items){?>
				<tr>
					<td><?= $no;?></td>
					<td><?= $items['name'];?></td>
					<td><?= $items['options']['penerbit'];?></td>
					<td><?= $items['options']['thn'];?></td>
					<td style="width:17%">
					<a href="javascript:void(0)" id="delete_buku<?=$no;?>" data_<?=$no;?>="<?= $items['id'];?>" class="btn btn-danger btn-sm">
						<i class="fa fa-trash"></i></a>
					</td>
				</tr>
				<script>
					$(document).ready(function(){
						$("#delete_buku<?=$no;?>").click(function (e) {
							$.ajax({
								type: "POST",
								url: "<?php echo base_url('transaksi/del_cart');?>",
								data:'kode_buku='+$(this).attr("data_<?=$no;?>"),
								beforeSend: function(){
								},
								success: function(html){
									$("#tampil").html(html);
								}
							});
						});
					});
				</script>
			<?php $no++;}?>
			</tbody>
		</table>
		<?php foreach(array_values(unserialize($this->session->userdata('cart'))) as $items){?>
			<input type="hidden" value="<?= $items['id'];?>" name="idbuku[]">
		<?php }?>
		<div id="tampil"></div>
	<?php
	}


		public function del_cart()
    {
		error_reporting(0);
        $id = $this->input->post('buku_id');
        $index = $this->exists($id);
        $cart = array_values(unserialize($this->session->userdata('cart')));
        unset($cart[$index]);
        $this->session->set_userdata('cart', serialize($cart));
       // redirect('jual/tambah');
		echo '<script>$("#result_buku").load("'.base_url('transaksi/buku_list').'");</script>';
    }

     private function exists($id)
    {
        $cart = array_values(unserialize($this->session->userdata('cart')));
        for ($i = 0; $i < count($cart); $i ++) {
            if ($cart[$i]['buku_id'] == $id) {
                return $i;
            }
        }
        return -1;
    }

    public function view_transaksi($id)
	{
		$oke['harga_denda']=$this->db->query("SELECT * FROM tbl_biaya_denda")->row();
		$oke['data_transaksi']		=$this->M_transaksi->edit_data($id);
		$oke['content_page']="transaksi/v_detail_transaksi";
		$this->load->view('body/dashboard',$oke);
	}
	public function kembalikan_buku($id)
	{
		$oke['harga_denda']=$this->db->query("SELECT * FROM tbl_biaya_denda")->row();
		$oke['data_transaksi']		=$this->M_transaksi->edit_data($id);
		$oke['content_page']="transaksi/v_kembalikan_buku";
		$this->load->view('body/dashboard',$oke);
	}

	public function prosespinjam()
	{
		$post = $this->input->post();
		if(!empty($post['tambah']))
		{

			$tgl = $post['tgl'];
			$tgl2 = date('Y-m-d', strtotime('+'.$post['lama'].' days', strtotime($tgl)));

			$hasil_cart = array_values(unserialize($this->session->userdata('cart')));
			foreach($hasil_cart as $isi)
			{
				$data[] = array(
					'pinjam_id'=>htmlentities($post['nopinjam']), 
					'anggota_id'=>htmlentities($post['anggota_id']), 
					'buku_id' => $isi['id'], 
					'status' => 'Dipinjam', 
					'tgl_pinjam' => htmlentities($post['tgl']), 
					'lama_pinjam' => htmlentities($post['lama']), 
					'tgl_balik'  => $tgl2, 
					'tgl_kembali'  => '0',
				);
			}
			$total_array = count($data);
			if($total_array != 0)
			{
				$this->db->insert_batch('tbl_pinjam',$data);

				$cart = array_values(unserialize($this->session->userdata('cart')));
				for ($i = 0; $i < count($cart); $i ++){
				  unset($cart[$i]);
				  $this->session->unset_userdata($cart[$i]);
				  $this->session->unset_userdata('cart');
				}
			}
			redirect(base_url('transaksi')); 
		}

		if($this->input->get('id_pinjam'))
		{
			$this->M_transaksi->delete_table('tbl_pinjam','id_pinjam',$this->input->get('id_pinjam'));
			// $this->M_transaksi->delete_table('tbl_denda','id_pinjam',$this->input->get('id_pinjam'));
			$this->session->set_flashdata('pesan','<div id="notifikasi"><div class="alert alert-warning">
			<p>  Hapus Transaksi Pinjam Buku Sukses !</p>
			</div></div>');
			redirect(base_url('transaksi')); 
		}
	}

	public function submit_kembalikan_buku($id){
			$data = array(
			'status' => 'Di Kembalikan', 
			'tgl_kembali'  => date('Y-m-d'),
			);
			$oke					=$this->M_transaksi->submit_edit_transaksi($data,$id);

			$data_transaksi = $this->input->post('tgl_balik');
            $date1 = date('Ymd');
            $date2 = preg_replace('/[^0-9]/','',$data_transaksi);
            $diff = $date1 - $date2;

            $query_oke = $this->db->query("SELECT * FROM tbl_biaya_denda")->row();
            if($diff > 0 )
                      {
                        if ($query_oke->stat=='Aktive') {
                          $denda = $diff * $query_oke->harga_denda;
                        }else{
                          $denda = $diff * 0;
                        }
                      }else{
                        $denda = 0;
                      }
			$data_denda = array(
				'pinjam_id' => $this->input->post('nopinjam'), 
				'id_pinjam' => $this->input->post('id_pinjam'), 
				'denda' => $denda, 
				'lama_waktu'=>$diff, 
				'tgl_denda'=> date('Y-m-d'),
			);
			$this->db->insert('tbl_denda',$data_denda);
			redirect('transaksi');
		}

}
