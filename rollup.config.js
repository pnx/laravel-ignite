import { terser } from 'rollup-plugin-terser';
import multi from '@rollup/plugin-multi-entry';

export default {
	input: ['resources/js/*.js'],
	output: {
		name: "Ignite",
		file: 'dist/ignite.js',
		format: 'iife',
		sourcemap: true
	},
	plugins: [
		terser(),
        multi(),
	]
};
