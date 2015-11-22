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

namespace WellCommerce\CatalogBundle\Controller\Box;

use WellCommerce\CoreBundle\Controller\Box\AbstractBoxController;
use WellCommerce\CoreBundle\Controller\Box\BoxControllerInterface;

/**
 * Class ProductInfoBoxController
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class ProductInfoBoxController extends AbstractBoxController implements BoxControllerInterface
{
    public function indexAction()
    {
        $product      = $this->manager->getProductContext()->getCurrentProduct();
        $templateData = $this->get('product.helper')->getProductDefaultTemplateData($product);

        return $this->displayTemplate('index', $templateData);
    }
}