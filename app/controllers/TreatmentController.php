<?php
namespace App\Controllers;

use App\Core\Controller;
use App\Models\Treatment;
use App\Models\Doctor;
use App\Models\Branch;

class TreatmentController extends Controller {
    public function index() {
        $treatments = Treatment::all(['name'=>'ASC']);
        $this->view('treatments/index', compact('treatments'));
    }

    public function booking($slug = null) {
        $treatment = Treatment::query("SELECT * FROM treatments WHERE slug = ?", [$slug])->fetch();
        if (!$treatment) redirect('treatments');
        $doctors = Doctor::all(['name'=>'ASC']);
        $branches = Branch::all(['name'=>'ASC']);
        $this->view('treatments/booking', compact('treatment', 'doctors', 'branches'));
    }

    public function storeBooking() {
        // validate, call BookingService
    }
}
