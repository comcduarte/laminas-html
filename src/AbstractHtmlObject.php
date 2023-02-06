<?php
namespace Laminas\Html;

abstract class AbstractHtmlObject
{
    use GlobalAttributes;
    use Events;
    
    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }
    
    /**
     * @param string $tag
     */
    public function setTag($tag)
    {
        $this->tag = $tag;
        return $this;
    }

    public function getAttributes()
    {
        $attributes = [];
        foreach (get_object_vars($this) as $key => $value) {
            if (str_contains($key, '_')) {
                $key = str_replace('_', '-', $key);
            }
            
            if (null !== $value) {
                $attributes[$key] = $value;
            }
        }
        
        return $attributes;
    }
}