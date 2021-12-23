<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
	<?php wp_head() ?>

</head>

<body>
    <header class="has-background-info">

        <!-- Navbar -->
        <nav class="navbar container is-max-desktop is-info" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <a class="navbar-item" href="<?= bloginfo( 'url' ) ?>">
                    <?php
                        $custom_logo_id = get_theme_mod( 'custom_logo' );
                        $logo = wp_get_attachment_image_src( $custom_logo_id , 'full' );
                         
                        if ( has_custom_logo() ) {
                            echo '<img src="' . esc_url( $logo[0] ) . '" alt="' . get_bloginfo( 'name' ) . '">';
                        } else {
                            echo '<h1>' . get_bloginfo('name') . '</h1>';
                        }
                    ?>
                </a>

                <a role="button" class="navbar-burger" aria-label="menu" aria-expanded="false"
                    data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu"> 

                <div class="navbar-end"> 
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Categorias
                        </a>

                        <div class="navbar-dropdown">
                        <?php $categories = get_categories(); 
                            foreach($categories as $category):
                        ?>      
                        <a href="<?= get_category_link($category->term_id) ?>" class="navbar-item"><?= $category->name ?></a>
                        <?php endforeach;?> 
                        </div>
                    </div>
                </div>
            </div>
        </nav><!-- Navbar -->

    </header>