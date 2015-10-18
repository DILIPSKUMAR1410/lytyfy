<?php
/**
 * Created by PhpStorm.
 * User: dk-jarvis
 * Date: 19/09/15
 * Time: 9:56 AM
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
    public function getProjectStatus($projectId)
    {
        $projectRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:Project');
        $project = $projectRepository->find($projectId);
        if ($project == null)
            return View::create("project not found", Codes::HTTP_BAD_REQUEST);
        $quantum = $project->getCapitalAmount();
        $result = $this->em->createQueryBuilder()->select('bi.imageUrl', 'bld.userStory')->from('DeviabDatabaseBundle:BorrowerImages', 'bi')
            ->innerJoin('DeviabDatabaseBundle:BorrowerLoanDetails', 'bld')
            ->where('bi.borrower.id=bld.borrower.id');

        $response = array('quantum' => $quantum, 'borrowers' => $result->getQuery()->getResult());
        return View::create($response, Codes::HTTP_OK);
    }


    /**
     * @param $projectId
     * @return View
     */
    public function getFeaturedProject($projectId)
    {
        $projectRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:Project');
        $project = $projectRepository->find($projectId);
        if ($project == null)
            return View::create("project not found", Codes::HTTP_BAD_REQUEST);
        $quantum = $project->getCapitalAmount();
        $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
        $backers = count($lenderRepository->findAll());
        $response = array('quantum' => $quantum, 'backers' => $backers);
        return View::create($response, Codes::HTTP_OK);
    }

    /**
     * @param $projectId
     * @return View
     */
    public function getWallet($projectId)
    {
        $projectRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:Project');
        $project = $projectRepository->find($projectId);
        if ($project == null)
            return View::create("project not found", Codes::HTTP_BAD_REQUEST);
        $quantum = $project->getCapitalAmount();
        $lenderRepository = $this->doctrine->getRepository('DeviabDatabaseBundle:LenderDetails');
        $backers = count($lenderRepository->findAll());
        $response = array('quantum' => $quantum, 'backers' => $backers);
        return View::create($response, Codes::HTTP_OK);
    }






}