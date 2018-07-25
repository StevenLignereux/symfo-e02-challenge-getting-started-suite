<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IFeelController extends Controller
{
    /**
     * @Route("/ifeel/text", name="i_feel_text")
     */
    public function iFeelTextAction()
    {
        // On crée un tableau regroupant les noms des émojis
        $emojis = [':cold_sweat:', ':grimacing:', ':heart_eyes:', ':smile:', ':thinking_face:'];
        // On mélange les noms dans le tableau
        shuffle($emojis);
        // On récupère le chemin relatif vers l'image
        $emoji = $emojis[0];

        return new Response('<html><body>'.$emoji.'</body></html>');
    }

    /**
     * @Route("/ifeel/image", name="i_feel_image")
     */
    public function iFeelImageAction()
    {
        // On crée un tableau regroupant les noms des émojis
        $emojis = ['cold_sweat', 'grimacing', 'heart_eyes', 'smile', 'thinking_face'];
        // On mélange les noms dans le tableau
        shuffle($emojis);
        // On récupère le chemin relatif vers l'image
        $emoji = $emojis[0];

        return $this->render('ifeel/image.html.twig', [
            'emoji' => $emoji,
        ]);
    }
}
