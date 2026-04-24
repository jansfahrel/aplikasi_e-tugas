<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelas Dosen</title>
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
    width:92%;max-width:900px;
    margin:0 auto;
    padding:28px 0 40px;
}

/* NOTIF */
.notif{
    padding:12px 16px;border-radius:8px;
    font-size:13px;margin-bottom:14px;
}
.notif-success{
    background:#dcfce7;color:#16a34a;
    border:1px solid #bbf7d0;
}
.notif-error{
    background:#fef2f2;color:#dc2626;
    border:1px solid #fecaca;
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
    margin-bottom:14px;
}

/* FORM */
.form-row{display:flex;gap:10px;align-items:center;}
.form-input{
    flex:1;padding:9px 14px;
    border-radius:8px;border:1px solid #e2e8f0;
    font-size:14px;color:#0f172a;
    background:#f8fafc;
    outline:none;transition:border-color 0.15s;
}
.form-input:focus{border-color:#93c5fd;background:#fff;}
.btn-submit{
    padding:9px 18px;border-radius:8px;
    font-size:13px;font-weight:600;cursor:pointer;
    background:#dbeafe;color:#1d4ed8;
    border:1px solid #bfdbfe;
    white-space:nowrap;
    transition:opacity 0.15s;
}
.btn-submit:hover{opacity:0.75;}

/* GRID */
.kelas-grid{
    display:grid;
    grid-template-columns:repeat(auto-fill,minmax(240px,1fr));
    gap:12px;
    margin-top:4px;
}

/* KELAS BOX */
.kelas-box{
    background:#f8fafc;
    border:1px solid #e2e8f0;
    border-radius:10px;
    padding:16px 18px;
    display:flex;flex-direction:column;gap:8px;
    transition:border-color 0.15s, box-shadow 0.15s;
}
.kelas-box:hover{
    border-color:#94a3b8;
    box-shadow:0 4px 14px rgba(0,0,0,0.06);
}
.kelas-nama{font-size:14px;font-weight:600;color:#0f172a;}
.kelas-kode-label{font-size:11px;color:#64748b;margin-top:2px;}
.kelas-kode{
    font-size:16px;font-weight:700;
    color:#1d4ed8;letter-spacing:0.04em;
}
.kelas-footer{
    display:flex;justify-content:flex-end;
    border-top:1px solid #e2e8f0;
    padding-top:10px;margin-top:4px;
}
.btn-masuk{
    font-size:12px;padding:5px 12px;border-radius:8px;
    background:#dbeafe;color:#1d4ed8;
    border:1px solid #bfdbfe;
    text-decoration:none;
    transition:opacity 0.15s;
}
.btn-masuk:hover{opacity:0.75;}

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
        <div class="nav-title">📚 Kelas </div>
        <div class="nav-sub">Kelola semua kelas kamu</div>
    </div>
    <a href="/dosen/dashboard" class="btn-back">← Dashboard</a>
</div>

<div class="container">

    {{-- NOTIF --}}
    @if(session('success'))
        <div class="notif notif-success">✅ {{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="notif notif-error">❌ {{ session('error') }}</div>
    @endif

    {{-- FORM BUAT KELAS --}}
    <div class="card">
        <div class="section-label">Buat Kelas Baru</div>
        <form method="POST" action="/dosen/kelas/store">
            @csrf
            <div class="form-row">
                <input
                    type="text"
                    name="nama_kelas"
                    placeholder="Contoh: Pemrograman Web A"
                    class="form-input"
                    required
                >
                <button type="submit" class="btn-submit">+ Buat Kelas</button>
            </div>
        </form>
    </div>

    {{-- LIST KELAS --}}
    <div class="card">
        <div class="section-label">Kelas Saya</div>

        <div class="kelas-grid">
            @forelse($kelas as $k)
                <div class="kelas-box">
                    <div class="kelas-nama">{{ $k->nama_kelas }}</div>
                    <div>
                        <div class="kelas-kode-label">Kode Kelas</div>
                        <div class="kelas-kode">{{ $k->kode_kelas }}</div>
                    </div>
                    <div class="kelas-footer">
                        <a href="/dosen/kelas/{{ $k->id }}" class="btn-masuk">Masuk →</a>
                    </div>
                </div>
            @empty
                <div class="empty" style="grid-column:1/-1;">
                    📂 Belum ada kelas. Yuk buat kelas pertamamu!
                </div>
            @endforelse
        </div>
    </div>

</div>

</body>
</html>