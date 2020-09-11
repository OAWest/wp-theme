<?php
/**!
 * Featured Images
 */

 // Returns a features image block if the post has one
 // Used by  index.php, page.php, and sidebar.php
function get_featured_image(){
	if ( has_post_thumbnail() ) {
		$images = array(
			esc_url(get_permalink()),
			esc_url(get_the_post_thumbnail_url(null,'medium')), // 300px x 300px
			esc_url(get_the_post_thumbnail_url(null,'medium_large')), // 768px x 768px
			esc_url(get_the_post_thumbnail_url(null,'large')) // 1024px x 1024px
		);
		echo "
		<a class='post-link' href='$images[0]'>
		<img srcset='
			$images[3] 1024w,
			$images[2] 768w,
			$images[1] 300w'
			src='$images[2]'
			width='100%'
		></a>";
	}
}
?>