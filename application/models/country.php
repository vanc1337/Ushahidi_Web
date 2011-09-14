<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Model for Countries where incidents occured
 *
 * PHP version 5
 * LICENSE: This source file is subject to LGPL license 
 * that is available through the world-wide-web at the following URI:
 * http://www.gnu.org/copyleft/lesser.html
 * @author     Ushahidi Team <team@ushahidi.com> 
 * @package    Ushahidi - http://source.ushahididev.com
 * @subpackage Models
 * @copyright  Ushahidi - http://www.ushahidi.com
 * @license    http://www.gnu.org/copyleft/lesser.html GNU Lesser General Public License (LGPL) 
 */

class Country_Model extends ORM
{
	/**
	 * Many-to-one relationship definition
	 *
	 * @var array
	 */
	protected $belongs_to = array('location');
	
	/**
	 * One-to-many relationship definition
	 * @var array
	 */
	protected $has_many = array('city');
	
	/**
	 * Database table name
	 *
	 * @var string
	 */
	protected $table_name = 'country';
	
	/**
	 * Given a country name, returns a country model object reference. Country names
	 * are unique so no two countries should have the same name
	 *
	 * @param string $country_name The name of the country
	 * @return mixed ORM reference if country exists, FALSE otherwise
	 */
	public static function get_country_by_name($country_name)
	{
		// Find the country with the specified name
		$country = self::factory('country')->where('country', $country_name)->find();
		
		// Return
		return ($country->loaded)? $country : FALSE;

	}
	
	/**
	 * Return a country's name based on its country_id
	 *
	 * @param int $id The ID of the country
	 * @return string country
	 */
	public static function get_country_name($id)
	{
		$country = self::factory('country')->where('id',$id)->find();
		return ($country->loaded)? $country->country : FALSE;
		
	}
}
