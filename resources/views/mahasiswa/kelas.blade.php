<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $kelas->nama_kelas }} | E-Tugas</title>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #3730a3;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --bg-body: #f8fafc;
            --text-main: #1e293b;
            --text-light: #64748b;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--bg-body);
            color: var(--text-main);
            line-height: 1.6;
        }

        /* HEADER / NAVBAR */
        .header {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary));
            color: white;
            padding: 40px 5%;
            position: relative;
        }

        .header-content {
            max-width: 1100px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header-info h2 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .class-code {
            background: rgba(255, 255, 255, 0.2);
            padding: 4px 12px;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 500;
        }

        .btn-back {
            background: white;
            color: var(--primary);
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 14px;
            transition: 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-back:hover {
            background: #f1f5f9;
            transform: translateX(-5px);
        }

        /* CONTAINER */
        .container {
            max-width: 1000px;
            margin: -30px auto 50px;
            padding: 0 20px;
        }

        /* ALERT */
        .alert {
            padding: 15px 20px;
            border-radius: 12px;
            margin-bottom: 20px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .alert-success { background: #dcfce7; color: #166534; border-left: 5px solid var(--success); }
        .alert-error { background: #fee2e2; color: #991b1b; border-left: 5px solid var(--danger); }

        /* ASSIGNMENT CARD */
        .card {
            background: white;
            border-radius: 20px;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.05);
            padding: 30px;
        }

        .card h3 {
            font-size: 20px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-main);
        }

        .tugas-item {
            background: #fff;
            border: 1.5px solid #e2e8f0;
            border-radius: 16px;
            padding: 25px;
            margin-bottom: 20px;
            transition: 0.3s;
        }

        .tugas-item:hover {
            border-color: var(--primary);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        .tugas-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15px;
        }

        .tugas-title h4 {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 5px;
        }

        .tugas-desc {
            color: var(--text-light);
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* STATUS BADGE */
        .badge {
            padding: 6px 14px;
            border-radius: 50px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        .badge-success { background: #dcfce7; color: var(--success); }
        .badge-pending { background: #fef3c7; color: var(--warning); }
        .badge-danger { background: #fee2e2; color: var(--danger); }

        /* DETAILS GRID */
        .tugas-details {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding-top: 20px;
            border-top: 1px solid #f1f5f9;
        }

        .detail-box {
            font-size: 13px;
        }

        .detail-box label {
            display: block;
            color: var(--text-light);
            margin-bottom: 4px;
            font-weight: 500;
        }

        .detail-box p {
            color: var(--text-main);
            font-weight: 600;
        }

        .deadline-text { color: var(--danger) !important; }

        /* ACTION BUTTONS */
        .actions {
            display: flex;
            gap: 10px;
            margin-top: 20px;
            flex-wrap: wrap;
        }

        .btn-action {
            padding: 10px 18px;
            border-radius: 10px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.3s;
            text-decoration: none;
            border: none;
        }

        .btn-outline {
            border: 1.5px solid #e2e8f0;
            background: white;
            color: var(--text-main);
        }

        .btn-outline:hover {
            background: #f8fafc;
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-primary {
            background: var(--primary);
            color: white;
        }

        .btn-primary:hover { background: var(--primary-dark); }

        .btn-success {
            background: var(--success);
            color: white;
        }

        /* UPLOAD FORM */
        .upload-section {
            margin-top: 20px;
            background: #f8fafc;
            padding: 20px;
            border-radius: 12px;
        }

        .upload-section input[type="file"] {
            font-size: 13px;
            color: var(--text-light);
            margin-bottom: 10px;
            width: 100%;
        }

        /* EMPTY STATE */
        .empty-state {
            text-align: center;
            padding: 40px;
            color: var(--text-light);
        }

        @media (max-width: 768px) {
            .header-content { flex-direction: column; gap: 20px; text-align: center; }
            .tugas-header { flex-direction: column; gap: 10px; }
        }
    </style>
</head>
<body>

<header class="header">
    <div class="header-content">
        <div class="header-info">
            <h2>{{ $kelas->nama_kelas }}</h2>
            <span class="class-code"><i class="fas fa-key"></i> Kode: {{ $kelas->kode_kelas }}</span>
        </div>
        <a href="/mahasiswa/dashboard" class="btn-back">
            <i class="fas fa-arrow-left"></i> Dashboard
        </a>
    </div>
</header>

<div class="container">

    {{-- NOTIFIKASI --}}
    @if(session('success'))
        <div class="alert alert-success">
            <i class="fas fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <div class="card">
        <h3><i class="fas fa-list-check" style="color: var(--primary);"></i> Daftar Tugas</h3>

        @forelse($kelas->tugas as $t)
            @php
                $sudah = $pengumpulan[$t->id] ?? null;
                $telat = now() > $t->deadline;
            @endphp

            <div class="tugas-item">
                <div class="tugas-header">
                    <div class="tugas-title">
                        <h4>{{ $t->judul }}</h4>
                        @if($sudah)
                            <span class="badge badge-success"><i class="fas fa-check"></i> Selesai</span>
                        @elseif($telat)
                            <span class="badge badge-danger"><i class="fas fa-clock"></i> Terlambat</span>
                        @else
                            <span class="badge badge-pending"><i class="fas fa-hourglass-half"></i> Menunggu</span>
                        @endif
                    </div>
                </div>

                <p class="tugas-desc">{{ $t->deskripsi }}</p>

                <div class="tugas-details">
                    <div class="detail-box">
                        <label>Batas Waktu</label>
                        <p class="{{ $telat ? 'deadline-text' : '' }}">
                            <i class="far fa-calendar-alt"></i> {{ \Carbon\Carbon::parse($t->deadline)->format('d M Y, H:i') }}
                        </p>
                    </div>

                    <div class="detail-box">
                        <label>Status Pengumpulan</label>
                        <p>{{ $sudah ? 'Dikumpulkan pada ' . $sudah->created_at->format('d M Y') : 'Belum mengumpulkan' }}</p>
                    </div>
                </div>

                <div class="actions">
                    {{-- TOMBOL LIHAT SOAL --}}
                    @if($t->file_tugas)
                        <a href="/storage/{{ $t->file_tugas }}" target="_blank" class="btn-action btn-outline">
                            <i class="fas fa-file-download"></i> Unduh Soal
                        </a>
                    @endif

                    {{-- TOMBOL LIHAT JAWABAN --}}
                    @if($sudah)
                        <a href="/storage/{{ $sudah->file_jawaban }}" target="_blank" class="btn-action btn-success">
                            <i class="fas fa-file-circle-check"></i> Jawaban Saya
                        </a>
                    @endif
                </div>

                {{-- FORM KUMPUL TUGAS (HANYA JIKA BELUM TELAT) --}}
                @if(!$telat)
                    <div class="upload-section">
                        <form action="/mahasiswa/kumpul" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="tugas_id" value="{{ $t->id }}">
                            <label style="display:block; font-size:12px; font-weight:600; margin-bottom:10px;">
                                {{ $sudah ? 'Perbarui Jawaban Anda:' : 'Unggah Jawaban Anda:' }}
                            </label>
                            <div style="display: flex; gap: 10px; align-items: center;">
                                <input type="file" name="file_jawaban" required>
                                <button type="submit" class="btn-action btn-primary">
                                    <i class="fas fa-upload"></i> {{ $sudah ? 'Update' : 'Kirim' }}
                                </button>
                            </div>
                        </form>
                    </div>
                @else
                    <div class="upload-section" style="background: #fff1f2; border: 1px dashed #fda4af;">
                        <p style="color: var(--danger); font-size: 13px; font-weight: 600; text-align: center;">
                            <i class="fas fa-lock"></i> Pengumpulan ditutup karena melewati batas waktu.
                        </p>
                    </div>
                @endif
            </div>

        @empty
            <div class="empty-state">
                <i class="fas fa-clipboard-list fa-3x" style="margin-bottom: 15px; opacity: 0.3;"></i>
                <p>Belum ada tugas yang dipublikasikan untuk kelas ini.</p>
            </div>
        @endforelse
    </div>
</div>

</body>
</html>