<?php  
class ControllerModuleGoogleTalk extends Controller {
	public function index() {
		$data = array();
		
		$this->load->language('module/google_talk');

      	$data['heading_title'] = $this->language->get('heading_title');
		
		if (isset($this->request->server['HTTPS']) && (($this->request->server['HTTPS'] == 'on') || ($this->request->server['HTTPS'] == '1'))) {
			$data['code'] = str_replace('http', 'https', html_entity_decode($this->config->get('google_talk_code')));
		} else {
			$data['code'] = html_entity_decode($this->config->get('google_talk_code'));
		}
		
		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/google_talk.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/module/google_talk.tpl', $data);
		} else {
			return $this->load->view('default/template/module/google_talk.tpl', $data);
		}
	}
}