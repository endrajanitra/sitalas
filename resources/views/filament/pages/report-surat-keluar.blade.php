<x-filament-panels::page>
    <div class="space-y-6">
        <x-filament::section heading="Filter Report Surat Keluar">
            {{ $this->form }}
        </x-filament::section>

        <x-filament::section heading="Data Report Surat Keluar">
            {{ $this->table }}
        </x-filament::section>
    </div>
</x-filament-panels::page>