<?php

namespace Guasam\LarexAtomInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

/**
 * Atom Installer - Larex Framework
 */
class AtomInstaller extends LibraryInstaller
{
    /**
     * Target package type supported by this installer.
     */
    const TARGET_PACKAGE_TYPE = 'larex-atom';

    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package): string
    {
        return 'atoms' . DIRECTORY_SEPARATOR . basename($package->getName());
    }

    /**
     * {@inheritDoc}
     */
    public function supports(string $packageType): bool
    {
        return $packageType === static::TARGET_PACKAGE_TYPE;
    }
}
