<script src="{{ asset('asset_dashboard/vendor/global/global.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/vendor/svganimation/vivus.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/vendor/svganimation/svg.animation.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/js/custom.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/js/dlabnav-init.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/vendor/ckeditor/ckeditor.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/vendor/jquery-sparkline/jquery.sparkline.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/js/plugins-init/sparkline-init.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/vendor/raphael/raphael.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/vendor/morris/morris.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/js/plugins-init/widgets-script-init.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/js/dashboard/dashboard.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/vendor/datatables/js/jquery.dataTables.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/vendor/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/js/plugins-init/select2-init.js') }}" type="text/javascript"></script>
<script src="{{ asset('asset_dashboard/vendor/moment/moment.min.js')}}"></script>
{{-- <script src="{{ asset('asset_dashboard/js/plugins-init/material-date-picker-init.js')}}"></script> --}}
<script src="{{ asset('asset_dashboard/vendor/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>
<script src="{{ asset('asset_dashboard/vendor/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- Remove AlpineJS inclusion here, as Livewire already includes it -->
{{-- <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.2/dist/alpine.min.js" defer></script> --}}

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script type="text/javascript">
    function reloadTable(id) {
        var table = $(id).DataTable();
        table.cleanData;
        table.ajax.reload();
    }
    $('.select2').select2();

    $(document).ready(function() {

        // if (!$.fn.DataTable.isDataTable('#data_table')) {
        var table = $('#data_table').DataTable({
            searching: true,
            paging: true,
            select: false,
            lengthChange: true,
            searching: false,

        });

        $('#data_table tbody').on('click', 'tr', function() {
            var data = table.row(this).data();
        });

        jQuery('.dataTables_wrapper select').selectpicker();

        if ($.fn.DataTable.isDataTable('#data_table')) {
            $('#data_table').DataTable().destroy(); // Hapus instance sebelumnya
        }
    });
</script>

@stack('script')