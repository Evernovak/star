</div> <!-- .corpo -->
<div class="footer">
	<div class="inner-footer">
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-9 menu-footer">
			      	<ul class="list-inline">
						<li><a href="<?php echo site_url() ?>" class="home">Home</a></li>
						<li><a href="<?php echo site_url('empresa'); ?>" class="empresa">Empresa</a></li>
						<li><a href="<?php echo site_url('produtos'); ?>" class="produtos">Produtos</a></li>
						<li><a href="http://esouth.logycware.com.br/star/" class="midia">Mídia</a></li>
						<li><a href="<?php echo site_url('contato'); ?>" class="contato">Contato</a></li>
					</ul>
				</div>
				<div class="col-sm-3 icon-footer hidden-xs">
					<ul class="pull-right">
						<li>
							<a class="logo" href="https://twitter.com/#!/starcomunicacao" target="_blank">
								<img alt="Botão Twitter" src="<?php echo base_url('public/assets/imgs/twitter.png');?>">
							</a>
						</li>
						<li>
							<a class="logo" href="https://facebook.com/starpaineis" target="_blank">
								<img alt="Botão Facebook" src="<?php echo base_url('public/assets/imgs/facebook.png');?>">
							</a>
						</li>
					</ul>
				</div>
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
<script type="text/javascript">
  (function() {
	marcaMenuAtual('<?= $this->site_classmenu; ?>');
  })();

  /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */ 
  /* marca no menu principal a página visualizada atualmente
  /* - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - */
  function marcaMenuAtual($classeMenu) {
  	if($classeMenu){
  		$('.menu-header li a.' + $classeMenu).addClass('selecionado');
  		$('.menu-footer li a.' + $classeMenu).addClass('selecionado_footer');
  	}
  }
</script>

</body>
</html>