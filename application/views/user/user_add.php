<?php $this->load->view('templates/header'); ?>
<div class="span9">
	<div class="content">

		<div class="module">
			<div class="module-head">
				<?php if(isset($edit)):?>
					<h3>Editar Usuario</h3>
				<?php else: ?>
					<h3>Adicionar Usuario</h3>
				<?php endif;?>
			</div>
			<div class="module-body">
			<?php if($msg=get_msg()): ?>
				<div class="alert">
					
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Aviso!</strong> <?php echo $msg ?>
				</div>	
				<?php endif; ?>							
					<br />
					<?php echo form_open_multipart('usuarios/adicionar', array('class'=>'form-horizontal row-fluid'));?>
				
					<div class="control-group">
						<label class="control-label" for="basicinput">Nome</label>
						<div class="controls">
							<input type="text" value="<?php if(isset($edit))  echo $edit->nome ?>" id="basicinput" name="nome" placeholder="Escreve o nome" class="span8">
							<span class="help-inline"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="basicinput">Data de Nascimento</label>
						<div class="controls">
							<input type="date" value="<?php if(isset($edit))  echo $edit->data_nasc ?>" id="basicinput" name="data_nasc" placeholder="Escreve o nome" class="span8">
							<span class="help-inline"></span>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="basicinput">Email</label>
						<div class="controls">
							<input type="text" value="<?php if(isset($edit))  echo $edit->email ?>" name="email" id="basicinput" name="email" placeholder="Escreve email do usuario" class="span8">
							<span class="help-inline"></span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="basicinput">Endereço</label>
						<div class="controls">
							<input type="text" value="<?php if(isset($edit))  echo $edit->endereco ?>" id="basicinput" name="end" placeholder="Endereço de cliente" class="span8">
							<span class="help-inline"></span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="basicinput">Contacto</label>
						<div class="controls">
							<input type="text" value="<?php if(isset($edit))  echo $edit->celular ?>" id="basicinput" name="cont" placeholder="Contacto do cliente" class="span8">
							<span class="help-inline"></span>
						</div>
					</div>
                    <div class="control-group">
						<label class="control-label" for="basicinput">Telefone</label>
						<div class="controls">
							<input type="text" value="<?php if(isset($edit))  echo $edit->telef ?>" name="telef" id="basicinput" placeholder="Latitude e longitude" class="span8">
							<input type="hidden" name="grupo" id="basicinput" value="<?php echo $grupo ?>"  class="span8">
							<span class="help-inline"></span>
						</div>
					</div>
					<?php if(!isset($edit)): ?>
					<div class="control-group">
						<label class="control-label" for="basicinput">Senha</label>
						<div class="controls">
							<input type="password" name="senha" id="basicinput" placeholder="Senha" class="span8">							
							<span class="help-inline"></span>
						</div>
					</div>
				
					<?php endif; ?>
					<?php if(isset($edit)): ?>
					<input type="hidden" name="id_user" value="<?php echo $edit->id_user ?>" id="basicinput" placeholder="Senha" class="span8">
					<?php endif; ?>
					<?php   $ci = & get_instance();
		                if( $ci->session->userdata('grupo')==1&& $grupo==3): ?>
					<div class="control-group">
						<label class="control-label" for="basicinput">Subordinado de</label>
						<div class="controls">
						<select name="subord" id="basicinput">
							<option value="1">Admim</option>
							<?php foreach($gestor as $g): ?>
							<option value="<?php echo $g->id_user ?>"><?php echo $g->nome ?></option>
							<?php endforeach; ?>
							
						</select>
						</div>
					</div>
					<?php else:?>
						<input type="hidden" name="subord" id="basicinput" value="<?php echo $ci->session->userdata('id')?>"  class="span8">
					<?php endif;?>

					<div class="control-group">
						<label class="control-label" for="basicinput">Foto</label>
						<div class="controls">
							<?php echo form_upload('foto');?>
							<!--
						<input type="file" name="foto"  accept="image/png, image/jpeg">-->
							<span class="help-inline"></span>
						</div>
					</div>

					<div class="control-group">
						<div class="controls">
							<button type="submit" class="btn">Adicionar</button>
						</div>
					</div>
				</form>
			</div>
		</div>

						
						
	</div><!--/.content-->
</div><!--/.span9-->
<?php $this->load->view('templates/footer'); ?>
