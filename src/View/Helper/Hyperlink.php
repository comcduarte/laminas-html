<?php
namespace Laminas\Html\View\Helper;

use Laminas\Html\HtmlInterface;
use Laminas\View\Helper\Url;

class Hyperlink extends AbstractHelper
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
        $html = $this->processData($html);
        return $this->openTag($html) . $content . $this->closeTag($html);
    }
    
    public function processData(HtmlInterface $html)
    {
        /**
         * Develop validated URL
         */
        if (isset($html->data_href_param)) {
            $html->data_url_params[strtolower($html->data_href_param)]= $this->data[$html->data_href_param];
        }
        /**
         * 
         * @var Url $url
         */
        $url = $this->getView()->plugin('url');
        $html->href = $url($html->data_url_route, $html->data_url_params);
        
        return $html;
    }
}