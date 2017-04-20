<!-- BEGIN FOOTER CONTENT -->		
						<div class="footer">
							<div class="footer-inner">
								<!-- basics/footer -->
								<div class="footer-content">
									&copy;Group 2:csc405, All Rights Reserved.
								</div>
								<!-- /basics/footer -->
							</div>
						</div>
						<button type="button" id="back-to-top" class="btn btn-primary btn-sm back-to-top">
							<i class="fa fa-angle-double-up icon-only bigger-110"></i>
						</button>
					<!-- END FOOTER CONTENT -->
						
				</div><!-- /#page-wrapper -->	  
			<!-- END MAIN PAGE CONTENT -->
		</div>  
	</div>
<!-- end live-chat -->	
	 
      <!-- core JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/js/plugins/pace/pace.min.js"></script>
	
	<!-- PAGE LEVEL PLUGINS JS -->
	<script src="assets/js/plugins/jqueryui/jquery-ui.custom.min.js"></script>
	<script src="assets/js/plugins/jqueryui/jquery.ui.touch-punch.min.js"></script>	
    <script src="assets/js/plugins/daterangepicker/moment.js"></script>
    <script src="assets/js/plugins/daterangepicker/daterangepicker.js"></script>	
    <script src="assets/js/plugins/morris/raphael-min.js"></script>
    <script src="assets/js/plugins/morris/morris.min.js"></script>
	<script src="assets/js/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
	<script src="assets/js/plugins/jquery-sparkline/jquery.sparkline.min.js"></script>
	<script src="assets/js/plugins/easypiechart/jquery.easypiechart.min.js"></script>
	<script src="assets/js/plugins/easypiechart/excanvas.compiled.js"></script>	
	<script src="assets/js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
	<script src="assets/js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Themes Core Scripts -->	
	<script src="assets/js/main.js"></script>
	
	<script src="assets/js/plugins/footable/footable.min.js"></script>	
	
	<script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="assets/js/plugins/datatables/datatables.js"></script>
	<script src="assets/js/plugins/datatables/datatables.responsive.js"></script>
    
    <!-- initial page level scripts for examples -->
	<script src="assets/js/plugins/slimscroll/jquery.slimscroll.init.js"></script>
	<script src="assets/js/plugins/footable/footable.init.js"></script>
	<script src="assets/js/plugins/datatables/datatables.init.js"></script>
	<script>
	
	<!-- REQUIRE FOR SPEECH COMMANDS -->
	<script src="assets/js/speech-commands.js"></script>
	<script src="assets/js/plugins/gritter/jquery.gritter.min.js"></script>		
	
	<!-- initial page level scripts for examples -->
	<script src="assets/js/plugins/slimscroll/jquery.slimscroll.init.js"></script>
	<script src="assets/js/home-page.init.js"></script>
	<script src="assets/js/plugins/jquery-sparkline/jquery.sparkline.init.js"></script>
	<script src="assets/js/plugins/easypiechart/jquery.easypiechart.init.js"></script>
	<script type="text/javascript">
		//Live Chat
		jQuery(function($) {
			$('#live-chat-ui header').on('click', function() {
			$('.chat').slideToggle(300, 'swing');
			$('.chat-message-counter').fadeToggle(300, 'swing');

		});

			$('.chat-close').on('click', function(e) {
				e.preventDefault();
				$('#live-chat-ui').fadeOut(300);
			});

		})

		$('#minicalendar').datepicker();
	</script>
  </body>
</html>