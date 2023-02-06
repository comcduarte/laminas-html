<?php
namespace Laminas\Html\View\Helper;

use Laminas\Html\HtmlInterface;

class Div extends AbstractHelper
{
    use DataAwareTrait;
    
    public function __invoke(HtmlInterface $html = null)
    {
        if (! $html) {
            return $this;
        }
        
        return $this->render($html);
    }
    
    public function render(HtmlInterface $html)
    {
        $content = $html->getContent();
        
        foreach ($html->items as $item) {
            $view_helper = $item->getViewHelper();
            
            if (class_uses($view_helper, DataAwareTrait::class)) {
                $this->getView()->$view_helper()->setData($this->getData());
            }
            
            $content .= $this->getView()->$view_helper()->render($item);
        }
        
        return $this->openTag($html) . $content . $this->closeTag($html);
    }
    
    public function processData(HtmlInterface $html)
    {
        
    }

}