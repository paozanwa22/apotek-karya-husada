$(document).ready(function(){

    const flashdata = $('#flash').data('flash');
    
      if(flashdata){
              swal({
                  title: 'Sukses',
                  text: flashdata,
                  icon: 'success',
              })
          }

    $('#myTable').dataTable({
        paging: true,
        searching: true,
        responsive: true,
        select: true
      });
  
      $('#transaksi').dataTable({
        paging: false,
        searching: false,
        responsive: true,
        select: false,
        "bInfo": false,
      });
  
      $('.currency').mask('0.000.000.000', {reverse:true});

    

    $(document).on('click','.hapus-data', function(e){
        e.preventDefault();
        const link = $(this).attr('href');
        console.log(link);

        swal({
            title: "Yakin ingin menghapus?",
            text: 'Data yang sudah dihapus tidak bisa dikembalikan',
            icon: "warning",
            buttons: ['Batal','Ya, Hapus'],
            confirmButtonColor: 'green',
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
                window.location.href = link;
            }
          });
    })

})