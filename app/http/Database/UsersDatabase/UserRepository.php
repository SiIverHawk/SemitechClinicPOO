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
      } 
      catch (PDOException $ex) 
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

      } 
      catch (PDOException $ex) 
      {
        print('ERROR: ' . $ex->getMessage());
      }
    }
    return $user;
  }

/**
 * Verifica si un correo electronico ya existe
 *
 * @param boolean $connection
 * @param string $email
 * @return boolean
 */
  public static function checkUsersByEmail($connection, $email)
  {
    $user = true;

    if (isset($connection)) 
    {
      try 
      {
        include_once('app/http/Classes/User.php');

        $querySql = "SELECT * FROM users WHERE email = :email";

        $query = $connection->prepare($querySql);
        $query->bindParam(':email', $email);
        $query->execute();

        $queryResult = $query->fetchAll();

        if (count($queryResult)) 
        {
          $user = true;
        }
        else
        {
          $user = false;
        }

      } 
      catch (PDOException $ex) 
      {
        print('ERROR: ' . $ex->getMessage());
      }
    }
    return $user;
  }

/**
 * función para insertar User nuevo
 *
 * @param array $input
 * @param boolean $connection
 * @return array
 */
  public function create($input, $connection)
  {
    unset($input['action']);

    if (isset($connection)) 
    {
      try 
      {
        include_once('app/http/Validators/UserValidator/UserValidator.php');

        $userValidator = new UserValidator($input, $connection);

        if (count($userValidator->getInputErrors()) == 0) 
        {
          include_once('app/http/Classes/User.php');

          $inputSql = [];
          $count = 0;
        
          foreach ($input as $key => $value) 
          {
            $keys[] = substr($key, strpos($key, '-'));
            $inputSql[] = str_replace('-', ':', $keys[$count]);
            $count++;
          }

          $querySql = 'INSERT INTO users(name, lastname, email, password, created_at, updated_at) VALUES(:name, :lastname, :email, :password, NOW(), NOW())';
          $query = $connection->prepare($querySql);
          $count = 0;

          foreach($input as $key => &$value)
          {

            if ($inputSql[$count] == ':password') 
            {
              $value = password_hash($value, PASSWORD_DEFAULT);
            }
            $query->bindParam($inputSql[$count], $value, PDO::PARAM_STR);
            $count++;
          }
          $queryResult = $query->execute();

          if ($queryResult) 
          {
            echo json_encode(['success' => true, 'message' => 'Usuario insertado exitosamente']);
          }
        }
        else
        {
          echo json_encode(['success' => false, $userValidator->getInputErrors()]);
        }
      } 
      catch (PDOException $ex) 
      {
        print('ERROR: ' . $ex->getMessage());
        echo json_encode(['success' => false, 'message' => 'Usuario insertado exitosamente']);
      }
    }

  }

}

/**
 * Validacion para verificar la accion del formulario
 */
if (isset($_POST['action']) && !empty($_POST['action'])) 
{
  include_once('app/config.php');
  include_once('app/connection.php');
  include_once('app/http/Database/UsersDatabase/UserRepository.php');

  Connection::openConnection();

  $action = $_POST['action'];

  switch ($action) 
  {
    case 'save':
      UserRepository::create($_POST, Connection::getConnection());
      break;
    
    default:
      # code...
      break;
  }

  Connection::closeConnection();
}