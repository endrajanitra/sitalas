<x-filament-panels::page>
    <div class="space-y-6">
        <x-filament::section compact>
            <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">
                <div>
                    <h3 class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Filter Laporan
                    </h3>

                    <p class="mt-1 text-base font-semibold text-gray-950 dark:text-white">
                        {{ $this->tanggal_awal ? \Illuminate\Support\Carbon::parse($this->tanggal_awal)->translatedFormat('d M Y') : '-' }}
                        <span class="mx-2 text-gray-400">s/d</span>
                        {{ $this->tanggal_akhir ? \Illuminate\Support\Carbon::parse($this->tanggal_akhir)->translatedFormat('d M Y') : '-' }}
                    </p>
                </div>

                <div>
                    <span class="inline-flex items-center rounded-lg bg-primary-50 px-3 py-2 text-sm font-medium text-primary-600 dark:bg-primary-500/10 dark:text-primary-400">
                        Tracking Dokumen Penting
                    </span>
                </div>
            </div>
        </x-filament::section>

        {{ $this->table }}
    </div>
</x-filament-panels::page>