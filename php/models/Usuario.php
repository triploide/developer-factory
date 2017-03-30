<?php
class Usuario extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->setTableName('usuario');
        $this->hasColumn('id', 'integer', 1, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('nombre', 'string', 80);
        $this->hasColumn('nick', 'string', 32);
        $this->hasColumn('pass', 'string', 64);
        $this->hasColumn('salt', 'string', 64);
    }

    //INCIO DE GETERS Y SETERS
    public function setPass($pass)
    {
        $salt = uniqid(mt_rand(), true);
        $this->_set('pass', hash('sha256', $salt.$pass));
        $this->_set('salt', $salt);
    }
    //FIN SETERS Y GETERS

    static public function isValido($nick, $pass)
    {
        $q = Doctrine_Query::create()
                ->select('u.*')
                ->from('Usuario u')
                ->where('u.nick = ?', $nick);
        $usuario = $q->fetchOne();
        return ($usuario && $usuario->pass == hash('sha256', $usuario->salt.$pass)) ? $usuario : false;
    }

}
