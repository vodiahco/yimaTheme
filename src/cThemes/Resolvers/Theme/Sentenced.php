<?php
namespace cThemes\Resolvers\Theme;

use cThemes\Resolvers\InterfaceClass;

class Sentenced implements InterfaceClass
{
   protected $name = 'builder';

   public function getName()
   {
       return $this->name;
   }
}