<?php
include_once('app/http/Database/UsersDatabase/UserRepository.php');

/**
 * Clase para verificar campos de formularios
 */
class UserValidator
{
  
  private $input;

  private $inputErrors;

  /**
   * Retorna los errores encontrados
   *
   * @param array $input
   * @param boolean $connection
   */
  public function __construct(array $input, $connection) 
  {
    $this->input = '';

    $this->inputErrors = $this->validateInputs($connection, $input);

  }

  /**
   * Verifica si una variable ha sido declarada y no está vacía
   *
   * @param string $variable
   * @return boolean
   */
  private function variableStarted($variable)
  {
    if (isset($variable) && !empty($variable)) 
    {
      return true;
    }

    return false;
  }

/**
 * valida los campos del formulario y si encuentra errores, retorna un arreglo de errores
 *
 * @param boolean $connection
 * @param array $input
 * @return array $errors
 */
  private function validateInputs($connection , $input)
  {
    $errors = [];
    foreach ($input as $key => $value) 
    {
      switch ($key) 
      {
        case 'user-name':
          
        if (!$this->variableStarted($input[$key])) 
          {
            $errors['err']['name'][] = 'No se ha ingresado un nombre';
          }

          if(strlen($input[$key]) < 3)
          {
            $errors['err']['name'][] = 'El nombre debe ser más largo que 3 caracteres.';
          }

          if (!preg_match("/^[a-zA-Z ]*$/",$input[$key])) 
          {
            $errors['err']['name'][] = "Solo letras y espacios son aceptados.";
          }

          if(strlen($input[$key]) > 50)
          {
            $errors['err']['name'][] = 'El nombre no puede ocupar más de 50 caracteres.';
          }
          break;

          case 'user-lastname':
          if (!$this->variableStarted($input[$key])) 
          {
            $errors['err']['lastname'][] = 'No se ha ingresado un apellido';
          }

          if(strlen($input[$key]) < 3)
          {
            $errors['err']['lastname'][] = 'El apellido debe ser más largo que 3 caracteres.';
          }

          if (!preg_match("/^[a-zA-Z ]*$/",$input[$key])) 
          {
            $errors['err']['lastname'][] = "Solo letras y espacios son aceptados.";
          }

          if(strlen($input[$key]) > 50)
          {
            $errors['err']['lastname'][] = 'El apellido no puede ocupar más de 50 caracteres.';
          }
          break;

          case 'user-email':
          if (!$this->variableStarted($input[$key])) 
          {
            $errors['err']['email'][] = 'Se debe proporcionar un correo electrónico.';
          }

          if(UserRepository::checkUsersByEmail($connection, $input[$key]))
          {
            $errors['err']['email'][] = 'Este correo electrónico ya está en uso. Por favor, pruebe otro correo electrónico.';
          }

          if(strlen($input[$key]) > 250)
          {
            $errors['err']['email'][] = 'El correo electrónico no puede ocupar más de 250 caracteres.';
          }

          if (!filter_var($input[$key], FILTER_VALIDATE_EMAIL)) 
          {
            $errors['err']['email'][] = "Formato de correo inválido.";
          }          
          break;

          case 'user-password':
          if (!$this->variableStarted($input[$key])) 
          {
            $errors['err']['password'][] = 'Se debe proporcionar una contraseña';
          }

          if(strlen($input[$key]) > 150)
          {
            $errors['err']['password'][] = 'La contraseña no puede ocupar más de 150 caracteres.';
          }

          if(strlen($input[$key]) < 6)
          {
            $errors['err']['password'][] = 'La contraseña debe ser más largo que 6 caracteres.';
          }
          break;
      }
    }

    return $errors;
  }

  /**
   * Get the value of inputErrors
   */ 
  public function getInputErrors()
  {
    return $this->inputErrors;
  }
}