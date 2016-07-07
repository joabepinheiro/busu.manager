<?php

namespace Application\Document;

use Doctrine\ODM\MongoDB\DocumentRepository;


class UsuarioRepository extends DocumentRepository
{

    function findByEmailSenha($email, $senha){

        $usuario = $this->findOneBy(array('email' => $email));
        if(!is_null($usuario)) {
            $hashSenha = $usuario->encryptPassword($senha);

            if($hashSenha == $usuario->getSenha()){
                return $usuario;
            }
        }
        return false;
    }

}
