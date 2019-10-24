<?php

namespace App\FileLoader;

class IniFileLoader extends AbstractFileLoader
{
    /**
     * Parses env File
     *
     * @return array|false
     */
    public function load()
    {
        $content = getenv($this->file, true);
        dd($content);
        return $content;
    }
}
