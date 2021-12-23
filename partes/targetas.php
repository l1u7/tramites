<?php 
    $post_por_blog = get_option( 'posts_per_page' );
    $query = new WP_Query( array( 'posts_per_page' => $post_por_blog ) ); 
?>

<div class="columns is-multiline targetas">  

    <?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post();  ?>
    <div class="column is-3-desktop is-6-tablet mb-5">
        <article>
            <a href="<?php the_permalink() ?>">
                <figure class="image is-5by4 redondear">
                    <img src="<?= get_the_post_thumbnail_url( get_the_ID(), 'large' ); ?>" loading="lazy" alt="<?php the_title(); ?>">
                </figure>
                <h3 class="is-size-5 p-3"><?php the_title(); ?></h3> 
            </a>
        </article> 
    </div>
    <?php endwhile; endif; ?>
    
</div>