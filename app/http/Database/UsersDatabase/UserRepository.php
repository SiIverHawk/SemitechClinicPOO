<?php
/**
 * Consultas relacionadas a la tabla users
 */
class UserRepository
{
  /**
   * Obtiene todos los usuarios de la tabla users
   *
   * @return array $users
   */
  public static function allUsers($connection)
  {
    $users = [];
    if (isset($connection)) 
    {
      try 
      {
        include_once('app/http/Classes/User.php');
        
        $querySql = 'SELECT * FROM users';

        $query = $connection->prepare($querySql);
        $query->execute();
        $queryResult = $query->fetchAll();

        if (count($queryResult)) 
        {
          foreach ($queryResult as $row) 
          {
            $users[] = new User(
              $row['id'],
              $row['name'],
              $row['lastname'],
              $row['email'],
              $row['password'],
              $row['created_at'],
              $row['updated_at']
            );
          }
        }
      } catch (PDOException $ex) 
      {
        print('ERROR: ' . $ex->getMessage() . '<br>');
      }
    }

    return $users;
  }

  /**
   * obtiene los datos del usuario por medio del email ingresado
   *
   * @param boolean $connection
   * @param string $email
   * @return array
   */
  public static function getUserByEmail($connection, $email)
  {
    $user = null;

    if (isset($connection)) 
    {
      try 
      {
        include_once('app/http/Classes/User.php');

        $querySql = "SELECT * FROM users WHERE email = :email";

        $query = $connection->prepare($querySql);
        $query->bindParam(':email', $email);
        $query->execute();

        $queryResult = $query->fetch();

        if ($queryResult) 
        {
          $user = new User(
            $queryResult['id'],
            $queryResult['name'],
            $queryResult['lastname'],
            $queryResult['email'],
            $queryResult['password'],
            $queryResult['created_at'],
            $queryResult['updated_at']
          );
        }

      } catch (PDOException $ex) 
      {
        print('ERROR: ' . $ex->getMessage());
      }
    }
    return $user;
  }
}