<?php
$this->load->view ( 'header' );
$mensagem = $this->session->flashdata ( 'mensagem' );
// contém mensagens do flashdata;
$erro = $this->session->flashdata ( 'erro' );
// contém erros do flashdata;
?>
<script src="<?php echo base_url('public/assets/js/jquery.mask.min.js');?>"></script>

<!-- Mensagens de confirmação de emails enviado -->
<?php if($mensagem) { ?>
<div class="container">
	<div class="col-xs-12 col-sm-12">
		<br>
		<button type="button" class="btn btn-success btn-block"><?= $mensagem ?></button>
	</div>
</div>
<?php } if($erro) { ?>
<div class="container">
	<div class="col-xs-12 col-sm-12">
		<br>
		<button type="button" class="btn btn-danger btn-block"><?= $erro ?></button>
	</div>
</div>
<?php } ?>

<div class="container form-contato">
	<br>
	<div class="col-xs-12 col-sm-7">
		<form class="form-horizontal"
			action="<?php echo base_url('contato/enviarEmail') ?>" method="post">
			<div class="form-group">
			<h4>Dados pessoais:</h4>
				<input class="form-control text-uppercase" type="text" name="nome" id="nome"
						placeholder="Nome:" autofocus required>
			</div>
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon">@</span> <input
						class="form-control" type="email" name="email" id="email"
						placeholder="email@exemplo.com">
				</div>
			</div>
			<div class="form-group">
					<input class="form-control" type="tel" name="telefone"
						id="telefone" placeholder="Fone: (00) 0000-0000" required>
			</div>
			<div class="form-group">
					<input class="form-control text-uppercase" type="text" maxlength="50"
						name="assunto" id="assunto" placeholder="Assunto:"/>
			</div>
			<div class="form-group">
					<textarea class="form-control text-uppercase" rows="7" name="mensagem"
						id="mensagem" placeholder="Mensagem:"></textarea>
			</div>
			<div class="row">
			<button type="submit" class="btn btn-primary pull-right">
				<span class="glyphicon glyphicon-thumbs-up"></span> Enviar
			</button>
			<input type="reset" class="btn btn-primary pull-right" name="reset"
				value="Limpar">
				</div>
		</form>
	</div>
	<div class="col-xs-12 col-sm-5 form-avalie">
		<h4>Endereço</h4>
		<div class="form-group text-center">
			<address>
			  R. Petrônio Fernal, 21 - Cep: 84035-620<br>
			  Oficinas, Ponta Grossa - PR<br><br>
			  <strong><abbr title="phone">Tel:</abbr> (42) 3223-7774</strong>
			</address>
			<address>
			  <strong><em>Administrativo</em></strong><br>
			  <a href="mailto:lucas@starpaineis.com.br">lucas@starpaineis.com.br</a>
			</address>
			<address>
			  <strong><em>Financeiro</em></strong><br>
			  <a href="mailto:financeiro@starpaineis.com.br">financeiro@starpaineis.com.br</a>
			</address>
			<address>
			  <strong><em>Comercial</em></strong><br>
			  <a href="mailto:comercial01@starpaineis.com.br">comercial01@starpaineis.com.br</a>
			</address>
			<address>
			  <strong><em>Arte Final</em></strong><br>
			  <a href="mailto:arte02@starpaineis.com.br">arte02@starpaineis.com.br</a>
			  <a href="mailto:arte04@starpaineis.com.br">arte04@starpaineis.com.br</a>
			</address>
			<address>
			  <strong><em>Impressão</em></strong><br>
			  <a href="mailto:impressao@starpaineis.com.br">impressao@starpaineis.com.br</a>
			</address>			
		</div>
	</div>
</div>
<script>
jQuery(function() {
	/*############## Máscaras ######################*/
	$("#telefone").mask("(00) 0000-00009");
}); 
</script>
<?php $this -> load -> view('footer'); ?>