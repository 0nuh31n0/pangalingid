<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Example payment usage - Swedbank - pangalink.net</title>
</head>
<body>
<?php

// THIS IS AUTO GENERATED SCRIPT
// (c) 2011-2020 Kreata OÜ www.pangalink.net

// File encoding: UTF-8
// Check that your editor is set to use UTF-8 before using any non-ascii characters

// STEP 1. Setup private key
// =========================

$private_key = openssl_pkey_get_private(
    "-----BEGIN RSA PRIVATE KEY-----
MIIEpAIBAAKCAQEAv90zmJ2gykib90aQZmQn8j16lsassJqTphsvr35pPPCvbSAl
BzG0SRqDk/u81WLClnt8kub0/qxR8H3nT/zYwmsBz9BCXbsy8u7ko8E5PeCmUcwg
ocmf1SZc+gJNyrKbjEhRIT08MxIP5o7Ii8n1mdQ/9KKOAuiANazbAta+kM0Rb/gj
AVeW7X0HiH7ra1h/4JqATQAhCppF/HaUq8nIK0XIJaRqr1RFG5b0CB+jAQ10GHo+
bJ+udsCgx09II9mudqtRNQcfvIAOpcC8KdqN6Xgu9G8MPvpRJeXXwqHfCex5bIQA
UT6/xZ2JKUm7lHiFOgyozGcW0zUTG/9lAD7+QwIDAQABAoIBAH8GNwu6iGKEUeYT
bLStaJkDRO8f1+MQY+JcK2T3vzreanZICtvJd3/Ssvw9dVadDRFN7jrf96HIenNL
F+KoFuYYrFlmmxmtP10A9pTH71rdKaAMEiqq70vSG0pWTiR9vWfR1Qy5muqA8dAG
BhYufpD6qeEP4g9g2MkwiMtHW2FHjb/zdaTRXUgtKemagDGFX+10a0NJMAdq2Oqg
bKLITtm0Tgne6vofiiuc9hRsWxB1rF9t6OJImdG629eTiFYzvf0U/KAIlJdZNanR
i6bDsmu0XM8TGut6+lIfuZwXRmQ9nbJcY20ZSXLE4mW3B5N2orRNUuVTWiYSrKbt
LoEWJ9kCgYEA5O+d/zsEBoH5E9Y9G0AlQXjEMkuu/nd6LxcfDRRC9wN2bgpN0L5H
1HmYNL01m5OPd+UBvr31nowsH3w0mnqmTvYO+oWkmuueZIXF5de2N3i3VsIWCN48
pPuOC2LHa/5a5+GjwePdUgxY9qf/vynU6H6JCIraBsRngE/mb3w1/rcCgYEA1oup
UNUNlRJtUAvXiqFAjsQi7l84cPRCd6krqSgLWPbYEWYOvSW3QiCQRPmhs9qLo5Yv
DuaGEiUFyizGggNyxkiMR71wDMvYDyD4RhW6h6OdEbDRL81i3XRP+fKvKEytI98O
6j3YVhTlB+DbRMdOFs/kmuCRxKnmfD5Un9UucNUCgYEApa8dA4hsg2ExKEAWfVBR
Ji8GnvfTL+q8DLSJDmgphqeE4GKoqnfreER/+TsuPufuHvEn8Cl+Rz5e+HJlh59Y
GTFO6dQqqsv3F/0QmiUhhMfit/FDDSv5a9V6mZbliKzOkZ7lav9EP4scH3a6Slk1
8wUQm5QR8m/WEDDDLtAQK8UCgYAJ48Q5Sqjmn0PUtccIx+ge7KGjlVYXttq9g1nU
4ViskCxjmO3DAFMTREcCNvOiQ8e+EbU3nZ6+hWBf8nJwGdKXm06EHBJnNJpQEDgB
mwzPJdaesyThbDlLdgodvnceh3JPvf+FArbPOQVZuJ7C6+EIoiqqjQGLLD3IqmLi
P0R1xQKBgQCCOiLmaaWGvmAgCIwperYYnk+t0Ch6XoycrzdectrG+fpYZa2wZM5D
eTGK2B3LwxOq7Ar09e0Kqs4MmbGaIaYZEsmTNRGc1EvmSA19BRmxEDHopBu+uxRW
6dFxZZQ45J2RXMN+DVa3EtFi3bGce8Ux9vOj/GRQhI1dUqIvioo1Jg==
-----END RSA PRIVATE KEY-----");

// STEP 2. Define payment information
// ==================================

$fields = array(
    "VK_SERVICE"     => "1011",
    "VK_VERSION"     => "008",
    "VK_SND_ID"      => "uid673",
    "VK_STAMP"       => "12345",
    "VK_AMOUNT"      => "150",
    "VK_CURR"        => "EUR",
    "VK_ACC"         => "EE152200221234567897",
    "VK_NAME"        => "Heinrich Mei",
    "VK_REF"         => "1234561",
    "VK_LANG"        => "EST",
    "VK_MSG"         => "Torso Tiger",
    "VK_RETURN"      => "http://localhost/project/5ee22dedeffbb59dc1340618?payment_action=success",
    "VK_CANCEL"      => "http://localhost/project/5ee22dedeffbb59dc1340618?payment_action=cancel",
    "VK_DATETIME"    => "2020-06-11T13:13:21+0000",
    "VK_ENCODING"    => "utf-8",
);

// STEP 3. Generate data to be signed
// ==================================

// Data to be signed is in the form of XXXYYYYY where XXX is 3 char
// zero padded length of the value and YYY the value itself
// NB! Swedbank expects symbol count, not byte count with UTF-8,
// so use `mb_strlen` instead of `strlen` to detect the length of a string

$data = str_pad (mb_strlen($fields["VK_SERVICE"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_SERVICE"] .    /* 1011 */
    str_pad (mb_strlen($fields["VK_VERSION"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_VERSION"] .    /* 008 */
    str_pad (mb_strlen($fields["VK_SND_ID"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_SND_ID"] .     /* uid673 */
    str_pad (mb_strlen($fields["VK_STAMP"], "UTF-8"),   3, "0", STR_PAD_LEFT) . $fields["VK_STAMP"] .      /* 12345 */
    str_pad (mb_strlen($fields["VK_AMOUNT"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_AMOUNT"] .     /* 150 */
    str_pad (mb_strlen($fields["VK_CURR"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_CURR"] .       /* EUR */
    str_pad (mb_strlen($fields["VK_ACC"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_ACC"] .        /* EE152200221234567897 */
    str_pad (mb_strlen($fields["VK_NAME"], "UTF-8"),    3, "0", STR_PAD_LEFT) . $fields["VK_NAME"] .       /* Heinrich Mei */
    str_pad (mb_strlen($fields["VK_REF"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_REF"] .        /* 1234561 */
    str_pad (mb_strlen($fields["VK_MSG"], "UTF-8"),     3, "0", STR_PAD_LEFT) . $fields["VK_MSG"] .        /* Torso Tiger */
    str_pad (mb_strlen($fields["VK_RETURN"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_RETURN"] .     /* http://localhost/project/5ee22dedeffbb59dc1340618?payment_action=success */
    str_pad (mb_strlen($fields["VK_CANCEL"], "UTF-8"),  3, "0", STR_PAD_LEFT) . $fields["VK_CANCEL"] .     /* http://localhost/project/5ee22dedeffbb59dc1340618?payment_action=cancel */
    str_pad (mb_strlen($fields["VK_DATETIME"], "UTF-8"), 3, "0", STR_PAD_LEFT) . $fields["VK_DATETIME"];    /* 2020-06-11T13:13:21+0000 */

/* $data = "0041011003008006uid67300512345003150003EUR020EE152200221234567897012Heinrich Mei0071234561011Torso Tiger072http://localhost/project/5ee22dedeffbb59dc1340618?payment_action=success071http://localhost/project/5ee22dedeffbb59dc1340618?payment_action=cancel0242020-06-11T13:13:21+0000"; */

// STEP 4. Sign the data with RSA-SHA1 to generate MAC code
// ========================================================

openssl_sign ($data, $signature, $private_key, OPENSSL_ALGO_SHA1);

/* NHcscHne5oYM1g8dECQoBRS8G4AiOlHC0px0AgLyvtrf6WzLC5X7lCtBm/bJAp3h6Fi+U092x5+Dz7WXClFTxemjg2DxjZ9BoxAM9IF6OZcjWTP9uN2/fv/vz8tY6kq6cEp9tZKeEE7U/7AWgN8ag78gm5ltTBrupCyq3nPLPb9LxfRGfoEZ/annPl1bchf0qmZJQEQUYIz6xOFJr/hjVuUTnyNJhutceY/v0lErf5LxC42ufpAI33OXbeLRAiJGT/gwisvXsgHftQK0FdtMHvKAs3GUOrdSivafquoBz2GPQURlZLmcJOSw1jZadCmGSwSIQgakMvsmJnxw3BwzGQ== */
$fields["VK_MAC"] = base64_encode($signature);

// STEP 5. Generate POST form with payment data that will be sent to the bank
// ==========================================================================
?>

<h1><a href="http://localhost/">Pangalink.net</a></h1>
<p>Makse teostamise näidisrakendus <strong>"Raamatupood"</strong></p>

<form method="post" action="http://localhost/banklink/swedbank">
    <!-- include all values as hidden form fields -->
    <?php foreach($fields as $key => $val):?>
        <input type="hidden" name="<?php echo $key; ?>" value="<?php echo htmlspecialchars($val); ?>" />
    <?php endforeach; ?>

    <!-- draw table output for demo -->
    <table>
        <?php foreach($fields as $key => $val):?>
            <tr>
                <td><strong><code><?php echo $key; ?></code></strong></td>
                <td><code><?php echo htmlspecialchars($val); ?></code></td>
            </tr>
        <?php endforeach; ?>

        <!-- when the user clicks "Edasi panga lehele" form data is sent to the bank -->
        <tr><td colspan="2"><input type="submit" value="Edasi panga lehele" /></td></tr>
    </table>
</form>

</body>
</html>
