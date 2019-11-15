<?php
namespace ModuleForest\ExtensionInstaller\Block\Adminhtml\Edit\Renderer;
use Magento\Framework\Data\Form\Element\AbstractElement;
class Info extends \Magento\Framework\Data\Form\Element\AbstractElement
{

    /**
     * Get the after element html.
     *
     * @return mixed
     */
    public function getHtml()
    {
        // here you can write your code.
        $infoDiv = "<div id='infodiv'>
This product from ModuleForest will allow you to install a Magento 2 extension package. Please note that for a successful installation, the package should qualify below Magento 2 extension package standards:
<ul>
<li>It should be in 'zip' format.</li>
<li>The composer.json and other extension directories(Block,Controller,Model etc should be at root of zip file).</li>
</ul>
<span class='notice'><strong>After successful installation of extension you have to manually enable it from admin path System > Web Setup Wizard > Component Manager.</strong></span>
<span class='poweredby'>
<label>Powered by</label> 
<a href='https://moduleforest.com' target='_blank'><img src='https://moduleforest.com/pub/media/logo/stores/1/logo.png' alt='ModuleForest.com'></a>
<label style='display: block'><a href='https://moduleforest.com' target='_blank'>(Visit our store)</a></label> 
</span>
</div>";
        return $infoDiv;
    }
}