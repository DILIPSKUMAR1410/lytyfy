<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 17/09/15
 * Time: 1:38 AM
 */

namespace Deviab\BorrowerBundle\Services;

use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;
use FOS\RestBundle\View\View;
use FOS\RestBundle\Util\Codes;

class ProjectService extends BaseService
{
    /**
     * @param Doctrine $doctrine
     */
    public function __construct(Doctrine $doctrine)
    {
        parent::__construct($doctrine);

        $this->doctrine = $doctrine;
    }

    /**
     * @param $projectId
     * @return View
     */
    public function getProjectById($projectId)
    {

        $projectRepositry = $this->doctrine->getRepository('DeviabDatabaseBundle:Project');
        $project = $projectRepositry->find($projectId);
        if ($project == null) {
            return View::create("loan operational strategy not found", Codes::HTTP_BAD_REQUEST);
        }
        return View::create($project, Codes::HTTP_OK);
    }

}