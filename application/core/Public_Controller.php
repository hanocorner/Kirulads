<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Public_Controller extends AP_Controller
{
  /**
   * Default Controller
   *
   * @param null
   * @return void
   */
  public function __construct()
  {
    parent::__construct();

    $this->set_layout('public');

    $this->layout->assets('assets/public/css/main.css');

    $custom_script = 'var baseurl = "'.base_url().'";';
    $this->layout->script($custom_script, 'header');

    $this->layout->assets('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', 'footer');
    $this->layout->assets(base_url('assets/vendors/popper/popper.min.js'), 'footer');
    $this->layout->assets('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', 'footer');
    
    $this->layout->assets(base_url('assets/public/js/app.js'), 'footer');
    $this->layout->assets(base_url('assets/public/js/main.js'), 'footer');
    $this->layout->assets(base_url('assets/vendors/validator/bootstrap-validate.js'), 'footer');

    $this->load->helper('cookie');
  }

  /*** */
  public function check_login_status()
  {
    if ($this->session->has_userdata('logged_in') && $this->session->logged_in == TRUE) 
    {
      $this->load->library('user_agent');
      $this->load->model('public/Login_model', 'login');
      
      $this->_data['last_login'] = $this->_datetime;
      $this->_data['ip_address'] = $this->input->ip_address();
      $this->_data['platform'] = $this->agent->platform();
      $this->_data['user_agent'] = $this->agent->browser();

      $logged = $this->login->log($this->_data, $this->session->userid);
      $this->_data = array();
      
      if(!$logged) log_message('error', 'Problem when updating user log data');
    }
    else {
      redirect('user/login');
    }
  }

 

  /**
   * This check the dropdown list default value
   *
   * @param string $post_string value from dropdown
   * @return bool
   */
  public function special_chars($post_string)
  {
    if($post_string != null || $post_string != '')
    {
      if(!preg_match('/^[a-z0-9 .\-]+$/i', $post_string)) return false;
      return true;
    }

    return;
  }

  /*** */
  public function password_sequence($password)
  {
      $uppercase = preg_match('@[A-Z]@', $password);
      $lowercase = preg_match('@[a-z]@', $password);
      $number    = preg_match('@[0-9]@', $password);

      if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) return false;
      
      return true;
  }
  
  /**
   * Regenerate CSRF token
   *
   * @param null
   * @return string
   */
  protected function regenerate_csrf()
  {
    return $this->security->get_csrf_hash();
  }

  /**
   * This will return json array with status message
   *
   * @param mixed $auth success | error | warning | info
   * @param string $message actual message string
   * @param mixed $url url to be redirected
   *
   * @return array json data
   */
  protected function json_output($auth = null, $message = '', $url = null)
  {
    if(is_null($auth)) return;

    $json_response = array();

    if($auth === false)
    {
      $json_response['auth'] = false;
    }

    if($auth === true)
    {
      $json_response['auth'] = true;
      $json_response['url'] = base_url().$url;
    }
    
    $json_response['message'] = $message;
    $json_response['csrf'] = $this->regenerate_csrf();

    $this->output->set_content_type('application/json', 'utf-8');
    $this->output->set_output(json_encode($json_response));
  }
}
?>