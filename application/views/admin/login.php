<?php 
	//contém erros do flashdata;
	$erro = $this -> session -> flashdata('erro');
	
	echo doctype('html5');
	
	echo '<html lang="pt-BR"><head>';
	echo '<meta charset="utf-8">';
	echo '<meta http-equiv="X-UA-Compatible" content="IE=edge">';

	/* ---------------- meta ---------------- */
	$meta = array(
        array('name' => 'viewport', 	'content' => 'width=device-width, initial-scale=1'),
        array('name' => 'robots', 		'content' => 'noindex,nofollow'),
        array('name' => 'autor', 		'content' => 'Star Painéis')
    );
	 
	echo meta($meta);
	/* ---------------- author ---------------- */
	echo link_tag('https://plus.google.com/112348499356341470973/', 'author');

	/* ---------------- icone ---------------- */
	echo link_tag('public/assets/imgs/favicon.ico', 'shortcut icon', 'image/ico');
	
	/* ---------------- css ---------------- */
	echo link_tag('public/assets/css/style.css');
	echo link_tag('public/assets/css/bootstrap.css');
	
	/* ---------------- Title ---------------- */
	echo "<title>Star Painéis | Comunicação Visual</title>";
	
?>
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 10]> 
     	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<link type="text/css" rel="stylesheet" href="<?php echo base_url('public/assets/css/ie8site.css');?>">
    <![endif]-->
    
	<!---------------- Jquery / javascript ------------------>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</head>
<body>

<!-- para uso em Jquery -->
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>"/> 
 
    <div class="container">
        <div class="card card-container">
            <img class="profile-img-card" alt="Logo Star Painéis" src="<?php echo base_url('public/assets/imgs/logo.png');?>" />
		    <?php if($erro): ?>
		    	<button type="button" class="btn btn-danger btn-block"><?php echo $erro; ?></button>
		    	<br/>
			<?php endif; ?>
			
            <form class="form-signin" method="post" action="<?=site_url('admin/login/logar');?>">
                <input type="hidden" value="<?= @$url_anterior; ?>" name="url_anterior" id="url_anterior" />
                <input type="email" id="inputEmail" class="form-control" placeholder="Email" name="txt_email" 
                	value="<?= @$this->session->userdata('txt_email') ?>" onfocus="this.select()" required autofocus>
                	
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" name="txt_pass" required>
                <div id="remember" class="checkbox">
                    <label><input type="checkbox" name="conectado"> Lembre-me</label>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
            </form><!-- /form -->
            <a href="<?php echo base_url('usuario/esqueci_minha_senha')?>" class="forgot-password">
                Esqueci a senha!
            </a>

        </div><!-- /card-container -->
    </div><!-- /container -->
</script>	
 </body>
 </html>