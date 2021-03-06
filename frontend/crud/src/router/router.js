import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export default new Router({
    mode : "history",
    routes : [
        {
            path: "/",
            component: () => import("../components/CreateClient")
        },
        {
            path: "/showall",
            component: () => import("../components/Client")
        },
        {
            path: '/clientdetail/:id',
            component: () => import("../components/ClientDetail")
        }
    ]
});