
<template>
<div class="UserInfo">
  <div class="container">
      <p v-if="errors.length">
    <b>Please correct the following error(s):</b>
    <ul>
      <li v-for="error in errors" :value="error.name" v-bind:key="error.name">{{ error }}</li>
    </ul>
  </p>
    <form  @submit.prevent=" checkForm" method="post">
     
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <h1>Fill up personal details</h1>
          <hr>
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text"  v-model="name" class="form-control">
          </div>
          <div class="form-group">
             
                  <label for="gender">Gender</label><br />
                  <input type="radio"  v-model="gender" value="Male">
                  <label for="male">Male</label>
                  <br>
                  <input type="radio"  v-model="gender" value="Female">
                  <label for="female">female</label>
                   <br>
                  
            
            
            
          </div>
          <div class="form-group">
            <label for="email">Phone</label>
            <input type="text"  v-model="phone" class="form-control">
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email"  v-model="email" class="form-control">
          </div>
          <div class="form-group">
            <label for="nationality">Nationality</label>
            <select class="form-control"  v-model="nationality">
           <option value="" selected disabled>Choose</option>
          <option v-for="countries in country" :value="countries.name" v-bind:key="countries.name">{{ countries.name }}</option>
          </select>
          </div>
          <div class="form-group">
            <label for="DoB">Date of Birth</label>
            <input type="date"  v-model="dob" class="form-control">
          </div>
          <div class="form-group">
            <label for="education">Education Background</label>
            <select class="form-control" v-model="education">
           <option value="" selected disabled>Choose</option>
          <option v-for="education in educationlevel" :value="education.id" v-bind:key="education.id">{{ education.name }}</option>
          </select>
          </div>
          <div class="form-group">
            <label for="contact mode">Please Select Contact Mode</label> <br />
            <input type="radio"  value="Email">
            <label for="email">Email</label>
            <br>
            <input type="radio"  value="Phone">
            <label for="phone">Phone</label>
            <br>
            <input type="radio"  value="None">
            <label for="None">None</label>
             <br>
            
          </div>
         

          
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
          <button type="submit" class="btn btn-primary">Submit!
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
      name: null,
      gender: null,
      email : null,
      phone: null,
      nationality: null,
      dob: null,
      education:null,
      errors : [],
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

    methods: {
      checkForm: function(e){
        if(this. name && this.gender && this.gmail && this.phone && this.nationality && this.dob && this.education){
          return true;
        }
        this.errors = [];
        if(!this.name){
          this.errors.push("Name is required.");
        }
        if(!this.gender){
          this.errors.push("Gender is required");
        }
        if(!this.email){
          this.errors.push("Valid Email is required");
        }
        if(!this.phone){
          this.errors.push("Phone Number id required");
        }
        if(!this.nationality){
          this.errors.push("Nationality id required");
        }
        if(!this.dob){
          this.errors.push("Date of Birth id required");
        }
        if(!this.education){
          this.errors.push("Education is required");
        }
         e.preventDefault();
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
li {
  color: red;
}

</style>

