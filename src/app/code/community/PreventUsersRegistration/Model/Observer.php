<?php

class Boraso_PreventUsersRegistration_Model_Observer
{
    protected $helper;

    public function __construct()
    {
        $this->helper = Mage::helper('boraso_preventusersregistration');
    }

    public function controllerActionPredispatchCustomerAccountCreate(Varien_Event_Observer $observer)
    {
        if( $this->helper->preventUsersRegistration() ) {

            Mage::app()->getResponse()->setRedirect(Mage::getUrl('customer/account/login'))->sendResponse();
            exit();
        }
    }
}
