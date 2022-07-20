<?php

namespace Praguebest\SyliusFooterPlugin\Controller\Admin;

use FOS\RestBundle\View\View;
use Praguebest\SyliusFooterPlugin\Entity\FooterBlockInterface;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfiguration;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FooterController extends ResourceController
{
    public function showAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);
        $resources = $this->resourcesCollectionProvider->get($configuration, $this->repository);

        return $this->render('@PraguebestSyliusFooterPlugin/Shop/footer.html.twig', [
            'footer' => $resources,
            'locale' => $request->getLocale()
        ]);
    }
}