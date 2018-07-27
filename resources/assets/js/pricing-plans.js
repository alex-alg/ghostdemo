import $ from 'jquery';
import Vue from 'vue';

const vm = new Vue({
	el: '#pricing-plans',
	data: pricingPlansData,

	components: {
			'apply-voucher-form': require('./voucher/apply-voucher-form.vue'),
	}
});