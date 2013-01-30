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

class Cron extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model('newsletters_m');
	}
	
	//send all newsletters that are marked for cron
	public function index($key = '')
	{
		//keep random users from triggering
		if($key == $this->settings->newsletter_cron_key)
		{
			//send a copy of $this->data along for the parser
			$data =& $this->data;
			
			if($newsletters = $this->newsletters_m->get_cron_newsletters())
			{
				foreach($newsletters as $newsletter)
				{
					$this->newsletters_m->send_newsletter($newsletter->id, '', $data);
				}
			}
		}
	}
}