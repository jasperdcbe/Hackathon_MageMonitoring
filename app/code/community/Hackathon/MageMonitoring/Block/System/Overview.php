<?php
/**
 * Magento
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade Magento to newer
 * versions in the future. If you wish to customize Magento for your
 * needs please refer to http://www.magentocommerce.com for more information.
 *
 * @category    Hackathon
 * @package     Hackathon_MageMonitoring
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */

class Hackathon_MageMonitoring_Block_System_Overview extends Mage_Adminhtml_Block_Widget_Form_Container
{
    public function __construct()
    {
        parent::__construct();
        $this->_blockGroup = 'magemonitoring';
        $this->_controller = 'system_overview';
        $this->_headerText = $this->__('Mage Monitoring');
        $this->_mode = 'read';
        
        $this->removeButton('reset');
        $this->removeButton('save');

        $this->addButton('flush_all_cache', array(
            'label' => $this->__('Flush All Caches'),
            'onclick' => 'confirmSetLocation(\''. $this->__('Do you really want to flush all caches?') .'\', \'' . $this->getUrl('*/*/flushallcache') .'\')',
            'class' => 'delete'
        ));
    }
    
    protected function _prepareLayout()
    {        
        $this->getLayout()->getBlock('left')->append($this->getLayout()->createBlock('magemonitoring/system_overview_read_tabs', 'magemonitoring_tabs'));
        return parent::_prepareLayout();
    }
}