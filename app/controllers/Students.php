<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: Students
 * 
 * Automatically generated via CLI.
 */
class Students extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentModel');
    }

    public function accounts()
    {
        
        $page = 1;
        if(isset($_GET['page']) && ! empty($_GET['page'])) {
            $page = $this->io->get('page');
        }

        $q = '';
        if(isset($_GET['q']) && ! empty($_GET['q'])) {
            $q = trim($this->io->get('q'));
        }
        
        $records_per_page = 10;

        $all = $this->StudentModel->get_all($q, $records_per_page, $page);
        $data['all'] = $all['records'];
        $total_rows = $all['total_rows'];
        $this->pagination->set_options([
            'first_link'     => '⏮ First',
            'last_link'      => 'Last ⏭',
            'next_link'      => 'Next →',
            'prev_link'      => '← Prev',
            'page_delimiter' => '&page='
        ]);
        $this->pagination->set_theme('bootstrap'); // or 'tailwind', or 'custom'
        $this->pagination->initialize($total_rows, $records_per_page, $page, site_url('/').'?q='.$q);
        $data['page'] = $this->pagination->paginate();
        $this->call->view('students/accounts', $data);
    }

    public function dashboard()
    {
        $this->call->view('students/dashboard');
    }

    public function settings()
    {
        $this->call->view('students/settings');
    }

    public function create()
    {
        $this->call->view('students/create');
    }

    public function store()
    {
        $data = [
            'last_name'  => $this->io->post('last_name'),
            'first_name' => $this->io->post('first_name'),
            'email'      => $this->io->post('email')
        ];

        $this->StudentModel->insert($data);

        // Redirect to students list
        header("Location: /");
        exit;
    }

    public function edit($id)
    {
        $student = $this->StudentModel->find($id);

        if (!$student) {
            echo "Student not found!";
            return;
        }

        $this->call->view('students/edit', ['student' => $student]);
    }

    public function update($id)
    {
        $data = [
            'last_name'  => $_POST['last_name'],
            'first_name' => $_POST['first_name'],
            'email'      => $_POST['email']
        ];

        $this->StudentModel->update($id, $data);

        header("Location: /");
        exit;
    }


    public function delete($id)
    {
        // Delete the record
        $this->StudentModel->delete($id);

        // Redirect back to the students list
        header('Location: /');
        exit;
    }

    public function delete_all()
    {
        $this->StudentModel->truncate();
        header("Location: /");
        exit;
    }

}