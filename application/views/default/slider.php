<div class="slider hidden-xs">
	<div class="container"><div class="row">
		    <div id="slider" class="owl-carousel">
				<?php if (@$banners) : ?>
				<?php foreach ($banners as $i) : ?>
			      	<div class="item">
			      		<img 	src="<?php echo base_url('./arquivos/banners/'.$i->nome);?>" 
			      				alt="<?php echo @$i->descricao ? $i->descricao : @$i->titulo ? $i->titulo : ''?>">
					</div> 
				<?php endforeach; ?>		
				<?php else : ?>
					<div class="item">
						<h3>Nenhuma imagem encontrada!</h3>
					</div>
				<?php endif; ?>	
		    </div> <!-- #slider -->

	</div></div> <!-- .container / row -->
</div> <!-- .slider -->
<script type="text/javascript">
	jQuery(function(){
		$("#slider").owlCarousel({
			autoPlay: 4000,
			itemsDesktop: false,
			slideSpeed : 500,
			lazyLoad : true,
			pagination: false,
			singleItem:true,
			autoHeight: true,
			responsive: true,
		});
	});
</script>