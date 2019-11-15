<?php
namespace ModuleForest\ExtensionInstaller\Block\Adminhtml\Form\Cli;

use Magento\Framework\View\Element\Template;

class Activator extends Template
{
    protected $_template = 'ModuleForest_ExtensionInstaller::cli/activator.phtml';

    protected $dir;

    public function __construct(
        \Magento\Framework\Filesystem\DirectoryList $dir,
        Template\Context $context,
        array $data = []
    ) {
        $this->dir = $dir;
        parent::__construct($context, $data);
    }

    public function getLogFile()
    {
        return $this->dir->getPath('var') . '/mfcli.txt';
    }
}
