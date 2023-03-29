<?php

/**
 * Return bool for button text.
 *
 * @param [string] $key link array key.
 * @param [array]  $array link array.
 * @author jomurgel <jo@webdevstudios.com>
 * @since NEXT
 *
 * @return bool
 */
function astrolab_master_has_array_key($key, $array = array())
{

    if (!is_array($array) || (!$array || !$key)) {
        return false;
    }

    return is_array($array) && array_key_exists($key, $array) && !empty($array[$key]);
}
