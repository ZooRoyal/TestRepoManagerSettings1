<?php

declare(strict_types=1);

namespace RdssExample\Tests\Unit\Subscriber;

use RdssExample\Subscriber\FrontendSubscriber;
use Zooroyal\Platform\TestBasics\TestCase\PlatformUnitTestCase;

/**
 * Class FrontendSubscriberTest
 */
class FrontendSubscriberTest extends PlatformUnitTestCase
{
    private FrontendSubscriber $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new FrontendSubscriber();
    }

    public function testGetSubscribedEvents(): void
    {
        $this->assertSame(
            ['Enlight_Controller_Action_PreDispatch' => 'onPreDispatch'],
            FrontendSubscriber::getSubscribedEvents()
        );
    }

    public function testOnPreDispatch(): void
    {
        ob_start();
        $this->subject->onPreDispatch();
        $this->assertSame('You are awesome!', ob_get_clean());
    }
}
