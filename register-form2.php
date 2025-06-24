<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alifa Muslim Montessori Registration Form</title>
    <style>
        @font-face {
            font-family: "Comic Sans MS";
            src: url("fonts/comic-sans-ms.woff2") format("woff2"),
                url("fonts/comic-sans-ms.woff") format("woff");
        }

        @page {
            size: A4;
            margin: 20mm;
        }

        body {
            font-family: "Comic Sans MS", sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 0;
            padding: 0;
            background: white;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            padding: 10mm;
            margin: 0 auto;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            page-break-after: always;
            box-sizing: border-box;
        }

        .page:last-child {
            page-break-after: auto;
        }

        /* FIXED HEADER STYLES */
        .header {
            display: flex;
            align-items: stretch;
            /* Changed from center to stretch */
            min-height: 100px;
            /* Changed from fixed height to min-height */
            border: 2px solid #000;
            margin-bottom: 20px;
        }

        .header-section {
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-right: 2px solid #000;
        }

        .header-section:last-child {
            border-right: none;
        }

        /* LOGO SECTION */
        .logo-section {
            flex: 1;
            flex-direction: row;
            /* Ensure horizontal layout */
        }

        .logo {
            width: 80px;
            height: 80px;
            max-width: 100%;
            max-height: 100%;
            border-radius: 10px;
            margin-right: 10px;
            object-fit: contain;
            /* Changed from cover to contain */
            border: 1px solid #ddd;
            /* Added border for placeholder */
        }

        /* TITLE SECTION */
        .title-section {
            flex: 1;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        /* PHOTO SECTION */
        .photo-section {
            flex: 0.5;
            flex-direction: column;
            /* Stack image and text vertically */
        }

        .photo-section img {
            width: 80px;
            height: 100px;
            object-fit: cover;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 5px;
        }

        .photo-section .photo-label {
            font-size: 10px;
            font-style: italic;
            text-align: center;
            color: #666;
        }

        .form-section {
            margin-bottom: 20px;
        }

        .section-title {
            background: #f0f0f0;
            padding: 8px;
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
            padding: 8px;
            vertical-align: top;
        }

        .form-table tr:nth-child(even) {
            background: #f9f9f9;
        }

        .label-cell {
            font-weight: bold;
            width: 150px;
            background: #f5f5f5;
        }

        .colon-cell {
            width: 20px;
            text-align: center;
        }

        .input-cell {
            background: white;
            min-height: 20px;
        }

        .input-placeholder {
            color: #666;
            font-style: italic;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
        }

        .footer img {
            max-width: 100%;
            height: auto;
        }

        .signature-section {
            margin-top: 30px;
        }

        .signature-table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #000;
        }

        .signature-table td {
            border: 1px solid #000;
            padding: 15px;
            vertical-align: top;
        }

        .signature-cell {
            height: 80px;
        }

        .agreement-text {
            background: #f0f0f0;
            padding: 15px;
            border: 1px solid #000;
            margin-bottom: 20px;
            text-align: justify;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact;
                print-color-adjust: exact;
            }

            .page {
                box-shadow: none;
                margin: 0;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <!-- Page 1 -->
    <div class="page">
        <div class="header">
            <div class="header-section logo-section">
                <img src="<<LogoUrl>>" class="logo" alt="Logo Alifa">
            </div>
            <div class="header-section title-section">
                REGISTRATION FORM
            </div>
            <div class="header-section photo-section">
                <img src="<<ChildFoto>>" alt="Child Photo">
                <div class="photo-label">Child Photo</div>
            </div>
        </div>

        <div class="form-section">
            <div class="section-title">Student Information</div>
            <table class="form-table">
                <tr>
                    <td class="label-cell">Child's Full Name</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<ChildsFullName>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Place, Date of Birth</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<ChildPlaceDateOfBirth>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Child's Address</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<ChildAddress>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Interest or Hobby</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<ChildInterestOrHobby>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Age</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<ChildAge>>
                        </span></td>
                    <td class="label-cell">Gender</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<ChildGender>>
                        </span></td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <div class="section-title">Parent Information</div>
            <table class="form-table">
                <tr>
                    <td class="label-cell">Father's Full Name</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<FathersFullName>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Father's Address</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<FathersAddress>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Father's Employment</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<FathersEmployment>>
                        </span></td>
                    <td class="label-cell">Father's Office Address</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<FathersOfficeAddress>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Father's Instagram Account</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<FathersInstagramAccount>>
                        </span></td>
                    <td class="label-cell">Father's Phone Number</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<FathersPhoneNumber>>
                        </span></td>
                </tr>
            </table>

            <table class="form-table" style="margin-top: 10px;">
                <tr>
                    <td class="label-cell">Mother's Full Name</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<MothersFullName>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Mother's Address</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<MothersAddress>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Mother's Employment</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<MothersEmployment>>
                        </span></td>
                    <td class="label-cell">Mother's Work Address</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<MothersWorkAddress>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Mother's Instagram Account</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<MothersInstagramAccount>>
                        </span></td>
                    <td class="label-cell">Mother's Phone Number</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<MothersPhoneNumber>>
                        </span></td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <div class="section-title">Emergency Information</div>
            <table class="form-table">
                <tr>
                    <td class="label-cell" style="width: 200px;">People to call in case of emergency when you can not be reached</td>
                    <td colspan="2"></td>
                </tr>
                <tr>
                    <td class="label-cell">Full Name</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<EmergencyFullName>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Address</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<EmergencyAddress>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Relationship</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<EmergencyRelationship>>
                        </span></td>
                    <td class="label-cell">Phone Number</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<EmergencyPhoneNumber>>
                        </span></td>
                </tr>
            </table>
        </div>

        <div class="form-section">
            <div class="section-title">General Information</div>
            <table class="form-table">
                <tr>
                    <td class="label-cell">How did you know about this school ?</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<HowDidYouKnow>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Why you choose KBTK Alifa Muslim Montessori ?</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<WhyYouChoose>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">Which branch do you sign up for ?</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<WhichBranch>>
                        </span></td>
                </tr>
                <tr>
                    <td class="label-cell">What school program would you choose ?</td>
                    <td class="colon-cell">:</td>
                    <td class="input-cell"><span class="input-placeholder">
                            <<WhatSchoolProgram>>
                        </span></td>
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