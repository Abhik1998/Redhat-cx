<?php

/*
 * This file is part of the Sonata package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\Component\Form\Transformer;

use Symfony\Component\Form\DataTransformerInterface;
use Sonata\Component\Delivery\Pool as DeliveryPool;

/**
 * Transform a method code into a method instance
 *
 * @author Thomas Rabaix <thomas.rabaix@sonata-project.org>
 */
class DeliveryMethodTransformer implements DataTransformerInterface
{
    /**
     * @var DeliveryPool
     */
    protected $deliveryPool;

    public function __construct(DeliveryPool $deliveryPool)
    {
        $this->deliveryPool = $deliveryPool;
    }

    /**
     * {@inheritdoc}
     */
    public function reverseTransform($value)
    {
        return $this->deliveryPool->getMethod($value);
    }

    /**
     * {@inheritdoc}
     */
    public function transform($value)
    {
        return $value ? $value->getCode() : null;
    }
}
