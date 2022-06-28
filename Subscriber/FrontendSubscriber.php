<?php

declare(strict_types=1);

namespace RdssExample\Subscriber;

use Enlight\Event\SubscriberInterface;

/**
 * Class FrontendSubscriber
 */
class FrontendSubscriber implements SubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return [
            'Enlight_Controller_Action_PreDispatch' => 'onPreDispatch',
        ];
    }

    public function onPreDispatch(): void
    {
        echo 'You are awesome!';
    }
}
