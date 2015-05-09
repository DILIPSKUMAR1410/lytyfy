<?php

namespace Deviab\AppBundle\Controller;

use Deviab\AppBundle\Entity\Borrower;
use JMS\Serializer\SerializerBuilder;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Exception\ValidatorException;
use Symfony\Component\Validator\Validation;
use \DateTime;

/**
 * Borrower controller
 * @Route("/borrower")
 */
class BorrowerController extends Controller {
	/**
	 * Add new Borrowers
	 * @Route("/create")
	 */
	public function createBorrowerAction() {
		$requestData = $this->getRequest()->getContent();
		$serializer = SerializerBuilder::create()->build();

		$borrower = $serializer->deserialize($requestData, 'Deviab\AppBundle\Entity\Borrower', 'json');

		$em = $this->getDoctrine()->getManager();
		$em->persist($borrower);
		$em->flush();

	}

	/**
	 * Update fields
	 *
	 * @param Borrower $borrower        - Borrower
	 * @param array    $requestParams - Request parameters
	 *
	 * @return null
	 */
	public function updateFields($borrower, $requestParams) {
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
			$borrower->setBorrowerDob(new DateTime('now'));
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

}
