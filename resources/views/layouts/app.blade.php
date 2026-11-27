<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Penjualan</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* Navbar Hover Animation */
.nav-link {
    position: relative;
    overflow: hidden;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.nav-link::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.3), transparent);
    transition: left 0.5s ease;
}

.nav-link:hover::before {
    left: 100%;
}

/* Active link animation */
.nav-link.active {
    animation: pulse 0.5s ease;
}

@keyframes pulse {
    0% {
        transform: scale(1);
    }
    50% {
        transform: scale(1.05);
    }
    100% {
        transform: scale(1);
    }
}

/* Hover scale effect for cards */
.stat-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
}

.stat-card:hover {
    transform: translateY(-10px) scale(1.02);
}

/* Table row hover */
tr {
    transition: all 0.3s ease;
}

tr:hover td {
    background: #f8f9fc;
    transform: translateX(8px);
}
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(120deg, #f0f9ff 0%, #e8f0fe 100%);
            min-height: 100vh;
        }

        /* Navbar Container */
        .navbar {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 60px;
            margin: 25px auto;
            max-width: 550px;
            padding: 8px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05);
            position: sticky;
            top: 20px;
            z-index: 1000;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.5);
            overflow: hidden;
        }

        .nav-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
            position: relative;
        }

        /* Nav Link Style */
        .nav-link {
            padding: 10px 28px;
            text-decoration: none;
            color: #5a6e7a;
            font-weight: 500;
            border-radius: 50px;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            font-size: 15px;
            letter-spacing: 0.5px;
            position: relative;
            z-index: 2;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            cursor: pointer;
        }

        /* Hover Effect */
        .nav-link:hover {
            background: #6c5ce7;
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(108, 92, 231, 0.25);
        }

        /* Active State */
        .nav-link.active {
            background: #6c5ce7;
            color: white;
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
        }

        /* Click Ripple Effect */
        .nav-link {
            position: relative;
            overflow: hidden;
        }

        .nav-link::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.5);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }

        .nav-link:active::after {
            width: 300px;
            height: 300px;
            opacity: 0;
        }

        /* Slide Indicator */
        .nav-indicator {
            position: absolute;
            bottom: 5px;
            left: 0;
            height: 3px;
            background: #6c5ce7;
            border-radius: 3px;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1;
        }

        /* Page Transition */
        .page-transition {
            animation: pageFadeIn 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        @keyframes pageFadeIn {
            0% {
                opacity: 0;
                transform: translateY(20px);
            }
            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Container */
        .container {
            max-width: 1300px;
            margin: 30px auto;
            padding: 0 25px;
            animation: fadeInUp 0.6s ease;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Welcome Page Style */
        .welcome-section {
            text-align: center;
            padding: 60px 20px 40px;
            animation: fadeInScale 0.7s ease;
        }

        @keyframes fadeInScale {
            0% {
                opacity: 0;
                transform: scale(0.95);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }

        .welcome-section h1 {
            font-size: 55px;
            font-weight: 800;
            background: linear-gradient(135deg, #6c5ce7 0%, #a8a4e6 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            margin-bottom: 20px;
        }

        .welcome-section p {
            font-size: 18px;
            color: #6a7c8f;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }

        /* Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin: 50px 0;
        }

        .stat-card {
            background: white;
            border-radius: 25px;
            padding: 30px 20px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.03);
            border: 1px solid rgba(108, 92, 231, 0.1);
            cursor: pointer;
            animation: cardFadeIn 0.6s ease backwards;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }

        @keyframes cardFadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(108, 92, 231, 0.12);
            border-color: rgba(108, 92, 231, 0.3);
        }

        .stat-card i {
            font-size: 45px;
            color: #6c5ce7;
            margin-bottom: 15px;
            transition: transform 0.3s ease;
        }

        .stat-card:hover i {
            transform: scale(1.1);
        }

        .stat-card h3 {
            font-size: 14px;
            color: #8b9cb0;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .stat-card .number {
            font-size: 42px;
            font-weight: 700;
            color: #2d3e50;
        }

        /* Table Card */
        .table-card {
            background: white;
            border-radius: 25px;
            padding: 30px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
            margin-top: 20px;
            transition: all 0.3s ease;
        }

        .table-card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.08);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            padding-bottom: 15px;
            border-bottom: 2px solid #f0f2f5;
        }

        .card-header h2 {
            font-size: 20px;
            font-weight: 600;
            color: #2d3e50;
        }

        .card-header h2 i {
            color: #6c5ce7;
            margin-right: 10px;
        }

        /* Table Style */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            text-align: left;
            padding: 15px 12px;
            background: #f8f9fc;
            color: #5a6e7a;
            font-weight: 600;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #f0f2f5;
            color: #4a627a;
            transition: all 0.3s ease;
        }

        tr:hover td {
            background: #fafbfe;
            transform: translateX(5px);
        }

        /* Buttons */
        .btn-add {
            background: #6c5ce7;
            color: white;
            padding: 10px 22px;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            font-size: 14px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: none;
            cursor: pointer;
        }

        .btn-add:hover {
            background: #5b4bc4;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
        }

        .btn-add:active {
            transform: translateY(0);
        }

        .btn-edit {
            background: #00b894;
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-delete {
            background: #ff7675;
            color: white;
            padding: 6px 14px;
            border-radius: 20px;
            border: none;
            cursor: pointer;
            font-size: 12px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 5px;
        }

        .btn-edit:hover, .btn-delete:hover {
            transform: translateY(-2px);
            filter: brightness(0.95);
        }

        .btn-edit:active, .btn-delete:active {
            transform: translateY(0);
        }

        .btn-back {
            background: #dfe6e9;
            color: #636e72;
            padding: 10px 20px;
            border-radius: 50px;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            margin-top: 20px;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-back:hover {
            background: #b2bec3;
            color: white;
            transform: translateX(-5px);
        }

        /* Form Style */
        .form-container {
            max-width: 550px;
            margin: 0 auto;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: #2d3e50;
            font-size: 14px;
        }

        input, select, textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1.5px solid #e2e8f0;
            border-radius: 15px;
            font-size: 14px;
            transition: all 0.3s ease;
            font-family: 'Poppins', sans-serif;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #6c5ce7;
            box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.1);
            transform: translateY(-2px);
        }

        button[type="submit"] {
            background: #6c5ce7;
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            width: 100%;
            font-size: 15px;
        }

        button[type="submit"]:hover {
            background: #5b4bc4;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(108, 92, 231, 0.3);
        }

        button[type="submit"]:active {
            transform: translateY(0);
        }

        /* Alert */
        .alert-success {
            background: #d4fcda;
            color: #219a52;
            padding: 14px 20px;
            border-radius: 15px;
            margin-bottom: 25px;
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            animation: slideInRight 0.5s ease;
        }

        @keyframes slideInRight {
            from {
                opacity: 0;
                transform: translateX(-30px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        /* Loading Spinner for Page Transition */
        .loading {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(255, 255, 255, 0.9);
            z-index: 9999;
            display: flex;
            justify-content: center;
            align-items: center;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
        }

        .loading.active {
            opacity: 1;
            visibility: visible;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #f0f2f5;
            border-top-color: #6c5ce7;
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }

        @keyframes spin {
            to { transform: rotate(360deg); }
        }

        /* Responsive */
        @media (max-width: 768px) {
            .navbar {
                margin: 15px;
                border-radius: 40px;
            }
            
            .nav-link {
                padding: 8px 18px;
                font-size: 13px;
            }
            
            .nav-link i {
                display: none;
            }
            
            .welcome-section h1 {
                font-size: 32px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
                gap: 15px;
            }
            
            .table-card {
                padding: 20px;
                overflow-x: auto;
            }
            
            table {
                font-size: 12px;
                min-width: 500px;
            }
        }
    </style>
</head>
<body>

<!-- Loading Spinner -->
<div class="loading" id="loading">
    <div class="spinner"></div>
</div>

<!-- Navbar -->
<div class="navbar">
    <div class="nav-container">
        <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}" data-page="home">
            <i class="fas fa-home"></i> Home
        </a>
        <a href="{{ route('produk.index') }}" class="nav-link {{ request()->routeIs('produk*') ? 'active' : '' }}" data-page="produk">
            <i class="fas fa-box"></i> Produk
        </a>
        <a href="{{ route('sales.index') }}" class="nav-link {{ request()->routeIs('sales*') ? 'active' : '' }}" data-page="sales">
            <i class="fas fa-chart-line"></i> Sales
        </a>
        <a href="{{ route('customer.index') }}" class="nav-link {{ request()->routeIs('customer*') ? 'active' : '' }}" data-page="customer">
            <i class="fas fa-users"></i> Customer
        </a>
    </div>
</div>

<div class="container" id="main-content">
    @if(session('success'))
        <div class="alert-success">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    @yield('content')
</div>

<script>
    // Smooth Page Transition
    document.addEventListener('DOMContentLoaded', function() {
        const links = document.querySelectorAll('.nav-link');
        const loading = document.getElementById('loading');
        const mainContent = document.getElementById('main-content');
        
        links.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const url = this.getAttribute('href');
                
                // Show loading spinner
                loading.classList.add('active');
                
                // Fade out content
                mainContent.style.animation = 'fadeOut 0.3s ease';
                
                setTimeout(() => {
                    // Navigate to new page
                    window.location.href = url;
                }, 300);
            });
        });
        
        // Add fade in animation to content
        mainContent.style.animation = 'fadeInUp 0.6s ease';
        
        // Add ripple effect to all buttons
        const buttons = document.querySelectorAll('.btn-add, .btn-edit, .btn-delete, button[type="submit"]');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                let ripple = document.createElement('span');
                ripple.classList.add('ripple');
                this.appendChild(ripple);
                
                let x = e.clientX - e.target.offsetLeft;
                let y = e.clientY - e.target.offsetTop;
                
                ripple.style.left = `${x}px`;
                ripple.style.top = `${y}px`;
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });
    });
    
    // Add fadeOut animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes fadeOut {
            from {
                opacity: 1;
                transform: translateY(0);
            }
            to {
                opacity: 0;
                transform: translateY(-20px);
            }
        }
        
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.7);
            width: 100px;
            height: 100px;
            margin-top: -50px;
            margin-left: -50px;
            animation: ripple 0.6s linear;
            pointer-events: none;
        }
        
        @keyframes ripple {
            0% {
                transform: scale(0);
                opacity: 1;
            }
            100% {
                transform: scale(4);
                opacity: 0;
            }
        }
        
        .btn-add, .btn-edit, .btn-delete, button[type="submit"] {
            position: relative;
            overflow: hidden;
        }
    `;
    document.head.appendChild(style);
</script>

</body>
</html>