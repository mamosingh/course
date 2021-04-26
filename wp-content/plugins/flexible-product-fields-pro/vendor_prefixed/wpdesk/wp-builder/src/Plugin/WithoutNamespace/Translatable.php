<?php

namespace FPFProVendor;

if (!\interface_exists('FPFProVendor\\WPDesk_Translable')) {
    require_once 'Translable.php';
}
interface WPDesk_Translatable extends \FPFProVendor\WPDesk_Translable
{
    /** @return string */
    public function get_text_domain();
}
