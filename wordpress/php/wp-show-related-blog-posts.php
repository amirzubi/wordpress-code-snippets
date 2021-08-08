<?php
// 1. Add the following code snippet
if ( ! function_exists( 'related_posts' ) ) :

function related_posts() {
global $post;
if($post) {
 $post_id = get_the_ID();
} else {
 $post_id = null;
}
$orig_post = $post;
$categories = get_the_category($post->ID);
if ($categories) {
$category_ids = array();
foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
$args=array(
'category__in' => $category_ids,
'post__not_in' => array($post->ID),
'posts_per_page'=> 3, // Number of related posts that will be shown.

'ignore_sticky_posts'=>1
);
$my_query = new wp_query( $args );
if( $my_query->have_posts() )  {
echo '<div class="related-wrap">';
echo '<h4 class="entry-related">';
_e('Related Posts','evolution');
echo '</h4>';
echo '<div class="related-posts">';
$c = 0; while( $my_query->have_posts() ) {
$my_query->the_post(); $c++;
if( $c == 3) {
    $style = 'third';
    $c = 0;
}
else $style=''; ?>
<article class="entry-item <?php echo $style; ?>">
<div class="entry-thumb">
<a href="<?php the_permalink($post->ID); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail( 'evolution-medium' ); ?></a>
    </div>
<div class="content">
<?php if ( ! empty( $categories ) ) {
    echo '<span class="cat"><i class="icon-folder-open" aria-hidden="true"></i> <a href="' . esc_url( get_category_link( $categories[0]->term_id ) ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';
} ?>
<header>
<h4 class="entry-title"><a href="<?php the_permalink($post->ID); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
</header>
</div><! – content – >
</article><! – entry-item – >
<?php
}
echo '</div></div>';
echo '<div class="clear"></div>';
}
}
$post = $orig_post;
wp_reset_postdata();
}
endif;

// 2. Add the following line to your post loop file, which should be single.php in most cases
<?php related_posts(); ?>

// 3. Add the following lines to your CSS
.related-posts {
    display: flex;
}
.related-posts .entry-title {
    font-size: 1rem;
}
.related-posts .cat {
    color: #ba9e30;
    font-size: 0.85rem;
}
.related-posts .entry-item {
    width: 31%;
    margin-right: 3.5%;
    position: relative;
    float: left;
}
.related-posts .entry-item.third {
    margin-right: 0;
}
.related-posts a img:hover {
    opacity: .85;
}
.entry-related {
    padding-bottom: 10px;
    border-bottom: 1px solid #ddd;
    margin-bottom: 20px
}
.related-wrap {
    margin-bottom: 70px;
}