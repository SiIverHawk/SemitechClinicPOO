<?php
include_once('app/http/Database/UsersDatabase/UserRepository.php');

/**
 * clase que sirve para validar el login
 */
class LoginValidator
{

    /**
     * obtiene los datos del usuario para validar
     *
     * @var array
     */
    private $user;

    /**
     * obtiene los errores producidos durante la validación
     *
     * @var array
     */
    private $error;

    /**
     * valida los datos ingresados en el formulario de autenticación
     *
     * @param string $email
     * @param string $password
     * @param boolean $connection
     */
    public function __construct($email, $password, $connection)
    {
        $this->error = "";

        if (!$this->variableStarted($email) || !$this->variableStarted($password)) 
        {
            $this->user = null;
            $this->error = "Debes introducir tu email y tu contraseña";
        } 
        else 
        {
            $this->user = UserRepository::getUserByEmail($connection, $email);

            if (is_null($this->user) || !password_verify($password, $this->user->getPassword())) 
            {
                $this->error = "Datos incorrectos";
            }
        }
    }

    /**
     * comprueba si una variable ha sido iniciada y no esta vacía
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
     * obtiene los datos del usuario para validar
     *
     * @return  array
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * obtiene los errores producidos durante la validación
     *
     * @return  array
     */ 
    public function getError()
    {
        return $this->error;
    }

    /**
     * Muestra los errores que se han declarado
     *
     * @return void
     */
    public function showError()
    {
        if ($this->error !== '') 
        {
            echo "<div class='alert alert-danger' role='alert'>";
            echo $this->error;
            echo "</div><br>";
        }
    }
}
