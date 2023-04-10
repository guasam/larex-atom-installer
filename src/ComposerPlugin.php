<?php

namespace Guasam\LarexAtomInstaller;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

/**
 * Larex Atom Installer Composer Plugin - Larex Framework
 */
class ComposerPlugin implements PluginInterface
{
    /**
     * {@inheritDoc}
     */
    public function activate(Composer $composer, IOInterface $io): void
    {
        $installer = new AtomInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }

    /**
     * {@inheritDoc}
     */
    public function deactivate(Composer $composer, IOInterface $io): void
    {
        $installer = new AtomInstaller($io, $composer);
        $composer->getInstallationManager()->removeInstaller($installer);
    }

    /**
     * {@inheritDoc}
     */
    public function uninstall(Composer $composer, IOInterface $io): void
    {
        $installer = new AtomInstaller($io, $composer);
        $composer->getInstallationManager()->removeInstaller($installer);
    }
}
