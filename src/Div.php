<?php
namespace Laminas\Html;

use Laminas\Html\View\Helper\Div as DivViewHelper;

class Div extends AbstractHtmlObject implements HtmlInterface
{
    public $tag = 'div';
    
    public $aria_labeled_by;
    
    public $items = [];
    
    public function getContent()
    {
        
    }
    
    public function add($item)
    {
        $this->items[] = $item;
    }
    
    public function getViewHelper()
    {
        return DivViewHelper::class;
    }

}