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

use Symfony\Component\Form\DataTransformerInterface;

/**
 * Class CurrencyDataTransformer
 *
 * @package Sonata\Component\Currency
 *
 * @author Hugo Briand <briand@ekino.com>
 */
class CurrencyDataTransformer implements DataTransformerInterface
{
    /**
     * @param CurrencyManagerInterface
     */
    private $currencyManager;

    /**
     * Constructs the CurrencyDataTransformer
     *
     * @param CurrencyManagerInterface $currencyManager
     */
    public function __construct(CurrencyManagerInterface $currencyManager)
    {
        $this->currencyManager = $currencyManager;
    }

    /**
     * {@inheritdoc}
     */
    public function transform($value)
    {
        if ($value instanceof CurrencyInterface) {
            return $value->getLabel();
        }

        return $value;
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($value)
    {
        if (!$value) {
            return null;
        }

        return $this->currencyManager->findOneByLabel($value);
    }

}
