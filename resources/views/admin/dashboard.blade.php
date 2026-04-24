<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Admin - E-Tugas</title>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600&display=swap" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Plus Jakarta Sans',sans-serif}
body{display:flex;background:#f8fafc;min-height:100vh;font-size:14px}

/* SIDEBAR */
.sidebar{width:220px;background:#0f172a;color:#94a3b8;position:fixed;height:100vh;display:flex;flex-direction:column}
.sidebar-logo{padding:24px 20px 20px;border-bottom:1px solid #1e293b}
.sidebar-logo span{font-size:18px;font-weight:600;color:#f1f5f9;letter-spacing:-0.3px}
.sidebar-logo small{display:block;font-size:11px;color:#475569;margin-top:2px}
.nav-section{padding:20px 12px;flex:1}
.nav-label{font-size:10px;font-weight:600;letter-spacing:0.08em;text-transform:uppercase;color:#334155;padding:0 8px;margin-bottom:8px}
.nav-item{display:flex;align-items:center;gap:10px;padding:9px 10px;border-radius:8px;color:#64748b;text-decoration:none;font-size:13px;font-weight:500;transition:all .15s;margin-bottom:2px}
.nav-item:hover{background:#1e293b;color:#e2e8f0}
.nav-item.active{background:#1d4ed8;color:#fff}
.sidebar-footer{padding:16px 12px;border-top:1px solid #1e293b}
.user-badge{display:flex;align-items:center;gap:10px}
.avatar{width:32px;height:32px;background:#1d4ed8;border-radius:8px;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:600;color:#fff;flex-shrink:0}
.user-info p{font-size:12px;font-weight:500;color:#e2e8f0}
.user-info span{font-size:11px;color:#475569}

/* MAIN */
.main{margin-left:220px;width:calc(100% - 220px);min-height:100vh;display:flex;flex-direction:column}

/* TOPBAR */
.topbar{background:#fff;padding:0 28px;height:56px;display:flex;align-items:center;justify-content:space-between;border-bottom:1px solid #e2e8f0;position:sticky;top:0;z-index:10}
.topbar h1{font-size:15px;font-weight:600;color:#0f172a}
.topbar p{font-size:12px;color:#94a3b8}
.topbar-right{display:flex;align-items:center;gap:10px}
.logout-btn{background:#ef4444;color:#fff;border:none;padding:7px 14px;border-radius:8px;font-size:12px;font-weight:600;cursor:pointer;font-family:inherit}

/* CONTENT */
.content{padding:24px 28px;flex:1}

/* WELCOME */
.welcome-bar{background:linear-gradient(110deg,#1e3a8a,#1d4ed8 60%,#2563eb);border-radius:12px;padding:20px 24px;margin-bottom:22px;display:flex;justify-content:space-between;align-items:center}
.welcome-bar h2{font-size:16px;font-weight:600;color:#fff;margin-bottom:3px}
.welcome-bar p{font-size:12px;color:#93c5fd}
.welcome-badge{background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.15);padding:6px 14px;border-radius:8px;font-size:11px;color:#bfdbfe;font-weight:500}

/* STATS */
.stats-row{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-bottom:22px}
.stat-card{background:#fff;border-radius:10px;padding:16px 18px;border:1px solid #e2e8f0}
.stat-label{font-size:11px;font-weight:600;letter-spacing:.04em;text-transform:uppercase;color:#94a3b8;margin-bottom:8px}
.stat-val{font-size:22px;font-weight:600;color:#0f172a;line-height:1}
.stat-sub{font-size:11px;color:#94a3b8;margin-top:4px}

/* MENU GRID */
.section-title{font-size:13px;font-weight:600;color:#0f172a;margin-bottom:12px}
.menu-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:14px}
.menu-card{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:20px;transition:all .2s}
.menu-card:hover{border-color:#93c5fd;box-shadow:0 4px 20px rgba(29,78,216,.08);transform:translateY(-2px)}
.card-icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;margin-bottom:14px;font-size:17px}
.icon-blue{background:#eff6ff}
.icon-violet{background:#f5f3ff}
.icon-emerald{background:#f0fdf4}
.menu-card h3{font-size:13px;font-weight:600;color:#0f172a;margin-bottom:5px}
.menu-card p{font-size:12px;color:#94a3b8;line-height:1.5;margin-bottom:14px}
.card-link{display:inline-flex;align-items:center;gap:5px;font-size:12px;font-weight:600;color:#1d4ed8;text-decoration:none}

/* ACTIVITY */
.recent-card{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:20px;margin-top:14px}
.act-row{display:flex;align-items:center;gap:12px;padding:10px 0;border-bottom:1px solid #f1f5f9}
.act-row:last-child{border-bottom:none}
.act-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0}
.act-text{flex:1;font-size:12px;color:#334155}
.act-time{font-size:11px;color:#94a3b8}
</style>
</head>
<body>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="sidebar-logo">
        <span>E-Tugas</span>
        <small>Sistem Manajemen Tugas</small>
    </div>
    <div class="nav-section">
        <div class="nav-label">Menu Utama</div>
        <a class="nav-item active" href="#">🏠 Dashboard</a>
        <a class="nav-item" href="/admin/dosen">👨‍🏫 Guru</a>
        <a class="nav-item" href="/admin/mahasiswa">🎓 Siswa</a>
        <div class="nav-label" style="margin-top:16px">Sistem</div>
        <a class="nav-item" href="/admin/users">⚙️ Pengaturan User</a>
    </div>
    <div class="sidebar-footer">
        <div class="user-badge">
            <div class="avatar">{{ strtoupper(substr(auth()->user()->name, 0, 2)) }}</div>
            <div class="user-info">
                <p>{{ auth()->user()->name }}</p>
                <span>{{ auth()->user()->email }}</span>
            </div>
        </div>
    </div>
</div>

<!-- MAIN -->
<div class="main">

    <!-- TOPBAR -->
    <div class="topbar">
        <div>
            <h1>Dashboard</h1>
            <p>Selamat datang kembali</p>
        </div>
        <div class="topbar-right">
            <form method="POST" action="{{ route('logout') }}" style="margin:0">
                @csrf
                <button class="logout-btn">Keluar</button>
            </form>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="content">

        <!-- WELCOME -->
        <div class="welcome-bar">
            <div>
                <h2>Halo, {{ auth()->user()->name }} 👋</h2>
                <p>Kelola seluruh data akademik dari sini dengan mudah.</p>
            </div>
            <div class="welcome-badge">Admin Panel</div>
        </div>

        <!-- STATS -->
        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-label">Total Guru</div>
                <div class="stat-val">{{ $totalDosen ?? 0 }}</div>
                <div class="stat-sub">Aktif semester ini</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Siswa</div>
                <div class="stat-val">{{ $totalMahasiswa ?? 0 }}</div>
                <div class="stat-sub">Seluruh angkatan aktif</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total User</div>
                <div class="stat-val">{{ $totalUser ?? 0 }}</div>
                <div class="stat-sub">Termasuk semua role</div>
            </div>
        </div>

        <!-- MENU -->
        <div class="section-title">Manajemen Data</div>
        <div class="menu-grid">
            <div class="menu-card">
                <div class="card-icon icon-blue">👨‍🏫</div>
                <h3>Kelola Guru</h3>
                <p>Tambah, edit, dan hapus data guru pengajar.</p>
                <a class="card-link" href="/admin/dosen">Buka Halaman →</a>
            </div>
            <div class="menu-card">
                <div class="card-icon icon-violet">🎓</div>
                <h3>Kelola Siswa</h3>
                <p>Manajemen akun dan data seluruh siswa.</p>
                <a class="card-link" href="/admin/mahasiswa">Buka Halaman →</a>
            </div>
            <div class="menu-card">
                <div class="card-icon icon-emerald">⚙️</div>
                <h3>Pengaturan User</h3>
                <p>Kelola semua akun dan hak akses sistem.</p>
                <a class="card-link" href="/admin/users">Buka Halaman →</a>
            </div>
        </div>

    </div>
</div>

</body>
</html>