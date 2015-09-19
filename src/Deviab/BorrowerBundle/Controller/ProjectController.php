<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 19/09/15
 * Time: 9:58 AM
 */

namespace Deviab\BorrowerBundle\Controller;

use JMS\Serializer\SerializationContext;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;

class ProjectController extends Controller
{
    public function getProjectAction($projectId)
    {
        $projectService = $this->container->get('project_service');
        $projectStatus = $projectService->getProjectStatus($projectId);
        return $projectStatus;
    }
}