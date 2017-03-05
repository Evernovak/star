<?php 
	$usuario = $this->session->userdata('login'); //contem id_usuario, nome, email e tipo
	$mensagem = $this->session->flashdata('mensagem'); //contém mensagens do flashdata;
	$erro = $this->session->flashdata('erro'); //contém erros do flashdata;
?>
	
<!-- Mensagens de confirmação -->
<?php if($mensagem) { ?>
<div class="container avisos">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<button type="button" class="btn btn-success btn-block"><?php echo $mensagem ?></button>
		</div>
	</div>
</div>
<?php } if($erro) { ?>
<div class="container avisos">
	<div class="row">
		<div class="col-xs-12 col-sm-12">
			<button type="button" class="btn btn-danger btn-block"><?php echo $erro ?></button>
		</div>
	</div>
</div>
<?php } ?>