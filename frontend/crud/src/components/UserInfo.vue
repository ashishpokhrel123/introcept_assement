
<template>
<div class="UserInfo">
  <div class="container">
    <form>
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <h1>Fill up personal details</h1>
          <hr>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" id="Name" class="form-control">
          </div>
          <div class="form-group">
             
                  <label for="gender">Gender</label><br />
                  <input type="radio" id="male" value="Male">
                  <label for="male">Male</label>
                  <br>
                  <input type="radio" id="female" value="Female">
                  <label for="female">female</label>
                   <br>
                  
            
            
            
          </div>
          <div class="form-group">
            <label for="email">Phone</label>
            <input type="text" id="Phone" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="Email" class="form-control">
          </div>
          <div class="form-group">
            <label for="nationality">Nationality</label>
            <select class="form-control">
           <option value="" selected disabled>Choose</option>
          <option v-for="countries in country" :value="countries.cioc" :key="countries.cioc">{{ countries.name }}</option>
          </select>
          </div>
          <div class="form-group">
            <label for="DoB">Date of Birth</label>
            <input type="date" id="date" class="form-control">
          </div>
          <div class="form-group">
            <label for="nationality">Education Background</label>
            <select class="form-control">
           <option value="" selected disabled>Choose</option>
          <option v-for="education in educationlevel" :value="education.id" :key="education.id">{{ education.name }}</option>
          </select>
          </div>
          <div class="form-group">
            <label for="contact mode">Please Select Contact Mode</label> <br />
            <input type="radio" id="email" value="Email">
            <label for="email">Email</label>
            <br>
            <input type="radio" id="Phone" value="Phone">
            <label for="phone">Phone</label>
            <br>
            <input type="radio" id="none" value="None">
            <label for="None">None</label>
             <br>
            
          </div>
         

          
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <button class="btn btn-primary">Submit!
          </button>
        </div>
      </div>
    </form>
  </div>
</div>

</template>


<script>

import axios from 'axios';
export default {
     name: 'UserInfo',
     data () {
         
    return {
      country: [],
      educationlevel : [
          
              {name:'Secondary Level', id: 'SL'},
              {name: 'Higher level', id: 'HL'},
              {name: 'Bachelor level', id:'BL'},
              {name: 'Master level', id:'ML'},
              {name: 'PHD', id:'PHD'},

          
      ],
      selectedEducationLevel:  null
      
    }
    
    
    },
   
    

    mounted () {
        axios
        .get('https://restcountries.eu/rest/v2/all')
        .then(response => 
        {
            this.country = response.data

        })
        console.log(this.country)
        
    }
}
    
    


</script>

<style>


</style>

