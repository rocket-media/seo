import App from './App.vue';
import { t } from '../../common/filters/craft';

const SeoFieldSettings = {
	install (Vue) {
		Vue.filter('t', t);
		Vue.component('seo-field-settings', App);
	}
};

if (typeof window !== 'undefined' && window.Vue)
	window.Vue.use(SeoFieldSettings);
