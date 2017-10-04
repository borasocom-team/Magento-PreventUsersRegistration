<?php

class Boraso_PreventUsersRegistration_Helper_Data extends Mage_Core_Helper_Abstract
{
    const SETTING_ALLOWUSERSREGISTRATION = 'preventusersregistration/settings/allowusersregistration';


    public function preventUsersRegistration()
    {
        return !Mage::getStoreConfig(self::SETTING_ALLOWUSERSREGISTRATION);
    }


    public function allowUsersRegistration()
    {
        return Mage::getStoreConfig(self::SETTING_ALLOWUSERSREGISTRATION);
    }
}
