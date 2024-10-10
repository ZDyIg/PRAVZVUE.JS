import { createApp } from "vue";
import App from "./App.vue";
import { createCoreUI } from "@coreui/vue";
import "@coreui/icons-pro/dist/css/coreui-icons.min.css";

const vueApp = createApp(App);
vueApp.use(createCoreUI());
vueApp.mount("#app");

const express = require("express");
const path = require("path");

const serverApp = express();
const PORT = process.env.PORT || 3000;

// Servir archivos estáticos desde la carpeta 'public'
serverApp.use(express.static(path.join(__dirname, "public")));

serverApp.get("/", (req, res) => {
  res.sendFile(path.join(__dirname, "public", "index.html"));
});

serverApp.listen(PORT, () => {
  console.log(`Servidor escuchando en http://localhost:${PORT}`);
});
