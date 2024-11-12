<?php
/**
 * -------------------------------------------------------------------------
 * Infoestadisticas plugin for GLPI
 * -------------------------------------------------------------------------
 */

class PluginInfoestadisticasProfile extends Profile {
   static $rightname = 'profile';

   static function getAllRights() {

      $rights = [
        ['itemtype'  => 'PluginInfoestadisticasEstadisticas',
              'label'     => __('Estadísticas', 'infoestadisticas'),
              'field'     => 'plugin_infoestadisticas_estadisticas',
              'rights'    => [READ => __('Read')]],
        ['itemtype'  => 'PluginInfoestadisticasInformes',
              'label'     => __('Informes', 'infoestadisticas'),
              'field'     => 'plugin_infoestadisticas_informes',
              'rights'    => [READ => __('Read')]]
      ];
      return $rights;
   }


   static function uninstall() {
      global $DB;

      //Delete rights associated with the plugin
      $query = "DELETE
                FROM `glpi_profilerights`
                WHERE `name` LIKE 'plugin_infoestadisticas_%'";
      $DB->queryOrDie($query, $DB->error());
   }


   function getTabNameForItem(CommonGLPI $item, $withtemplate = 0) {

      if ($item->getType() == 'Profile') {
         if ($item->getField('interface') == 'central') {
            // return __('Informes y estadísticas', 'infoestadisticas');
            return self::createTabEntry(__('Informes y estadísticas', 'infoestadisticas'));
         }
         return '';
      }
      return '';
   }


   static function displayTabContentForItem(CommonGLPI $item, $tabnum=1, $withtemplate=0) {

     if ($item->getType() == 'Profile') {
        $profile = new self();
        // $ID   = $item->getField('id');
        $ID   = $item->getID();
        $profile->showForm($ID);
     }
     return true;
   }

    /**
    * @param $profile
    **/
    static function addDefaultProfileInfos($profiles_id, $rights) {

       $profileRight = new ProfileRight();
       foreach ($rights as $right => $value) {
          if (!countElementsInTable(
              'glpi_profilerights',
              ['profiles_id' => $profiles_id, 'name' => $right]
          )) {
             $myright['profiles_id'] = $profiles_id;
             $myright['name']        = $right;
             $myright['rights']      = $value;
             $profileRight->add($myright);

             //Add right to the current session
             $_SESSION['glpiactiveprofile'][$right] = $value;
          }
       }
    }


    /**
    * @param $ID  integer
    */
   static function createFirstAccess($profiles_id) {

      include_once Plugin::getPhpDir('infoestadisticas')."/inc/profile.class.php";
      foreach (self::getAllRights() as $right) {
         self::addDefaultProfileInfos(
             $profiles_id,
             [$right['field'] => READ,]
         );
      }
   }


  /**
  * Show profile form
  *
  * @param $items_id integer id of the profile
  * @param $target value url of target
  *
  * @return nothing
  **/
  function showForm($profiles_id = 0, $openform = true, $closeform = true){
     global $DB;

     $canedit = Session::haveRightsOr(self::$rightname, [CREATE, UPDATE, PURGE]);

     echo "<div class='firstbloc'>";
     if ($canedit && $openform) {
        $prof = new Profile();
        echo "<form method='post' action='".$prof->getFormURL()."'>";
     }

     $profile = new Profile();
     $profile->getFromDB($profiles_id);

     $rights = self::getAllRights();
     $profile->displayRightsChoiceMatrix($rights,
          ['canedit'       => $canedit,
           'default_class' => 'tab_bg_2',
           'title'         => __('Gestión de permisos por perfil','infoestadisticas')]);
     if ($canedit && $closeform) {
        echo "<div class='center'>";
        echo Html::hidden('id', ['value' => $profiles_id]);
        echo Html::submit(_sx('button', 'Save'), ['name' => 'update']);
        echo "</div>\n";
        Html::closeForm();
     }
     echo "</div>";

  }


}
