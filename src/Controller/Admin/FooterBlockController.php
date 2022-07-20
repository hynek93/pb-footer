<?php

namespace Praguebest\SyliusFooterPlugin\Controller\Admin;

use FOS\RestBundle\View\View;
use Praguebest\SyliusFooterPlugin\Entity\FooterBlockInterface;
use Sylius\Bundle\ResourceBundle\Controller\RequestConfiguration;
use Sylius\Bundle\ResourceBundle\Controller\ResourceController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class FooterBlockController extends ResourceController
{
    public function indexAction(Request $request): Response
    {
        $configuration = $this->requestConfigurationFactory->create($this->metadata, $request);
        $resources = $this->resourcesCollectionProvider->get($configuration, $this->repository);

        if (!$configuration->isHtmlRequest()) {
            $this->createRestView($configuration, $resources);
        }

        return parent::indexAction($request);
    }

    /**
     * @param mixed $data
     */
    protected function createRestView(RequestConfiguration $configuration, $data, int $statusCode = null): Response
    {
        if (null === $this->viewHandler) {
            throw new \LogicException('You can not use the "non-html" request if FriendsOfSymfony Rest Bundle is not available. Try running "composer require friendsofsymfony/rest-bundle".');
        }

        $view = View::create($data, $statusCode);

        $result = [];

        /** @var FooterBlockInterface $row */
        foreach ($view->getData() as $row) {
            $result[] = [
                'id' => $row->getId(),
                'name' => $row->getName()
            ];
        }

        return new JsonResponse($result);
    }
}