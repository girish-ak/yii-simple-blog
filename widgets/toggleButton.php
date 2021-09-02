<?php

namespace app\widgets;

use yii\base\Widget;
use yii\bootstrap4\Button;

class toggleButton extends Widget
{
    public $text;
    public function init()
    {
        parent::init();
        if($this->text=='Like'){
            $this->text = 'Unlike';
        }
        else{
            $this->text='Like';
        }
    }

    public function run()
    {
        parent::run();
        return '<button>'.$this->text .'</button>';
    }
}