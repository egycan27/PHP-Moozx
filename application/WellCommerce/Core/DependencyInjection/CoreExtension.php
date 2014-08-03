<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 *
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 *
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Core\DependencyInjection;

use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use WellCommerce\Core\DependencyInjection\AbstractExtension;

/**
 * Class CoreExtension
 *
 * @package WellCommerce\Core\DependencyInjection
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class CoreExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
    public function load(array $config, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
        $loader->load('services.xml');
        $loader->load('database.xml');
        $loader->load('datagrid.xml');
        $loader->load('dataset.xml');
        $loader->load('routing.xml');
        $loader->load('session.xml');
        $loader->load('template.xml');
    }

    /**
     * {@inheritdoc}
     */
    public function registerRoutes(RouteCollection $collection, ContainerBuilder $container)
    {
        $extensionCollection = new RouteCollection();

        $extensionCollection->add('admin.company.index', new Route('/index', array(
            '_controller' => 'company.admin.controller:indexAction',
        )));

        $extensionCollection->add('admin.company.add', new Route('/add', array(
            '_controller' => 'company.admin.controller:addAction',
        )));

        $extensionCollection->add('admin.company.edit', new Route('/edit/{id}', array(
            '_controller' => 'company.admin.controller:editAction',
            'id'          => null
        )));

        $extensionCollection->addPrefix('/admin/company');

        $collection->addCollection($extensionCollection);
    }
}