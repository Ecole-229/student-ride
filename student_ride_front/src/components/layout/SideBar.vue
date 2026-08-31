<template>
    <aside class="sidebar">

        <div class="logo">
            <div class="logo-icon">
                <Car :size="22" />
            </div>

            <span>Student-Ride</span>
        </div>

        <nav class="navigation">

            <p class="section-title">MENU</p>

            <RouterLink
                to="/passenger/dashboard"
                class="nav-item"
            >
                <LayoutDashboard :size="20" />
                <span>Dashboard</span>
            </RouterLink>

            <RouterLink
                to="/passenger/trajets"
                class="nav-item"
            >
                <MapPin :size="20" />
                <span>Trajets</span>
            </RouterLink>

            <RouterLink
                to="/passenger/reservations"
                class="nav-item"
            >
                <Ticket :size="20" />
                <span>Réservations</span>
            </RouterLink>

            <p class="section-title">COMPTE</p>

            <RouterLink
                to="/passenger/profile"
                class="nav-item"
            >
                <User :size="20" />
                <span>Mon profil</span>
            </RouterLink>

        </nav>

        <div class="sidebar-bottom">

            <button class="logout">
                <LogOut :size="20" />
                <span>Déconnexion</span>
            </button>

        </div>

    </aside>
</template>

<script setup>
import {
    Car,
    LayoutDashboard,
    MapPin,
    Ticket,
    User,
    LogOut
} from 'lucide-vue-next'
</script>

<style scoped>
.sidebar {
    width: 250px;
    height: 100vh;

    position: fixed;
    left: 0;
    top: 0;

    display: flex;
    flex-direction: column;

    background: var(--surface);
    border-right: 1px solid var(--border);
}

.logo {
    height: 72px;
    padding: 0 24px;

    display: flex;
    align-items: center;
    gap: 10px;

    font-size: 18px;
    font-weight: 700;
}

.logo-icon {
    width: 38px;
    height: 38px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 10px;

    background: var(--primary);
    color: white;
}

.navigation {
    flex: 1;
    padding: 24px 12px;
}

.section-title {
    padding: 0 12px;
    margin: 18px 0 8px;

    font-size: 11px;
    font-weight: 700;
    color: var(--text-light);
    letter-spacing: 0.08em;
}

.nav-item {
    display: flex;
    align-items: center;
    gap: 12px;

    padding: 11px 12px;
    margin-bottom: 4px;

    border-radius: 10px;

    color: var(--text-secondary);
    font-size: 14px;
    font-weight: 500;

    transition: 0.2s;
}

.nav-item:hover {
    background: var(--background);
    color: var(--text);
}

.nav-item.router-link-active {
    background: var(--primary-light);
    color: var(--primary);
    font-weight: 600;
}

.sidebar-bottom {
    padding: 16px;
    border-top: 1px solid var(--border);
}

.logout {
    width: 100%;

    display: flex;
    align-items: center;
    gap: 12px;

    padding: 11px 12px;

    border: none;
    border-radius: 10px;

    background: transparent;
    color: var(--text-secondary);

    text-align: left;
}

.logout:hover {
    background: #fef2f2;
    color: var(--danger);
}
</style>