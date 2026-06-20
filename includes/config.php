<?php
/**
 * Central business configuration.
 * Update these values with the client's real details before going live.
 * Used by the PHP contact form handler (contact.php).
 */

return [
    // Business identity
    'business_name'   => 'Water Dispenser Repair',
    'tagline'         => 'Water Dispenser Repair & Maintenance',

    // Contact channels
    'phone'           => '+971 50 159 0802',   // TODO: replace with real number
    'phone_link'      => '+971501590802',       // digits only, used for tel: links
    'whatsapp'        => '971501590802',         // country code + number, no +
    'email'           => 'info@waterdispenserrepair.ae',   // TODO: replace with real inbox
    'email_to'        => 'info@waterdispenserrepair.ae',   // where the contact form is delivered

    // Location
    'address'         => 'Dubai, Sharjah & Abu Dhabi, United Arab Emirates',
    'service_areas'   => 'Dubai, Sharjah, Abu Dhabi & across the UAE',

    // Branch locations
    'locations'       => [
        [
            'city'    => 'Dubai',
            'address' => 'Al Furjan, Jebel Ali Village, Dubai, United Arab Emirates',
        ],
        [
            'city'    => 'Sharjah',
            'address' => '8CH7+HVR, Industrial Area, Sharjah, United Arab Emirates',
        ],
        [
            'city'    => 'Abu Dhabi',
            'address' => 'M7, مصفح 7, Musaffah, Abu Dhabi, United Arab Emirates',
        ],
    ],

    // Hours
    'hours'           => 'Mon – Sun: 8:00 AM – 10:00 PM',

    // Web
    'site_url'        => 'https://waterdispenserrepair.ae', // TODO: replace with real domain
];
