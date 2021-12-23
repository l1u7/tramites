<?php
    // Traer 5 post al azar
    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => 5,
        'orderby' => 'rand',
    );
    $query = new WP_Query( $args );
 


?>

<div class="columns is-multiline targetas">  

    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();  ?>
    <div class="column is-12">
        <article>
            <a href="<?php the_permalink() ?>">
                <figure class="image is-2by1 redondear">
                    <img src="<?= get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" loading="lazy" alt="<?php the_title(); ?>">
                </figure>
                <h3 class="is-size-6 pt-2 has-text-weight-light has-text-centered"><?php the_title(); ?></h3> 
            </a>
        </article> 
    </div>
    <?php endwhile; endif; ?>
    
</div>

