<?php
use \MapasCulturais\i;

return [
    'mailer.user'       => env('MAILER_USER', "1a311822536263"),
    'mailer.psw'        => env('MAILER_PASS', "a1f73804f5f5d3"),
    'mailer.protocol'   => env('MAILER_PROTOCOL', 'tls'),
    'mailer.server'     => env('MAILER_SERVER', 'smtp.mailtrap.io'),
    'mailer.port'       => env('MAILER_PORT', '2525'),
    'mailer.from'       => env('MAILER_FROM', 'mapacultural@goias.gov.br'),
    'mailer.alwaysTo'   => env('MAILER_ALWAYSTO', false),
    'mailer.allow_self_signed'   => env('MAILER_ALLOW_SELF_SIGNED', true),
    'mailer.verify_peer'   => env('MAILER_VERIFY_PEER', false),

    'mailer.templates' => [
        'welcome' => [
            'title' => i::__("Bem-vindo(a) ao Mapas Culturais"),
            'template' => 'welcome.html'
        ],
        'last_login' => [
            'title' => i::__("Acesse a Mapas Culturais"),
            'template' => 'last_login.html'
        ],
        'new' => [
            'title' => i::__("Novo registro"),
            'template' => 'new.html'
        ],
        'update_required' => [
            'title' => i::__("Acesse a Mapas Culturais"),
            'template' => 'update_required.html'
        ],
        'compliant' => [
            'title' => i::__("Denúncia - Mapas Culturais"),
            'template' => 'compliant.html'
        ],
        'suggestion' => [
            'title' => i::__("Mensagem - Mapas Culturais"),
            'template' => 'suggestion.html'
        ],
        'seal_toexpire' => [
            'title' => i::__("Selo Certificador Expirando"),
            'template' => 'seal_toexpire.html'
        ],
        'seal_expired' => [
            'title' => i::__("Selo Certificador Expirado"),
            'template' => 'seal_expired.html'
        ],
        'opportunity_claim' => [
            'title' => i::__("Solicitação de Recurso de Oportunidade"),
            'template' => 'opportunity_claim.html'
        ],
        'request_relation' => [
            'title' => i::__("Solicitação de requisição"),
            'template' => 'request_relation.html'
        ]

    ]

];