<?php $this->load->view('admin/default/header'); ?>
<?php $this->load->view('admin/default/menu'); ?>
<?php $this->load->view('admin/default/avisos'); ?>

<div class="container">
	<div class="col-xs-12 corpo-container">
		<div class="col-xs-12 col-sm-6 form-upload">
			<?php echo form_open_multipart(base_url('admin/site/uploadFoto'));?>
				<div class="form-group">
					<label for="file">Entrada de arquivo</label> 
						<input type="file" id="file" name="userfile1"/>
					<p class="help-block">Selecione a imagem para upload</p>
				</div>
				<div class="form-group">
					<label for="legenda">Legenda</label> 
					<input type="text" name="legenda" class="form-control text-uppercase" id="legenda" placeholder="Legenda">
				</div>
				<button type="submit" class="btn btn-success">Enviar</button>
			</form>
		</div>
		<div class="col-xs-12 col-sm-6 form-upload">
		</div>
	</div>
</div>
<div class="container">
	<div class="col-xs-12 corpo-container">
	
	<?php if (@$fotos) : ?>
	<?php $indice = 1; ?>
	<?php foreach ($fotos as $i) : ?>
		<?php if($indice == 1): ?>
			<div class="row">
		<?php endif; ?>
			<div class="col-xs-12 col-sm-4 fotos">
				<div class="thumbnail">
					<a class="thumbnail-img" href="#">
						<img src="<?php echo base_url() . 'arquivos/fotos/'.$i->nome?>" alt="<?php echo $i->nome; ?>" title="<?php echo $i->legenda ?>">
					</a>
					<div class="caption">
						<p class="legenda_foto"><?php echo $i->legenda ? $i->legenda : "&nbsp;" ?></p>
						<?php echo form_open_multipart(base_url('admin/site/deleteFoto'));?>
							<input type="hidden" name="id_foto" value="<?php echo $i->id_foto; ?>"/>
							<input type="hidden" name="nome" value="<?php echo $i->nome; ?>"/>
							<button type="submit" title="Excluir imagem" class="btn btn-danger btn-xs">Excluir</button>

							<button type="button" 
									title="Alterar legenda" 
									class="btn btn-success btn-xs" 
									data-cod="<?php echo $i->id_foto; ?>" 
									data-leg="<?php echo $i->legenda; ?>"
									data-nom="<?php echo $i->nome; ?>"
									data-toggle="modal" 
									data-target="#myModal"
							>Alterar</button>
						</form>
					</div>
				</div>
			</div>
		<?php if($indice == 3):?>
			</div>
			<?php $indice = 1; ?>
		<?php else: ?>
			<?php $indice++; ?>
		<?php endif; ?>
	<?php endforeach; ?>
	<?php if($indice > 1):?>
			</div>
	<?php endif; ?>
	<?php if(@$paginacao): ?>
		<nav>
		  <ul class="pagination">
		    <?php echo $paginacao ?>
		  </ul>
		</nav>
	<?php endif; ?>
		
	<?php else : ?>
		<div class="row">
			<div class="col-xs-12 col-sm-12">
				<h3>Nenhuma imagem encontrada!</h3>
			</div>
		</div>
	<?php endif; ?>	
	
	
	
	</div>
</div>

<?php $this->load->view('admin/default/footer'); ?>

<!-- Modal devem ficar fora do rodapé problemas com o fade -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Informações sobre a imagem</h4>
      </div>
      <?php echo form_open_multipart(base_url('admin/site/updateFoto'));?>
	      <div class="modal-body">
				<div class="form-group">
					<label for="legenda">Legenda</label> 
					<input type="text" name="legenda" class="form-control text-uppercase legenda" id="legenda" placeholder="Legenda">
					<input type="hidden" name="id_foto" class="id_foto" value="">
					<input type="hidden" name="nome" class="nome" value="">
				</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
			<button type="submit" class="btn btn-success">Enviar</button>
	      </div>
       </form>
    </div>
  </div>
</div>
       
<script type="text/javascript">
  (function() {
		//-------------------------------------
		//Altera dados foto
		//-------------------------------------
		$('#myModal').on('show.bs.modal', function (event) {
			  var button 	= $(event.relatedTarget) 
			  var legenda 	= button.data('leg') 
			  var id_foto 	= button.data('cod') 
			  var nome 		= button.data('nom') 

			  var modal = $(this)
			  modal.find(".legenda").val(legenda)
			  modal.find(".id_foto").val(id_foto)
			  modal.find(".nome").val(nome)
		});
  })();
</script>