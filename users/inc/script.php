       <!-- jgrowl -->
       <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-jgrowl/1.4.8/jquery.jgrowl.min.js"></script>

       <script>
       	$(function() {
       		$('.tooltip').tooltip();
       		$('.tooltip-left').tooltip({
       			placement: 'left'
       		});
       		$('.tooltip-right').tooltip({
       			placement: 'right'
       		});
       		$('.tooltip-top').tooltip({
       			placement: 'top'
       		});
       		$('.tooltip-bottom').tooltip({
       			placement: 'bottom'
       		});
       		$('.popover-left').popover({
       			placement: 'left',
       			trigger: 'hover'
       		});
       		$('.popover-right').popover({
       			placement: 'right',
       			trigger: 'hover'
       		});
       		$('.popover-top').popover({
       			placement: 'top',
       			trigger: 'hover'
       		});
       		$('.popover-bottom').popover({
       			placement: 'bottom',
       			trigger: 'hover'
       		});
       		$('.notification').click(function() {
       			var $id = $(this).attr('id');
       			switch ($id) {
       				case 'notification-sticky':
       					$.jGrowl("Stick this!", {
       						sticky: true
       					});
       					break;
       				case 'notification-header':
       					$.jGrowl("A message with a header", {
       						header: 'Important'
       					});
       					break;
       				default:
       					$.jGrowl("Hello world!");
       					break;
       			}
       		});
       	});
       </script>