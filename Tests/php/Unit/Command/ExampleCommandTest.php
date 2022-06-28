<?php

declare(strict_types=1);

namespace RdssExample\Tests\Unit\Command;

use RdssExample\Command\ExampleCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Zooroyal\Platform\TestBasics\TestCase\PlatformUnitTestCase;

/**
 * Class ExampleCommandTest
 */
class ExampleCommandTest extends PlatformUnitTestCase
{
    private ExampleCommand $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = new ExampleCommand();
    }

    public function testConfigure(): void
    {
        $this->assertSame('rdss:example:command', $this->subject->getName());
        $this->assertSame('an example command', $this->subject->getDescription());
    }

    public function testExecute(): void
    {
        $mockedInput = mock(InputInterface::class);
        $mockedOutput = mock(OutputInterface::class);
        $mockedOutput->shouldReceive('writeln')->once()->with('You are awesome!');
        $this->subject->execute($mockedInput, $mockedOutput);
    }
}
