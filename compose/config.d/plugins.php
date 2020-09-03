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
                'inciso1_enabled' => env('INCISO1_ENABLED', true),
                'inciso2_enabled' => env('INCISO2_ENABLED', true),
                'project_id' => env('PROJECT_ID', 1),
                'link_suporte' => "https://drive.google.com/file/d/1qDrpfH3Rl7dQg3cW3G6lMNopIjDq7ZS6/view",
                'msg_inciso2_disabled' => 'Em breve!',
                'msg_inciso1_disabled' => 'Em breve!',
                'privacidade_termos_condicoes' => 'https://drive.google.com/file/d/1qDrpfH3Rl7dQg3cW3G6lMNopIjDq7ZS6/view',
                'inciso1_opportunity_id' => env('INCISO1_OPPORTUNITY_ID', 2),
                'inciso2_opportunity_ids' => [
                    "Jussara" => 3,
                    "Aparecida de Goiânia" => 4,
                ]
            ],
        ],
    ]
];
