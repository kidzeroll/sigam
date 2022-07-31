 <!-- General JS Scripts -->
 <script src="{{ asset('backend/assets/js/app.min.js') }}"></script>

 <!-- JS Libraies -->
 <script src="{{ asset('backend/assets/bundles/datatables/datatables.min.js') }}"></script>
 <script src="{{ asset('backend/assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}">
 </script>
 <script src="{{ asset('backend/assets/bundles/jquery-ui/jquery-ui.min.js') }}"></script>

 <script src="{{ asset('backend/assets/bundles/izitoast/js/iziToast.min.js') }}"></script>
 <script src="{{ asset('backend/assets/bundles/sweetalert/sweetalert.min.js') }}"></script>
 <script src="{{ asset('backend/assets/bundles/summernote/summernote-bs4.js') }}"></script>
 <script src="{{ asset('backend/assets/bundles/jquery-selectric/jquery.selectric.min.js') }}"></script>
 <script src="{{ asset('backend/assets/bundles/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
 <script src="{{ asset('backend/assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
 <script src="{{ asset('backend/assets/bundles/select2/dist/js/select2.full.min.js') }}"></script>
 <script src="{{ asset('backend/assets/bundles/dropzonejs/min/dropzone.min.js') }}"></script>
 <script src="{{ asset('backend/assets/bundles/chartjs/chart.min.js') }}"></script>

 <!-- Page Specific JS File -->

 <!-- Template JS File -->
 <script src="{{ asset('backend/assets/js/scripts.js') }}"></script>

 <!-- Custom JS File -->
 <script src="{{ asset('backend/assets/js/custom.js') }}"></script>

 <!-- iziToast -->
 <script>
     @if (Session('error'))
         iziToast.error({
             message: '{{ session('error') }}',
             position: 'topRight'
         });
     @endif
 </script>

 <script>
     @if (Session('success'))
         iziToast.success({
             message: '{{ session('success') }}',
             position: 'topRight'
         });
     @endif
 </script>

 <!-- ajax csrf -->
 <script>
     $.ajaxSetup({
         headers: {
             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
         }
     });
 </script>
