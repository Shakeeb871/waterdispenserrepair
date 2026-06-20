<?php
/**
 * Central business configuration.
 * Update these values with the client's real details before going live.
 * Used by the PHP contact form handler (contact.php).
 */

return [
    // Business identity
    'business_name'   => 'AquaFix UAE',
    'tagline'         => 'Water Dispenser Repair & Maintenance',

    // Contact channels
    'phone'           => '+971 50 000 0000',   // TODO: replace with real number
    'phone_link'      => '+971500000000',       // digits only, used for tel: links
    'whatsapp'        => '971500000000',         // country code + number, no +
    'email'           => 'info@aquafixuae.ae',   // TODO: replace with real inbox
    'email_to'        => 'info@aquafixuae.ae',   // where the contact form is delivered

    // Location
    'address'         => 'Dubai, United Arab Emirates',
    'service_areas'   => 'Dubai, Abu Dhabi, Sharjah, Ajman, Ras Al Khaimah, Fujairah, Umm Al Quwain',

    // Hours
    'hours'           => 'Mon – Sun: 8:00 AM – 10:00 PM',

    // Web
    'site_url'        => 'https://www.aquafixuae.ae', // TODO: replace with real domain
];
