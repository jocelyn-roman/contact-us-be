<?php

namespace Drupal\custom_api\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;
use Drupal\rest\ModifiedResourceResponse;

/**
 * Provides a resource to validate Contact Us
 * 
 * @RestResource(
 *   id = "rest_contact_us",
 *   label = @Translation("Contact Us Resource"),
 *   uri_paths = {
 *     "create" = "/myapi/form/validate"
 *   }
 * )
 */
class ContactUsResource extends ResourceBase {

     /**
   * @return \Drupal\rest\ResourceResponse
   *   The HTTP response objects
   *  Function to validate phone number and email.
   *  - phone_number: contains 10 digits.
   *  - email: @gmail.com is not allowed.
   * 
   *   * @param mixed $data
   *   Data to validate.
   */
  public function post($data) {
    $erros = [];
    $phone = $data['phone_number'] ?? '';
    $email = $data['email'] ?? '';

    // Validate phone number.
    if (!$phone
    || !preg_match('/^[0-9]{10}+$/', $phone)) {
      $errors[] = [
        'field' => 'phone_number',
        'error_msg' => 'Phone number is required and should contain 10 digits.',
      ];
    }

    // Validate email.
    if (!\Drupal::service('email.validator')->isValid($email)
    || preg_match('/\S+@gmail\.com$/', $email)) {
      $errors[] = [
        'field' => 'email',
        'error_msg' => 'Email is required and should not contain @gmail.',
      ];
    }

    if ($errors) {
      return new ModifiedResourceResponse([
        'errors' => $errors,
      ], 400);
    }

    $response = ['message' => 'Succesful!'];
    return  new ResourceResponse($response, 200);
  }
}