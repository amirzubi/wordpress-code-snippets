<?php
function insert_ads_in_post($content) {
    if (!is_single()) return $content;  // show ads only on post pages
    $paragraphs = explode("</p>", $content);
    $paragraphs_count = count($paragraphs);
    $content_with_ads = "";
    $ad_code = "**YOUR AD CODE**";
    for ($i = 0; $i < $paragraphs_count; $i++) {
        // show 4 ads when more than 30 paragraphs
        if ($paragraphs_count > 30) {
            if ($i === absint(floor($paragraphs_count/5))
                || $i === absint(floor($paragraphs_count/5*2))
                || $i === absint(floor($paragraphs_count/5*3))
                || $i === absint(floor($paragraphs_count/5*4))) {
                $content_with_ads .= $ad_code;
            }
        } else {    // show 3 ads
            if ($i === absint(floor($paragraphs_count/4))
                || $i === absint(floor($paragraphs_count/4*2))
                || $i === absint(floor($paragraphs_count/4*3))) {
                $content_with_ads .= $ad_code;
            }
        }
        $content_with_ads .= $paragraphs[$i] . "</p>";
    }
    return $content_with_ads;
}
add_filter("the_content", "insert_ads_in_post");
?>