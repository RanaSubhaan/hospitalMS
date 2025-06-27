<?php

namespace App\Http\Livewire\Admins;

use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.admins.dashboard',[
            'employees'=>\App\Models\Employee::count(),
            'appointments'=>\App\Models\Appointment::count(),
            'birthreports'=>\App\Models\BirthReport::count(),
            'operationreports'=>\App\Models\OperationReport::count(),
            'patients'=>\App\Models\Patient::count(),
            'hods'=>\App\Models\Hod::count(),
            'blocks'=>\App\Models\Block::count(),
            'departments'=>\App\Models\Department::count(),
            'rooms'=>\App\Models\Rooms::count(),
            'beds'=>\App\Models\Beds::count(),
            'subscribers'=>\App\Models\Subscriber::count(),
            'requestedAppointment'=>\App\Models\RequestedAppointment::count(),
        ])->layout('admins.layouts.app');
    }
}
