import "./bootstrap";
import "../css/app.css";

import { createApp, h } from "vue";
import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { ZiggyVue } from "../../vendor/tightenco/ziggy";

// FontAwesome
import { library } from "@fortawesome/fontawesome-svg-core";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import {
    faSort,
    faSortUp,
    faSortDown,
} from "@fortawesome/free-solid-svg-icons";

// Add icons to the library
library.add(faSort, faSortUp, faSortDown);

const appName = import.meta.env.VITE_APP_NAME || "Laravel";

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) =>
        resolvePageComponent(
            `./Pages/${name}.vue`,
            import.meta.glob("./Pages/**/*.vue"),
        ),
    setup({ el, App, props, plugin }) {
        return createApp({ render: () => h(App, props) })
            .use(plugin)
            .component("font-awesome-icon", FontAwesomeIcon)
            .use(ZiggyVue)
            .mount(el);
    },
    progress: {
        color: "#4B5563",
    },
});
