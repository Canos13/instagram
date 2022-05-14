<?php

    namespace Cano\Instagram\lib;

    class UtilImages{
        public static function storeImage($photo){
            $target_dir = "public/img/photos/";
            $extarr = explode('.', $photo["name"]);
            $filename = $extarr[sizeof($extarr)-2];
            $ext = $extarr[sizeof($extarr)-1];
            $hash = md5(Date('Ymdgi').$filenamee) . '.' . $ext;
            $target_file = $target_dir . $hash;
            $upLoadOk = 1;
        }
    }


?>