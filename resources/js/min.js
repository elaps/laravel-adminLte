document.addEventListener('livewire:navigated', () => {
    for (const callback of domContentLoadedCallbacks) {
        callback();
    }
})


const DATA_KEY$4 = 'lte.push-menu';
const EVENT_KEY$4 = `.${DATA_KEY$4}`;
const EVENT_OPEN = `open${EVENT_KEY$4}`;
const EVENT_COLLAPSE = `collapse${EVENT_KEY$4}`;
const CLASS_NAME_SIDEBAR_MINI = 'sidebar-mini';
const CLASS_NAME_SIDEBAR_COLLAPSE = 'sidebar-collapse';
const CLASS_NAME_SIDEBAR_OPEN = 'sidebar-open';
const CLASS_NAME_SIDEBAR_EXPAND = 'sidebar-expand';
const CLASS_NAME_SIDEBAR_OVERLAY = 'sidebar-overlay';
const CLASS_NAME_MENU_OPEN$1 = 'menu-open';
const SELECTOR_APP_SIDEBAR = '.app-sidebar';
const SELECTOR_SIDEBAR_MENU = '.sidebar-menu';
const SELECTOR_NAV_ITEM$1 = '.nav-item';
const SELECTOR_NAV_TREEVIEW = '.nav-treeview';
const SELECTOR_APP_WRAPPER = '.app-wrapper';
const SELECTOR_SIDEBAR_EXPAND = `[class*="${CLASS_NAME_SIDEBAR_EXPAND}"]`;
const SELECTOR_SIDEBAR_TOGGLE = '[data-lte-toggle="sidebar"]';
const Defaults = {
    sidebarBreakpoint: 992
};

const domContentLoadedCallbacks = [];
const reloadCallbacks = [];

const onDOMContentLoaded = (callback) => {
    domContentLoadedCallbacks.push(callback);
};

/* SLIDE UP */
const slideUp = (target, duration = 500) => {
    target.style.transitionProperty = 'height, margin, padding';
    target.style.transitionDuration = `${duration}ms`;
    target.style.boxSizing = 'border-box';
    target.style.height = `${target.offsetHeight}px`;
    target.style.overflow = 'hidden';
    window.setTimeout(() => {
        target.style.height = '0';
        target.style.paddingTop = '0';
        target.style.paddingBottom = '0';
        target.style.marginTop = '0';
        target.style.marginBottom = '0';
    }, 1);
    window.setTimeout(() => {
        target.style.display = 'none';
        target.style.removeProperty('height');
        target.style.removeProperty('padding-top');
        target.style.removeProperty('padding-bottom');
        target.style.removeProperty('margin-top');
        target.style.removeProperty('margin-bottom');
        target.style.removeProperty('overflow');
        target.style.removeProperty('transition-duration');
        target.style.removeProperty('transition-property');
    }, duration);
};
/* SLIDE DOWN */
const slideDown = (target, duration = 500) => {
    target.style.removeProperty('display');
    let { display } = window.getComputedStyle(target);
    if (display === 'none') {
        display = 'block';
    }
    target.style.display = display;
    const height = target.offsetHeight;
    target.style.overflow = 'hidden';
    target.style.height = '0';
    target.style.paddingTop = '0';
    target.style.paddingBottom = '0';
    target.style.marginTop = '0';
    target.style.marginBottom = '0';
    window.setTimeout(() => {
        target.style.boxSizing = 'border-box';
        target.style.transitionProperty = 'height, margin, padding';
        target.style.transitionDuration = `${duration}ms`;
        target.style.height = `${height}px`;
        target.style.removeProperty('padding-top');
        target.style.removeProperty('padding-bottom');
        target.style.removeProperty('margin-top');
        target.style.removeProperty('margin-bottom');
    }, 1);
    window.setTimeout(() => {
        target.style.removeProperty('height');
        target.style.removeProperty('overflow');
        target.style.removeProperty('transition-duration');
        target.style.removeProperty('transition-property');
    }, duration);
};


class PushMenu {
    constructor(element, config) {
        this._element = element;
        this._config = Object.assign(Object.assign({}, Defaults), config);
    }

    // TODO
    menusClose() {
        const navTreeview = document.querySelectorAll(SELECTOR_NAV_TREEVIEW);
        navTreeview.forEach(navTree => {
            navTree.style.removeProperty('display');
            navTree.style.removeProperty('height');
        });
        const navSidebar = document.querySelector(SELECTOR_SIDEBAR_MENU);
        const navItem = navSidebar === null || navSidebar === void 0 ? void 0 : navSidebar.querySelectorAll(SELECTOR_NAV_ITEM$1);
        if (navItem) {
            navItem.forEach(navI => {
                navI.classList.remove(CLASS_NAME_MENU_OPEN$1);
            });
        }
    }

    expand() {
        const event = new Event(EVENT_OPEN);
        document.body.classList.remove(CLASS_NAME_SIDEBAR_COLLAPSE);
        document.body.classList.add(CLASS_NAME_SIDEBAR_OPEN);
        this._element.dispatchEvent(event);
    }

    collapse() {
        const event = new Event(EVENT_COLLAPSE);
        document.body.classList.remove(CLASS_NAME_SIDEBAR_OPEN);
        document.body.classList.add(CLASS_NAME_SIDEBAR_COLLAPSE);
        this._element.dispatchEvent(event);
    }

    addSidebarBreakPoint() {
        var _a, _b, _c;
        const sidebarExpandList = (_b = (_a = document.querySelector(SELECTOR_SIDEBAR_EXPAND)) === null || _a === void 0 ? void 0 : _a.classList) !== null && _b !== void 0 ? _b : [];
        const sidebarExpand = (_c = Array.from(sidebarExpandList).find(className => className.startsWith(CLASS_NAME_SIDEBAR_EXPAND))) !== null && _c !== void 0 ? _c : '';
        const sidebar = document.getElementsByClassName(sidebarExpand)[0];
        const sidebarContent = window.getComputedStyle(sidebar, '::before').getPropertyValue('content');
        this._config = Object.assign(Object.assign({}, this._config), {sidebarBreakpoint: Number(sidebarContent.replace(/[^\d.-]/g, ''))});
        if (window.innerWidth <= this._config.sidebarBreakpoint) {
            this.collapse();
        } else {
            if (!document.body.classList.contains(CLASS_NAME_SIDEBAR_MINI)) {
                this.expand();
            }
            if (document.body.classList.contains(CLASS_NAME_SIDEBAR_MINI) && document.body.classList.contains(CLASS_NAME_SIDEBAR_COLLAPSE)) {
                this.collapse();
            }
        }
    }

    toggle() {
        if (document.body.classList.contains(CLASS_NAME_SIDEBAR_COLLAPSE)) {
            this.expand();
        } else {
            this.collapse();
        }
    }

    init() {
        this.addSidebarBreakPoint();
    }
}

onDOMContentLoaded(() => {
    var _a;
    const sidebar = document === null || document === void 0 ? void 0 : document.querySelector(SELECTOR_APP_SIDEBAR);
    if (sidebar) {
        const data = new PushMenu(sidebar, Defaults);
        data.init();
        window.addEventListener('resize', () => {
            data.init();
        });
    }
    const sidebarOverlay = document.createElement('div');
    sidebarOverlay.className = CLASS_NAME_SIDEBAR_OVERLAY;
    (_a = document.querySelector(SELECTOR_APP_WRAPPER)) === null || _a === void 0 ? void 0 : _a.append(sidebarOverlay);
    sidebarOverlay.addEventListener('touchstart', event => {
        event.preventDefault();
        const target = event.currentTarget;
        const data = new PushMenu(target, Defaults);
        data.collapse();
    }, {passive: true});
    sidebarOverlay.addEventListener('click', event => {
        event.preventDefault();
        const target = event.currentTarget;
        const data = new PushMenu(target, Defaults);
        data.collapse();
    });
    const fullBtn = document.querySelectorAll(SELECTOR_SIDEBAR_TOGGLE);
    fullBtn.forEach(btn => {
        btn.addEventListener('click', event => {
            event.preventDefault();
            let button = event.currentTarget;
            if ((button === null || button === void 0 ? void 0 : button.dataset.lteToggle) !== 'sidebar') {
                button = button === null || button === void 0 ? void 0 : button.closest(SELECTOR_SIDEBAR_TOGGLE);
            }
            if (button) {
                event === null || event === void 0 ? void 0 : event.preventDefault();
                const data = new PushMenu(button, Defaults);
                data.toggle();
            }
        });
    });
});


const CLASS_NAME_HOLD_TRANSITIONS = 'hold-transition';
const CLASS_NAME_APP_LOADED = 'app-loaded';

class Layout {
    constructor(element) {
        this._element = element;
    }

    holdTransition() {
        let resizeTimer;
        window.addEventListener('resize', () => {
            document.body.classList.add(CLASS_NAME_HOLD_TRANSITIONS);
            clearTimeout(resizeTimer);
            resizeTimer = setTimeout(() => {
                document.body.classList.remove(CLASS_NAME_HOLD_TRANSITIONS);
            }, 400);
        });
    }
}

onDOMContentLoaded(() => {
    const data = new Layout(document.body);
    data.holdTransition();
    setTimeout(() => {
        document.body.classList.add(CLASS_NAME_APP_LOADED);
    }, 400);
});


const SELECTOR_SIDEBAR_WRAPPER = ".sidebar-wrapper";
const Default = {
    scrollbarTheme: "os-theme-light",
    scrollbarAutoHide: "leave",
    scrollbarClickScroll: true,
};

//DOMContentLoaded
document.addEventListener("livewire:navigated", function () {
    const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
    if (
        sidebarWrapper &&
        typeof OverlayScrollbarsGlobal?.OverlayScrollbars !== "undefined"
    ) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
                theme: Default.scrollbarTheme,
                autoHide: Default.scrollbarAutoHide,
                clickScroll: Default.scrollbarClickScroll,
            },
        });
    }
});

/**
 * --------------------------------------------
 * @file AdminLTE fullscreen.ts
 * @description Fullscreen plugin for AdminLTE.
 * @license MIT
 * --------------------------------------------
 */
/**
 * Constants
 * ============================================================================
 */
const DATA_KEY = 'lte.fullscreen';
const EVENT_KEY = `.${DATA_KEY}`;
const EVENT_MAXIMIZED = `maximized${EVENT_KEY}`;
const EVENT_MINIMIZED = `minimized${EVENT_KEY}`;
const SELECTOR_FULLSCREEN_TOGGLE = '[data-lte-toggle="fullscreen"]';
const SELECTOR_MAXIMIZE_ICON = '[data-lte-icon="maximize"]';
const SELECTOR_MINIMIZE_ICON = '[data-lte-icon="minimize"]';
/**
 * Class Definition.
 * ============================================================================
 */
class FullScreen {
    constructor(element, config) {
        this._element = element;
        this._config = config;
    }
    inFullScreen() {
        const event = new Event(EVENT_MAXIMIZED);
        const iconMaximize = document.querySelector(SELECTOR_MAXIMIZE_ICON);
        const iconMinimize = document.querySelector(SELECTOR_MINIMIZE_ICON);
        void document.documentElement.requestFullscreen();
        if (iconMaximize) {
            iconMaximize.style.display = 'none';
        }
        if (iconMinimize) {
            iconMinimize.style.display = 'block';
        }
        this._element.dispatchEvent(event);
    }
    outFullscreen() {
        const event = new Event(EVENT_MINIMIZED);
        const iconMaximize = document.querySelector(SELECTOR_MAXIMIZE_ICON);
        const iconMinimize = document.querySelector(SELECTOR_MINIMIZE_ICON);
        void document.exitFullscreen();
        if (iconMaximize) {
            iconMaximize.style.display = 'block';
        }
        if (iconMinimize) {
            iconMinimize.style.display = 'none';
        }
        this._element.dispatchEvent(event);
    }
    toggleFullScreen() {
        if (document.fullscreenEnabled) {
            if (document.fullscreenElement) {
                this.outFullscreen();
            }
            else {
                this.inFullScreen();
            }
        }
    }
}

onDOMContentLoaded(() => {
    const buttons = document.querySelectorAll(SELECTOR_FULLSCREEN_TOGGLE);
    buttons.forEach(btn => {
        btn.addEventListener('click', event => {
            event.preventDefault();
            const target = event.target;
            const button = target.closest(SELECTOR_FULLSCREEN_TOGGLE);
            if (button) {
                const data = new FullScreen(button, undefined);
                data.toggleFullScreen();
            }
        });
    });
});


// Color Mode Toggler
(() => {
    "use strict";

    const storedTheme = localStorage.getItem("theme");

    const getPreferredTheme = () => {
        if (storedTheme) {
            return storedTheme;
        }

        return window.matchMedia("(prefers-color-scheme: dark)").matches
            ? "dark"
            : "light";
    };

    const setTheme = function (theme) {
        if (
            theme === "auto" &&
            window.matchMedia("(prefers-color-scheme: dark)").matches
        ) {
            document.documentElement.setAttribute("data-bs-theme", "dark");
        } else {
            document.documentElement.setAttribute("data-bs-theme", theme);
        }
    };

    setTheme(getPreferredTheme());

    const showActiveTheme = (theme, focus = false) => {
        const themeSwitcher = document.querySelector("#bd-theme");

        if (!themeSwitcher) {
            return;
        }

        const themeSwitcherText = document.querySelector("#bd-theme-text");
        const activeThemeIcon = document.querySelector(".theme-icon-active i");
        const btnToActive = document.querySelector(
            `[data-bs-theme-value="${theme}"]`
        );
        const svgOfActiveBtn = btnToActive.querySelector("i").getAttribute("class");

        for (const element of document.querySelectorAll("[data-bs-theme-value]")) {
            element.classList.remove("active");
            element.setAttribute("aria-pressed", "false");
        }

        btnToActive.classList.add("active");
        btnToActive.setAttribute("aria-pressed", "true");
        activeThemeIcon.setAttribute("class", svgOfActiveBtn);
        const themeSwitcherLabel = `${themeSwitcherText.textContent} (${btnToActive.dataset.bsThemeValue})`;
        themeSwitcher.setAttribute("aria-label", themeSwitcherLabel);

        if (focus) {
            themeSwitcher.focus();
        }
    };

    window
        .matchMedia("(prefers-color-scheme: dark)")
        .addEventListener("change", () => {
            if (storedTheme !== "light" || storedTheme !== "dark") {
                setTheme(getPreferredTheme());
            }
        });



    window.addEventListener("livewire:navigated", () => {
        showActiveTheme(getPreferredTheme());

        for (const toggle of document.querySelectorAll("[data-bs-theme-value]")) {
            toggle.addEventListener("click", () => {
                const theme = toggle.getAttribute("data-bs-theme-value");
                localStorage.setItem("theme", theme);
                setTheme(theme);
                showActiveTheme(theme, true);
            });
        }
    });
})();

/**
 * --------------------------------------------
 * @file AdminLTE treeview.ts
 * @description Treeview plugin for AdminLTE.
 * @license MIT
 * --------------------------------------------
 */
/**
 * ------------------------------------------------------------------------
 * Constants
 * ------------------------------------------------------------------------
 */
    // const NAME = 'Treeview'
const DATA_KEY$3 = 'lte.treeview';
const EVENT_KEY$3 = `.${DATA_KEY$3}`;
const EVENT_EXPANDED$2 = `expanded${EVENT_KEY$3}`;
const EVENT_COLLAPSED$2 = `collapsed${EVENT_KEY$3}`;
// const EVENT_LOAD_DATA_API = `load${EVENT_KEY}`
const CLASS_NAME_MENU_OPEN = 'menu-open';
const SELECTOR_NAV_ITEM = '.nav-item';
const SELECTOR_NAV_LINK = '.nav-link';
const SELECTOR_TREEVIEW_MENU = '.nav-treeview';
const SELECTOR_DATA_TOGGLE$1 = '[data-lte-toggle="treeview"]';
const Default$1 = {
    animationSpeed: 300,
    accordion: true
};
/**
 * Class Definition
 * ====================================================
 */
class Treeview {
    constructor(element, config) {
        this._element = element;
        this._config = Object.assign(Object.assign({}, Default$1), config);
    }
    open() {
        var _a, _b;
        const event = new Event(EVENT_EXPANDED$2);
        if (this._config.accordion) {
            const openMenuList = (_a = this._element.parentElement) === null || _a === void 0 ? void 0 : _a.querySelectorAll(`${SELECTOR_NAV_ITEM}.${CLASS_NAME_MENU_OPEN}`);
            openMenuList === null || openMenuList === void 0 ? void 0 : openMenuList.forEach(openMenu => {
                if (openMenu !== this._element.parentElement) {
                    openMenu.classList.remove(CLASS_NAME_MENU_OPEN);
                    const childElement = openMenu === null || openMenu === void 0 ? void 0 : openMenu.querySelector(SELECTOR_TREEVIEW_MENU);
                    if (childElement) {
                        slideUp(childElement, this._config.animationSpeed);
                    }
                }
            });
        }
        this._element.classList.add(CLASS_NAME_MENU_OPEN);
        const childElement = (_b = this._element) === null || _b === void 0 ? void 0 : _b.querySelector(SELECTOR_TREEVIEW_MENU);
        if (childElement) {
            slideDown(childElement, this._config.animationSpeed);
        }
        this._element.dispatchEvent(event);
    }
    close() {
        var _a;
        const event = new Event(EVENT_COLLAPSED$2);
        this._element.classList.remove(CLASS_NAME_MENU_OPEN);
        const childElement = (_a = this._element) === null || _a === void 0 ? void 0 : _a.querySelector(SELECTOR_TREEVIEW_MENU);
        if (childElement) {
            slideUp(childElement, this._config.animationSpeed);
        }
        this._element.dispatchEvent(event);
    }
    toggle() {
        if (this._element.classList.contains(CLASS_NAME_MENU_OPEN)) {
            this.close();
        }
        else {
            this.open();
        }
    }
}
/**
 * ------------------------------------------------------------------------
 * Data Api implementation
 * ------------------------------------------------------------------------
 */
onDOMContentLoaded(() => {
    const button = document.querySelectorAll(SELECTOR_DATA_TOGGLE$1);
    button.forEach(btn => {
        btn.addEventListener('click', event => {
            const target = event.target;
            const targetItem = target.closest(SELECTOR_NAV_ITEM);
            const targetLink = target.closest(SELECTOR_NAV_LINK);
            if ((target === null || target === void 0 ? void 0 : target.getAttribute('href')) === '#' || (targetLink === null || targetLink === void 0 ? void 0 : targetLink.getAttribute('href')) === '#') {
                event.preventDefault();
            }
            if (targetItem) {
                const data = new Treeview(targetItem, Default$1);
                data.toggle();
            }
        });
    });
});
