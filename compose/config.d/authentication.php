<?php
// creating base url
$prot_part = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] ? 'https://' : 'http://';
//added @ for HTTP_HOST undefined in Tests
$host_part = @$_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
if(substr($host_part,-1) !== '/') $host_part .= '/';
$_APP_BASE_URL = $prot_part . $host_part;

return [
    'auth.provider' => env('AUTH_PROVIDER', '\MultipleLocalAuth\Provider'),
    'auth.config' => array(
        'salt' => env('AUTH_SALT', null),
        'timeout' => env('TIMEOUT', '24 hours'),
        'enableLoginByCPF' => env('ENABLE_LOGIN_BY_CPF', true) ,
        'urlImageToUseInEmails' => env('URL_IMAGE_EMAIL', $_APP_BASE_URL . 'assets/img/logo-site.png'),
        'metadataFieldCPF' => env('METADATA_FIELD_CPF', 'documento'),
        'userMustConfirmEmailToUseTheSystem' =>  env('USER_MUST_CONFIRM_EMAIL', true),
        'passwordMustHaveCapitalLetters' => env('PASSWORD_MUST_HAVE_CAPITAL_LETTERS', true),
        'passwordMustHaveLowercaseLetters' => env('PASSWORD_MUST_HAVE_LOWER_CASE_LETTERS', true),
        'passwordMustHaveSpecialCharacters' => env('PASSWORD_MUST_HAVE_SPACIAL_CHARACTERS', true),
        'passwordMustHaveNumbers' => env('PASSWORD_MUST_HAVE_NUMBERS', true),
        'minimumPasswordLength' => env('MINIMUM_PASSWORD_LENGTH', 6),
        'google-recaptcha-secret' => env('GOOGLE_RECAPTCHA_SECRET', '6LfyOMcZAAAAACO25OSq6Qe-ozmhmkpef1PVt5bH'),
        'google-recaptcha-sitekey' => env('GOOGLE_RECAPTCHA_SITEKEY', '6LfyOMcZAAAAADdUP3gOudNXYncheYuTp9YB83vT'),
        'sessionTime' => env('SESSION_TIME', 7200) ,
        'numberloginAttemp' => env('NUMBER_LOGIN_AT_TEMP', '5'),
        'timeBlockedloginAttemp' => env('TIME_BLOCKED_LOGIN_AT_TEMP', '900'),
        'strategies' => [
            'Facebook' => array(
                'visible' => env('VISIBLE', true),
                'app_id' => env('AUTH_FACEBOOK_APP_ID', null),
                'app_secret' => env('AUTH_FACEBOOK_APP_SECRET', null),
                'scope' => env('AUTH_FACEBOOK_SCOPE', 'email'),
            ),
            'LinkedIn' => array(
                'visible' => env('VISIBLE', true),
                'api_key' => env('AUTH_LINKEDIN_API_KEY', null),
                'secret_key' => env('AUTH_LINKEDIN_SECRET_KEY', null),
                'redirect_uri' => $_APP_BASE_URL . 'autenticacao/linkedin/oauth2callback',
                'scope' => env('AUTH_LINKEDIN_SCOPE', 'r_emailaddress')
            ),
            'Google' => array(
                'visible' => env('VISIBLE', true),
                'client_id' => env('AUTH_GOOGLE_CLIENT_ID', null),
                'client_secret' => env('AUTH_GOOGLE_CLIENT_SECRET', null),
                'redirect_uri' => $_APP_BASE_URL . 'autenticacao/google/oauth2callback',
                'scope' => env('AUTH_GOOGLE_SCOPE', 'email'),
            ),
            'Twitter' => array(
                'visible' => env('VISIBLE', true),
                'app_id' => env('AUTH_TWITTER_APP_ID', null),
                'app_secret' => env('AUTH_TWITTER_APP_SECRET', null),
            ),
        ]
    ),
];
