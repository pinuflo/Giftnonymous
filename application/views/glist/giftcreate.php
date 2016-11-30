<div id="kids_middle_container">

		<div class="kids_top_content">

			<div class="kids_top_content_head">

				<div class="kids_top_content_head_body"></div>

			</div><!-- .kids_top_content_head -->

			<div class="kids_top_content_middle">

				<div class="l-page-width">     
					<!-- .kids_posts_container -->
				</div>

			</div><!-- .kids_top_content_middle -->

			<div class="kids_top_content_footer"></div><!-- .end_middle_cloud -->

		</div><!-- .end_middle_cloud  -->

		<div class="bg-level-2-full-width-container kids_bottom_content">

			<div class="bg-level-2-page-width-container l-page-width no-padding">

				<section class="kids_bottom_content_container">

					<div class="header_container"> 

						<h1>Pages</h1>

						<ul id="breadcrumbs">
							<li><a href="index.html">Inicio</a></li>
							<li>Crear lista de regalos</li>
						</ul>

					</div>

					<div class="entry-container">

						<h1>Crear una lista de regalos:</h1>

						<!-- ***************** - START Columns - ***************** -->	

						<div class="full_width">							
							<p>
								<b>1.</b>Crea un listo de regalos.
								<br><b>2.</b>Completa los datos de envío.
								<br><b>3.</b>Envía tu lista de forma anónima.
								<br><b>4.</b>Te avisaremos cuando se haya respondido la lista.
								
								<br>
								<b>RECUERDA QUE LA LISTA SE ENVIARÁ DE FORMA ANÓNIMA. Recomendamos ser claros en el motivo de por qué
								   se está enviando la lista de regalo.</b>
							</p>	


						</div><!--/ full_width-->

						<div class="divider-content"></div>
						<div class="l-grid-7 l-float-left">

							<h1>Regalos en la lista:</h1>

							<div class="kids_clear"></div>
							<div class="box-toggle">
							   <b class="trigger">Agregar regalo a la lista</b>
								
						
								<div class="toggle_container" style="display: none;">
									<form action="<?php echo base_url(); ?>gift/add" method="post">
									<div class= "user-login type-2">	
										Nombre del Regalo:<input type="text" name="name">
										<br>Link de referencia: <input type="text" name="link">
										<br>
										<input type="submit" value="Listo" class="button rectangle static-button-style3"> </input>
									</div>
									<br><br><br>
									
									</form>							
								</div><!--/ toggle_container--> 

							</div>			
							<div id="content">	
							<?php if($glist) :?>
								<?php foreach($glist as $gift): ?>
									<div class="post-footer">
										
											<div class="post_cats l-float-left">
												<span><a href="<?php echo $gift['link'] ?>"> <?php echo $gift['name'] ?>:</a></span> 
												<a class="link" href="#">[Quitar de la lista]</a>
											</div><!--/ post-cats -->
		
											<div class="kids_clear"></div>				
										</div>
								<?php endforeach; ?>							
							<?php  endif; ?>
							</div>
						</div>
						
						
						<div class="l-grid-7 l-float-right">
							
							<?php if($error == 10) : ?>
							<div class="custom-box-wrap"><p class="custom-box-error">
								ERROR: No se han completado la información necesaria.
							</p><span class="close-box">×</span></div>
							<?php endif; ?>
							
							<?php if($error == 1) : ?>
							<div class="custom-box-wrap"><p class="custom-box-error">
								ERROR: La dirección de correo no es válida.
							</p><span class="close-box">×</span></div>
							<?php endif; ?>		
		
							<?php if($error == 2) : ?>
							<div class="custom-box-wrap"><p class="custom-box-error">
								ERROR: La lista de regalos está vacia.
							</p><span class="close-box">×</span></div>
							<?php endif; ?>			
							
							<?php if($error == 3) : ?>
							<div class="custom-box-wrap"><p class="custom-box-error">
								ERROR: Ambos correos son iguales.
							</p><span class="close-box">×</span></div>
							<?php endif; ?>																										

							<h1>Enviar Lista:</h1>
							


							<div class= "user-login type-2">
								<p>Una vez que hayas terminado de crear tu lista de regalos, llena los datos de contacto
								de la persona que quieres que elija los mejores regalos y tus datos personales para que
								podamos contactarte cuando te respondan tu lista.</p>     
							
										<form action="<?php echo base_url(); ?>gift/send" method="post">
										<br>Descripción o motivo de la lista: <br><input type="text" name="why" size="50">
										<br>Email Destino: <br><input type="text" name="recipent" size="50">
										<br>Email Origen: <br> <input type="text" name="sender" size="50"> 
										<br>
										<input type="submit" value="Enviar" class="button rectangle static-button-style3"> </input>
						
										<br><br><br>
										
										</form>								
							</div>                   
						
						
						</div>
						<div class="divider-content"></div>
						
						<div class="kids_clear"></div> 

					</div><!-- .entry-container -->

				</section><!-- .bottom_content_container -->

				<div id="bg-level-2-left" class="bg-level-2-left" style="width: 356.5px; left: -346.5px;"></div> <!-- .left_patterns -->
				<div id="bg-level-2-right" class="bg-level-2-right" style="width: 356.5px; right: -346.5px;"></div><!-- .right_patterns -->

			</div>

		</div>

	</div>

