<?php 



class Usuarios{
    public $idusuarios;
    public $nombre;
    public $password;
    public $correo;
    public $idrol;




    function Constructor($iduser, $name, $pass,$email, $rol){
        $this->idusuarios=$iduser;
        $this->nombre=$name;
        $this->password=$pass;
        $this->correo=$email;
        $this->idrol=$rol;
     

    }
    function ConstructorSobrecargado($iduser, $name, $pass,$email, $rol){
        $this->idusuarios=$iduser;
        $this->nombre=$name;
        $this->password=$pass;
        $this->correo=$email;
        $this->idrol=$rol;
      }
  
      function SetAdd($iduser, $name, $pass,$email, $rol){
        $this->idusuarios=$iduser;
        $this->nombre=$name;
        $this->password=$pass;
        $this->correo=$email;
        $this->idrol=$rol;
      }

    function SetUser($user){
        $this->nombre=$user;

   

    }

    function SetContra($pass){
        $this->password=$pass;

   

    }

    function SetRol($rol){
        $this->idrol=$rol;

   

    }
    function GetAlumnos($Conexion){

        $query = "SELECT * from usuarios";
        $result = mysqli_query($Conexion, $query);
        $lista = array();
        while ($row = mysqli_fetch_array($result))
        {
            $Usuario= new Usuarios();
            $Usuario->ConstructorSobrecargado($row['idusuarios'],$row['nombre'],$row['password'],$row['correo'],$row['correo']);
          $lista[]=$Usuario;

        }
        return $lista;
      }

        function EditarUsuario($Conexion){

          $Res = new Respuesta();
          if (trim($this->nombre)==""){
            $Res->NoSucces("El nombre o usuario no puede ir en blanco");}
            if (trim($this->contraseña)==""){
              $Res->NoSucces("Ingrese una contraseña"); }
              if (trim($this->idusuarios)==""){
                $Res->NoSucces("El ID no puede ir en blanco");
            
            }else{

            mysqli_query($Conexion,
              "UPDATE  usuarios SET nombre='$this->nombre',password='$this->password',
              idrol='$this->idrol' where idusuarios='$this->idusuarios'"
            );
            if (mysqli_error($Conexion)){

              $Res->NoSucces("Error al Editar");

            }else{
              $Res->Succes("Se edito Correctamente el usuario: ".$this->nombre );

            }
          }
          return $Res;
      }
    function InsertarUsuario($Conexion){
        $Res = new Respuesta();
        
        if (trim($this->nombre)==""){
        $Res->NoSucces("El nombre o usuario no puede ir en blanco");}
        if (trim($this->contraseña)==""){
          $Res->NoSucces("Ingrese una contraseña"); }
          if (trim($this->idusuarios)==""){
            $Res->NoSucces("El ID no puede ir en blanco");
        
        }else{
          mysqli_query($Conexion,
            "INSERT into usuarios (idusuarios, nombre,password,idrol, correo)
              values('$this->idusuarios','$this->nombre','$this->contraseña','$this->correo','$this->idrol')"
          );
          if (mysqli_error($Conexion)){
        
            $Res->NoSucces("Error al Insertar");
        
          }else{
            $Res->Succes("Se Inserto Correctamente el usuario: ".$this->nombre );
        
          }
        
        }
        return $Res;
        
      }
      function ObtenerUsuariosById($iduser, $Conexion){
        $query = "SELECT idusuarios,nombre, password, correo,idrol from usuarios where nombre='$iduser'";
        $result = mysqli_query($Conexion, $query);
        $Usuario = new Usuarios();
        if ($row = mysqli_fetch_array($result))
    {
  
        $Usuario->ConstructorSobrecargado($row['idusuarios'],$row['nombre'],$row['password'],$row['correo'],$row['idrol']);
  
  
    }
    return  $Usuario ;
  
  }

    function ObtenerPassByUser($user,$Conexion){

        $query = "SELECT password, idrol from usuarios WHERE nombre="."'".$user."'";
        $result = mysqli_query($Conexion, $query);
        $Usuario = new Usuarios();
 
            while ($row = mysqli_fetch_array($result))
            {
              
              $Usuario->SetContra($row['password']);
              $Usuario->SetUser($user);
              $Usuario->SetRol($row['idrol']);
            
            }
        
          
        
        return $Usuario;
      }
}

?>