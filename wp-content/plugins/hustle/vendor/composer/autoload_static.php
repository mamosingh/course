<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitda98371940d11703c56dee923bbb392f
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/inc',
    );

    public static $classMap = array (
        'Ctct\\Auth\\CtctDataStore' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Auth/CtctDataStore.php',
        'Ctct\\Auth\\CtctOAuth2' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Auth/CtctOAuth2.php',
        'Ctct\\Auth\\SessionDataStore' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Auth/SessionDataStore.php',
        'Ctct\\Components\\Account\\AccountInfo' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Account/AccountInfo.php',
        'Ctct\\Components\\Account\\VerifiedEmailAddress' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Account/VerifiedEmailAddress.php',
        'Ctct\\Components\\Activities\\Activity' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Activities/Activity.php',
        'Ctct\\Components\\Activities\\ActivityError' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Activities/ActivityError.php',
        'Ctct\\Components\\Activities\\AddContacts' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Activities/AddContacts.php',
        'Ctct\\Components\\Activities\\AddContactsImportData' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Activities/AddContactsImportData.php',
        'Ctct\\Components\\Activities\\ExportContacts' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Activities/ExportContacts.php',
        'Ctct\\Components\\Component' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Component.php',
        'Ctct\\Components\\Contacts\\Address' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Contacts/Address.php',
        'Ctct\\Components\\Contacts\\Contact' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Contacts/Contact.php',
        'Ctct\\Components\\Contacts\\ContactList' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Contacts/ContactList.php',
        'Ctct\\Components\\Contacts\\CustomField' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Contacts/CustomField.php',
        'Ctct\\Components\\Contacts\\EmailAddress' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Contacts/EmailAddress.php',
        'Ctct\\Components\\Contacts\\Note' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Contacts/Note.php',
        'Ctct\\Components\\EmailMarketing\\Campaign' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/EmailMarketing/Campaign.php',
        'Ctct\\Components\\EmailMarketing\\ClickThroughDetails' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/EmailMarketing/ClickThroughDetails.php',
        'Ctct\\Components\\EmailMarketing\\MessageFooter' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/EmailMarketing/MessageFooter.php',
        'Ctct\\Components\\EmailMarketing\\Schedule' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/EmailMarketing/Schedule.php',
        'Ctct\\Components\\EmailMarketing\\TestSend' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/EmailMarketing/TestSend.php',
        'Ctct\\Components\\Library\\File' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Library/File.php',
        'Ctct\\Components\\Library\\Folder' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Library/Folder.php',
        'Ctct\\Components\\Library\\Thumbnail' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Library/Thumbnail.php',
        'Ctct\\Components\\ResultSet' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/ResultSet.php',
        'Ctct\\Components\\Tracking\\BounceActivity' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Tracking/BounceActivity.php',
        'Ctct\\Components\\Tracking\\ClickActivity' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Tracking/ClickActivity.php',
        'Ctct\\Components\\Tracking\\ForwardActivity' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Tracking/ForwardActivity.php',
        'Ctct\\Components\\Tracking\\OpenActivity' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Tracking/OpenActivity.php',
        'Ctct\\Components\\Tracking\\SendActivity' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Tracking/SendActivity.php',
        'Ctct\\Components\\Tracking\\TrackingActivity' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Tracking/TrackingActivity.php',
        'Ctct\\Components\\Tracking\\TrackingSummary' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Tracking/TrackingSummary.php',
        'Ctct\\Components\\Tracking\\UnsubscribeActivity' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Components/Tracking/UnsubscribeActivity.php',
        'Ctct\\ConstantContact' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/ConstantContact.php',
        'Ctct\\Exceptions\\CtctException' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Exceptions/CtctException.php',
        'Ctct\\Exceptions\\IllegalArgumentException' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Exceptions/IllegalArgumentException.php',
        'Ctct\\Exceptions\\OAuth2Exception' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Exceptions/OAuth2Exception.php',
        'Ctct\\Services\\AccountService' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Services/AccountService.php',
        'Ctct\\Services\\ActivityService' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Services/ActivityService.php',
        'Ctct\\Services\\BaseService' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Services/BaseService.php',
        'Ctct\\Services\\CampaignScheduleService' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Services/CampaignScheduleService.php',
        'Ctct\\Services\\CampaignTrackingService' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Services/CampaignTrackingService.php',
        'Ctct\\Services\\ContactService' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Services/ContactService.php',
        'Ctct\\Services\\ContactTrackingService' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Services/ContactTrackingService.php',
        'Ctct\\Services\\EmailMarketingService' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Services/EmailMarketingService.php',
        'Ctct\\Services\\LibraryService' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Services/LibraryService.php',
        'Ctct\\Services\\ListService' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Services/ListService.php',
        'Ctct\\SplClassLoader' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/SplClassLoader.php',
        'Ctct\\Util\\Config' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Util/Config.php',
        'Ctct\\Util\\CurlResponse' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Util/CurlResponse.php',
        'Ctct\\Util\\RestClient' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Util/RestClient.php',
        'Ctct\\Util\\RestClientInterface' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/Util/RestClientInterface.php',
        'Ctct\\WebHooks\\CTCTWebhookUtil' => __DIR__ . '/../..' . '/inc/providers/constantcontact/CtCt/WebHooks/CTCTWebhookUtil.php',
        'Hustle_410_Migration' => __DIR__ . '/../..' . '/inc/update/class-hustle-410-migration.php',
        'Hustle_430_Migration' => __DIR__ . '/../..' . '/inc/update/class-hustle-430-migration.php',
        'Hustle_ActiveCampaign_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/activecampaign/hustle-activecampaign-form-hooks.php',
        'Hustle_Activecampaign' => __DIR__ . '/../..' . '/inc/providers/activecampaign/hustle-activecampaign.php',
        'Hustle_Activecampaign_Api' => __DIR__ . '/../..' . '/inc/providers/activecampaign/hustle-activecampaign-api.php',
        'Hustle_Activecampaign_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/activecampaign/hustle-activecampaign-form-settings.php',
        'Hustle_Addon_Aweber_Exception' => __DIR__ . '/../..' . '/inc/providers/aweber/hustle-addon-aweber-exception.php',
        'Hustle_Addon_Aweber_Form_Settings_Exception' => __DIR__ . '/../..' . '/inc/providers/aweber/hustle-addon-aweber-form-settings-exception.php',
        'Hustle_Addon_Aweber_Oauth' => __DIR__ . '/../..' . '/inc/providers/aweber/lib/class-aweber-oauth.php',
        'Hustle_Addon_Aweber_Oauth2' => __DIR__ . '/../..' . '/inc/providers/aweber/lib/class-aweber-oauth2.php',
        'Hustle_Addon_Aweber_Wp_Api' => __DIR__ . '/../..' . '/inc/providers/aweber/lib/class-wp-aweber-api.php',
        'Hustle_Addon_Aweber_Wp_Api_Exception' => __DIR__ . '/../..' . '/inc/providers/aweber/lib/class-wp-aweber-api-exception.php',
        'Hustle_Addon_Aweber_Wp_Api_Not_Found_Exception' => __DIR__ . '/../..' . '/inc/providers/aweber/lib/class-wp-aweber-api-not-found-exception.php',
        'Hustle_Admin_Page_Abstract' => __DIR__ . '/../..' . '/inc/class-hustle-admin-page-abstract.php',
        'Hustle_Aweber' => __DIR__ . '/../..' . '/inc/providers/aweber/hustle-aweber.php',
        'Hustle_Aweber_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/aweber/hustle-aweber-form-hooks.php',
        'Hustle_Aweber_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/aweber/hustle-aweber-form-settings.php',
        'Hustle_Campaignmonitor' => __DIR__ . '/../..' . '/inc/providers/campaignmonitor/hustle-campaignmonitor.php',
        'Hustle_Campaignmonitor_API' => __DIR__ . '/../..' . '/inc/providers/campaignmonitor/hustle-campaignmonitor-api.php',
        'Hustle_Campaignmonitor_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/campaignmonitor/hustle-campaignmonitor-form-hooks.php',
        'Hustle_Campaignmonitor_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/campaignmonitor/hustle-campaignmonitor-form-settings.php',
        'Hustle_Collection' => __DIR__ . '/../..' . '/inc/hustle-collection.php',
        'Hustle_Condition_Factory' => __DIR__ . '/../..' . '/inc/class-hustle-condition-factory.php',
        'Hustle_ConstantContact' => __DIR__ . '/../..' . '/inc/providers/constantcontact/hustle-constantcontact.php',
        'Hustle_ConstantContact_Api' => __DIR__ . '/../..' . '/inc/providers/constantcontact/hustle-constantcontact-api.php',
        'Hustle_ConstantContact_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/constantcontact/hustle-constantcontact-form-hooks.php',
        'Hustle_ConstantContact_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/constantcontact/hustle-constantcontact-form-settings.php',
        'Hustle_ConvertKit' => __DIR__ . '/../..' . '/inc/providers/convertkit/hustle-convertkit.php',
        'Hustle_ConvertKit_Api' => __DIR__ . '/../..' . '/inc/providers/convertkit/hustle-convertkit-api.php',
        'Hustle_ConvertKit_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/convertkit/hustle-convertkit-form-hooks.php',
        'Hustle_ConvertKit_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/convertkit/hustle-convertkit-form-settings.php',
        'Hustle_Custom_Fonts_Helper' => __DIR__ . '/../..' . '/inc/helpers/class-hustle-custom-fonts-helper.php',
        'Hustle_Dashboard_Admin' => __DIR__ . '/../..' . '/inc/class-hustle-dashboard-admin.php',
        'Hustle_Data' => __DIR__ . '/../..' . '/inc/class-hustle-data.php',
        'Hustle_Db' => __DIR__ . '/../..' . '/inc/class-hustle-db.php',
        'Hustle_Decorator_Abstract' => __DIR__ . '/../..' . '/inc/front/class-hustle-decorator_abstract.php',
        'Hustle_Decorator_Non_Sshare' => __DIR__ . '/../..' . '/inc/front/class-hustle-decorator-non-sshare.php',
        'Hustle_Decorator_Sshare' => __DIR__ . '/../..' . '/inc/front/class-hustle-decorator-sshare.php',
        'Hustle_Deletion' => __DIR__ . '/../..' . '/inc/hustle-deletion.php',
        'Hustle_E_Newsletter' => __DIR__ . '/../..' . '/inc/providers/e_newsletter/hustle-e-newsletter.php',
        'Hustle_E_Newsletter_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/e_newsletter/hustle-e-newsletter-form-hooks.php',
        'Hustle_E_Newsletter_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/e_newsletter/hustle-e-newsletter-form-settings.php',
        'Hustle_Embedded_Admin' => __DIR__ . '/../..' . '/inc/hustle-embedded-admin.php',
        'Hustle_Embedded_Display' => __DIR__ . '/../..' . '/inc/metas/embed/hustle-embedded-display.php',
        'Hustle_Embedded_Settings' => __DIR__ . '/../..' . '/inc/metas/embed/hustle-embedded-settings.php',
        'Hustle_Entries_Admin' => __DIR__ . '/../..' . '/inc/hustle-entries-admin.php',
        'Hustle_Entry_Model' => __DIR__ . '/../..' . '/inc/hustle-entry-model.php',
        'Hustle_GHBlock_Abstract' => __DIR__ . '/../..' . '/inc/providers/gutenberg/abstract-block.php',
        'Hustle_GHBlock_Embeds' => __DIR__ . '/../..' . '/inc/providers/gutenberg/blocks/block-embeds.php',
        'Hustle_GHBlock_Popup_Trigger' => __DIR__ . '/../..' . '/inc/providers/gutenberg/blocks/block-popup-trigger.php',
        'Hustle_GHBlock_Social_Share' => __DIR__ . '/../..' . '/inc/providers/gutenberg/blocks/block-social-share.php',
        'Hustle_GHBlock_slidein_Trigger' => __DIR__ . '/../..' . '/inc/providers/gutenberg/blocks/block-slidein-trigger.php',
        'Hustle_General_Data_Protection' => __DIR__ . '/../..' . '/inc/hustle-general-data-protection.php',
        'Hustle_Get_Response' => __DIR__ . '/../..' . '/inc/providers/getresponse/hustle-get-response.php',
        'Hustle_Get_Response_Api' => __DIR__ . '/../..' . '/inc/providers/getresponse/hustle-get-response-api.php',
        'Hustle_Get_Response_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/getresponse/hustle-get-response-form-hooks.php',
        'Hustle_Get_Response_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/getresponse/hustle-get-response-form-settings.php',
        'Hustle_Gutenberg' => __DIR__ . '/../..' . '/inc/providers/gutenberg/gutenberg.php',
        'Hustle_HubSpot' => __DIR__ . '/../..' . '/inc/providers/hubspot/hustle-hubspot.php',
        'Hustle_HubSpot_Api' => __DIR__ . '/../..' . '/inc/providers/hubspot/hustle-hubspot-api.php',
        'Hustle_HubSpot_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/hubspot/hustle-hubspot-form-hooks.php',
        'Hustle_HubSpot_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/hubspot/hustle-hubspot-form-settings.php',
        'Hustle_Icontact' => __DIR__ . '/../..' . '/inc/providers/icontact/hustle-icontact.php',
        'Hustle_Icontact_Api' => __DIR__ . '/../..' . '/inc/providers/icontact/hustle-icontact-api.php',
        'Hustle_Icontact_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/icontact/hustle-icontact-form-hooks.php',
        'Hustle_Icontact_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/icontact/hustle-icontact-form-settings.php',
        'Hustle_InfusionSoft_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/infusionsoft/hustle-infusion-soft-form-hooks.php',
        'Hustle_Infusion_Soft' => __DIR__ . '/../..' . '/inc/providers/infusionsoft/hustle-infusion-soft.php',
        'Hustle_Infusion_Soft_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/infusionsoft/hustle-infusion-soft-form-settings.php',
        'Hustle_Init' => __DIR__ . '/../..' . '/inc/hustle-init.php',
        'Hustle_Layout_Helper' => __DIR__ . '/../..' . '/inc/helpers/class-hustle-layout-helper.php',
        'Hustle_Local_List' => __DIR__ . '/../..' . '/inc/providers/local-list/hustle-local-list.php',
        'Hustle_Local_List_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/local-list/hustle-local-list-form-hooks.php',
        'Hustle_Local_List_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/local-list/hustle-local-list-form-settings.php',
        'Hustle_Mad_Mimi' => __DIR__ . '/../..' . '/inc/providers/madmimi/hustle-mad-mimi.php',
        'Hustle_Mad_Mimi_Api' => __DIR__ . '/../..' . '/inc/providers/madmimi/hustle-mad-mimi-api.php',
        'Hustle_Mad_Mimi_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/madmimi/hustle-mad-mimi-form-hooks.php',
        'Hustle_Mad_Mimi_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/madmimi/hustle-mad-mimi-form-settings.php',
        'Hustle_Mail' => __DIR__ . '/../..' . '/inc/hustle-mail.php',
        'Hustle_Mailchimp' => __DIR__ . '/../..' . '/inc/providers/mailchimp/hustle-mailchimp.php',
        'Hustle_Mailchimp_Api' => __DIR__ . '/../..' . '/inc/providers/mailchimp/hustle-mailchimp-api.php',
        'Hustle_Mailchimp_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/mailchimp/hustle-mailchimp-form-hooks.php',
        'Hustle_Mailchimp_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/mailchimp/hustle-mailchimp-form-settings.php',
        'Hustle_MailerLite' => __DIR__ . '/../..' . '/inc/providers/mailerlite/hustle-mailerlite.php',
        'Hustle_MailerLite_Api' => __DIR__ . '/../..' . '/inc/providers/mailerlite/hustle-mailerlite-api.php',
        'Hustle_MailerLite_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/mailerlite/hustle-mailerlite-form-hooks.php',
        'Hustle_MailerLite_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/mailerlite/hustle-mailerlite-form-settings.php',
        'Hustle_Mautic' => __DIR__ . '/../..' . '/inc/providers/mautic/hustle-mautic.php',
        'Hustle_Mautic_Api' => __DIR__ . '/../..' . '/inc/providers/mautic/hustle-mautic-api.php',
        'Hustle_Mautic_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/mautic/hustle-mautic-form-hooks.php',
        'Hustle_Mautic_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/mautic/hustle-mautic-form-settings.php',
        'Hustle_Meta' => __DIR__ . '/../..' . '/inc/hustle-meta.php',
        'Hustle_Meta_Base_Content' => __DIR__ . '/../..' . '/inc/metas/class-hustle-meta-base-content.php',
        'Hustle_Meta_Base_Design' => __DIR__ . '/../..' . '/inc/metas/class-hustle-meta-base-design.php',
        'Hustle_Meta_Base_Display' => __DIR__ . '/../..' . '/inc/metas/class-hustle-meta-base-display.php',
        'Hustle_Meta_Base_Emails' => __DIR__ . '/../..' . '/inc/metas/class-hustle-meta-base-emails.php',
        'Hustle_Meta_Base_Integrations' => __DIR__ . '/../..' . '/inc/metas/class-hustle-meta-base-integrations.php',
        'Hustle_Meta_Base_Settings' => __DIR__ . '/../..' . '/inc/metas/class-hustle-meta-base-settings.php',
        'Hustle_Meta_Base_Visibility' => __DIR__ . '/../..' . '/inc/metas/class-hustle-meta-base-visibility.php',
        'Hustle_Migration' => __DIR__ . '/../..' . '/inc/hustle-migration.php',
        'Hustle_Model' => __DIR__ . '/../..' . '/inc/hustle-model.php',
        'Hustle_Module_Admin' => __DIR__ . '/../..' . '/inc/class-hustle-module-admin.php',
        'Hustle_Module_Collection' => __DIR__ . '/../..' . '/inc/class-hustle-module-collection.php',
        'Hustle_Module_Decorator' => __DIR__ . '/../..' . '/inc/class-hustle-module-decorator.php',
        'Hustle_Module_Front' => __DIR__ . '/../..' . '/inc/front/hustle-module-front.php',
        'Hustle_Module_Front_Ajax' => __DIR__ . '/../..' . '/inc/front/hustle-module-front-ajax.php',
        'Hustle_Module_Model' => __DIR__ . '/../..' . '/inc/hustle-module-model.php',
        'Hustle_Module_Page_Abstract' => __DIR__ . '/../..' . '/inc/class-hustle-module-page-abstract.php',
        'Hustle_Module_Preview' => __DIR__ . '/../..' . '/inc/front/class-hustle-module-preview.php',
        'Hustle_Module_Renderer' => __DIR__ . '/../..' . '/inc/front/hustle-module-renderer.php',
        'Hustle_Module_Widget' => __DIR__ . '/../..' . '/inc/hustle-module-widget.php',
        'Hustle_Module_Widget_Legacy' => __DIR__ . '/../..' . '/inc/hustle-module-widget-legacy.php',
        'Hustle_Modules_Common_Admin' => __DIR__ . '/../..' . '/inc/hustle-modules-common-admin.php',
        'Hustle_Modules_Common_Admin_Ajax' => __DIR__ . '/../..' . '/inc/hustle-modules-common-admin-ajax.php',
        'Hustle_New_SendGrid_Api' => __DIR__ . '/../..' . '/inc/providers/sendgrid/hustle-sendgrid-api-new.php',
        'Hustle_Notifications' => __DIR__ . '/../..' . '/inc/class-hustle-notifications.php',
        'Hustle_Palettes_Helper' => __DIR__ . '/../..' . '/inc/helpers/class-hustle-palettes-helper.php',
        'Hustle_Popup_Admin' => __DIR__ . '/../..' . '/inc/hustle-popup-admin.php',
        'Hustle_Popup_Content' => __DIR__ . '/../..' . '/inc/metas/popup/hustle-popup-content.php',
        'Hustle_Popup_Emails' => __DIR__ . '/../..' . '/inc/metas/popup/hustle-popup-emails.php',
        'Hustle_Popup_Integrations' => __DIR__ . '/../..' . '/inc/metas/popup/hustle-popup-integrations.php',
        'Hustle_Popup_Settings' => __DIR__ . '/../..' . '/inc/metas/popup/hustle-popup-settings.php',
        'Hustle_Popup_Visbility' => __DIR__ . '/../..' . '/inc/metas/popup/hustle-popup-visbility.php',
        'Hustle_Provider_Abstract' => __DIR__ . '/../..' . '/inc/provider/class-hustle-provider-abstract.php',
        'Hustle_Provider_Admin_Ajax' => __DIR__ . '/../..' . '/inc/provider/class-hustle-provider-admin-ajax.php',
        'Hustle_Provider_Autoload' => __DIR__ . '/../..' . '/inc/provider/class-hustle-provider-autoload.php',
        'Hustle_Provider_Container' => __DIR__ . '/../..' . '/inc/provider/class-hustle-provider-container.php',
        'Hustle_Provider_Form_Hooks_Abstract' => __DIR__ . '/../..' . '/inc/provider/class-hustle-provider-form-hooks-abstract.php',
        'Hustle_Provider_Form_Settings_Abstract' => __DIR__ . '/../..' . '/inc/provider/class-hustle-provider-form-settings-abstract.php',
        'Hustle_Provider_Interface' => __DIR__ . '/../..' . '/inc/provider/class-hustle-provider-interface.php',
        'Hustle_Provider_Utils' => __DIR__ . '/../..' . '/inc/provider/class-hustle-provider-utils.php',
        'Hustle_Providers' => __DIR__ . '/../..' . '/inc/hustle-providers.php',
        'Hustle_Providers_Admin' => __DIR__ . '/../..' . '/inc/hustle-providers-admin.php',
        'Hustle_Renderer_Abstract' => __DIR__ . '/../..' . '/inc/front/hustle-renderer-abstract.php',
        'Hustle_Renderer_Sshare' => __DIR__ . '/../..' . '/inc/front/hustle-renderer-sshare.php',
        'Hustle_SShare_Admin' => __DIR__ . '/../..' . '/inc/hustle-sshare-admin.php',
        'Hustle_SShare_Content' => __DIR__ . '/../..' . '/inc/metas/sshare/hustle-sshare-content.php',
        'Hustle_SShare_Design' => __DIR__ . '/../..' . '/inc/metas/sshare/hustle-sshare-design.php',
        'Hustle_SShare_Display' => __DIR__ . '/../..' . '/inc/metas/sshare/hustle-sshare-display.php',
        'Hustle_SShare_Model' => __DIR__ . '/../..' . '/inc/hustle-sshare-model.php',
        'Hustle_SendGrid' => __DIR__ . '/../..' . '/inc/providers/sendgrid/hustle-sendgrid.php',
        'Hustle_SendGrid_Api' => __DIR__ . '/../..' . '/inc/providers/sendgrid/hustle-sendgrid-api.php',
        'Hustle_SendGrid_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/sendgrid/hustle-sendgrid-form-settings.php',
        'Hustle_Sendgrid_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/sendgrid/hustle-sendgrid-form-hooks.php',
        'Hustle_SendinBlue' => __DIR__ . '/../..' . '/inc/providers/sendinblue/hustle-sendinblue.php',
        'Hustle_SendinBlue_Api' => __DIR__ . '/../..' . '/inc/providers/sendinblue/hustle-sendinblue-api.php',
        'Hustle_SendinBlue_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/sendinblue/hustle-sendinblue-form-hooks.php',
        'Hustle_SendinBlue_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/sendinblue/hustle-sendinblue-form-settings.php',
        'Hustle_Sendy' => __DIR__ . '/../..' . '/inc/providers/sendy/hustle-sendy.php',
        'Hustle_Sendy_API' => __DIR__ . '/../..' . '/inc/providers/sendy/hustle-sendy-api.php',
        'Hustle_Sendy_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/sendy/hustle-sendy-form-hooks.php',
        'Hustle_Sendy_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/sendy/hustle-sendy-form-settings.php',
        'Hustle_Settings_Admin' => __DIR__ . '/../..' . '/inc/class-hustle-settings-admin.php',
        'Hustle_Settings_Admin_Ajax' => __DIR__ . '/../..' . '/inc/hustle-settings-admin-ajax.php',
        'Hustle_Settings_Page' => __DIR__ . '/../..' . '/inc/hustle-settings-page.php',
        'Hustle_Slidein_Admin' => __DIR__ . '/../..' . '/inc/hustle-slidein-admin.php',
        'Hustle_Slidein_Settings' => __DIR__ . '/../..' . '/inc/metas/slidein/hustle-slidein-settings.php',
        'Hustle_Templates_Helper' => __DIR__ . '/../..' . '/inc/helpers/class-hustle-templates-helper.php',
        'Hustle_Time_Helper' => __DIR__ . '/../..' . '/inc/helpers/class-hustle-time-helper.php',
        'Hustle_Tracking_Model' => __DIR__ . '/../..' . '/inc/hustle-tracking-model.php',
        'Hustle_Upsell_Page' => __DIR__ . '/../..' . '/inc/class-hustle-upsell-page.php',
        'Hustle_Wp_Dashboard_Page' => __DIR__ . '/../..' . '/inc/class-hustle-wp-dashboard-page.php',
        'Hustle_Zapier' => __DIR__ . '/../..' . '/inc/providers/zapier/hustle-zapier.php',
        'Hustle_Zapier_API' => __DIR__ . '/../..' . '/inc/providers/zapier/hustle-zapier-api.php',
        'Hustle_Zapier_Form_Hooks' => __DIR__ . '/../..' . '/inc/providers/zapier/hustle-zapier-form-hooks.php',
        'Hustle_Zapier_Form_Settings' => __DIR__ . '/../..' . '/inc/providers/zapier/hustle-zapier-form-settings.php',
        'Opt_In_Condition_Abstract' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-abstract.php',
        'Opt_In_Condition_Archive_Pages' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-archive-pages.php',
        'Opt_In_Condition_Categories' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-categories.php',
        'Opt_In_Condition_Cookie_Set' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-cookie-set.php',
        'Opt_In_Condition_Cpt' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-cpt.php',
        'Opt_In_Condition_From_Referrer' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-from-referrer.php',
        'Opt_In_Condition_On_Browser' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-on-browser.php',
        'Opt_In_Condition_On_Url' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-on-url.php',
        'Opt_In_Condition_Page_Templates' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-page-templates.php',
        'Opt_In_Condition_Pages' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-pages.php',
        'Opt_In_Condition_Posts' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-posts.php',
        'Opt_In_Condition_Shown_Less_Than' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-shown-less-than.php',
        'Opt_In_Condition_Source_Of_Arrival' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-source-of-arrival.php',
        'Opt_In_Condition_Tags' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-tags.php',
        'Opt_In_Condition_User_Registration' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-user-registration.php',
        'Opt_In_Condition_User_Roles' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-user-roles.php',
        'Opt_In_Condition_Visitor_Commented' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-visitor-commented.php',
        'Opt_In_Condition_Visitor_Country' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-visitor-country.php',
        'Opt_In_Condition_Visitor_Device' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-visitor-device.php',
        'Opt_In_Condition_Visitor_Logged_In_Status' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-visitor-logged-in-status.php',
        'Opt_In_Condition_Wc_Archive_Pages' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-wc-archive-pages.php',
        'Opt_In_Condition_Wc_Categories' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-wc-categories.php',
        'Opt_In_Condition_Wc_Pages' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-wc-pages.php',
        'Opt_In_Condition_Wc_Static_Pages' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-wc-static-pages.php',
        'Opt_In_Condition_Wc_Tags' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-wc-tags.php',
        'Opt_In_Condition_Wp_Conditions' => __DIR__ . '/../..' . '/inc/display-conditions/class-opt-in-condition-wp-conditions.php',
        'Opt_In_Geo' => __DIR__ . '/../..' . '/inc/opt-in-geo.php',
        'Opt_In_Infusionsoft_Api' => __DIR__ . '/../..' . '/inc/providers/infusionsoft/hustle-infusion-soft-api.php',
        'Opt_In_Infusionsoft_XML_Res' => __DIR__ . '/../..' . '/inc/providers/infusionsoft/hustle-infusion-soft-api.php',
        'Opt_In_Utils' => __DIR__ . '/../..' . '/inc/opt-in-utils.php',
        'Opt_In_WPMUDEV_API' => __DIR__ . '/../..' . '/inc/opt-in-wpmudev-api.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInitda98371940d11703c56dee923bbb392f::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInitda98371940d11703c56dee923bbb392f::$classMap;

        }, null, ClassLoader::class);
    }
}