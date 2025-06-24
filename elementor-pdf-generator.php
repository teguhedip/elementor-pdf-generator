<?php

/**
 * Plugin Name: Elementor Form PDF Generator by Teguh Edi P
 * Description: Creates and emails a PDF after Elementor form submission.
 * Version: 1.0
 * Author: Teguh Edi P
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

// Load WordPress core
require_once(ABSPATH . 'wp-load.php');

require_once plugin_dir_path(__FILE__) . 'libs/dompdf/autoload.inc.php';

// Ensure WordPress environment is loaded
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// Load WordPress core functions
if (!function_exists('esc_url')) {
    require_once(ABSPATH . 'wp-includes/pluggable.php');
}

if (!function_exists('sanitize_text_field')) {
    require_once(ABSPATH . 'wp-includes/formatting.php');
}

if (
    !function_exists('add_action') || !function_exists('register_rest_route') ||
    !class_exists('WP_REST_Request') || !class_exists('WP_REST_Response')
) {
    require_once(ABSPATH . 'wp-includes/pluggable.php');
    require_once(ABSPATH . 'wp-admin/includes/post.php');
    require_once(ABSPATH . 'wp-includes/rest-api.php');
}

use Dompdf\Dompdf;
use Dompdf\Options;


add_action('rest_api_init', function () {
    register_rest_route('custom/v1', '/generate-pdf/', [
        'methods' => 'POST',
        'callback' => 'efpg_handle_pdf_generation',
        'permission_callback' => '__return_true',
    ]);
});

function efpg_handle_pdf_generation(WP_REST_Request $request)
{
    $data = $request->get_params();
    $fields = $data['fields'];

    // Define variables and sanitize data.
    // Ensure 'child_foto' field value is a valid URL for the image.
    // $child_foto_url = isset($fields['child_foto']['value']) ? esc_url($fields['child_foto']['value']) : '';

    // Image URLs for logo and footer
    $image1 = plugins_url('images/image1.png', __FILE__);
    $image2 = plugins_url('images/image2.png', __FILE__);

    // Load template file
    $template = file_get_contents(plugin_dir_path(__FILE__) . 'register-form2.php');
    if ($template === false) {
        return new WP_REST_Response([
            'status' => 'error',
            'message' => 'Failed to load PDF template file. Please check path and permissions: ' . plugin_dir_path(__FILE__) . 'register-form2.php',
        ], 500);
    }

    // Prepare an array of placeholders and their corresponding values
    // Using an associative array for easier mapping and readability
    $replacements = [
        '<<ChildFoto>>'             => $fields['child_foto']['value'],
        '<<ChildsFullName>>'        => $fields['child_name']['value'],
        '<<ChildPlaceDateOfBirth>>' => $fields['child_birth_place_date']['value'],
        '<<ChildAddress>>'          => $fields['child_address']['value'],
        '<<ChildInterestOrHobby>>'  => $fields['child_hobby']['value'],
        '<<ChildAge>>'              => $fields['child_age']['value'],
        '<<ChildGender>>'           => $fields['child_gender']['value'],
        '<<FathersFullName>>'       => $fields['father_name']['value'],
        '<<FathersAddress>>'        => $fields['father_address']['value'],
        '<<FathersEmployment>>'     => $fields['father_job']['value'],
        '<<FathersOfficeAddress>>'  => $fields['father_office_address']['value'],
        '<<FathersInstagramAccount>>' => $fields['father_instagram']['value'],
        '<<FathersPhoneNumber>>'    => $fields['father_phone']['value'],
        '<<MothersFullName>>'       => $fields['mother_name']['value'],
        '<<MothersAddress>>'        => $fields['mother_address']['value'],
        '<<MothersEmployment>>'     => $fields['mother_job']['value'],
        '<<MothersWorkAddress>>'    => $fields['mother_office_address']['value'],
        '<<MothersInstagramAccount>>' => $fields['mother_instagram']['value'],
        '<<MothersPhoneNumber>>'    => $fields['mother_phone']['value'],
        '<<EmergencyFullName>>'     => $fields['emergency_full_name']['value'],
        '<<EmergencyAddress>>'      => $fields['emergency_address']['value'],
        '<<EmergencyRelationship>>' => $fields['emergency_relationship']['value'],
        '<<EmergencyPhoneNumber>>'  => $fields['emergency_phone']['value'],
        '<<HowDidYouKnow>>'         => $fields['info_how']['value'],
        '<<WhyYouChoose>>'          => $fields['info_why']['value'],
        '<<WhichBranch>>'           => $fields['info_branch']['value'],
        '<<WhatSchoolProgram>>'     => $fields['info_program']['value'],
        '<<LogoUrl>>'               => $image1,
        '<<FooterImageUrl>>'        => $image2
    ];

    $html = str_replace(array_keys($replacements), array_values($replacements), $template);

    $options = new Options();
    // Commented out font setting for reliability unless Comic Sans MS is installed for Dompdf.
    // If you need Comic Sans MS, you must install it for Dompdf using its font_family_extractor.php script.
    // $options->set('defaultFont', 'Comic Sans MS'); 
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isRemoteEnabled', true); // Critical for images loaded from URLs
    $options->set('dpi', 96); // Set DPI for consistent sizing (e.g., 96 for standard web DPI)
    $options->set('defaultPaperSize', 'A4'); // Ensure A4 is consistently set.
    $options->set('defaultPaperOrientation', 'portrait'); // Ensure portrait is consistently set.


    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    // setPaper is already handled by defaultPaperSize and defaultPaperOrientation options, so it's redundant here but harmless.
    // $dompdf->setPaper('A4', 'portrait'); 
    $dompdf->render();

    $upload_dir = wp_upload_dir();
    $pdf_filename = 'user-submission-' . time() . '.pdf';
    $pdf_path = $upload_dir['path'] . '/' . $pdf_filename;
    $pdf_url  = $upload_dir['url'] . '/' . $pdf_filename;

    // Create the directory if it doesn't exist
    if (!file_exists($upload_dir['path'])) {
        wp_mkdir_p($upload_dir['path']);
    }

    // Check if the file write was successful
    if (file_put_contents($pdf_path, $dompdf->output()) === false) {
        return new WP_REST_Response([
            'status' => 'error',
            'message' => 'Failed to save PDF file to: ' . $pdf_path . '. Check directory permissions.',
        ], 500);
    }

    // Email setup
    $subject = 'Your Form PDF Submission';
    // Use proper HTML for email body if headers specify HTML
    $message = '<p>Dear Applicant,</p><p>Thank you for your registration. Please find your submission details attached.</p>';
    $headers = array('Content-Type: text/html; charset=UTF-8');
    $attachments = [$pdf_path];

    // Send to admin
    // Always use get_option('admin_email') for admin email
    wp_mail(get_option('admin_email'), $subject, $message, $headers, $attachments);

    // Send to user - ensure $email variable is correctly assigned
    $user_email = $fields['email']['value'];
    if (is_email($user_email)) { // Validate email before sending
        wp_mail($user_email, $subject, $message, $headers, $attachments);
    }

    return new WP_REST_Response([
        'status' => 'PDF created and emailed',
        'pdf_url' => $pdf_url,
        // 'debug_pdf_path' => $pdf_path // Uncomment for debugging
    ], 200);
}
