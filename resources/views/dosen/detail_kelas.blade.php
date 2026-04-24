<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kelas->nama_kelas }} | Panel Dosen</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --secondary: #10b981;
            --danger: #ef4444;
            --info: #3b82f6;
            --bg: #f8fafc;
            --white: #ffffff;
            --text-main: #1e293b;
            --text-light: #64748b;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Poppins', sans-serif; }
        body { background-color: var(--bg); color: var(--text-main); }

        /* HEADER */
        .header {
            background: var(--white);
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .class-info h2 { font-size: 22px; font-weight: 700; color: var(--primary); }
        .kode-badge {
            background: #eef2ff;
            color: var(--primary);
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 13px;
            font-weight: 600;
            border: 1px solid #c7d2fe;
        }

        .btn-back {
            text-decoration: none;
            background: #f1f5f9;
            color: var(--text-main);
            padding: 10px 18px;
            border-radius: 10px;
            font-size: 14px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
        }
        .btn-back:hover { background: #e2e8f0; }

        /* MAIN LAYOUT */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 30px;
        }

        /* CARD STYLE */
        .card {
            background: var(--white);
            border-radius: 20px;
            padding: 25px;
            box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05);
            border: 1px solid #f1f5f9;
        }

        .card h3 {
            font-size: 18px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            border-bottom: 2px solid #f1f5f9;
            padding-bottom: 10px;
        }

        /* FORM */
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; font-size: 13px; font-weight: 600; margin-bottom: 5px; color: var(--text-light); }
        
        input, textarea {
            width: 100%;
            padding: 12px;
            border: 1.5px solid #e2e8f0;
            border-radius: 12px;
            font-size: 14px;
            background: #fcfdfe;
            transition: 0.3s;
        }
        input:focus, textarea:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 4px rgba(79, 70, 229, 0.1); }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 12px;
            font-weight: 600;
            cursor: pointer;
            transition: 0.3s;
            margin-top: 10px;
        }
        .btn-submit:hover { background: var(--primary-dark); transform: translateY(-2px); }

        /* TUGAS LIST */
        .tugas-item {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 15px;
            transition: 0.3s;
        }
        .tugas-item:hover { border-color: var(--primary); box-shadow: 0 4px 12px rgba(0,0,0,0.05); }

        .tugas-header { display: flex; justify-content: space-between; align-items: flex-start; }
        .tugas-title h4 { font-size: 16px; font-weight: 700; color: var(--text-main); }
        .deadline-info { font-size: 12px; color: var(--danger); font-weight: 600; margin-top: 4px; }

        .tugas-desc { font-size: 13px; color: var(--text-light); margin: 12px 0; line-height: 1.5; }

        .tugas-actions { display: flex; justify-content: space-between; align-items: center; margin-top: 15px; padding-top: 15px; border-top: 1px solid #f1f5f9; }
        
        .action-btns { display: flex; gap: 8px; }
        
        .btn-sm {
            padding: 8px 12px;
            border-radius: 8px;
            font-size: 12px;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 5px;
            border: none;
            cursor: pointer;
            transition: 0.2s;
        }

        .btn-view { background: #eff6ff; color: var(--info); }
        .btn-view:hover { background: var(--info); color: white; }
        
        .btn-del { background: #fef2f2; color: var(--danger); }
        .btn-del:hover { background: var(--danger); color: white; }

        .btn-file { background: #ecfdf5; color: var(--secondary); }
        .btn-file:hover { background: var(--secondary); color: white; }

        /* ALERT */
        .alert { padding: 12px 20px; border-radius: 12px; margin-bottom: 20px; font-size: 14px; font-weight: 500; }
        .alert-success { background: #dcfce7; color: #166534; }
        .alert-error { background: #fee2e2; color: #991b1b; }

        /* RESPONSIVE */
        @media (max-width: 900px) {
            .container { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>

<div class="header">
    <div class="class-info">
        <h2>{{ $kelas->nama_kelas }}</h2>
        <span class="kode-badge"><i class="fas fa-key"></i> {{ $kelas->kode_kelas }}</span>
    </div>

    <a href="/dosen/dashboard" class="btn-back">
        <i class="fas fa-chevron-left"></i> Dashboard
    </a>
</div>

<div class="container">

    <!-- LEFT: FORM UPLOAD -->
    <div class="card">
        <h3><i class="fas fa-plus-circle" style="color: var(--primary);"></i> Buat Tugas</h3>

        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif

        @if(session('error'))
            <div class="alert alert-error">❌ {{ session('error') }}</div>
        @endif

        <form action="/dosen/tugas/store/{{ $kelas->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Judul Tugas</label>
                <input type="text" name="judul" placeholder="Contoh: Analisis Basis Data" required>
            </div>

            <div class="form-group">
                <label>Deskripsi</label>
                <textarea name="deskripsi" rows="4" placeholder="Tulis instruksi tugas di sini..." required></textarea>
            </div>

            <div class="form-group">
                <label>Batas Waktu (Deadline)</label>
                <input type="datetime-local" name="deadline" required>
            </div>

            <div class="form-group">
                <label>Lampiran Soal (Opsional)</label>
                <input type="file" name="file_tugas">
            </div>

            <button type="submit" class="btn-submit">Publikasikan Tugas</button>
        </form>
    </div>

    <!-- RIGHT: LIST TUGAS -->
    <div class="card">
        <h3><i class="fas fa-book" style="color: var(--primary);"></i> Daftar Tugas ({{ count($tugas) }})</h3>

        @forelse($tugas as $t)
            <div class="tugas-item">
                <div class="tugas-header">
                    <div class="tugas-title">
                        <h4>{{ $t->judul }}</h4>
                        <div class="deadline-info">
                            <i class="far fa-clock"></i> Batas: {{ \Carbon\Carbon::parse($t->deadline)->format('d M Y, H:i') }}
                        </div>
                    </div>
                    
                    <div class="action-btns">
                        {{-- LIHAT PENGUMPULAN --}}
                        <a href="/dosen/tugas/{{ $t->id }}" class="btn-sm btn-view" title="Lihat Pengumpulan">
                            <i class="fas fa-users"></i> Monitoring
                        </a>

                        {{-- HAPUS --}}
                        <a href="/dosen/tugas/{{ $t->id }}/hapus" class="btn-sm btn-del" onclick="return confirm('Hapus tugas ini?')">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </div>

                <p class="tugas-desc">{{ Str::limit($t->deskripsi, 150) }}</p>

                <div class="tugas-actions">
                    @if($t->file_tugas)
                        <a href="/storage/{{ $t->file_tugas }}" target="_blank" class="btn-sm btn-file">
                            <i class="fas fa-file-pdf"></i> Lihat File Soal
                        </a>
                    @else
                        <span style="font-size: 12px; color: #94a3b8; font-style: italic;">Tanpa lampiran soal</span>
                    @endif

                    <span style="font-size: 11px; color: var(--text-light); background: #f8fafc; padding: 4px 8px; border-radius: 5px;">
                        ID: #{{ $t->id }}
                    </span>
                </div>
            </div>
        @empty
            <div style="text-align: center; padding: 40px; color: #94a3b8;">
                <i class="fas fa-clipboard-list fa-3x" style="margin-bottom: 15px; opacity: 0.3;"></i>
                <p>Belum ada tugas yang dibuat untuk kelas ini.</p>
            </div>
        @endforelse
    </div>

</div>

</body>
</html>