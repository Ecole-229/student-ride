import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),

    routes: [


        {
            path: "/",
            redirect: "/passenger/dashboard",
        },



        {
            path: "/passenger",
            component: () => import("../layouts/PassengerLayout.vue"),

            children: [

                {
                    path: "dashboard",
                    name: "passenger.dashboard",
                    component: () => import("../views/passenger/Dashboard.vue"),
                },

                {
                    path: "trajets",
                    name: "passenger.trajets",
                    component: () => import("../views/passenger/Trajets.vue"),
                },

                {
                    path: "trajets/:id",
                    name: "passenger.trajet.details",
                    component: () => import("../views/passenger/TrajetsDetails.vue"),
                },

                {
                    path: "reservations/create/:trajetId",
                    name: "passenger.reservation.create",
                    component: () => import("../views/passenger/Reservation.vue"),
                },

                {
                    path: "reservations",
                    name: "passenger.reservations",
                    component: () => import("../views/passenger/Reservations.vue"),
                },

                {
                    path: "reservations/:id",
                    name: "passenger.reservation.details",
                    component: () => import("../views/passenger/ReservationDetails.vue"),
                },

                {
                    path: "tracking/:id",
                    name: "passenger.tracking",
                    component: () => import("../views/passenger/Tracking.vue"),
                },

                {
                    path: "profile",
                    name: "passenger.profile",
                    component: () => import("../views/passenger/Profile.vue"),
                },

            ],
        },


        // =========================
        // CHAUFFEUR
        // =========================

        {
            path: "/driver",
            component: () => import("../layouts/DriverLayout.vue"),

            children: [

                {
                    path: "dashboard",
                    name: "driver.dashboard",
                    component: () => import("../views/driver/Dashboard.vue"),
                },

                {
                    path: "trajets",
                    name: "driver.trajets",
                    component: () => import("../views/driver/MyTrajets.vue"),
                },

                {
                    path: "trajets/create",
                    name: "driver.trajets.create",
                    component: () => import("../views/driver/CreateTrajet.vue"),
                },

                {
                    path: "trajets/:id",
                    name: "driver.trajet.details",
                    component: () => import("../views/driver/TrajetDetails.vue"),
                },

                {
                    path: "trajets/:id/edit",
                    name: "driver.trajet.edit",
                    component: () => import("../views/driver/EditTrajet.vue"),
                },

                {
                    path: "trajets/:id/passengers",
                    name: "driver.trajet.passengers",
                    component: () => import("../views/driver/Passengers.vue"),
                },

                {
                    path: "tracking/:id",
                    name: "driver.tracking",
                    component: () => import("../views/driver/Tracking.vue"),
                },

                {
                    path: "profile",
                    name: "driver.profile",
                    component: () => import("../views/driver/Profile.vue"),
                },

            ],
        },


        {
            path: "/admin",
            component: () => import("../layouts/AdminLayout.vue"),

            children: [

                {
                    path: "dashboard",
                    name: "admin.dashboard",
                    component: () => import("../views/admin/Dashboard.vue"),
                },

                {
                    path: "users",
                    name: "admin.users",
                    component: () => import("../views/admin/Users.vue"),
                },

                {
                    path: "users/:id",
                    name: "admin.user.details",
                    component: () => import("../views/admin/UserDetails.vue"),
                },

                {
                    path: "trajets",
                    name: "admin.trajets",
                    component: () => import("../views/admin/Trajets.vue"),
                },

                {
                    path: "trajets/:id",
                    name: "admin.trajet.details",
                    component: () => import("../views/admin/TrajetDetails.vue"),
                },

                {
                    path: "reservations",
                    name: "admin.reservations",
                    component: () => import("../views/admin/Reservations.vue"),
                },

                {
                    path: "settings",
                    name: "admin.settings",
                    component: () => import("../views/admin/Settings.vue"),
                },

            ],
        },

    ],
});

export default router;