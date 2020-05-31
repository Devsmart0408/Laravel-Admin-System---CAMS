<script src="{{ URL::asset('assets/js/vendor.min.js') }}"></script>

@yield('script')
<!--Plugin JS-->
<script src="{{ URL::asset('assets/libs/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/moment/moment.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-daterangepicker/bootstrap-daterangepicker.min.js') }}"></script>

<script src="{{ URL::asset('assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables/dataTables.responsive.min.js') }} "></script>
<script src="{{ URL::asset('assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables/dataTables.buttons.min.js') }}"></script>

<script src="{{ URL::asset('assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables/buttons.flash.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables/buttons.print.min.js') }}"></script>

<script src="{{ URL::asset('assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables/dataTables.select.min.js') }}"></script>

<script src="{{ URL::asset('assets/libs/pdfmake/pdfmake.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/pdfmake/vfs_fonts.js') }}"></script>

<script src="{{ URL::asset('assets/libs/datatables/dataTables.fixedColumns.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/datatables/fixedColumns.bootstrap4.min.js') }}"></script>

<!-- select -->
<script src="{{ URL::asset('assets/libs/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/switchery/switchery.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/multiselect/jquery.multi-select.js') }}"></script>
<script src="{{ URL::asset('assets/libs/jquery-quicksearch/jquery.quicksearch.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/select2/select2.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-select/bootstrap-select.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js') }}"></script>
<script src="{{ URL::asset('assets/libs/jquery-mask-plugin/jquery.mask.min.js') }}"></script>

<!-- third party js ends -->

<!-- Datatables init -->
<script src="{{ URL::asset('assets/js/pages/datatables.init.js') }}"></script>

<script src="{{ URL::asset('assets/js/app.min.js') }}"></script>

<script>
    var now_url = window.location.href;
    var array = now_url.split("/");
    var my_item_index = array.length - 1;
    if (array[my_item_index] == 'layouts-sidebar-sm') {
        document.body.setAttribute('class', '');
        document.body.classList.add('left-side-menu-sm');
    } else if (array[my_item_index] == 'layouts-dark-sidebar') {
        document.body.setAttribute('class', '');
        document.body.classList.add('left-side-menu-dark');
    } else if (array[my_item_index] == 'layouts-light-topbar') {
        document.body.setAttribute('class', '');
        document.body.classList.add('left-side-menu-dark');
        document.body.classList.add('topbar-light');
    } else if (array[my_item_index] == 'layouts-sidebar-collapsed') {
        document.body.setAttribute('class', '');
        document.body.classList.add('enlarged');
    } else if (array[my_item_index] == 'layouts-boxed') {
        document.body.setAttribute('class', '');
        document.body.classList.add('enlarged');
        document.body.classList.add('boxed-layout');
    } else {

    }

    function preloader_fun() {
        document.getElementById("if_need_loader").style.display = "block";
        document.getElementById("preloader").style.display = "block";
        document.getElementById("status").style.display = "block";
        setTimeout(function() {
            document.getElementById("if_need_loader").style.display = "none";
        }, 1500);
    }
</script>

@yield('script-bottom')