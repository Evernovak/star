<!--[if IE]>
<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<script src="<?php echo base_url('public/assets/js/jquery.collagePlus.js');?>"></script>
<script src="<?php echo base_url('public/assets/js/jquery.removeWhitespace.js');?>"></script>
<script src="<?php echo base_url('public/assets/js/jquery.collageCaption.js');?>"></script>

<section class="Collage">
	<?php if (@$fotos) : ?>
		<?php foreach ($fotos as $i) : ?>
			<div class="Image_Wrapper" data-caption="<?php echo $i->legenda ."&nbsp;<a style='float:right;' href='". base_url('contato')."'>Mais Informações</a>" ?> ">
				<a href="<?php echo base_url() . 'thumbs/1024/800/'.$i->nome?>"" ><img src="<?php echo base_url() . 'thumbs/300/500/'.$i->nome?>"/></a>     
			</div> 
		<?php endforeach; ?>		
	<?php else : ?>
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h3>Nenhuma imagem encontrada!</h3>
			</div>
		</div>
	<?php endif; ?>	
</section>

<script type="text/javascript">
// All images need to be loaded for this plugin to work so
// we end up waiting for the whole window to load in this example
$(window).load(function () {
	$(document).ready(function(){
		collage();
		$('.Collage').collageCaption();
	});
});


	// Here we apply the actual CollagePlus plugin
	function collage() {
		$('.Collage').removeWhitespace().collagePlus(
		{
			'fadeSpeed'     : 2000,
			'targetHeight'  : 350,
			'effect'        : 'effect-5',
			'direction'     : 'vertical'
		}
		);
	};

	// This is just for the case that the browser window is resized
	var resizeTimer = null;
	$(window).bind('resize', function() {
		// hide all the images until we resize them
		$('.Collage .Image_Wrapper').css("opacity", 0);
		// set a timer to re-apply the plugin
		if (resizeTimer) clearTimeout(resizeTimer);
		resizeTimer = setTimeout(collage, 200);
	});
</script>