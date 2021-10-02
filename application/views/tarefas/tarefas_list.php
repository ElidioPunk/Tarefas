<?php $this->load->view('templates/header'); ?>
<div class="span9">
    <div class="content">

        <div class="module message">
            <div class="module-head">
                <h3>Task Management Tool</h3>
            </div>
            <div class="module-option clearfix">
                <div class="pull-left">
                    Filter : &nbsp;
                    <div class="btn-group">
                        <button class="btn">All</button>
                        <button class="btn dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">All</a></li>
                            <li><a href="#">In Progress</a></li>
                            <li><a href="#">Done</a></li>
                            <li class="divider"></li>
                            <li><a href="#">New task</a></li>
                            <li><a href="#">Overdue Task</a></li>
                        </ul>
                    </div>
                </div>
                
            </div>
            <div class="module-body table">								

                <table class="table table-message">
                    <tbody>
                        <tr class="heading">
                            <td class="cell-icon"></td>
                            <td class="cell-title">Tarefa</td>
                            <td class="cell-status hidden-phone hidden-tablet">Estado</td>
                            <td class="cell-time align-right">Data limite</td>
                        </tr>
                        <?php if(isset($tarefa)&&sizeof($tarefa)>0):?>
                        <?php foreach($tarefa as $t): ?>
                        <tr class="task <?php if($t->estado==1) echo 'resolved'?>">
                            <td class="cell-icon"><i class="icon-checker"></i></td>
                            <td class="cell-title"><div><?php echo $t->msg ?></div></td>
                            <td class="cell-status hidden-phone hidden-tablet"><?php if($t->estado==0) echo '<b class="due">Missed</b>';?></td>
                            <td class="cell-time align-right"><?php echo $t->data_limite ?></td>
                        </tr>
                        <?php endforeach; ?>
                        <?php else: ?>

                            <td colspan="4">Sem tarefa atribuida</td>
                        <?php endif;?>
                        
                        
                    </tbody>
                </table>


            </div>
            <div class="module-foot">
            </div>
        </div>
        
    </div><!--/.content-->
</div><!--/.span9-->

    <script type="text/javascript">
		$(document).ready(function() {
			$('.table-message tbody tr').click(
				function() 
				{
					$(this).toggleClass('resolved');
				}
			);
		} );
	</script>
<?php $this->load->view('templates/footer'); ?>