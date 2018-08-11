<?php

/*
 * This file is part of the TLA Media SparkPostBundle.
 *
 * (c) TLA Media <kontakt@tlamedia.dk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Tla\SparkPostBundle\Tests\DependencyInjection;

use PHPUnit\Framework\TestCase;
use Tla\SparkPostBundle\DependencyInjection\TlaSparkPostExtension;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class TlaSparkPostExtensionTest extends TestCase
{
    public function testLoad()
    {
        $container = new ContainerBuilder();
        $extension = new TlaSparkPostExtension();
        $extension->load([], $container);
        $this->assertTrue($container->hasDefinition('tla_spark_post.api_client'));
    }
}