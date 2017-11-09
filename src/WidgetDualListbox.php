<?php
/**
 * @author Semenov Alexander <semenov@skeeks.com>
 * @link https://skeeks.com/
 * @copyright (c) 2010 SkeekS
 * @date 09.11.2017
 */
namespace skeeks\widget\duallistbox;
use yii\widgets\InputWidget;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * Class WidgetDualListbox
 * @package skeeks\widget\duallistbox
 */
class WidgetDualListbox extends InputWidget
{
    /**
     * @var array listbox items
     */
    public $items = [];
    /**
     * @var string|array selected items
     */
    public $selection;
    /**
     * @var array listbox options
     */
    public $options = [];
    /**
     * @var array dual listbox options
     */
    public $clientOptions = [];
    /**
     * @inheritdoc
     */
    public function run()
    {
        $this->registerClientScript();
        Html::addCssClass($this->options, 'form-control');
        $this->options['multiple'] = true;
        if ($this->hasModel()) {
            return Html::activeListBox($this->model, $this->attribute, $this->items, $this->options);
        } else {
            return Html::listBox($this->name, $this->selection, $this->items, $this->options);
        }
    }
    /**
     * Registers the required JavaScript.
     */
    public function registerClientScript()
    {
        $view = $this->getView();
        WidgetDualListboxAsset::register($view);
        $id = (array_key_exists('id', $this->options)) ? $this->options['id'] : Html::getInputId($this->model, $this->attribute);
        $options = empty($this->clientOptions) ? '' : Json::encode($this->clientOptions);
        $view->registerJs("jQuery('#$id').bootstrapDualListbox($options);");
    }
}