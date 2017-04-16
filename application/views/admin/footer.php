			</div>
			<!-- /.container -->

		</div>
	</div>

	
<script type="text/javascript" src="<?php echo base_url()?>media/admin/assets/js/tinymce/tinymce.min.js"></script>
<!--
<link rel="stylesheet" href="<?php echo base_url()?>media/admin/assets/js/tinyeditor/style.css" />
-->

<script type="text/javascript" src="<?php echo base_url()?>media/admin/assets/js/bootstrap-datepicker.js"></script>

<script type="text/javascript" src="<?php echo base_url()?>media/admin/assets/js/locales/bootstrap-datepicker.es.js"></script>
<link rel="stylesheet" href="<?php echo base_url()?>media/admin/assets/css/datepicker.css" />
<script type="text/javascript" src="<?php echo base_url()?>media/admin/assets/js/jquery.simpletip-1.3.1.min.js"></script>	

<script type="text/javascript">
	$(document).ready(function(){
		Ladda.bind( 'button[type=submit]' );

		var baseURL = "<?php echo base_url();?>";
		$('.btnOpcionIdioma').click(function(e){
			e.preventDefault();
			$('#btnIdioma').html($(this).html());
			$('.langfields').addClass('hide');
			$('.' + $(this).data('lang')).removeClass('hide');
		});

		$('.s2').select2();

		$('.clickable').click(function(e){
			location.href = $(this).parent().find('.icon-edit').attr('href');
		});

		$('input[type=checkbox].switch').bootstrapSwitch({ onText: 'SI', offText: 'NO' });
		
		//$('.datepicker').datepicker();
		$('.datepicker').datepicker({
			format: "dd/mm/yyyy",
			language: "es"
		});
		
		$(".fancybox").fancybox();
		
		$('.blocking').click(function(e){
			e.preventDefault();
			$.blockUI();
		});

		//para videos youtube
		$('.fancybox-media').fancybox({
			openEffect  : 'none',
			closeEffect : 'none',
			helpers : {
				media : {}
			}
		});
	
		$("a.modal-alert").click(function(e) {
			e.preventDefault();
			var url = $(this).attr('data-href');
			$.post(url,function(data){
				if(data.msg){
					bootbox.dialog({
						message: data.msg,
						title: data.title,
						buttons: {
							success: {
								label: "Cerrar",
								className: "btn-primary"
							}
						}
					});
				}
			},"json");
		});
		
		$('#btnReset').click(function(e){
			$("#keywords").val("");
			location.href = "<?php echo site_url('admin/reset');?>";
		});
				
		$('.delete').click(function(e){
			e.preventDefault();
			var me = this;

			bootbox.confirm("Esta seguro que desea borrar el registro?", function(result){
				if (result) {
					window.location = me.href;
				}
			});
		});	
		
		$('.lnkBulkSort').click(function(e){
			e.preventDefault();
			$.post($(this).attr('href'), $('#' + $(this).data('form')).serialize(), function(){
				location.reload();
			});
			return false;
		});
		
		$('.sort').click(function(e){
			e.preventDefault();
			if ($('#sort').val() == this.id) {
				if ($('#sortType').val() == 'ASC') {
					$('#sortType').val('DESC');
				}
				else
					$('#sortType').val('ASC');
			} 
			else {
				$('#sortType').val('ASC');
			}
			$('#sort').val(this.id);
			if(document.getElementById('frmSearch'))
				document.getElementById('frmSearch').submit();
			else if(document.getElementById('frmFilter'))
				document.getElementById('frmFilter').submit();
		});	
		
		$('.toggle_2').click(function(e){
			e.preventDefault();
				
			var me = this;
			$(me).addClass('loading');
			
			$.get(this.href + this.rel, function(data){
				$(me).removeClass('loading');
				if (data == 0) {
					me.rel = 1;
					$(me).removeClass('yes').addClass('no');
				} else {
					me.rel = 0;
					$(me).removeClass('no').addClass('yes');
				}
			});
				
			return false;
		});
		
		$(".limited").keyup(function (e) {
			var text = $(this).val(); 
		    var length = text.length;
		    var limit = $(this).data('limit');
		    if(length > limit){
				$(this).val(text.substr(0,limit));
		    }
		});

		$(".limited").keydown(function (e) {
		   var $this      = $(this),
		       charLength = $this.val().length,
		       charLimit  = $this.attr("data-limit");
		    
		   if ($this.val().length >= charLimit && e.keyCode !== 8 && e.keyCode !== 46) {
		       return false;
		   }
		});
		
		//para url friendly
		$(".url_friendly").keyup(function (e) {
			var text = $(this).val(); 
		    var length = text.length;
		    var limit = $(this).data('limit');
			
			$(this).val(text.replace(/[^a-zA-Z0-9\-\_]/g,''));
			
		    if(length > limit){
				$(this).val(text.substr(0,limit));
		    }
		});

		$(".url_friendly").keydown(function (e) {
		   var $this      = $(this),
		       charLength = $this.val().length,
		       charLimit  = $this.attr("data-limit");
		    
			$this.val($this.val().replace(/[^a-zA-Z0-9\-\_]/g,''));
			
		   if ($this.val().length >= charLimit && e.keyCode !== 8 && e.keyCode !== 46) {
		       return false;
		   }
		});

	});		
		
	function validar(){
		//Agregar inputs hiddens para los checkboxes que no esten marcados ya que sino no viajan en el post
		$('input').each(function(){
			if ($(this).is('input:checkbox') && !$(this).is(':checked')) {
				$('<input type="hidden" value="0" name="' + this.name + '" />').appendTo('form');
			}
		});	
		
		var res = true;
		$('input.required').each(function(){
			if ($(this).val() == '') {
				res = false;
			}
		});		
		
		if(!res){
			alert('Los campos marcados con * son obligatorios.');
			Ladda.stopAll()
			return false;
		}
		
		return true;
	}
</script>


</body>
</html>