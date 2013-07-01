<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Newsletters
 *
 * @package		Newsletters
 * @author		Jerel Unruh
 * @copyright	Copyright (c) 2011 - 2013, Jerel Unruh (http://jerel.co/)
 * @license		http://www.apache.org/licenses/LICENSE-2.0.html (Apache 2)
 * @link		http://github.com/jerel/newsletters
 * @Readaptação Pablo Erick Cardoso (pabloprogramador@gmail.com)
 */

class Usuarios_m extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function grupo(){
        $grupo = $this->db->get('default_groups')->result();
        return $grupo;
    }

}
