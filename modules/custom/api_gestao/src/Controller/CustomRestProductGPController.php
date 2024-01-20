<?php

namespace Drupal\api_gestao\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\api_gestao\Service\ProductGPServiceInterface;
use Drupal\Core\Config\Schema\Undefined;
use Symfony\Component\HttpFoundation\JsonResponse;
use Drupal\rest\ResourceResponse;

/**
 * Controller for CustomRestProductGP.
 */
class CustomRestProductGPController extends ControllerBase
{

  /**
   * The ProductGP service.
   *
   * @var \Drupal\api_gestao\Service\ProductGPServiceInterface
   */
  protected $productGPService;

  /**
   * {@inheritdoc}
   */
  public function __construct(ProductGPServiceInterface $productGPService)
  {
    $this->productGPService = $productGPService;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container)
  {
    return new static(
      $container->get('api_gestao.product_gp_service')
    );
  }

  /**
   * Returns a specific ProductGP or a list of ProductGP.
   *
   * @param int $id
   *   The ID of the entity.
   *
   * @return array
   *   The response.
   */
  public function get($id = NULL)
  {
    $response = $this->productGPService->get($id);
 
    return new JsonResponse($response, 200, [], true);   
  }

  /**
   * Creates a new ProductGP.
   *
   * @param array $data
   *   The data to create the entity.
   *
   * @return array
   *   The response.
   */
  public function post(array $data = [])
  {
    // Delegate the logic to the service.
    return $this->productGPService->create($data);
  }

  // Implement other CRUD methods as needed.

}
