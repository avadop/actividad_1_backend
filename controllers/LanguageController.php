<?php
  require_once('../../models/Language.php');
   
  function listAllLanguages()
  {
      $languageList = Language::getAll();
      $languageObjectArray = [];

      foreach($languageList as $languageItem)
      {
          $languageObject = new Language($languageItem->getId(), $languageItem->getName(), $languageItem->getIsoCode());
          array_push($languageObjectArray, $languageObject);
      }
      
      return $languageObjectArray;
  }

 function storeLanguage($languageName, $languageIsoCode)
  {
     $languageCreated = false;

     if($languageName && $languageIsoCode) {
        $newLanguage = new Language(null, $languageName, $languageIsoCode);
        $languageCreated = $newLanguage->store();
     }

      return $languageCreated;
  }

  function updateLanguage($languageId, $languageName, $languageIsoCode)
  {
      $newlanguage = new Language($languageId, $languageName, $languageIsoCode);
      $languageCreated = $newlanguage->update();

      return $languageCreated;
  }

  function getLanguageData($idLanguage) 
  {
      $language = new Language($idLanguage, '', '');
      $languageObject = $language->getItem();

      return $languageObject;
  }

  function deleteLanguage($idLanguage)
  {
      $language = new Language($idLanguage, '', '');
      $languageObject = $language->delete();

      return $languageObject;
  }
?>