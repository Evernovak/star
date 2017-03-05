<?php $this->load->view('admin/default/header'); ?>
<?php $this->load->view('admin/default/menu'); ?>
<?php $this->load->view('admin/default/avisos'); ?>

<div class="container">
	<div class="col-xs-12 corpo-container">
		<div class="col-xs-12 col-sm-6 form-upload">
			<?php echo form_open_multipart(base_url('admin/banner/uploadBanner'));?>
				<div class="form-group">
					<label for="file">Entrada de arquivo</label> 
						<input type="file" id="file" name="userfile1"/>
					<p class="help-block">Selecione a imagem para upload</p>
				</div>
				<div class="form-group">
					<label for="titulo">Título</label> 
					<input type="text" name="titulo" class="form-control text-uppercase" id="titulo" placeholder="Titulo">
				</div>
				<div class="form-group">
					<label for="descricao">Descrição</label> 
					<input type="text" name="descricao" class="form-control text-uppercase" id="descricao" placeholder="Descrição">
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
	
	<?php if (@$banners) : ?>
	<?php $indice = 1; ?>
	<?php foreach ($banners as $i) : ?>
		<?php if($indice == 1): ?>
			<div class="row">
		<?php endif; ?>
			<div class="col-xs-12 col-sm-4 fotos">
				<div class="thumbnail">
					<a class="thumbnail-img" href="#">
						<img src="<?php echo base_url() . 'arquivos/banners/'.$i->nome?>" alt="<?php echo $i->nome; ?>" title="<?php echo $i->titulo ?>">
					</a>
					<div class="caption">
						<p class="legenda_foto"><?php echo $i->titulo ? $i->titulo : "&nbsp;" ?></p>
						<?php echo form_open_multipart(base_url('admin/banner/deleteBanner'));?>
							<input type="hidden" name="id_banner" value="<?php echo $i->id_banner; ?>"/>
							<input type="hidden" name="nome" value="<?php echo $i->nome; ?>"/>
							<button type="submit" title="Excluir imagem" class="btn btn-danger btn-xs">Excluir</button>

							<button type="button" 
									title="Alterar titulo" 
									class="btn btn-success btn-xs" 
									data-cod="<?php echo $i->id_banner; ?>" 
									data-leg="<?php echo $i->titulo; ?>"
									data-nom="<?php echo $i->nome; ?>"
									data-des="<?php echo $i->descricao; ?>"
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
      <?php echo form_open_multipart(base_url('admin/banner/updateBanner'));?>
	      <div class="modal-body">
				<div class="form-group">
					<label for="titulo">Título</label> 
					<input type="text" name="titulo" class="form-control text-uppercase titulo" id="titulo" placeholder="Título">
					<input type="hidden" name="id_banner" class="id_banner" value="">
					<input type="hidden" name="nome" class="nome" value="">
				</div>
				<div class="form-group">
					<label for="descricao">Descrição</label> 
					<input type="text" name="descricao" class="form-control text-uppercase descricao" id="descricao" placeholder="Descrição">
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
		//Altera dados banner
		//-------------------------------------
		$('#myModal').on('show.bs.modal', function (event) {
			  var button 	= $(event.relatedTarget) 
			  var titulo 	= button.data('leg') 
			  var id_banner = button.data('cod') 
			  var nome 		= button.data('nom') 
			  var desc 		= button.data('des') 

			  var modal = $(this)
			  modal.find(".titulo").val(titulo)
			  modal.find(".id_banner").val(id_banner)
			  modal.find(".nome").val(nome)
			  modal.find(".descricao").val(desc)
		});
  })();
</script>