
<?php $contato = get_page_by_title('contato')->ID; ?>
<style>
	.quebra {
	background: url("<?php the_field('background_footer', $contato)?>") no-repeat center;
	background-size: cover;
}
</style>
<div class="quebra">
			<blockquote class="quote-externo container">
				<p><?php the_field('frase_footer', $contato) ?></p>
				<cite><?php the_field('autor_footer', $contato) ?></cite>
			</blockquote>
</div>

<footer>
			<div class="footer">
				<div class="container">

					<div class="grid-8 footer_historia">
						<h3>Nossa História</h3>
						<p><?php the_field('resumo_historia', $contato); ?></p>
					</div>

					<div class="grid-4 footer_contato">
						<h3>Contato</h3>
						<ul>
							<li>- <?php the_field('telefone', $contato); ?></li>
							<li>- <?php the_field('email', $contato); ?></li>
							<li>- <?php the_field('endereco1', $contato); ?></li>
							<li>- <?php the_field('endereco2', $contato); ?></li>
						</ul>
					</div>

					<div class="grid-4 footer_redes">
						<h3>Redes Sociais</h3>
						<?php include(TEMPLATEPATH . "/inc/redes-sociais.php");  ?>
					</div>

				</div>
			</div>

			<div class="copy">
				<div class="container">
					<p class="grid-16"><?php bloginfo('name')?> <?php echo date('Y') ?> - Alguns direitos reservados.</p>
				</div>
			</div>
		</footer>

	<!-- JavaScript -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script>window.jQuery || document.write('<script src="js/libs/jquery-1.11.2.min.js"><\/script>')</script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/plugins.js"></script>
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/main.js"></script>
	<!-- JavaScript -->

	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

	  ga('create', 'UA-60088262-1', 'auto');
	  ga('send', 'pageview');

	</script>
    <?php wp_footer(); ?>
	</body>
</html>