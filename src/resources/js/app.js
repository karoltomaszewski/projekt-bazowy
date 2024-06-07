import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import { ZiggyVue } from 'ziggy-js';
import axios from "axios";

createInertiaApp({
    resolve: name => {
        const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
        return pages[`./Pages/${name}.vue`]
    },
    setup({ el, App, props, plugin }) {
        const app = createApp({ render: () => h(App, props) });

        app.config.globalProperties.$hasAccess = function(permission) {
            return this.$page.props.permissions.includes(permission);
        };

        app.config.globalProperties.$get = function(url, config) {
            return axios.get(url, config);
        }

        app.config.globalProperties.$post = function(url, data, config) {
            return axios.post(url, data, config);
        }

        app.config.globalProperties.$formatDate = function(date) {
            const d = new Date(date);
            let month = '' + (d.getMonth() + 1);
            let day = '' + d.getDate();
            let year = d.getFullYear();
            let hours = '' + d.getHours();
            let minutes = '' + d.getMinutes();
            let seconds = '' + d.getSeconds();

            if (month.length < 2)
                month = '0' + month;
            if (day.length < 2)
                day = '0' + day;
            if (hours.length < 2)
                hours = '0' + hours;
            if (minutes.length < 2)
                minutes = '0' + minutes;
            if (seconds.length < 2)
                seconds = '0' + seconds;


            return [year, month, day].join('-') + ' ' + [hours, minutes, seconds].join(':');
        }

        app.use(plugin)
            .use(ZiggyVue)
            .mount(el)
    },
})
