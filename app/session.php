<?php

/**
 * Clase donde se crea, verifica y destruye la autenticación
 */
class Session
{
  /**
   * Agrega una variable de sesion si el usuario no se ha autenticado
   *
   * @param int $id
   * @param string $user
   * @return void
   */ 
  public static function login($id, $user)
  {
    if (session_id() == '') 
    {
      session_start();
    }

    $_SESSION['userId'] = $id;
    $_SESSION['userName'] = $user;
  }

  /**
   * Destruye sesion de usuario autenticado
   *
   * @return void
   */
  public static function logout()
  {
    if (isset($_SESSION['userId'])) 
    {
      unset($_SESSION['userId']);
    }
    session_destroy();
  }

  /**
   * Verifica si la sesion ha sido iniciada
   *
   * @return boolean
   */
  public static function isSession()
  {
    if (session_id() == '') 
    {
      session_start();
    }

    if (isset($_SESSION['userId'] ) && isset($_SESSION['userName'])) 
    {
      return true;
    }
    
    return false;
  }
}