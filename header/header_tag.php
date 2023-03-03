<?php

class Headertag
{

    public function globalHeader()
    {
        return '<?xml version="1.0" encoding="utf-8"?>' . PHP_EOL . '<resources>' . PHP_EOL . '<!-- Do not edit directly edit. -->' . PHP_EOL;
    }

    public function fontResourceHeader()
    {
        echo '<?xml version="1.0" encoding="utf-8"?>
        <font-family xmlns:android="http://schemas.android.com/apk/res/android"
            xmlns:app="http://schemas.android.com/apk/res-auto">
            
            <!--
            Do not edit directly
            Generated on Tue, ' . date('d/m/Y') . '
            -->
        ';
    }

    public function fontResourceFooter()
    {
        echo '</font-family>';
    }

    public function globalFooter()
    {
        echo '</resources>';
    }
}
