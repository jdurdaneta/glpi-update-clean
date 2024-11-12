<?php

use Glpi\Http\Response;
use Glpi\RichText\RichText;

$AJAX_INCLUDE = 1;

include("../../../inc/includes.php");
include("../../../inc/config.php");
include("../inc/ie_ticketsTechModel.class.php");
header("Content-Type: application/json; charset=UTF-8");

$ticketsTechModel = new PluginInfoestadisticasTicketsTechModel();
$user_id = $_GET['userId'];

$groupList = $ticketsTechModel::getUserGroupsList($user_id);

echo json_encode($groupList);
