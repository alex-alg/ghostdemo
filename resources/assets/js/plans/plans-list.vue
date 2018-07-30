<template>
  <div>
    <div class="row">
      <div class="col-md-12">
         <v-simple-spinner size="huge" v-if="is_loading == true"></v-simple-spinner>
      </div>
    </div>
    <div class="row" v-show="is_loading === false">
      <div class="col-md-6" v-for="plan in plans">
        <div class="card bg-info">
            <div class="card-header">
                <p>
                    <span>{{ plan.name }}</span>
                    <span class="float-right">{{ plan.price }} EUR</span>
                </p>
            </div>
            <div class="card-body">
                <h4>OS: {{ plan.os }}</h4>
                <p>Features:</p>
                <p v-for="feature in plan.features">{{ feature.name }}</p>
            </div>
            <div class="card-footer">
                <a href="" class="btn btn-success">Choose</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import axios from 'axios';

  export default {
    props: ['links'],

    data: function(){
      return {
        plans: [],
        is_loading: false,
      }
    },

    mounted: function() {
        this.initPlansData();
    },

    methods: {
      initPlansData: function() {
        let self = this;
        self.is_loading = true;

        axios.post(this.links.getPlansDataUrl)
          .then(function (response) {
            self.plans = response.data.plans;
          })
          .catch(function (error) {
            //
          })
          .then(() => { self.is_loading = false; });
      },

      applyDiscountToPlans: function(discountPercentage){
        let self = this;

        console.log(discountPercentage);

        if(discountPercentage !== null){
          self.plans = self.plans.map(plan => {
            let newPlan = plan;

            console.log(plan.price);
            console.log(plan.price * (100 - discountPercentage) / 100);

            newPlan.price = plan.price * (100 - discountPercentage) / 100;

            console.log(newPlan);
            return newPlan;
          });
        }
      }
    },

    components: {
      'v-simple-spinner' : require ('vue-simple-spinner'),
    }
  }
</script>