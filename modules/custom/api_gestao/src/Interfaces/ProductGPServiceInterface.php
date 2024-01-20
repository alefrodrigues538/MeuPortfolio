<?php

namespace Drupal\api_gestao\Service;

/**
 * Interface for ProductGP service.
 */
interface ProductGPServiceInterface
{

  /**
   * Returns a specific ProductGP or a list of ProductGP.
   *
   * @param int $id
   *   The ID of the entity.
   *
   * @return array
   *   The response.
   */
  public function get($id = NULL);

  /**
   * Creates a new ProductGP.
   *
   * @param array $data
   *   The data to create the entity.
   *
   * @return array
   *   The response.
   */
  public function create(array $data = []);

  // Add other method signatures for CRUD operations.

}
