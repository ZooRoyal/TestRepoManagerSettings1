<?php

declare(strict_types=1);

namespace RdssExample\Command;

use Shopware\Commands\ShopwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * Class ExampleCommand
 *
 * Tells you just how awesome you are.
 */
class ExampleCommand extends ShopwareCommand
{
    /**
     * Configure
     */
    protected function configure(): void
    {
        $this->setName('rdss:example:command')
            ->setDescription('an example command');
    }

    /**
     * Execute
     */
    public function execute(InputInterface $input, OutputInterface $output): ?int
    {
        $output->writeln('You are awesome!');

        return null;
    }
}
