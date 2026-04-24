<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pengaturan User - E-Tugas</title>
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
.content{padding:24px 28px;flex:1;display:flex;flex-direction:column;gap:20px}

/* SECTION CARD */
.section-card{background:#fff;border:1px solid #e2e8f0;border-radius:12px;overflow:hidden}
.section-header{display:flex;align-items:center;justify-content:space-between;padding:16px 20px;border-bottom:1px solid #f1f5f9}
.section-header-left{display:flex;align-items:center;gap:10px}
.section-icon{width:34px;height:34px;border-radius:9px;display:flex;align-items:center;justify-content:center;font-size:15px;flex-shrink:0}
.icon-violet{background:#f5f3ff}
.icon-blue{background:#eff6ff}
.icon-emerald{background:#f0fdf4}
.section-header h3{font-size:14px;font-weight:600;color:#0f172a}
.section-header p{font-size:11px;color:#94a3b8;margin-top:1px}
.count-badge{font-size:11px;font-weight:600;padding:4px 10px;border-radius:20px;white-space:nowrap}
.badge-violet{background:#f5f3ff;color:#6d28d9}
.badge-blue{background:#eff6ff;color:#1d4ed8}
.badge-emerald{background:#f0fdf4;color:#16a34a}

/* TABLE */
table{width:100%;border-collapse:collapse}
thead th{padding:10px 20px;font-size:11px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;color:#94a3b8;background:#f8fafc;border-bottom:1px solid #e2e8f0;text-align:left}
tbody td{padding:13px 20px;font-size:13px;color:#334155;border-bottom:1px solid #f1f5f9}
tbody tr:last-child td{border-bottom:none}
tbody tr:hover td{background:#fafbfc}
.td-name{font-weight:500;color:#0f172a}
.td-email{color:#64748b;font-size:12px}
.td-dash{color:#cbd5e1;font-size:12px;font-style:italic}

/* BADGES */
.role-badge{display:inline-block;padding:3px 10px;border-radius:20px;font-size:11px;font-weight:600}
.rb-admin{background:#f5f3ff;color:#6d28d9;border:1px solid #ddd6fe}
.rb-dosen{background:#eff6ff;color:#1d4ed8;border:1px solid #bfdbfe}
.rb-mahasiswa{background:#f0fdf4;color:#16a34a;border:1px solid #bbf7d0}

/* ACTIONS */
.action-group{display:flex;align-items:center;gap:6px}
.role-select{padding:6px 10px;border:1px solid #e2e8f0;border-radius:7px;font-size:12px;font-family:inherit;color:#334155;background:#fff;outline:none;cursor:pointer}
.role-select:focus{border-color:#93c5fd}
.btn-sm{display:inline-flex;align-items:center;gap:4px;padding:6px 11px;border:none;border-radius:7px;font-size:11px;font-weight:600;cursor:pointer;font-family:inherit;transition:.15s}
.btn-save{background:#eff6ff;color:#1d4ed8;border:1px solid #bfdbfe}
.btn-save:hover{background:#dbeafe}
.btn-del{background:#fef2f2;color:#dc2626;border:1px solid #fecaca}
.btn-del:hover{background:#fee2e2}
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
        <a class="nav-item" href="/admin/dosen">👨‍🏫 Dosen</a>
        <a class="nav-item" href="/admin/mahasiswa">🎓 Mahasiswa</a>
        <div class="nav-label" style="margin-top:16px">Sistem</div>
        <a class="nav-item active" href="/admin/users">⚙️ Pengaturan User</a>
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
            <h1>Pengaturan User</h1>
            <p>Kelola semua akun dan hak akses sistem</p>
        </div>
        <a class="back-btn" href="/admin/dashboard">← Kembali ke Dashboard</a>
    </div>

    <!-- CONTENT -->
    <div class="content">

        {{-- SUCCESS / ERROR --}}
        @if(session('success'))
            <div style="display:flex;align-items:center;gap:10px;padding:12px 16px;border-radius:10px;background:#f0fdf4;border:1px solid #bbf7d0;color:#166534;font-size:13px;font-weight:500">
                ✅ {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div style="display:flex;align-items:center;gap:10px;padding:12px 16px;border-radius:10px;background:#fef2f2;border:1px solid #fecaca;color:#991b1b;font-size:13px;font-weight:500">
                ❌ {{ session('error') }}
            </div>
        @endif

        {{-- ADMIN --}}
        <div class="section-card">
            <div class="section-header">
                <div class="section-header-left">
                    <div class="section-icon icon-violet">👑</div>
                    <div>
                        <h3>Admin</h3>
                        <p>Akun dengan akses penuh ke sistem</p>
                    </div>
                </div>
                <span class="count-badge badge-violet">{{ $users->where('role','admin')->count() }} Akun</span>
            </div>
            <table>
                <thead>
                    <tr><th>Nama</th><th>Email</th><th>Role</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                @foreach($users->where('role','admin') as $user)
                    <tr>
                        <td class="td-name">{{ $user->name }}</td>
                        <td class="td-email">{{ $user->email }}</td>
                        <td><span class="role-badge rb-admin">Admin</span></td>
                        <td class="td-dash">— tidak dapat diubah</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- DOSEN --}}
        <div class="section-card">
            <div class="section-header">
                <div class="section-header-left">
                    <div class="section-icon icon-blue">👨‍🏫</div>
                    <div>
                        <h3>Dosen</h3>
                        <p>Akun pengajar aktif di sistem</p>
                    </div>
                </div>
                <span class="count-badge badge-blue">{{ $users->where('role','dosen')->count() }} Akun</span>
            </div>
            <table>
                <thead>
                    <tr><th>Nama</th><th>Email</th><th>Role</th><th>Ubah Role</th><th>Hapus</th></tr>
                </thead>
                <tbody>
                @foreach($users->where('role','dosen') as $user)
                    <tr>
                        <td class="td-name">{{ $user->name }}</td>
                        <td class="td-email">{{ $user->email }}</td>
                        <td><span class="role-badge rb-dosen">Dosen</span></td>
                        <td>
                            <form method="POST" action="/admin/users/update-role/{{ $user->id }}" style="margin:0">
                                @csrf
                                <div class="action-group">
                                    <select name="role" class="role-select">
                                        <option value="dosen">Dosen</option>
                                        <option value="mahasiswa">Mahasiswa</option>
                                    </select>
                                    <button type="submit" class="btn-sm btn-save">✓ Simpan</button>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="/admin/users/delete/{{ $user->id }}" style="margin:0">
                                @csrf
                                <button type="submit" class="btn-sm btn-del" onclick="return confirm('Hapus user ini?')">🗑 Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        {{-- MAHASISWA --}}
        <div class="section-card">
            <div class="section-header">
                <div class="section-header-left">
                    <div class="section-icon icon-emerald">🎓</div>
                    <div>
                        <h3>Mahasiswa</h3>
                        <p>Akun pelajar terdaftar di sistem</p>
                    </div>
                </div>
                <span class="count-badge badge-emerald">{{ $users->where('role','mahasiswa')->count() }} Akun</span>
            </div>
            <table>
                <thead>
                    <tr><th>Nama</th><th>Email</th><th>Role</th><th>Ubah Role</th><th>Hapus</th></tr>
                </thead>
                <tbody>
                @foreach($users->where('role','mahasiswa') as $user)
                    <tr>
                        <td class="td-name">{{ $user->name }}</td>
                        <td class="td-email">{{ $user->email }}</td>
                        <td><span class="role-badge rb-mahasiswa">Mahasiswa</span></td>
                        <td>
                            <form method="POST" action="/admin/users/update-role/{{ $user->id }}" style="margin:0">
                                @csrf
                                <div class="action-group">
                                    <select name="role" class="role-select">
                                        <option value="mahasiswa">Mahasiswa</option>
                                        <option value="dosen">Dosen</option>
                                    </select>
                                    <button type="submit" class="btn-sm btn-save">✓ Simpan</button>
                                </div>
                            </form>
                        </td>
                        <td>
                            <form method="POST" action="/admin/users/delete/{{ $user->id }}" style="margin:0">
                                @csrf
                                <button type="submit" class="btn-sm btn-del" onclick="return confirm('Hapus user ini?')">🗑 Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

</body>
</html>