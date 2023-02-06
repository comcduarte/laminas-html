<?php
namespace Laminas\Html\View\Helper;

use Laminas\View\Helper\AbstractHelper as AbstractViewHelper;
use Laminas\Html\HtmlInterface;

abstract class AbstractHelper extends AbstractViewHelper
{
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
        return $this->openTag($html) . $content . $this->closeTag($html);
    }
    
    public function openTag(HtmlInterface $html)
    {
        return sprintf('<%s %s>', $html->getTag(), $this->createAttributeString($html->getAttributes()));
    }
    
    public function closeTag(HtmlInterface $html)
    {
        return sprintf('</%s>', $html->getTag());
    }
    
    public function createAttributeString(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (is_array($value)) { continue; }
            
            $key = strtolower($key);
            
            try {
                $strings[] = sprintf('%s="%s"', $key, $value);
            } catch (\Exception $x) {
                // If an escaper exception happens, escape only the key, and use a blank value.
                $strings[] = sprintf('%s=""', $key);
            }
        }
        if (isset($strings)) {
            return implode(' ', $strings);
        }
    }
}