// Minimal static JS loaded without Vite
// Small Alpine-like helpers for nav toggle and dropdowns used in layouts
console.log('app.js loaded');

(function () {
	// For each element with x-data, provide minimal support for `open` reactivity,
	// handling: @click (open = ! open), @click.outside (open = false), x-show and :class map.
	document.querySelectorAll('[x-data]').forEach(function (root) {
		var raw = root.getAttribute('x-data') || '';
		// parse `open: false` or `open: true`
		var m = raw.match(/open\s*:\s*(true|false)/);
		var state = { open: m ? m[1] === 'true' : false };

		function evalInState(expr) {
			try {
				// eslint-disable-next-line no-new-func
				return Function('state', 'with(state){return (' + expr + ')}')(state);
			} catch (e) {
				console.error('eval error', expr, e);
				return undefined;
			}
		}

		function updateAll() {
			// x-show
			root.querySelectorAll('[x-show]').forEach(function (el) {
				var expr = el.getAttribute('x-show');
				var val = evalInState(expr);
				if (val) {
					el.style.display = '';
				} else {
					el.style.display = 'none';
				}
			});

			// :class mapping, example: {"hidden": open, "inline-flex": ! open }
			root.querySelectorAll('[\:class]').forEach(function (el) {
				var expr = el.getAttribute(':class');
				try {
					// evaluate the object literal in the context of state
					var map = Function('state', 'with(state){return ' + expr + '}')(state);
					Object.keys(map).forEach(function (cls) {
						if (map[cls]) el.classList.add(cls);
						else el.classList.remove(cls);
					});
				} catch (e) {
					// ignore parse errors
				}
			});
		}

		// wire @click handlers toggling open
		root.querySelectorAll('[\@click]').forEach(function (el) {
			var v = el.getAttribute('@click');
			el.addEventListener('click', function (ev) {
				if (v.includes('open = ! open')) {
					state.open = !state.open;
					updateAll();
				} else if (v.includes('open = false')) {
					state.open = false;
					updateAll();
				} else if (v.includes('open = true')) {
					state.open = true;
					updateAll();
				}
			});
		});

		// wire @click.outside (close when clicking outside) — handle root and descendants
		var outsideEls = [];
		if (root.hasAttribute('@click.outside')) outsideEls.push(root);
		root.querySelectorAll('[\@click\.outside]').forEach(function (el) { outsideEls.push(el); });
		outsideEls.forEach(function (el) {
			var v = el.getAttribute('@click.outside') || '';
			document.addEventListener('click', function (e) {
				if (!el.contains(e.target)) {
					if (v.includes('open = false')) {
						state.open = false;
						updateAll();
					}
				}
			});
		});

		// initialize UI based on initial state
		updateAll();
	});
})();
