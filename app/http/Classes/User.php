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
   * Set the value of id
   *
   * @return  self
   */ 
  public function setId($id)
  {
    $this->id = $id;

    return $this;
  }

  /**
   * Get the value of name
   */ 
  public function getName()
  {
    return $this->name;
  }

  /**
   * Set the value of name
   *
   * @return  self
   */ 
  public function setName($name)
  {
    $this->name = $name;

    return $this;
  }

  /**
   * Get the value of lastname
   */ 
  public function getLastname()
  {
    return $this->lastname;
  }

  /**
   * Set the value of lastname
   *
   * @return  self
   */ 
  public function setLastname($lastname)
  {
    $this->lastname = $lastname;

    return $this;
  }

  /**
   * Get the value of email
   */ 
  public function getEmail()
  {
    return $this->email;
  }

  /**
   * Set the value of email
   *
   * @return  self
   */ 
  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  /**
   * Get the value of password
   */ 
  public function getPassword()
  {
    return $this->password;
  }

  /**
   * Set the value of password
   *
   * @return  self
   */ 
  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  /**
   * Get the value of createdAt
   */ 
  public function getCreatedAt()
  {
    return $this->createdAt;
  }

  /**
   * Set the value of createdAt
   *
   * @return  self
   */ 
  public function setCreatedAt($createdAt)
  {
    $this->createdAt = $createdAt;

    return $this;
  }

  /**
   * Get the value of updatedAt
   */ 
  public function getUpdatedAt()
  {
    return $this->updatedAt;
  }

  /**
   * Set the value of updatedAt
   *
   * @return  self
   */ 
  public function setUpdatedAt($updatedAt)
  {
    $this->updatedAt = $updatedAt;

    return $this;
  }
}
