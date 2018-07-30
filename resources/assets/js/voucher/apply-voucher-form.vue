<template>
    <div class="row">
      <div class="card bg-secondary">
        <div class="card-header">{{labels.headerLabel}}</div>
        <div class="card-body">

          <v-simple-spinner size="huge" v-if="is_loading == true"></v-simple-spinner>

            <div class="row">
              <div class="col-md-12">
                <div class="card bg-success" v-show="showSuccessMessage">
                  <div class="card-header">{{labels.applySuccessMessage}}</div>
                </div>
                <div class="card bg-danger" v-show="showErrorMessage">
                  <div class="panel-header">{{labels.applyErrorMessage}}</div>
                </div>
                <br />
              </div>
            </div>

          <form id="apply-voucher-form" @submit.prevent="onSubmit" v-show="is_loading === false">
            <div class="col-lg-12">
              <input type="text" class="form-control" v-model="form.code" name="code">
              <span class="bg-danger" v-if="form.errors.has('code')" v-text="form.errors.get('code')" />
            </div>
            <br />
            <button type="submit" class="btn btn-primary">{{labels.applyButtonLabel}}</button>
          </form>
        </div>
      </div>
    </div>
</template>

<script>
	import axios from 'axios';
	import Form from '../helpers/form/form.js';

	export default {
    props: ['links', 'labels'],

		data: function() {
			return {
        is_loading: false,
        showSuccessMessage: false,
        showErrorMessage: false,

				form: new Form({
						code: null,
        }),
			}
		},

		mounted: function() {
      //
		},

	  methods: {
	    displaySuccessMessage: function() {
	    	this.hideErrorMessage();
	      this.showSuccessMessage = true;
	    },

	    hideSuccessMessage: function() {
	    	if(this.showSuccessMessage === true){
	        this.showSuccessMessage = false;
	      }
	    },

	    displayErrorMessage: function() {
	      this.hideSuccessMessage();
	      this.showErrorMessage = true;
	    },

	    hideErrorMessage: function() {
	    	if(this.showErrorMessage === true) {
	        this.showErrorMessage = false;
	      }
	    },

	    onSubmit: function() {
	    	let self = this;
	    	self.hideSuccessMessage();
	    	self.hideErrorMessage();
	    	self.is_loading = true;

	    	self.form.post(self.links.applyVoucherUrl)
          .then((response) => {
          	self.displaySuccessMessage();
            self.$emit('voucher-applied', response.discount_percentage);
          })
          .catch((errors) => {
          	self.displayErrorMessage();
          })
          .then(() => { self.is_loading = false; });
      },
		},

		components: {
      'v-simple-spinner' : require ('vue-simple-spinner'),
    }
	}
</script>