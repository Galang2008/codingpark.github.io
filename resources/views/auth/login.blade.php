{{-- Mendefinisikan elemen atau instruksi markup halaman. --}}
<!DOCTYPE html>
{{-- Membuka elemen <html> untuk menyusun bagian antarmuka. --}}
<html lang="id">
{{-- Membuka elemen <head> untuk menyusun bagian antarmuka. --}}
<head>
    {{-- Membuka elemen <meta> untuk menyusun bagian antarmuka. --}}
    <meta charset="UTF-8">
    {{-- Membuka elemen <meta> untuk menyusun bagian antarmuka. --}}
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Membuka elemen <meta> untuk menyusun bagian antarmuka. --}}
    <meta name="theme-color" content="#0b1f4d">
    {{-- Membuka elemen <title> untuk menyusun bagian antarmuka. --}}
    <title>Masuk | CodingPARK</title>
    {{-- Membuka elemen <script> untuk menyusun bagian antarmuka. --}}
    <script src="https://unpkg.com/lucide@0.468.0"></script>
    {{-- Menjalankan direktif Blade @vite untuk menyusun tampilan. --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- Membuka elemen <style> untuk menyusun bagian antarmuka. --}}
    <style>
        {{-- Menampilkan atau memproses nilai dinamis pada halaman. --}}
        .login-page{min-height:100vh;background:#f7f9fc}.login-shell{display:grid;grid-template-columns:minmax(360px,.88fr) minmax(480px,1.12fr);min-height:100vh}.login-intro{position:relative;display:flex;flex-direction:column;justify-content:space-between;min-height:100vh;padding:52px max(48px,8vw) 44px;color:#fff;overflow:hidden;background:var(--navy)}.login-intro:before{position:absolute;right:-130px;bottom:10%;width:470px;height:470px;content:'';border:1px solid rgba(117,173,255,.22);border-radius:50%;box-shadow:0 0 0 55px rgba(37,99,235,.08),0 0 0 115px rgba(37,99,235,.05)}.login-intro:after{position:absolute;top:-130px;left:-150px;width:390px;height:390px;content:'';background:rgba(6,182,212,.13);border-radius:50%;filter:blur(45px)}.login-intro>*{position:relative;z-index:1}.brand-light{color:#fff}.brand-light>span:last-child>span{color:#7fb5ff}.login-intro-copy{max-width:510px;margin:auto 0;padding:80px 0}.login-intro-copy .section-kicker{color:#7fb5ff}.login-intro-copy h1{max-width:490px;margin:18px 0 20px;color:#fff;font:700 clamp(38px,4.4vw,61px)/1.08 var(--display);letter-spacing:-2.5px}.login-intro-copy h1 em{color:#7fb5ff;font-style:normal}.login-intro-copy p{max-width:420px;margin:0;color:#aebbd3;line-height:1.75}.login-intro-footer{display:flex;align-items:center;gap:10px;color:#aebbd3;font-size:12px}.login-intro-footer svg{width:18px;color:#71b4ff}.login-panel{display:flex;flex-direction:column;justify-content:space-between;min-height:100vh;padding:42px max(32px,8vw) 32px;background:#fff}.login-form-wrap{width:min(100%,430px);margin:auto}.login-back{display:inline-flex;align-items:center;gap:8px;color:#8490a4;font-size:12px;font-weight:600}.login-back:hover{color:var(--blue)}.login-back svg{width:15px}.login-heading{margin-top:67px}.login-icon{display:grid;place-items:center;width:46px;height:46px;margin-bottom:27px;color:var(--blue);background:#e9f0ff;border-radius:13px}.login-icon svg{width:21px}.login-heading .section-kicker{display:block}.login-heading h2{margin:12px 0 8px;color:var(--navy);font:700 35px/1.1 var(--display);letter-spacing:-1.4px}.login-heading p{margin:0;color:var(--muted);font-size:14px}.login-alert{display:flex;align-items:center;gap:10px;margin-top:28px;padding:12px 14px;color:#b42318;background:#fff1f0;border:1px solid #ffd5d2;border-radius:10px;font-size:12px}.login-alert svg{flex:none;width:17px}.login-form{display:grid;gap:21px;margin-top:31px}.form-field{display:grid;gap:8px}.form-field label,.field-label-row label{color:var(--navy);font-size:12px;font-weight:700}.field-label-row{display:flex;align-items:center;justify-content:space-between}.field-label-row a{color:var(--blue);font-size:11px;font-weight:700}                .input-wrap{position:relative;display:flex;align-items:center}.input-wrap>svg{position:absolute;left:15px;width:17px;color:#99a5b8;pointer-events:none;transition:color .2s}.input-wrap input{width:100%;height:50px;padding:0 44px;border:1px solid #dce3ee;border-radius:10px;outline:0;color:var(--navy);font:500 13px var(--body);caret-color:var(--blue);transition:border-color .2s,background .2s}.input-wrap input::placeholder{color:#aab4c3}.input-wrap:hover input:not(:focus){border-color:#aebddb}.input-wrap:focus-within>svg{color:var(--blue)}.input-wrap input:focus{border:2px solid #77a6f7;box-shadow:none}.input-wrap input:-webkit-autofill{box-shadow:0 0 0 1000px #fff inset;-webkit-text-fill-color:var(--navy)}.password-toggle{position:absolute;right:5px;display:grid;place-items:center;width:38px;height:38px;color:#91a0b5;background:transparent;border:0;border-radius:7px;cursor:pointer}.password-toggle:hover{color:var(--blue);background:#f1f5ff}.password-toggle svg{width:17px}.remember-option{display:flex;align-items:center;gap:9px;color:#68758c;font-size:12px;cursor:pointer}.remember-option input{position:absolute;opacity:0}.custom-checkbox{display:grid;place-items:center;width:17px;height:17px;color:#fff;border:1px solid #ccd5e2;border-radius:4px}.custom-checkbox svg{width:12px;opacity:0}.remember-option input:checked+.custom-checkbox{background:var(--blue);border-color:var(--blue)}.remember-option input:checked+.custom-checkbox svg{opacity:1}.login-submit{width:100%;margin-top:3px}.login-help{margin:25px 0 0;color:#8995a8;text-align:center;font-size:12px}.login-help a{color:var(--blue);font-weight:700}.login-copyright{margin:0;color:#a0aaba;text-align:center;font-size:10px}.login-copyright span{padding-inline:7px;color:#d0d6df}@media(max-width:800px){.login-shell{display:block}.login-intro{min-height:330px;padding:28px 24px 30px}.login-intro-copy{margin:0;padding:50px 0 20px}.login-intro-copy h1{font-size:38px;letter-spacing:-1.6px}.login-intro-copy p{font-size:14px}.login-intro-footer{display:none}.login-intro:before{right:-180px;bottom:-220px}.login-panel{min-height:calc(100vh - 330px);padding:30px 24px 25px}.login-form-wrap{margin:0 auto}.login-heading{margin-top:42px}}
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </style>
    {{-- Membuka elemen <style> untuk menyusun bagian antarmuka. --}}
    <style>
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        .login-page .input-wrap{height:50px;padding:0;border:1px solid #dce3ee;border-radius:10px;background:#f8faff;transition:border-color .2s,box-shadow .2s,background .2s}
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        .login-page .input-wrap:hover:not(:focus-within){border-color:#aebddb}
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        .login-page .input-wrap:focus-within{border-color:#77a6f7;background:#fff;box-shadow:0 0 0 3px rgba(37,99,235,.1)}
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        .login-page .input-wrap input{height:100%;border:0;border-radius:inherit;background:transparent}
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        .login-page .input-wrap input:focus{border:0;box-shadow:none}
        {{-- Menampilkan isi atau teks untuk bagian antarmuka ini. --}}
        .login-page .field-label-row a:focus-visible{border-radius:3px;outline:2px solid #77a6f7;outline-offset:3px}
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </style>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</head>
{{-- Membuka elemen <body> untuk menyusun bagian antarmuka. --}}
<body class="login-page">
    {{-- Membuka elemen <main> untuk menyusun bagian antarmuka. --}}
    <main class="login-shell">
        {{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
        <section class="login-intro" aria-label="Tentang SmarPARK">
            {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
            <a class="brand brand-light" href="{{ url('/') }}" aria-label="Kembali ke beranda CodingPARK">
                {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                <span class="brand-mark"><i data-lucide="square-parking"></i></span>
                {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                <span>Coding<span>PARK</span></span>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </a>
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="login-intro-copy">
                {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                <span class="section-kicker">PUSAT KENDALI PARKIR</span>
                {{-- Membuka elemen <h1> untuk menyusun bagian antarmuka. --}}
                <h1>Operasional rapi dimulai dari <em>satu akses.</em></h1>
                {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                <p>Masuk untuk memantau kendaraan, transaksi, dan performa parkir dalam satu sistem terintegrasi.</p>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </div>
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="login-intro-footer"><i data-lucide="shield-check"></i><span>Akses aman berbasis role</span></div>
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </section>

        {{-- Membuka elemen <section> untuk menyusun bagian antarmuka. --}}
        <section class="login-panel" aria-labelledby="login-title">
            {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
            <div class="login-form-wrap">
                {{-- Membuka elemen <a> untuk menyusun bagian antarmuka. --}}
                <a class="login-back" href="{{ url('/') }}"><i data-lucide="arrow-left"></i>Kembali ke beranda</a>
                {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                <div class="login-heading">
                    {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                    <span class="login-icon"><i data-lucide="log-in"></i></span>
                    {{-- Membuka elemen <span> untuk menyusun bagian antarmuka. --}}
                    <span class="section-kicker">SELAMAT DATANG KEMBALI</span>
                    {{-- Membuka elemen <h2> untuk menyusun bagian antarmuka. --}}
                    <h2 id="login-title">Masuk ke CodingPARK</h2>
                    {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                    <p>Gunakan akun yang diberikan oleh Admin Anda.</p>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </div>

                {{-- Memeriksa kondisi sebelum menampilkan bagian ini. --}}
                @if ($errors->any())
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="login-alert" role="alert"><i data-lucide="circle-alert"></i><span>{{ $errors->first() }}</span></div>
                {{-- Mengakhiri pemeriksaan kondisi tampilan. --}}
                @endif

                {{-- Membuka elemen <form> untuk menyusun bagian antarmuka. --}}
                <form class="login-form" method="POST" action="{{ route('login.store') }}">
                    {{-- Menyertakan token perlindungan formulir. --}}
                    @csrf
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="form-field">
                        {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
                        <label for="email">Email</label>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="input-wrap"><i data-lucide="mail"></i><input id="email" name="email" type="email" value="{{ old('email') }}" placeholder="nama@perusahaan.com" autocomplete="email" required></div>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                    {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                    <div class="form-field">
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="field-label-row"><label for="password">Password</label><a href="mailto:admin@codingpark.id">Lupa password?</a></div>
                        {{-- Membuka elemen <div> untuk menyusun bagian antarmuka. --}}
                        <div class="input-wrap"><i data-lucide="lock-keyhole"></i><input id="password" name="password" type="password" placeholder="Masukkan password" autocomplete="current-password" required><button class="password-toggle" type="button" aria-label="Tampilkan password" data-password-toggle><i data-lucide="eye"></i></button></div>
                    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                    </div>
                    {{-- Membuka elemen <label> untuk menyusun bagian antarmuka. --}}
                    <label class="remember-option"><input type="checkbox" name="remember" value="1"><span class="custom-checkbox"><i data-lucide="check"></i></span><span>Ingat saya di perangkat ini</span></label>
                    {{-- Membuka elemen <button> untuk menyusun bagian antarmuka. --}}
                    <button class="button button-primary login-submit" type="submit">Masuk ke Sistem <i data-lucide="arrow-up-right"></i></button>
                {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
                </form>
                {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
                <p class="login-help">Belum memiliki akun? <a href="mailto:admin@codingpark.id">Hubungi Admin</a></p>
            {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
            </div>
            {{-- Membuka elemen <p> untuk menyusun bagian antarmuka. --}}
            <p class="login-copyright">© 2026 CodingPARK <span>•</span> Internal use only</p>
        {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
        </section>
    {{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
    </main>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</body>
{{-- Menutup elemen antarmuka yang telah dibuka sebelumnya. --}}
</html>