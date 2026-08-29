import { createRouter, createWebHistory } from 'vue-router'

const routes = [
    {
        path: '/',
        redirect: '/login'
    },

    // Auth
    {
        path: '/login',
        name: 'login',
        component: () => import('../views/auth/Login.vue')
    },

    {
        path: '/register',
        name: 'register',
        component: () => import('../views/auth/Register.vue')
    },

    // Passenger
    {
        path: '/passenger/dashboard',
        name: 'passenger.dashboard',
        component: () => import('../views/passenger/Dashboard.vue')
    },

    {
        path: '/passenger/trajets',
        name: 'passenger.trajets',
        component: () => import('../views/passenger/Trajets.vue')
    },

    {
        path: '/passenger/reservations',
        name: 'passenger.reservations',
        component: () => import('../views/passenger/Reservations.vue')
    },

    {
        path: '/passenger/profile',
        name: 'passenger.profile',
        component: () => import('../views/passenger/Profile.vue')
    },

    // Driver
    {
        path: '/driver/dashboard',
        name: 'driver.dashboard',
        component: () => import('../views/driver/Dashboard.vue')
    },

    {
        path: '/driver/trajets',
        name: 'driver.trajets',
        component: () => import('../views/driver/MyTrajets.vue')
    },

    {
        path: '/driver/trajets/create',
        name: 'driver.trajets.create',
        component: () => import('../views/driver/CreateTrajet.vue')
    },

    {
        path: '/driver/profile',
        name: 'driver.profile',
        component: () => import('../views/driver/Profile.vue')
    },

    // Admin
    {
        path: '/admin/dashboard',
        name: 'admin.dashboard',
        component: () => import('../views/admin/Dashboard.vue')
    },

    {
        path: '/admin/users',
        name: 'admin.users',
        component: () => import('../views/admin/Users.vue')
    },

    {
        path: '/admin/trajets',
        name: 'admin.trajets',
        component: () => import('../views/admin/Trajets.vue')
    },

    {
        path: '/admin/reservations',
        name: 'admin.reservations',
        component: () => import('../views/admin/Reservations.vue')
    }
]

const router = createRouter({
    history: createWebHistory(),
    routes
})

export default router