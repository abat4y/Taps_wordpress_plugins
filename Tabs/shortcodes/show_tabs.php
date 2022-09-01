<?php

function tab_filter_shortcode( $atts, $content = null ){
//shortcode_atts
  $atts         =   shortcode_atts([
    'category_slug'    =>  '',
    'tabs_per_page'    =>  '5',
    //DESC , ASC
    'order'    =>    'DESC',
  ], $atts);
  $category_slug = $atts['category_slug'];
if($category_slug == ''){
    $the_query = new WP_Query( array(
        'post_type' => 'tab',
        'posts_per_page' => $atts['tabs_per_page'],
        'order'=> $atts['order'],
    ) );
}else{
    $the_query = new WP_Query( array(
        'post_type' => 'tab',
        'posts_per_page' => $atts['tabs_per_page'],
        'order'=> $atts['order'],
        'tax_query' =>array(
            array (
                'taxonomy' => 'tabs_catogries',
                'field' => 'slug',
                'terms' => $category_slug,
            )
            )
    ) );
}
$html= '<div class="tab">';
if($the_query->have_posts()){
    while ($the_query->have_posts() ) :
        $the_query->the_post();
        $title = get_the_title();
        $postId = get_the_ID();
        $slug = basename(get_permalink($postId));
        $content= get_the_content();
        $html .= '<button class="tablinks" onclick="openCity(event, `'.$slug.'`)" id="defaultOpen">'.$title.'</button>';
        if(($the_query->current_post + 1) == $the_query->post_count) $html .='</div>';
    endwhile;
    while ($the_query->have_posts() ) :
        $the_query->the_post();
        $postId = get_the_ID();
        $slug = basename(get_permalink($postId));
        $content= get_the_content();
        $html .= '<div id="'. $slug. '" class="tabcontent">'.$content.'</div>';
    endwhile;
    wp_reset_postdata();
}else{
    $html = "<p class='no_posts'>There are no tabs now </p>";
}

  return $html;
}