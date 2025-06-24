<?php
// file: elementor-pdf-generator.php
// @intelephense disable
// Plugin ini berjalan dalam lingkungan WordPress, semua fungsi dan konstanta tersedia

/**
 * Plugin Name: Elementor Form PDF Generator by Teguh Edi P
 * Description: Creates and emails a PDF after Elementor form submission.
 * Version: 1.0
 * Author: Teguh Edi P
 */

require_once plugin_dir_path(__FILE__) . 'libs/dompdf/autoload.inc.php';

// Ensure WordPress functions like esc_url are available
if (! function_exists('esc_url')) {
    require_once(ABSPATH . 'wp-includes/pluggable.php');
}

use Dompdf\Dompdf;
use Dompdf\Options;
use WP_REST_Request;
use WP_REST_Response;

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
    $child_foto_url = isset($fields['child_foto']['value']) ? esc_url($fields['child_foto']['value']) : '';

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
        '<<ChildFoto>>'             => $child_foto_url,
        '<<ChildsFullName>>'        => isset($fields['child_name']['value']) ? sanitize_text_field($fields['child_name']['value']) : '',
        '<<ChildPlaceDateOfBirth>>' => isset($fields['child_birth_place_date']['value']) ? sanitize_text_field($fields['child_birth_place_date']['value']) : '',
        '<<ChildAddress>>'          => isset($fields['child_address']['value']) ? sanitize_text_field($fields['child_address']['value']) : '',
        '<<ChildInterestOrHobby>>'  => isset($fields['child_hobby']['value']) ? sanitize_text_field($fields['child_hobby']['value']) : '',
        '<<ChildAge>>'              => isset($fields['child_age']['value']) ? sanitize_text_field($fields['child_age']['value']) : '',
        '<<ChildGender>>'           => isset($fields['child_gender']['value']) ? sanitize_text_field($fields['child_gender']['value']) : '',
        '<<FathersFullName>>'       => isset($fields['father_name']['value']) ? sanitize_text_field($fields['father_name']['value']) : '',
        '<<FathersAddress>>'        => isset($fields['father_address']['value']) ? sanitize_text_field($fields['father_address']['value']) : '',
        '<<FathersEmployment>>'     => isset($fields['father_job']['value']) ? sanitize_text_field($fields['father_job']['value']) : '',
        '<<FathersOfficeAddress>>'  => isset($fields['father_office_address']['value']) ? sanitize_text_field($fields['father_office_address']['value']) : '',
        '<<FathersInstagramAccount>>' => isset($fields['father_instagram']['value']) ? sanitize_text_field($fields['father_instagram']['value']) : '',
        '<<FathersPhoneNumber>>'    => isset($fields['father_phone']['value']) ? sanitize_text_field($fields['father_phone']['value']) : '',
        '<<MothersFullName>>'       => isset($fields['mother_name']['value']) ? sanitize_text_field($fields['mother_name']['value']) : '',
        '<<MothersAddress>>'        => isset($fields['mother_address']['value']) ? sanitize_text_field($fields['mother_address']['value']) : '',
        '<<MothersEmployment>>'     => isset($fields['mother_job']['value']) ? sanitize_text_field($fields['mother_job']['value']) : '',
        '<<MothersWorkAddress>>'    => isset($fields['mother_office_address']['value']) ? sanitize_text_field($fields['mother_office_address']['value']) : '',
        '<<MothersInstagramAccount>>' => isset($fields['mother_instagram']['value']) ? sanitize_text_field($fields['mother_instagram']['value']) : '',
        '<<MothersPhoneNumber>>'    => isset($fields['mother_phone']['value']) ? sanitize_text_field($fields['mother_phone']['value']) : '',
        '<<EmergencyFullName>>'     => isset($fields['emergency_full_name']['value']) ? sanitize_text_field($fields['emergency_full_name']['value']) : '',
        '<<EmergencyAddress>>'      => isset($fields['emergency_address']['value']) ? sanitize_text_field($fields['emergency_address']['value']) : '',
        '<<EmergencyRelationship>>' => isset($fields['emergency_relationship']['value']) ? sanitize_text_field($fields['emergency_relationship']['value']) : '',
        '<<EmergencyPhoneNumber>>'  => isset($fields['emergency_phone']['value']) ? sanitize_text_field($fields['emergency_phone']['value']) : '',
        '<<HowDidYouKnow>>'         => isset($fields['info_how']['value']) ? sanitize_text_field($fields['info_how']['value']) : '',
        '<<WhyYouChoose>>'          => isset($fields['info_why']['value']) ? sanitize_text_field($fields['info_why']['value']) : '',
        '<<WhichBranch>>'           => isset($fields['info_branch']['value']) ? sanitize_text_field($fields['info_branch']['value']) : '',
        '<<WhatSchoolProgram>>'     => isset($fields['info_program']['value']) ? sanitize_text_field($fields['info_program']['value']) : '',
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
    $user_email = isset($fields['email']['value']) ? sanitize_email($fields['email']['value']) : '';
    if (is_email($user_email)) { // Validate email before sending
        wp_mail($user_email, $subject, $message, $headers, $attachments);
    }

    return new WP_REST_Response([
        'status' => 'PDF created and emailed',
        'pdf_url' => $pdf_url,
        // 'debug_pdf_path' => $pdf_path // Uncomment for debugging
    ], 200);
}
