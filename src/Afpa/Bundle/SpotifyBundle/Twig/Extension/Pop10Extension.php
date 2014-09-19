<?php

namespace Afpa\Bundle\SpotifyBundle\Twig\Extension;
 
class Pop10Extension extends \Twig_Extension
{
    public function getFilters()
    {
        return array(
            'pop10' => new \Twig_Filter_Method($this, 'ajoute')
        );
    }
 
    public function ajoute($value)
    {
		$value +=10;
		return $value;
    }
 
    public function getName()
    {
        return 'pop10_extension';
    }
 
}