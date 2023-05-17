<?php

// Yoast pagination fix
function my_custom_canonical_url( $canonical_url ) {
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

    if ( $paged > 1 ) {
        $canonical_url = trailingslashit( get_pagenum_link( $paged ) );
    }
    return $canonical_url;
}
add_filter( 'wpseo_canonical', 'my_custom_canonical_url' );
