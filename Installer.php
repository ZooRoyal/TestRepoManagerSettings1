<?php

declare(strict_types=1);

namespace RdssExample;

use Exception;
use Shopware\Components\Logger;
use Shopware\Components\Model\ModelManager;
use function Safe\sprintf;

/**
 * Class Installer
 */
class Installer
{
    private ModelManager $manager;

    protected Logger $logger;

    /**
     * Installer constructor.
     *
     * @return void
     */
    public function __construct(
        ModelManager $manager,
        Logger $logger
    ) {
        $this->manager = $manager;
        $this->logger = $logger;
    }

    /**
     * Update attributes, schema
     *
     * @throws Exception
     */
    public function update(string $oldVersion): void
    {
        switch ($oldVersion) {
            case 'install':
            case '1.0.0':
                $this->doUpdateMigration('1.0.0.php');
                break;
            // fall-through
            default:
                break;
        }
    }

    /**
     * Plugin uninstall
     *
     * @throws Exception
     */
    public function uninstall(): bool
    {
        return $this->doDownMigration('1.0.0.php');
    }

    /**
     * Update DB migration
     *
     * @throws Exception
     */
    private function doUpdateMigration(string $filename): bool
    {
        $data = $this->loadMigration($filename);
        if (!array_key_exists('up', $data)) {
            return false;
        }
        return $this->doMigration($data['up']);
    }

    /**
     * Down migration
     *
     * @throws Exception
     */
    private function doDownMigration(string $filename): bool
    {
        $data = $this->loadMigration($filename);
        if (!array_key_exists('down', $data)) {
            return false;
        }
        return $this->doMigration($data['down']);
    }

    /**
     * Perform a migration
     *
     * @param array<string>|callable $migration
     *
     * @throws Exception
     */
    private function doMigration($migration): bool
    {
        try {
            if (is_callable($migration)) {
                $migration($this->manager);
            } else {
                foreach ($migration as $sql) {
                    $this->manager->getConnection()->prepare($sql)->execute();
                }
            }
        } catch (Exception $e) {
            $this->logger->error('Schema update failed', ['exception' => $e]);
            throw $e;
        }
        return true;
    }

    /**
     * Load DB migration
     *
     * @return array<mixed, mixed>
     *
     * @throws Exception
     */
    private function loadMigration(string $filename): array
    {
        $fullName = __DIR__ . '/Resources/migrations/' . $filename;
        if (file_exists($fullName)) {
            return include $fullName;
        }
        throw new Exception(sprintf('Migration file %s not found', $fullName));
    }
}
