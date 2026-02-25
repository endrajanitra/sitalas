<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Report Proposal</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; color: #111; }
        .meta { margin-bottom: 10px; }
        .meta div { margin: 2px 0; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 6px; vertical-align: top; }
        th { background: #f2f2f2; text-align: left; }
        .no-print { margin-bottom: 12px; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body onload="window.print()">

    <div class="no-print">
        <button onclick="window.print()">Print</button>
        <button onclick="window.close()">Tutup</button>
    </div>

    <h3>Report Proposal</h3>

    <div class="meta">
        <div><strong>Dari:</strong> {{ request('date_from') ? \Carbon\Carbon::parse(request('date_from'))->format('d M Y') : '-' }}</div>
        <div><strong>Sampai:</strong> {{ request('date_to') ? \Carbon\Carbon::parse(request('date_to'))->format('d M Y') : '-' }}</div>
        <div><strong>Direktorat:</strong> {{ $selectedDirektorat?->direktorat ?? '-' }}</div>
        <div><strong>Total:</strong> {{ $data->count() }}</div>
    </div>

    <table>
        <thead>
            <tr>
                <th style="width: 110px;">Tgl</th>
                <th style="width: 90px;">No Reg</th>
                <th style="width: 160px;">Direktorat</th>
                <th style="width: 180px;">Pengirim</th>
                <th>Perihal</th>
            </tr>
        </thead>
        <tbody>
            @forelse($data as $row)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($row->tanggal)->format('d M Y') }}</td>
                    <td>{{ $row->no_reg }}</td>
                    <td>{{ optional($row->unitPengolah)->direktorat }}</td>
                    <td>{{ $row->pengirim }}</td>
                    <td>{{ $row->perihal }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">Tidak ada data.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>