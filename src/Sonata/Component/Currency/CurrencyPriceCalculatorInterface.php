<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\Component\Currency;

use Sonata\Component\Product\ProductInterface;

/**
 * @author Hugo Briand <briand@ekino.com>
 */
interface CurrencyPriceCalculatorInterface
{
    /**
     * Returns the price of $product for given $currency
     *
     * @param ProductInterface  $product
     * @param CurrencyInterface $currency
     *
     * @return float
     */
    public function getPrice(ProductInterface $product, CurrencyInterface $currency);
}