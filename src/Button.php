<?php
namespace Laminas\Html;

use Laminas\Html\View\Helper\Button as ButtonViewHelper;

class Button extends AbstractHtmlObject implements HtmlInterface
{
    public $tag = 'button';
    public $type = 'button';
    public $label;
    public $data_bs_toggle;
    public $aria_has_popup;
    public $aria_expanded;
    
    public function getContent()
    {
        return $this->label;
    }

    public function getViewHelper()
    {
        return ButtonViewHelper::class;
    }
}