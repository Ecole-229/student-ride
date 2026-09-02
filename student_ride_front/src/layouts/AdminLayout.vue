<template>
    <div class="admin-layout">

        <!-- SIDEBAR -->
        <aside class="sidebar">

            <div class="logo">
                <div class="logo-icon">S</div>

                <div>
                    <strong>Student-Ride</strong>
                    <span>ADMINISTRATION</span>
                </div>
            </div>


            <nav>

                <p class="menu-title">MENU PRINCIPAL</p>

                <RouterLink to="/admin/dashboard" class="nav-link">
                    <span>▦</span>
                    Dashboard
                </RouterLink>

                <RouterLink to="/admin/users" class="nav-link">
                    <span>👥</span>
                    Utilisateurs
                </RouterLink>

                <RouterLink to="/admin/trajets" class="nav-link">
                    <span>🚗</span>
                    Trajets
                </RouterLink>

                <RouterLink to="/admin/reservations" class="nav-link">
                    <span>🎫</span>
                    Réservations
                </RouterLink>


                <p class="menu-title">CONFIGURATION</p>

                <RouterLink to="/admin/settings" class="nav-link">
                    <span>⚙</span>
                    Paramètres
                </RouterLink>

            </nav>


            <div class="sidebar-bottom">

                <div class="admin-mini">

                    <div class="avatar">
                        A
                    </div>

                    <div>
                        <strong>Administrateur</strong>
                        <span>Super Admin</span>
                    </div>

                </div>

                <button class="logout" @click="logout">
                    ↪ Déconnexion
                </button>

            </div>

        </aside>


        <!-- MAIN -->
        <div class="main">

            <!-- TOPBAR -->
            <header class="topbar">

                <div class="mobile-logo">
                    Student-Ride
                </div>

                <div class="topbar-right">

                    <button class="notification">
                        🔔
                        <span></span>
                    </button>

                    <div class="user">

                        <div class="avatar small">
                            A
                        </div>

                        <div>
                            <strong>Administrateur</strong>
                            <small>Super Admin</small>
                        </div>

                    </div>

                </div>

            </header>


            <main class="content">

                <RouterView />

            </main>

        </div>

    </div>
</template>


<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

const logout = () => {
    localStorage.removeItem('user')
    localStorage.removeItem('token')

    router.push('/login')
}
</script>

<style scoped>
* {
    box-sizing: border-box;
}

.admin-layout {
    min-height: 100vh;
    display: flex;
    background: #f8fafc;
    color: #0f172a;
}


/* SIDEBAR */

.sidebar {
    position: fixed;
    top: 0;
    left: 0;

    width: 245px;
    height: 100vh;

    display: flex;
    flex-direction: column;

    padding: 22px 15px;

    background: white;
    border-right: 1px solid #e2e8f0;
}


/* LOGO */

.logo {
    display: flex;
    align-items: center;
    gap: 10px;

    padding: 5px 8px 25px;

    border-bottom: 1px solid #e2e8f0;
}

.logo-icon {
    width: 34px;
    height: 34px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 9px;

    background: #2563eb;
    color: white;

    font-weight: 800;
}

.logo strong {
    display: block;
    font-size: 14px;
}

.logo span {
    display: block;

    margin-top: 2px;

    color: #64748b;

    font-size: 8px;
    font-weight: 700;
    letter-spacing: 1px;
}


/* NAVIGATION */

nav {
    flex: 1;
    padding-top: 20px;
}

.menu-title {
    margin: 18px 10px 8px;

    color: #94a3b8;

    font-size: 9px;
    font-weight: 700;
    letter-spacing: .8px;
}

.nav-link {
    display: flex;
    align-items: center;
    gap: 11px;

    margin-bottom: 4px;
    padding: 11px 12px;

    border-radius: 8px;

    color: #64748b;

    font-size: 12px;
    text-decoration: none;

    transition: .2s;
}

.nav-link span {
    width: 20px;
    text-align: center;
}

.nav-link:hover {
    background: #eff6ff;
    color: #2563eb;
}

.nav-link.router-link-active {
    background: #eff6ff;
    color: #2563eb;
    font-weight: 600;
}


/* BOTTOM */

.sidebar-bottom {
    padding-top: 15px;
    border-top: 1px solid #e2e8f0;
}

.admin-mini {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 8px;
}

.avatar {
    width: 35px;
    height: 35px;

    display: flex;
    align-items: center;
    justify-content: center;

    border-radius: 50%;

    background: #dbeafe;
    color: #2563eb;

    font-size: 13px;
    font-weight: 700;
}

.admin-mini strong {
    display: block;
    font-size: 11px;
}

.admin-mini span {
    display: block;

    margin-top: 2px;

    color: #94a3b8;

    font-size: 9px;
}

.logout {
    width: 100%;

    margin-top: 8px;
    padding: 9px;

    border: none;
    border-radius: 7px;

    background: transparent;

    color: #ef4444;

    text-align: left;

    font-size: 11px;

    cursor: pointer;
}

.logout:hover {
    background: #fef2f2;
}


/* MAIN */

.main {
    width: calc(100% - 245px);
    margin-left: 245px;
}


/* TOPBAR */

.topbar {
    height: 65px;

    display: flex;
    align-items: center;
    justify-content: flex-end;

    padding: 0 30px;

    background: white;
    border-bottom: 1px solid #e2e8f0;
}

.topbar-right {
    display: flex;
    align-items: center;
    gap: 22px;
}

.notification {
    position: relative;

    border: none;
    background: transparent;

    font-size: 17px;

    cursor: pointer;
}

.notification span {
    position: absolute;

    top: 0;
    right: 0;

    width: 6px;
    height: 6px;

    border-radius: 50%;
    background: #ef4444;
}

.user {
    display: flex;
    align-items: center;
    gap: 9px;
}

.avatar.small {
    width: 32px;
    height: 32px;

    font-size: 11px;
}

.user strong {
    display: block;
    font-size: 11px;
}

.user small {
    display: block;

    margin-top: 2px;

    color: #94a3b8;

    font-size: 9px;
}


/* CONTENT */

.content {
    min-height: calc(100vh - 65px);
    padding: 30px;
}

.mobile-logo {
    display: none;
}


/* RESPONSIVE */

@media(max-width: 650px) {

    .sidebar {
        display: none;
    }

    .main {
        width: 100%;
        margin-left: 0;
    }

    .topbar {
        justify-content: space-between;
        padding: 0 18px;
    }

    .mobile-logo {
        display: block;

        color: #2563eb;

        font-size: 14px;
        font-weight: 800;
    }

    .user div:last-child {
        display: none;
    }

    .content {
        padding: 20px;
    }
}
</style>