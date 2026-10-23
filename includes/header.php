<!-- Topo da página com a logo e o menu para ir para o site -->
<style>
    .site-header {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 12px 30px;
        border-bottom: 2px solid #f8c1d9;
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow: 0 4px 20px rgba(214, 51, 132, 0.12);
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .logo-brand {
        text-decoration: none;
        color: #d63384;
        font-weight: 700;
        font-size: 1.35rem;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .nav-menu ul {
        display: flex;
        flex-direction: row;
        list-style: none;
        margin: 0;
        padding: 0;
        gap: 20px;
        align-items: center;
    }

    .nav-link {
        text-decoration: none;
        color: #d63384;
        font-weight: 600;
        font-size: 0.95rem;
        padding: 6px 12px;
        border-radius: 20px;
        transition: all 0.2s ease;
    }

    .nav-link:hover {
        background-color: rgba(214, 51, 132, 0.08);
    }

    .btn-nav-sair {
        background: #dc3545 !important;
        color: white !important;
        padding: 6px 14px;
        border-radius: 20px;
        text-decoration: none;
        font-weight: 600;
    }

    .btn-nav-sair:hover {
        background: #bb2d3b !important;
    }
</style>

<header class="site-header">
    <a href="../app/select_w.php" class="logo-brand">
        🌸 Girl Power
    </a>

    <nav class="nav-menu">
        <ul>
            <li><a href="/projetointregado/app/select_w.php" class="nav-link">Início</a></li>
            <li><a href="/projetointregado/app/equipamentos.php" class="nav-link">Equipamentos</a></li>
            <li><a href="/projetointregado/app/update.php" class="nav-link">Agendar Personal</a></li>
            <li><a href="/projetointregado/login/logout.php" class="btn-nav-sair">Sair</a></li>
        </ul>
    </nav>
</header>