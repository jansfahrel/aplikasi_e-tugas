<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Detail Tugas</title>
<style>
*{box-sizing:border-box;margin:0;padding:0;}

body{
    font-family:'Segoe UI', sans-serif;
    background:#f8fafc;
    min-height:100vh;
    color:#0f172a;
}

/* NAVBAR */
.navbar{
    background:#ffffff;
    border-bottom:1px solid #e2e8f0;
    padding:14px 32px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.nav-title{font-size:15px;font-weight:600;color:#0f172a;}
.nav-sub{font-size:12px;color:#64748b;margin-top:2px;}
.btn-back{
    font-size:13px;padding:7px 14px;border-radius:8px;
    border:1px solid #e2e8f0;
    background:#ffffff;color:#0f172a;
    text-decoration:none;
    display:inline-flex;align-items:center;gap:6px;
    transition:background 0.15s;
}
.btn-back:hover{background:#f1f5f9;}

/* CONTAINER */
.container{
    width:92%;max-width:820px;
    margin:0 auto;
    padding:28px 0 40px;
}

/* CARD */
.card{
    background:#ffffff;
    border:1px solid #e2e8f0;
    border-radius:12px;
    padding:20px 24px;
    margin-bottom:14px;
}

.section-label{
    font-size:11px;font-weight:600;letter-spacing:0.06em;
    color:#64748b;text-transform:uppercase;
    margin-bottom:12px;
}

/* KODE KELAS */
.kode-pill{
    display:inline-block;padding:5px 14px;border-radius:999px;
    font-size:13px;font-weight:600;
    background:#dbeafe;color:#1d4ed8;
    border:1px solid #bfdbfe;
}

/* DETAIL TUGAS */
.tugas-title{
    font-size:18px;font-weight:600;
    color:#0f172a;margin-bottom:8px;
}
.tugas-desc{
    font-size:14px;color:#475569;
    line-height:1.65;margin-bottom:14px;
}
.meta-row{
    display:flex;gap:20px;flex-wrap:wrap;
    margin-bottom:14px;
}
.meta-item{font-size:13px;color:#64748b;}
.meta-item b{color:#0f172a;font-weight:600;}

.btn-file{
    display:inline-flex;align-items:center;gap:6px;
    padding:7px 14px;border-radius:8px;font-size:13px;
    background:#f1f5f9;color:#0f172a;
    border:1px solid #e2e8f0;
    text-decoration:none;transition:background 0.15s;
}
.btn-file:hover{background:#e2e8f0;}

/* PENGUMPULAN */
.count-badge{
    display:inline-block;margin-left:8px;
    font-size:11px;padding:2px 8px;border-radius:999px;
    background:#f1f5f9;color:#64748b;
    border:1px solid #e2e8f0;
}

.submission-list{
    display:flex;flex-direction:column;gap:10px;
    margin-top:14px;
}
.submission-item{
    display:flex;justify-content:space-between;align-items:center;
    padding:12px 14px;border-radius:8px;
    border:1px solid #e2e8f0;
    background:#f8fafc;
    transition:border-color 0.15s;
}
.submission-item:hover{border-color:#94a3b8;}

.sub-name{font-size:14px;font-weight:600;color:#0f172a;}
.sub-time{font-size:12px;color:#64748b;margin-top:2px;}

.btn-jawaban{
    font-size:12px;padding:5px 12px;border-radius:8px;
    background:#dbeafe;color:#1d4ed8;
    border:1px solid #bfdbfe;
    text-decoration:none;
    white-space:nowrap;
    transition:opacity 0.15s;
}
.btn-jawaban:hover{opacity:0.75;}

/* EMPTY */
.empty{
    text-align:center;padding:32px 0;
    font-size:14px;color:#64748b;
}
</style>
</head>

<body>

<div class="navbar">
    <div>
        <div class="nav-title">📚 {{ $tugas->kelas->nama_kelas }}</div>
        <div class="nav-sub">Detail Tugas</div>
    </div>
    <a href="/dosen/kelas/{{ $tugas->kelas_id }}" class="btn-back">← Kembali</a>
</div>

<div class="container">

    {{-- KODE KELAS --}}
    <div class="card">
        <div class="section-label">Kode Kelas</div>
        <span class="kode-pill">{{ $tugas->kelas->kode_kelas }}</span>
    </div>

    {{-- DETAIL TUGAS --}}
    <div class="card">
        <div class="section-label">Detail Tugas</div>
        <div class="tugas-title">{{ $tugas->judul }}</div>
        <div class="tugas-desc">{{ $tugas->deskripsi }}</div>
        <div class="meta-row">
            <div class="meta-item"><b>Deadline:</b> {{ \Carbon\Carbon::parse($tugas->deadline)->translatedFormat('d F Y, H:i') }}</div>
        </div>
        @if($tugas->file_tugas)
            <a href="/storage/{{ $tugas->file_tugas }}" target="_blank" class="btn-file">
                📄 Lihat Soal
            </a>
        @endif
    </div>

    {{-- PENGUMPULAN --}}
    <div class="card">
        <div class="section-label">
            Pengumpulan
            <span class="count-badge">{{ count($tugas->pengumpulans) }} mahasiswa</span>
        </div>

        @forelse($tugas->pengumpulans as $p)
            <div class="submission-list">
                <div class="submission-item">
                    <div>
                        <div class="sub-name">{{ $p->mahasiswa->name }}</div>
                        @if($p->created_at)
                            <div class="sub-time">Dikumpul {{ \Carbon\Carbon::parse($p->created_at)->translatedFormat('d M Y') }}</div>
                        @endif
                    </div>
                    <a href="/storage/{{ $p->file_jawaban }}" target="_blank" class="btn-jawaban">
                        📄 Lihat Jawaban
                    </a>
                </div>
            </div>
        @empty
            <div class="empty">
                📭 Belum ada mahasiswa yang mengumpulkan
            </div>
        @endforelse

    </div>

</div>

</body>
</html>