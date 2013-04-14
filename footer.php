</div><!-- /.container -->
<!-- FOOTER -->
<hr>
<div id="social" >
	<a href="<?php echo get_option('twitter');?>">Siga-nos no twitter</a><br/>
	<a href="<?php echo get_option('facebook');?>">Adicione nosso Facebook</a>
</div>
<div id="footer">
	<div  id="form_contato" class="span5">
		<p id="response"></p>
		<form action="<?php echo bloginfo('url')?>/wp-admin/admin-ajax.php" method="POST" class="form-horizontal form_contato">
			<input type="hidden" name="action" value="enviarContato" />
				<legend>Entre em Contato</legend>
			<fieldset>
				<div class="control-group">
	    			<label class="control-label" for="nome">Nome</label>
				    <div class="controls">
				      <input type="text" id="nome" name="nome" placeholder="nome completo" />
				    </div>
	  			</div>
	  			<div class="control-group">
	    			<label class="control-label" for="email" >Email</label>
				    <div class="controls">
				      <input type="email" id="email" name="email" placeholder="example@example.com" />
				    </div>
	  			</div>

	  			<div class="control-group">
	    			<label class="control-label" for="mensagem" >Mensagem</label>
				    <div class="controls">
				      <textarea rows="5" name="mensagem" placeholder="Mensagem..." ></textarea>
				    </div>
	  			</div>

	  			<div class="span5">
				  <input type="submit" class="btn btn-primary" value="Enviar"/>
				</div>
			
			</fieldset>
		</form>
	</div>
	<div id="texto-footer" class="span10">
		<footer>
			<!-- <p class="pull-right"><a href="#">Back to top</a></p> -->
			<p>&copy; 2013 EncontreJP &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
		</footer>
	</div>
</div>
    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?=get_template_directory_uri()?>/bootstrap/js/bootstrap.js"></script>
	<?/*
	<script type="text/javascript" src="http://twitter.github.com/bootstrap/assets/js/bootstrap-transition.js"></script>
    */?>
    <script type="text/javascript" src="<?=get_template_directory_uri()?>/js/jquerytools-1-2-7.min.js"></script>
    <script type="text/javascript" src="<?=get_template_directory_uri()?>/js/fancybox-2-1-4.min.js"></script>
    <script type="text/javascript" src="<?=get_template_directory_uri()?>/js/jquery.validate.min.js"></script>
    <script type="text/javascript" src="<?=get_template_directory_uri()?>/js/jquery.form.js"></script>
    <script type="text/javascript" src="<?=get_template_directory_uri()?>/js/scripts.js"></script>

  </body>
</html>