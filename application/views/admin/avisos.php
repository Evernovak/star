<?php $this->load->view('admin/default/header'); ?>
<?php $this->load->view('admin/default/menu'); ?>
<?php $this->load->view('admin/default/avisos'); ?>

<div class="container">
	<div class="col-xs-12 corpo-container">
		<h3>Email enviados pelo site</h3>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>#</th>
					<th>Nome</th>
					<th>Email</th>
					<th>Telefone</th>
					<th>Assunto</th>
					<th>Data</th>
					<th>Mensagem</th>
				</tr>
			</thead>
			<tbody>
		<?php if (@$agenda) : ?>
		<?php $i = 1; ?>
			<?php foreach ($agenda as $a) : ?>
				<tr>
					<th scope="row"><?php echo $i; ?></th>
					<td><?php echo $a->nome; ?></td>
					<td><?php echo $a->email; ?></td>
					<td><?php echo formata_telefone($a->telefone); ?></td>
					<td><?php echo $a->assunto; ?></td>
					<td><?php echo formata_data($a->data); ?></td>
					<td><?php echo $a->mensagem; ?></td>
				</tr>
			<?php $i++; ?>
			<?php endforeach; ?>		
		<?php else : ?>
			<tr>
					<td colspan="6">Nenhum aviso encontrado!</td>
				</tr>
		<?php endif; ?>	
		</tbody>
			<tfoot>
	        <?php if ($paginacao) : ?>
				<tr class="paginacao_agenda">
					<td colspan="6">
						<?= $paginacao?>
					</td>
				</tr>
            <?php endif; ?>
        </tfoot>
		</table>
	</div>
</div>
<?php $this->load->view('admin/default/footer'); ?>
