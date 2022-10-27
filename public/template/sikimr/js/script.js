// bundle boostrap

! function (t, e) {
    "object" == typeof exports && "undefined" != typeof module ? module.exports = e() : "function" == typeof define && define.amd ? define(e) : (t = "undefined" != typeof globalThis ? globalThis : t || self).bootstrap = e()
}(this, (function () {
    "use strict";
    const t = "transitionend",
        e = t => {
            let e = t.getAttribute("data-bs-target");
            if (!e || "#" === e) {
                let i = t.getAttribute("href");
                if (!i || !i.includes("#") && !i.startsWith(".")) return null;
                i.includes("#") && !i.startsWith("#") && (i = `#${i.split("#")[1]}`), e = i && "#" !== i ? i.trim() : null
            }
            return e
        },
        i = t => {
            const i = e(t);
            return i && document.querySelector(i) ? i : null
        },
        n = t => {
            const i = e(t);
            return i ? document.querySelector(i) : null
        },
        s = e => {
            e.dispatchEvent(new Event(t))
        },
        o = t => !(!t || "object" != typeof t) && (void 0 !== t.jquery && (t = t[0]), void 0 !== t.nodeType),
        r = t => o(t) ? t.jquery ? t[0] : t : "string" == typeof t && t.length > 0 ? document.querySelector(t) : null,
        a = t => {
            if (!o(t) || 0 === t.getClientRects().length) return !1;
            const e = "visible" === getComputedStyle(t).getPropertyValue("visibility"),
                i = t.closest("details:not([open])");
            if (!i) return e;
            if (i !== t) {
                const e = t.closest("summary");
                if (e && e.parentNode !== i) return !1;
                if (null === e) return !1
            }
            return e
        },
        l = t => !t || t.nodeType !== Node.ELEMENT_NODE || !!t.classList.contains("disabled") || (void 0 !== t.disabled ? t.disabled : t.hasAttribute("disabled") && "false" !== t.getAttribute("disabled")),
        c = t => {
            if (!document.documentElement.attachShadow) return null;
            if ("function" == typeof t.getRootNode) {
                const e = t.getRootNode();
                return e instanceof ShadowRoot ? e : null
            }
            return t instanceof ShadowRoot ? t : t.parentNode ? c(t.parentNode) : null
        },
        h = () => {},
        d = t => {
            t.offsetHeight
        },
        u = () => window.jQuery && !document.body.hasAttribute("data-bs-no-jquery") ? window.jQuery : null,
        f = [],
        p = () => "rtl" === document.documentElement.dir,
        g = t => {
            var e;
            e = () => {
                const e = u();
                if (e) {
                    const i = t.NAME,
                        n = e.fn[i];
                    e.fn[i] = t.jQueryInterface, e.fn[i].Constructor = t, e.fn[i].noConflict = () => (e.fn[i] = n, t.jQueryInterface)
                }
            }, "loading" === document.readyState ? (f.length || document.addEventListener("DOMContentLoaded", (() => {
                for (const t of f) t()
            })), f.push(e)) : e()
        },
        m = t => {
            "function" == typeof t && t()
        },
        _ = (e, i, n = !0) => {
            if (!n) return void m(e);
            const o = (t => {
                if (!t) return 0;
                let {
                    transitionDuration: e,
                    transitionDelay: i
                } = window.getComputedStyle(t);
                const n = Number.parseFloat(e),
                    s = Number.parseFloat(i);
                return n || s ? (e = e.split(",")[0], i = i.split(",")[0], 1e3 * (Number.parseFloat(e) + Number.parseFloat(i))) : 0
            })(i) + 5;
            let r = !1;
            const a = ({
                target: n
            }) => {
                n === i && (r = !0, i.removeEventListener(t, a), m(e))
            };
            i.addEventListener(t, a), setTimeout((() => {
                r || s(i)
            }), o)
        },
        b = (t, e, i, n) => {
            const s = t.length;
            let o = t.indexOf(e);
            return -1 === o ? !i && n ? t[s - 1] : t[0] : (o += i ? 1 : -1, n && (o = (o + s) % s), t[Math.max(0, Math.min(o, s - 1))])
        },
        v = /[^.]*(?=\..*)\.|.*/,
        y = /\..*/,
        w = /::\d+$/,
        A = {};
    let E = 1;
    const T = {
            mouseenter: "mouseover",
            mouseleave: "mouseout"
        },
        C = new Set(["click", "dblclick", "mouseup", "mousedown", "contextmenu", "mousewheel", "DOMMouseScroll", "mouseover", "mouseout", "mousemove", "selectstart", "selectend", "keydown", "keypress", "keyup", "orientationchange", "touchstart", "touchmove", "touchend", "touchcancel", "pointerdown", "pointermove", "pointerup", "pointerleave", "pointercancel", "gesturestart", "gesturechange", "gestureend", "focus", "blur", "change", "reset", "select", "submit", "focusin", "focusout", "load", "unload", "beforeunload", "resize", "move", "DOMContentLoaded", "readystatechange", "error", "abort", "scroll"]);

    function O(t, e) {
        return e && `${e}::${E++}` || t.uidEvent || E++
    }

    function x(t) {
        const e = O(t);
        return t.uidEvent = e, A[e] = A[e] || {}, A[e]
    }

    function k(t, e, i = null) {
        return Object.values(t).find((t => t.callable === e && t.delegationSelector === i))
    }

    function L(t, e, i) {
        const n = "string" == typeof e,
            s = n ? i : e || i;
        let o = N(t);
        return C.has(o) || (o = t), [n, s, o]
    }

    function D(t, e, i, n, s) {
        if ("string" != typeof e || !t) return;
        let [o, r, a] = L(e, i, n);
        if (e in T) {
            const t = t => function (e) {
                if (!e.relatedTarget || e.relatedTarget !== e.delegateTarget && !e.delegateTarget.contains(e.relatedTarget)) return t.call(this, e)
            };
            r = t(r)
        }
        const l = x(t),
            c = l[a] || (l[a] = {}),
            h = k(c, r, o ? i : null);
        if (h) return void(h.oneOff = h.oneOff && s);
        const d = O(r, e.replace(v, "")),
            u = o ? function (t, e, i) {
                return function n(s) {
                    const o = t.querySelectorAll(e);
                    for (let {
                            target: r
                        } = s; r && r !== this; r = r.parentNode)
                        for (const a of o)
                            if (a === r) return j(s, {
                                delegateTarget: r
                            }), n.oneOff && P.off(t, s.type, e, i), i.apply(r, [s])
                }
            }(t, i, r) : function (t, e) {
                return function i(n) {
                    return j(n, {
                        delegateTarget: t
                    }), i.oneOff && P.off(t, n.type, e), e.apply(t, [n])
                }
            }(t, r);
        u.delegationSelector = o ? i : null, u.callable = r, u.oneOff = s, u.uidEvent = d, c[d] = u, t.addEventListener(a, u, o)
    }

    function S(t, e, i, n, s) {
        const o = k(e[i], n, s);
        o && (t.removeEventListener(i, o, Boolean(s)), delete e[i][o.uidEvent])
    }

    function I(t, e, i, n) {
        const s = e[i] || {};
        for (const o of Object.keys(s))
            if (o.includes(n)) {
                const n = s[o];
                S(t, e, i, n.callable, n.delegationSelector)
            }
    }

    function N(t) {
        return t = t.replace(y, ""), T[t] || t
    }
    const P = {
        on(t, e, i, n) {
            D(t, e, i, n, !1)
        },
        one(t, e, i, n) {
            D(t, e, i, n, !0)
        },
        off(t, e, i, n) {
            if ("string" != typeof e || !t) return;
            const [s, o, r] = L(e, i, n), a = r !== e, l = x(t), c = l[r] || {}, h = e.startsWith(".");
            if (void 0 === o) {
                if (h)
                    for (const i of Object.keys(l)) I(t, l, i, e.slice(1));
                for (const i of Object.keys(c)) {
                    const n = i.replace(w, "");
                    if (!a || e.includes(n)) {
                        const e = c[i];
                        S(t, l, r, e.callable, e.delegationSelector)
                    }
                }
            } else {
                if (!Object.keys(c).length) return;
                S(t, l, r, o, s ? i : null)
            }
        },
        trigger(t, e, i) {
            if ("string" != typeof e || !t) return null;
            const n = u();
            let s = null,
                o = !0,
                r = !0,
                a = !1;
            e !== N(e) && n && (s = n.Event(e, i), n(t).trigger(s), o = !s.isPropagationStopped(), r = !s.isImmediatePropagationStopped(), a = s.isDefaultPrevented());
            let l = new Event(e, {
                bubbles: o,
                cancelable: !0
            });
            return l = j(l, i), a && l.preventDefault(), r && t.dispatchEvent(l), l.defaultPrevented && s && s.preventDefault(), l
        }
    };

    function j(t, e) {
        for (const [i, n] of Object.entries(e || {})) try {
            t[i] = n
        } catch (e) {
            Object.defineProperty(t, i, {
                configurable: !0,
                get: () => n
            })
        }
        return t
    }
    const M = new Map,
        H = {
            set(t, e, i) {
                M.has(t) || M.set(t, new Map);
                const n = M.get(t);
                n.has(e) || 0 === n.size ? n.set(e, i) : console.error(`Bootstrap doesn't allow more than one instance per element. Bound instance: ${Array.from(n.keys())[0]}.`)
            },
            get: (t, e) => M.has(t) && M.get(t).get(e) || null,
            remove(t, e) {
                if (!M.has(t)) return;
                const i = M.get(t);
                i.delete(e), 0 === i.size && M.delete(t)
            }
        };

    function $(t) {
        if ("true" === t) return !0;
        if ("false" === t) return !1;
        if (t === Number(t).toString()) return Number(t);
        if ("" === t || "null" === t) return null;
        if ("string" != typeof t) return t;
        try {
            return JSON.parse(decodeURIComponent(t))
        } catch (e) {
            return t
        }
    }

    function W(t) {
        return t.replace(/[A-Z]/g, (t => `-${t.toLowerCase()}`))
    }
    const B = {
        setDataAttribute(t, e, i) {
            t.setAttribute(`data-bs-${W(e)}`, i)
        },
        removeDataAttribute(t, e) {
            t.removeAttribute(`data-bs-${W(e)}`)
        },
        getDataAttributes(t) {
            if (!t) return {};
            const e = {},
                i = Object.keys(t.dataset).filter((t => t.startsWith("bs") && !t.startsWith("bsConfig")));
            for (const n of i) {
                let i = n.replace(/^bs/, "");
                i = i.charAt(0).toLowerCase() + i.slice(1, i.length), e[i] = $(t.dataset[n])
            }
            return e
        },
        getDataAttribute: (t, e) => $(t.getAttribute(`data-bs-${W(e)}`))
    };
    class F {
        static get Default() {
            return {}
        }
        static get DefaultType() {
            return {}
        }
        static get NAME() {
            throw new Error('You have to implement the static method "NAME", for each component!')
        }
        _getConfig(t) {
            return t = this._mergeConfigObj(t), t = this._configAfterMerge(t), this._typeCheckConfig(t), t
        }
        _configAfterMerge(t) {
            return t
        }
        _mergeConfigObj(t, e) {
            const i = o(e) ? B.getDataAttribute(e, "config") : {};
            return {
                ...this.constructor.Default,
                ..."object" == typeof i ? i : {},
                ...o(e) ? B.getDataAttributes(e) : {},
                ..."object" == typeof t ? t : {}
            }
        }
        _typeCheckConfig(t, e = this.constructor.DefaultType) {
            for (const n of Object.keys(e)) {
                const s = e[n],
                    r = t[n],
                    a = o(r) ? "element" : null == (i = r) ? `${i}` : Object.prototype.toString.call(i).match(/\s([a-z]+)/i)[1].toLowerCase();
                if (!new RegExp(s).test(a)) throw new TypeError(`${this.constructor.NAME.toUpperCase()}: Option "${n}" provided type "${a}" but expected type "${s}".`)
            }
            var i
        }
    }
    class z extends F {
        constructor(t, e) {
            super(), (t = r(t)) && (this._element = t, this._config = this._getConfig(e), H.set(this._element, this.constructor.DATA_KEY, this))
        }
        dispose() {
            H.remove(this._element, this.constructor.DATA_KEY), P.off(this._element, this.constructor.EVENT_KEY);
            for (const t of Object.getOwnPropertyNames(this)) this[t] = null
        }
        _queueCallback(t, e, i = !0) {
            _(t, e, i)
        }
        _getConfig(t) {
            return t = this._mergeConfigObj(t, this._element), t = this._configAfterMerge(t), this._typeCheckConfig(t), t
        }
        static getInstance(t) {
            return H.get(r(t), this.DATA_KEY)
        }
        static getOrCreateInstance(t, e = {}) {
            return this.getInstance(t) || new this(t, "object" == typeof e ? e : null)
        }
        static get VERSION() {
            return "5.2.2"
        }
        static get DATA_KEY() {
            return `bs.${this.NAME}`
        }
        static get EVENT_KEY() {
            return `.${this.DATA_KEY}`
        }
        static eventName(t) {
            return `${t}${this.EVENT_KEY}`
        }
    }
    const q = (t, e = "hide") => {
        const i = `click.dismiss${t.EVENT_KEY}`,
            s = t.NAME;
        P.on(document, i, `[data-bs-dismiss="${s}"]`, (function (i) {
            if (["A", "AREA"].includes(this.tagName) && i.preventDefault(), l(this)) return;
            const o = n(this) || this.closest(`.${s}`);
            t.getOrCreateInstance(o)[e]()
        }))
    };
    class R extends z {
        static get NAME() {
            return "alert"
        }
        close() {
            if (P.trigger(this._element, "close.bs.alert").defaultPrevented) return;
            this._element.classList.remove("show");
            const t = this._element.classList.contains("fade");
            this._queueCallback((() => this._destroyElement()), this._element, t)
        }
        _destroyElement() {
            this._element.remove(), P.trigger(this._element, "closed.bs.alert"), this.dispose()
        }
        static jQueryInterface(t) {
            return this.each((function () {
                const e = R.getOrCreateInstance(this);
                if ("string" == typeof t) {
                    if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
                    e[t](this)
                }
            }))
        }
    }
    q(R, "close"), g(R);
    const V = '[data-bs-toggle="button"]';
    class K extends z {
        static get NAME() {
            return "button"
        }
        toggle() {
            this._element.setAttribute("aria-pressed", this._element.classList.toggle("active"))
        }
        static jQueryInterface(t) {
            return this.each((function () {
                const e = K.getOrCreateInstance(this);
                "toggle" === t && e[t]()
            }))
        }
    }
    P.on(document, "click.bs.button.data-api", V, (t => {
        t.preventDefault();
        const e = t.target.closest(V);
        K.getOrCreateInstance(e).toggle()
    })), g(K);
    const Q = {
            find: (t, e = document.documentElement) => [].concat(...Element.prototype.querySelectorAll.call(e, t)),
            findOne: (t, e = document.documentElement) => Element.prototype.querySelector.call(e, t),
            children: (t, e) => [].concat(...t.children).filter((t => t.matches(e))),
            parents(t, e) {
                const i = [];
                let n = t.parentNode.closest(e);
                for (; n;) i.push(n), n = n.parentNode.closest(e);
                return i
            },
            prev(t, e) {
                let i = t.previousElementSibling;
                for (; i;) {
                    if (i.matches(e)) return [i];
                    i = i.previousElementSibling
                }
                return []
            },
            next(t, e) {
                let i = t.nextElementSibling;
                for (; i;) {
                    if (i.matches(e)) return [i];
                    i = i.nextElementSibling
                }
                return []
            },
            focusableChildren(t) {
                const e = ["a", "button", "input", "textarea", "select", "details", "[tabindex]", '[contenteditable="true"]'].map((t => `${t}:not([tabindex^="-"])`)).join(",");
                return this.find(e, t).filter((t => !l(t) && a(t)))
            }
        },
        X = {
            endCallback: null,
            leftCallback: null,
            rightCallback: null
        },
        Y = {
            endCallback: "(function|null)",
            leftCallback: "(function|null)",
            rightCallback: "(function|null)"
        };
    class U extends F {
        constructor(t, e) {
            super(), this._element = t, t && U.isSupported() && (this._config = this._getConfig(e), this._deltaX = 0, this._supportPointerEvents = Boolean(window.PointerEvent), this._initEvents())
        }
        static get Default() {
            return X
        }
        static get DefaultType() {
            return Y
        }
        static get NAME() {
            return "swipe"
        }
        dispose() {
            P.off(this._element, ".bs.swipe")
        }
        _start(t) {
            this._supportPointerEvents ? this._eventIsPointerPenTouch(t) && (this._deltaX = t.clientX) : this._deltaX = t.touches[0].clientX
        }
        _end(t) {
            this._eventIsPointerPenTouch(t) && (this._deltaX = t.clientX - this._deltaX), this._handleSwipe(), m(this._config.endCallback)
        }
        _move(t) {
            this._deltaX = t.touches && t.touches.length > 1 ? 0 : t.touches[0].clientX - this._deltaX
        }
        _handleSwipe() {
            const t = Math.abs(this._deltaX);
            if (t <= 40) return;
            const e = t / this._deltaX;
            this._deltaX = 0, e && m(e > 0 ? this._config.rightCallback : this._config.leftCallback)
        }
        _initEvents() {
            this._supportPointerEvents ? (P.on(this._element, "pointerdown.bs.swipe", (t => this._start(t))), P.on(this._element, "pointerup.bs.swipe", (t => this._end(t))), this._element.classList.add("pointer-event")) : (P.on(this._element, "touchstart.bs.swipe", (t => this._start(t))), P.on(this._element, "touchmove.bs.swipe", (t => this._move(t))), P.on(this._element, "touchend.bs.swipe", (t => this._end(t))))
        }
        _eventIsPointerPenTouch(t) {
            return this._supportPointerEvents && ("pen" === t.pointerType || "touch" === t.pointerType)
        }
        static isSupported() {
            return "ontouchstart" in document.documentElement || navigator.maxTouchPoints > 0
        }
    }
    const G = "next",
        J = "prev",
        Z = "left",
        tt = "right",
        et = "slid.bs.carousel",
        it = "carousel",
        nt = "active",
        st = {
            ArrowLeft: tt,
            ArrowRight: Z
        },
        ot = {
            interval: 5e3,
            keyboard: !0,
            pause: "hover",
            ride: !1,
            touch: !0,
            wrap: !0
        },
        rt = {
            interval: "(number|boolean)",
            keyboard: "boolean",
            pause: "(string|boolean)",
            ride: "(boolean|string)",
            touch: "boolean",
            wrap: "boolean"
        };
    class at extends z {
        constructor(t, e) {
            super(t, e), this._interval = null, this._activeElement = null, this._isSliding = !1, this.touchTimeout = null, this._swipeHelper = null, this._indicatorsElement = Q.findOne(".carousel-indicators", this._element), this._addEventListeners(), this._config.ride === it && this.cycle()
        }
        static get Default() {
            return ot
        }
        static get DefaultType() {
            return rt
        }
        static get NAME() {
            return "carousel"
        }
        next() {
            this._slide(G)
        }
        nextWhenVisible() {
            !document.hidden && a(this._element) && this.next()
        }
        prev() {
            this._slide(J)
        }
        pause() {
            this._isSliding && s(this._element), this._clearInterval()
        }
        cycle() {
            this._clearInterval(), this._updateInterval(), this._interval = setInterval((() => this.nextWhenVisible()), this._config.interval)
        }
        _maybeEnableCycle() {
            this._config.ride && (this._isSliding ? P.one(this._element, et, (() => this.cycle())) : this.cycle())
        }
        to(t) {
            const e = this._getItems();
            if (t > e.length - 1 || t < 0) return;
            if (this._isSliding) return void P.one(this._element, et, (() => this.to(t)));
            const i = this._getItemIndex(this._getActive());
            if (i === t) return;
            const n = t > i ? G : J;
            this._slide(n, e[t])
        }
        dispose() {
            this._swipeHelper && this._swipeHelper.dispose(), super.dispose()
        }
        _configAfterMerge(t) {
            return t.defaultInterval = t.interval, t
        }
        _addEventListeners() {
            this._config.keyboard && P.on(this._element, "keydown.bs.carousel", (t => this._keydown(t))), "hover" === this._config.pause && (P.on(this._element, "mouseenter.bs.carousel", (() => this.pause())), P.on(this._element, "mouseleave.bs.carousel", (() => this._maybeEnableCycle()))), this._config.touch && U.isSupported() && this._addTouchEventListeners()
        }
        _addTouchEventListeners() {
            for (const t of Q.find(".carousel-item img", this._element)) P.on(t, "dragstart.bs.carousel", (t => t.preventDefault()));
            const t = {
                leftCallback: () => this._slide(this._directionToOrder(Z)),
                rightCallback: () => this._slide(this._directionToOrder(tt)),
                endCallback: () => {
                    "hover" === this._config.pause && (this.pause(), this.touchTimeout && clearTimeout(this.touchTimeout), this.touchTimeout = setTimeout((() => this._maybeEnableCycle()), 500 + this._config.interval))
                }
            };
            this._swipeHelper = new U(this._element, t)
        }
        _keydown(t) {
            if (/input|textarea/i.test(t.target.tagName)) return;
            const e = st[t.key];
            e && (t.preventDefault(), this._slide(this._directionToOrder(e)))
        }
        _getItemIndex(t) {
            return this._getItems().indexOf(t)
        }
        _setActiveIndicatorElement(t) {
            if (!this._indicatorsElement) return;
            const e = Q.findOne(".active", this._indicatorsElement);
            e.classList.remove(nt), e.removeAttribute("aria-current");
            const i = Q.findOne(`[data-bs-slide-to="${t}"]`, this._indicatorsElement);
            i && (i.classList.add(nt), i.setAttribute("aria-current", "true"))
        }
        _updateInterval() {
            const t = this._activeElement || this._getActive();
            if (!t) return;
            const e = Number.parseInt(t.getAttribute("data-bs-interval"), 10);
            this._config.interval = e || this._config.defaultInterval
        }
        _slide(t, e = null) {
            if (this._isSliding) return;
            const i = this._getActive(),
                n = t === G,
                s = e || b(this._getItems(), i, n, this._config.wrap);
            if (s === i) return;
            const o = this._getItemIndex(s),
                r = e => P.trigger(this._element, e, {
                    relatedTarget: s,
                    direction: this._orderToDirection(t),
                    from: this._getItemIndex(i),
                    to: o
                });
            if (r("slide.bs.carousel").defaultPrevented) return;
            if (!i || !s) return;
            const a = Boolean(this._interval);
            this.pause(), this._isSliding = !0, this._setActiveIndicatorElement(o), this._activeElement = s;
            const l = n ? "carousel-item-start" : "carousel-item-end",
                c = n ? "carousel-item-next" : "carousel-item-prev";
            s.classList.add(c), d(s), i.classList.add(l), s.classList.add(l), this._queueCallback((() => {
                s.classList.remove(l, c), s.classList.add(nt), i.classList.remove(nt, c, l), this._isSliding = !1, r(et)
            }), i, this._isAnimated()), a && this.cycle()
        }
        _isAnimated() {
            return this._element.classList.contains("slide")
        }
        _getActive() {
            return Q.findOne(".active.carousel-item", this._element)
        }
        _getItems() {
            return Q.find(".carousel-item", this._element)
        }
        _clearInterval() {
            this._interval && (clearInterval(this._interval), this._interval = null)
        }
        _directionToOrder(t) {
            return p() ? t === Z ? J : G : t === Z ? G : J
        }
        _orderToDirection(t) {
            return p() ? t === J ? Z : tt : t === J ? tt : Z
        }
        static jQueryInterface(t) {
            return this.each((function () {
                const e = at.getOrCreateInstance(this, t);
                if ("number" != typeof t) {
                    if ("string" == typeof t) {
                        if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
                        e[t]()
                    }
                } else e.to(t)
            }))
        }
    }
    P.on(document, "click.bs.carousel.data-api", "[data-bs-slide], [data-bs-slide-to]", (function (t) {
        const e = n(this);
        if (!e || !e.classList.contains(it)) return;
        t.preventDefault();
        const i = at.getOrCreateInstance(e),
            s = this.getAttribute("data-bs-slide-to");
        return s ? (i.to(s), void i._maybeEnableCycle()) : "next" === B.getDataAttribute(this, "slide") ? (i.next(), void i._maybeEnableCycle()) : (i.prev(), void i._maybeEnableCycle())
    })), P.on(window, "load.bs.carousel.data-api", (() => {
        const t = Q.find('[data-bs-ride="carousel"]');
        for (const e of t) at.getOrCreateInstance(e)
    })), g(at);
    const lt = "show",
        ct = "collapse",
        ht = "collapsing",
        dt = '[data-bs-toggle="collapse"]',
        ut = {
            parent: null,
            toggle: !0
        },
        ft = {
            parent: "(null|element)",
            toggle: "boolean"
        };
    class pt extends z {
        constructor(t, e) {
            super(t, e), this._isTransitioning = !1, this._triggerArray = [];
            const n = Q.find(dt);
            for (const t of n) {
                const e = i(t),
                    n = Q.find(e).filter((t => t === this._element));
                null !== e && n.length && this._triggerArray.push(t)
            }
            this._initializeChildren(), this._config.parent || this._addAriaAndCollapsedClass(this._triggerArray, this._isShown()), this._config.toggle && this.toggle()
        }
        static get Default() {
            return ut
        }
        static get DefaultType() {
            return ft
        }
        static get NAME() {
            return "collapse"
        }
        toggle() {
            this._isShown() ? this.hide() : this.show()
        }
        show() {
            if (this._isTransitioning || this._isShown()) return;
            let t = [];
            if (this._config.parent && (t = this._getFirstLevelChildren(".collapse.show, .collapse.collapsing").filter((t => t !== this._element)).map((t => pt.getOrCreateInstance(t, {
                    toggle: !1
                })))), t.length && t[0]._isTransitioning) return;
            if (P.trigger(this._element, "show.bs.collapse").defaultPrevented) return;
            for (const e of t) e.hide();
            const e = this._getDimension();
            this._element.classList.remove(ct), this._element.classList.add(ht), this._element.style[e] = 0, this._addAriaAndCollapsedClass(this._triggerArray, !0), this._isTransitioning = !0;
            const i = `scroll${e[0].toUpperCase()+e.slice(1)}`;
            this._queueCallback((() => {
                this._isTransitioning = !1, this._element.classList.remove(ht), this._element.classList.add(ct, lt), this._element.style[e] = "", P.trigger(this._element, "shown.bs.collapse")
            }), this._element, !0), this._element.style[e] = `${this._element[i]}px`
        }
        hide() {
            if (this._isTransitioning || !this._isShown()) return;
            if (P.trigger(this._element, "hide.bs.collapse").defaultPrevented) return;
            const t = this._getDimension();
            this._element.style[t] = `${this._element.getBoundingClientRect()[t]}px`, d(this._element), this._element.classList.add(ht), this._element.classList.remove(ct, lt);
            for (const t of this._triggerArray) {
                const e = n(t);
                e && !this._isShown(e) && this._addAriaAndCollapsedClass([t], !1)
            }
            this._isTransitioning = !0, this._element.style[t] = "", this._queueCallback((() => {
                this._isTransitioning = !1, this._element.classList.remove(ht), this._element.classList.add(ct), P.trigger(this._element, "hidden.bs.collapse")
            }), this._element, !0)
        }
        _isShown(t = this._element) {
            return t.classList.contains(lt)
        }
        _configAfterMerge(t) {
            return t.toggle = Boolean(t.toggle), t.parent = r(t.parent), t
        }
        _getDimension() {
            return this._element.classList.contains("collapse-horizontal") ? "width" : "height"
        }
        _initializeChildren() {
            if (!this._config.parent) return;
            const t = this._getFirstLevelChildren(dt);
            for (const e of t) {
                const t = n(e);
                t && this._addAriaAndCollapsedClass([e], this._isShown(t))
            }
        }
        _getFirstLevelChildren(t) {
            const e = Q.find(":scope .collapse .collapse", this._config.parent);
            return Q.find(t, this._config.parent).filter((t => !e.includes(t)))
        }
        _addAriaAndCollapsedClass(t, e) {
            if (t.length)
                for (const i of t) i.classList.toggle("collapsed", !e), i.setAttribute("aria-expanded", e)
        }
        static jQueryInterface(t) {
            const e = {};
            return "string" == typeof t && /show|hide/.test(t) && (e.toggle = !1), this.each((function () {
                const i = pt.getOrCreateInstance(this, e);
                if ("string" == typeof t) {
                    if (void 0 === i[t]) throw new TypeError(`No method named "${t}"`);
                    i[t]()
                }
            }))
        }
    }
    P.on(document, "click.bs.collapse.data-api", dt, (function (t) {
        ("A" === t.target.tagName || t.delegateTarget && "A" === t.delegateTarget.tagName) && t.preventDefault();
        const e = i(this),
            n = Q.find(e);
        for (const t of n) pt.getOrCreateInstance(t, {
            toggle: !1
        }).toggle()
    })), g(pt);
    var gt = "top",
        mt = "bottom",
        _t = "right",
        bt = "left",
        vt = "auto",
        yt = [gt, mt, _t, bt],
        wt = "start",
        At = "end",
        Et = "clippingParents",
        Tt = "viewport",
        Ct = "popper",
        Ot = "reference",
        xt = yt.reduce((function (t, e) {
            return t.concat([e + "-" + wt, e + "-" + At])
        }), []),
        kt = [].concat(yt, [vt]).reduce((function (t, e) {
            return t.concat([e, e + "-" + wt, e + "-" + At])
        }), []),
        Lt = "beforeRead",
        Dt = "read",
        St = "afterRead",
        It = "beforeMain",
        Nt = "main",
        Pt = "afterMain",
        jt = "beforeWrite",
        Mt = "write",
        Ht = "afterWrite",
        $t = [Lt, Dt, St, It, Nt, Pt, jt, Mt, Ht];

    function Wt(t) {
        return t ? (t.nodeName || "").toLowerCase() : null
    }

    function Bt(t) {
        if (null == t) return window;
        if ("[object Window]" !== t.toString()) {
            var e = t.ownerDocument;
            return e && e.defaultView || window
        }
        return t
    }

    function Ft(t) {
        return t instanceof Bt(t).Element || t instanceof Element
    }

    function zt(t) {
        return t instanceof Bt(t).HTMLElement || t instanceof HTMLElement
    }

    function qt(t) {
        return "undefined" != typeof ShadowRoot && (t instanceof Bt(t).ShadowRoot || t instanceof ShadowRoot)
    }
    const Rt = {
        name: "applyStyles",
        enabled: !0,
        phase: "write",
        fn: function (t) {
            var e = t.state;
            Object.keys(e.elements).forEach((function (t) {
                var i = e.styles[t] || {},
                    n = e.attributes[t] || {},
                    s = e.elements[t];
                zt(s) && Wt(s) && (Object.assign(s.style, i), Object.keys(n).forEach((function (t) {
                    var e = n[t];
                    !1 === e ? s.removeAttribute(t) : s.setAttribute(t, !0 === e ? "" : e)
                })))
            }))
        },
        effect: function (t) {
            var e = t.state,
                i = {
                    popper: {
                        position: e.options.strategy,
                        left: "0",
                        top: "0",
                        margin: "0"
                    },
                    arrow: {
                        position: "absolute"
                    },
                    reference: {}
                };
            return Object.assign(e.elements.popper.style, i.popper), e.styles = i, e.elements.arrow && Object.assign(e.elements.arrow.style, i.arrow),
                function () {
                    Object.keys(e.elements).forEach((function (t) {
                        var n = e.elements[t],
                            s = e.attributes[t] || {},
                            o = Object.keys(e.styles.hasOwnProperty(t) ? e.styles[t] : i[t]).reduce((function (t, e) {
                                return t[e] = "", t
                            }), {});
                        zt(n) && Wt(n) && (Object.assign(n.style, o), Object.keys(s).forEach((function (t) {
                            n.removeAttribute(t)
                        })))
                    }))
                }
        },
        requires: ["computeStyles"]
    };

    function Vt(t) {
        return t.split("-")[0]
    }
    var Kt = Math.max,
        Qt = Math.min,
        Xt = Math.round;

    function Yt() {
        var t = navigator.userAgentData;
        return null != t && t.brands ? t.brands.map((function (t) {
            return t.brand + "/" + t.version
        })).join(" ") : navigator.userAgent
    }

    function Ut() {
        return !/^((?!chrome|android).)*safari/i.test(Yt())
    }

    function Gt(t, e, i) {
        void 0 === e && (e = !1), void 0 === i && (i = !1);
        var n = t.getBoundingClientRect(),
            s = 1,
            o = 1;
        e && zt(t) && (s = t.offsetWidth > 0 && Xt(n.width) / t.offsetWidth || 1, o = t.offsetHeight > 0 && Xt(n.height) / t.offsetHeight || 1);
        var r = (Ft(t) ? Bt(t) : window).visualViewport,
            a = !Ut() && i,
            l = (n.left + (a && r ? r.offsetLeft : 0)) / s,
            c = (n.top + (a && r ? r.offsetTop : 0)) / o,
            h = n.width / s,
            d = n.height / o;
        return {
            width: h,
            height: d,
            top: c,
            right: l + h,
            bottom: c + d,
            left: l,
            x: l,
            y: c
        }
    }

    function Jt(t) {
        var e = Gt(t),
            i = t.offsetWidth,
            n = t.offsetHeight;
        return Math.abs(e.width - i) <= 1 && (i = e.width), Math.abs(e.height - n) <= 1 && (n = e.height), {
            x: t.offsetLeft,
            y: t.offsetTop,
            width: i,
            height: n
        }
    }

    function Zt(t, e) {
        var i = e.getRootNode && e.getRootNode();
        if (t.contains(e)) return !0;
        if (i && qt(i)) {
            var n = e;
            do {
                if (n && t.isSameNode(n)) return !0;
                n = n.parentNode || n.host
            } while (n)
        }
        return !1
    }

    function te(t) {
        return Bt(t).getComputedStyle(t)
    }

    function ee(t) {
        return ["table", "td", "th"].indexOf(Wt(t)) >= 0
    }

    function ie(t) {
        return ((Ft(t) ? t.ownerDocument : t.document) || window.document).documentElement
    }

    function ne(t) {
        return "html" === Wt(t) ? t : t.assignedSlot || t.parentNode || (qt(t) ? t.host : null) || ie(t)
    }

    function se(t) {
        return zt(t) && "fixed" !== te(t).position ? t.offsetParent : null
    }

    function oe(t) {
        for (var e = Bt(t), i = se(t); i && ee(i) && "static" === te(i).position;) i = se(i);
        return i && ("html" === Wt(i) || "body" === Wt(i) && "static" === te(i).position) ? e : i || function (t) {
            var e = /firefox/i.test(Yt());
            if (/Trident/i.test(Yt()) && zt(t) && "fixed" === te(t).position) return null;
            var i = ne(t);
            for (qt(i) && (i = i.host); zt(i) && ["html", "body"].indexOf(Wt(i)) < 0;) {
                var n = te(i);
                if ("none" !== n.transform || "none" !== n.perspective || "paint" === n.contain || -1 !== ["transform", "perspective"].indexOf(n.willChange) || e && "filter" === n.willChange || e && n.filter && "none" !== n.filter) return i;
                i = i.parentNode
            }
            return null
        }(t) || e
    }

    function re(t) {
        return ["top", "bottom"].indexOf(t) >= 0 ? "x" : "y"
    }

    function ae(t, e, i) {
        return Kt(t, Qt(e, i))
    }

    function le(t) {
        return Object.assign({}, {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        }, t)
    }

    function ce(t, e) {
        return e.reduce((function (e, i) {
            return e[i] = t, e
        }), {})
    }
    const he = {
        name: "arrow",
        enabled: !0,
        phase: "main",
        fn: function (t) {
            var e, i = t.state,
                n = t.name,
                s = t.options,
                o = i.elements.arrow,
                r = i.modifiersData.popperOffsets,
                a = Vt(i.placement),
                l = re(a),
                c = [bt, _t].indexOf(a) >= 0 ? "height" : "width";
            if (o && r) {
                var h = function (t, e) {
                        return le("number" != typeof (t = "function" == typeof t ? t(Object.assign({}, e.rects, {
                            placement: e.placement
                        })) : t) ? t : ce(t, yt))
                    }(s.padding, i),
                    d = Jt(o),
                    u = "y" === l ? gt : bt,
                    f = "y" === l ? mt : _t,
                    p = i.rects.reference[c] + i.rects.reference[l] - r[l] - i.rects.popper[c],
                    g = r[l] - i.rects.reference[l],
                    m = oe(o),
                    _ = m ? "y" === l ? m.clientHeight || 0 : m.clientWidth || 0 : 0,
                    b = p / 2 - g / 2,
                    v = h[u],
                    y = _ - d[c] - h[f],
                    w = _ / 2 - d[c] / 2 + b,
                    A = ae(v, w, y),
                    E = l;
                i.modifiersData[n] = ((e = {})[E] = A, e.centerOffset = A - w, e)
            }
        },
        effect: function (t) {
            var e = t.state,
                i = t.options.element,
                n = void 0 === i ? "[data-popper-arrow]" : i;
            null != n && ("string" != typeof n || (n = e.elements.popper.querySelector(n))) && Zt(e.elements.popper, n) && (e.elements.arrow = n)
        },
        requires: ["popperOffsets"],
        requiresIfExists: ["preventOverflow"]
    };

    function de(t) {
        return t.split("-")[1]
    }
    var ue = {
        top: "auto",
        right: "auto",
        bottom: "auto",
        left: "auto"
    };

    function fe(t) {
        var e, i = t.popper,
            n = t.popperRect,
            s = t.placement,
            o = t.variation,
            r = t.offsets,
            a = t.position,
            l = t.gpuAcceleration,
            c = t.adaptive,
            h = t.roundOffsets,
            d = t.isFixed,
            u = r.x,
            f = void 0 === u ? 0 : u,
            p = r.y,
            g = void 0 === p ? 0 : p,
            m = "function" == typeof h ? h({
                x: f,
                y: g
            }) : {
                x: f,
                y: g
            };
        f = m.x, g = m.y;
        var _ = r.hasOwnProperty("x"),
            b = r.hasOwnProperty("y"),
            v = bt,
            y = gt,
            w = window;
        if (c) {
            var A = oe(i),
                E = "clientHeight",
                T = "clientWidth";
            A === Bt(i) && "static" !== te(A = ie(i)).position && "absolute" === a && (E = "scrollHeight", T = "scrollWidth"), (s === gt || (s === bt || s === _t) && o === At) && (y = mt, g -= (d && A === w && w.visualViewport ? w.visualViewport.height : A[E]) - n.height, g *= l ? 1 : -1), s !== bt && (s !== gt && s !== mt || o !== At) || (v = _t, f -= (d && A === w && w.visualViewport ? w.visualViewport.width : A[T]) - n.width, f *= l ? 1 : -1)
        }
        var C, O = Object.assign({
                position: a
            }, c && ue),
            x = !0 === h ? function (t) {
                var e = t.x,
                    i = t.y,
                    n = window.devicePixelRatio || 1;
                return {
                    x: Xt(e * n) / n || 0,
                    y: Xt(i * n) / n || 0
                }
            }({
                x: f,
                y: g
            }) : {
                x: f,
                y: g
            };
        return f = x.x, g = x.y, l ? Object.assign({}, O, ((C = {})[y] = b ? "0" : "", C[v] = _ ? "0" : "", C.transform = (w.devicePixelRatio || 1) <= 1 ? "translate(" + f + "px, " + g + "px)" : "translate3d(" + f + "px, " + g + "px, 0)", C)) : Object.assign({}, O, ((e = {})[y] = b ? g + "px" : "", e[v] = _ ? f + "px" : "", e.transform = "", e))
    }
    const pe = {
        name: "computeStyles",
        enabled: !0,
        phase: "beforeWrite",
        fn: function (t) {
            var e = t.state,
                i = t.options,
                n = i.gpuAcceleration,
                s = void 0 === n || n,
                o = i.adaptive,
                r = void 0 === o || o,
                a = i.roundOffsets,
                l = void 0 === a || a,
                c = {
                    placement: Vt(e.placement),
                    variation: de(e.placement),
                    popper: e.elements.popper,
                    popperRect: e.rects.popper,
                    gpuAcceleration: s,
                    isFixed: "fixed" === e.options.strategy
                };
            null != e.modifiersData.popperOffsets && (e.styles.popper = Object.assign({}, e.styles.popper, fe(Object.assign({}, c, {
                offsets: e.modifiersData.popperOffsets,
                position: e.options.strategy,
                adaptive: r,
                roundOffsets: l
            })))), null != e.modifiersData.arrow && (e.styles.arrow = Object.assign({}, e.styles.arrow, fe(Object.assign({}, c, {
                offsets: e.modifiersData.arrow,
                position: "absolute",
                adaptive: !1,
                roundOffsets: l
            })))), e.attributes.popper = Object.assign({}, e.attributes.popper, {
                "data-popper-placement": e.placement
            })
        },
        data: {}
    };
    var ge = {
        passive: !0
    };
    const me = {
        name: "eventListeners",
        enabled: !0,
        phase: "write",
        fn: function () {},
        effect: function (t) {
            var e = t.state,
                i = t.instance,
                n = t.options,
                s = n.scroll,
                o = void 0 === s || s,
                r = n.resize,
                a = void 0 === r || r,
                l = Bt(e.elements.popper),
                c = [].concat(e.scrollParents.reference, e.scrollParents.popper);
            return o && c.forEach((function (t) {
                    t.addEventListener("scroll", i.update, ge)
                })), a && l.addEventListener("resize", i.update, ge),
                function () {
                    o && c.forEach((function (t) {
                        t.removeEventListener("scroll", i.update, ge)
                    })), a && l.removeEventListener("resize", i.update, ge)
                }
        },
        data: {}
    };
    var _e = {
        left: "right",
        right: "left",
        bottom: "top",
        top: "bottom"
    };

    function be(t) {
        return t.replace(/left|right|bottom|top/g, (function (t) {
            return _e[t]
        }))
    }
    var ve = {
        start: "end",
        end: "start"
    };

    function ye(t) {
        return t.replace(/start|end/g, (function (t) {
            return ve[t]
        }))
    }

    function we(t) {
        var e = Bt(t);
        return {
            scrollLeft: e.pageXOffset,
            scrollTop: e.pageYOffset
        }
    }

    function Ae(t) {
        return Gt(ie(t)).left + we(t).scrollLeft
    }

    function Ee(t) {
        var e = te(t),
            i = e.overflow,
            n = e.overflowX,
            s = e.overflowY;
        return /auto|scroll|overlay|hidden/.test(i + s + n)
    }

    function Te(t) {
        return ["html", "body", "#document"].indexOf(Wt(t)) >= 0 ? t.ownerDocument.body : zt(t) && Ee(t) ? t : Te(ne(t))
    }

    function Ce(t, e) {
        var i;
        void 0 === e && (e = []);
        var n = Te(t),
            s = n === (null == (i = t.ownerDocument) ? void 0 : i.body),
            o = Bt(n),
            r = s ? [o].concat(o.visualViewport || [], Ee(n) ? n : []) : n,
            a = e.concat(r);
        return s ? a : a.concat(Ce(ne(r)))
    }

    function Oe(t) {
        return Object.assign({}, t, {
            left: t.x,
            top: t.y,
            right: t.x + t.width,
            bottom: t.y + t.height
        })
    }

    function xe(t, e, i) {
        return e === Tt ? Oe(function (t, e) {
            var i = Bt(t),
                n = ie(t),
                s = i.visualViewport,
                o = n.clientWidth,
                r = n.clientHeight,
                a = 0,
                l = 0;
            if (s) {
                o = s.width, r = s.height;
                var c = Ut();
                (c || !c && "fixed" === e) && (a = s.offsetLeft, l = s.offsetTop)
            }
            return {
                width: o,
                height: r,
                x: a + Ae(t),
                y: l
            }
        }(t, i)) : Ft(e) ? function (t, e) {
            var i = Gt(t, !1, "fixed" === e);
            return i.top = i.top + t.clientTop, i.left = i.left + t.clientLeft, i.bottom = i.top + t.clientHeight, i.right = i.left + t.clientWidth, i.width = t.clientWidth, i.height = t.clientHeight, i.x = i.left, i.y = i.top, i
        }(e, i) : Oe(function (t) {
            var e, i = ie(t),
                n = we(t),
                s = null == (e = t.ownerDocument) ? void 0 : e.body,
                o = Kt(i.scrollWidth, i.clientWidth, s ? s.scrollWidth : 0, s ? s.clientWidth : 0),
                r = Kt(i.scrollHeight, i.clientHeight, s ? s.scrollHeight : 0, s ? s.clientHeight : 0),
                a = -n.scrollLeft + Ae(t),
                l = -n.scrollTop;
            return "rtl" === te(s || i).direction && (a += Kt(i.clientWidth, s ? s.clientWidth : 0) - o), {
                width: o,
                height: r,
                x: a,
                y: l
            }
        }(ie(t)))
    }

    function ke(t) {
        var e, i = t.reference,
            n = t.element,
            s = t.placement,
            o = s ? Vt(s) : null,
            r = s ? de(s) : null,
            a = i.x + i.width / 2 - n.width / 2,
            l = i.y + i.height / 2 - n.height / 2;
        switch (o) {
            case gt:
                e = {
                    x: a,
                    y: i.y - n.height
                };
                break;
            case mt:
                e = {
                    x: a,
                    y: i.y + i.height
                };
                break;
            case _t:
                e = {
                    x: i.x + i.width,
                    y: l
                };
                break;
            case bt:
                e = {
                    x: i.x - n.width,
                    y: l
                };
                break;
            default:
                e = {
                    x: i.x,
                    y: i.y
                }
        }
        var c = o ? re(o) : null;
        if (null != c) {
            var h = "y" === c ? "height" : "width";
            switch (r) {
                case wt:
                    e[c] = e[c] - (i[h] / 2 - n[h] / 2);
                    break;
                case At:
                    e[c] = e[c] + (i[h] / 2 - n[h] / 2)
            }
        }
        return e
    }

    function Le(t, e) {
        void 0 === e && (e = {});
        var i = e,
            n = i.placement,
            s = void 0 === n ? t.placement : n,
            o = i.strategy,
            r = void 0 === o ? t.strategy : o,
            a = i.boundary,
            l = void 0 === a ? Et : a,
            c = i.rootBoundary,
            h = void 0 === c ? Tt : c,
            d = i.elementContext,
            u = void 0 === d ? Ct : d,
            f = i.altBoundary,
            p = void 0 !== f && f,
            g = i.padding,
            m = void 0 === g ? 0 : g,
            _ = le("number" != typeof m ? m : ce(m, yt)),
            b = u === Ct ? Ot : Ct,
            v = t.rects.popper,
            y = t.elements[p ? b : u],
            w = function (t, e, i, n) {
                var s = "clippingParents" === e ? function (t) {
                        var e = Ce(ne(t)),
                            i = ["absolute", "fixed"].indexOf(te(t).position) >= 0 && zt(t) ? oe(t) : t;
                        return Ft(i) ? e.filter((function (t) {
                            return Ft(t) && Zt(t, i) && "body" !== Wt(t)
                        })) : []
                    }(t) : [].concat(e),
                    o = [].concat(s, [i]),
                    r = o[0],
                    a = o.reduce((function (e, i) {
                        var s = xe(t, i, n);
                        return e.top = Kt(s.top, e.top), e.right = Qt(s.right, e.right), e.bottom = Qt(s.bottom, e.bottom), e.left = Kt(s.left, e.left), e
                    }), xe(t, r, n));
                return a.width = a.right - a.left, a.height = a.bottom - a.top, a.x = a.left, a.y = a.top, a
            }(Ft(y) ? y : y.contextElement || ie(t.elements.popper), l, h, r),
            A = Gt(t.elements.reference),
            E = ke({
                reference: A,
                element: v,
                strategy: "absolute",
                placement: s
            }),
            T = Oe(Object.assign({}, v, E)),
            C = u === Ct ? T : A,
            O = {
                top: w.top - C.top + _.top,
                bottom: C.bottom - w.bottom + _.bottom,
                left: w.left - C.left + _.left,
                right: C.right - w.right + _.right
            },
            x = t.modifiersData.offset;
        if (u === Ct && x) {
            var k = x[s];
            Object.keys(O).forEach((function (t) {
                var e = [_t, mt].indexOf(t) >= 0 ? 1 : -1,
                    i = [gt, mt].indexOf(t) >= 0 ? "y" : "x";
                O[t] += k[i] * e
            }))
        }
        return O
    }

    function De(t, e) {
        void 0 === e && (e = {});
        var i = e,
            n = i.placement,
            s = i.boundary,
            o = i.rootBoundary,
            r = i.padding,
            a = i.flipVariations,
            l = i.allowedAutoPlacements,
            c = void 0 === l ? kt : l,
            h = de(n),
            d = h ? a ? xt : xt.filter((function (t) {
                return de(t) === h
            })) : yt,
            u = d.filter((function (t) {
                return c.indexOf(t) >= 0
            }));
        0 === u.length && (u = d);
        var f = u.reduce((function (e, i) {
            return e[i] = Le(t, {
                placement: i,
                boundary: s,
                rootBoundary: o,
                padding: r
            })[Vt(i)], e
        }), {});
        return Object.keys(f).sort((function (t, e) {
            return f[t] - f[e]
        }))
    }
    const Se = {
        name: "flip",
        enabled: !0,
        phase: "main",
        fn: function (t) {
            var e = t.state,
                i = t.options,
                n = t.name;
            if (!e.modifiersData[n]._skip) {
                for (var s = i.mainAxis, o = void 0 === s || s, r = i.altAxis, a = void 0 === r || r, l = i.fallbackPlacements, c = i.padding, h = i.boundary, d = i.rootBoundary, u = i.altBoundary, f = i.flipVariations, p = void 0 === f || f, g = i.allowedAutoPlacements, m = e.options.placement, _ = Vt(m), b = l || (_ !== m && p ? function (t) {
                        if (Vt(t) === vt) return [];
                        var e = be(t);
                        return [ye(t), e, ye(e)]
                    }(m) : [be(m)]), v = [m].concat(b).reduce((function (t, i) {
                        return t.concat(Vt(i) === vt ? De(e, {
                            placement: i,
                            boundary: h,
                            rootBoundary: d,
                            padding: c,
                            flipVariations: p,
                            allowedAutoPlacements: g
                        }) : i)
                    }), []), y = e.rects.reference, w = e.rects.popper, A = new Map, E = !0, T = v[0], C = 0; C < v.length; C++) {
                    var O = v[C],
                        x = Vt(O),
                        k = de(O) === wt,
                        L = [gt, mt].indexOf(x) >= 0,
                        D = L ? "width" : "height",
                        S = Le(e, {
                            placement: O,
                            boundary: h,
                            rootBoundary: d,
                            altBoundary: u,
                            padding: c
                        }),
                        I = L ? k ? _t : bt : k ? mt : gt;
                    y[D] > w[D] && (I = be(I));
                    var N = be(I),
                        P = [];
                    if (o && P.push(S[x] <= 0), a && P.push(S[I] <= 0, S[N] <= 0), P.every((function (t) {
                            return t
                        }))) {
                        T = O, E = !1;
                        break
                    }
                    A.set(O, P)
                }
                if (E)
                    for (var j = function (t) {
                            var e = v.find((function (e) {
                                var i = A.get(e);
                                if (i) return i.slice(0, t).every((function (t) {
                                    return t
                                }))
                            }));
                            if (e) return T = e, "break"
                        }, M = p ? 3 : 1; M > 0 && "break" !== j(M); M--);
                e.placement !== T && (e.modifiersData[n]._skip = !0, e.placement = T, e.reset = !0)
            }
        },
        requiresIfExists: ["offset"],
        data: {
            _skip: !1
        }
    };

    function Ie(t, e, i) {
        return void 0 === i && (i = {
            x: 0,
            y: 0
        }), {
            top: t.top - e.height - i.y,
            right: t.right - e.width + i.x,
            bottom: t.bottom - e.height + i.y,
            left: t.left - e.width - i.x
        }
    }

    function Ne(t) {
        return [gt, _t, mt, bt].some((function (e) {
            return t[e] >= 0
        }))
    }
    const Pe = {
            name: "hide",
            enabled: !0,
            phase: "main",
            requiresIfExists: ["preventOverflow"],
            fn: function (t) {
                var e = t.state,
                    i = t.name,
                    n = e.rects.reference,
                    s = e.rects.popper,
                    o = e.modifiersData.preventOverflow,
                    r = Le(e, {
                        elementContext: "reference"
                    }),
                    a = Le(e, {
                        altBoundary: !0
                    }),
                    l = Ie(r, n),
                    c = Ie(a, s, o),
                    h = Ne(l),
                    d = Ne(c);
                e.modifiersData[i] = {
                    referenceClippingOffsets: l,
                    popperEscapeOffsets: c,
                    isReferenceHidden: h,
                    hasPopperEscaped: d
                }, e.attributes.popper = Object.assign({}, e.attributes.popper, {
                    "data-popper-reference-hidden": h,
                    "data-popper-escaped": d
                })
            }
        },
        je = {
            name: "offset",
            enabled: !0,
            phase: "main",
            requires: ["popperOffsets"],
            fn: function (t) {
                var e = t.state,
                    i = t.options,
                    n = t.name,
                    s = i.offset,
                    o = void 0 === s ? [0, 0] : s,
                    r = kt.reduce((function (t, i) {
                        return t[i] = function (t, e, i) {
                            var n = Vt(t),
                                s = [bt, gt].indexOf(n) >= 0 ? -1 : 1,
                                o = "function" == typeof i ? i(Object.assign({}, e, {
                                    placement: t
                                })) : i,
                                r = o[0],
                                a = o[1];
                            return r = r || 0, a = (a || 0) * s, [bt, _t].indexOf(n) >= 0 ? {
                                x: a,
                                y: r
                            } : {
                                x: r,
                                y: a
                            }
                        }(i, e.rects, o), t
                    }), {}),
                    a = r[e.placement],
                    l = a.x,
                    c = a.y;
                null != e.modifiersData.popperOffsets && (e.modifiersData.popperOffsets.x += l, e.modifiersData.popperOffsets.y += c), e.modifiersData[n] = r
            }
        },
        Me = {
            name: "popperOffsets",
            enabled: !0,
            phase: "read",
            fn: function (t) {
                var e = t.state,
                    i = t.name;
                e.modifiersData[i] = ke({
                    reference: e.rects.reference,
                    element: e.rects.popper,
                    strategy: "absolute",
                    placement: e.placement
                })
            },
            data: {}
        },
        He = {
            name: "preventOverflow",
            enabled: !0,
            phase: "main",
            fn: function (t) {
                var e = t.state,
                    i = t.options,
                    n = t.name,
                    s = i.mainAxis,
                    o = void 0 === s || s,
                    r = i.altAxis,
                    a = void 0 !== r && r,
                    l = i.boundary,
                    c = i.rootBoundary,
                    h = i.altBoundary,
                    d = i.padding,
                    u = i.tether,
                    f = void 0 === u || u,
                    p = i.tetherOffset,
                    g = void 0 === p ? 0 : p,
                    m = Le(e, {
                        boundary: l,
                        rootBoundary: c,
                        padding: d,
                        altBoundary: h
                    }),
                    _ = Vt(e.placement),
                    b = de(e.placement),
                    v = !b,
                    y = re(_),
                    w = "x" === y ? "y" : "x",
                    A = e.modifiersData.popperOffsets,
                    E = e.rects.reference,
                    T = e.rects.popper,
                    C = "function" == typeof g ? g(Object.assign({}, e.rects, {
                        placement: e.placement
                    })) : g,
                    O = "number" == typeof C ? {
                        mainAxis: C,
                        altAxis: C
                    } : Object.assign({
                        mainAxis: 0,
                        altAxis: 0
                    }, C),
                    x = e.modifiersData.offset ? e.modifiersData.offset[e.placement] : null,
                    k = {
                        x: 0,
                        y: 0
                    };
                if (A) {
                    if (o) {
                        var L, D = "y" === y ? gt : bt,
                            S = "y" === y ? mt : _t,
                            I = "y" === y ? "height" : "width",
                            N = A[y],
                            P = N + m[D],
                            j = N - m[S],
                            M = f ? -T[I] / 2 : 0,
                            H = b === wt ? E[I] : T[I],
                            $ = b === wt ? -T[I] : -E[I],
                            W = e.elements.arrow,
                            B = f && W ? Jt(W) : {
                                width: 0,
                                height: 0
                            },
                            F = e.modifiersData["arrow#persistent"] ? e.modifiersData["arrow#persistent"].padding : {
                                top: 0,
                                right: 0,
                                bottom: 0,
                                left: 0
                            },
                            z = F[D],
                            q = F[S],
                            R = ae(0, E[I], B[I]),
                            V = v ? E[I] / 2 - M - R - z - O.mainAxis : H - R - z - O.mainAxis,
                            K = v ? -E[I] / 2 + M + R + q + O.mainAxis : $ + R + q + O.mainAxis,
                            Q = e.elements.arrow && oe(e.elements.arrow),
                            X = Q ? "y" === y ? Q.clientTop || 0 : Q.clientLeft || 0 : 0,
                            Y = null != (L = null == x ? void 0 : x[y]) ? L : 0,
                            U = N + K - Y,
                            G = ae(f ? Qt(P, N + V - Y - X) : P, N, f ? Kt(j, U) : j);
                        A[y] = G, k[y] = G - N
                    }
                    if (a) {
                        var J, Z = "x" === y ? gt : bt,
                            tt = "x" === y ? mt : _t,
                            et = A[w],
                            it = "y" === w ? "height" : "width",
                            nt = et + m[Z],
                            st = et - m[tt],
                            ot = -1 !== [gt, bt].indexOf(_),
                            rt = null != (J = null == x ? void 0 : x[w]) ? J : 0,
                            at = ot ? nt : et - E[it] - T[it] - rt + O.altAxis,
                            lt = ot ? et + E[it] + T[it] - rt - O.altAxis : st,
                            ct = f && ot ? function (t, e, i) {
                                var n = ae(t, e, i);
                                return n > i ? i : n
                            }(at, et, lt) : ae(f ? at : nt, et, f ? lt : st);
                        A[w] = ct, k[w] = ct - et
                    }
                    e.modifiersData[n] = k
                }
            },
            requiresIfExists: ["offset"]
        };

    function $e(t, e, i) {
        void 0 === i && (i = !1);
        var n, s, o = zt(e),
            r = zt(e) && function (t) {
                var e = t.getBoundingClientRect(),
                    i = Xt(e.width) / t.offsetWidth || 1,
                    n = Xt(e.height) / t.offsetHeight || 1;
                return 1 !== i || 1 !== n
            }(e),
            a = ie(e),
            l = Gt(t, r, i),
            c = {
                scrollLeft: 0,
                scrollTop: 0
            },
            h = {
                x: 0,
                y: 0
            };
        return (o || !o && !i) && (("body" !== Wt(e) || Ee(a)) && (c = (n = e) !== Bt(n) && zt(n) ? {
            scrollLeft: (s = n).scrollLeft,
            scrollTop: s.scrollTop
        } : we(n)), zt(e) ? ((h = Gt(e, !0)).x += e.clientLeft, h.y += e.clientTop) : a && (h.x = Ae(a))), {
            x: l.left + c.scrollLeft - h.x,
            y: l.top + c.scrollTop - h.y,
            width: l.width,
            height: l.height
        }
    }

    function We(t) {
        var e = new Map,
            i = new Set,
            n = [];

        function s(t) {
            i.add(t.name), [].concat(t.requires || [], t.requiresIfExists || []).forEach((function (t) {
                if (!i.has(t)) {
                    var n = e.get(t);
                    n && s(n)
                }
            })), n.push(t)
        }
        return t.forEach((function (t) {
            e.set(t.name, t)
        })), t.forEach((function (t) {
            i.has(t.name) || s(t)
        })), n
    }
    var Be = {
        placement: "bottom",
        modifiers: [],
        strategy: "absolute"
    };

    function Fe() {
        for (var t = arguments.length, e = new Array(t), i = 0; i < t; i++) e[i] = arguments[i];
        return !e.some((function (t) {
            return !(t && "function" == typeof t.getBoundingClientRect)
        }))
    }

    function ze(t) {
        void 0 === t && (t = {});
        var e = t,
            i = e.defaultModifiers,
            n = void 0 === i ? [] : i,
            s = e.defaultOptions,
            o = void 0 === s ? Be : s;
        return function (t, e, i) {
            void 0 === i && (i = o);
            var s, r, a = {
                    placement: "bottom",
                    orderedModifiers: [],
                    options: Object.assign({}, Be, o),
                    modifiersData: {},
                    elements: {
                        reference: t,
                        popper: e
                    },
                    attributes: {},
                    styles: {}
                },
                l = [],
                c = !1,
                h = {
                    state: a,
                    setOptions: function (i) {
                        var s = "function" == typeof i ? i(a.options) : i;
                        d(), a.options = Object.assign({}, o, a.options, s), a.scrollParents = {
                            reference: Ft(t) ? Ce(t) : t.contextElement ? Ce(t.contextElement) : [],
                            popper: Ce(e)
                        };
                        var r, c, u = function (t) {
                            var e = We(t);
                            return $t.reduce((function (t, i) {
                                return t.concat(e.filter((function (t) {
                                    return t.phase === i
                                })))
                            }), [])
                        }((r = [].concat(n, a.options.modifiers), c = r.reduce((function (t, e) {
                            var i = t[e.name];
                            return t[e.name] = i ? Object.assign({}, i, e, {
                                options: Object.assign({}, i.options, e.options),
                                data: Object.assign({}, i.data, e.data)
                            }) : e, t
                        }), {}), Object.keys(c).map((function (t) {
                            return c[t]
                        }))));
                        return a.orderedModifiers = u.filter((function (t) {
                            return t.enabled
                        })), a.orderedModifiers.forEach((function (t) {
                            var e = t.name,
                                i = t.options,
                                n = void 0 === i ? {} : i,
                                s = t.effect;
                            if ("function" == typeof s) {
                                var o = s({
                                    state: a,
                                    name: e,
                                    instance: h,
                                    options: n
                                });
                                l.push(o || function () {})
                            }
                        })), h.update()
                    },
                    forceUpdate: function () {
                        if (!c) {
                            var t = a.elements,
                                e = t.reference,
                                i = t.popper;
                            if (Fe(e, i)) {
                                a.rects = {
                                    reference: $e(e, oe(i), "fixed" === a.options.strategy),
                                    popper: Jt(i)
                                }, a.reset = !1, a.placement = a.options.placement, a.orderedModifiers.forEach((function (t) {
                                    return a.modifiersData[t.name] = Object.assign({}, t.data)
                                }));
                                for (var n = 0; n < a.orderedModifiers.length; n++)
                                    if (!0 !== a.reset) {
                                        var s = a.orderedModifiers[n],
                                            o = s.fn,
                                            r = s.options,
                                            l = void 0 === r ? {} : r,
                                            d = s.name;
                                        "function" == typeof o && (a = o({
                                            state: a,
                                            options: l,
                                            name: d,
                                            instance: h
                                        }) || a)
                                    } else a.reset = !1, n = -1
                            }
                        }
                    },
                    update: (s = function () {
                        return new Promise((function (t) {
                            h.forceUpdate(), t(a)
                        }))
                    }, function () {
                        return r || (r = new Promise((function (t) {
                            Promise.resolve().then((function () {
                                r = void 0, t(s())
                            }))
                        }))), r
                    }),
                    destroy: function () {
                        d(), c = !0
                    }
                };
            if (!Fe(t, e)) return h;

            function d() {
                l.forEach((function (t) {
                    return t()
                })), l = []
            }
            return h.setOptions(i).then((function (t) {
                !c && i.onFirstUpdate && i.onFirstUpdate(t)
            })), h
        }
    }
    var qe = ze(),
        Re = ze({
            defaultModifiers: [me, Me, pe, Rt]
        }),
        Ve = ze({
            defaultModifiers: [me, Me, pe, Rt, je, Se, He, he, Pe]
        });
    const Ke = Object.freeze(Object.defineProperty({
            __proto__: null,
            popperGenerator: ze,
            detectOverflow: Le,
            createPopperBase: qe,
            createPopper: Ve,
            createPopperLite: Re,
            top: gt,
            bottom: mt,
            right: _t,
            left: bt,
            auto: vt,
            basePlacements: yt,
            start: wt,
            end: At,
            clippingParents: Et,
            viewport: Tt,
            popper: Ct,
            reference: Ot,
            variationPlacements: xt,
            placements: kt,
            beforeRead: Lt,
            read: Dt,
            afterRead: St,
            beforeMain: It,
            main: Nt,
            afterMain: Pt,
            beforeWrite: jt,
            write: Mt,
            afterWrite: Ht,
            modifierPhases: $t,
            applyStyles: Rt,
            arrow: he,
            computeStyles: pe,
            eventListeners: me,
            flip: Se,
            hide: Pe,
            offset: je,
            popperOffsets: Me,
            preventOverflow: He
        }, Symbol.toStringTag, {
            value: "Module"
        })),
        Qe = "dropdown",
        Xe = "ArrowUp",
        Ye = "ArrowDown",
        Ue = "click.bs.dropdown.data-api",
        Ge = "keydown.bs.dropdown.data-api",
        Je = "show",
        Ze = '[data-bs-toggle="dropdown"]:not(.disabled):not(:disabled)',
        ti = `${Ze}.show`,
        ei = ".dropdown-menu",
        ii = p() ? "top-end" : "top-start",
        ni = p() ? "top-start" : "top-end",
        si = p() ? "bottom-end" : "bottom-start",
        oi = p() ? "bottom-start" : "bottom-end",
        ri = p() ? "left-start" : "right-start",
        ai = p() ? "right-start" : "left-start",
        li = {
            autoClose: !0,
            boundary: "clippingParents",
            display: "dynamic",
            offset: [0, 2],
            popperConfig: null,
            reference: "toggle"
        },
        ci = {
            autoClose: "(boolean|string)",
            boundary: "(string|element)",
            display: "string",
            offset: "(array|string|function)",
            popperConfig: "(null|object|function)",
            reference: "(string|element|object)"
        };
    class hi extends z {
        constructor(t, e) {
            super(t, e), this._popper = null, this._parent = this._element.parentNode, this._menu = Q.next(this._element, ei)[0] || Q.prev(this._element, ei)[0] || Q.findOne(ei, this._parent), this._inNavbar = this._detectNavbar()
        }
        static get Default() {
            return li
        }
        static get DefaultType() {
            return ci
        }
        static get NAME() {
            return Qe
        }
        toggle() {
            return this._isShown() ? this.hide() : this.show()
        }
        show() {
            if (l(this._element) || this._isShown()) return;
            const t = {
                relatedTarget: this._element
            };
            if (!P.trigger(this._element, "show.bs.dropdown", t).defaultPrevented) {
                if (this._createPopper(), "ontouchstart" in document.documentElement && !this._parent.closest(".navbar-nav"))
                    for (const t of [].concat(...document.body.children)) P.on(t, "mouseover", h);
                this._element.focus(), this._element.setAttribute("aria-expanded", !0), this._menu.classList.add(Je), this._element.classList.add(Je), P.trigger(this._element, "shown.bs.dropdown", t)
            }
        }
        hide() {
            if (l(this._element) || !this._isShown()) return;
            const t = {
                relatedTarget: this._element
            };
            this._completeHide(t)
        }
        dispose() {
            this._popper && this._popper.destroy(), super.dispose()
        }
        update() {
            this._inNavbar = this._detectNavbar(), this._popper && this._popper.update()
        }
        _completeHide(t) {
            if (!P.trigger(this._element, "hide.bs.dropdown", t).defaultPrevented) {
                if ("ontouchstart" in document.documentElement)
                    for (const t of [].concat(...document.body.children)) P.off(t, "mouseover", h);
                this._popper && this._popper.destroy(), this._menu.classList.remove(Je), this._element.classList.remove(Je), this._element.setAttribute("aria-expanded", "false"), B.removeDataAttribute(this._menu, "popper"), P.trigger(this._element, "hidden.bs.dropdown", t)
            }
        }
        _getConfig(t) {
            if ("object" == typeof (t = super._getConfig(t)).reference && !o(t.reference) && "function" != typeof t.reference.getBoundingClientRect) throw new TypeError(`${Qe.toUpperCase()}: Option "reference" provided type "object" without a required "getBoundingClientRect" method.`);
            return t
        }
        _createPopper() {
            if (void 0 === Ke) throw new TypeError("Bootstrap's dropdowns require Popper (https://popper.js.org)");
            let t = this._element;
            "parent" === this._config.reference ? t = this._parent : o(this._config.reference) ? t = r(this._config.reference) : "object" == typeof this._config.reference && (t = this._config.reference);
            const e = this._getPopperConfig();
            this._popper = Ve(t, this._menu, e)
        }
        _isShown() {
            return this._menu.classList.contains(Je)
        }
        _getPlacement() {
            const t = this._parent;
            if (t.classList.contains("dropend")) return ri;
            if (t.classList.contains("dropstart")) return ai;
            if (t.classList.contains("dropup-center")) return "top";
            if (t.classList.contains("dropdown-center")) return "bottom";
            const e = "end" === getComputedStyle(this._menu).getPropertyValue("--bs-position").trim();
            return t.classList.contains("dropup") ? e ? ni : ii : e ? oi : si
        }
        _detectNavbar() {
            return null !== this._element.closest(".navbar")
        }
        _getOffset() {
            const {
                offset: t
            } = this._config;
            return "string" == typeof t ? t.split(",").map((t => Number.parseInt(t, 10))) : "function" == typeof t ? e => t(e, this._element) : t
        }
        _getPopperConfig() {
            const t = {
                placement: this._getPlacement(),
                modifiers: [{
                    name: "preventOverflow",
                    options: {
                        boundary: this._config.boundary
                    }
                }, {
                    name: "offset",
                    options: {
                        offset: this._getOffset()
                    }
                }]
            };
            return (this._inNavbar || "static" === this._config.display) && (B.setDataAttribute(this._menu, "popper", "static"), t.modifiers = [{
                name: "applyStyles",
                enabled: !1
            }]), {
                ...t,
                ..."function" == typeof this._config.popperConfig ? this._config.popperConfig(t) : this._config.popperConfig
            }
        }
        _selectMenuItem({
            key: t,
            target: e
        }) {
            const i = Q.find(".dropdown-menu .dropdown-item:not(.disabled):not(:disabled)", this._menu).filter((t => a(t)));
            i.length && b(i, e, t === Ye, !i.includes(e)).focus()
        }
        static jQueryInterface(t) {
            return this.each((function () {
                const e = hi.getOrCreateInstance(this, t);
                if ("string" == typeof t) {
                    if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
                    e[t]()
                }
            }))
        }
        static clearMenus(t) {
            if (2 === t.button || "keyup" === t.type && "Tab" !== t.key) return;
            const e = Q.find(ti);
            for (const i of e) {
                const e = hi.getInstance(i);
                if (!e || !1 === e._config.autoClose) continue;
                const n = t.composedPath(),
                    s = n.includes(e._menu);
                if (n.includes(e._element) || "inside" === e._config.autoClose && !s || "outside" === e._config.autoClose && s) continue;
                if (e._menu.contains(t.target) && ("keyup" === t.type && "Tab" === t.key || /input|select|option|textarea|form/i.test(t.target.tagName))) continue;
                const o = {
                    relatedTarget: e._element
                };
                "click" === t.type && (o.clickEvent = t), e._completeHide(o)
            }
        }
        static dataApiKeydownHandler(t) {
            const e = /input|textarea/i.test(t.target.tagName),
                i = "Escape" === t.key,
                n = [Xe, Ye].includes(t.key);
            if (!n && !i) return;
            if (e && !i) return;
            t.preventDefault();
            const s = this.matches(Ze) ? this : Q.prev(this, Ze)[0] || Q.next(this, Ze)[0] || Q.findOne(Ze, t.delegateTarget.parentNode),
                o = hi.getOrCreateInstance(s);
            if (n) return t.stopPropagation(), o.show(), void o._selectMenuItem(t);
            o._isShown() && (t.stopPropagation(), o.hide(), s.focus())
        }
    }
    P.on(document, Ge, Ze, hi.dataApiKeydownHandler), P.on(document, Ge, ei, hi.dataApiKeydownHandler), P.on(document, Ue, hi.clearMenus), P.on(document, "keyup.bs.dropdown.data-api", hi.clearMenus), P.on(document, Ue, Ze, (function (t) {
        t.preventDefault(), hi.getOrCreateInstance(this).toggle()
    })), g(hi);
    const di = ".fixed-top, .fixed-bottom, .is-fixed, .sticky-top",
        ui = ".sticky-top",
        fi = "padding-right",
        pi = "margin-right";
    class gi {
        constructor() {
            this._element = document.body
        }
        getWidth() {
            const t = document.documentElement.clientWidth;
            return Math.abs(window.innerWidth - t)
        }
        hide() {
            const t = this.getWidth();
            this._disableOverFlow(), this._setElementAttributes(this._element, fi, (e => e + t)), this._setElementAttributes(di, fi, (e => e + t)), this._setElementAttributes(ui, pi, (e => e - t))
        }
        reset() {
            this._resetElementAttributes(this._element, "overflow"), this._resetElementAttributes(this._element, fi), this._resetElementAttributes(di, fi), this._resetElementAttributes(ui, pi)
        }
        isOverflowing() {
            return this.getWidth() > 0
        }
        _disableOverFlow() {
            this._saveInitialAttribute(this._element, "overflow"), this._element.style.overflow = "hidden"
        }
        _setElementAttributes(t, e, i) {
            const n = this.getWidth();
            this._applyManipulationCallback(t, (t => {
                if (t !== this._element && window.innerWidth > t.clientWidth + n) return;
                this._saveInitialAttribute(t, e);
                const s = window.getComputedStyle(t).getPropertyValue(e);
                t.style.setProperty(e, `${i(Number.parseFloat(s))}px`)
            }))
        }
        _saveInitialAttribute(t, e) {
            const i = t.style.getPropertyValue(e);
            i && B.setDataAttribute(t, e, i)
        }
        _resetElementAttributes(t, e) {
            this._applyManipulationCallback(t, (t => {
                const i = B.getDataAttribute(t, e);
                null !== i ? (B.removeDataAttribute(t, e), t.style.setProperty(e, i)) : t.style.removeProperty(e)
            }))
        }
        _applyManipulationCallback(t, e) {
            if (o(t)) e(t);
            else
                for (const i of Q.find(t, this._element)) e(i)
        }
    }
    const mi = "show",
        _i = "mousedown.bs.backdrop",
        bi = {
            className: "modal-backdrop",
            clickCallback: null,
            isAnimated: !1,
            isVisible: !0,
            rootElement: "body"
        },
        vi = {
            className: "string",
            clickCallback: "(function|null)",
            isAnimated: "boolean",
            isVisible: "boolean",
            rootElement: "(element|string)"
        };
    class yi extends F {
        constructor(t) {
            super(), this._config = this._getConfig(t), this._isAppended = !1, this._element = null
        }
        static get Default() {
            return bi
        }
        static get DefaultType() {
            return vi
        }
        static get NAME() {
            return "backdrop"
        }
        show(t) {
            if (!this._config.isVisible) return void m(t);
            this._append();
            const e = this._getElement();
            this._config.isAnimated && d(e), e.classList.add(mi), this._emulateAnimation((() => {
                m(t)
            }))
        }
        hide(t) {
            this._config.isVisible ? (this._getElement().classList.remove(mi), this._emulateAnimation((() => {
                this.dispose(), m(t)
            }))) : m(t)
        }
        dispose() {
            this._isAppended && (P.off(this._element, _i), this._element.remove(), this._isAppended = !1)
        }
        _getElement() {
            if (!this._element) {
                const t = document.createElement("div");
                t.className = this._config.className, this._config.isAnimated && t.classList.add("fade"), this._element = t
            }
            return this._element
        }
        _configAfterMerge(t) {
            return t.rootElement = r(t.rootElement), t
        }
        _append() {
            if (this._isAppended) return;
            const t = this._getElement();
            this._config.rootElement.append(t), P.on(t, _i, (() => {
                m(this._config.clickCallback)
            })), this._isAppended = !0
        }
        _emulateAnimation(t) {
            _(t, this._getElement(), this._config.isAnimated)
        }
    }
    const wi = ".bs.focustrap",
        Ai = "backward",
        Ei = {
            autofocus: !0,
            trapElement: null
        },
        Ti = {
            autofocus: "boolean",
            trapElement: "element"
        };
    class Ci extends F {
        constructor(t) {
            super(), this._config = this._getConfig(t), this._isActive = !1, this._lastTabNavDirection = null
        }
        static get Default() {
            return Ei
        }
        static get DefaultType() {
            return Ti
        }
        static get NAME() {
            return "focustrap"
        }
        activate() {
            this._isActive || (this._config.autofocus && this._config.trapElement.focus(), P.off(document, wi), P.on(document, "focusin.bs.focustrap", (t => this._handleFocusin(t))), P.on(document, "keydown.tab.bs.focustrap", (t => this._handleKeydown(t))), this._isActive = !0)
        }
        deactivate() {
            this._isActive && (this._isActive = !1, P.off(document, wi))
        }
        _handleFocusin(t) {
            const {
                trapElement: e
            } = this._config;
            if (t.target === document || t.target === e || e.contains(t.target)) return;
            const i = Q.focusableChildren(e);
            0 === i.length ? e.focus() : this._lastTabNavDirection === Ai ? i[i.length - 1].focus() : i[0].focus()
        }
        _handleKeydown(t) {
            "Tab" === t.key && (this._lastTabNavDirection = t.shiftKey ? Ai : "forward")
        }
    }
    const Oi = "hidden.bs.modal",
        xi = "show.bs.modal",
        ki = "modal-open",
        Li = "show",
        Di = "modal-static",
        Si = {
            backdrop: !0,
            focus: !0,
            keyboard: !0
        },
        Ii = {
            backdrop: "(boolean|string)",
            focus: "boolean",
            keyboard: "boolean"
        };
    class Ni extends z {
        constructor(t, e) {
            super(t, e), this._dialog = Q.findOne(".modal-dialog", this._element), this._backdrop = this._initializeBackDrop(), this._focustrap = this._initializeFocusTrap(), this._isShown = !1, this._isTransitioning = !1, this._scrollBar = new gi, this._addEventListeners()
        }
        static get Default() {
            return Si
        }
        static get DefaultType() {
            return Ii
        }
        static get NAME() {
            return "modal"
        }
        toggle(t) {
            return this._isShown ? this.hide() : this.show(t)
        }
        show(t) {
            this._isShown || this._isTransitioning || P.trigger(this._element, xi, {
                relatedTarget: t
            }).defaultPrevented || (this._isShown = !0, this._isTransitioning = !0, this._scrollBar.hide(), document.body.classList.add(ki), this._adjustDialog(), this._backdrop.show((() => this._showElement(t))))
        }
        hide() {
            this._isShown && !this._isTransitioning && (P.trigger(this._element, "hide.bs.modal").defaultPrevented || (this._isShown = !1, this._isTransitioning = !0, this._focustrap.deactivate(), this._element.classList.remove(Li), this._queueCallback((() => this._hideModal()), this._element, this._isAnimated())))
        }
        dispose() {
            for (const t of [window, this._dialog]) P.off(t, ".bs.modal");
            this._backdrop.dispose(), this._focustrap.deactivate(), super.dispose()
        }
        handleUpdate() {
            this._adjustDialog()
        }
        _initializeBackDrop() {
            return new yi({
                isVisible: Boolean(this._config.backdrop),
                isAnimated: this._isAnimated()
            })
        }
        _initializeFocusTrap() {
            return new Ci({
                trapElement: this._element
            })
        }
        _showElement(t) {
            document.body.contains(this._element) || document.body.append(this._element), this._element.style.display = "block", this._element.removeAttribute("aria-hidden"), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), this._element.scrollTop = 0;
            const e = Q.findOne(".modal-body", this._dialog);
            e && (e.scrollTop = 0), d(this._element), this._element.classList.add(Li), this._queueCallback((() => {
                this._config.focus && this._focustrap.activate(), this._isTransitioning = !1, P.trigger(this._element, "shown.bs.modal", {
                    relatedTarget: t
                })
            }), this._dialog, this._isAnimated())
        }
        _addEventListeners() {
            P.on(this._element, "keydown.dismiss.bs.modal", (t => {
                if ("Escape" === t.key) return this._config.keyboard ? (t.preventDefault(), void this.hide()) : void this._triggerBackdropTransition()
            })), P.on(window, "resize.bs.modal", (() => {
                this._isShown && !this._isTransitioning && this._adjustDialog()
            })), P.on(this._element, "mousedown.dismiss.bs.modal", (t => {
                P.one(this._element, "click.dismiss.bs.modal", (e => {
                    this._element === t.target && this._element === e.target && ("static" !== this._config.backdrop ? this._config.backdrop && this.hide() : this._triggerBackdropTransition())
                }))
            }))
        }
        _hideModal() {
            this._element.style.display = "none", this._element.setAttribute("aria-hidden", !0), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._isTransitioning = !1, this._backdrop.hide((() => {
                document.body.classList.remove(ki), this._resetAdjustments(), this._scrollBar.reset(), P.trigger(this._element, Oi)
            }))
        }
        _isAnimated() {
            return this._element.classList.contains("fade")
        }
        _triggerBackdropTransition() {
            if (P.trigger(this._element, "hidePrevented.bs.modal").defaultPrevented) return;
            const t = this._element.scrollHeight > document.documentElement.clientHeight,
                e = this._element.style.overflowY;
            "hidden" === e || this._element.classList.contains(Di) || (t || (this._element.style.overflowY = "hidden"), this._element.classList.add(Di), this._queueCallback((() => {
                this._element.classList.remove(Di), this._queueCallback((() => {
                    this._element.style.overflowY = e
                }), this._dialog)
            }), this._dialog), this._element.focus())
        }
        _adjustDialog() {
            const t = this._element.scrollHeight > document.documentElement.clientHeight,
                e = this._scrollBar.getWidth(),
                i = e > 0;
            if (i && !t) {
                const t = p() ? "paddingLeft" : "paddingRight";
                this._element.style[t] = `${e}px`
            }
            if (!i && t) {
                const t = p() ? "paddingRight" : "paddingLeft";
                this._element.style[t] = `${e}px`
            }
        }
        _resetAdjustments() {
            this._element.style.paddingLeft = "", this._element.style.paddingRight = ""
        }
        static jQueryInterface(t, e) {
            return this.each((function () {
                const i = Ni.getOrCreateInstance(this, t);
                if ("string" == typeof t) {
                    if (void 0 === i[t]) throw new TypeError(`No method named "${t}"`);
                    i[t](e)
                }
            }))
        }
    }
    P.on(document, "click.bs.modal.data-api", '[data-bs-toggle="modal"]', (function (t) {
        const e = n(this);
        ["A", "AREA"].includes(this.tagName) && t.preventDefault(), P.one(e, xi, (t => {
            t.defaultPrevented || P.one(e, Oi, (() => {
                a(this) && this.focus()
            }))
        }));
        const i = Q.findOne(".modal.show");
        i && Ni.getInstance(i).hide(), Ni.getOrCreateInstance(e).toggle(this)
    })), q(Ni), g(Ni);
    const Pi = "show",
        ji = "showing",
        Mi = "hiding",
        Hi = ".offcanvas.show",
        $i = "hidePrevented.bs.offcanvas",
        Wi = "hidden.bs.offcanvas",
        Bi = {
            backdrop: !0,
            keyboard: !0,
            scroll: !1
        },
        Fi = {
            backdrop: "(boolean|string)",
            keyboard: "boolean",
            scroll: "boolean"
        };
    class zi extends z {
        constructor(t, e) {
            super(t, e), this._isShown = !1, this._backdrop = this._initializeBackDrop(), this._focustrap = this._initializeFocusTrap(), this._addEventListeners()
        }
        static get Default() {
            return Bi
        }
        static get DefaultType() {
            return Fi
        }
        static get NAME() {
            return "offcanvas"
        }
        toggle(t) {
            return this._isShown ? this.hide() : this.show(t)
        }
        show(t) {
            this._isShown || P.trigger(this._element, "show.bs.offcanvas", {
                relatedTarget: t
            }).defaultPrevented || (this._isShown = !0, this._backdrop.show(), this._config.scroll || (new gi).hide(), this._element.setAttribute("aria-modal", !0), this._element.setAttribute("role", "dialog"), this._element.classList.add(ji), this._queueCallback((() => {
                this._config.scroll && !this._config.backdrop || this._focustrap.activate(), this._element.classList.add(Pi), this._element.classList.remove(ji), P.trigger(this._element, "shown.bs.offcanvas", {
                    relatedTarget: t
                })
            }), this._element, !0))
        }
        hide() {
            this._isShown && (P.trigger(this._element, "hide.bs.offcanvas").defaultPrevented || (this._focustrap.deactivate(), this._element.blur(), this._isShown = !1, this._element.classList.add(Mi), this._backdrop.hide(), this._queueCallback((() => {
                this._element.classList.remove(Pi, Mi), this._element.removeAttribute("aria-modal"), this._element.removeAttribute("role"), this._config.scroll || (new gi).reset(), P.trigger(this._element, Wi)
            }), this._element, !0)))
        }
        dispose() {
            this._backdrop.dispose(), this._focustrap.deactivate(), super.dispose()
        }
        _initializeBackDrop() {
            const t = Boolean(this._config.backdrop);
            return new yi({
                className: "offcanvas-backdrop",
                isVisible: t,
                isAnimated: !0,
                rootElement: this._element.parentNode,
                clickCallback: t ? () => {
                    "static" !== this._config.backdrop ? this.hide() : P.trigger(this._element, $i)
                } : null
            })
        }
        _initializeFocusTrap() {
            return new Ci({
                trapElement: this._element
            })
        }
        _addEventListeners() {
            P.on(this._element, "keydown.dismiss.bs.offcanvas", (t => {
                "Escape" === t.key && (this._config.keyboard ? this.hide() : P.trigger(this._element, $i))
            }))
        }
        static jQueryInterface(t) {
            return this.each((function () {
                const e = zi.getOrCreateInstance(this, t);
                if ("string" == typeof t) {
                    if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
                    e[t](this)
                }
            }))
        }
    }
    P.on(document, "click.bs.offcanvas.data-api", '[data-bs-toggle="offcanvas"]', (function (t) {
        const e = n(this);
        if (["A", "AREA"].includes(this.tagName) && t.preventDefault(), l(this)) return;
        P.one(e, Wi, (() => {
            a(this) && this.focus()
        }));
        const i = Q.findOne(Hi);
        i && i !== e && zi.getInstance(i).hide(), zi.getOrCreateInstance(e).toggle(this)
    })), P.on(window, "load.bs.offcanvas.data-api", (() => {
        for (const t of Q.find(Hi)) zi.getOrCreateInstance(t).show()
    })), P.on(window, "resize.bs.offcanvas", (() => {
        for (const t of Q.find("[aria-modal][class*=show][class*=offcanvas-]")) "fixed" !== getComputedStyle(t).position && zi.getOrCreateInstance(t).hide()
    })), q(zi), g(zi);
    const qi = new Set(["background", "cite", "href", "itemtype", "longdesc", "poster", "src", "xlink:href"]),
        Ri = /^(?:(?:https?|mailto|ftp|tel|file|sms):|[^#&/:?]*(?:[#/?]|$))/i,
        Vi = /^data:(?:image\/(?:bmp|gif|jpeg|jpg|png|tiff|webp)|video\/(?:mpeg|mp4|ogg|webm)|audio\/(?:mp3|oga|ogg|opus));base64,[\d+/a-z]+=*$/i,
        Ki = (t, e) => {
            const i = t.nodeName.toLowerCase();
            return e.includes(i) ? !qi.has(i) || Boolean(Ri.test(t.nodeValue) || Vi.test(t.nodeValue)) : e.filter((t => t instanceof RegExp)).some((t => t.test(i)))
        },
        Qi = {
            "*": ["class", "dir", "id", "lang", "role", /^aria-[\w-]*$/i],
            a: ["target", "href", "title", "rel"],
            area: [],
            b: [],
            br: [],
            col: [],
            code: [],
            div: [],
            em: [],
            hr: [],
            h1: [],
            h2: [],
            h3: [],
            h4: [],
            h5: [],
            h6: [],
            i: [],
            img: ["src", "srcset", "alt", "title", "width", "height"],
            li: [],
            ol: [],
            p: [],
            pre: [],
            s: [],
            small: [],
            span: [],
            sub: [],
            sup: [],
            strong: [],
            u: [],
            ul: []
        },
        Xi = {
            allowList: Qi,
            content: {},
            extraClass: "",
            html: !1,
            sanitize: !0,
            sanitizeFn: null,
            template: "<div></div>"
        },
        Yi = {
            allowList: "object",
            content: "object",
            extraClass: "(string|function)",
            html: "boolean",
            sanitize: "boolean",
            sanitizeFn: "(null|function)",
            template: "string"
        },
        Ui = {
            entry: "(string|element|function|null)",
            selector: "(string|element)"
        };
    class Gi extends F {
        constructor(t) {
            super(), this._config = this._getConfig(t)
        }
        static get Default() {
            return Xi
        }
        static get DefaultType() {
            return Yi
        }
        static get NAME() {
            return "TemplateFactory"
        }
        getContent() {
            return Object.values(this._config.content).map((t => this._resolvePossibleFunction(t))).filter(Boolean)
        }
        hasContent() {
            return this.getContent().length > 0
        }
        changeContent(t) {
            return this._checkContent(t), this._config.content = {
                ...this._config.content,
                ...t
            }, this
        }
        toHtml() {
            const t = document.createElement("div");
            t.innerHTML = this._maybeSanitize(this._config.template);
            for (const [e, i] of Object.entries(this._config.content)) this._setContent(t, i, e);
            const e = t.children[0],
                i = this._resolvePossibleFunction(this._config.extraClass);
            return i && e.classList.add(...i.split(" ")), e
        }
        _typeCheckConfig(t) {
            super._typeCheckConfig(t), this._checkContent(t.content)
        }
        _checkContent(t) {
            for (const [e, i] of Object.entries(t)) super._typeCheckConfig({
                selector: e,
                entry: i
            }, Ui)
        }
        _setContent(t, e, i) {
            const n = Q.findOne(i, t);
            n && ((e = this._resolvePossibleFunction(e)) ? o(e) ? this._putElementInTemplate(r(e), n) : this._config.html ? n.innerHTML = this._maybeSanitize(e) : n.textContent = e : n.remove())
        }
        _maybeSanitize(t) {
            return this._config.sanitize ? function (t, e, i) {
                if (!t.length) return t;
                if (i && "function" == typeof i) return i(t);
                const n = (new window.DOMParser).parseFromString(t, "text/html"),
                    s = [].concat(...n.body.querySelectorAll("*"));
                for (const t of s) {
                    const i = t.nodeName.toLowerCase();
                    if (!Object.keys(e).includes(i)) {
                        t.remove();
                        continue
                    }
                    const n = [].concat(...t.attributes),
                        s = [].concat(e["*"] || [], e[i] || []);
                    for (const e of n) Ki(e, s) || t.removeAttribute(e.nodeName)
                }
                return n.body.innerHTML
            }(t, this._config.allowList, this._config.sanitizeFn) : t
        }
        _resolvePossibleFunction(t) {
            return "function" == typeof t ? t(this) : t
        }
        _putElementInTemplate(t, e) {
            if (this._config.html) return e.innerHTML = "", void e.append(t);
            e.textContent = t.textContent
        }
    }
    const Ji = new Set(["sanitize", "allowList", "sanitizeFn"]),
        Zi = "fade",
        tn = "show",
        en = ".modal",
        nn = "hide.bs.modal",
        sn = "hover",
        on = "focus",
        rn = {
            AUTO: "auto",
            TOP: "top",
            RIGHT: p() ? "left" : "right",
            BOTTOM: "bottom",
            LEFT: p() ? "right" : "left"
        },
        an = {
            allowList: Qi,
            animation: !0,
            boundary: "clippingParents",
            container: !1,
            customClass: "",
            delay: 0,
            fallbackPlacements: ["top", "right", "bottom", "left"],
            html: !1,
            offset: [0, 0],
            placement: "top",
            popperConfig: null,
            sanitize: !0,
            sanitizeFn: null,
            selector: !1,
            template: '<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',
            title: "",
            trigger: "hover focus"
        },
        ln = {
            allowList: "object",
            animation: "boolean",
            boundary: "(string|element)",
            container: "(string|element|boolean)",
            customClass: "(string|function)",
            delay: "(number|object)",
            fallbackPlacements: "array",
            html: "boolean",
            offset: "(array|string|function)",
            placement: "(string|function)",
            popperConfig: "(null|object|function)",
            sanitize: "boolean",
            sanitizeFn: "(null|function)",
            selector: "(string|boolean)",
            template: "string",
            title: "(string|element|function)",
            trigger: "string"
        };
    class cn extends z {
        constructor(t, e) {
            if (void 0 === Ke) throw new TypeError("Bootstrap's tooltips require Popper (https://popper.js.org)");
            super(t, e), this._isEnabled = !0, this._timeout = 0, this._isHovered = null, this._activeTrigger = {}, this._popper = null, this._templateFactory = null, this._newContent = null, this.tip = null, this._setListeners(), this._config.selector || this._fixTitle()
        }
        static get Default() {
            return an
        }
        static get DefaultType() {
            return ln
        }
        static get NAME() {
            return "tooltip"
        }
        enable() {
            this._isEnabled = !0
        }
        disable() {
            this._isEnabled = !1
        }
        toggleEnabled() {
            this._isEnabled = !this._isEnabled
        }
        toggle() {
            this._isEnabled && (this._activeTrigger.click = !this._activeTrigger.click, this._isShown() ? this._leave() : this._enter())
        }
        dispose() {
            clearTimeout(this._timeout), P.off(this._element.closest(en), nn, this._hideModalHandler), this.tip && this.tip.remove(), this._element.getAttribute("data-bs-original-title") && this._element.setAttribute("title", this._element.getAttribute("data-bs-original-title")), this._disposePopper(), super.dispose()
        }
        show() {
            if ("none" === this._element.style.display) throw new Error("Please use show on visible elements");
            if (!this._isWithContent() || !this._isEnabled) return;
            const t = P.trigger(this._element, this.constructor.eventName("show")),
                e = (c(this._element) || this._element.ownerDocument.documentElement).contains(this._element);
            if (t.defaultPrevented || !e) return;
            this.tip && (this.tip.remove(), this.tip = null);
            const i = this._getTipElement();
            this._element.setAttribute("aria-describedby", i.getAttribute("id"));
            const {
                container: n
            } = this._config;
            if (this._element.ownerDocument.documentElement.contains(this.tip) || (n.append(i), P.trigger(this._element, this.constructor.eventName("inserted"))), this._popper ? this._popper.update() : this._popper = this._createPopper(i), i.classList.add(tn), "ontouchstart" in document.documentElement)
                for (const t of [].concat(...document.body.children)) P.on(t, "mouseover", h);
            this._queueCallback((() => {
                P.trigger(this._element, this.constructor.eventName("shown")), !1 === this._isHovered && this._leave(), this._isHovered = !1
            }), this.tip, this._isAnimated())
        }
        hide() {
            if (!this._isShown()) return;
            if (P.trigger(this._element, this.constructor.eventName("hide")).defaultPrevented) return;
            const t = this._getTipElement();
            if (t.classList.remove(tn), "ontouchstart" in document.documentElement)
                for (const t of [].concat(...document.body.children)) P.off(t, "mouseover", h);
            this._activeTrigger.click = !1, this._activeTrigger.focus = !1, this._activeTrigger.hover = !1, this._isHovered = null, this._queueCallback((() => {
                this._isWithActiveTrigger() || (this._isHovered || t.remove(), this._element.removeAttribute("aria-describedby"), P.trigger(this._element, this.constructor.eventName("hidden")), this._disposePopper())
            }), this.tip, this._isAnimated())
        }
        update() {
            this._popper && this._popper.update()
        }
        _isWithContent() {
            return Boolean(this._getTitle())
        }
        _getTipElement() {
            return this.tip || (this.tip = this._createTipElement(this._newContent || this._getContentForTemplate())), this.tip
        }
        _createTipElement(t) {
            const e = this._getTemplateFactory(t).toHtml();
            if (!e) return null;
            e.classList.remove(Zi, tn), e.classList.add(`bs-${this.constructor.NAME}-auto`);
            const i = (t => {
                do {
                    t += Math.floor(1e6 * Math.random())
                } while (document.getElementById(t));
                return t
            })(this.constructor.NAME).toString();
            return e.setAttribute("id", i), this._isAnimated() && e.classList.add(Zi), e
        }
        setContent(t) {
            this._newContent = t, this._isShown() && (this._disposePopper(), this.show())
        }
        _getTemplateFactory(t) {
            return this._templateFactory ? this._templateFactory.changeContent(t) : this._templateFactory = new Gi({
                ...this._config,
                content: t,
                extraClass: this._resolvePossibleFunction(this._config.customClass)
            }), this._templateFactory
        }
        _getContentForTemplate() {
            return {
                ".tooltip-inner": this._getTitle()
            }
        }
        _getTitle() {
            return this._resolvePossibleFunction(this._config.title) || this._element.getAttribute("data-bs-original-title")
        }
        _initializeOnDelegatedTarget(t) {
            return this.constructor.getOrCreateInstance(t.delegateTarget, this._getDelegateConfig())
        }
        _isAnimated() {
            return this._config.animation || this.tip && this.tip.classList.contains(Zi)
        }
        _isShown() {
            return this.tip && this.tip.classList.contains(tn)
        }
        _createPopper(t) {
            const e = "function" == typeof this._config.placement ? this._config.placement.call(this, t, this._element) : this._config.placement,
                i = rn[e.toUpperCase()];
            return Ve(this._element, t, this._getPopperConfig(i))
        }
        _getOffset() {
            const {
                offset: t
            } = this._config;
            return "string" == typeof t ? t.split(",").map((t => Number.parseInt(t, 10))) : "function" == typeof t ? e => t(e, this._element) : t
        }
        _resolvePossibleFunction(t) {
            return "function" == typeof t ? t.call(this._element) : t
        }
        _getPopperConfig(t) {
            const e = {
                placement: t,
                modifiers: [{
                    name: "flip",
                    options: {
                        fallbackPlacements: this._config.fallbackPlacements
                    }
                }, {
                    name: "offset",
                    options: {
                        offset: this._getOffset()
                    }
                }, {
                    name: "preventOverflow",
                    options: {
                        boundary: this._config.boundary
                    }
                }, {
                    name: "arrow",
                    options: {
                        element: `.${this.constructor.NAME}-arrow`
                    }
                }, {
                    name: "preSetPlacement",
                    enabled: !0,
                    phase: "beforeMain",
                    fn: t => {
                        this._getTipElement().setAttribute("data-popper-placement", t.state.placement)
                    }
                }]
            };
            return {
                ...e,
                ..."function" == typeof this._config.popperConfig ? this._config.popperConfig(e) : this._config.popperConfig
            }
        }
        _setListeners() {
            const t = this._config.trigger.split(" ");
            for (const e of t)
                if ("click" === e) P.on(this._element, this.constructor.eventName("click"), this._config.selector, (t => {
                    this._initializeOnDelegatedTarget(t).toggle()
                }));
                else if ("manual" !== e) {
                const t = e === sn ? this.constructor.eventName("mouseenter") : this.constructor.eventName("focusin"),
                    i = e === sn ? this.constructor.eventName("mouseleave") : this.constructor.eventName("focusout");
                P.on(this._element, t, this._config.selector, (t => {
                    const e = this._initializeOnDelegatedTarget(t);
                    e._activeTrigger["focusin" === t.type ? on : sn] = !0, e._enter()
                })), P.on(this._element, i, this._config.selector, (t => {
                    const e = this._initializeOnDelegatedTarget(t);
                    e._activeTrigger["focusout" === t.type ? on : sn] = e._element.contains(t.relatedTarget), e._leave()
                }))
            }
            this._hideModalHandler = () => {
                this._element && this.hide()
            }, P.on(this._element.closest(en), nn, this._hideModalHandler)
        }
        _fixTitle() {
            const t = this._element.getAttribute("title");
            t && (this._element.getAttribute("aria-label") || this._element.textContent.trim() || this._element.setAttribute("aria-label", t), this._element.setAttribute("data-bs-original-title", t), this._element.removeAttribute("title"))
        }
        _enter() {
            this._isShown() || this._isHovered ? this._isHovered = !0 : (this._isHovered = !0, this._setTimeout((() => {
                this._isHovered && this.show()
            }), this._config.delay.show))
        }
        _leave() {
            this._isWithActiveTrigger() || (this._isHovered = !1, this._setTimeout((() => {
                this._isHovered || this.hide()
            }), this._config.delay.hide))
        }
        _setTimeout(t, e) {
            clearTimeout(this._timeout), this._timeout = setTimeout(t, e)
        }
        _isWithActiveTrigger() {
            return Object.values(this._activeTrigger).includes(!0)
        }
        _getConfig(t) {
            const e = B.getDataAttributes(this._element);
            for (const t of Object.keys(e)) Ji.has(t) && delete e[t];
            return t = {
                ...e,
                ..."object" == typeof t && t ? t : {}
            }, t = this._mergeConfigObj(t), t = this._configAfterMerge(t), this._typeCheckConfig(t), t
        }
        _configAfterMerge(t) {
            return t.container = !1 === t.container ? document.body : r(t.container), "number" == typeof t.delay && (t.delay = {
                show: t.delay,
                hide: t.delay
            }), "number" == typeof t.title && (t.title = t.title.toString()), "number" == typeof t.content && (t.content = t.content.toString()), t
        }
        _getDelegateConfig() {
            const t = {};
            for (const e in this._config) this.constructor.Default[e] !== this._config[e] && (t[e] = this._config[e]);
            return t.selector = !1, t.trigger = "manual", t
        }
        _disposePopper() {
            this._popper && (this._popper.destroy(), this._popper = null)
        }
        static jQueryInterface(t) {
            return this.each((function () {
                const e = cn.getOrCreateInstance(this, t);
                if ("string" == typeof t) {
                    if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
                    e[t]()
                }
            }))
        }
    }
    g(cn);
    const hn = {
            ...cn.Default,
            content: "",
            offset: [0, 8],
            placement: "right",
            template: '<div class="popover" role="tooltip"><div class="popover-arrow"></div><h3 class="popover-header"></h3><div class="popover-body"></div></div>',
            trigger: "click"
        },
        dn = {
            ...cn.DefaultType,
            content: "(null|string|element|function)"
        };
    class un extends cn {
        static get Default() {
            return hn
        }
        static get DefaultType() {
            return dn
        }
        static get NAME() {
            return "popover"
        }
        _isWithContent() {
            return this._getTitle() || this._getContent()
        }
        _getContentForTemplate() {
            return {
                ".popover-header": this._getTitle(),
                ".popover-body": this._getContent()
            }
        }
        _getContent() {
            return this._resolvePossibleFunction(this._config.content)
        }
        static jQueryInterface(t) {
            return this.each((function () {
                const e = un.getOrCreateInstance(this, t);
                if ("string" == typeof t) {
                    if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
                    e[t]()
                }
            }))
        }
    }
    g(un);
    const fn = "click.bs.scrollspy",
        pn = "active",
        gn = "[href]",
        mn = {
            offset: null,
            rootMargin: "0px 0px -25%",
            smoothScroll: !1,
            target: null,
            threshold: [.1, .5, 1]
        },
        _n = {
            offset: "(number|null)",
            rootMargin: "string",
            smoothScroll: "boolean",
            target: "element",
            threshold: "array"
        };
    class bn extends z {
        constructor(t, e) {
            super(t, e), this._targetLinks = new Map, this._observableSections = new Map, this._rootElement = "visible" === getComputedStyle(this._element).overflowY ? null : this._element, this._activeTarget = null, this._observer = null, this._previousScrollData = {
                visibleEntryTop: 0,
                parentScrollTop: 0
            }, this.refresh()
        }
        static get Default() {
            return mn
        }
        static get DefaultType() {
            return _n
        }
        static get NAME() {
            return "scrollspy"
        }
        refresh() {
            this._initializeTargetsAndObservables(), this._maybeEnableSmoothScroll(), this._observer ? this._observer.disconnect() : this._observer = this._getNewObserver();
            for (const t of this._observableSections.values()) this._observer.observe(t)
        }
        dispose() {
            this._observer.disconnect(), super.dispose()
        }
        _configAfterMerge(t) {
            return t.target = r(t.target) || document.body, t.rootMargin = t.offset ? `${t.offset}px 0px -30%` : t.rootMargin, "string" == typeof t.threshold && (t.threshold = t.threshold.split(",").map((t => Number.parseFloat(t)))), t
        }
        _maybeEnableSmoothScroll() {
            this._config.smoothScroll && (P.off(this._config.target, fn), P.on(this._config.target, fn, gn, (t => {
                const e = this._observableSections.get(t.target.hash);
                if (e) {
                    t.preventDefault();
                    const i = this._rootElement || window,
                        n = e.offsetTop - this._element.offsetTop;
                    if (i.scrollTo) return void i.scrollTo({
                        top: n,
                        behavior: "smooth"
                    });
                    i.scrollTop = n
                }
            })))
        }
        _getNewObserver() {
            const t = {
                root: this._rootElement,
                threshold: this._config.threshold,
                rootMargin: this._config.rootMargin
            };
            return new IntersectionObserver((t => this._observerCallback(t)), t)
        }
        _observerCallback(t) {
            const e = t => this._targetLinks.get(`#${t.target.id}`),
                i = t => {
                    this._previousScrollData.visibleEntryTop = t.target.offsetTop, this._process(e(t))
                },
                n = (this._rootElement || document.documentElement).scrollTop,
                s = n >= this._previousScrollData.parentScrollTop;
            this._previousScrollData.parentScrollTop = n;
            for (const o of t) {
                if (!o.isIntersecting) {
                    this._activeTarget = null, this._clearActiveClass(e(o));
                    continue
                }
                const t = o.target.offsetTop >= this._previousScrollData.visibleEntryTop;
                if (s && t) {
                    if (i(o), !n) return
                } else s || t || i(o)
            }
        }
        _initializeTargetsAndObservables() {
            this._targetLinks = new Map, this._observableSections = new Map;
            const t = Q.find(gn, this._config.target);
            for (const e of t) {
                if (!e.hash || l(e)) continue;
                const t = Q.findOne(e.hash, this._element);
                a(t) && (this._targetLinks.set(e.hash, e), this._observableSections.set(e.hash, t))
            }
        }
        _process(t) {
            this._activeTarget !== t && (this._clearActiveClass(this._config.target), this._activeTarget = t, t.classList.add(pn), this._activateParents(t), P.trigger(this._element, "activate.bs.scrollspy", {
                relatedTarget: t
            }))
        }
        _activateParents(t) {
            if (t.classList.contains("dropdown-item")) Q.findOne(".dropdown-toggle", t.closest(".dropdown")).classList.add(pn);
            else
                for (const e of Q.parents(t, ".nav, .list-group"))
                    for (const t of Q.prev(e, ".nav-link, .nav-item > .nav-link, .list-group-item")) t.classList.add(pn)
        }
        _clearActiveClass(t) {
            t.classList.remove(pn);
            const e = Q.find("[href].active", t);
            for (const t of e) t.classList.remove(pn)
        }
        static jQueryInterface(t) {
            return this.each((function () {
                const e = bn.getOrCreateInstance(this, t);
                if ("string" == typeof t) {
                    if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
                    e[t]()
                }
            }))
        }
    }
    P.on(window, "load.bs.scrollspy.data-api", (() => {
        for (const t of Q.find('[data-bs-spy="scroll"]')) bn.getOrCreateInstance(t)
    })), g(bn);
    const vn = "ArrowLeft",
        yn = "ArrowRight",
        wn = "ArrowUp",
        An = "ArrowDown",
        En = "active",
        Tn = "fade",
        Cn = "show",
        On = '[data-bs-toggle="tab"], [data-bs-toggle="pill"], [data-bs-toggle="list"]',
        xn = `.nav-link:not(.dropdown-toggle), .list-group-item:not(.dropdown-toggle), [role="tab"]:not(.dropdown-toggle), ${On}`;
    class kn extends z {
        constructor(t) {
            super(t), this._parent = this._element.closest('.list-group, .nav, [role="tablist"]'), this._parent && (this._setInitialAttributes(this._parent, this._getChildren()), P.on(this._element, "keydown.bs.tab", (t => this._keydown(t))))
        }
        static get NAME() {
            return "tab"
        }
        show() {
            const t = this._element;
            if (this._elemIsActive(t)) return;
            const e = this._getActiveElem(),
                i = e ? P.trigger(e, "hide.bs.tab", {
                    relatedTarget: t
                }) : null;
            P.trigger(t, "show.bs.tab", {
                relatedTarget: e
            }).defaultPrevented || i && i.defaultPrevented || (this._deactivate(e, t), this._activate(t, e))
        }
        _activate(t, e) {
            t && (t.classList.add(En), this._activate(n(t)), this._queueCallback((() => {
                "tab" === t.getAttribute("role") ? (t.removeAttribute("tabindex"), t.setAttribute("aria-selected", !0), this._toggleDropDown(t, !0), P.trigger(t, "shown.bs.tab", {
                    relatedTarget: e
                })) : t.classList.add(Cn)
            }), t, t.classList.contains(Tn)))
        }
        _deactivate(t, e) {
            t && (t.classList.remove(En), t.blur(), this._deactivate(n(t)), this._queueCallback((() => {
                "tab" === t.getAttribute("role") ? (t.setAttribute("aria-selected", !1), t.setAttribute("tabindex", "-1"), this._toggleDropDown(t, !1), P.trigger(t, "hidden.bs.tab", {
                    relatedTarget: e
                })) : t.classList.remove(Cn)
            }), t, t.classList.contains(Tn)))
        }
        _keydown(t) {
            if (![vn, yn, wn, An].includes(t.key)) return;
            t.stopPropagation(), t.preventDefault();
            const e = [yn, An].includes(t.key),
                i = b(this._getChildren().filter((t => !l(t))), t.target, e, !0);
            i && (i.focus({
                preventScroll: !0
            }), kn.getOrCreateInstance(i).show())
        }
        _getChildren() {
            return Q.find(xn, this._parent)
        }
        _getActiveElem() {
            return this._getChildren().find((t => this._elemIsActive(t))) || null
        }
        _setInitialAttributes(t, e) {
            this._setAttributeIfNotExists(t, "role", "tablist");
            for (const t of e) this._setInitialAttributesOnChild(t)
        }
        _setInitialAttributesOnChild(t) {
            t = this._getInnerElement(t);
            const e = this._elemIsActive(t),
                i = this._getOuterElement(t);
            t.setAttribute("aria-selected", e), i !== t && this._setAttributeIfNotExists(i, "role", "presentation"), e || t.setAttribute("tabindex", "-1"), this._setAttributeIfNotExists(t, "role", "tab"), this._setInitialAttributesOnTargetPanel(t)
        }
        _setInitialAttributesOnTargetPanel(t) {
            const e = n(t);
            e && (this._setAttributeIfNotExists(e, "role", "tabpanel"), t.id && this._setAttributeIfNotExists(e, "aria-labelledby", `#${t.id}`))
        }
        _toggleDropDown(t, e) {
            const i = this._getOuterElement(t);
            if (!i.classList.contains("dropdown")) return;
            const n = (t, n) => {
                const s = Q.findOne(t, i);
                s && s.classList.toggle(n, e)
            };
            n(".dropdown-toggle", En), n(".dropdown-menu", Cn), i.setAttribute("aria-expanded", e)
        }
        _setAttributeIfNotExists(t, e, i) {
            t.hasAttribute(e) || t.setAttribute(e, i)
        }
        _elemIsActive(t) {
            return t.classList.contains(En)
        }
        _getInnerElement(t) {
            return t.matches(xn) ? t : Q.findOne(xn, t)
        }
        _getOuterElement(t) {
            return t.closest(".nav-item, .list-group-item") || t
        }
        static jQueryInterface(t) {
            return this.each((function () {
                const e = kn.getOrCreateInstance(this);
                if ("string" == typeof t) {
                    if (void 0 === e[t] || t.startsWith("_") || "constructor" === t) throw new TypeError(`No method named "${t}"`);
                    e[t]()
                }
            }))
        }
    }
    P.on(document, "click.bs.tab", On, (function (t) {
        ["A", "AREA"].includes(this.tagName) && t.preventDefault(), l(this) || kn.getOrCreateInstance(this).show()
    })), P.on(window, "load.bs.tab", (() => {
        for (const t of Q.find('.active[data-bs-toggle="tab"], .active[data-bs-toggle="pill"], .active[data-bs-toggle="list"]')) kn.getOrCreateInstance(t)
    })), g(kn);
    const Ln = "hide",
        Dn = "show",
        Sn = "showing",
        In = {
            animation: "boolean",
            autohide: "boolean",
            delay: "number"
        },
        Nn = {
            animation: !0,
            autohide: !0,
            delay: 5e3
        };
    class Pn extends z {
        constructor(t, e) {
            super(t, e), this._timeout = null, this._hasMouseInteraction = !1, this._hasKeyboardInteraction = !1, this._setListeners()
        }
        static get Default() {
            return Nn
        }
        static get DefaultType() {
            return In
        }
        static get NAME() {
            return "toast"
        }
        show() {
            P.trigger(this._element, "show.bs.toast").defaultPrevented || (this._clearTimeout(), this._config.animation && this._element.classList.add("fade"), this._element.classList.remove(Ln), d(this._element), this._element.classList.add(Dn, Sn), this._queueCallback((() => {
                this._element.classList.remove(Sn), P.trigger(this._element, "shown.bs.toast"), this._maybeScheduleHide()
            }), this._element, this._config.animation))
        }
        hide() {
            this.isShown() && (P.trigger(this._element, "hide.bs.toast").defaultPrevented || (this._element.classList.add(Sn), this._queueCallback((() => {
                this._element.classList.add(Ln), this._element.classList.remove(Sn, Dn), P.trigger(this._element, "hidden.bs.toast")
            }), this._element, this._config.animation)))
        }
        dispose() {
            this._clearTimeout(), this.isShown() && this._element.classList.remove(Dn), super.dispose()
        }
        isShown() {
            return this._element.classList.contains(Dn)
        }
        _maybeScheduleHide() {
            this._config.autohide && (this._hasMouseInteraction || this._hasKeyboardInteraction || (this._timeout = setTimeout((() => {
                this.hide()
            }), this._config.delay)))
        }
        _onInteraction(t, e) {
            switch (t.type) {
                case "mouseover":
                case "mouseout":
                    this._hasMouseInteraction = e;
                    break;
                case "focusin":
                case "focusout":
                    this._hasKeyboardInteraction = e
            }
            if (e) return void this._clearTimeout();
            const i = t.relatedTarget;
            this._element === i || this._element.contains(i) || this._maybeScheduleHide()
        }
        _setListeners() {
            P.on(this._element, "mouseover.bs.toast", (t => this._onInteraction(t, !0))), P.on(this._element, "mouseout.bs.toast", (t => this._onInteraction(t, !1))), P.on(this._element, "focusin.bs.toast", (t => this._onInteraction(t, !0))), P.on(this._element, "focusout.bs.toast", (t => this._onInteraction(t, !1)))
        }
        _clearTimeout() {
            clearTimeout(this._timeout), this._timeout = null
        }
        static jQueryInterface(t) {
            return this.each((function () {
                const e = Pn.getOrCreateInstance(this, t);
                if ("string" == typeof t) {
                    if (void 0 === e[t]) throw new TypeError(`No method named "${t}"`);
                    e[t](this)
                }
            }))
        }
    }
    return q(Pn), g(Pn), {
        Alert: R,
        Button: K,
        Carousel: at,
        Collapse: pt,
        Dropdown: hi,
        Modal: Ni,
        Offcanvas: zi,
        Popover: un,
        ScrollSpy: bn,
        Tab: kn,
        Toast: Pn,
        Tooltip: cn
    }
}));

// animate on scroll

! function (e, t) {
    "object" == typeof exports && "object" == typeof module ? module.exports = t() : "function" == typeof define && define.amd ? define([], t) : "object" == typeof exports ? exports.AOS = t() : e.AOS = t()
}(this, function () {
    return function (e) {
        function t(o) {
            if (n[o]) return n[o].exports;
            var i = n[o] = {
                exports: {},
                id: o,
                loaded: !1
            };
            return e[o].call(i.exports, i, i.exports, t), i.loaded = !0, i.exports
        }
        var n = {};
        return t.m = e, t.c = n, t.p = "dist/", t(0)
    }([function (e, t, n) {
        "use strict";

        function o(e) {
            return e && e.__esModule ? e : {
                default: e
            }
        }
        var i = Object.assign || function (e) {
                for (var t = 1; t < arguments.length; t++) {
                    var n = arguments[t];
                    for (var o in n) Object.prototype.hasOwnProperty.call(n, o) && (e[o] = n[o])
                }
                return e
            },
            r = n(1),
            a = (o(r), n(6)),
            u = o(a),
            c = n(7),
            s = o(c),
            f = n(8),
            d = o(f),
            l = n(9),
            p = o(l),
            m = n(10),
            b = o(m),
            v = n(11),
            y = o(v),
            g = n(14),
            h = o(g),
            w = [],
            k = !1,
            x = {
                offset: 120,
                delay: 0,
                easing: "ease",
                duration: 400,
                disable: !1,
                once: !1,
                startEvent: "DOMContentLoaded",
                throttleDelay: 99,
                debounceDelay: 50,
                disableMutationObserver: !1
            },
            j = function () {
                var e = arguments.length > 0 && void 0 !== arguments[0] && arguments[0];
                if (e && (k = !0), k) return w = (0, y.default)(w, x), (0, b.default)(w, x.once), w
            },
            O = function () {
                w = (0, h.default)(), j()
            },
            M = function () {
                w.forEach(function (e, t) {
                    e.node.removeAttribute("data-aos"), e.node.removeAttribute("data-aos-easing"), e.node.removeAttribute("data-aos-duration"), e.node.removeAttribute("data-aos-delay")
                })
            },
            S = function (e) {
                return e === !0 || "mobile" === e && p.default.mobile() || "phone" === e && p.default.phone() || "tablet" === e && p.default.tablet() || "function" == typeof e && e() === !0
            },
            _ = function (e) {
                x = i(x, e), w = (0, h.default)();
                var t = document.all && !window.atob;
                return S(x.disable) || t ? M() : (x.disableMutationObserver || d.default.isSupported() || (console.info('\n      aos: MutationObserver is not supported on this browser,\n      code mutations observing has been disabled.\n      You may have to call "refreshHard()" by yourself.\n    '), x.disableMutationObserver = !0), document.querySelector("body").setAttribute("data-aos-easing", x.easing), document.querySelector("body").setAttribute("data-aos-duration", x.duration), document.querySelector("body").setAttribute("data-aos-delay", x.delay), "DOMContentLoaded" === x.startEvent && ["complete", "interactive"].indexOf(document.readyState) > -1 ? j(!0) : "load" === x.startEvent ? window.addEventListener(x.startEvent, function () {
                    j(!0)
                }) : document.addEventListener(x.startEvent, function () {
                    j(!0)
                }), window.addEventListener("resize", (0, s.default)(j, x.debounceDelay, !0)), window.addEventListener("orientationchange", (0, s.default)(j, x.debounceDelay, !0)), window.addEventListener("scroll", (0, u.default)(function () {
                    (0, b.default)(w, x.once)
                }, x.throttleDelay)), x.disableMutationObserver || d.default.ready("[data-aos]", O), w)
            };
        e.exports = {
            init: _,
            refresh: j,
            refreshHard: O
        }
    }, function (e, t) {}, , , , , function (e, t) {
        (function (t) {
            "use strict";

            function n(e, t, n) {
                function o(t) {
                    var n = b,
                        o = v;
                    return b = v = void 0, k = t, g = e.apply(o, n)
                }

                function r(e) {
                    return k = e, h = setTimeout(f, t), M ? o(e) : g
                }

                function a(e) {
                    var n = e - w,
                        o = e - k,
                        i = t - n;
                    return S ? j(i, y - o) : i
                }

                function c(e) {
                    var n = e - w,
                        o = e - k;
                    return void 0 === w || n >= t || n < 0 || S && o >= y
                }

                function f() {
                    var e = O();
                    return c(e) ? d(e) : void(h = setTimeout(f, a(e)))
                }

                function d(e) {
                    return h = void 0, _ && b ? o(e) : (b = v = void 0, g)
                }

                function l() {
                    void 0 !== h && clearTimeout(h), k = 0, b = w = v = h = void 0
                }

                function p() {
                    return void 0 === h ? g : d(O())
                }

                function m() {
                    var e = O(),
                        n = c(e);
                    if (b = arguments, v = this, w = e, n) {
                        if (void 0 === h) return r(w);
                        if (S) return h = setTimeout(f, t), o(w)
                    }
                    return void 0 === h && (h = setTimeout(f, t)), g
                }
                var b, v, y, g, h, w, k = 0,
                    M = !1,
                    S = !1,
                    _ = !0;
                if ("function" != typeof e) throw new TypeError(s);
                return t = u(t) || 0, i(n) && (M = !!n.leading, S = "maxWait" in n, y = S ? x(u(n.maxWait) || 0, t) : y, _ = "trailing" in n ? !!n.trailing : _), m.cancel = l, m.flush = p, m
            }

            function o(e, t, o) {
                var r = !0,
                    a = !0;
                if ("function" != typeof e) throw new TypeError(s);
                return i(o) && (r = "leading" in o ? !!o.leading : r, a = "trailing" in o ? !!o.trailing : a), n(e, t, {
                    leading: r,
                    maxWait: t,
                    trailing: a
                })
            }

            function i(e) {
                var t = "undefined" == typeof e ? "undefined" : c(e);
                return !!e && ("object" == t || "function" == t)
            }

            function r(e) {
                return !!e && "object" == ("undefined" == typeof e ? "undefined" : c(e))
            }

            function a(e) {
                return "symbol" == ("undefined" == typeof e ? "undefined" : c(e)) || r(e) && k.call(e) == d
            }

            function u(e) {
                if ("number" == typeof e) return e;
                if (a(e)) return f;
                if (i(e)) {
                    var t = "function" == typeof e.valueOf ? e.valueOf() : e;
                    e = i(t) ? t + "" : t
                }
                if ("string" != typeof e) return 0 === e ? e : +e;
                e = e.replace(l, "");
                var n = m.test(e);
                return n || b.test(e) ? v(e.slice(2), n ? 2 : 8) : p.test(e) ? f : +e
            }
            var c = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                    return typeof e
                } : function (e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                },
                s = "Expected a function",
                f = NaN,
                d = "[object Symbol]",
                l = /^\s+|\s+$/g,
                p = /^[-+]0x[0-9a-f]+$/i,
                m = /^0b[01]+$/i,
                b = /^0o[0-7]+$/i,
                v = parseInt,
                y = "object" == ("undefined" == typeof t ? "undefined" : c(t)) && t && t.Object === Object && t,
                g = "object" == ("undefined" == typeof self ? "undefined" : c(self)) && self && self.Object === Object && self,
                h = y || g || Function("return this")(),
                w = Object.prototype,
                k = w.toString,
                x = Math.max,
                j = Math.min,
                O = function () {
                    return h.Date.now()
                };
            e.exports = o
        }).call(t, function () {
            return this
        }())
    }, function (e, t) {
        (function (t) {
            "use strict";

            function n(e, t, n) {
                function i(t) {
                    var n = b,
                        o = v;
                    return b = v = void 0, O = t, g = e.apply(o, n)
                }

                function r(e) {
                    return O = e, h = setTimeout(f, t), M ? i(e) : g
                }

                function u(e) {
                    var n = e - w,
                        o = e - O,
                        i = t - n;
                    return S ? x(i, y - o) : i
                }

                function s(e) {
                    var n = e - w,
                        o = e - O;
                    return void 0 === w || n >= t || n < 0 || S && o >= y
                }

                function f() {
                    var e = j();
                    return s(e) ? d(e) : void(h = setTimeout(f, u(e)))
                }

                function d(e) {
                    return h = void 0, _ && b ? i(e) : (b = v = void 0, g)
                }

                function l() {
                    void 0 !== h && clearTimeout(h), O = 0, b = w = v = h = void 0
                }

                function p() {
                    return void 0 === h ? g : d(j())
                }

                function m() {
                    var e = j(),
                        n = s(e);
                    if (b = arguments, v = this, w = e, n) {
                        if (void 0 === h) return r(w);
                        if (S) return h = setTimeout(f, t), i(w)
                    }
                    return void 0 === h && (h = setTimeout(f, t)), g
                }
                var b, v, y, g, h, w, O = 0,
                    M = !1,
                    S = !1,
                    _ = !0;
                if ("function" != typeof e) throw new TypeError(c);
                return t = a(t) || 0, o(n) && (M = !!n.leading, S = "maxWait" in n, y = S ? k(a(n.maxWait) || 0, t) : y, _ = "trailing" in n ? !!n.trailing : _), m.cancel = l, m.flush = p, m
            }

            function o(e) {
                var t = "undefined" == typeof e ? "undefined" : u(e);
                return !!e && ("object" == t || "function" == t)
            }

            function i(e) {
                return !!e && "object" == ("undefined" == typeof e ? "undefined" : u(e))
            }

            function r(e) {
                return "symbol" == ("undefined" == typeof e ? "undefined" : u(e)) || i(e) && w.call(e) == f
            }

            function a(e) {
                if ("number" == typeof e) return e;
                if (r(e)) return s;
                if (o(e)) {
                    var t = "function" == typeof e.valueOf ? e.valueOf() : e;
                    e = o(t) ? t + "" : t
                }
                if ("string" != typeof e) return 0 === e ? e : +e;
                e = e.replace(d, "");
                var n = p.test(e);
                return n || m.test(e) ? b(e.slice(2), n ? 2 : 8) : l.test(e) ? s : +e
            }
            var u = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (e) {
                    return typeof e
                } : function (e) {
                    return e && "function" == typeof Symbol && e.constructor === Symbol && e !== Symbol.prototype ? "symbol" : typeof e
                },
                c = "Expected a function",
                s = NaN,
                f = "[object Symbol]",
                d = /^\s+|\s+$/g,
                l = /^[-+]0x[0-9a-f]+$/i,
                p = /^0b[01]+$/i,
                m = /^0o[0-7]+$/i,
                b = parseInt,
                v = "object" == ("undefined" == typeof t ? "undefined" : u(t)) && t && t.Object === Object && t,
                y = "object" == ("undefined" == typeof self ? "undefined" : u(self)) && self && self.Object === Object && self,
                g = v || y || Function("return this")(),
                h = Object.prototype,
                w = h.toString,
                k = Math.max,
                x = Math.min,
                j = function () {
                    return g.Date.now()
                };
            e.exports = n
        }).call(t, function () {
            return this
        }())
    }, function (e, t) {
        "use strict";

        function n(e) {
            var t = void 0,
                o = void 0,
                i = void 0;
            for (t = 0; t < e.length; t += 1) {
                if (o = e[t], o.dataset && o.dataset.aos) return !0;
                if (i = o.children && n(o.children)) return !0
            }
            return !1
        }

        function o() {
            return window.MutationObserver || window.WebKitMutationObserver || window.MozMutationObserver
        }

        function i() {
            return !!o()
        }

        function r(e, t) {
            var n = window.document,
                i = o(),
                r = new i(a);
            u = t, r.observe(n.documentElement, {
                childList: !0,
                subtree: !0,
                removedNodes: !0
            })
        }

        function a(e) {
            e && e.forEach(function (e) {
                var t = Array.prototype.slice.call(e.addedNodes),
                    o = Array.prototype.slice.call(e.removedNodes),
                    i = t.concat(o);
                if (n(i)) return u()
            })
        }
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var u = function () {};
        t.default = {
            isSupported: i,
            ready: r
        }
    }, function (e, t) {
        "use strict";

        function n(e, t) {
            if (!(e instanceof t)) throw new TypeError("Cannot call a class as a function")
        }

        function o() {
            return navigator.userAgent || navigator.vendor || window.opera || ""
        }
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var i = function () {
                function e(e, t) {
                    for (var n = 0; n < t.length; n++) {
                        var o = t[n];
                        o.enumerable = o.enumerable || !1, o.configurable = !0, "value" in o && (o.writable = !0), Object.defineProperty(e, o.key, o)
                    }
                }
                return function (t, n, o) {
                    return n && e(t.prototype, n), o && e(t, o), t
                }
            }(),
            r = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i,
            a = /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,
            u = /(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i,
            c = /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i,
            s = function () {
                function e() {
                    n(this, e)
                }
                return i(e, [{
                    key: "phone",
                    value: function () {
                        var e = o();
                        return !(!r.test(e) && !a.test(e.substr(0, 4)))
                    }
                }, {
                    key: "mobile",
                    value: function () {
                        var e = o();
                        return !(!u.test(e) && !c.test(e.substr(0, 4)))
                    }
                }, {
                    key: "tablet",
                    value: function () {
                        return this.mobile() && !this.phone()
                    }
                }]), e
            }();
        t.default = new s
    }, function (e, t) {
        "use strict";
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var n = function (e, t, n) {
                var o = e.node.getAttribute("data-aos-once");
                t > e.position ? e.node.classList.add("aos-animate") : "undefined" != typeof o && ("false" === o || !n && "true" !== o) && e.node.classList.remove("aos-animate")
            },
            o = function (e, t) {
                var o = window.pageYOffset,
                    i = window.innerHeight;
                e.forEach(function (e, r) {
                    n(e, i + o, t)
                })
            };
        t.default = o
    }, function (e, t, n) {
        "use strict";

        function o(e) {
            return e && e.__esModule ? e : {
                default: e
            }
        }
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var i = n(12),
            r = o(i),
            a = function (e, t) {
                return e.forEach(function (e, n) {
                    e.node.classList.add("aos-init"), e.position = (0, r.default)(e.node, t.offset)
                }), e
            };
        t.default = a
    }, function (e, t, n) {
        "use strict";

        function o(e) {
            return e && e.__esModule ? e : {
                default: e
            }
        }
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var i = n(13),
            r = o(i),
            a = function (e, t) {
                var n = 0,
                    o = 0,
                    i = window.innerHeight,
                    a = {
                        offset: e.getAttribute("data-aos-offset"),
                        anchor: e.getAttribute("data-aos-anchor"),
                        anchorPlacement: e.getAttribute("data-aos-anchor-placement")
                    };
                switch (a.offset && !isNaN(a.offset) && (o = parseInt(a.offset)), a.anchor && document.querySelectorAll(a.anchor) && (e = document.querySelectorAll(a.anchor)[0]), n = (0, r.default)(e).top, a.anchorPlacement) {
                    case "top-bottom":
                        break;
                    case "center-bottom":
                        n += e.offsetHeight / 2;
                        break;
                    case "bottom-bottom":
                        n += e.offsetHeight;
                        break;
                    case "top-center":
                        n += i / 2;
                        break;
                    case "bottom-center":
                        n += i / 2 + e.offsetHeight;
                        break;
                    case "center-center":
                        n += i / 2 + e.offsetHeight / 2;
                        break;
                    case "top-top":
                        n += i;
                        break;
                    case "bottom-top":
                        n += e.offsetHeight + i;
                        break;
                    case "center-top":
                        n += e.offsetHeight / 2 + i
                }
                return a.anchorPlacement || a.offset || isNaN(t) || (o = t), n + o
            };
        t.default = a
    }, function (e, t) {
        "use strict";
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var n = function (e) {
            for (var t = 0, n = 0; e && !isNaN(e.offsetLeft) && !isNaN(e.offsetTop);) t += e.offsetLeft - ("BODY" != e.tagName ? e.scrollLeft : 0), n += e.offsetTop - ("BODY" != e.tagName ? e.scrollTop : 0), e = e.offsetParent;
            return {
                top: n,
                left: t
            }
        };
        t.default = n
    }, function (e, t) {
        "use strict";
        Object.defineProperty(t, "__esModule", {
            value: !0
        });
        var n = function (e) {
            return e = e || document.querySelectorAll("[data-aos]"), Array.prototype.map.call(e, function (e) {
                return {
                    node: e
                }
            })
        };
        t.default = n
    }])
});

// popper boostrap

! function (e, t) {
    "object" == typeof exports && "undefined" != typeof module ? t(exports) : "function" == typeof define && define.amd ? define(["exports"], t) : t((e = "undefined" != typeof globalThis ? globalThis : e || self).Popper = {})
}(this, (function (e) {
    "use strict";

    function t(e) {
        if (null == e) return window;
        if ("[object Window]" !== e.toString()) {
            var t = e.ownerDocument;
            return t && t.defaultView || window
        }
        return e
    }

    function n(e) {
        return e instanceof t(e).Element || e instanceof Element
    }

    function r(e) {
        return e instanceof t(e).HTMLElement || e instanceof HTMLElement
    }

    function o(e) {
        return "undefined" != typeof ShadowRoot && (e instanceof t(e).ShadowRoot || e instanceof ShadowRoot)
    }
    var i = Math.max,
        a = Math.min,
        s = Math.round;

    function f() {
        var e = navigator.userAgentData;
        return null != e && e.brands ? e.brands.map((function (e) {
            return e.brand + "/" + e.version
        })).join(" ") : navigator.userAgent
    }

    function c() {
        return !/^((?!chrome|android).)*safari/i.test(f())
    }

    function p(e, o, i) {
        void 0 === o && (o = !1), void 0 === i && (i = !1);
        var a = e.getBoundingClientRect(),
            f = 1,
            p = 1;
        o && r(e) && (f = e.offsetWidth > 0 && s(a.width) / e.offsetWidth || 1, p = e.offsetHeight > 0 && s(a.height) / e.offsetHeight || 1);
        var u = (n(e) ? t(e) : window).visualViewport,
            l = !c() && i,
            d = (a.left + (l && u ? u.offsetLeft : 0)) / f,
            h = (a.top + (l && u ? u.offsetTop : 0)) / p,
            m = a.width / f,
            v = a.height / p;
        return {
            width: m,
            height: v,
            top: h,
            right: d + m,
            bottom: h + v,
            left: d,
            x: d,
            y: h
        }
    }

    function u(e) {
        var n = t(e);
        return {
            scrollLeft: n.pageXOffset,
            scrollTop: n.pageYOffset
        }
    }

    function l(e) {
        return e ? (e.nodeName || "").toLowerCase() : null
    }

    function d(e) {
        return ((n(e) ? e.ownerDocument : e.document) || window.document).documentElement
    }

    function h(e) {
        return p(d(e)).left + u(e).scrollLeft
    }

    function m(e) {
        return t(e).getComputedStyle(e)
    }

    function v(e) {
        var t = m(e),
            n = t.overflow,
            r = t.overflowX,
            o = t.overflowY;
        return /auto|scroll|overlay|hidden/.test(n + o + r)
    }

    function y(e, n, o) {
        void 0 === o && (o = !1);
        var i, a, f = r(n),
            c = r(n) && function (e) {
                var t = e.getBoundingClientRect(),
                    n = s(t.width) / e.offsetWidth || 1,
                    r = s(t.height) / e.offsetHeight || 1;
                return 1 !== n || 1 !== r
            }(n),
            m = d(n),
            y = p(e, c, o),
            g = {
                scrollLeft: 0,
                scrollTop: 0
            },
            b = {
                x: 0,
                y: 0
            };
        return (f || !f && !o) && (("body" !== l(n) || v(m)) && (g = (i = n) !== t(i) && r(i) ? {
            scrollLeft: (a = i).scrollLeft,
            scrollTop: a.scrollTop
        } : u(i)), r(n) ? ((b = p(n, !0)).x += n.clientLeft, b.y += n.clientTop) : m && (b.x = h(m))), {
            x: y.left + g.scrollLeft - b.x,
            y: y.top + g.scrollTop - b.y,
            width: y.width,
            height: y.height
        }
    }

    function g(e) {
        var t = p(e),
            n = e.offsetWidth,
            r = e.offsetHeight;
        return Math.abs(t.width - n) <= 1 && (n = t.width), Math.abs(t.height - r) <= 1 && (r = t.height), {
            x: e.offsetLeft,
            y: e.offsetTop,
            width: n,
            height: r
        }
    }

    function b(e) {
        return "html" === l(e) ? e : e.assignedSlot || e.parentNode || (o(e) ? e.host : null) || d(e)
    }

    function w(e) {
        return ["html", "body", "#document"].indexOf(l(e)) >= 0 ? e.ownerDocument.body : r(e) && v(e) ? e : w(b(e))
    }

    function x(e, n) {
        var r;
        void 0 === n && (n = []);
        var o = w(e),
            i = o === (null == (r = e.ownerDocument) ? void 0 : r.body),
            a = t(o),
            s = i ? [a].concat(a.visualViewport || [], v(o) ? o : []) : o,
            f = n.concat(s);
        return i ? f : f.concat(x(b(s)))
    }

    function O(e) {
        return ["table", "td", "th"].indexOf(l(e)) >= 0
    }

    function j(e) {
        return r(e) && "fixed" !== m(e).position ? e.offsetParent : null
    }

    function E(e) {
        for (var n = t(e), i = j(e); i && O(i) && "static" === m(i).position;) i = j(i);
        return i && ("html" === l(i) || "body" === l(i) && "static" === m(i).position) ? n : i || function (e) {
            var t = /firefox/i.test(f());
            if (/Trident/i.test(f()) && r(e) && "fixed" === m(e).position) return null;
            var n = b(e);
            for (o(n) && (n = n.host); r(n) && ["html", "body"].indexOf(l(n)) < 0;) {
                var i = m(n);
                if ("none" !== i.transform || "none" !== i.perspective || "paint" === i.contain || -1 !== ["transform", "perspective"].indexOf(i.willChange) || t && "filter" === i.willChange || t && i.filter && "none" !== i.filter) return n;
                n = n.parentNode
            }
            return null
        }(e) || n
    }
    var D = "top",
        A = "bottom",
        L = "right",
        P = "left",
        M = "auto",
        k = [D, A, L, P],
        W = "start",
        B = "end",
        H = "viewport",
        T = "popper",
        R = k.reduce((function (e, t) {
            return e.concat([t + "-" + W, t + "-" + B])
        }), []),
        S = [].concat(k, [M]).reduce((function (e, t) {
            return e.concat([t, t + "-" + W, t + "-" + B])
        }), []),
        V = ["beforeRead", "read", "afterRead", "beforeMain", "main", "afterMain", "beforeWrite", "write", "afterWrite"];

    function q(e) {
        var t = new Map,
            n = new Set,
            r = [];

        function o(e) {
            n.add(e.name), [].concat(e.requires || [], e.requiresIfExists || []).forEach((function (e) {
                if (!n.has(e)) {
                    var r = t.get(e);
                    r && o(r)
                }
            })), r.push(e)
        }
        return e.forEach((function (e) {
            t.set(e.name, e)
        })), e.forEach((function (e) {
            n.has(e.name) || o(e)
        })), r
    }

    function C(e) {
        return e.split("-")[0]
    }

    function N(e, t) {
        var n = t.getRootNode && t.getRootNode();
        if (e.contains(t)) return !0;
        if (n && o(n)) {
            var r = t;
            do {
                if (r && e.isSameNode(r)) return !0;
                r = r.parentNode || r.host
            } while (r)
        }
        return !1
    }

    function I(e) {
        return Object.assign({}, e, {
            left: e.x,
            top: e.y,
            right: e.x + e.width,
            bottom: e.y + e.height
        })
    }

    function _(e, r, o) {
        return r === H ? I(function (e, n) {
            var r = t(e),
                o = d(e),
                i = r.visualViewport,
                a = o.clientWidth,
                s = o.clientHeight,
                f = 0,
                p = 0;
            if (i) {
                a = i.width, s = i.height;
                var u = c();
                (u || !u && "fixed" === n) && (f = i.offsetLeft, p = i.offsetTop)
            }
            return {
                width: a,
                height: s,
                x: f + h(e),
                y: p
            }
        }(e, o)) : n(r) ? function (e, t) {
            var n = p(e, !1, "fixed" === t);
            return n.top = n.top + e.clientTop, n.left = n.left + e.clientLeft, n.bottom = n.top + e.clientHeight, n.right = n.left + e.clientWidth, n.width = e.clientWidth, n.height = e.clientHeight, n.x = n.left, n.y = n.top, n
        }(r, o) : I(function (e) {
            var t, n = d(e),
                r = u(e),
                o = null == (t = e.ownerDocument) ? void 0 : t.body,
                a = i(n.scrollWidth, n.clientWidth, o ? o.scrollWidth : 0, o ? o.clientWidth : 0),
                s = i(n.scrollHeight, n.clientHeight, o ? o.scrollHeight : 0, o ? o.clientHeight : 0),
                f = -r.scrollLeft + h(e),
                c = -r.scrollTop;
            return "rtl" === m(o || n).direction && (f += i(n.clientWidth, o ? o.clientWidth : 0) - a), {
                width: a,
                height: s,
                x: f,
                y: c
            }
        }(d(e)))
    }

    function F(e, t, o, s) {
        var f = "clippingParents" === t ? function (e) {
                var t = x(b(e)),
                    o = ["absolute", "fixed"].indexOf(m(e).position) >= 0 && r(e) ? E(e) : e;
                return n(o) ? t.filter((function (e) {
                    return n(e) && N(e, o) && "body" !== l(e)
                })) : []
            }(e) : [].concat(t),
            c = [].concat(f, [o]),
            p = c[0],
            u = c.reduce((function (t, n) {
                var r = _(e, n, s);
                return t.top = i(r.top, t.top), t.right = a(r.right, t.right), t.bottom = a(r.bottom, t.bottom), t.left = i(r.left, t.left), t
            }), _(e, p, s));
        return u.width = u.right - u.left, u.height = u.bottom - u.top, u.x = u.left, u.y = u.top, u
    }

    function U(e) {
        return e.split("-")[1]
    }

    function z(e) {
        return ["top", "bottom"].indexOf(e) >= 0 ? "x" : "y"
    }

    function X(e) {
        var t, n = e.reference,
            r = e.element,
            o = e.placement,
            i = o ? C(o) : null,
            a = o ? U(o) : null,
            s = n.x + n.width / 2 - r.width / 2,
            f = n.y + n.height / 2 - r.height / 2;
        switch (i) {
            case D:
                t = {
                    x: s,
                    y: n.y - r.height
                };
                break;
            case A:
                t = {
                    x: s,
                    y: n.y + n.height
                };
                break;
            case L:
                t = {
                    x: n.x + n.width,
                    y: f
                };
                break;
            case P:
                t = {
                    x: n.x - r.width,
                    y: f
                };
                break;
            default:
                t = {
                    x: n.x,
                    y: n.y
                }
        }
        var c = i ? z(i) : null;
        if (null != c) {
            var p = "y" === c ? "height" : "width";
            switch (a) {
                case W:
                    t[c] = t[c] - (n[p] / 2 - r[p] / 2);
                    break;
                case B:
                    t[c] = t[c] + (n[p] / 2 - r[p] / 2)
            }
        }
        return t
    }

    function Y(e) {
        return Object.assign({}, {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
        }, e)
    }

    function G(e, t) {
        return t.reduce((function (t, n) {
            return t[n] = e, t
        }), {})
    }

    function J(e, t) {
        void 0 === t && (t = {});
        var r = t,
            o = r.placement,
            i = void 0 === o ? e.placement : o,
            a = r.strategy,
            s = void 0 === a ? e.strategy : a,
            f = r.boundary,
            c = void 0 === f ? "clippingParents" : f,
            u = r.rootBoundary,
            l = void 0 === u ? H : u,
            h = r.elementContext,
            m = void 0 === h ? T : h,
            v = r.altBoundary,
            y = void 0 !== v && v,
            g = r.padding,
            b = void 0 === g ? 0 : g,
            w = Y("number" != typeof b ? b : G(b, k)),
            x = m === T ? "reference" : T,
            O = e.rects.popper,
            j = e.elements[y ? x : m],
            E = F(n(j) ? j : j.contextElement || d(e.elements.popper), c, l, s),
            P = p(e.elements.reference),
            M = X({
                reference: P,
                element: O,
                strategy: "absolute",
                placement: i
            }),
            W = I(Object.assign({}, O, M)),
            B = m === T ? W : P,
            R = {
                top: E.top - B.top + w.top,
                bottom: B.bottom - E.bottom + w.bottom,
                left: E.left - B.left + w.left,
                right: B.right - E.right + w.right
            },
            S = e.modifiersData.offset;
        if (m === T && S) {
            var V = S[i];
            Object.keys(R).forEach((function (e) {
                var t = [L, A].indexOf(e) >= 0 ? 1 : -1,
                    n = [D, A].indexOf(e) >= 0 ? "y" : "x";
                R[e] += V[n] * t
            }))
        }
        return R
    }
    var K = {
        placement: "bottom",
        modifiers: [],
        strategy: "absolute"
    };

    function Q() {
        for (var e = arguments.length, t = new Array(e), n = 0; n < e; n++) t[n] = arguments[n];
        return !t.some((function (e) {
            return !(e && "function" == typeof e.getBoundingClientRect)
        }))
    }

    function Z(e) {
        void 0 === e && (e = {});
        var t = e,
            r = t.defaultModifiers,
            o = void 0 === r ? [] : r,
            i = t.defaultOptions,
            a = void 0 === i ? K : i;
        return function (e, t, r) {
            void 0 === r && (r = a);
            var i, s, f = {
                    placement: "bottom",
                    orderedModifiers: [],
                    options: Object.assign({}, K, a),
                    modifiersData: {},
                    elements: {
                        reference: e,
                        popper: t
                    },
                    attributes: {},
                    styles: {}
                },
                c = [],
                p = !1,
                u = {
                    state: f,
                    setOptions: function (r) {
                        var i = "function" == typeof r ? r(f.options) : r;
                        l(), f.options = Object.assign({}, a, f.options, i), f.scrollParents = {
                            reference: n(e) ? x(e) : e.contextElement ? x(e.contextElement) : [],
                            popper: x(t)
                        };
                        var s, p, d = function (e) {
                            var t = q(e);
                            return V.reduce((function (e, n) {
                                return e.concat(t.filter((function (e) {
                                    return e.phase === n
                                })))
                            }), [])
                        }((s = [].concat(o, f.options.modifiers), p = s.reduce((function (e, t) {
                            var n = e[t.name];
                            return e[t.name] = n ? Object.assign({}, n, t, {
                                options: Object.assign({}, n.options, t.options),
                                data: Object.assign({}, n.data, t.data)
                            }) : t, e
                        }), {}), Object.keys(p).map((function (e) {
                            return p[e]
                        }))));
                        return f.orderedModifiers = d.filter((function (e) {
                            return e.enabled
                        })), f.orderedModifiers.forEach((function (e) {
                            var t = e.name,
                                n = e.options,
                                r = void 0 === n ? {} : n,
                                o = e.effect;
                            if ("function" == typeof o) {
                                var i = o({
                                        state: f,
                                        name: t,
                                        instance: u,
                                        options: r
                                    }),
                                    a = function () {};
                                c.push(i || a)
                            }
                        })), u.update()
                    },
                    forceUpdate: function () {
                        if (!p) {
                            var e = f.elements,
                                t = e.reference,
                                n = e.popper;
                            if (Q(t, n)) {
                                f.rects = {
                                    reference: y(t, E(n), "fixed" === f.options.strategy),
                                    popper: g(n)
                                }, f.reset = !1, f.placement = f.options.placement, f.orderedModifiers.forEach((function (e) {
                                    return f.modifiersData[e.name] = Object.assign({}, e.data)
                                }));
                                for (var r = 0; r < f.orderedModifiers.length; r++)
                                    if (!0 !== f.reset) {
                                        var o = f.orderedModifiers[r],
                                            i = o.fn,
                                            a = o.options,
                                            s = void 0 === a ? {} : a,
                                            c = o.name;
                                        "function" == typeof i && (f = i({
                                            state: f,
                                            options: s,
                                            name: c,
                                            instance: u
                                        }) || f)
                                    } else f.reset = !1, r = -1
                            }
                        }
                    },
                    update: (i = function () {
                        return new Promise((function (e) {
                            u.forceUpdate(), e(f)
                        }))
                    }, function () {
                        return s || (s = new Promise((function (e) {
                            Promise.resolve().then((function () {
                                s = void 0, e(i())
                            }))
                        }))), s
                    }),
                    destroy: function () {
                        l(), p = !0
                    }
                };
            if (!Q(e, t)) return u;

            function l() {
                c.forEach((function (e) {
                    return e()
                })), c = []
            }
            return u.setOptions(r).then((function (e) {
                !p && r.onFirstUpdate && r.onFirstUpdate(e)
            })), u
        }
    }
    var $ = {
        passive: !0
    };
    var ee = {
        name: "eventListeners",
        enabled: !0,
        phase: "write",
        fn: function () {},
        effect: function (e) {
            var n = e.state,
                r = e.instance,
                o = e.options,
                i = o.scroll,
                a = void 0 === i || i,
                s = o.resize,
                f = void 0 === s || s,
                c = t(n.elements.popper),
                p = [].concat(n.scrollParents.reference, n.scrollParents.popper);
            return a && p.forEach((function (e) {
                    e.addEventListener("scroll", r.update, $)
                })), f && c.addEventListener("resize", r.update, $),
                function () {
                    a && p.forEach((function (e) {
                        e.removeEventListener("scroll", r.update, $)
                    })), f && c.removeEventListener("resize", r.update, $)
                }
        },
        data: {}
    };
    var te = {
            name: "popperOffsets",
            enabled: !0,
            phase: "read",
            fn: function (e) {
                var t = e.state,
                    n = e.name;
                t.modifiersData[n] = X({
                    reference: t.rects.reference,
                    element: t.rects.popper,
                    strategy: "absolute",
                    placement: t.placement
                })
            },
            data: {}
        },
        ne = {
            top: "auto",
            right: "auto",
            bottom: "auto",
            left: "auto"
        };

    function re(e) {
        var n, r = e.popper,
            o = e.popperRect,
            i = e.placement,
            a = e.variation,
            f = e.offsets,
            c = e.position,
            p = e.gpuAcceleration,
            u = e.adaptive,
            l = e.roundOffsets,
            h = e.isFixed,
            v = f.x,
            y = void 0 === v ? 0 : v,
            g = f.y,
            b = void 0 === g ? 0 : g,
            w = "function" == typeof l ? l({
                x: y,
                y: b
            }) : {
                x: y,
                y: b
            };
        y = w.x, b = w.y;
        var x = f.hasOwnProperty("x"),
            O = f.hasOwnProperty("y"),
            j = P,
            M = D,
            k = window;
        if (u) {
            var W = E(r),
                H = "clientHeight",
                T = "clientWidth";
            if (W === t(r) && "static" !== m(W = d(r)).position && "absolute" === c && (H = "scrollHeight", T = "scrollWidth"), W = W, i === D || (i === P || i === L) && a === B) M = A, b -= (h && W === k && k.visualViewport ? k.visualViewport.height : W[H]) - o.height, b *= p ? 1 : -1;
            if (i === P || (i === D || i === A) && a === B) j = L, y -= (h && W === k && k.visualViewport ? k.visualViewport.width : W[T]) - o.width, y *= p ? 1 : -1
        }
        var R, S = Object.assign({
                position: c
            }, u && ne),
            V = !0 === l ? function (e) {
                var t = e.x,
                    n = e.y,
                    r = window.devicePixelRatio || 1;
                return {
                    x: s(t * r) / r || 0,
                    y: s(n * r) / r || 0
                }
            }({
                x: y,
                y: b
            }) : {
                x: y,
                y: b
            };
        return y = V.x, b = V.y, p ? Object.assign({}, S, ((R = {})[M] = O ? "0" : "", R[j] = x ? "0" : "", R.transform = (k.devicePixelRatio || 1) <= 1 ? "translate(" + y + "px, " + b + "px)" : "translate3d(" + y + "px, " + b + "px, 0)", R)) : Object.assign({}, S, ((n = {})[M] = O ? b + "px" : "", n[j] = x ? y + "px" : "", n.transform = "", n))
    }
    var oe = {
        name: "computeStyles",
        enabled: !0,
        phase: "beforeWrite",
        fn: function (e) {
            var t = e.state,
                n = e.options,
                r = n.gpuAcceleration,
                o = void 0 === r || r,
                i = n.adaptive,
                a = void 0 === i || i,
                s = n.roundOffsets,
                f = void 0 === s || s,
                c = {
                    placement: C(t.placement),
                    variation: U(t.placement),
                    popper: t.elements.popper,
                    popperRect: t.rects.popper,
                    gpuAcceleration: o,
                    isFixed: "fixed" === t.options.strategy
                };
            null != t.modifiersData.popperOffsets && (t.styles.popper = Object.assign({}, t.styles.popper, re(Object.assign({}, c, {
                offsets: t.modifiersData.popperOffsets,
                position: t.options.strategy,
                adaptive: a,
                roundOffsets: f
            })))), null != t.modifiersData.arrow && (t.styles.arrow = Object.assign({}, t.styles.arrow, re(Object.assign({}, c, {
                offsets: t.modifiersData.arrow,
                position: "absolute",
                adaptive: !1,
                roundOffsets: f
            })))), t.attributes.popper = Object.assign({}, t.attributes.popper, {
                "data-popper-placement": t.placement
            })
        },
        data: {}
    };
    var ie = {
        name: "applyStyles",
        enabled: !0,
        phase: "write",
        fn: function (e) {
            var t = e.state;
            Object.keys(t.elements).forEach((function (e) {
                var n = t.styles[e] || {},
                    o = t.attributes[e] || {},
                    i = t.elements[e];
                r(i) && l(i) && (Object.assign(i.style, n), Object.keys(o).forEach((function (e) {
                    var t = o[e];
                    !1 === t ? i.removeAttribute(e) : i.setAttribute(e, !0 === t ? "" : t)
                })))
            }))
        },
        effect: function (e) {
            var t = e.state,
                n = {
                    popper: {
                        position: t.options.strategy,
                        left: "0",
                        top: "0",
                        margin: "0"
                    },
                    arrow: {
                        position: "absolute"
                    },
                    reference: {}
                };
            return Object.assign(t.elements.popper.style, n.popper), t.styles = n, t.elements.arrow && Object.assign(t.elements.arrow.style, n.arrow),
                function () {
                    Object.keys(t.elements).forEach((function (e) {
                        var o = t.elements[e],
                            i = t.attributes[e] || {},
                            a = Object.keys(t.styles.hasOwnProperty(e) ? t.styles[e] : n[e]).reduce((function (e, t) {
                                return e[t] = "", e
                            }), {});
                        r(o) && l(o) && (Object.assign(o.style, a), Object.keys(i).forEach((function (e) {
                            o.removeAttribute(e)
                        })))
                    }))
                }
        },
        requires: ["computeStyles"]
    };
    var ae = {
            name: "offset",
            enabled: !0,
            phase: "main",
            requires: ["popperOffsets"],
            fn: function (e) {
                var t = e.state,
                    n = e.options,
                    r = e.name,
                    o = n.offset,
                    i = void 0 === o ? [0, 0] : o,
                    a = S.reduce((function (e, n) {
                        return e[n] = function (e, t, n) {
                            var r = C(e),
                                o = [P, D].indexOf(r) >= 0 ? -1 : 1,
                                i = "function" == typeof n ? n(Object.assign({}, t, {
                                    placement: e
                                })) : n,
                                a = i[0],
                                s = i[1];
                            return a = a || 0, s = (s || 0) * o, [P, L].indexOf(r) >= 0 ? {
                                x: s,
                                y: a
                            } : {
                                x: a,
                                y: s
                            }
                        }(n, t.rects, i), e
                    }), {}),
                    s = a[t.placement],
                    f = s.x,
                    c = s.y;
                null != t.modifiersData.popperOffsets && (t.modifiersData.popperOffsets.x += f, t.modifiersData.popperOffsets.y += c), t.modifiersData[r] = a
            }
        },
        se = {
            left: "right",
            right: "left",
            bottom: "top",
            top: "bottom"
        };

    function fe(e) {
        return e.replace(/left|right|bottom|top/g, (function (e) {
            return se[e]
        }))
    }
    var ce = {
        start: "end",
        end: "start"
    };

    function pe(e) {
        return e.replace(/start|end/g, (function (e) {
            return ce[e]
        }))
    }

    function ue(e, t) {
        void 0 === t && (t = {});
        var n = t,
            r = n.placement,
            o = n.boundary,
            i = n.rootBoundary,
            a = n.padding,
            s = n.flipVariations,
            f = n.allowedAutoPlacements,
            c = void 0 === f ? S : f,
            p = U(r),
            u = p ? s ? R : R.filter((function (e) {
                return U(e) === p
            })) : k,
            l = u.filter((function (e) {
                return c.indexOf(e) >= 0
            }));
        0 === l.length && (l = u);
        var d = l.reduce((function (t, n) {
            return t[n] = J(e, {
                placement: n,
                boundary: o,
                rootBoundary: i,
                padding: a
            })[C(n)], t
        }), {});
        return Object.keys(d).sort((function (e, t) {
            return d[e] - d[t]
        }))
    }
    var le = {
        name: "flip",
        enabled: !0,
        phase: "main",
        fn: function (e) {
            var t = e.state,
                n = e.options,
                r = e.name;
            if (!t.modifiersData[r]._skip) {
                for (var o = n.mainAxis, i = void 0 === o || o, a = n.altAxis, s = void 0 === a || a, f = n.fallbackPlacements, c = n.padding, p = n.boundary, u = n.rootBoundary, l = n.altBoundary, d = n.flipVariations, h = void 0 === d || d, m = n.allowedAutoPlacements, v = t.options.placement, y = C(v), g = f || (y === v || !h ? [fe(v)] : function (e) {
                        if (C(e) === M) return [];
                        var t = fe(e);
                        return [pe(e), t, pe(t)]
                    }(v)), b = [v].concat(g).reduce((function (e, n) {
                        return e.concat(C(n) === M ? ue(t, {
                            placement: n,
                            boundary: p,
                            rootBoundary: u,
                            padding: c,
                            flipVariations: h,
                            allowedAutoPlacements: m
                        }) : n)
                    }), []), w = t.rects.reference, x = t.rects.popper, O = new Map, j = !0, E = b[0], k = 0; k < b.length; k++) {
                    var B = b[k],
                        H = C(B),
                        T = U(B) === W,
                        R = [D, A].indexOf(H) >= 0,
                        S = R ? "width" : "height",
                        V = J(t, {
                            placement: B,
                            boundary: p,
                            rootBoundary: u,
                            altBoundary: l,
                            padding: c
                        }),
                        q = R ? T ? L : P : T ? A : D;
                    w[S] > x[S] && (q = fe(q));
                    var N = fe(q),
                        I = [];
                    if (i && I.push(V[H] <= 0), s && I.push(V[q] <= 0, V[N] <= 0), I.every((function (e) {
                            return e
                        }))) {
                        E = B, j = !1;
                        break
                    }
                    O.set(B, I)
                }
                if (j)
                    for (var _ = function (e) {
                            var t = b.find((function (t) {
                                var n = O.get(t);
                                if (n) return n.slice(0, e).every((function (e) {
                                    return e
                                }))
                            }));
                            if (t) return E = t, "break"
                        }, F = h ? 3 : 1; F > 0; F--) {
                        if ("break" === _(F)) break
                    }
                t.placement !== E && (t.modifiersData[r]._skip = !0, t.placement = E, t.reset = !0)
            }
        },
        requiresIfExists: ["offset"],
        data: {
            _skip: !1
        }
    };

    function de(e, t, n) {
        return i(e, a(t, n))
    }
    var he = {
        name: "preventOverflow",
        enabled: !0,
        phase: "main",
        fn: function (e) {
            var t = e.state,
                n = e.options,
                r = e.name,
                o = n.mainAxis,
                s = void 0 === o || o,
                f = n.altAxis,
                c = void 0 !== f && f,
                p = n.boundary,
                u = n.rootBoundary,
                l = n.altBoundary,
                d = n.padding,
                h = n.tether,
                m = void 0 === h || h,
                v = n.tetherOffset,
                y = void 0 === v ? 0 : v,
                b = J(t, {
                    boundary: p,
                    rootBoundary: u,
                    padding: d,
                    altBoundary: l
                }),
                w = C(t.placement),
                x = U(t.placement),
                O = !x,
                j = z(w),
                M = "x" === j ? "y" : "x",
                k = t.modifiersData.popperOffsets,
                B = t.rects.reference,
                H = t.rects.popper,
                T = "function" == typeof y ? y(Object.assign({}, t.rects, {
                    placement: t.placement
                })) : y,
                R = "number" == typeof T ? {
                    mainAxis: T,
                    altAxis: T
                } : Object.assign({
                    mainAxis: 0,
                    altAxis: 0
                }, T),
                S = t.modifiersData.offset ? t.modifiersData.offset[t.placement] : null,
                V = {
                    x: 0,
                    y: 0
                };
            if (k) {
                if (s) {
                    var q, N = "y" === j ? D : P,
                        I = "y" === j ? A : L,
                        _ = "y" === j ? "height" : "width",
                        F = k[j],
                        X = F + b[N],
                        Y = F - b[I],
                        G = m ? -H[_] / 2 : 0,
                        K = x === W ? B[_] : H[_],
                        Q = x === W ? -H[_] : -B[_],
                        Z = t.elements.arrow,
                        $ = m && Z ? g(Z) : {
                            width: 0,
                            height: 0
                        },
                        ee = t.modifiersData["arrow#persistent"] ? t.modifiersData["arrow#persistent"].padding : {
                            top: 0,
                            right: 0,
                            bottom: 0,
                            left: 0
                        },
                        te = ee[N],
                        ne = ee[I],
                        re = de(0, B[_], $[_]),
                        oe = O ? B[_] / 2 - G - re - te - R.mainAxis : K - re - te - R.mainAxis,
                        ie = O ? -B[_] / 2 + G + re + ne + R.mainAxis : Q + re + ne + R.mainAxis,
                        ae = t.elements.arrow && E(t.elements.arrow),
                        se = ae ? "y" === j ? ae.clientTop || 0 : ae.clientLeft || 0 : 0,
                        fe = null != (q = null == S ? void 0 : S[j]) ? q : 0,
                        ce = F + ie - fe,
                        pe = de(m ? a(X, F + oe - fe - se) : X, F, m ? i(Y, ce) : Y);
                    k[j] = pe, V[j] = pe - F
                }
                if (c) {
                    var ue, le = "x" === j ? D : P,
                        he = "x" === j ? A : L,
                        me = k[M],
                        ve = "y" === M ? "height" : "width",
                        ye = me + b[le],
                        ge = me - b[he],
                        be = -1 !== [D, P].indexOf(w),
                        we = null != (ue = null == S ? void 0 : S[M]) ? ue : 0,
                        xe = be ? ye : me - B[ve] - H[ve] - we + R.altAxis,
                        Oe = be ? me + B[ve] + H[ve] - we - R.altAxis : ge,
                        je = m && be ? function (e, t, n) {
                            var r = de(e, t, n);
                            return r > n ? n : r
                        }(xe, me, Oe) : de(m ? xe : ye, me, m ? Oe : ge);
                    k[M] = je, V[M] = je - me
                }
                t.modifiersData[r] = V
            }
        },
        requiresIfExists: ["offset"]
    };
    var me = {
        name: "arrow",
        enabled: !0,
        phase: "main",
        fn: function (e) {
            var t, n = e.state,
                r = e.name,
                o = e.options,
                i = n.elements.arrow,
                a = n.modifiersData.popperOffsets,
                s = C(n.placement),
                f = z(s),
                c = [P, L].indexOf(s) >= 0 ? "height" : "width";
            if (i && a) {
                var p = function (e, t) {
                        return Y("number" != typeof (e = "function" == typeof e ? e(Object.assign({}, t.rects, {
                            placement: t.placement
                        })) : e) ? e : G(e, k))
                    }(o.padding, n),
                    u = g(i),
                    l = "y" === f ? D : P,
                    d = "y" === f ? A : L,
                    h = n.rects.reference[c] + n.rects.reference[f] - a[f] - n.rects.popper[c],
                    m = a[f] - n.rects.reference[f],
                    v = E(i),
                    y = v ? "y" === f ? v.clientHeight || 0 : v.clientWidth || 0 : 0,
                    b = h / 2 - m / 2,
                    w = p[l],
                    x = y - u[c] - p[d],
                    O = y / 2 - u[c] / 2 + b,
                    j = de(w, O, x),
                    M = f;
                n.modifiersData[r] = ((t = {})[M] = j, t.centerOffset = j - O, t)
            }
        },
        effect: function (e) {
            var t = e.state,
                n = e.options.element,
                r = void 0 === n ? "[data-popper-arrow]" : n;
            null != r && ("string" != typeof r || (r = t.elements.popper.querySelector(r))) && N(t.elements.popper, r) && (t.elements.arrow = r)
        },
        requires: ["popperOffsets"],
        requiresIfExists: ["preventOverflow"]
    };

    function ve(e, t, n) {
        return void 0 === n && (n = {
            x: 0,
            y: 0
        }), {
            top: e.top - t.height - n.y,
            right: e.right - t.width + n.x,
            bottom: e.bottom - t.height + n.y,
            left: e.left - t.width - n.x
        }
    }

    function ye(e) {
        return [D, L, A, P].some((function (t) {
            return e[t] >= 0
        }))
    }
    var ge = {
            name: "hide",
            enabled: !0,
            phase: "main",
            requiresIfExists: ["preventOverflow"],
            fn: function (e) {
                var t = e.state,
                    n = e.name,
                    r = t.rects.reference,
                    o = t.rects.popper,
                    i = t.modifiersData.preventOverflow,
                    a = J(t, {
                        elementContext: "reference"
                    }),
                    s = J(t, {
                        altBoundary: !0
                    }),
                    f = ve(a, r),
                    c = ve(s, o, i),
                    p = ye(f),
                    u = ye(c);
                t.modifiersData[n] = {
                    referenceClippingOffsets: f,
                    popperEscapeOffsets: c,
                    isReferenceHidden: p,
                    hasPopperEscaped: u
                }, t.attributes.popper = Object.assign({}, t.attributes.popper, {
                    "data-popper-reference-hidden": p,
                    "data-popper-escaped": u
                })
            }
        },
        be = Z({
            defaultModifiers: [ee, te, oe, ie]
        }),
        we = [ee, te, oe, ie, ae, le, he, me, ge],
        xe = Z({
            defaultModifiers: we
        });
    e.applyStyles = ie, e.arrow = me, e.computeStyles = oe, e.createPopper = xe, e.createPopperLite = be, e.defaultModifiers = we, e.detectOverflow = J, e.eventListeners = ee, e.flip = le, e.hide = ge, e.offset = ae, e.popperGenerator = Z, e.popperOffsets = te, e.preventOverflow = he, Object.defineProperty(e, "__esModule", {
        value: !0
    })
}));
