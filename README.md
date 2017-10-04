# Magento-PreventUsersRegistration
This basic Magento1 module exposes a new admin option and a couple of related methods to disable users (customers) registration on the frontend.

1. The module defaults to "allow registrations" (no changes from Magento default behaviour)
1. Activate it at default/website/store level via `Admin -> System -> Configuration -> Prevent users registration`
1. As soon as the module is active, `/customer/account/create/` redirects to `/customer/account/login/`
1. You must manually edit your templates to hide all the links to the registration page: see a worked-for-me list at the bottom


Template example
----------------
````
<?php
if( Mage::helper('boraso_preventusersregistration')->allowUsersRegistration() ) { ?>

	<a href="/customer/account/create/">REGISTER NOW!</a>

<?php
}//end Registrazione abilitata
?>
````


Template file list
------------------
These files have at least one link to the registration page. It must be wrapped as shown above.

1. /app/design/frontend/linkspa/default/template/page/html/header.phtml
1. /app/design/frontend/linkspa/default/template/persistent/checkout/onepage/login.phtml
1. /app/design/frontend/linkspa/default/template/persistent/customer/form/login.phtml
1. /app/design/frontend/linkspa/default/template/customer/form/login.phtml ([unused?](https://magento.stackexchange.com/a/187996/50130))



Install script
--------------
If you want to automatically disable disable users (customers) registration at install-time, package this code as an install/upgrade script:

````
<?php
/**
 * Disabilito registrazione utenti su website EN
 * ---------------------------------------------
 *
 * Questo valore viene letto da Boraso_PreventUsersRegistration
 */

$installer = $this;

$installer->startSetup();

Mage::getConfig()->saveConfig('preventusersregistration/settings/allowusersregistration', '0', 'websites', 2);

$installer->endSetup();
````

Replace `websites` with the desired scope and `2` with the ID.
