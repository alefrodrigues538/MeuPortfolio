<?php

namespace Drupal\api_gestao\Plugin\rest\resource;

use Drupal\rest\Plugin\ResourceBase;
use Drupal\rest\ResourceResponse;

/**
 * Provides a resource to get view modes by entity and bundle.
 * @RestResource(
 *  id = "custom_rest_resource",
 *  label = @Translation("Custom Rest Resource"),
 *  uri_paths = {
 *    "canonical" = "/vb-rest"
 *  }
 * )
 */
class CustomRestResource extends ResourceBase
{

  public function get()
  {
    $response = ['message' => 'Hello, this is a rest service'];
    return new ResourceResponse($response);
  }
}
