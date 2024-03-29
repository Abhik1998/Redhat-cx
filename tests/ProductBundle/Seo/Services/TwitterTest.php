<?php

declare(strict_types=1);

/*
 * This file is part of the Sonata Project package.
 *
 * (c) Thomas Rabaix <thomas.rabaix@sonata-project.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sonata\ProductBundle\Tests\Seo\Services;

use PHPUnit\Framework\TestCase;
use Sonata\Component\Currency\Currency;
use Sonata\Component\Currency\CurrencyDetectorInterface;
use Sonata\IntlBundle\Templating\Helper\NumberHelper;
use Sonata\MediaBundle\Provider\Pool;
use Sonata\ProductBundle\Entity\BaseProduct;
use Sonata\ProductBundle\Seo\Services\Twitter;
use Sonata\SeoBundle\Seo\SeoPage;
use Sonata\SeoBundle\Twig\Extension\SeoExtension;

class ProductTwitterMock extends BaseProduct
{
    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
    }
}

class TwitterTest extends TestCase
{
    public function testAlterPage(): void
    {
        $mediaPool = $this->createMock(Pool::class);
        $seoPage = new SeoPage('test');
        $extension = new SeoExtension($seoPage, 'UTF-8');
        $numberHelper = $this->createMock(NumberHelper::class);
        $currencyDetector = $this->createMock(CurrencyDetectorInterface::class);
        $product = new ProductTwitterMock();

        //Prepare currency
        $currency = new Currency();
        $currency->setLabel('EUR');
        $currencyDetector->expects($this->any())
                ->method('getCurrency')
                ->willReturn($currency);

        $twitterService = new Twitter($mediaPool, $numberHelper, $currencyDetector, 'test', 'test', 'test', 'test', 'reference');
        $twitterService->alterPage($seoPage, $product);
        $content = $extension->getMetadatas();

        $this->assertContains('twitter:label1', $content);
        $this->assertNotContains('twitter:image:src', $content);
    }
}
