<?php

return [
    'plugins' => [
        'EvaluationMethodTechnical' => ['namespace' => 'EvaluationMethodTechnical'],
        'EvaluationMethodSimple' => ['namespace' => 'EvaluationMethodSimple'],
        'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
        
        'MultipleLocalAuth' => [ 'namespace' => 'MultipleLocalAuth' ],
        'AldirBlanc' => [
            'namespace' => 'AldirBlanc',
            'config' => [
                'logotipo_instituicao'=>env('AB_LOGO_INSTITUICAO', getenv('BASE_URL').'/assets/aldirblanc/img/logo-instituicao.png'),
                'logotipo_central'=>env('AB_LOGO_CENTRAL', getenv('BASE_URL').'/assets/aldirblanc/img/logoAldirBlanc.png'),
                'link_suporte' => env('AB_LINK_SUPORTE', 'mailto:mapagoiano.cultura@goias.gov.br'),
                'inciso1_enabled' => env('INCISO1_ENABLE',true),
                'inciso2_enabled' => env('INCISO1_ENABLE',true),
                'msg_inciso2_disabled' => env('INC2_DISABLE_MSG','Em breve!'),
                'msg_inciso1_disabled' => env('INC1_DISABLE_MSG', 'Em breve!'),
                'privacidade_termos_condicoes' => env('AB_LINK_TERMOS', getenv('BASE_URL').'/autenticacao/termos-e-condicoes/'),
                'inciso1_opportunity_id' => env('INC1_OPPORTUNITY_ID', 9),
                'inciso2_opportunity_ids' => (array) json_decode( env('INC2_OPPORTUNITY_IDS',
                    '{
                        "\u00c1guas lindas de Goi\u00e1s" : "32",
                        "Alto Horizonte de Goi\u00e1s" : "33",
                        "Alto Para\u00edso de Goi\u00e1s" : "34",
                        "An\u00e1polis" : "35",
                        "Aparecida de Goi\u00e2nia" : "36",
                        "Aragar\u00e7as" : "37",
                        "Bela Vista de Goi\u00e1s" : "38",
                        "Bonfin\u00f3polis" : "39",
                        "Brit\u00e2nia" : "40",
                        "Caldas Novas" : "41",
                        "Campestre de Goi\u00e1s" : "42",
                        "Campos Belos" : "43",
                        "Cavalcante" : "44",
                        "Cristalina" : "45",
                        "Chapad\u00e3o do C\u00e9u" : "46",
                        "Colinas do Sul" : "47",
                        "C\u00f3rrego do Ouro" : "48",
                        "Formosa" : "49",
                        "Goian\u00e9sia" : "50",
                        "Goianira" : "51",
                        "Guap\u00f3" : "52",
                        "Hidrol\u00e2ndia" : "53",
                        "Ipameri" : "54",
                        "Itumbiara" : "55",
                        "Jaragu\u00e1" : "56",
                        "Jes\u00fapolis" : "57",
                        "Morrinhos" : "58",
                        "Mundo Novo" : "59",
                        "Niquel\u00e2ndia" : "60",
                        "Piracanjuba" : "61",
                        "Piren\u00f3polis" : "62",
                        "Planaltina de Goi\u00e1s" : "63",
                        "Rio Quente" : "64",
                        "Rubiataba" : "65",
                        "S\u00e3o Miguel do Passo Quatro" : "66",
                        "Santa Helena de Goi\u00e1s" : "67",
                        "Santa Rita do Araguaia" : "68",
                        "Serran\u00f3polis" : "69",
                        "Silv\u00e2nia" : "70",
                        "Trindade" : "71",
                        "Uruana" : "72",
                        "Urua\u00e7u" : "73",
                        "Vian\u00f3polis" : "74"
                    }')),
                'project_id' => env('AB_PROJECT_ID', '11'),
                'inciso1' => [
                    'registrationFrom' => env('INC1_REG_FROM', '2020-08-19'),
                    'registrationTo' => env('INC1_REG_TO', '2020-12-31'),
                    'shortDescription' => env('INC1_DESCRIPTION', 'Descrição pequena localizada nas configs'),
                    'name'   => env('INC1_NAME', 'Lei Aldir Blanc | Inciso I'),
                    'owner'  => env('INC1_OWNER_ID', 6),
                    'avatar' => env('INC1_AVATAR', 'avatar-aldirblanc.jpg'),
                    'seal'   => env('INC1_SEAL_ID', 2),
                    'status' => env('INC1_STATUS', 0)
                ],
                'inciso2' => (array) json_decode(env('INC2_MUNICIPIOS', '[
                    {"city": "\u00c1guas lindas de Goi\u00e1s"},
                    {"city": "Alto Horizonte de Goi\u00e1s"},
                    {"city": "Alto Para\u00edso de Goi\u00e1s"},
                    {"city": "An\u00e1polis"},
                    {"city": "Aparecida de Goi\u00e2nia"},
                    {"city": "Aragar\u00e7as"},
                    {"city": "Bela Vista de Goi\u00e1s"},
                    {"city": "Bonfin\u00f3polis"},
                    {"city": "Brit\u00e2nia"},
                    {"city": "Caldas Novas"},
                    {"city": "Campestre de Goi\u00e1s"},
                    {"city": "Campos Belos"},
                    {"city": "Cavalcante"},
                    {"city": "Cristalina"},
                    {"city": "Chapad\u00e3o do C\u00e9u"},
                    {"city": "Colinas do Sul"},
                    {"city": "C\u00f3rrego do Ouro"},
                    {"city": "Formosa"},
                    {"city": "Goian\u00e9sia"},
                    {"city": "Goianira"},
                    {"city": "Guap\u00f3"},
                    {"city": "Hidrol\u00e2ndia"},
                    {"city": "Ipameri"},
                    {"city": "Itumbiara"},
                    {"city": "Jaragu\u00e1"},
                    {"city": "Jes\u00fapolis"},
                    {"city": "Morrinhos"},
                    {"city": "Mundo Novo"},
                    {"city": "Niquel\u00e2ndia"},
                    {"city": "Piracanjuba"},
                    {"city": "Piren\u00f3polis"},
                    {"city": "Planaltina de Goi\u00e1s"},
                    {"city": "Rio Quente"},
                    {"city": "Rubiataba"},
                    {"city": "S\u00e3o Miguel do Passo Quatro"},
                    {"city": "Santa Helena de Goi\u00e1s"},
                    {"city": "Santa Rita do Araguaia"},
                    {"city": "Serran\u00f3polis"},
                    {"city": "Silv\u00e2nia"},
                    {"city": "Trindade"},
                    {"city": "Uruana"},
                    {"city": "Urua\u00e7u"},
                    {"city": "Vian\u00f3polis"}
                ]')),
                'inciso2_default' => [
                     'registrationFrom' => env('INC2_REG_FROM', '2020-08-20'),
                     'registrationTo' => env('INC2_REG_TO', '2030-08-20'),
                     'shortDescription' => env('INC2_DESCRIPTION', 'descrição aqui DEFAULT'),
//                   'name' => 'Oportunidade DEFAULT',
                     'owner' => env('INC2_OWNER_ID', 6),
                     'avatar' => env('INC2_AVATAR', 'avatar-aldirblanc.jpg'),
                     'seal' => env('INC2_SEAL_ID', 1),
                     'status' => env('INC2_STATUS', 0)
                ],
            ],
        ],
    ]
];
