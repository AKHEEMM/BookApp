<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        body{
        
        }
        /* Full industrial/professional theme */
        :root{
            /* Professional cool palette */
            --sidebar-width: 260px;
            --bg-primary: #0b1220;    /* deep navy charcoal */
            --surface: #0f1724;       /* panel background */
            --surface-2: #111827;     /* stronger panel */
            --accent: #2563eb;        /* blue (primary accent) */
            --accent-2: #06b6d4;      /* teal secondary accent */
            --muted: #9aa8bb;         /* muted slate */
            --text: #e6eef6;          /* light text */
            --glass: rgba(255,255,255,0.02);
        }

        html,body{height:100%;background:var(--bg-primary);color:var(--text);font-family:Inter, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial}

        /* Layout */
        .app-wrap{min-height:100vh}
        /* Top header/navigation layout */
        .app-header{height:72px;display:flex;align-items:center;justify-content:space-between;padding:0 1rem;background:linear-gradient(180deg,var(--surface),#0e1011);border-bottom:1px solid rgba(255,255,255,0.03)}
        .app-header .brand{font-size:1.05rem;font-weight:800;color:var(--text);letter-spacing:0.6px}
        .app-nav{display:flex;gap:.6rem;align-items:center}
        .app-nav a{color:var(--muted);text-decoration:none;padding:.45rem .6rem;border-radius:6px;transition:all .12s ease;font-weight:600;letter-spacing:.2px}
        .app-nav a:hover{color:var(--text);background:rgba(255,255,255,0.02);transform:translateY(-1px)}
        .app-nav a.active{color:var(--accent);font-weight:800}

        /* Page title (welcome heading) */
        .page-title{font-size:1.6rem;font-weight:800;margin:0;color:var(--accent);line-height:1.05;letter-spacing:0.2px;text-shadow:0 2px 10px rgba(6,182,212,0.03)}
        .page-subtitle{color:var(--muted);font-weight:600;margin-top:.25rem}

        /* Header search styling */
        .header-search .form-control{background:rgba(255,255,255,0.02);border:1px solid rgba(255,255,255,0.04);backdrop-filter: blur(4px);color:var(--text);padding:.5rem .75rem;border-radius:8px 0 0 8px}
        .header-search .form-control::placeholder{color:rgba(255,255,255,0.2)}
        .header-search .btn{border-radius:0 8px 8px 0;background:linear-gradient(180deg,var(--accent),var(--accent-2));border:0;color:#fff;padding:.48rem .8rem;box-shadow:0 8px 22px rgba(6,182,212,0.08)}
        .header-search .input-group{box-shadow:0 6px 18px rgba(2,6,7,0.45)}
        .app-main{padding:1.25rem;max-width:1200px;margin:1.25rem auto}

        /* Legacy sidebar styles removed; header/nav styles above replace sidebar layout */

        /* Top utility bar inside main area */
        .top-utility{display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem}
        .top-utility .search{max-width:420px}

        /* Panels, cards and components */
        .panel{background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));border:1px solid rgba(255,255,255,0.03);padding:1rem;border-radius:8px;transition:transform .18s ease,box-shadow .18s ease}
        .panel-strong{background:linear-gradient(180deg,var(--surface-2),rgba(255,255,255,0.01));box-shadow:0 8px 24px rgba(2,6,7,0.6)}
        .card-industrial{background:linear-gradient(180deg, rgba(255,255,255,0.02), rgba(255,255,255,0.01));border:1px solid rgba(255,255,255,0.03);border-radius:8px;transition:transform .18s ease,box-shadow .18s ease}
        .card-industrial:hover{transform:translateY(-6px);box-shadow:0 18px 40px rgba(2,6,7,0.7)}
        .muted { color: var(--muted) }
        .stat{display:flex;align-items:center;gap:.8rem}
        .stat .num{font-weight:700;font-size:1.6rem}

        /* Headings and titles should be clear white for contrast */
        .brand, .card-title, h1,h2,h3,h4,h5,h6 { color: #ffffff !important; }

        /* Slightly larger content text and headings for readability */
        .app-main { font-size: 1.02rem; }
        .app-main h1 { font-size: 1.6rem; }
        .app-main h2 { font-size: 1.35rem; }
        .app-main h3 { font-size: 1.15rem; }

        /* Animated / styled inputs for forms */
        .animated-input{background:transparent;border:1px solid rgba(255,255,255,0.06);padding:.5rem .65rem;border-radius:6px;color:var(--text);transition:box-shadow .18s ease,transform .12s ease,border-color .12s ease}
        .animated-input::placeholder{color:rgba(255,255,255,0.18)}
        .animated-input:focus{outline:none;border-color:var(--accent);box-shadow:0 6px 18px rgba(37,99,235,0.08);transform:translateY(-2px)}
        textarea.animated-input{min-height:120px}
        .form-label{color:var(--muted);font-weight:600}

        /* Books section */
        .books-panel{display:flex;gap:.75rem}
        .books-panel .filters{min-width:220px}
        .books-panel .content{flex:1}
        .books-table thead th{color:var(--muted);font-weight:600;font-size:.85rem}
        .books-table tbody td{vertical-align:middle}
        /* Make the first column (book title) clearly visible */
        .books-table tbody td:first-child{color:var(--text);font-weight:600}
        .books-table tbody tr:hover{background:linear-gradient(90deg, rgba(255,255,255,0.01), rgba(255,255,255,0.00));transform:translateY(-2px)}

        /* Buttons */
        .btn-primary{background:var(--accent);border-color:rgba(0,0,0,0.12);color:#fff;transition:transform .12s ease,box-shadow .12s ease}
        .btn-primary:hover{transform:translateY(-3px);box-shadow:0 10px 28px rgba(37,99,235,0.12)}
        .btn-outline-secondary{color:var(--muted);border-color:rgba(255,255,255,0.04)}

        /* Footer */
        .site-footer{background:linear-gradient(180deg,#070808,#040404);color:var(--muted);border-top:1px solid rgba(255,255,255,0.02);padding:1.5rem 0;margin-top:2rem}
        /* Footer aligned with main content (no sidebar) */
        .site-footer > .container{margin:0 auto;max-width:1200px;padding:0 1rem}
        /* Footer detailed styles */
        .site-footer .footer-grid{display:flex;gap:2rem;align-items:flex-start}
        .site-footer .footer-col{flex:1;min-width:180px}
        .site-footer .footer-brand{font-size:1.15rem;font-weight:800;color:var(--text);margin-bottom:.35rem}
        .site-footer .footer-desc{color:var(--muted);line-height:1.45}
        .footer-links a{display:block;color:var(--muted);text-decoration:none;padding:.18rem 0}
        .footer-links a:hover{color:var(--text)}
        .social-icons{display:flex;gap:.6rem;margin-top:.6rem}
        .social-icons a{display:inline-flex;align-items:center;justify-content:center;width:36px;height:36px;border-radius:8px;background:rgba(255,255,255,0.02);color:var(--text);text-decoration:none}
        .social-icons a svg{width:18px;height:18px;fill:currentColor}
        .site-footer .legal{color:var(--muted);font-size:.9rem}

        /* Responsive */
        @media (max-width:991px){
            .app-header{flex-direction:column;align-items:flex-start;height:auto;padding:.75rem 1rem;gap:.5rem}
            .app-nav{flex-wrap:wrap}
            .app-main{padding:1rem;margin:0.5rem}
            .site-footer > .container{margin:0;padding:0 1rem;max-width:100%}
        }

        /* Page transition/entrance animation */
        body.page-enter .app-main, body.page-enter .card-industrial, body.page-enter .panel{opacity:0;transform:translateY(8px)}
        body:not(.page-enter) .app-main, body:not(.page-enter) .card-industrial, body:not(.page-enter) .panel{opacity:1;transform:none;transition:all .45s cubic-bezier(.2,.9,.38,1)}

        /* Animated inputs already defined earlier: keep small focus states */
    </style>
</head>
<body>
    <div class="app-wrap">
        <header class="app-header">
            <div class="d-flex align-items-center gap-3">
                <div class="brand"><a class="text-decoration-none text-white" href="{{ url('/') }}">Book-App</a></div>
                <div class="app-nav">
                    <a href="{{ url('/') }}" class="@if(request()->is('/')) active @endif">Dashboard</a>
                    <a href="{{ route('books.index') }}" class="@if(request()->is('books*')) active @endif">Books</a>
                </div>
            </div>
            <div class="d-flex align-items-center">
                <form class="d-flex" role="search" method="GET" action="{{ route('books.index') }}">
                    <div class="input-group">
                        <input name="q" value="{{ request('q') }}" class="form-control form-control-sm" placeholder="Search books...">
                        <button class="btn btn-sm btn-outline-secondary">Search</button>
                    </div>
                </form>
            </div>
        </header>

        <main class="app-main">
            <div class="top-utility">
                <div>
                    <h1 class="page-title">Welcome back — Manage Your Library</h1>
                    <div class="page-subtitle">Fast. Reliable. Built for clarity.</div>
                </div>
                <div class="d-flex align-items-center gap-2">
                    <div class="sidebar-muted small">Version 1.0</div>
                </div>
            </div>

            @yield('content')
        </main>
    </div>
    <script>
        // Page entrance animation: keep initial state and remove after load
        document.documentElement.classList.add('page-enter');
        window.addEventListener('load', function(){
            // small stagger to allow CSS to animate
            setTimeout(function(){
                document.documentElement.classList.remove('page-enter');
            }, 60);
        });
        // Optional: smooth scroll for in-page anchors
        (function(){
            try{ document.documentElement.style.scrollBehavior = 'smooth'; }catch(e){}
        })();
    </script>
    <footer class="site-footer mt-5 pt-4 pb-3">
        <div class="container">
            <div class="footer-grid">
                <div class="footer-col">
                    <div class="footer-brand">Book-App</div>
                    <p class="footer-desc">A professional, reliable catalog to manage your books. Fast, minimal UI with production-ready layout and smooth interactions.</p>
                    <div class="social-icons" aria-label="social links">
                        <a href="mailto:modibboakheem@gmail.com" title="Email">
                            <!-- mail SVG -->
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4-8 5-8-5V6l8 5 8-5v2z"/></svg>
                        </a>
                        <a href="https://wa.me/2349163161615" target="_blank" title="WhatsApp">
                            <!-- whatsapp SVG -->
                            <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path d="M20.52 3.48A11.87 11.87 0 0012 .75 11.88 11.88 0 003.48 3.48 11.85 11.85 0 00.75 12c0 2.09.55 4.14 1.6 5.95L.5 23.25l5.5-1.45A11.87 11.87 0 0012 23.25c2.09 0 4.14-.55 5.95-1.6A11.87 11.87 0 0023.25 12c0-1.9-.45-3.7-1.45-5.32l-1.28 1.8zM12 21.5c-1.9 0-3.73-.5-5.32-1.45l-.38-.22-3.28.86.87-3.2-.22-.4A9.5 9.5 0 012.5 12 9.5 9.5 0 0112 2.5 9.5 9.5 0 0121.5 12 9.5 9.5 0 0112 21.5z"/></svg>
                        </a>
                    </div>
                </div>

                <div class="footer-col footer-links">
                    <h6 class="text-uppercase">Quick Links</h6>
                    <a href="{{ route('books.index') }}">Books</a>
                    <a href="{{ url('/') }}">Home</a>
                </div>

                <div class="footer-col">
                    <h6 class="text-uppercase">Contact</h6>
                    <div style="margin-top:.4rem">
                        <a class="d-block" href="mailto:modibboakheem@gmail.com">modibboakheem@gmail.com</a>
                        <a class="d-block" href="https://wa.me/2349163161615" target="_blank">+234 916 316 1615</a>
                    </div>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col-12 d-flex justify-content-between align-items-center">
                    <div class="legal">&copy; {{ date('Y') }} Book-App. All rights reserved.</div>
                    <div>
                        <a class="me-3" href="#">Privacy</a>
                        <a href="#">Terms</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>