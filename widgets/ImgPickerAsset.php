<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\widgets;

use yii\web\AssetBundle;

/**
 *
 */
class ImgPickerAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'js/image-picker/image-picker.css',
    ];
    public $js = [
        'js/image-picker/image-picker.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
    ];
}
