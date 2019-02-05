"use strict";

module.exports = {
	extends: [
		// "stylelint-config-recommended",
		"stylelint-config-wordpress/scss",
		"prettier-stylelint/index.js"
	],
	rules: {
		"max-line-length": 255,
		"max-nesting-depth": 3,
		"property-no-vendor-prefix": true,
		"max-empty-lines": 2,
		"indentation": 2,
		"function-calc-no-unspaced-operator": true,
		"string-quotes": "double",
		"no-duplicate-selectors": true,
		"color-hex-case": "lower",
		"color-named": "never",
		"selector-max-id": 0,
		"selector-combinator-space-after": "always",
		"declaration-block-trailing-semicolon": "always",
		"declaration-colon-space-before": "never",
		"declaration-colon-space-after": "always",
		"rule-empty-line-before": "always-multi-line",
		"media-feature-range-operator-space-before": "always",
		"media-feature-range-operator-space-after": "always",
		"media-feature-parentheses-space-inside": "never",
		"media-feature-colon-space-before": "never",
		"media-feature-colon-space-after": "always"
	}
};
