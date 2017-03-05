<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width" />
	<style type="text/css">
	/* regular CSS styles go here */
	html, body {
		height: 100%;
	}
	body {
		font-family: "Arial", sans-serif;
		color: #666;
		font-size: 12px;
		margin: 0;
		padding: 0;
	}
	.geral {
		width: 100% !important;
		min-width: 100%;
		-webkit-text-size-adjust: 100%;
		-ms-text-size-adjust: 100%;
		min-height: 100%;
		position: relative;
	}
	.container {
	    margin-left: auto;
	    margin-right: auto;
	    padding-left: 5px;
	    padding-right: 5px;
	}
	table.container {
		width: 100%;
	}
	table, tr, td {
	    padding: 0;
	    text-align: left;
	    vertical-align: top;
	   /* border-collapse: collapse;*/
	    border-spacing: 0;
	}
	a {
   		text-decoration: none;
	}
	a img { 
	  border: none;
	}
	.header, .corpo, .footer {
		width: 100%;
	}
	.header, .footer{
		padding: 5px 0;
	}
	.header {
		background: none repeat scroll 0 0 #e7e7e7;
	}
		.header a {
			vertical-align: middle;
		}
		.header a{
			text-align: left;
			display: block;
		}
		.corpo a{
			text-align: center;
			display: block;
		}
		.header img{
			height: 30px;
			margin: 0 auto;
		}
	p {
		text-align: justify;
		margin: 0;
	}
	.tr-img {
		background-color: #fff;
	    border: 1px solid #ddd;
	    border-radius: 4px;
	    display: block;
	    padding: 4px;
	    transition: border 0.2s ease-in-out 0s;
	}
	.tr-img img{
		margin: 0 auto 5px;
	    max-height: 270px;
	    max-width: 220px;
	}
	.mensagem{
		font-style: italic;
	}
	.endereco {
 		background: none repeat scroll 0 0 #e7e7e7;
	    border: 1px solid #d9d9d9;
	    color: #222;
	    display: block;
	    font-size: 10px;
	    padding: 5px;
	}
		.endereco strong{
		    color: #2ba6cb;
		}
	.assinatura .nome {
    	color: #666;
    	font-size: 15px;
    	margin-top: 5px;
    }
    .assinatura a, .assinatura a:hover, .assinatura a:focus, .assinatura a:active {
	    color: #8d8d8d !important;
	}

	.footer img {
	    height: 67px;
	    margin-right: 20px;
	}
    .assinatura p {
	    color: #8d8d8d;
	    font-size: 10px;
	}
    .assinatura p span {
    	font-size: 18px;
    }
    .assinatura .email {
    	font-size: 14px;
    }
	.barra img {
	    height: 80px;
	    margin: 0 0 0 5px;
	    width: 2px;
	}
	.logos img {
		margin-top: 25px;
	}
	table.sociais {
	    height: 37px;
	    width: 354px;
	}
		table.sociais a {
	    	float: left;
		}
		table.sociais a img {
		    border: medium none;
		}
		table.sociais img {
		    clear: both;
		    display: block;
		    outline: medium none;
		    text-decoration: none;
	}
	.ass-mobile, .mob-mini {
		display: block;
	}
	.ass-default, .mob-default {
		display: none;
	}
	.ass-mobile img{
		width: 229px;
	}

	@media screen and (min-width: 320px) {
		.header img{
			height: 40px;
		}
		.tr-img img{
		    max-width: 300px;
		}
		.barra img {
		    height: 87px;
		    margin: 0 5px;
		}
		.ass-mobile img {
		    width: 310px;
		}
		.assinatura .nome {
    		font-size: 18px;
    	}
    	.assinatura p {
	    	font-size: 12px;
	    }
		.assinatura .email {
	    	font-size: 16px;
	    }
		.assinatura img {
		    width: 298px;
		}
		.mob-mini {
		display: none;
		}
		.mob-default {
			display: block;
		}
	}
	@media screen and (min-width: 360px) {
		.header img{
			height: 47px;
		}
		.tr-img img{
		    max-width: 340px;
		}
		.ass-mobile img {
		    width: 349px;
		}
		.assinatura img {
		    width: 335px;
		}
	}
	@media screen and (min-width: 480px) {
		.header, .footer{
			padding: 10px 0;
		}
		.tr-img img{
		    max-width: 470px;
		}
		.header img{
			height: 55px;
		}
		.assinatura img {
		    width: 450px;
		}
	    .barra img {
	    	height: 94px;
	    	margin: 0 7px;
	    }
	    .ass-mobile img{
			width: 470px;
		}
	}
	@media screen and (min-width: 640px) {
		.container {
			max-width: 600px !important
		}
		.header img{
			height: 70px;
		}
		.tr-img img{
	   		max-height: 300px;
		}
	    .ass-default {
			display: block;
		}
		.ass-mobile {
			display: none;
		}
		.assinatura img {
		    width: 327px;
		}
	}
	
	</style>
</head>
<body>
<div class="geral">
	<div class="header">
		<table class="container">
			<tr>
				<td>
					<a class="logo" href="<?php echo base_url(); ?>">
						<img alt="Logo Star Painéis" src="<?php echo base_url('public/assets/imgs/logo.png');?>">
					</a>
				</td>
			</tr>
		</table>
	</div>