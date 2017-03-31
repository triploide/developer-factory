<?php
class Grupo extends Doctrine_Record
{
    public function setTableDefinition()
    {
        $this->setTableName('grupo');
        $this->hasColumn('id', 'integer', 1, array('primary' => true, 'unsigned'=>true, 'autoincrement'=>true));
        $this->hasColumn('nombre', 'string', 255);
        $this->hasColumn('puntos', 'integer', 2);
        $this->hasColumn('imagen_id', 'integer', 3, array('unsigned'=>true));
    }

    public function setUp()
    {
        $this->hasOne('Imagen as imagen',array(
            'local'=>'imagen_id',
            'foreign'=>'id'
        ));
        $this->hasMany('Integrante as integrantes', array(
            'local' => 'id',
            'foreign' => 'grupo_id'
        ));
        //behaviors
        $this->actAs('Sluggable', array('fields'=>array('nombre'), 'unique'=>true,'canUpdate'=>true,'name'=>'slug'));
        $this->actAs('Timestampable');
    }

}
