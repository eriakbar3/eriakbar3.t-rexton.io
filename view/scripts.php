<footer id="footer">
    Copyright © 2018 T-rexton Moto Modification Shop

    <ul class="f-menu">
        <li><a href="">Home</a></li>
        <li><a href="">Dashboard</a></li>
        <li><a href="">Reports</a></li>
        <li><a href="">Support</a></li>
        <li><a href="">Contact</a></li>
    </ul>
</footer>

<!-- Javascript Libraries -->
<script src="../vendors/bower_components/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../vendors/datatables/baru/datatables.min.js"></script>
<script src="../vendors/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="../vendors/bootstrap-growl/bootstrap-growl.min.js"></script>
<script src="../vendors/bower_components/jquery.bootgrid/dist/jquery.bootgrid-override.min.js"></script>
<script src="../vendors/bower_components/bootstrap-sweetalert/lib/sweet-alert.min.js"></script>
<!-- Placeholder for IE9 -->
<!--[if IE 9 ]>
    <script src="vendors/bower_components/jquery-placeholder/jquery.placeholder.min.js"></script>
<![endif]-->

<script src="../vendors/bower_components/moment/min/moment.min.js"></script>
<script src="../vendors/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$('.date-picker').datetimepicker({
    format: 'YYYY-MM-DD'
});
    $("#data-table").bootgrid({
            css: {
                icon: 'zmdi icon',
                iconColumns: 'zmdi-view-module',
                iconDown: 'zmdi-expand-more',
                iconRefresh: 'zmdi-refresh',
                iconUp: 'zmdi-expand-less',
                iconSearch: 'zmdi-search'
            },
        });
</script>

<script src="../js/autoNumeric.js"></script>

<script src="js/functions.js"></script>

<script type="text/javascript">

$(document).ready(function(){
    //Basic Example
    $('#table').dataTable( {
              "ordering": false
            } );
    //autonumeric Buttons
    $(".nominal").autoNumeric("init");

});
</script>