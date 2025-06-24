<?php
// file: register-form2.php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alifa Muslim Montessori Registration Form</title>
    <style>
        /* Commented out font-face for Comic Sans MS.
           Dompdf requires fonts to be installed via its load_font.php utility.
           Using generic sans-serif for reliability. */
        /* @font-face {
            font-family: "Comic Sans MS";
            src: url("fonts/comic-sans-ms.woff2") format("woff2"),
                url("fonts/comic-sans-ms.woff") format("woff");
        } */

        /* Set @page margin to provide a sensible border for printing */
        @page {
            size: A4;
            margin: 10mm;
            /* Overall page margin (top, right, bottom, left) */
        }

        body {
            font-family: sans-serif;
            /* Changed for reliability and wider support */
            font-size: 11px;
            /* Slightly smaller font to fit more content */
            line-height: 1.3;
            /* Slightly tighter line spacing */
            margin: 0;
            /* Ensures no default body margin */
            padding: 0;
            /* Ensures no default body padding */
            background: white;
        }

        .page {
            width: auto;
            min-height: auto;
            padding: 0;
            margin: 0;
            page-break-after: always;
            box-sizing: border-box;
        }

        .page:last-child {
            page-break-after: auto;
            /* Do not force page break after the last page */
        }

        /* Use a table for the header for better reliability with Dompdf */
        .header-table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #000;
            margin-bottom: 15px;
            /* Reduced from 20px */
        }

        .header-table td {
            border-right: 2px solid #000;
            padding: 8px;
            /* Slightly reduced */
            vertical-align: middle;
            /* Vertically center content in cells */
        }

        .header-table td:last-child {
            border-right: none;
            /* No border on the last cell */
        }

        /* LOGO SECTION */
        .logo-section {
            width: 30%;
            /* Adjust width for logo cell */
            text-align: left;
        }

        .logo {
            width: auto;
            /* Reduced from 80px */
            height: 70px;
            /* Reduced from 80px */
            max-width: 100%;
            /* Ensure logo doesn't overflow cell */
            max-height: 100%;
            /* Ensure logo doesn't overflow cell */
            object-fit: contain;
            /* Scale image to fit within bounds without cropping */
            border: 1px solid #ddd;
            margin-right: 10px;
        }

        /* TITLE SECTION */
        .title-section {
            width: 40%;
            /* Adjust width for title cell */
            font-size: 17px;
            /* Slightly smaller font for title */
            font-weight: bold;
            text-align: center;
        }

        /* PHOTO SECTION */
        .photo-section {
            width: 30%;
            /* Adjust width for photo cell */
            text-align: center;
            /* Align photo content to the right */
            padding-right: 5px;
            /* Give some space from the right edge */
        }

        .photo-section img {
            width: 70px;
            /* Reduced from 80px */
            height: 90px;
            /* Reduced from 100px */
            object-fit: cover;
            /* Scale image to cover area, may crop */
            border: 1px solid #ddd;
            border-radius: 5px;
            display: block;
            /* Ensure image is a block element for margin: auto */
            margin-left: auto;
            /* Align image to the right within its cell */
            margin-bottom: 3px;
            /* Reduced from 5px */
        }

        .photo-section .photo-label {
            font-size: 9px;
            /* Reduced from 10px */
            font-style: italic;
            text-align: center;
            /* Center label under photo */
            color: #666;
            display: block;
            /* Ensure label is on its own line */
            width: 70px;
            /* Match photo width */
            margin-left: auto;
            /* Align label to the right as well */
        }

        .form-section {
            margin-bottom: 7px;
            /* Reduced from 20px */
        }

        .section-title {
            background: #f0f0f0;
            padding: 6px;
            /* Reduced from 8px */
            font-weight: bold;
            border: 1px solid #000;
            text-transform: uppercase;
        }

        .form-table {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid #000;
        }

        .form-table td {
            border: 1px solid #000;
            padding: 6px;
            /* Reduced from 8px */
            vertical-align: top;
            /* Ensure content aligns to the top of the cell */
        }

        .form-table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .label-cell {
            font-weight: bold;
            width: 150px;
            /* Fixed width for standard label cells */
            background: #f5f5f5;
        }

        .colon-cell {
            width: 15px;
            /* Smaller width for colon */
            text-align: center;
        }

        .input-cell {
            background: white;
            padding-bottom: 2px;
            /* Reduced from 5px to give space for underline */
            border-bottom: 1px solid black;
            /* Underline effect for data */
            text-align: left;
            /* Align input text to left */
        }

        /* Specific widths for 6-column rows (3 pairs of label-colon-input) */
        .form-table .label-cell-half {
            width: 12%;
        }

        .form-table .colon-cell-half {
            width: 2%;
        }

        .form-table .input-cell-half-first {
            width: 15%;
        }

        .form-table .input-cell-half {
            width: 33%;
        }

        /* Specific style for the first row of Emergency Information table */
        .emergency-header-cell {
            background: #f5f5f5;
            font-weight: bold;
        }

        .footer {
            margin-top: 15px;
            /* Reduced from 30px */
        }

        .footer img {
            max-width: 100%;
            height: auto;
        }

        .signature-section {
            margin-top: 20px;
            /* Reduced from 30px */
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #000;
        }

        .signature-table td {
            border: 1px solid #000;
            padding: 10px;
            /* Reduced from 15px */
            vertical-align: top;
        }

        .signature-cell {
            height: 70px;
            /* Reduced from 80px, allow text to flow */
        }

        .signature-cell div {
            height: 40px;
            /* Reduced from 60px - height of the underline area */
            border-bottom: 1px solid #000;
            margin-top: 10px;
            /* Reduced from 20px */
        }

        .agreement-text {
            background: #f0f0f0;
            padding: 10px;
            /* Reduced from 15px */
            border: 1px solid #000;
            margin-bottom: 10px;
            /* Reduced from 20px */
            text-align: justify;
        }
    </style>
</head>

<body>
    <!-- Page 1 -->
    <div class="page">
        <!-- Header using a table for robust layout with Dompdf -->
        <table class="header-table">
            <tr>
                <td class="logo-section">
                    <img src="<<LogoUrl>>" class="logo" alt="Logo Alifa">
                </td>
                <td class="title-section">
                    REGISTRATION FORM
                </td>
                <td class="photo-section">
                    <img src="<<ChildFoto>>" alt="Child Photo">
                    <!-- <div class="photo-label">Child Photo</div> -->
                </td>
            </tr>
        </table>

        <div class="form-section">
            <div class="section-title">Student Information</div>
            <table class="form-table">
                <tr>
                    <td class="label-cell">Child's Full Name</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4"> <!-- colspan 4 to span across the remaining 4 columns -->
                        <<ChildsFullName>>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell">Place, Date of Birth</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<ChildPlaceDateOfBirth>>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell">Child's Address</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<ChildAddress>>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell">Interest or Hobby</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<ChildInterestOrHobby>>
                    </td>
                </tr>
                <tr>
                    <!-- Age and Gender on the same row, properly aligned -->
                    <td class="label-cell label-cell-half">Age</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half-first">
                        <<ChildAge>>
                    </td>
                    <td class="label-cell label-cell-half">Gender</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half">
                        <<ChildGender>>
                    </td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <div class="section-title">Parent Information</div>
            <table class="form-table">
                <tr>
                    <td class="label-cell">Father's Full Name</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<FathersFullName>>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell">Father's Address</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<FathersAddress>>
                    </td>
                </tr>
                <tr>
                    <!-- Father's Employment and Office Address on the same row -->
                    <td class="label-cell label-cell-half">Father's Employment</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half-first">
                        <<FathersEmployment>>
                    </td>
                    <td class="label-cell label-cell-half">Father's Office Address</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half">
                        <<FathersOfficeAddress>>
                    </td>
                </tr>
                <tr>
                    <!-- Father's Instagram and Phone Number on the same row -->
                    <td class="label-cell label-cell-half">Father's Instagram Account</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half-first">
                        <<FathersInstagramAccount>>
                    </td>
                    <td class="label-cell label-cell-half">Father's Phone Number</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half">
                        <<FathersPhoneNumber>>
                    </td>
                </tr>
            </table>

            <table class="form-table" style="margin-top: 10px;">
                <tr>
                    <td class="label-cell">Mother's Full Name</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<MothersFullName>>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell">Mother's Address</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<MothersAddress>>
                    </td>
                </tr>
                <tr>
                    <!-- Mother's Employment and Work Address on the same row -->
                    <td class="label-cell label-cell-half">Mother's Employment</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half-first">
                        <<MothersEmployment>>
                    </td>
                    <td class="label-cell label-cell-half">Mother's Work Address</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half">
                        <<MothersWorkAddress>>
                    </td>
                </tr>
                <tr>
                    <!-- Mother's Instagram and Phone Number on the same row -->
                    <td class="label-cell label-cell-half">Mother's Instagram Account</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half-first">
                        <<MothersInstagramAccount>>
                    </td>
                    <td class="label-cell label-cell-half">Mother's Phone Number</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half">
                        <<MothersPhoneNumber>>
                    </td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <div class="section-title">Emergency Information</div>
            <table class="form-table">
                <tr>
                    <!-- This cell now correctly spans all 6 columns -->
                    <td class="emergency-header-cell" colspan="6">People to call in case of emergency when you can not be reached</td>
                </tr>
                <tr>
                    <td class="label-cell">Full Name</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<EmergencyFullName>>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell">Address</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<EmergencyAddress>>
                    </td>
                </tr>
                <tr>
                    <!-- Relationship and Phone Number on the same row -->
                    <td class="label-cell label-cell-half">Relationship</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half-first">
                        <<EmergencyRelationship>>
                    </td>
                    <td class="label-cell label-cell-half">Phone Number</td>
                    <td class="colon-cell colon-cell-half">:</td>
                    <td class="input-cell input-cell-half">
                        <<EmergencyPhoneNumber>>
                    </td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <div class="section-title">General Information</div>
            <table class="form-table">
                <tr>
                    <td class="label-cell">How did you know about this school ?</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<HowDidYouKnow>>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell">Why you choose KBTK Alifa Muslim Montessori ?</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<WhyYouChoose>>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell">Which branch do you sign up for ?</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<WhichBranch>>
                    </td>
                </tr>
                <tr>
                    <td class="label-cell">What school program would you choose ?</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell" colspan="4">
                        <<WhatSchoolProgram>>
                    </td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Page 2 -->
    <div class="page">
        <div class="form-section">
            <div class="section-title">Please Read and Sign Below</div>
            <div class="agreement-text">
                The parent/guardian of the participant listed above, so hereby and allow his/her participant in the above program and I agree to follow all the school's rules for the sake of the children.
            </div>

            <div class="signature-section">
                <table class="signature-table">
                    <tr>
                        <td class="signature-cell" style="width: 50%;">
                            <strong>Parent/Guardian's Signature</strong>
                            <div style="height: 60px; border-bottom: 1px solid #000; margin-top: 20px;"></div>
                        </td>
                        <td class="signature-cell" style="width: 50%;">
                            <strong>Date</strong>
                            <div style="height: 60px; border-bottom: 1px solid #000; margin-top: 20px;"></div>
                        </td>
                    </tr>
                </table>
            </div>
        </div>

        <div class="footer">
            <img src="<<FooterImageUrl>>" alt="Footer Image">
        </div>
    </div>
</body>

</html>