<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AP_Controller extends CI_Controller
{
  /**
   * Data from controller to view
   *
   * @var array
   */
  protected $_data = array();

  /**
   * Application datetime 
   * 
   * @var date
   */
  public $_datetime = null;

  /**
   * Default Controller
   *
   * @param null
   * @return void
   */
  public function __construct(){
    parent::__construct();

    $this->config->load('settings');
    $this->_datetime = date('Y-m-d H:i:s');
  }

  /**
   * Set Layout
   *
   * @param string $layout default | admin | public
   * @return void
   */
  public function set_layout($layout = 'default')
  {
    $this->load->library('layout', array('layoutManager'=>$layout));
  }

}
?>