<?php

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

    $photo = '';
    if (!empty($fields['photo']['value'])) {
        // Always use value (URL) for the photo
        $photo_url = $fields['photo']['value'];
        // Validate and sanitize the URL
        $photo = esc_url($photo_url);
    }

    $name    = sanitize_text_field($fields['name']['value']);
    $email   = sanitize_email($fields['email']['value']);
    $address = sanitize_text_field($fields['address']['value']);
    $phone   = sanitize_text_field($fields['phone']['value']);


    // Load template file
    $template = file_get_contents(plugin_dir_path(__FILE__) . 'TemplatePendaftaranAlMusri.html');

    // Replace placeholders with form data
    $html = str_replace([
        '<<ChildFoto>>',
        '<<ChildsFullName>>',
        '<<ChildPlaceDateOfBirth>>',
        '<<ChildAddress>>',
        '<<ChildInterestOrHobby>>',
        '<<ChildAge>>',
        '<<ChildGender>>',
        '<<FathersFullName>>',
        '<<FathersAddress>>',
        '<<FathersEmployment>>',
        '<<FathersOfficeAddress>>',
        '<<FathersInstagramAccount>>',
        '<<FathersPhoneNumber>>',
        '<<MothersFullName>>',
        '<<MothersAddress>>',
        '<<MothersEmployment>>',
        '<<MothersWorkAddress>>',
        '<<MothersInstagramAccount>>',
        '<<MothersPhoneNumber>>',
        '<<EmergencyFullName>>',
        '<<EmergencyAddress>>',
        '<<EmergencyRelationship>>',
        '<<EmergencyPhoneNumber>>',
        '<<HowDidYouKnow>>',
        '<<WhyYouChoose>>',
        '<<WhichBranch>>',
        '<<WhatSchoolProgram>>'
    ], [
        $fields['child_foto']['value'],
        $fields['child_name']['value'],
        $fields['child_birth_place_date']['value'],
        $fields['child_address']['value'],
        $fields['child_hobby']['value'],
        $fields['child_age']['value'],
        $fields['child_gender']['value'],
        $fields['father_name']['value'],
        $fields['father_address']['value'],
        $fields['father_job']['value'],
        $fields['father_office_address']['value'],
        $fields['father_instagram']['value'],
        $fields['father_phone']['value'],
        $fields['mother_name']['value'],
        $fields['mother_address']['value'],
        $fields['mother_job']['value'],
        $fields['mother_office_address']['value'],
        $fields['mother_instagram']['value'],
        $fields['mother_phone']['value'],
        $fields['emergency_full_name']['value'],
        $fields['emergency_address']['value'],
        $fields['emergency_relationship']['value'],
        $fields['emergency_phone']['value'],
        $fields['info_how']['value'],
        $fields['info_why']['value'],
        $fields['info_branch']['value'],
        $fields['info_program']['value']
    ], $template);

    //create simple html here to show all data

    $options = new Options();
    $options->set('defaultFont', 'Helvetica');
    $dompdf = new Dompdf($options);
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();

    $upload_dir = wp_upload_dir();
    $pdf_path = $upload_dir['path'] . '/user-submission-' . time() . '.pdf';
    $pdf_url  = $upload_dir['url'] . '/' . basename($pdf_path);
    file_put_contents($pdf_path, $dompdf->output());

    // Email setup
    $subject = 'Your Form PDF Submission';
    $message = 'Please find the attached PDF.';
    $headers = ['Content-Type: text/html; charset=UTF-8'];
    $attachments = [$pdf_path];

    // Send to admin
    wp_mail(get_option('admin_email'), $subject, $message, $headers, $attachments);
    // Send to user
    wp_mail($email, $subject, $message, $headers, $attachments);

    return new WP_REST_Response([
        'status' => 'PDF created and emailed',
        'pdf_url' => $pdf_url
    ], 200);
}
