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
                        "ANÁPOLIS": "133",
                        "APARECIDA DE GOIÂNIA": "136",
                        "GOIÂNIA": "212"
                    }')),
                'project_id' => env('AB_PROJECT_ID', '11'),
                'inciso1' => [
                    'registrationFrom' => env('INC1_REG_FROM', '2020-08-19'),
                    'registrationTo' => env('INC1_REG_TO', '2020-12-31'),
                    'shortDescription' => env('INC1_DESCRIPTION', 'Descrição pequena localizada nas configs'),
                    'name'   => env('INC1_NAME', 'Lei Aldir Blanc | Inciso I'),
                    'owner'  => env('INC1_OWNER_ID' ,6),
                    'avatar' => env('INC1_AVATAR', 'avatar-aldirblanc.jpg'),
                    'seal'   => env('INC1_SEAL_ID', 2),
                    'status' => env('INC1_STATUS', 0)
                ],
                'inciso2' => (array) json_decode(env('INC2_MUNICIPIOS', '[{"city":"ABADIA DE GOI\u00c1S"},{"city":"ABADI\u00c2NIA"},{"city":"ACRE\u00daNA"},{"city":"ADEL\u00c2NDIA"},{"city":"\u00c1GUA FRIA DE GOI\u00c1S"},{"city":"\u00c1GUA LIMPA"},{"city":"\u00c1GUAS LINDAS DE GOI\u00c1S"},{"city":"ALEX\u00c2NIA"},{"city":"ALO\u00c2NDIA"},{"city":"ALTO HORIZONTE"},{"city":"ALTO PARA\u00cdSO DE GOI\u00c1S"},{"city":"ALVORADA DO NORTE"},{"city":"AMARALINA"},{"city":"AMERICANO DO BRASIL"},{"city":"AMORIN\u00d3POLIS"},{"city":"AN\u00c1POLIS"},{"city":"ANHANGUERA"},{"city":"ANICUNS"},{"city":"APARECIDA DE GOI\u00c2NIA"},{"city":"APARECIDA DO RIO DOCE"},{"city":"APOR\u00c9"},{"city":"ARA\u00c7U"},{"city":"ARAGAR\u00c7AS"},{"city":"ARAGOI\u00c2NIA"},{"city":"ARAGUAPAZ"},{"city":"AREN\u00d3POLIS"},{"city":"ARUAN\u00c3"},{"city":"AURIL\u00c2NDIA"},{"city":"AVELIN\u00d3POLIS"}]')),
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
