 
 <script src="/assets/libs/jquery/jquery.min.js"></script>   
 <script src="/assets/libs/datatable/dataTables.js"></script> 
 <script src="/assets/libs/datatable/dataTables.tailwindcss.js"></script> 
 <script src="/assets/libs/sweetalert2/sweetalert2.all.min.js"></script>  
 <script src="/assets/js/frontend.js"></script>
 <script src="/assets/libs/tinymce/tinymce.min.js" defer></script>
 <script src="/assets/libs/toastr/toastr.min.js"></script>    
 <script>
      var $ = jQuery;
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });

     toastr.options = {
         "closeButton": false,
         "debug": false,
         "newestOnTop": false,
         "progressBar": true,
         "positionClass": "toast-bottom-center",
         "preventDuplicates": false,
         "onclick": null,
         "showDuration": "300",
         "hideDuration": "1000",
         "timeOut": "5000",
         "extendedTimeOut": "1000",
         "showEasing": "swing",
         "hideEasing": "linear",
         "showMethod": "fadeIn",
         "hideMethod": "fadeOut"
     }

     
   
 </script>  