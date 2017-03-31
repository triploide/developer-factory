<?php
class Integrante extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('integrante');
        $this->hasColumn('id', 'integer', 1, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('nombre', 'string', 80);
        $this->hasColumn('imagen_id', 'integer', 3, array('unsigned'=>true));
        $this->hasColumn('grupo_id', 'integer', 1, array('unsigned'=>true));
    }

    public function setUp()
    {
        $this->hasOne('Imagen as imagen',array(
            'local'=>'imagen_id',
            'foreign'=>'id'
        ));
        $this->hasOne('Grupo as grupo',array(
            'local'=>'grupo_id',
            'foreign'=>'id'
        ));
        //behaviors
        $this->actAs('Sluggable', array('fields'=>array('nombre'), 'unique'=>true,'canUpdate'=>true,'name'=>'slug'));
        $this->actAs('Timestampable');
    }

}
