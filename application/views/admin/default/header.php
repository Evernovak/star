<?php 
	$usuario = $this->session->userdata('login'); //contem id_usuario, nome, email e tipo

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
	echo link_tag('public/assets/css/sistema.css');
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
	<!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>

<!-- para uso em Jquery -->
<input type="hidden" id="base_url" value="<?php echo base_url(); ?>"/>

<div class="geral">
	<div class="header">
		<div class="container">
			<div class="topbar">
				<ul class="pull-right">
					<li>
						<a class="logo" href="<?php echo base_url('admin/login/logout'); ?>">
							<img alt="Botão Sair" src="<?php echo base_url('public/assets/imgs/power.png');?>">
							Sair
						</a>
					</li>
					<li>
						<a class="logo" href="<?php echo base_url('admin/administrativo/configuracao'); ?>">
							<img alt="Botão Sair" src="<?php echo base_url('public/assets/imgs/settings.png');?>">
							Configurações
						</a>
					</li>
				</ul>
				<ul class="pull-right">
					<li>
						<span class="logo" ><?php echo saudacao() . ' ' . @$usuario['descricao']; ?> <br class="quebra-mobile"> <em><?=@$usuario['nome']; ?></em>.</span>
					</li>
				</ul>
			</div>
			<a class="header_logo" href="<?php echo base_url(); ?>">
				<img alt="Logo Star Painéis" src="<?php echo base_url('public/assets/imgs/logo.png');?>">
			</a>
		</div>
	</div>