<?php

namespace App\Controllers;

class FilemanagerController extends BaseController {

    public static function list ($folder = '') {
        $list = scandir(BASE_DIR . '/public/images/' . $folder);

        self::loadView('/filemanager/list', [
            'list' => $list,
        ]);
    }
    
    public static function delete($folder) {
        $list = scandir(BASE_DIR . '/public/images/' . $folder);
        
    }
}