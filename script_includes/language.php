<?php

$language = null;
$request_folder = strtolower(Request::$requested_clean_path_array[0]);
if(in_array($request_folder, array('de', 'en'))) {
    $language = $request_folder;
}

define('LANG', $language);

if(LANG != 'en') {
    Utilities::redirect(BASEURL . 'en/index.html', 301);
}