<?php $this->load->view('templates/header'); ?>
<div class="span9"> 
                    
    <div class="content">   
        <?php $ci = & get_instance(); ?>
        <?php $id=$ci->session->userdata('id'); ?>

        <div class="row-fluid">
            <div class="span12">
                <a href="<?php echo base_url('index.php/usuarios/user_gestor/'.$id);?>" class="btn-box small span4"><i class="icon-group"></i><b>Meus Subordinados</b>
                </a><a href="<?php echo base_url('index.php/usuarios/adicionar/3');?>" class="btn-box small span4"><i class="icon-group"></i><b>Adicionar Subordinado</b>
                </a><a href="<?php echo base_url('index.php/usuarios/adicionar/2');?>" class="btn-box small span4"><i class="icon-exchange"></i><b>Adicionar Gestor</b>
                </a>
            </div>
        </div>         
        <div class="module">
            <div class="module-head">
                <h3>Usuários</h3>
            </div>
            <div class="module-body table">
                <table cellpadding="0" cellspacing="0" class="datatable-1 table table-bordered table-striped display" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Endereço</th>
                            <th>Data de Nascimento</th> 
                            <th>Tipo de Usuario</th> 
                            <th>Acao</th>                        
                        </tr>
                    </thead>
                    <tbody>
                    <?php if(isset($user)&&$user>0): ?>
                        <?php foreach($user as $c): ?>
                            <?php if($c->grupo!=1): ?>
                        <tr class="odd gradeX">
                            <td><?php echo $c->id_user; ?></td>
                            <td><?php echo $c->nome; ?></td>
                            <td><?php echo $c->email; ?></td>
                            <td><?php echo $c->data_nasc; ?></td>
                            <td><?php echo $c->grupo==2 ? 'Gestor': 'Entregador'; ?></td>
                            <td>
                                <?php if(isset($gestor)): ?>
                                    <a href="<?php echo base_url('index.php/tarefas/adicionar/'.$c->id_user)?>" class="btn btn-mini btn-warning">Agendar Tarefas</a>
                                    <a href="<?php echo base_url('index.php/tarefas/list/'.$c->id_user) ?>" class="btn btn-mini btn-warning">Ver Tarefas</a>
                                <?php else: ?>
                                    <?php if($c->grupo==2): ?>

                                        <a href="<?php echo base_url('index.php/usuarios/adicionar/2/'. $c->id_user)  ?>" class="btn btn-mini btn-warning">Editar</a>
                                        
                                    <?php else: ?>
                                        <a href="<?php echo base_url('index.php/usuarios/adicionar/3/'. $c->id_user)  ?>" class="btn btn-mini btn-warning">Editar</a>
                                        
                                    <?php endif; ?>
                                <?php endif; ?>
                            </td>                                            
                        </tr>  
                            <?php else:?> 
                                <td colspan="6" text-align="center">Administrador geral: <?php echo $c->nome; ?> </td>   
                            <?php endif;?>                   
                        <?php endforeach; ?>
                    <?php endif;?>                                           
                    </tbody>                    
                </table>
            </div>
        </div>
<!--/.module-->

        
                            
                           
                           
    </div>
    <!--/.content-->
</div>
<?php $this->load->view('templates/footer'); ?>
