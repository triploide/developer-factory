<?php
class Imagen extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('imagen');
        $this->hasColumn('id', 'integer', 3, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('titulo', 'string', 255, array('default'=>''));
        $this->hasColumn('bajada', 'string', 255, array('default'=>''));
        $this->hasColumn('src', 'string', 255);
        $this->hasColumn('orden', 'integer', 3, array('default'=>0, 'unsigned'=>true));
        $this->hasColumn('is_video', 'integer', 1, array('default'=>0, 'unsigned'=>true));
    }
    
    public static function lastId ()
    {
        $q = Doctrine_Query::create()
                ->select('i.id')
                ->from('Imagen i')
                ->orderBy('i.id desc')
                ->limit(1)
                ->offset(0);
        $result = $q->fetchOne(array(), Doctrine::HYDRATE_SINGLE_SCALAR);
        return ($result)?$result:0;
    }
    
}
