<?php

namespace App\Livewire;

use App\Models\Audit;
use Livewire\Component;

class LogsLivewire extends Component
{
    public $audits;

    public function mount()
    {
        $this->audits = Audit::all()->toArray();
    }

    public function render()
    {
        return view('livewire.logs-livewire');
    }
}
