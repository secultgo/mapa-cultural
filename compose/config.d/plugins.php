<?php
// url do mapas
$mapasUrl = $_SERVER['HTTP_HOST']=='localhost:8088'?'http://'.$_SERVER['HTTP_HOST']:'https://'.$_SERVER['HTTP_HOST'];
return [
    'plugins' => [
        'EvaluationMethodTechnical' => ['namespace' => 'EvaluationMethodTechnical'],
        'EvaluationMethodSimple' => ['namespace' => 'EvaluationMethodSimple'],
        'EvaluationMethodDocumentary' => ['namespace' => 'EvaluationMethodDocumentary'],
        
        'MultipleLocalAuth' => [ 'namespace' => 'MultipleLocalAuth' ],
        'AldirBlanc' => [
            'namespace' => 'AldirBlanc',
            'config' => [
                'logotipo_instituicao'=>$mapasUrl.'/assets/aldirblanc/img/logo-instituicao.png',
                'logotipo_central'=>$mapasUrl.'/assets/aldirblanc/img/logoAldirBlanc.png',
                'link_suporte' => "https://tawk.to/chat/5f60d5374704467e89ef29ca/default",
                'inciso1_enabled' => true,
                'inciso2_enabled' => true,
                'msg_inciso2_disabled' => 'Em breve!',
                'msg_inciso1_disabled' => 'Em breve!',
                'privacidade_termos_condicoes' => $mapasUrl.'/autenticacao/termos-e-condicoes/',
                'inciso1_opportunity_id' => 9,
                'inciso2_opportunity_ids' => [
                    'ANÁPOLIS'                      => 133,
                    'APARECIDA DE GOIÂNIA'          => 136,
                    'GOIÂNIA'                       => 212,
                ],
                'project_id' => 11,
                'inciso1' => [
                    'registrationFrom' => '2020-08-19',
                    'registrationTo' => '2020-12-31',
                    'shortDescription' => 'Descrição pequena localizada nas configs',
                    'name'   => 'Lei Aldir Blanc | Inciso I',
                    'owner'  => 6,
                    'avatar' => 'avatar-aldirblanc.jpg',
                    'seal'   => 2,
                    'status' => 0
                ],
                'inciso2' => [
                    ['city' => 'ABADIA DE GOIÁS'],
                    ['city' => 'ABADIÂNIA'],
                    ['city' => 'ACREÚNA'],
                    ['city' => 'ADELÂNDIA'],
                    ['city' => 'ÁGUA FRIA DE GOIÁS'],
                    ['city' => 'ÁGUA LIMPA'],
                    ['city' => 'ÁGUAS LINDAS DE GOIÁS'],
                    ['city' => 'ALEXÂNIA'],
                    ['city' => 'ALOÂNDIA'],
                    ['city' => 'ALTO HORIZONTE'],
                    ['city' => 'ALTO PARAÍSO DE GOIÁS'],
                    ['city' => 'ALVORADA DO NORTE'],
                    ['city' => 'AMARALINA'],
                    ['city' => 'AMERICANO DO BRASIL'],
                    ['city' => 'AMORINÓPOLIS'],
                    ['city' => 'ANÁPOLIS'],
                    ['city' => 'ANHANGUERA'],
                    ['city' => 'ANICUNS'],
                    ['city' => 'APARECIDA DE GOIÂNIA'],
                    ['city' => 'APARECIDA DO RIO DOCE'],
                    ['city' => 'APORÉ'],
                    ['city' => 'ARAÇU'],
                    ['city' => 'ARAGARÇAS'],
                    ['city' => 'ARAGOIÂNIA'],
                    ['city' => 'ARAGUAPAZ'],
                    ['city' => 'ARENÓPOLIS'],
                    ['city' => 'ARUANÃ'],
                    ['city' => 'AURILÂNDIA'],
                    ['city' => 'AVELINÓPOLIS']
                ],
                'inciso2_default' => [
                     'registrationFrom' => '2020-08-20',
                     'registrationTo' => '2030-08-20',
                     'shortDescription' => 'descrição aqui DEFAULT',
//                   'name' => 'Oportunidade DEFAULT',
                     'owner' => 6,
                     'avatar' => 'avatar-aldirblanc.jpg',
                     'seal' => 1,
                     'status' => 0
                ],
            ],
        ],
    ]
];
