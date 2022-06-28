<?php

declare(strict_types=1);

namespace RdssExample\Tests\Unit;

use Doctrine\DBAL\Connection;
use Exception;
use Mockery\MockInterface;
use RdssExample\Installer;
use Shopware\Components\Logger;
use Shopware\Components\Model\ModelManager;
use Zooroyal\Platform\TestBasics\TestCase\PlatformUnitTestCase;

/**
 * Class InstallerTest
 */
class InstallerTest extends PlatformUnitTestCase
{
    /** @var ModelManager|MockInterface */
    private $mockedEntityManager;
    /** @var MockInterface|Logger */
    private $mockedLogger;
    private Installer $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->mockedEntityManager = mock(ModelManager::class);
        $this->mockedLogger = mock(Logger::class);
        $this->subject = new Installer($this->mockedEntityManager, $this->mockedLogger);
    }

    /**
     * Data proovider for testUpdate
     *
     * @return array<int, array<int, string>>
     */
    public function updateVersionProvider(): array
    {
        return [
            ['install'],
            ['1.0.0'],
        ];
    }

    /**
     * Test update
     *
     * @dataProvider updateVersionProvider
     *
     * @throws Exception
     */
    public function testUpdate(string $version): void
    {
        $connection = mock(Connection::class);
        $this->mockedEntityManager->shouldReceive('getConnection')->andReturn($connection);
        $connection->shouldReceive('prepare')->with('select 1 from dual')->andReturn($connection);
        $connection->shouldReceive('execute')->withNoArgs()->once();
        $this->subject->update($version);
    }

    public function testUninstall(): void
    {
        $connection = mock(Connection::class);
        $this->mockedEntityManager->shouldReceive('getConnection')->andReturn($connection);
        $connection->shouldReceive('prepare')->with('select 2 from dual')->andReturn($connection);
        $connection->shouldReceive('execute')->withNoArgs()->once();
        $this->subject->uninstall();
    }
}
