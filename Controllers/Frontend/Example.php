<?php

declare(strict_types=1);

//phpcs:disable PSR1.Classes.ClassDeclaration.MissingNamespace,Squiz.Classes.ValidClassName.NotCamelCaps,Squiz.Classes.ClassFileName.NoMatch

/**
 * Class Shopware_Controllers_Frontend_Example
 *
 * @codeCoverageIgnore
 */
class Shopware_Controllers_Frontend_Example extends Enlight_Controller_Action
{
    public function indexAction(): void
    {
        $this->View()->assign('isAwesome', true);
    }

}
