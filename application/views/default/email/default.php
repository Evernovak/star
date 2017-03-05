<?php $this->load->view('default/email/header'); ?>
<div class="corpo">
	<br>
	<table class="container">
		<tr>
			<td>
				<p>
					<?php echo $texto; ?><br><br>
					<strong>Sr(a): <?php echo $nome; ?></strong><br>
					Telefone: <?php echo $telefone; ?><br>
					E-mail: <?php echo $email; ?><br><br>
					<?php echo $texto1; ?><br>
					<span class="mensagem">"<?php echo $mensagem; ?>"</span>
					<br><br>
				</p>
			</td>
		</tr>
		<tr>
			<td>
				<p>
					<?php echo $texto2; ?>
				</p>
			</td>
		</tr>
	</table>
</div>
<?php $this->load->view('default/email/footer'); ?>