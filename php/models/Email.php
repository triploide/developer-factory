<?php
class Email extends Doctrine_Record
{

    public function setTableDefinition()
    {
        $this->setTableName('email');
        $this->hasColumn('id', 'integer', 3, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('value', 'string', 255);
        $this->hasColumn('pendiente', 'integer', 1, array('default' => 1, 'unsigned'=>true));
    }

    public static function noLeidos()
    {
        return Doctrine_Query::create()
            ->select('count(id)')
            ->from('Email')
            ->where('pendiente = ?', 1)
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }
    
}
