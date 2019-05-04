<?php
namespace app\widgets;

use Yii;
use yii\bootstrap\Widget;
use yii\helpers\Html;

/**
 */
class ImgPickerWidget extends Widget
{
    /**
     * @var string the select name. 
     */
    public $name;
    
    /**
     * @var array list of images, onedim array vs file names
     */
    public $imgs = [];
    /**
     * @var string path to folder vs items
     */
    public $imgsPath = '';
    /**
     * @var string current selected image
     */
    public $current='';
    /**
     * @var string adds img class (data-img-class ), default class image_picker_image
     */
    public $imgClass;


        /**
     * Initializes the widget.
     * If you override this method, make sure you call the parent implementation first.
     */
    public function init()
    {
        /*
        if ($this->name === null) {
            $this->name= $this->getId();
        }
        if (!isset($this->options['id'])) {
            $this->options['id'] = $this->getId();
        }
        */
        parent::init();
    }

    /**
     * {@inheritdoc}
     */
    public function run()
    {
        $view = $this->getView();
        ImgPickerAsset::register($view);
        //run ImgPicker js
        $view->registerJs("jQuery('select.image-picker').imagepicker({hide_select:  true});");
        //$view->registerJs("jQuery('select.createOptions').createOptions({hide_select:  true});");

        //for image-picker.js
        Html::addCssClass($this->options, 'image-picker');
        //can't be multy select
        unset($this->options['multiple']);
        //create items 4 html::dropDownList
        $items=[];
        $options=[];
        foreach ($this->imgs as $img) {
            $items[$img] = $img;
            $options[$img] = ['data' => ['img-src' => $this->imgsPath.$img, 'img-alt' => $img, 'img-class' => $this->imgClass]];
        }
        $this->options['options']=$options;
        return Html::dropDownList($this->name, $this->current, $items, $this->options);

    }


}
