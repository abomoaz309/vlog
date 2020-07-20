<?php

function is_active(string $routeName) {
    return (request()->segment(2)  !== null && request()->segment(2) === $routeName ? 'active' : '');
}

function getYoutubeID($url) {
    preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $url, $matches);
    return isset($matches[1]) ? $matches[1] : null;
}
