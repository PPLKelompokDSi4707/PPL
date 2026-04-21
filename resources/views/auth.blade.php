<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GreenTour Indonesia | Auth</title>
    <style>
        :root {
            color-scheme: light;
            --bg: #f4f7f2;
            --card: #ffffff;
            --line: #dfe8dc;
            --text: #17311d;
            --muted: #5f7465;
            --primary: #1d7a43;
            --primary-dark: #166237;
            --danger: #c0392b;
            --danger-bg: #fdecea;
            --success: #166534;
            --success-bg: #eaf7ee;
            --shadow: 0 20px 50px rgba(22, 68, 40, 0.12);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(29, 122, 67, 0.12), transparent 28%),
                linear-gradient(135deg, #eff8f1, #f8fbf7 55%, #eef6f0);
            min-height: 100vh;
        }

        .page {
            min-height: 100vh;
            display: grid;
            grid-template-columns: 1.1fr 1fr;
        }

        .hero {
            padding: 64px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            gap: 24px;
            background:
                linear-gradient(180deg, rgba(16, 77, 42, 0.92), rgba(8, 54, 28, 0.96)),
                url('https://images.unsplash.com/photo-1507525428034-b723cf961d3e?auto=format&fit=crop&w=1200&q=80') center/cover;
            color: #f7fff9;
        }

        .hero-badge {
            width: fit-content;
            padding: 8px 14px;
            border-radius: 999px;
            background: rgba(255, 255, 255, 0.14);
            border: 1px solid rgba(255, 255, 255, 0.18);
            font-size: 13px;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .hero h1 {
            margin: 0;
            font-size: 48px;
            line-height: 1.08;
        }

        .hero p {
            margin: 0;
            max-width: 560px;
            color: rgba(247, 255, 249, 0.84);
            font-size: 18px;
            line-height: 1.7;
        }

        .hero-list {
            display: grid;
            gap: 12px;
            padding: 0;
            margin: 8px 0 0;
            list-style: none;
        }

        .hero-list li {
            padding: 14px 16px;
            border-radius: 14px;
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .panel-wrap {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 32px;
        }

        .panel {
            width: 100%;
            max-width: 520px;
            background: var(--card);
            border: 1px solid var(--line);
            border-radius: 24px;
            box-shadow: var(--shadow);
            padding: 28px;
        }

        .panel h2 {
            margin: 0 0 8px;
            font-size: 28px;
        }

        .subtitle {
            margin: 0 0 24px;
            color: var(--muted);
            line-height: 1.6;
        }

        .tabs {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
            background: #f2f6f2;
            padding: 6px;
            border-radius: 14px;
            margin-bottom: 24px;
        }

        .tab-btn {
            border: 0;
            border-radius: 10px;
            padding: 12px 14px;
            font-weight: 700;
            font-size: 14px;
            background: transparent;
            color: var(--muted);
            cursor: pointer;
        }

        .tab-btn.active {
            background: var(--card);
            color: var(--text);
            box-shadow: 0 4px 12px rgba(24, 63, 35, 0.08);
        }

        .hidden {
            display: none !important;
        }

        .alert {
            display: none;
            margin-bottom: 18px;
            padding: 14px 16px;
            border-radius: 12px;
            font-size: 14px;
            line-height: 1.5;
        }

        .alert.show {
            display: block;
        }

        .alert.success {
            background: var(--success-bg);
            color: var(--success);
            border: 1px solid #c9ecd2;
        }

        .alert.error {
            background: var(--danger-bg);
            color: var(--danger);
            border: 1px solid #f1c0b7;
        }

        form {
            display: grid;
            gap: 16px;
        }

        label {
            display: grid;
            gap: 8px;
            font-weight: 700;
            font-size: 14px;
        }

        input,
        select {
            width: 100%;
            border: 1px solid #cfdccf;
            border-radius: 12px;
            padding: 13px 14px;
            font-size: 15px;
            outline: none;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
            background: #fff;
        }

        input:focus,
        select:focus {
            border-color: #78b88d;
            box-shadow: 0 0 0 4px rgba(29, 122, 67, 0.12);
        }

        .btn {
            border: 0;
            border-radius: 12px;
            padding: 14px 16px;
            font-size: 15px;
            font-weight: 700;
            cursor: pointer;
            transition: transform 0.1s ease, background 0.15s ease;
        }

        .btn:hover {
            transform: translateY(-1px);
        }

        .btn-primary {
            background: var(--primary);
            color: #fff;
        }

        .btn-primary:hover {
            background: var(--primary-dark);
        }

        .btn-secondary {
            background: #eef4ef;
            color: var(--text);
        }

        .token-box,
        .profile-box {
            margin-top: 18px;
            padding: 18px;
            border-radius: 16px;
            background: #f7fbf7;
            border: 1px solid var(--line);
        }

        .token-box h3,
        .profile-box h3 {
            margin: 0 0 12px;
            font-size: 16px;
        }

        .token-value {
            display: block;
            width: 100%;
            border: 1px dashed #b6cab9;
            border-radius: 12px;
            padding: 12px;
            background: #fff;
            color: #395241;
            word-break: break-all;
            font-size: 13px;
            line-height: 1.6;
        }

        .profile-grid {
            display: grid;
            gap: 10px;
        }

        .profile-row {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            padding-bottom: 10px;
            border-bottom: 1px solid #e5eee6;
            font-size: 14px;
        }

        .profile-row:last-child {
            border-bottom: 0;
            padding-bottom: 0;
        }

        .profile-label {
            color: var(--muted);
        }

        .actions {
            display: grid;
            gap: 10px;
            grid-template-columns: 1fr 1fr;
            margin-top: 18px;
        }

        .footer-note {
            margin-top: 18px;
            color: var(--muted);
            font-size: 13px;
            line-height: 1.6;
        }

        @media (max-width: 980px) {
            .page {
                grid-template-columns: 1fr;
            }

            .hero {
                padding: 36px 28px;
            }

            .hero h1 {
                font-size: 36px;
            }

            .panel-wrap {
                padding: 24px;
            }
        }

        @media (max-width: 640px) {
            .panel {
                padding: 20px;
                border-radius: 20px;
            }

            .hero h1 {
                font-size: 30px;
            }

            .actions {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <section class="hero">
            <div class="hero-badge">GreenTour Indonesia</div>
            <h1>Masuk ke dashboard wisata ramah lingkungan.</h1>
            <p>
                Halaman ini langsung terhubung ke JWT API Laravel kamu. Login, register,
                lihat profil, dan logout bisa dites langsung dari browser tanpa Postman.
            </p>
            <ul class="hero-list">
                <li>Register akun wisatawan, admin, atau super admin.</li>
                <li>Token JWT otomatis disimpan di browser untuk sesi login.</li>
                <li>Profil user diambil langsung dari endpoint <strong>/api/me</strong>.</li>
            </ul>
        </section>

        <section class="panel-wrap">
            <div class="panel">
                <h2>Autentikasi</h2>
                <p class="subtitle">
                    Buka aplikasi, login, lalu cek profil akun GreenTour Indonesia dari satu halaman.
                </p>

                <div id="alert" class="alert"></div>

                <div id="authView">
                    <div class="tabs">
                        <button id="loginTab" class="tab-btn active" type="button">Login</button>
                        <button id="registerTab" class="tab-btn" type="button">Register</button>
                    </div>

                    <form id="loginForm">
                        <label>
                            Email
                            <input type="email" name="email" placeholder="raiyan@example.com" required>
                        </label>
                        <label>
                            Password
                            <input type="password" name="password" placeholder="Minimal 8 karakter" required>
                        </label>
                        <button class="btn btn-primary" type="submit">Masuk Sekarang</button>
                    </form>

                    <form id="registerForm" class="hidden">
                        <label>
                            Nama Lengkap
                            <input type="text" name="name" placeholder="Raiyan" required>
                        </label>
                        <label>
                            Email
                            <input type="email" name="email" placeholder="raiyan@example.com" required>
                        </label>
                        <label>
                            Password
                            <input type="password" name="password" placeholder="Minimal 8 karakter" required>
                        </label>
                        <label>
                            Role
                            <select name="role">
                                <option value="wisatawan">wisatawan</option>
                                <option value="admin">admin</option>
                                <option value="super_admin">super_admin</option>
                            </select>
                        </label>
                        <button class="btn btn-primary" type="submit">Buat Akun</button>
                    </form>
                </div>

                <div id="profileView" class="hidden">
                    <div class="profile-box">
                        <h3>Profil Login</h3>
                        <div class="profile-grid" id="profileGrid"></div>
                    </div>

                    <div class="token-box">
                        <h3>JWT Access Token</h3>
                        <code id="tokenValue" class="token-value"></code>
                    </div>

                    <div class="actions">
                        <button id="refreshProfileBtn" class="btn btn-secondary" type="button">Refresh Profil</button>
                        <button id="logoutBtn" class="btn btn-primary" type="button">Logout</button>
                    </div>
                </div>

                <p class="footer-note">
                    Tip: setelah login berhasil, token akan dipakai otomatis untuk request ke
                    <strong>/api/me</strong> dan <strong>/api/logout</strong>.
                </p>
            </div>
        </section>
    </div>

    <script>
        const tokenKey = 'greentour_jwt_token';
        const loginTab = document.getElementById('loginTab');
        const registerTab = document.getElementById('registerTab');
        const loginForm = document.getElementById('loginForm');
        const registerForm = document.getElementById('registerForm');
        const authView = document.getElementById('authView');
        const profileView = document.getElementById('profileView');
        const profileGrid = document.getElementById('profileGrid');
        const tokenValue = document.getElementById('tokenValue');
        const alertBox = document.getElementById('alert');
        const refreshProfileBtn = document.getElementById('refreshProfileBtn');
        const logoutBtn = document.getElementById('logoutBtn');

        function showAlert(type, message) {
            alertBox.className = `alert show ${type}`;
            alertBox.textContent = message;
        }

        function clearAlert() {
            alertBox.className = 'alert';
            alertBox.textContent = '';
        }

        function setToken(token) {
            localStorage.setItem(tokenKey, token);
        }

        function getToken() {
            return localStorage.getItem(tokenKey);
        }

        function removeToken() {
            localStorage.removeItem(tokenKey);
        }

        function switchTab(type) {
            clearAlert();
            const loginActive = type === 'login';
            loginTab.classList.toggle('active', loginActive);
            registerTab.classList.toggle('active', !loginActive);
            loginForm.classList.toggle('hidden', !loginActive);
            registerForm.classList.toggle('hidden', loginActive);
        }

        function showProfileView() {
            authView.classList.add('hidden');
            profileView.classList.remove('hidden');
        }

        function showAuthView() {
            profileView.classList.add('hidden');
            authView.classList.remove('hidden');
        }

        function renderProfile(user) {
            profileGrid.innerHTML = `
                <div class="profile-row"><span class="profile-label">ID</span><strong>${user.id ?? '-'}</strong></div>
                <div class="profile-row"><span class="profile-label">Nama</span><strong>${user.name ?? '-'}</strong></div>
                <div class="profile-row"><span class="profile-label">Email</span><strong>${user.email ?? '-'}</strong></div>
                <div class="profile-row"><span class="profile-label">Role</span><strong>${user.role ?? '-'}</strong></div>
            `;
        }

        async function parseJson(response) {
            try {
                return await response.json();
            } catch (error) {
                return {
                    status: 'error',
                    message: 'Response server tidak valid.',
                    data: {},
                };
            }
        }

        async function fetchProfile() {
            const token = getToken();

            if (!token) {
                showAuthView();
                return;
            }

            const response = await fetch('/api/me', {
                headers: {
                    Accept: 'application/json',
                    Authorization: `Bearer ${token}`,
                },
            });

            const result = await parseJson(response);

            if (!response.ok) {
                removeToken();
                showAuthView();
                showAlert('error', result.message || 'Sesi login tidak valid, silakan login ulang.');
                return;
            }

            tokenValue.textContent = token;
            renderProfile(result.data.user || {});
            showProfileView();
            showAlert('success', result.message || 'Profil berhasil dimuat.');
        }

        async function submitAuth(url, payload) {
            clearAlert();

            const response = await fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    Accept: 'application/json',
                },
                body: JSON.stringify(payload),
            });

            const result = await parseJson(response);

            if (!response.ok) {
                let message = result.message || 'Request gagal.';

                if (result.data && result.data.errors) {
                    const errors = Object.values(result.data.errors).flat();
                    if (errors.length) {
                        message = errors.join(' ');
                    }
                }

                showAlert('error', message);
                return null;
            }

            showAlert('success', result.message || 'Berhasil.');
            return result;
        }

        loginTab.addEventListener('click', () => switchTab('login'));
        registerTab.addEventListener('click', () => switchTab('register'));

        loginForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            const formData = new FormData(loginForm);
            const result = await submitAuth('/api/login', Object.fromEntries(formData.entries()));

            if (!result) {
                return;
            }

            setToken(result.data.access_token);
            loginForm.reset();
            await fetchProfile();
        });

        registerForm.addEventListener('submit', async (event) => {
            event.preventDefault();

            const formData = new FormData(registerForm);
            const result = await submitAuth('/api/register', Object.fromEntries(formData.entries()));

            if (!result) {
                return;
            }

            setToken(result.data.access_token);
            registerForm.reset();
            await fetchProfile();
        });

        refreshProfileBtn.addEventListener('click', async () => {
            clearAlert();
            await fetchProfile();
        });

        logoutBtn.addEventListener('click', async () => {
            const token = getToken();

            if (!token) {
                showAuthView();
                return;
            }

            const response = await fetch('/api/logout', {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    Authorization: `Bearer ${token}`,
                },
            });

            const result = await parseJson(response);

            removeToken();
            showAuthView();
            switchTab('login');
            showAlert(response.ok ? 'success' : 'error', result.message || 'Logout selesai.');
        });

        fetchProfile();
    </script>
</body>
</html>
