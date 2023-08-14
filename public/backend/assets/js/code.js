$(function(){
  $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
                Swal.fire({
                  title: 'Bạn có chắc chắn?',
                  text: "Dữ liệu sẽ bị xóa?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, xóa nó!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Deleted!',
                      'Dữ liệu đã được xóa',
                      'success'
                    )
                  }
                }) 
  });
});

$(function(){
  $(document).on('click','#ApproveBtn',function(e){
      e.preventDefault();
      var link = $(this).attr("href");
                Swal.fire({
                  title: 'Bạn có chắc chắn?',
                  text: "Đơn hàng được xác nhận?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, Xác nhận!'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'Approved!',
                      'Đơn hàng đã được xác nhận',
                      'success'
                    )
                  }
                }) 
  });
});