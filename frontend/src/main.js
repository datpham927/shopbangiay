import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import Toaster from "@meforma/vue-toaster";
import Client from '@/layout/wrapper/MasterClient.vue';
import Auth from '@/layout/wrapper/AuthClient.vue';
import Default from '@/layout/wrapper/MasterRocker.vue';
import Admin from '@/layout/wrapper/MasterAdmin.vue';
import AuthAdmin from '@/layout/wrapper/AuthAdmin.vue';


const app = createApp(App);

app.use(router);
app.use(Toaster);

const layouts = {
    'client-layout': Client,
    'auth-layout': Auth,
    'default-layout': Default,
    'admin-layout': Admin,
    'authadmin-layout': AuthAdmin,
};

Object.entries(layouts).forEach(([name, component]) => {
    app.component(name, component);
});

app.mount("#app");