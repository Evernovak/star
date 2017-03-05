</div> <!-- .corpo -->
	<div class="footer">
		<div class="inner-footer">
			<div class="container">
				<div class="row">
				</div>
			</div>
		</div>
		<div class="inner-footer2">
			<div class="container">
				<div class="row">
				<p><strong>© Star Comunicação Visual - (42) 3223-7774</strong> <br class="quebra-mobile">Rua Petrônio Fernal, 21 - Oficinas, Ponta Grossa - PR</p>
				</div>
			</div>
		</div>
	</div>
</div> <!-- .geral --->

<script type="text/javascript">
  (function() {
	marcaMenuAtual('<?php echo $this->site_classmenu; ?>');
  })();

  /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */ 
  /* marca no menu principal a página visualizada atualmente
  /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
  function marcaMenuAtual($classeMenu) {
  	if($classeMenu){
  	  	console.log($classeMenu);
  		$('.menu_header li a.' + $classeMenu).addClass('active');
  	}
  }
</script>

</body>
</html>