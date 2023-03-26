<?php

/**
 * Estimated Reading time.
 *
 * @return string
 */

function reading_time()
{
    $content = get_post_field('post_content', get_the_id());
    $word_count = str_word_count(strip_tags($content));
    $readingtime = ceil($word_count / 200);
    if ($readingtime == 1) {
        $timer = " minute";
    } else {
        $timer = " minutes";
    }
    $totalreadingtime = $readingtime . $timer;
    return $totalreadingtime;
}
