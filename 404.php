<?php get_header() ?> 

<section class="section">
    <div class="container is-max-desktop">
        <span class="is-size-3 has-text-centered">¡La página que busca no existe!</span>
        <hr>
    </div>    

    <!-- Últimas Entradas -->
    <section>
    
        <div class="container is-max-desktop">
            
            <span class="is-size-3 p-4 mb-4 has-text-centered is-block">Últimas entradas</span>

            <?php get_template_part( 'partes/targetas' ) ?>

        </div>
    </section><!-- Últimas Entradas -->    
</section>

<?php get_footer() ?>