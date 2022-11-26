<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tasks extends Member_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->data['settings']['tasks_status'] != 'on') {
            return redirect(site_url('dashboard'));
        }
        $this->load->helper('string');
        $this->load->model(['m_tasks', 'm_achievements']);
        checkDailyBonus($this->data['user']);
    }
    public function index()
    {
        $this->data['page'] = 'Tasks';
 	  $this->data['achievements'] = $this->m_achievements->getAchievements($this->data['user']['id']);
 	  $this->data['totalAchievements'] = count($this->data['achievements']);
        $this->data['availableTasks'] = $this->m_tasks->getAvailableTasks($this->data['user']['id']);
	  $this->data['wait'] = max(0, $this->data['settings']['timer'] - time() + $this->data['user']['last_claim']);
        $this->data['pendingTasks'] = $this->m_tasks->getPendingTasks($this->data['user']['id']);
        $dailyBonus = $this->db->where('user_id',$this->data['user']['id'])->where('date',date('Y-m-d'))->get('bonus_history')->row();
        if (!empty($dailyBonus)){
            $addBonus = dailyBonusSingle($dailyBonus->streak);
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']) + $addBonus['earning'];
        }else{
            $this->data['bonus'] = min($this->data['settings']['max_bonus'], $this->data['settings']['level_bonus'] * $this->data['user']['level']);
        }
        $this->render('tasks', $this->data);
    }

    public function complete($id = 0)
    {
        $this->load->library('form_validation');
        $this->load->helper('security');

        $this->form_validation->set_rules('proof', 'Proof', 'trim|required|min_length[1]|max_length[100]|xss_clean');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('sweet_message', faucet_alert('error', validation_errors()));
            return redirect(site_url('/tasks'));
        }

        if (!is_numeric($id) || $id == 0 || $this->m_tasks->isSubmitted($this->data['user']['id'], $id) || $this->m_tasks->isCompleted($this->data['user']['id'], $id)) {
            return redirect(site_url('tasks'));
        }
        $proof = $this->db->escape_str($this->input->post('proof'));
        $this->m_tasks->addSubmission($id, $this->data['user']['id'], $proof);
        $this->session->set_flashdata('sweet_message', faucet_sweet_alert('success', 'You have uploaded proof successfully'));
        redirect(site_url('/tasks'));
    }
}
