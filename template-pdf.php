<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            color: #2c3e50;
            text-align: center;
        }

        h2 {
            color: #3498db;
            border-bottom: 2px solid #3498db;
            padding-bottom: 5px;
        }

        .section {
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #3498db;
            color: white;
            padding: 10px;
            text-align: left;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        .photo-cell img {
            max-width: 150px;
            max-height: 150px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .logo {
            max-width: 150px;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="header">
        <img src="<<LogoUrl>>" alt="School Logo" class="logo">
        <h1>Formulir Pendaftaran</h1>
        <img src="<<ChildFoto>>" alt="Child Foto" class="logo">
    </div>

    <div class="section">
        <h2>Data Anak</h2>
        <table>
            <tr>
                <th width="30%">Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Foto</td>
                <td class="photo-cell">
                    <<ChildFoto>>
                </td>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>
                    <<ChildsFullName>>
                </td>
            </tr>
            <tr>
                <td>Tempat/Tanggal Lahir</td>
                <td>
                    <<ChildPlaceDateOfBirth>>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <<ChildAddress>>
                </td>
            </tr>
            <tr>
                <td>Hobi/Minat</td>
                <td>
                    <<ChildInterestOrHobby>>
                </td>
            </tr>
            <tr>
                <td>Usia</td>
                <td>
                    <<ChildAge>>
                </td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>
                    <<ChildGender>>
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>Data Ayah</h2>
        <table>
            <tr>
                <th width="30%">Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>
                    <<FathersFullName>>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <<FathersAddress>>
                </td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>
                    <<FathersEmployment>>
                </td>
            </tr>
            <tr>
                <td>Alamat Kantor</td>
                <td>
                    <<FathersOfficeAddress>>
                </td>
            </tr>
            <tr>
                <td>Akun Instagram</td>
                <td>
                    <<FathersInstagramAccount>>
                </td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>
                    <<FathersPhoneNumber>>
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>Data Ibu</h2>
        <table>
            <tr>
                <th width="30%">Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>
                    <<MothersFullName>>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <<MothersAddress>>
                </td>
            </tr>
            <tr>
                <td>Pekerjaan</td>
                <td>
                    <<MothersEmployment>>
                </td>
            </tr>
            <tr>
                <td>Alamat Kantor</td>
                <td>
                    <<MothersWorkAddress>>
                </td>
            </tr>
            <tr>
                <td>Akun Instagram</td>
                <td>
                    <<MothersInstagramAccount>>
                </td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>
                    <<MothersPhoneNumber>>
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>Data Darurat</h2>
        <table>
            <tr>
                <th width="30%">Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Nama Lengkap</td>
                <td>
                    <<EmergencyFullName>>
                </td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>
                    <<EmergencyAddress>>
                </td>
            </tr>
            <tr>
                <td>Hubungan</td>
                <td>
                    <<EmergencyRelationship>>
                </td>
            </tr>
            <tr>
                <td>Nomor Telepon</td>
                <td>
                    <<EmergencyPhoneNumber>>
                </td>
            </tr>
        </table>
    </div>

    <div class="section">
        <h2>Informasi Pendaftaran</h2>
        <table>
            <tr>
                <th width="30%">Field</th>
                <th>Value</th>
            </tr>
            <tr>
                <td>Mengetahui Sekolah Dari</td>
                <td>
                    <<HowDidYouKnow>>
                </td>
            </tr>
            <tr>
                <td>Alasan Memilih Sekolah</td>
                <td>
                    <<WhyYouChoose>>
                </td>
            </tr>
            <tr>
                <td>Cabang yang Dipilih</td>
                <td>
                    <<WhichBranch>>
                </td>
            </tr>
            <tr>
                <td>Program Sekolah</td>
                <td>
                    <<WhatSchoolProgram>>
                </td>
            </tr>
            <tr>
                <td>Footer Image Url</td>
                <td>
                    <<FooterImageUrl>>
                </td>
            </tr>
            <tr>
                <td>Logo url</td>
                <td>
                    <<LogoUrl>>
                </td>
            </tr>
        </table>
    </div>

    <div class="footer">
        <img src="<<FooterImageUrl>>" alt="Footer Image">
    </div>
</body>

</html>