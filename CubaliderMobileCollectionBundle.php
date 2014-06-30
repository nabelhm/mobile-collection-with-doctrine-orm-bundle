<?php

namespace Cubalider\Bundle\MobileCollectionBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Cubalider\Bundle\MobileCollectionBundle\DependencyInjection\Compiler\DoctrineMappingPass;

/**
 * @author Nabel Hernandez <nabelhm@cubalider.com>
 */
class MobileCollectionBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new DoctrineMappingPass());
    }
}
