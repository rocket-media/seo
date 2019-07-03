import App from './App.vue';
import { t } from '../../common/filters/craft';
import md from '../../common/filters/markdown';

const SeoFieldSettings = {
	install (Vue) {
		// TODO: Abstract these filters into their own file
		Vue.filter('t', t);
		Vue.filter('md', md);
		Vue.component('seo-field-settings', App);
	}
};

if (typeof window !== 'undefined' && window.Vue)
	window.Vue.use(SeoFieldSettings);
