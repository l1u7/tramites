<?php get_header() ?>     

	    <!-- Artículo -->
		<section class="section">
        <div class="container is-max-desktop">

            <div class="columns is-multiline">    

                <article class="column is-8-desktop is-12 mb-5 contenido">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1 class="title"><?php the_title() ?></h1>
					<?php the_content( ); endwhile; endif; ?>
                </article>

                <aside class="column is-4-desktop is-12 mb-5 pl-6 targetas"> 

                    <?php get_template_part( 'partes/lateral', 'azar' ) ?>

                </aside>

            </div>

        </div>
    </section><!-- Artículo --> 

<?php get_footer() ?>
 
        	