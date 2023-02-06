<?php
namespace Laminas\Html;

use Laminas\Html\View\Helper\Hyperlink as HyperlinkViewHelper;

class Hyperlink extends AbstractHtmlObject implements HtmlInterface
{
    /**
     * Create a trait for hyperlink, to iterate through records based on a passed variable,
     * Key=uuid, and add it into the url.  don't use from route, and if of class url, reconstruct
     * and export fromRoute.  use a specific set of variables to populate and lookup from.
     * @var string
     */
    
    public $tag = 'a';
    public $label;
    
    public $download;
    public $href;
    public $hreflang;
    public $media;
    public $ping;
    public $referrerpolicy;
    public $rel;
    public $target;
    public $type;
    
    public $data_href_param;
    public $data_url_params;
    public $data_url_route;
    
    public function getViewHelper()
    {
        return HyperlinkViewHelper::class;
    }
    
    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->label = $label;
        return $this;
    }

    public function getContent()
    {
        return $this->getLabel();
    }

}