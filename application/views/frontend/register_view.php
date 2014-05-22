<!DOCTYPE html>
<html>
    <head>
        <title><?=$titulo?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/estilos.css" />
        <!-- los archivos que forman el framework css 960 grid system-->
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/960.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?=base_url()?>css/reset.css" media="screen" />
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
        <script type="text/javascript" src="<?=base_url()?>js/funciones.js"></script>
    </head>
    <body>
        <?php
           $nombre = array(
                'name' => 'nombre',
                'id' => 'nombre',
                'value'=> set_value('nombre')
            );
            $apellido = array(
                'name' => 'apellido',
                'id' => 'apellido',
                'value'=> set_value('apellido')
            );
            $username = array(
                'name' => 'username',
                'id' => 'username',
                'value'=> set_value('username')
            );
            $password = array(
                'name' => 'password',
                'id' => 'password',
                'value'=> ''
            );
            $email = array(
                'name' => 'email',
                'id' => 'email',
                'value'=> set_value('email')
            );
            $submit = array(
                'value'=> 'Registrarme',
                'name' => 'registro',
                'id' => 'registro'
            );
        ?>
        <div class="container_12" id="contenedor">
            <div class="grid_12">
                <div class="grid_6 push_2" id="formulario">
                    <h2 id="logo">Formulario de registro</h2><br />
                    <?=validation_errors('<div id="error">', '</div>')?><br />
                    <?=form_open(base_url().'index.php/register/validar')?>
                    <?=form_label('Nombre')?>
                    <?=form_input($nombre)?><br /><br />
                    <?=form_label('Apellidos')?>
                    <?=form_input($apellido)?><br /><br />
                    <?=form_label('Email')?>
                    <span id="msgEmail"></span>
                    <?=form_input($email)?><br /><br />
                    <?=form_label('Usuario')?>
                    <span id="msgUsuario"></span>
                    <?=form_input($username)?><br /><br />
                    <?=form_label('Password')?>
                    <?=form_password($password)?><br /><br />
                    <?=form_submit($submit)?>
                    <?=form_close()?>
                    <?php
                    $registrado = $this->session->flashdata('registrado');
                    if($registrado)
                    {
                    ?>
                        <div class="grid_3" id="registro_correcto"><?=$registrado?></div>
                    <?php
                    }
                    ?>    
                </div>
            </div>
        </div>
    </body>
</html>