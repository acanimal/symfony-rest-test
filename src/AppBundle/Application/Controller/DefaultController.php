<?php

namespace AppBundle\Application\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\RequestParam;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Request\ParamFetcher;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Class DefaultController
 * @package AppBundle\Application\Controller
 *
 * @Route("/default")
 */
class DefaultController extends Controller
{
    /**
     * @SWG\Get(
     *     path="/default",
     *     description="Returns test data",
     *     tags={"query"},
     *     produces={"application/json"},
     *     @SWG\Response(
     *         response="200", description="Returns test data",
     *     )
     * )
     *
     * @Get("/")
     * @View()
     *
     * @return array
     */
    public function getDefault() {
        $test = array(
            "a" => 1,
            "b" => 2,
        );

        return $test;
    }

    /**
     * @SWG\Get(
     *     path="/default{id}",
     *     description="Returns test data",
     *     tags={"query"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         description="ID of the thing",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer",
     *         format="int64"
     *     ),
     *     @SWG\Response(
     *         response="200",
     *         description="Returns test data",
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="Thing not found",
     *     )
     * )
     *
     * @Get("/{id}", requirements={"id" = "\d+"})
     * @View()
     *
     * @return array
     */
    public function getDefaultById($id) {
        $test = array(
            "id" => $id,
        );

        return $test;
    }

    /**
     * @SWG\Post(
     *     path="/default{id}",
     *     description="Returns test data",
     *     tags={"query"},
     *     produces={"application/json"},
     *     @SWG\Parameter(
     *         description="ID of the thing",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="integer",
     *         format="int64"
     *     ),
     *     @SWG\Response(
     *         response="200",
     *         description="Returns test data",
     *     ),
     *     @SWG\Response(
     *         response="404",
     *         description="Thing not found",
     *     )
     * )
     *
     * @Post("/")
     * @View()
     *
     * @RequestParam(name="d1", default="null")
     *
     * @param ParamFetcher $paramFetcher
     * @return array
     */
    public function postDefault(ParamFetcher $paramFetcher) {
        $test = array(
            "data" => $paramFetcher->all(),
        );

        // throw new Exception("dummy exception");

        return $test;
    }
}
