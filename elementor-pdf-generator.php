<?php

/**
 * Plugin Name: Elementor Form PDF Generator
 * Description: Creates and emails a PDF after Elementor form submission.
 * Version: 1.0
 * Author: Your Name
 */

require_once plugin_dir_path(__FILE__) . 'libs/dompdf/autoload.inc.php';

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

    $name    = sanitize_text_field($fields['name']['value']);
    $email   = sanitize_email($fields['email']['value']);
    $address = sanitize_text_field($fields['address']['value']);
    $phone   = sanitize_text_field($fields['phone']['value']);

    // Example HTML template
    $html = "
    <h2>User Info</h2>
    <p><strong>Name:</strong> {$name}</p>
    <p><strong>Email:</strong> {$email}</p>
    <p><strong>Address:</strong> {$address}</p>
    <p><strong>Phone:</strong> {$phone}</p>
  ";

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
