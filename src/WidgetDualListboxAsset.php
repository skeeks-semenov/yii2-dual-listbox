<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 09.11.2017
 */
namespace skeeks\widget\duallistbox;
use yii\web\AssetBundle;

/**
 * Class WidgetDualListboxAsset
 * @package skeeks\widget\duallistbox
 */
class WidgetDualListboxAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/istvan-ujjmeszaros/bootstrap-duallistbox/dist';
    
    public $js = [
        'jquery.bootstrap-duallistbox.min.js'
    ];
    
    public $css = [
        'bootstrap-duallistbox.min.css',
    ];
    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}