/**
* Theme: Adminox - Responsive Bootstrap 5 Admin Dashboard
* Author: Coderthemes
* Module/App: Theme Config Js
*/

(function () {
    var savedConfig = sessionStorage.getItem("__ADMINOX_CONFIG__");
    // var savedConfig = localStorage.getItem("__ADMINOX_CONFIG__");

    var html = document.getElementsByTagName("html")[0];

    //  Default Config Value
    var defaultConfig = {
        theme: "light",

        layout: {
            mode: "fluid",
        },

        topbar: {
            color: "brand",
        },

        menu: {
            color: "dark",
        },

        // This option for only vertical (left Sidebar) layout
        sidenav: {
            size: "default",
        },
    };

    this.html = document.getElementsByTagName('html')[0];

    config = Object.assign(JSON.parse(JSON.stringify(defaultConfig)), {});

    config.theme = html.getAttribute('data-bs-theme') || defaultConfig.theme;
    config.layout.mode = html.getAttribute('data-layout-mode') || defaultConfig.layout.mode;
    config.topbar.color = html.getAttribute('data-topbar-color') || defaultConfig.topbar.color;
    config.sidenav.size = html.getAttribute('data-sidenav-size') || defaultConfig.sidenav.size;
    config.menu.color = html.getAttribute('data-menu-color') || defaultConfig.menu.color;

    window.defaultConfig = JSON.parse(JSON.stringify(config));

    if (savedConfig !== null) {
        config = JSON.parse(savedConfig);
    }

    window.config = config;

    if (config) {

        if (window.innerWidth <= 1199) {
            html.setAttribute("data-sidenav-size", "full");
        } else {
            html.setAttribute("data-sidenav-size", config.sidenav.size);
        }

        html.setAttribute("data-bs-theme", config.theme);
        html.setAttribute("data-menu-color", config.menu.color);
        html.setAttribute("data-topbar-color", config.topbar.color);
        html.setAttribute("data-layout-mode", config.layout.mode);
    }
})();