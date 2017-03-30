<?php
class Consulta extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('consulta');
        $this->hasColumn('id', 'integer', 3, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('nombre', 'string', 127);
        $this->hasColumn('email', 'string', 255);
        $this->hasColumn('contenido', 'string', 1027);
        $this->hasColumn('fecha', 'datetime');
        $this->hasColumn('leido', 'integer', 1, array('unsigned'=>true, 'default' => 0));
    }

    public function getFechaHumana()
    {
        return preg_replace(
            '/([0-9]{4})-([0-9]{2})-([0-9]{2}) ([0-9]{2}):([0-9]{2}):([0-9]{2})/',
            '$3-$2-$1 a las $4:$5',
            $this->_get('fecha')
        );
    }

    public static function noLeidos()
    {
        return Doctrine_Query::create()
            ->select('count(id)')
            ->from('Consulta')
            ->where('leido = ?', 0)
            ->execute(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
    }

}
