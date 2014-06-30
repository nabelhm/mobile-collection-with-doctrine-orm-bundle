<?php

namespace Cubalider\Bundle\MobileCollectionBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

/**
 * @author Nabel Hernandez <nabelhm@cubalider.com>
 */
class DoctrineMappingPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        $definition = new Definition('Doctrine\ORM\Mapping\Driver\XmlDriver', array(array(
            sprintf("%s/../../../../../../mobile-collection-with-doctrine-orm/src/Cubalider/Component/Mobile/Resources/config/doctrine", __DIR__)
        )));
        $definition->setPublic(false);
        $container->setDefinition('cubalider_mobile_collection.xml_driver', $definition);

        $definition = $container->getDefinition('doctrine.orm.default_metadata_driver');
        $definition->addMethodCall('addDriver', array(new Reference('cubalider_mobile_collection.xml_driver'), 'Cubalider\Component\Mobile\Model'));
    }
}
