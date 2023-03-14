<?php
class Config
{
    public function __construct()
    {
        error_reporting(0);
    }
    public $colorsResourcePath = "../app/src/main/res/values/colors.xml";
    public $stringsResourcePath = "../app/src/main/res/values/strings.xml";
    public $dimensResourcePath = "../app/src/main/res/values/dimens.xml";
    public $fontDimensResourcePath = "../app/src/main/res/values/fontDimens.xml";
    public $stylesResourcePath = "../app/src/main/res/values/styles.xml";
    public $integersResourcePath = "../app/src/main/res/values/integers.xml";
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
            "prop" => "android:fontWeight,android:textFontWeight,fontWeight",
            "tools" => 'tools:targetApi="o",tools:targetApi="p",'
        ),
    );
    public $styleRef = array(
        "fontFamily" => "@font",
        "lineHeight" => "@dimen",
        "fontSize" => "@dimen",
    );
}
