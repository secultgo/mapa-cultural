<?php
// url do ambiente mapas
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
                'privacidade_termos_condicoes' => 'https://mapagoianohomolog.cultura.go.gov.br/autenticacao/termos-e-condicoes/',
                'inciso1_opportunity_id' => 9,
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
                    ['city' => 'AVELINÓPOLIS'],
                    ['city' => 'BALIZA'],
                    ['city' => 'BARRO ALTO'],
                    ['city' => 'BELA VISTA DE GOIÁS'],
                    ['city' => 'BOM JARDIM DE GOIÁS'],
                    ['city' => 'BOM JESUS DE GOIÁS'],
                    ['city' => 'BONFINÓPOLIS'],
                    ['city' => 'BONÓPOLIS'],
                    ['city' => 'BRAZABRANTES'],
                    ['city' => 'BRITÂNIA'],
                    ['city' => 'BURITI ALEGRE'],
                    ['city' => 'BURITI DE GOIÁS'],
                    ['city' => 'BURITINÓPOLIS'],
                    ['city' => 'CABECEIRAS'],
                    ['city' => 'CACHOEIRA ALTA'],
                    ['city' => 'CACHOEIRA DE GOIÁS'],
                    ['city' => 'CACHOEIRA DOURADA'],
                    ['city' => 'CAÇU'],
                    ['city' => 'CAIAPÔNIA'],
                    ['city' => 'CALDAS NOVAS'],
                    ['city' => 'CALDAZINHA'],
                    ['city' => 'CAMPESTRE DE GOIÁS'],
                    ['city' => 'CAMPINAÇU'],
                    ['city' => 'CAMPINORTE'],
                    ['city' => 'CAMPO ALEGRE DE GOIÁS'],
                    ['city' => 'CAMPO LIMPO DE GOIÁS'],
                    ['city' => 'CAMPOS BELOS'],
                    ['city' => 'CAMPOS VERDES'],
                    ['city' => 'CARMO DO RIO VERDE'],
                    ['city' => 'CASTELÂNDIA'],
                    ['city' => 'CATALÃO'],
                    ['city' => 'CATURAÍ'],
                    ['city' => 'CAVALCANTE'],
                    ['city' => 'CERES'],
                    ['city' => 'CEZARINA'],
                    ['city' => 'CHAPADÃO DO CÉU'],
                    ['city' => 'CIDADE OCIDENTAL'],
                    ['city' => 'COCALZINHO DE GOIÁS'],
                    ['city' => 'COLINAS DO SUL'],
                    ['city' => 'CÓRREGO DO OURO'],
                    ['city' => 'CORUMBÁ DE GOIÁS'],
                    ['city' => 'CORUMBAÍBA'],
                    ['city' => 'CRISTALINA'],
                    ['city' => 'CRISTIANÓPOLIS'],
                    ['city' => 'CRIXÁS'],
                    ['city' => 'CROMÍNIA'],
                    ['city' => 'CUMARI'],
                    ['city' => 'DAMIANÓPOLIS'],
                    ['city' => 'DAMOLÂNDIA'],
                    ['city' => 'DAVINÓPOLIS'],
                    ['city' => 'DIORAMA'],
                    ['city' => 'DOVERLÂNDIA'],
                    ['city' => 'EDEALINA'],
                    ['city' => 'EDÉIA'],
                    ['city' => 'ESTRELA DO NORTE'],
                    ['city' => 'FAINA'],
                    ['city' => 'FAZENDA NOVA'],
                    ['city' => 'FIRMINÓPOLIS'],
                    ['city' => 'FLORES DE GOIÁS'],
                    ['city' => 'FORMOSA'],
                    ['city' => 'FORMOSO'],
                    ['city' => 'GAMELEIRA DE GOIÁS'],
                    ['city' => 'DIVINÓPOLIS DE GOIÁS'],
                    ['city' => 'GOIANÁPOLIS'],
                    ['city' => 'GOIANDIRA'],
                    ['city' => 'GOIANÉSIA'],
                    ['city' => 'GOIÂNIA'],
                    ['city' => 'GOIANIRA'],
                    ['city' => 'GOIÁS'],
                    ['city' => 'GOIATUBA'],
                    ['city' => 'GOUVELÂNDIA'],
                    ['city' => 'GUAPÓ'],
                    ['city' => 'GUARAÍTA'],
                    ['city' => 'GUARANI DE GOIÁS'],
                    ['city' => 'GUARINOS'],
                    ['city' => 'HEITORAÍ'],
                    ['city' => 'HIDROLÂNDIA'],
                    ['city' => 'HIDROLINA'],
                    ['city' => 'IACIARA'],
                    ['city' => 'INACIOLÂNDIA'],
                    ['city' => 'INDIARA'],
                    ['city' => 'INHUMAS'],
                    ['city' => 'IPAMERI'],
                    ['city' => 'IPIRANGA DE GOIÁS'],
                    ['city' => 'IPORÁ'],
                    ['city' => 'ISRAELÂNDIA'],
                    ['city' => 'ITABERAÍ'],
                    ['city' => 'ITAGUARI'],
                    ['city' => 'ITAGUARU'],
                    ['city' => 'ITAJÁ'],
                    ['city' => 'ITAPACI'],
                    ['city' => 'ITAPIRAPUÃ'],
                    ['city' => 'ITAPURANGA'],
                    ['city' => 'ITARUMÃ'],
                    ['city' => 'ITAUÇU'],
                    ['city' => 'ITUMBIARA'],
                    ['city' => 'IVOLÂNDIA'],
                    ['city' => 'JANDAIA'],
                    ['city' => 'JARAGUÁ'],
                    ['city' => 'JATAÍ'],
                    ['city' => 'JAUPACI'],
                    ['city' => 'JESÚPOLIS'],
                    ['city' => 'JOVIÂNIA'],
                    ['city' => 'JUSSARA'],
                    ['city' => 'LAGOA SANTA'],
                    ['city' => 'LEOPOLDO DE BULHÕES'],
                    ['city' => 'LUZIÂNIA'],
                    ['city' => 'MAIRIPOTABA'],
                    ['city' => 'MAMBAÍ'],
                    ['city' => 'MARA ROSA'],
                    ['city' => 'MARZAGÃO'],
                    ['city' => 'MATRINCHÃ'],
                    ['city' => 'MAURILÂNDIA'],
                    ['city' => 'MIMOSO DE GOIÁS'],
                    ['city' => 'MINAÇU'],
                    ['city' => 'MINEIROS'],
                    ['city' => 'MOIPORÁ'],
                    ['city' => 'MONTE ALEGRE DE GOIÁS'],
                    ['city' => 'MONTES CLAROS DE GOIÁS'],
                    ['city' => 'MONTIVIDIU'],
                    ['city' => 'MONTIVIDIU DO NORTE'],
                    ['city' => 'MORRINHOS'],
                    ['city' => 'MORRO AGUDO DE GOIÁS'],
                    ['city' => 'MOSSÂMEDES'],
                    ['city' => 'MOZARLÂNDIA'],
                    ['city' => 'MUNDO NOVO'],
                    ['city' => 'MUTUNÓPOLIS'],
                    ['city' => 'NAZÁRIO'],
                    ['city' => 'NERÓPOLIS'],
                    ['city' => 'NIQUELÂNDIA'],
                    ['city' => 'NOVA AMÉRICA'],
                    ['city' => 'NOVA AURORA'],
                    ['city' => 'NOVA CRIXÁS'],
                    ['city' => 'NOVA GLÓRIA'],
                    ['city' => 'NOVA IGUAÇU DE GOIÁS'],
                    ['city' => 'NOVA ROMA'],
                    ['city' => 'NOVA VENEZA'],
                    ['city' => 'NOVO BRASIL'],
                    ['city' => 'NOVO GAMA'],
                    ['city' => 'NOVO PLANALTO'],
                    ['city' => 'ORIZONA'],
                    ['city' => 'OURO VERDE DE GOIÁS'],
                    ['city' => 'OUVIDOR'],
                    ['city' => 'PADRE BERNARDO'],
                    ['city' => 'PALESTINA DE GOIÁS'],
                    ['city' => 'PALMEIRAS DE GOIÁS'],
                    ['city' => 'PALMELO'],
                    ['city' => 'PALMINÓPOLIS'],
                    ['city' => 'PANAMÁ'],
                    ['city' => 'PARANAIGUARA'],
                    ['city' => 'PARAÚNA'],
                    ['city' => 'PEROLÂNDIA'],
                    ['city' => 'PETROLINA DE GOIÁS'],
                    ['city' => 'PILAR DE GOIÁS'],
                    ['city' => 'PIRACANJUBA'],
                    ['city' => 'PIRANHAS'],
                    ['city' => 'PIRENÓPOLIS'],
                    ['city' => 'PIRES DO RIO'],
                    ['city' => 'PLANALTINA'],
                    ['city' => 'PONTALINA'],
                    ['city' => 'PORANGATU'],
                    ['city' => 'PORTEIRÃO'],
                    ['city' => 'PORTELÂNDIA'],
                    ['city' => 'POSSE'],
                    ['city' => 'PROFESSOR JAMIL'],
                    ['city' => 'QUIRINÓPOLIS'],
                    ['city' => 'RIALMA'],
                    ['city' => 'RIANÁPOLIS'],
                    ['city' => 'RIO QUENTE'],
                    ['city' => 'RIO VERDE'],
                    ['city' => 'RUBIATABA'],
                    ['city' => 'SANCLERLÂNDIA'],
                    ['city' => 'SANTA BÁRBARA DE GOIÁS'],
                    ['city' => 'SANTA CRUZ DE GOIÁS'],
                    ['city' => 'SANTA FÉ DE GOIÁS'],
                    ['city' => 'SANTA HELENA DE GOIÁS'],
                    ['city' => 'SANTA ISABEL'],
                    ['city' => 'SANTA RITA DO ARAGUAIA'],
                    ['city' => 'SANTA RITA DO NOVO DESTINO'],
                    ['city' => 'SANTA ROSA DE GOIÁS'],
                    ['city' => 'SANTA TEREZA DE GOIÁS'],
                    ['city' => 'SANTA TEREZINHA DE GOIÁS'],
                    ['city' => 'SANTO ANTÔNIO DA BARRA'],
                    ['city' => 'SANTO ANTÔNIO DE GOIÁS'],
                    ['city' => 'SANTO ANTÔNIO DO DESCOBERTO'],
                    ['city' => 'SÃO DOMINGOS'],
                    ['city' => 'SÃO FRANCISCO DE GOIÁS'],
                    ['city' => "SÃO JOÃO D'ALIANÇA"],
                    ['city' => 'SÃO JOÃO DA PARAÚNA'],
                    ['city' => 'SÃO LUÍS DE MONTES BELOS'],
                    ['city' => 'SÃO LUÍZ DO NORTE'],
                    ['city' => 'SÃO MIGUEL DO ARAGUAIA'],
                    ['city' => 'SÃO MIGUEL DO PASSA QUATRO'],
                    ['city' => 'SÃO PATRÍCIO'],
                    ['city' => 'SÃO SIMÃO'],
                    ['city' => 'SENADOR CANEDO'],
                    ['city' => 'SERRANÓPOLIS'],
                    ['city' => 'SILVÂNIA'],
                    ['city' => 'SIMOLÂNDIA'],
                    ['city' => "SÍTIO D'ABADIA"],
                    ['city' => 'TAQUARAL DE GOIÁS'],
                    ['city' => 'TERESINA DE GOIÁS'],
                    ['city' => 'TEREZÓPOLIS DE GOIÁS'],
                    ['city' => 'TRÊS RANCHOS'],
                    ['city' => 'TRINDADE'],
                    ['city' => 'TROMBAS'],
                    ['city' => 'TURVÂNIA'],
                    ['city' => 'TURVELÂNDIA'],
                    ['city' => 'UIRAPURU'],
                    ['city' => 'URUAÇU'],
                    ['city' => 'URUANA'],
                    ['city' => 'URUTAÍ'],
                    ['city' => 'VALPARAÍSO DE GOIÁS'],
                    ['city' => 'VARJÃO'],
                    ['city' => 'VIANÓPOLIS'],
                    ['city' => 'VICENTINÓPOLIS'],
                    ['city' => 'VILA BOA'],
                    ['city' => 'VILA PROPÍCIO']
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
