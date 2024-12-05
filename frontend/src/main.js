import { createApp } from 'vue';
import App from './App.vue';
import router from './router';
import Toaster from "@meforma/vue-toaster";
import Client from './Layout/Wrapper/MasterClient.vue';
import Auth from './Layout/Wrapper/AuthClient.vue';
import Default from './Layout/Wrapper/MasterRocker.vue';
import Admin from './Layout/Wrapper/MasterAdmin.vue';
import AuthAdmin from './Layout/Wrapper/AuthAdmin.vue';

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