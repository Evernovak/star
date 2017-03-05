
<div class="footer">
	<table class="container">
		<tr><td style="border-top: 2px solid #666;">&nbsp;</td></tr>
		<tr>
			<td>
			<table>
				<tr>
					<td>
						<a class="logo" href="<?php echo base_url(); ?>">
							<img alt="Logo Star Painéis" src="<?php echo base_url('public/assets/imgs/logo.png');?>">
						</a>
					</td>
					<td class="assinatura">
						<table>
							<tr>
								<td style="border-bottom: 1px solid #666;">
									<p class="nome">
										<strong><?php echo camelCase($corretor->nome); ?> </strong>
									</p>
								</td>
							</tr>
							<tr>
								<td><?php 
										$fone = str_split($corretor->fone);
										$count = count($fone);
										if($count == 10){
											$ddd = $fone[0].$fone[1];
											$parte1 = $fone[2].$fone[3].$fone[4].$fone[5];
											$parte2 = $fone[6].$fone[7].$fone[8].$fone[9];
											$fone = $parte1.'-'.$parte2;
										}else if ($count == 11){
		                                	$ddd = $fone[0].$fone[1];
		                                	$parte1 = $fone[2].$fone[3].$fone[4].$fone[5].$fone[6];
		                                	$parte2 = $fone[7].$fone[8].$fone[9].$fone[10];
		                                	$fone = $parte1.'-'.$parte2;
										}else {
											$ddd = '';
										}
										?>
									<p>
										<strong><?php echo '('.$ddd.')'; ?> <span> <?php echo $fone; ?> </span> </strong>
									</p>
								</td>
							</tr>
							<tr>
								<td class="mob-default"><?php $email = explode('@', strtolower($corretor->email)); ?>
									<p>
										<a href="mailto:<?php echo strtolower($corretor->email); ?>">
										<strong>
											<span class="email"><?php echo $email[0]; ?></span> 
										</strong> 
											<?php echo '@'.$email[1]; ?>
										</a>
										<br>
									</p>
								</td>
								<td class="mob-mini">
									<p>
										<a href="mailto:<?php echo strtolower($corretor->email); ?>"><?php echo strtolower($corretor->email); ?></a>
										<br>
									</p>
								</td>
								
							</tr>
						</table>
					</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
</div>
</div>
<!-- .geral -->
</body>
</html>
