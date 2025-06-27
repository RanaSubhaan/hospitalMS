<?php

namespace App\Http\Livewire\Admins;

use Livewire\Component;
use App\Models\Doctor;
use App\Models\OperationReport as ModelsOperationReport;
use App\Models\Patient;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class OperationReport extends Component
{

    use WithFileUploads;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $patient;
    public $details;
    public $doctor;
    public $status;

    public $edit_operation_report_id;
    public $button_text = "Add New Operation Report";
    public $_page;
    public function mount()
    {
        $this->_page = 'index';
    }


    public function show_create_form()
    {
        $this->_page = "create";
    }


    public function add_operationreport()
    {
        if ($this->edit_operation_report_id) {

            $this->update($this->edit_operation_report_id);

        } else {
            $this->validate([
                'patient' => 'required',
                'doctor' => 'required',
                'details' => 'required',
                'status' => 'required',
            ]);

            ModelsOperationReport::create([
                'patient_id' => $this->patient,
                'description' => $this->details,
                'doctor_id' => $this->doctor,
                'status' => $this->doctor,
            ]);

            $this->patient = "";
            $this->details = "";
            $this->doctor = "";
            $this->status = "";
            $this->_page = 'index';
            session()->flash('message', 'Operation Report Created successfully.');
        }

    }


    public function edit($id)
    {
        $Operationreport = ModelsOperationReport::findOrFail($id);
        $this->edit_operation_report_id = $id;

        $this->patient = $Operationreport->patient_id;
        $this->details = $Operationreport->description;
        $this->doctor = $Operationreport->doctor_id;
        $this->status = $Operationreport->status;
        $this->_page = 'edit';
    }

    public function update($id)
    {
        $this->validate([
            'patient' => 'required',
            'details' => 'required',
            'doctor' => 'required',
            'status' => 'required',
        ]);

        $Operationreport = ModelsOperationReport::findOrFail($id);
        $Operationreport->patient_id = $this->patient;
        $Operationreport->description = $this->details;
        $Operationreport->doctor_id = $this->doctor;
        $Operationreport->status = $this->status;

        $Operationreport->save();

        $this->patient = "";
        $this->details = "";
        $this->doctor = "";
        $this->status = "";
        $this->edit_operation_report_id = "";

        session()->flash('message', 'Operation Report Updated Successfully.');
        $this->_page = 'index';
    }

    public function delete($id)
    {
        ModelsOperationReport::findOrFail($id)->delete();
        session()->flash('message', 'Operation report Deleted Successfully.');

        $this->patient = "";
        $this->details = "";
        $this->doctor = "";
        $this->status = "";
    }

    public function render()
    {
        if ($this->_page == "index") {
            return view('livewire.admins.operationreport.index', [
                'reports' => ModelsOperationReport::latest()->paginate(10),
            ])->layout('admins.layouts.app');
        } elseif ($this->_page == "create") {
            return view('livewire.admins.operationreport.create', [
                'doctors' => doctor::all(),
                'patients' => patient::all(),
            ])->layout('admins.layouts.app');
        } elseif ($this->_page == "edit") {
            return view('livewire.admins.operationreport.edit', [
                'report' => ModelsOperationReport::findOrFail($this->edit_operation_report_id),
                'doctors' => Doctor::all(),
                'patients' => Patient::all(),
            ])->layout('admins.layouts.app');
        }

    }

}
