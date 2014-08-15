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

namespace WellCommerce\Bundle\CategoryBundle\Repository;

use Symfony\Component\HttpFoundation\Request;
use WellCommerce\Bundle\CoreBundle\Repository\RepositoryInterface;

/**
 * Interface CategoryRepositoryInterface
 *
 * @package WellCommerce\Bundle\CategoryBundle\Repository
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
interface CategoryRepositoryInterface extends RepositoryInterface
{

    /**
     * Returns categories tree as a collection
     *
     * @return mixed
     */
    public function getTreeItems();

    /**
     * Adds new category from ajax request
     *
     * @param Request $request
     *
     * @return mixed
     */
    public function quickAddCategory(Request $request);

} 