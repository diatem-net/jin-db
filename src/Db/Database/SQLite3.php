<?php

/**
 * Jin Framework
 * Diatem
 */

namespace Jin2\Db\Database;

/**
 * Connexion aux bases de données SqLite3 (Ne pas utiliser cette classe directement).
 * Utiliser la classe Jin2\Db\DbConnexion.
 */
class SQLite3
{

  /**
   * @var string  Fichier de stockage
   */
  protected $fileName = NULL;

  /**
   * @var \PDO    Objet PDO gérant la connexion
   */
  public $cnx = NULL;

  /**
   * Constructeur
   *
   * @param string $fileName  Fichier de la base de données
   */
  public function __construct($fileName)
  {
    $this->fileName = $fileName;
  }

  /**
   * Ouvre une connexion
   *
   * @return boolean
   */
  public function connect()
  {
    try {
      $this->cnx = new SQLitePDO($this->fileName);
      $this->cnx->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
      return true;
    } catch (\Exception $e) {
      return false;
    }
  }

  /**
   * Débute une transaction
   */
  public function beginTransaction()
  {
    $this->cnx->beginTransaction();
  }

  /**
   * Effectue le commit de la transaction
   */
  public function commitTransaction()
  {
    $this->cnx->commit();
  }

  /**
   *Annule la transaction
   */
  public function rollBackTransaction()
  {
    $this->cnx->rollback();
  }

  /**
  * Retourne le dernier ID inséré.
  * @param string $tableName  Nom de la table
  * @param string $cle  Nom de la clé primaire
  */
  public function getLastInsertId($tableName, $cle)
  {
    // TODO: getLastInsertId() content
    return null;
  }

}
