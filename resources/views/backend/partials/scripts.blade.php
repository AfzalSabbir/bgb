<script src="{!! asset('public/admin/assets/js/modernizr.min.js') !!}"></script>
<script src="{!! asset('public/admin/assets/js/moment.min.js') !!}"></script>

<script src="{!! asset('public/admin/assets/js/popper.min.js') !!}"></script>
<script src="{!! asset('public/admin/assets/js/bootstrap.min.js') !!}"></script>

<script src="{!! asset('public/admin/assets/js/detect.js') !!}"></script>
<script src="{!! asset('public/admin/assets/js/fastclick.js') !!}"></script>
<script src="{!! asset('public/admin/assets/js/jquery.blockUI.js') !!}"></script>
<script src="{!! asset('public/admin/assets/js/jquery.nicescroll.js') !!}"></script>

<!-- App js -->
<script src="{!! asset('public/admin/assets/js/pikeadmin.js') !!}"></script>

<!-- BEGIN Java Script for this page -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>

<!-- Counter-Up-->
<script src="{!! asset('public/admin/assets/plugins/waypoints/lib/jquery.waypoints.min.js') !!}"></script>
<script src="{!! asset('public/admin/assets/plugins/counterup/jquery.counterup.min.js') !!}"></script>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script src="{{ asset('public/admin/assets/plugins/jquery.filer/js/jquery.filer.min.js') }}"></script>

<script src="{{ asset('public/admin/assets/plugins/datetimepicker/js/moment.min.js') }}"></script>
<script src="{{ asset('public/admin/assets/plugins/datetimepicker/js/daterangepicker.js') }}"></script>

<script src="{{ asset('public/admin/assets/js/custom.js') }}"></script>

<script charset="utf-8" type="text/javascript" src="http://torifat.github.io/jsAvroPhonetic/libs/avro-keyboard/dist/avro-v1.1.4.min.js"></script>

{{-- Custom Sidebar --}}
<script src="https://cdn.jsdelivr.net/npm/simplebar@latest/dist/simplebar.js"></script>

{{-- For Datatable --}}
<script>
  $(document).ready(function() {

    var table = $('#datatable').DataTable( {
      // "scrollY": "350px",
      "paging": true,
      "pageLength": 50,
      "lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );

    $('a.toggle-vis').on( 'click', function (e) {
      e.preventDefault();

        // Get the column API object
        var column = table.column( $(this).attr('data-column') );

        // Toggle the visibility
        column.visible( ! column.visible() );
      } );
  } );

  {{-- Sloved: ScrollBar (SimpleBar) Problem --}}
  $(document).ready(function() {

    {{-- Solver: Problem in Collapse While Clicking Parent Menu --}}
    $("#fix-sidebar").height($(window).height()-50);
    $("#fix-sidebar").css({
      'position': 'fixed',
      'width':$(".main-sidebar").css('width'),
      'top': $(".headerbar").height(),
      'left': '0',
    });

    if ($(window).width() < 990) {
      $("#fix-sidebar").addClass('SideBarCollapsed');
    }


    $("#dashboard_toggle button").click(function() {
      myFunction();
    });

    $(window).resize(function() {
      myFunction();
      setTimeout(function(){
        location.reload();
      }, 500);
    });

    if ($(window).width() < 752) {
      $("#fix-sidebar").css({
        'width': 0
      });
    } else if ($(window).width() >= 752 && $(window).width() < 990) {
      $("#fix-sidebar").css({
        'width': 70
      });
    } else {
      $("#fix-sidebar").css({
        'width': 250
      });      
    }

    //alert($(".main-sidebar").css('width'));
    $(".submenu a").mouseup(function() {
      if ($("#fix-sidebar").hasClass('SideBarCollapsed')) {
        $("#dashboard_toggle button").click();
      }
    });

    function myFunction () {
      if ($("#fix-sidebar").hasClass('SideBarCollapsed')) {
        $("#fix-sidebar").removeClass('SideBarCollapsed');
        if ($(window).width() <= 751) {
          $("#fix-sidebar").width(250);
        } else{
          $("#fix-sidebar").css({
            'width': $(".main-sidebar").css('width')
          });
        }
      }else{
        $("#fix-sidebar").addClass('SideBarCollapsed');
        if ($(window).width() <= 751) {
          $("#fix-sidebar").width(0);
        } else{
          $("#fix-sidebar").css({
            'width': $(".main-sidebar").css('width')
          });
        }
      }
    }

  });
</script>
