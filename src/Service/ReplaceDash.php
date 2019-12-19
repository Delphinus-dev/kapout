<?php


namespace App\Service;


class ReplaceDash
{
    public function replaceDash(ApiGet $apiGet){

        foreach ($apiGet as $k => $v) {
            $apiGet[str_replace('-','',$k)] = $apiGet[$k];
            if (is_array($v)) {
                foreach($v as $ke => $va) {
                    $v[str_replace('-','',$ke)] = $v[$ke];
                }
            }
        }

        return $apiGet;
    }

}