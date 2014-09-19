<?php

namespace	Afpa\Bundle\SpotifyBundle\Tests\Entity;

use	Afpa\Bundle\SpotifyBundle\Tests\Entity\ArtistTest;

class	ArtistTest	extends	\PHPUnit_Framework_TestCase
{
    public	function	testpresent()
    {
        $present = new	Artist();
        $result	=	$present->url("/spotify/4gzpq5DPGxSnKTe4SA8HAU");
        $this->assertEquals(Coldplay, $result);
    }
}