<?php
/**
 * Created by PhpStorm.
 * User: olegyurievich
 * Date: 07.12.17
 * Time: 8:41
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LuckyController
{
    /**
     * @Route("/lucky/number")
     */
    public function number()
    {
        $number = mt_rand(0, 100);
        return new Response( '<html><body>Lucky number: '.$number.'</body></html>');
    }
}