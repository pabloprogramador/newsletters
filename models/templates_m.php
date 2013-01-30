<?php defined('BASEPATH') or exit('No direct script access allowed');

/**
 * Newsletters
 *
 * @package		Newsletters
 * @author		Jerel Unruh
 * @copyright	Copyright (c) 2011 - 2013, Jerel Unruh (http://jerel.co/)
 * @license		http://www.apache.org/licenses/LICENSE-2.0.html (Apache 2)
 * @link		http://github.com/jerel/newsletters
 */

class Templates_m extends MY_Model
{
	protected $_table = 'newsletter_templates';

	public function __construct()
	{
		parent::__construct();
	}

	public function get_templates()
	{
		return $this->db->get('newsletter_templates')
						->result();
	}
	
	public function get_template($id)
	{
		return $this->db->get_where('newsletter_templates', array('id' => $id))
						->row();
	}
	
	public function save_template($input)
	{
		//save edit
		if($input['id'] > 0)
		{
		return $this->db->where('id', $input['id'])
						->update('newsletter_templates',
						  array(
							'title' => $input['title'],
							'body' => $input['body']
						  ));
		}
		//save new
		return $this->db->insert('newsletter_templates',
						  array(
							'title' => $input['title'],
							'body' => $input['body']
						  ));
	}
	
	public function delete_template($id)
	{	
		return $this->db->delete('newsletter_templates', array('id' => $id));
	}
}