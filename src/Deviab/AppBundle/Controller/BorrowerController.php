<?php

namespace Deviab\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Exception\ValidatorException;
use Deviab\AppBundle\Entity\Borrower;
use \DateTime;

/**
 * Borrower controller
 * @Route("/borrower")
 *
 */
class BorrowerController extends Controller
{

    /**
     * Lists all Borrower entities.
     * @Route("/")
     *
     */
    public function postBorrowerAction()
    {
        $requestParams = $this->get('request')->request->all();
        $response = new Response();
        $borrower = new Borrower();
        try {
            $this->updateFields($borrower, $requestParams);
        } catch (ValidatorException $e) {
            return $response->setContent(json_encode(array('error' => $e->getMessage())));
        }
        $em = $this->getDoctrine()->getManager();
        $em->persist($borrower);
        $em->flush();

        $response->setContent(json_encode($this->serialize($borrower)));
        $response->headers->set('Content-Type', 'application/json');
        
        return $response;
    }

    /**
     * Update fields
     *
     * @param Borrower $borrower        - Borrower
     * @param array    $requestParams - Request parameters
     *
     * @return null
     */
    public function updateFields($borrower, $requestParams)
    {
        if (array_key_exists('name', $requestParams)) {
            $borrower->setName($requestParams['name']);
            unset($requestParams['name']);
        }
        if (array_key_exists('gender', $requestParams)) {
            $borrower->setGender($requestParams['gender']);
            unset($requestParams['gender']);
        }
        if (array_key_exists('phone', $requestParams)) {
            $borrower->setPhone($requestParams['phone']);
            unset($requestParams['phone']);
        }
        if (array_key_exists('address', $requestParams)) {
            $borrower->setAddress($requestParams['address']);
            unset($requestParams['address']);
        }
        if (array_key_exists('locality', $requestParams)) {
            $borrower->setLocality($requestParams['locality']);
            unset($requestParams['locality']);
        }
        if (array_key_exists('city', $requestParams)) {
            $borrower->setCity($requestParams['city']);
            unset($requestParams['city']);
        }
        if (array_key_exists('state', $requestParams)) {
            $borrower->setState($requestParams['state']);
            unset($requestParams['state']);
        }
        if (array_key_exists('borrower_image', $requestParams)) {
            $borrower->setBorrowerImg($requestParams['borrower_image']);
            unset($requestParams['borrower_image']);
        }
        if (array_key_exists('borrower_dob', $requestParams)) {
            $borrower->setBorrowerDob($requestParams['borrower_dob']);
            unset($requestParams['borrower_dob']);
        }
        $borrower->setModifiedBy('');
        $borrower->setModifiedAt(new DateTime('now'));

        $validator = Validation::createValidatorBuilder()
            ->enableAnnotationMapping()
            ->getValidator();

        $errors = $validator->validate($borrower);
        if (count($errors) > 0) {
            throw new ValidatorException($errors);
        }

        return;
    }

    public function serialize($entity)
    {
        $encoders = array(new XmlEncoder(), new JsonEncoder());
        $normalizers = array(new GetSetMethodNormalizer());
        $serializer = new Serializer($normalizers, $encoders);

        $jsonContent = $serializer->serialize($entity, 'json');
    }
}
