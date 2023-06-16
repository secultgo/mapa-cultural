<?php

use MapasCulturais\Entities\Registration as R;
use MapasCulturais\Entities\Agent;
use MapasCulturais\Entities\Space as SpaceRelation;
use MapasCulturais\i;
use MapasCulturais\App;

$app = App::i();

$fh = @fopen('php://output', 'w');
fprintf($fh, chr(0xEF) . chr(0xBB) . chr(0xBF));

fputcsv($fh, $data['headers']);

foreach ($data['body'] as $d) {
    fputcsv($fh, $d);
}

fclose($fh);