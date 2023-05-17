<?php

// Yoast pagination canonical fix
function my_custom_canonical_url( $canonical_url ) {
    $paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;

    if ( $paged > 1 ) {
        $canonical_url = trailingslashit( get_pagenum_link( $paged ) );
    }
    return $canonical_url;
}
add_filter( 'wpseo_canonical', 'my_custom_canonical_url' );

// Yoast rel="prev" and rel="next" fix
function rel_next_prev(){
    global $paged;

    if ( get_previous_posts_link() ) { ?>
        <link rel="prev" href="<?php echo get_pagenum_link( $paged - 1 ); ?>" /><?php
    }

    if ( get_next_posts_page_link() ) { ?>
        <link rel="next" href="<?php echo get_pagenum_link( $paged + 1 ); ?>" /><?php
    }

}
add_action( 'wp_head', 'rel_next_prev' );
