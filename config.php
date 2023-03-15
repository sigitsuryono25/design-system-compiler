<?php

/**
 * if this value is TRUE, you have to include this lib into android project
 * and make the specific file first. That shown on main constructor below. 
 **/
define('USING_ANDROID_OUTPUT', FALSE);
class Config
{
    public $colorsResourcePath = '';
    public $stringsResourcePath = '';
    public $dimensResourcePath = '';
    public $fontDimensResourcePath = '';
    public $stylesResourcePath = '';
    public $integersResourcePath = '';
    public $color = array("color", "colors");
    public $dimens = array("lineHeights");
    public $fontDimens = array("fontSizes");

    public $globalIntegers = array("fontWeights");
    public $typography = array("typography");
    public $textAppeareance = array(
        "fontFamily" => "android:fontFamily",
        "lineHeight" => "lineHeight",
        "fontSize" => "android:textSize",
        "fontWeight" => array(
            "prop" => "android:fontWeight,android:textFontWeight,fontWeight", //using comma to seperate the prop
            "tools" => 'tools:targetApi="o",tools:targetApi="p",' //using comma to seperate the prop
        ),
    );
    public $styleRef = array(
        "fontFamily" => "@font",
        "lineHeight" => "@dimen",
        "fontSize" => "@dimen",
    );

    public function __construct()
    {
        error_reporting(0);
        $this->colorsResourcePath = (USING_ANDROID_OUTPUT) ? "../app/src/main/res/values/colors.xml" : 'output/colors.xml';
        $this->stringsResourcePath = (USING_ANDROID_OUTPUT) ? "../app/src/main/res/values/strings.xml" : 'output/strings.xml';
        $this->dimensResourcePath = (USING_ANDROID_OUTPUT) ? "../app/src/main/res/values/dimens.xml" : 'output/dimens.xml';
        $this->fontDimensResourcePath = (USING_ANDROID_OUTPUT) ? "../app/src/main/res/values/fontDimens.xml" : 'output/fontDimens.xml';
        $this->stylesResourcePath = (USING_ANDROID_OUTPUT) ? "../app/src/main/res/values/styles.xml" : 'output/styles.xml';
        $this->integersResourcePath = (USING_ANDROID_OUTPUT) ? "../app/src/main/res/values/integers.xml" : 'output/integers.xml';
    }
}
