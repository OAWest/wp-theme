<?php
/**!
 * Pagination
 */

// Start Pagination
function bittersweet_pagination() {

    global $wp_query;
    $big = 999999999; // need an unlikely integer
    $pages = paginate_links( array(
        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
        'format' => '?paged=%#%',
        'current' => max( 1, get_query_var('paged') ),
        'total' => $wp_query->max_num_pages,
        'type'  => 'array',
    ) );
    if( is_array( $pages ) ) {
        $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
        echo '<hr><br><ul class="pagination justify-content-center">';
        foreach ( $pages as $page ) {
            if(strpos($page, 'current') !== false){
                echo '<li class="page-item active">'.str_replace( "page-numbers", 'page-link', $page )."</li>";
            }
            else{
                echo '<li class="page-item">'.str_replace( "page-numbers", 'page-link', $page )."</li>";
            }
        }
        echo '</ul>';
    }
}
// End Pagination

?>