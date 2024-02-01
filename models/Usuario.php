<?php
class Usuario
{
    protected $id;
    protected $nombre;
    protected $apellidos;
    protected $email;
    protected $password;
    protected $rol;
    protected $imagenes;
    protected $db;

    public function __construct()
    {
        $this->db = ConnectionDB::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getApellidos()
    {
        return $this->apellidos;
    }

    public function setApellidos($apellidos): self
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol): self
    {
        $this->rol = $rol;
        return $this;
    }

    public function getImagenes()
    {
        return $this->imagenes;
    }

    public function setImagenes($imagenes): self
    {
        $this->imagenes = $imagenes;
        return $this;
    }
    public function registrar()
    {
        $sql = "INSERT INTO usuarios VALUES(null, '{$this->getNombre()}', '{$this->getApellidos()}',
        '{$this->getEmail()}', '{$this->getPassword()}', 'usuario', null)";
        $insert = $this->db->query($sql);
        $result = false;
        if ($insert) {
            $result = true;
        }
        return $result;
    }
    public function loguear()
    {
        $result = false;
        $email = $this->email;
        $password = $this->password;
        $sql = "SELECT * FROM usuarios WHERE email = '$email'";
        $loguear = $this->db->query($sql);
        if ($loguear && $loguear->num_rows == 1) {
            $user = $loguear->fetch_object();
            $verify = password_verify($password, $user->password);
            if ($verify) {
                $result = $user;
            }
        }
        return $result;
    }
}
