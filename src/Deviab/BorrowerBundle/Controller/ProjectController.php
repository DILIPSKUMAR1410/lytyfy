<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 17/09/15
 * Time: 1:42 AM
 */

namespace Deviab\BorrowerBundle\Controller;


use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ProjectController extends Controller
{

    /**
     * @param $projectId
     * @return mixed
     */
    public function getProjectAction($projectId)
    {
        $projectService = $this->container->get('project_service');
        $project = $projectService->getProjectById($projectId);
        return $project;
    }


}