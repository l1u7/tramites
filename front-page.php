<?php get_header() ?> 

    <!-- Buscador Home -->
    <section class="section pb-0">
        <div class="container is-max-desktop"> 
            <h1 class="is-size-3 mb-5 has-text-centered has-text-weight-bold">
                <?php if ( have_posts() ) : 
                    while ( have_posts() ) : the_post(); 
                        the_title( );
                    endwhile; 
                endif;?>
            </h1>

            <form class="field" method="get" action="<?php bloginfo( 'url' )  ?>">  
                <div class="control has-icons-right">
                    <input class="input is-medium is-rounded buscador-color" type="text" name="s" placeholder="Buscar tramite">
                    <span class="icon is-right">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/buscando.svg" alt="" width="18"> 
                    </span>
                </div>
            </form>
        </div>
    </section><!-- Buscador Home -->

    <!-- Últimas Entradas -->
    <section class="section pb-0">
        <div class="container is-max-desktop">

            <?php get_template_part( 'partes/targetas' ) ?>

        </div>
    </section><!-- Últimas Entradas -->    

    <!-- Contenido -->
    <section class="section contenido pt-0 pb-3">
        <div class="container is-max-desktop"> 
        <?php 
            if ( have_posts() ) : 
                while ( have_posts() ) : the_post(); 
                    the_content( );
                endwhile; 
            endif; 
        ?>
        </div>
    </section><!-- Contenido -->

<?php get_footer() ?>