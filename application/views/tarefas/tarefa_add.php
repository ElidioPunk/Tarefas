<?php $this->load->view('templates/header'); ?>
<div class="span9">
	<div class="content">

		<div class="module">
			<div class="module-head">
				
<h3>Adicionar Tarefa</h3>
				
			</div>
			<div class="module-body">
			<?php if($msg=get_msg()): ?>
				<div class="alert">
					
					<button type="button" class="close" data-dismiss="alert">×</button>
					<strong>Aviso!</strong> <?php echo $msg ?>
				</div>	
				<?php endif; ?>							
					<br />
					<?php echo form_open_multipart('tarefas/adicionar', array('class'=>'form-horizontal row-fluid'));?>

					<div class="control-group">
						<label class="control-label" for="basicinput">Data Limite</label>
						<div class="controls">
							<input type="date" value="" id="basicinput" name="data_limite" class="span8">
							<input type="hidden" value="<?php echo $user ?>" id="basicinput" name="id" class="span8">
							<span class="help-inline"></span>
						</div>
					</div>					
					<div class="control-group">
						<label class="control-label" for="basicinput">Tarefa</label>
						<div class="controls">
							<textarea name="tarefa" id="" cols="100" rows="5"></textarea>
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
