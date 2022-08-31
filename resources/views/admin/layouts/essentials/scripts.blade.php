{{-- //TODO must remove below scripts and put it in the views that only related to like peity chart, I need this only
inthe dashboard view and so on. This is to enhance performance and remove unrelated scripts from rending at all views
--}}
{{-- JQUERY JS --}}
<script src="{{asset('backend/js/jquery.min.js')}}"></script>

{{-- BOOTSTRAP JS --}}
<script src="{{asset('backend/assets/plugins/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

@auth
{{-- SPARKLINE JS--}}
<script src="{{asset('backend/js/jquery.sparkline.min.js')}}"></script>

{{-- Sticky js --}}
<script src="{{asset('backend/js/sticky.js')}}"></script>

{{-- CHART-CIRCLE JS--}}
<script src="{{asset('backend/js/circle-progress.min.js')}}"></script>

{{-- PIETY CHART JS--}}
<script src="{{asset('backend/assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/peitychart/peitychart.init.js')}}"></script>

<!-- INPUT MASK JS-->
<script src="{{asset('backend/assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

{{-- SIDEBAR JS --}}
<script src="{{asset('backend/assets/plugins/sidebar/sidebar.js')}}"></script>

{{-- Perfect SCROLLBAR JS--}}
<script src="{{asset('backend/assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
<script src="{{asset('backend/assets/plugins/p-scroll/pscroll.js')}}"></script>
<script src="{{asset('backend/assets/plugins/p-scroll/pscroll-1.js')}}"></script>

{{-- INTERNAL CHARTJS CHART JS--}}
<script src="{{asset('backend/assets/plugins/chart/Chart.bundle.js')}}"></script>
<script src="{{asset('backend/assets/plugins/chart/rounded-barchart.js')}}"></script>
<script src="{{asset('backend/assets/plugins/chart/utils.js')}}"></script>

{{-- INTERNAL SELECT2 JS --}}
<script src="{{asset('backend/assets/plugins/select2/select2.full.min.js')}}"></script>

{{-- INTERNAL Data tables js--}}
<script src="{{asset('backend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
<script src="{{asset('backend/assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

{{-- INTERNAL APEXCHART JS --}}
<script src="{{asset('backend/js/apexcharts.js')}}"></script>
<script src="{{asset('backend/assets/plugins/apexchart/irregular-data-series.js')}}"></script>

{{-- C3 CHART JS --}}
<script src="{{asset('backend/assets/plugins/charts-c3/d3.v5.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/charts-c3/c3-chart.js')}}"></script>

{{-- CHART-DONUT JS --}}
<script src="{{asset('backend/js/charts.js')}}"></script>

{{-- INTERNAL Flot JS --}}
<script src="{{asset('backend/assets/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('backend/assets/plugins/flot/jquery.flot.fillbetween.js')}}"></script>
<script src="{{asset('backend/assets/plugins/flot/chart.flot.sampledata.js')}}"></script>
<script src="{{asset('backend/assets/plugins/flot/dashboard.sampledata.js')}}"></script>

{{-- INTERNAL Vector js --}}
<script src="{{asset('backend/assets/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('backend/assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>

{{-- SIDE-MENU JS--}}
<script src="{{asset('backend/assets/plugins/sidemenu/sidemenu.js')}}"></script>
@endauth

{{-- Added scripts --}}
@stack('child-scripts')
{{-- Color Theme js --}}
<script src="{{asset('backend/js/themeColors.js')}}"></script>

{{-- CUSTOM JS --}}
<script src="{{asset('backend/js/custom.js')}}"></script>

<script src="{{asset('backend/js/override.js')}}"></script>
