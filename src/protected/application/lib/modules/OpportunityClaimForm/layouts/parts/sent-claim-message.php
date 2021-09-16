<p style="margin-top: 20px">
    <?php \MapasCulturais\i::_e("Recurso enviado em");?> <?php echo $registration->requestedResourceTimestamp ? $registration->requestedResourceTimestamp->format(\MapasCulturais\i::__('d/m/Y à\s H:i')): ''; ?>.
</p>