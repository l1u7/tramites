<?php

function paginacion () { 
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
 

    if ( is_category()) {
        $categoria_nombre = single_term_title("", false);        
        $custom_query = new WP_Query( [ 
            'paged' => $paged,
            'category_name' => $categoria_nombre
        ]); 
  
    } else if(is_author()) {
        $author = get_user_by( 'slug', get_query_var( 'author_name' ) );
        $custom_query = new WP_Query( [ 
            'paged' => $paged,
            'author' => $author->ID
        ]);
    } else if(is_search()) {
        $custom_query = new WP_Query([
            'paged' => $paged,
            's' => get_search_query()
        ]);
    } else {
        $custom_query = new WP_Query( [ 'paged' => $paged ] );
    }

    
    $paginas = $custom_query->max_num_pages; 

    $siguiente = $paged + 1;
    $anterior = $paged - 1;
    $primero = 1;
    $ultimo = $paginas;

    $links_html = '';
    $siguiente_anterior = ''; 

    if ( $paginas <= 1 ) {
        return;
    } else if ( $paginas < 6 ) {
        foreach ( range(1, $paginas) as $elemento ) {
            if($elemento == $paged) {
                $links_html  .= '<li><a class="pagination-link button is-info" href="' . get_pagenum_link( $elemento ) . '">'. $elemento .'</a></li>';
                continue;
            }

            $links_html  .= '<li><a class="pagination-link button is-info is-light" href="' . get_pagenum_link( $elemento ) . '">'. $elemento .'</a></li>';

        } 

    } else {

        $casillas = [$paged - 2, $paged - 1, $paged, $paged + 1 , $paged + 2 ];

        if($casillas[0] > 0 ) {
            $links_html  .= '<li><a class="pagination-link button is-info is-light" href="' . get_pagenum_link( $primero ) . '">'. $primero .'</a></li>';
            $links_html  .= '<li><span class="pagination-ellipsis">&hellip;</span></li>';
        }

        foreach ($casillas as $elemento) {
            
            if( $elemento >= 1 && $elemento <= $paginas ) {

                if ( $elemento == $paged ) {
                    $links_html  .= '<li><a class="pagination-link button is-info" href="' . get_pagenum_link( $elemento ) . '">'. $elemento .'</a></li>';
                } else {
                    $links_html  .= '<li><a class="pagination-link button is-info is-light" href="' . get_pagenum_link( $elemento ) . '">'. $elemento .'</a></li>';
                }

            }

        }

        if($casillas[4] < $paginas ) {
            $links_html  .= '<li><span class="pagination-ellipsis">&hellip;</span></li>';
            $links_html  .= '<li><a class="pagination-link" href="' . get_pagenum_link( $ultimo ) . '">'. $ultimo .'</a></li>';
        }
    }

    if ( $paged != 1 && $paged != $paginas ) {
        $siguiente_anterior .= '<a class="pagination-previous button is-info is-light" href="' . get_pagenum_link( $anterior ) . '">Anterior</a>';
        $siguiente_anterior .= '<a class="pagination-next button is-info is-light" href="' . get_pagenum_link( $siguiente ) . '">Siguiente</a>';
    } else if ( $paged == 1 ) {
        $siguiente_anterior .= '<a class="pagination-next button is-info is-light" href="' . get_pagenum_link( $siguiente ) . '">Siguiente</a>';
    } else {
        $siguiente_anterior .= '<a class="pagination-previous button is-info is-light" href="' . get_pagenum_link( $anterior ) . '">Anterior</a>';
    }

    echo '<nav class="pagination" role="navigation" aria-label="pagination">
            '. $siguiente_anterior .'
            <ul class="pagination-list">
            '. $links_html .'            
            </ul>
        </nav>';
}

paginacion();