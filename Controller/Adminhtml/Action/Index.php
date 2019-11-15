<?php
namespace ModuleForest\ExtensionInstaller\Controller\Adminhtml\Action;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    const ADMIN_RESOURCE = 'ModuleForest_ExtensionInstaller::install';

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $this->initPage($resultPage);
        $resultPage->getConfig()->getTitle()->prepend(__('Extension Installer'));
        return $resultPage;
    }

    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('ModuleForest_ExtensionInstaller::install')
            ->addBreadcrumb(__('ModuleForest'), __('ModuleForest'))
            ->addBreadcrumb(__('Extension Installer'), __('Extension Installer'));
        return $resultPage;
    }
}
