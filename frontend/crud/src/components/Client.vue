<template>
  <div class="container">
        <h3 class="p-3 text-center">All client</h3>
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>S.N</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>DOB</th>
                    <th>Gender</th>
                    <th>Nationality</th>
                    <th>Education</th>
                    <th>View Detail </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="clients in client" :key="clients.id">
                    <td>{{ clients[0]}}</td>
                    <td>{{ clients[1]}}</td>
                    <td>{{ clients[2]}}</td>
                    <td>{{ clients[3]}}</td>
                    <td>{{ clients[4]}}</td>
                    <td>{{ clients[5]}}</td>
                    <td>{{ clients[6]}}</td>
                    <td>{{ clients[7]}}</td>
                    <td><router-link :to="{name: 'clientdetail', params: { id: clients[0] }}" class="btn btn-primary">View Detail</router-link></td>
                   
                </tr>
            </tbody>
        </table>
        <b-pagination
          v-model="currentPage"
          :total-rows="rows"
          :per-page="perPage"
          aria-controls="itemList"
          align="center"
         ></b-pagination>
        
    </div>    


</template>

<script>
import DateService from "../services/DataServices";
export default {
    
    name: "Client", 
    data() {
        
      return {
       
        client:[],
        currentPage :1,
        perPage : 3,
        
        
        
      }
      
      
    },
    mounted () {
        DateService.getClient()
        .then(response=> {
            this.client = response.data
            console.log(response.data)
           
            
        })
        
    },
    

  
    

    
     
   
   
    
    
}




</script>

<style>


</style>