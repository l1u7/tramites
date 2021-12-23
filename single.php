<?php get_header() ?>     

	    <!-- Artículo -->
		<section class="section">
        <div class="container is-max-desktop">

            <div class="columns is-multiline">    

                <article class="column is-8-desktop is-12 mb-5 contenido">
					<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1 class="title"><?php the_title() ?></h1>
					<?php the_content( ); endwhile; endif; ?>

                    <!-- Siguiente y anterior post -->
                    <nav class="pagination" role="navigation" aria-label="pagination"> 
                        <?php if(get_next_post_link()): ?> 
                            <?php next_post_link('%link', 'Anterior'); ?>
                        <?php endif;?> 
                                
                        <?php if(get_previous_post_link()): ?>
                            <?php previous_post_link('%link', 'Siguiente'); ?>  
                        <?php endif;?> 
                    </nav><!-- Siguiente y anterior post -->
                    
                    <?php
                    // If comments are open or there is at least one comment, load up the comment template.
                        if ( comments_open() || get_comments_number() ) {
                            comments_template();
                        }
                    ?>
                </article>

                <aside class="column is-4-desktop is-12 mb-5 pl-6 targetas"> 

                    <!-- Buscador -->
                    <form class="field mb-4" method="get" action="<?php bloginfo( 'url' )  ?>">  
                        <div class="control has-icons-right">
                            <input class="input is-rounded buscador-color" type="text" name="s" placeholder="Buscar tramite">
                            <span class="icon is-right">
                                <img src="<?= get_template_directory_uri() ?>/assets/img/buscando.svg" alt="" width="18"> 
                            </span>
                        </div>
                    </form>
                    <!-- Buscador -->
                    
                    <?php get_template_part( 'partes/lateral', 'azar' ) ?>

                </aside>

            </div>

        </div>
    </section><!-- Artículo --> 

<?php get_footer() ?>


        	