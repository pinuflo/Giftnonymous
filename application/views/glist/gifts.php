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
							<li>Escoger regalos</li>
						</ul>

					</div>

					<div class="entry-container">


						<!-- ***************** - START Columns - ***************** -->	

						<div class="full_width">							
							<h1>Escoje los regalos que más te gustan:</h1>
							<p>Enumera tus preferencias del 0 al 5, donde 0 significa que un regalo no te gusta nada y
							5 significa que un regalo te encanta. </p>
							
							<form action="<?php echo base_url(); ?>gifts/send" method="post">
							<?php if($gifts) :?>
								<input type="hidden" name="gift_id" value="<?php echo $gifts->id  ?>">
								<input type="hidden" name="key" value="<?php echo $gifts->secondkey ?>">
								<?php foreach($gifts->ownGift as $gift): ?>
									<div class="post-footer">
										
											<div class="post_cats l-float-left">
												<span><?php echo $gift->name; ?>:</a></span> 
												<br>
												<ul>
													<li><b>Link de referencia:</b> <a href="<?php  echo $gift->url; ?>" >[Click aca para ir]</a></li>
													<li><b>Preferencia:</b> <select name="preference<?php echo $gift->id ?>" >
																			  <option value="0">0</option>
																			  <option value="1">1</option>
																			  <option value="2">2</option>
																			  <option value="3">3</option>
																			  <option value="4">4</option>
																			  <option value="5">5</option>
																			</select></li>		
													<li><b>Comentario:</b>  <input type="text" name="comment<?php echo $gift->id ?>" size="100%" height="300"> </input> </li>																
												</ul>
											</div><!--/ post-cats -->
		
											<div class="kids_clear"></div>				
										</div>
								<?php endforeach; ?>							
							<?php  endif; ?>	
							<input type="submit" value="Guardar Cambios" class="button rectangle static-button-style3"> </input>
							</form>		

						</div><!--/ full_width-->
						

					</div><!-- .entry-container -->

				</section><!-- .bottom_content_container -->

				<div id="bg-level-2-left" class="bg-level-2-left" style="width: 356.5px; left: -346.5px;"></div> <!-- .left_patterns -->
				<div id="bg-level-2-right" class="bg-level-2-right" style="width: 356.5px; right: -346.5px;"></div><!-- .right_patterns -->

			</div>

		</div>

	</div>
