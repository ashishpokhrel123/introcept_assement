<template>
<div>
  <b-card title="Card title">
    
    <b-card-text>
          <span>Name </span>
     .
    </b-card-text>
    <b-card-text>
    <span>Email </span>
    </b-card-text>
    <b-card-text>
    <span>Phone </span>
    </b-card-text>
    <b-card-text>
    <span>Date of Birth </span>
    </b-card-text>
    <b-card-text>
    <span>Gender </span>
    </b-card-text>
    <b-card-text>
    <span>Nationality </span>
    </b-card-text>
    <b-card-text>
    <span>Education </span>
    </b-card-text>
  </b-card>
</div>
  
</template>

<script>
import DateService from "../services/DataServices";
export default {
    name : 'ClientDetail',
    data() {
        return  {
            clientDetail: [],
            
        }
    },

    mounted() {
        DateService.getClientDetail(2)
        .then(response => {
            this.clientDetail = response.data
            console.log(this.clientDetail)
            

        })
        

    }


}
</script>

<style>

</style>