<?php

namespace ws\loewe\Utils\Autoload;

/**
* exceptions thrown during autoload need to be linked statically
*/
require_once 'SourceFileNotFoundException.php';

/**
 * This class acts as a just-in-time autoloader for class files. Given a base directory, class files are looked up by mapping the classes namespace to a folder, and the class name to a file name in that particular folder.
 */
class Autoloader
{
    /**
     * the base directory from where to start looking for source files
     *
     * @var string
     */
    private $baseDirectory = null;

    /**
     * the extension of the source files to include
     *
     * @var string
     */
    private $extension = null;

    /**
     * This method acts as the constructor of the class.
     *
     * @param string $baseDirectory the base directory from where to start looking for source files
     */
    public function __construct($baseDirectory, $extension = 'inc')
    {
        $this->baseDirectory  = str_replace('\\', '/', $baseDirectory);
        $this->extension      = $extension;
    }

    /**
     * This method tries to load the source file associated with the class denoted by the given class name.
     *
     * If no source file can be found, a SourceFileNotFoundException will be thrown.
     *
     * @param string the name of the class to load the source file for
     */
    public function autoload($className)
    {
        try
        {
            if(file_exists($filename = $this->getFileName($className)))
                require_once $filename;

            else
                throw new SourceFileNotFoundException($className);
        }
        catch(SourceFileNotFoundException $sfnfe)
        {
            //var_dump($sfnfe->getMessage());
        }
    }

    /**
     * This method determines the file name for a given class name, taking the base directory into account.
     *
     * @param string the name of the class to load the source file for
     * @return string the absolute path to the source file
     */
    private function getFileName($className)
    {
        return $this->baseDirectory.str_replace('\\', '/', $className).'.'.$this->extension;
    }
}