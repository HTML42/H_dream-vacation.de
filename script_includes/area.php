<?php

$area = null;
$existing_areas = array('www', 'nature');
if (preg_match('/(\w+)\.dream-vacation.\w+/is', $_SERVER['SERVER_NAME'], $area_match)) {
    $area = $area_match[1];
}
//
if (ENV != 'live') {
    $area = trim(strtolower($_COOKIE['area']));
    if (isset($_GET['area']) && is_string($_GET['area']) && strlen($_GET['area']) > 1) {
        $area = trim(strtolower($_GET['area']));
    } else if (isset($_COOKIE['area']) && is_string($_COOKIE['area']) && strlen($_COOKIE['area']) > 1) {
        $area = trim(strtolower($_COOKIE['area']));
    }
}
//
if (!in_array($area, $existing_areas)) {
    $area = 'www';
}
define('AREA', $area);

//#Resorts:
$resorts = array();
if (AREA == 'www') {
    get_all_resorts($resorts);
} else {
    get_resorts(AREA, $resorts);
}

//
function get_resort_areas() {
    $resort_folder = PROJECT_ROOT . 'resorts/';
    $resort_areas = array();
    foreach (Utilities::ls($resort_folder) as $resort_folder_subfoldername) {
        if (is_dir($resort_folder . $resort_folder_subfoldername)) {
            array_push($resort_areas, $resort_folder_subfoldername);
        }
    }
    return $resort_areas;
}

function get_all_resorts(&$resorts) {
    foreach (get_resort_areas() as $resort_area) {
        $resorts[$resort_area] = array();
        get_resorts($resort_area, $resorts[$resort_area]);
    }
}

function get_resorts($area_name, &$resorts) {
    $resorts_folder = PROJECT_ROOT . 'resorts/' . $area_name . '/';
    if (is_dir($resorts_folder)) {
        foreach (Utilities::ls($resorts_folder, true) as $resort_filename) {
            $resort_filepath = $resorts_folder . $resort_filename;
            $resort_filename_clean = str_replace('.json', '', $resort_filename);
            $File_resort = File::instance($resort_filepath);
            if ($File_resort->exists) {
                $resorts[$resort_filename_clean] = $File_resort->get_json();
            }
        }
    }
}

function _href($resort, $area = null) {
    if (is_string($resort) && strlen($resort) > 2) {
        if (!is_string($area)) {
            $area = AREA;
        }
        $area = trim(strtolower($area));
        $resort = trim(strtolower($resort));
        $url_end = LANG . '/' . $resort . '.html';
        if (ENV == 'live') {
            return 'https://' . $area . '.dream-vacation.de/' . $url_end;
        } else {
            return BASEURL . $url_end . '?area='  .$area;
        }
    }
    return '#404-not-found';
}

//
define('RESORTS', $resorts);
