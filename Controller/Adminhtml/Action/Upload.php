<?php
namespace ModuleForest\ExtensionInstaller\Controller\Adminhtml\Action;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Filesystem\DirectoryList;

class Upload extends Action
{
    const ADMIN_RESOURCE = 'ModuleForest_ExtensionInstaller::install';

    protected $_directoryList;

    public function __construct(
        Context $context,
        DirectoryList $directoryList
    ) {
        $this->_directoryList = $directoryList;
        parent::__construct($context);
    }

    public function execute()
    {
        try {
            $success = false;
            if (isset($_FILES['package']['name'])) {
                $uploader = new \Magento\Framework\File\Uploader('package');
                $uploader->setAllowedExtensions(['zip']);
                $uploader->setAllowRenameFiles(false);
                $uploader->setFilesDispersion(false);
                $tmpPath  = $this->_directoryList->getPath('var') . '/ModuleForest/tmp/';
                $response = $uploader->save($tmpPath, $_FILES['package']['name']);
                $file     = $response['file'];
                $filepath = $tmpPath . $file;
                $zip = new \ZipArchive();
                $x = $zip->open($filepath);
                if ($x === true) {
                    $composerFile = $zip->getFromName('composer.json');
                    $rootContent = $zip->statIndex(0);
                    if ($composerFile) {
                        $composerFileContent = json_decode($composerFile, true);
                        if (isset($composerFileContent['autoload'])) {
                            $modulePath = array_filter(explode('\\', key($composerFileContent['autoload']['psr-4'])));
                            if (count($modulePath) == 2) {
                                $targetPath = $this->_directoryList->getPath('app') . '/code/' . $modulePath[0] . '/' . $modulePath[1] . '/';
                                $zip->extractTo($targetPath); // change this to the correct site path
                                $zip->close();
                                $this->messageManager->addSuccessMessage('Extension has been uploaded successfully. Please go ahead and activate it.');
                                $success = true;
                            } else {
                                $this->messageManager->addErrorMessage('composer.json file of package file doesn\'t contain valid entry under "psr-4" section.');
                            }
                        } else {
                            $this->messageManager->addErrorMessage('composer.json file of package file doesn\'t contain autoload section.');
                        }
                    } elseif (isset($rootContent['name']) && $rootContent['name'] == "app/") {
                        $zip->extractTo($this->_directoryList->getRoot()); // change this to the correct site path
                        $zip->close();
                        $this->messageManager->addSuccessMessage('Extension has been uploaded successfully. Please go ahead and activate it.');
                        $success = true;
                    } else {
                        $this->messageManager->addErrorMessage('Package file is invalid as doesn\'t contain a composer.json file.');
                    }
                    unlink($filepath);
                } else {
                    $this->messageManager->addErrorMessage('Some error occurred during extension installation.');
                }
            } else {
                $this->messageManager->addErrorMessage('Extension package is not selected. Please retry.');
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e->getMessage());
        }
        if ($success) {
            $this->_redirect('extension_installer/action/index', ["package_uploaded" => 1]);
        } else {
            $this->_redirect('extension_installer/action/index');
        }
    }
}
