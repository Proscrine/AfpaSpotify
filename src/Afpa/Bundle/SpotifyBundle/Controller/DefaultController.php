<?php

namespace Afpa\Bundle\SpotifyBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Afpa\Bundle\SpotifyBundle\Entity\artist;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function viewAction($names)
    {
		$url	= "https://api.spotify.com/v1/search?&type=artist&q=".$names;
		$data = file_get_contents($url);
		$artist = json_decode($data, true);
		return $this->render('AfpaSpotifyBundle:Default:index.html.twig', array('artist' => $artist));
    }
	
	public function saveAction ($names)
	{
	    $url	= "https://api.spotify.com/v1/search?&type=artist&q=".$names;
		$data = file_get_contents($url);
		$artiste = json_decode($data, false);
		$artist = new artist;
		
		$artist->setName($artiste->name);
		$artist->setImages($artiste->images[0]->url);
		$artist->setGenres($artiste->genres);
		$artist->setPopularity($artiste->popularity);
		$artist->setUrl($artiste->uri);
		
		
		$em = $this->getDoctrine()->getManager();
        $em->persist($artist);
        $em->flush();
		
		return $this->redirect($this->generateUrl('afpa_spotify_artist', array('id' => $id)));
	}
}
