<?php

namespace KairosEmotionAPILib\Controllers;

require_once 'vendor/autoload.php';

include_once ("src/Controllers/EmotionAnalysisController.php");

echo EmotionAnalysisController::createMedia('http://media.kairos.com/test.flv');


