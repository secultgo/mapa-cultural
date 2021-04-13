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
                'inciso2_enabled' => env('INCISO2_ENABLE',true),
                'msg_inciso2_disabled' => env('INC2_DISABLE_MSG','Em breve!'),
                'msg_inciso1_disabled' => env('INC1_DISABLE_MSG', 'Em breve!'),
                'privacidade_termos_condicoes' => env('AB_LINK_TERMOS', getenv('BASE_URL').'/autenticacao/termos-e-condicoes/'),
                'inciso1_opportunity_id' => env('INC1_OPPORTUNITY_ID', 9),
                //default para ambiente de testes!  
                'inciso2_opportunity_ids' => (array) json_decode( env('INC2_OPPORTUNITY_IDS',
                    '{
                        "Aguas lindas de Goi\u00e1s" : "359",
                        "Alto Horizonte de Goi\u00e1s" : "360",
                        "Alto Para\u00edso de Goi\u00e1s" : "361",
                        "An\u00e1polis" : "362",
                        "Aparecida de Goi\u00e2nia" : "363",
                        "Aragar\u00e7as" : "364",
                        "Bela Vista de Goi\u00e1s" : "365",
                        "Bonfin\u00f3polis" : "366",
                        "Brit\u00e2nia" : "367",
                        "Caldas Novas" : "368",
                        "Campestre de Goi\u00e1s" : "369",
                        "Campos Belos" : "370",
                        "Cavalcante" : "371",
                        "Cristalina" : "372",
                        "Chapad\u00e3o do C\u00e9u" : "373",
                        "Colinas do Sul" : "374",
                        "C\u00f3rrego do Ouro" : "375",
                        "Formosa" : "376",
                        "Goi\u00e2nia" : "404",
                        "Goian\u00e9sia" : "377",
                        "Goianira" : "378",
                        "Guap\u00f3" : "379",
                        "Hidrol\u00e2ndia" : "380",
                        "Ipameri" : "381",
                        "Iaciara" : "403",
                        "Itumbiara" : "382",
                        "Jaragu\u00e1" : "383",
                        "Jes\u00fapolis" : "384",
                        "Morrinhos" : "385",
                        "Mundo Novo" : "386",
                        "Niquel\u00e2ndia" : "387",
                        "Nova Am\u00e9rica" : "405",
                        "Piracanjuba" : "388",
                        "Piren\u00f3polis" : "389",
                        "Planaltina de Goi\u00e1s" : "390",
                        "Rio Quente" : "391",
                        "Rubiataba" : "392",
                        "S\u00e3o Miguel do Passo Quatro" : "393",
                        "Santa Helena de Goi\u00e1s" : "394",
                        "Santa Rita do Araguaia" : "395",
                        "Serran\u00f3polis" : "396",
                        "Silv\u00e2nia" : "397",
                        "Trindade" : "398",
                        "Uruana" : "399",
                        "Urua\u00e7u" : "400",
                        "Vian\u00f3polis" : "401"
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
                    { "city": "Iaciara" },
                    { "city": "Goi\u00e2nia"},
                    { "city": "Nova Am\u00e9rica"}
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
                'inciso3_opportunity_ids' => (array) json_decode( env('INC3_OPPORTUNITY_IDS',
                '[80, 90, 91, 92, 112, 130, 131, 132]')),
            ],
        ],
        'AldirBlancDataprev' => [
            'namespace' => 'AldirBlancDataprev',
            'config' => [
                // indica que só deve exportar as inscrições já homologadas
                'exportador_requer_homologacao' => false,
                'consolidacao_requer_validacao' => ['dataprev']
            ],
        ],
        'AldirBlancValidadorFinanceiro' => [
            'namespace' => 'AldirBlancValidadorFinanceiro',
            'config' => [
                // indica que só deve exportar as inscrições já homologadas
                'consolidacao_requer_homologacao' => false,
                'exportador_requer_validacao' => ['dataprev'],
                'exportador_requer_homologacao' => true,
            ],
        ],
        'RegistrationPayments' => [ 'namespace' => 'RegistrationPayments' ],
        'AldirBlancValidadorRecurso' => [ 'namespace' => 'AldirBlancValidadorRecurso' ],
    ]
];
