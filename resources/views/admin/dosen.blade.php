<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Kelola Dosen - E-Tugas</title>
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
.topbar-left h1{font-size:15px;font-weight:600;color:#0f172a}
.topbar-left p{font-size:12px;color:#94a3b8}
.back-btn{display:inline-flex;align-items:center;gap:6px;text-decoration:none;font-size:12px;font-weight:600;color:#64748b;background:#f1f5f9;padding:7px 12px;border-radius:8px;border:1px solid #e2e8f0}
.back-btn:hover{background:#e2e8f0;color:#0f172a}

/* CONTENT */
.content{padding:24px 28px;flex:1}

/* ALERTS */
.alert{display:flex;align-items:flex-start;gap:10px;padding:12px 16px;border-radius:10px;margin-bottom:16px;font-size:13px;font-weight:500}
.alert-success{background:#f0fdf4;border:1px solid #bbf7d0;color:#166534}
.alert-error{background:#fef2f2;border:1px solid #fecaca;color:#991b1b}

/* GRID */
.page-grid{display:grid;grid-template-columns:300px 1fr;gap:20px;align-items:start}
.card{background:#fff;border:1px solid #e2e8f0;border-radius:12px;padding:22px}

/* CARD HEADER */
.card-header{display:flex;align-items:center;gap:10px;margin-bottom:20px;padding-bottom:14px;border-bottom:1px solid #f1f5f9}
.card-header-icon{width:34px;height:34px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:15px}
.icon-blue{background:#eff6ff}
.icon-slate{background:#f8fafc}
.card-header h3{font-size:14px;font-weight:600;color:#0f172a}
.card-header p{font-size:11px;color:#94a3b8;margin-top:1px}

/* FORM */
.form-group{margin-bottom:14px}
.form-group label{display:block;font-size:11px;font-weight:600;color:#64748b;letter-spacing:.04em;text-transform:uppercase;margin-bottom:6px}
.form-group input{width:100%;padding:9px 12px;border:1px solid #e2e8f0;border-radius:8px;font-size:13px;font-family:inherit;color:#0f172a;transition:.15s;outline:none}
.form-group input:focus{border-color:#93c5fd;box-shadow:0 0 0 3px rgba(147,197,253,.25)}
.btn-submit{width:100%;padding:10px;background:#1d4ed8;color:#fff;border:none;border-radius:8px;font-size:13px;font-weight:600;cursor:pointer;font-family:inherit;margin-top:4px}
.btn-submit:hover{background:#1e40af}

/* TABLE */
.search-row{display:flex;align-items:center;gap:10px;margin-bottom:16px}
.search-input{flex:1;padding:8px 12px;border:1px solid #e2e8f0;border-radius:8px;font-size:13px;font-family:inherit;outline:none}
.search-input:focus{border-color:#93c5fd}
.count-badge{font-size:11px;font-weight:600;color:#64748b;background:#f1f5f9;padding:4px 10px;border-radius:20px;white-space:nowrap}
table{width:100%;border-collapse:collapse}
thead th{padding:10px 14px;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;color:#94a3b8;background:#f8fafc;border-bottom:1px solid #e2e8f0;text-align:left}
tbody td{padding:13px 14px;font-size:13px;color:#334155;border-bottom:1px solid #f1f5f9}
tbody tr:last-child td{border-bottom:none}
tbody tr:hover td{background:#fafbfc}
.td-name{font-weight:500;color:#0f172a}
.td-email{color:#64748b;font-size:12px}
.badge-role{display:inline-block;padding:3px 10px;background:#eff6ff;color:#1d4ed8;border-radius:20px;font-size:11px;font-weight:600}
.action-group{display:flex;gap:6px}
.btn-sm{display:inline-flex;align-items:center;gap:5px;padding:6px 11px;border:none;border-radius:7px;font-size:11px;font-weight:600;cursor:pointer;font-family:inherit}
.btn-warn{background:#fffbeb;color:#b45309;border:1px solid #fde68a}
.btn-warn:hover{background:#fef3c7}
.btn-del{background:#fef2f2;color:#dc2626;border:1px solid #fecaca}
.btn-del:hover{background:#fee2e2}
.empty-row td{text-align:center;padding:32px;color:#94a3b8;font-size:13px}
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
        <a class="nav-item" href="/admin/dashboard">🏠 Dashboard</a>
        <a class="nav-item active" href="/admin/dosen">👨‍🏫 Dosen</a>
        <a class="nav-item" href="/admin/mahasiswa">🎓 Mahasiswa</a>
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
        <div class="topbar-left">
            <h1>Kelola Dosen</h1>
            <p>Tambah dan manajemen data dosen</p>
        </div>
        <a class="back-btn" href="/admin/dashboard">← Kembali ke Dashboard</a>
    </div>

    <!-- CONTENT -->
    <div class="content">

        {{-- VALIDATION ERRORS --}}
        @if ($errors->any())
            <div class="alert alert-error">
                <div>
                    @foreach ($errors->all() as $error)
                        <div>❌ {{ $error }}</div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- SUCCESS --}}
        @if(session('success'))
            <div class="alert alert-success">✅ {{ session('success') }}</div>
        @endif

        {{-- ERROR --}}
        @if(session('error'))
            <div class="alert alert-error">❌ {{ session('error') }}</div>
        @endif

        <div class="page-grid">

            <!-- FORM TAMBAH -->
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon icon-blue">➕</div>
                    <div>
                        <h3>Tambah Dosen</h3>
                        <p>Isi data untuk menambah akun dosen</p>
                    </div>
                </div>

                <form action="/admin/users/store" method="POST">
                    @csrf
                    <input type="hidden" name="role" value="dosen">

                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" placeholder="Contoh: Dr. Sari Kusuma" value="{{ old('name') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Email</label>
                        <input type="email" name="email" placeholder="email@kampus.ac.id" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Minimal 8 karakter" required>
                    </div>

                    <button type="submit" class="btn-submit">💾 Simpan Dosen</button>
                </form>
            </div>

            <!-- TABEL DOSEN -->
            <div class="card">
                <div class="card-header">
                    <div class="card-header-icon icon-slate">📋</div>
                    <div>
                        <h3>Daftar Dosen</h3>
                        <p>Semua akun dengan role dosen</p>
                    </div>
                </div>

                <div class="search-row">
                    <input class="search-input" type="text" placeholder="Cari nama atau email...">
                    <span class="count-badge">{{ $users->count() }} Dosen</span>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $index => $user)
                        <tr>
                            <td style="color:#cbd5e1;font-size:12px">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</td>
                            <td class="td-name">{{ $user->name }}</td>
                            <td class="td-email">{{ $user->email }}</td>
                            <td><span class="badge-role">Dosen</span></td>
                            <td>
                                <div class="action-group">
                                    <form action="/admin/users/update-role/{{ $user->id }}" method="POST" style="margin:0">
                                        @csrf
                                        <input type="hidden" name="role" value="mahasiswa">
                                        <button type="submit" class="btn-sm btn-warn">↔ Mahasiswa</button>
                                    </form>
                                    <form action="/admin/users/delete/{{ $user->id }}" method="POST" style="margin:0">
                                        @csrf
                                        <button type="submit" class="btn-sm btn-del" onclick="return confirm('Hapus dosen ini?')">🗑 Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="empty-row">
                            <td colspan="5">Belum ada data dosen.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>

</body>
</html>