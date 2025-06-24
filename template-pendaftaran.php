<html>

<head>
  <meta charset="UTF-8">
  <style>
    @font-face {
      font-family: "Comic Sans MS";
      src: url("fonts/comic-sans-ms.woff2") format("woff2"),
        url("fonts/comic-sans-ms.woff") format("woff");
    }

    body {
      font-family: "Comic Sans MS", sans-serif;
      background-color: #fff;
      padding: 0 36pt 34.4pt 36pt;
      max-width: 523.3pt;
    }

    table {
      border-collapse: collapse;
      margin: 0 auto;
    }

    td,
    th {
      border: 1pt solid #000;
      padding: 0 5.4pt;
      vertical-align: middle;
    }

    .title {
      font-size: 16pt;
      font-weight: bold;
      text-align: center;
    }

    .section-title {
      font-weight: bold;
      font-size: 11pt;
    }

    .logo-cell {
      width: 190.84px;
      height: 79.48px;
    }

    .photo-cell {
      width: 141.8pt;
    }

    .signature-space {
      height: 66.8pt;
    }
  </style>
</head>


<body>
  <table>
    <tr>
      <td colspan="2" class="logo-cell">
        <img src="<<LogoUrl>>" alt="School Logo" style="width:100px; height:150px;">
      </td>
      <td colspan="3" class="title">REGISTRATION FORM</td>
      <td class="photo-cell">
        <img src="<<ChildFoto>>" alt="" style="width:100px; height:150px;">

      </td>
    </tr>

    <!-- Student Information -->
    <tr>
      <td colspan="6" class="section-title">STUDENT INFORMATION</td>
    </tr>
    <tr>
      <td>Child's Full Name</td>
      <td>:</td>
      <td colspan="4">
        <<ChildsFullName>>
      </td>
    </tr>
    <tr>
      <td>Place, Date of Birth</td>
      <td>:</td>
      <td colspan="4">
        <<ChildPlaceDateOfBirth>>
      </td>
    </tr>
    <tr>
      <td>Child's Address</td>
      <td>:</td>
      <td colspan="4">
        <<ChildAddress>>
      </td>
    </tr>
    <tr>
      <td>Interest or Hobby</td>
      <td>:</td>
      <td colspan="4">
        <<ChildInterestOrHobby>>
      </td>
    </tr>
    <tr>
      <td>Age</td>
      <td>:</td>
      <td>
        <<ChildAge>>
      </td>
      <td>Gender</td>
      <td>:</td>
      <td>
        <<ChildGender>>
      </td>
    </tr>

    <!-- Parent Information -->
    <tr>
      <td colspan="6" class="section-title">PARENT INFORMATION</td>
    </tr>
    <tr>
      <td>Father's Full Name</td>
      <td>:</td>
      <td colspan="4">
        <<FathersFullName>>
      </td>
    </tr>
    <tr>
      <td>Father's Address</td>
      <td>:</td>
      <td colspan="4">
        <<FathersAddress>>
      </td>
    </tr>
    <tr>
      <td>Father's Employment</td>
      <td>:</td>
      <td>
        <<FathersEmployment>>
      </td>
      <td>Father's Office Address</td>
      <td>:</td>
      <td>
        <<FathersOfficeAddress>>
      </td>
    </tr>
    <tr>
      <td>Father's Instagram Account</td>
      <td>:</td>
      <td>
        <<FathersInstagramAccount>>
      </td>
      <td>Father's Phone Number</td>
      <td>:</td>
      <td>
        <<FathersPhoneNumber>>
      </td>
    </tr>
    <tr>
      <td>Mother's Full Name</td>
      <td>:</td>
      <td colspan="4">
        <<MothersFullName>>
      </td>
    </tr>
    <tr>
      <td>Mother's Address</td>
      <td>:</td>
      <td colspan="4">
        <<MothersAddress>>
      </td>
    </tr>
    <tr>
      <td>Mother's Employment</td>
      <td>:</td>
      <td>
        <<MothersEmployment>>
      </td>
      <td>Mother's Work Address</td>
      <td>:</td>
      <td>
        <<MothersWorkAddress>>
      </td>
    </tr>
    <tr>
      <td>Mother's Instagram Account</td>
      <td>:</td>
      <td>
        <<MothersInstagramAccount>>
      </td>
      <td>Mother's Phone Number</td>
      <td>:</td>
      <td>
        <<MothersPhoneNumber>>
      </td>
    </tr>

    <!-- Emergency Information -->
    <tr>
      <td colspan="6" class="section-title">EMERGENCY INFORMATION</td>
    </tr>
    <tr>
      <td colspan="6">People to call in case of emergency when you cannot be reached</td>
    </tr>
    <tr>
      <td>Full Name</td>
      <td>:</td>
      <td colspan="4">
        <<EmergencyFullName>>
      </td>
    </tr>
    <tr>
      <td>Address</td>
      <td>:</td>
      <td colspan="4">
        <<EmergencyAddress>>
      </td>
    </tr>
    <tr>
      <td>Relationship</td>
      <td>:</td>
      <td>
        <<EmergencyRelationship>>
      </td>
      <td>Phone Number</td>
      <td>:</td>
      <td>
        <<EmergencyPhoneNumber>>
      </td>
    </tr>

    <!-- General Information -->
    <tr>
      <td colspan="3" class="section-title">GENERAL INFORMATION</td>
    </tr>
    <tr>
      <td>How did you know about this school?</td>
      <td>:</td>
      <td>
        <<HowDidYouKnow>>
      </td>
    </tr>
    <tr>
      <td>Why you choose KBTK Alifa Muslim Montessori?</td>
      <td>:</td>
      <td>
        <<WhyYouChoose>>
      </td>
    </tr>
    <tr>
      <td>Which branch do you sign up for?</td>
      <td>:</td>
      <td>
        <<WhichBranch>>
      </td>
    </tr>
    <tr>
      <td>What school program would you choose?</td>
      <td>:</td>
      <td>
        <<WhatSchoolProgram>>
      </td>
    </tr>

    <!-- Signature Section -->
    <tr>
      <td colspan="4" class="section-title">PLEASE READ AND SIGN BELOW</td>
    </tr>
    <tr>
      <td colspan="4">
        The parent/guardian of the participant listed above, so hereby and allow his/her
        participant in the above program and I agree to follow all the school's rules
        for the sake of the children.
      </td>
    </tr>
    <tr class="signature-space">
      <td>Parent/Guardian's Signature</td>
      <td></td>
      <td>Date,</td>
      <td></td>
    </tr>
  </table>

  <div style="text-align:center;margin:0 -35.4pt -36pt;">
    <img src="<<FooterImageUrl>>" alt="Footer" style="width:793.5px;height:166.24px;">
  </div>
</body>

</html>