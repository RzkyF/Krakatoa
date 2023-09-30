const flashData = $('.flash-data').data('flashdata');

console.log(flashData);
if(flashData) {
  Swal.fire({
    icon: 'success',
    title: 'Good Job!',
    text: flashData
  });
}
const FlashDataAfterBayar = $('.sudah_bayar').data('flashdata');

console.log(FlashDataAfterBayar);

if(FlashDataAfterBayar) {
  Swal.fire({
    title: 'Pembayaran Berhasil.',
    text: 'Kembalian : Rp. ' + FlashDataAfterBayar
  });
}

$(document).on('click','.btn-delete', function(e)
{
e.preventDefault();
const href = $(this).attr('href');

  Swal.fire({
    icon: 'warning',
    title: 'Data Akan Dihapus, Yakin?',
    text: 'Data akan dihapus permanen!',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Hapus'
  }).then((result) => {
    if(result.value){
      document.location.href = href;
    }
  })
})


