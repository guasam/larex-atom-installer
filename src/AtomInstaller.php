<?php

namespace Guasam\LarexAtomInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;
use Exception;

/**
 * Atom Installer for Larex Framework
 */
class AtomInstaller extends LibraryInstaller
{
    /**
     * Target package type supported by this installer.
     */
    public const TARGET_PACKAGE_TYPE = 'larex-atom';

    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package): string
    {
        $suffix = '-atom';
        $name   = basename($package->getName());

        if (str_ends_with($name, $suffix)) {
            $name = trim($name, $suffix);
        } else {
            throw new Exception("Ensure your package's name ({$package->getName()}) is in the format [<vendor>/<name>-atom]");
        }

        return 'atoms' . DIRECTORY_SEPARATOR . $name;
    }

    /**
     * {@inheritDoc}
     */
    public function supports(string $packageType): bool
    {
        return $packageType === static::TARGET_PACKAGE_TYPE;
    }
}
