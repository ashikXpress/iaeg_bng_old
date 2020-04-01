<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('assets/admin/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/admin/js/popper.min.js')}}"></script>
<script src="{{asset('assets/admin/js/bootstrap.min.js')}}"></script>
<!-- Appear JavaScript -->
<script src="{{asset('assets/admin/js/jquery.appear.js')}}"></script>
<!-- Countdown JavaScript -->
<script src="{{asset('assets/admin/js/countdown.min.js')}}"></script>
<!-- Counterup JavaScript -->
<script src="{{asset('assets/admin/js/waypoints.min.js')}}"></script>
<script src="{{asset('assets/admin/js/jquery.counterup.min.js')}}"></script>
<!-- Wow JavaScript -->
<script src="{{asset('assets/admin/js/wow.min.js')}}"></script>
<!-- Apexcharts JavaScript -->
<script src="{{asset('assets/admin/js/apexcharts.js')}}"></script>
<!-- Slick JavaScript -->
<script src="{{asset('assets/admin/js/slick.min.js')}}"></script>
<!-- Select2 JavaScript -->
<script src="{{asset('assets/admin/js/select2.min.js')}}"></script>
<!-- Owl Carousel JavaScript -->
<script src="{{asset('assets/admin/js/owl.carousel.min.js')}}"></script>
<!-- Magnific Popup JavaScript -->
<script src="{{asset('assets/admin/js/jquery.magnific-popup.min.js')}}"></script>
<!-- Smooth Scrollbar JavaScript -->
<script src="{{asset('assets/admin/js/smooth-scrollbar.js')}}"></script>
<!-- lottie JavaScript -->
<script src="{{asset('assets/admin/js/lottie.js')}}"></script>
<!-- am core JavaScript -->
<script src="{{asset('assets/admin/js/core.js')}}"></script>
<!-- am charts JavaScript -->
<script src="{{asset('assets/admin/js/charts.js')}}"></script>
<!-- am animated JavaScript -->
<script src="{{asset('assets/admin/js/animated.js')}}"></script>
<!-- am kelly JavaScript -->
<script src="{{asset('assets/admin/js/kelly.js')}}"></script>
<!-- Flatpicker Js -->
<script src="{{asset('assets/admin/js/flatpickr.js')}}"></script>
<!-- Chart Custom JavaScript -->
<script src="{{asset('assets/admin/js/chart-custom.js')}}"></script>
<!-- Custom JavaScript -->
<script src="{{asset('assets/admin/js/custom.js')}}"></script>
<script src="{{asset('assets/admin/sweetalert/sweetalert.js')}}"></script>


<script>
    function checkDelete(url) {
        swal({
            title: 'Are you sure sir?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {
            window.location.href = url;
            //                swal(
            //                    'Deleted!',
            //                    'Your file has been deleted.',
            //                    'success'
            //                )
        })
    }
    function approve(url) {
        swal({
            title: 'Are you sure sir?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then(function () {
            window.location.href = url;
            //                swal(
            //                    'Deleted!',
            //                    'Your file has been deleted.',
            //                    'success'
            //                )
        })
    }
</script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#datepicker,#datepicker2" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
    } );
</script>

