<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Contact;

class ContactController extends Controller {
    public function index() {
        $this->view('contact');
    }

    public function send() {
        Contact::create($_POST);
        $_SESSION['message'] = 'Pesan Anda telah terkirim.';
        redirect('contact');
    }
}
