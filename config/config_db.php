<?php
class DB extends DBmysql {
   public $dbhost = 'localhost';
   public $dbuser = 'root';
   public $dbpassword = 'INTEF';
   public $dbdefault = 'glpi_7_new';
   public $allow_datetime = false;
   public $use_timezones = true;
   public $use_utf8mb4 = true;
   public $allow_myisam = false;
   public $allow_signed_keys = false;
}
