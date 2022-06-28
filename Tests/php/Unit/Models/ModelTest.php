<?php

declare(strict_types=1);

namespace RdssExample\Tests\Unit;

use RdssExample\Models\Model;
use Zooroyal\Platform\TestBasics\TestCase\PlatformUnitTestCase;

/**
 * Class ModelTest
 */
class ModelTest extends PlatformUnitTestCase
{
    private Model $subject;

    protected function setUp(): void
    {
        $this->subject = new Model();
    }

    public function testInstance(): void
    {
        self::assertInstanceOf(Model::class, $this->subject);
    }

    public function testSetBar(): void
    {
        $testString = self::$faker->text();
        $this->subject->setBar($testString);

        self::assertEquals($testString, $this->subject->getBar());
    }

    public function testSetFoo(): void
    {
        $testInt = self::$faker->randomNumber();
        $this->subject->setFoo($testInt);

        self::assertEquals($testInt, $this->subject->getFoo());
    }
}
