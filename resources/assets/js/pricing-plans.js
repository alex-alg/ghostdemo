import $ from 'jquery';
import Vue from 'vue';

const vm = new Vue({
	el: '#pricing-plans',
	data: pricingPlansPageData,

	methods: {
		refreshPlanList: function(discountPercentage){
        this.$refs.planList.applyDiscountToPlans(discountPercentage);
      }
    },

	components: {
		'plans-list' : require('./plans/plans-list.vue'),
		'apply-voucher-form': require('./voucher/apply-voucher-form.vue'),
	}
});