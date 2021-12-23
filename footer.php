<?php wp_footer() ?>

<script>

document.addEventListener('DOMContentLoaded', () => {

// Get all "navbar-burger" elements
const $navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);

// Check if there are any navbar burgers
if ($navbarBurgers.length > 0) {

  // Add a click event on each of them
  $navbarBurgers.forEach( el => {
    el.addEventListener('click', () => {

      // Get the target from the "data-target" attribute
      const target = el.dataset.target;
      const $target = document.getElementById(target);

      // Toggle the "is-active" class on both the "navbar-burger" and the "navbar-menu"
      el.classList.toggle('is-active');
      $target.classList.toggle('is-active');

    });
  });
}

});

</script>

<footer>
        <div class="p-3 has-background-info container is-max-desktop">
            <div class="footer-logo">
            <a class="navbar-item logo-footer" href="<?= bloginfo( 'url' ) ?>">
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
            </div>
            <div class="footer-nav">
                <nav>
                    <?php 
                        wp_nav_menu(array( 
                            'theme_location' => 'footer-menu',
                            // 'add_li_class' => 'mb-4',
                        ));
                    ?>
                </nav>
            </div>
        </div>
    </footer>
</body>

</html>