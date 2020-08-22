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
                'inciso1_opportunity_id' => env('INCISO1_OPPORTUNITY_ID', 1),
                'inciso2_opportunity_ids' => [
                    "Goiânia" => 1,
                    "Aparecida de Goiânia" => 2,
                ]
            ],
        ],
    ]
];
