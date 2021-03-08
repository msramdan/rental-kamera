const flasData = $('.flash-data').data('flashdata'); //dataflash ini harus di panggil di fofter ex lane 182 footer


if(flasData){
	Swal.fire(
	  'Oke Terima Kasih',
	  'Sukses ',
	  'success'
	)

}

$('.hapus_databelanja').on('click',function(e){
	e.preventDefault();

	const href = $(this).attr('href');

			Swal.fire({
		  title: "Hapus dari Daftar Belanja?",
		  text: "Item akan Terhapus!",
		  icon: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Yes, delete it!'})

});



$('.tambahkapal').on('click',function(e){
	e.preventDefault();

	

	Swal.fire(
	  'Oke Terima Kasih',
	  'Data berhasil di tambahkan',
	  'success')
	.then((result) => {
		  // console.log(result);
		  if (result.value) {
		  	// console.log(result.value); untuk debugging
		   document.location.href = 'http://localhost/ok/Home/kapal';
		  }
		})
});

$('.updateuser').on('click',function(e){
	e.preventDefault();
	Swal.fire(
	  'Oke Terima Kasih',
	  'Data berhasil di Update',
	  'success'
	)
});
