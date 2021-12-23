<?php get_header() ?>

<!-- Buscador -->
<section class="section">
        <div class="container is-max-desktop"> 
            <h2 class="is-size-2 mb-3">Resultados de: <?= get_search_query(); ?></h2>

            <form class="field" method="get" action="<?php bloginfo( 'url' )  ?>">  
                <div class="control has-icons-right">
                    <input class="input is-medium is-rounded buscador-color" type="text" name="s" placeholder="Buscar tramite">
                    <span class="icon is-right">
                        <img src="<?= get_template_directory_uri() ?>/assets/img/buscando.svg" alt="" width="18"> 
                    </span>
                </div>
            </form>
        </div>
    </section><!-- Buscador -->

<div class="container is-max-desktop"> 
            <section class="listado"> 
                <?php get_template_part( 'partes/targetas', 'global' ) ?>

            </section>

            <section class="section">
                <?php get_template_part('partes/paginacion') ?>
            </section> 
</div>

<?php get_footer() ?>