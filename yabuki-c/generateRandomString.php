<?php

function generateRandomString($length, $elem = false) {
    if ($length <= 0) {
        return '';
    }

    if ($elem === false) {
        $elem = 'abcdefghijklmnopqrstuvwxyz1234567890';
    }

    if (!preg_match('/\A[\x21-\x7e]+\z/', $elem)) {
        die('ランダム生成のための文字列に不正な文字が含まれています。');
    }
    $chars = preg_split('//', $elem, -1, PREG_SPLIT_NO_EMPTY);

    $chars = array_unique($chars);

    mt_srand((double) microtime() * 10000000);

    $str = '';
    $maxIndex = count($chars) - 1;
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[mt_rand(0, $maxIndex)];
    }

    return $str;
}

/* ?>終了宅省略 */