<?php

namespace App\Http\Livewire\Admins;

use App\Models\BirthReport as ModelsBirthReport;
use App\Models\Doctor;
use App\Models\Patient;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class BirthReport extends Component
{

    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $patient;
    public $details;
    public $doctor;

    public $edit_birth_report_id;
    public $button_text = "Add New Birth Report";



    public function add_birthreport()
    {
        if ($this->edit_birth_report_id) {

            $this->update($this->edit_birth_report_id);

        }else{
            $this->validate([
                'patient' => 'required',
                'details' => 'required|string',
                'doctor' => 'required|numeric',
                // 'status' => 'required|string',
            ]);

            ModelsBirthReport::create([
                'patient_id' => $this->patient,
                'doctor_id' => $this->doctor,
                'description' => $this->details,
                // 'status' => $this->status,
            ]);

            $this->patient="";
            $this->details="";
            $this->doctor="";

            session()->flash('message', 'Birth Report Created successfully.');
            $this->reset(['patient', 'doctor', 'details']);
        }

    }


     public function edit($id)
    {
        $birthreport = ModelsBirthReport::findOrFail($id);
        $this->edit_birth_report_id = $id;
        $this->patient = $birthreport->patient;
        $this->details = $birthreport->description;
        $this->doctor = $birthreport->doctor;

        $this->button_text="Update Birth Report";
    }

    public function update($id)
    {
        $this->validate([
                'patient' => 'required',
                'details' => 'required',
                'doctor' => 'required',
            ]);

        $birthreport = ModelsBirthReport::findOrFail($id);
        $birthreport->patient = $this->patient;
        $birthreport->description = $this->details;
        $birthreport->doctor = $this->doctor;

        $birthreport->save();

        $this->patient="";
        $this->details="";
        $this->doctor="";
        $this->edit_birth_report_id="";

        session()->flash('message', 'Birth Report Updated Successfully.');

        $this->button_text = "Add New Birth Report";

}

     public function delete($id)
    {
        ModelsBirthReport::findOrFail($id)->delete();
        session()->flash('message', 'Birthreport Deleted Successfully.');
    }

    public function render()
    {
        return view('livewire.admins.birthreport',[
            'BirthReports' => ModelsBirthReport::latest()->paginate(10),
            'doctors' => Doctor::all(),
            'patients' => Patient::all(),
        ])->layout('admins.layouts.app');
    }
}
