<?php
/**
 * Clase de la tabla Usuario
 */
class User
{
  private $id;
  private $name;
  private $lastname;
  private $email;
  private $password;
  private $createdAt;
  private $updatedAt;

  /**
   * Asignar valores según los campos de la tabla user 
   *
   * @param int $id
   * @param string $name
   * @param string $lastname
   * @param string $email
   * @param string $password
   * @param datetime $createdAt
   * @param datetime $updatedAt
   */
  public function __construct($id, $name, $lastname, $email, $password, $createdAt, $updatedAt) 
  {
    $this->id = $id;
    $this->name = $name;
    $this->lastname = $lastname;
    $this->email = $email;
    $this->password = $password;
    $this->createdAt = $createdAt;
    $this->updatedAt = $updatedAt;
  }

  /**
   * Get the value of id
   */ 
  public function getId()
  {
    return $this->id;
  }

  /**
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Get the value of lastname
   */ 
  public function getLastname()
  {
    return $this->lastname;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Get the value of password
   */ 
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Get the value of createdAt
   */ 
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * Get the value of updatedAt
   */ 
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }
}
