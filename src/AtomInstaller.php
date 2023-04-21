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
     * Supported package type supported by this installer.
     */
    const ATOM_PACKAGE_TYPE = 'larex-atom';

    /**
     * {@inheritDoc}
     */
    public function getInstallPath(PackageInterface $package)
    {
        return $this->getAtomInstallPath($package->getName());
    }

    /**
     * {@inheritDoc}
     */
    public function supports(string $packageType)
    {
        return $packageType === self::ATOM_PACKAGE_TYPE;
    }

    /**
     * Get atom installation path.
     *
     * @return string
     */
    private function getAtomInstallPath(string $packageName): string
    {
        $suffix = '-atom';
        $name   = basename($packageName);

        if (str_ends_with($name, $suffix)) {
            $name = trim($name, $suffix);
        } else {
            throw new Exception("Ensure your package's name ({$packageName}) is in the format [<vendor>/<name>-atom]");
        }

        return 'atoms' . DIRECTORY_SEPARATOR . $name;
    }
}
